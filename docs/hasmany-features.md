# hasMany 嵌套表单增强功能

本分支在官方 v1.8.19 基础上，为 `hasMany` 嵌套表单新增两个功能：**行内条件显示（when）** 与 **多图上传（上传/拖拽排序/单张删除）**。两个功能均直接内置，无需安装任何扩展。

> 适用场景：`Encore\Admin\Form` 的 `hasMany` 嵌套表单。普通（非嵌套）表单不受影响。

---

## 功能一：嵌套行内条件显示（when）

### 效果

在 `hasMany` 的每一行内，按某个字段（如 Radio）的选中值，动态显示/隐藏该行的其它字段。**行与行之间完全隔离**——A 行的选择不会影响 B 行（原生的字段级联脚本以字段 class 为全局选择器，多行场景下会互相干扰，因此嵌套场景需要本实现）。

### 用法

```php
$form->hasMany('books', '著作', function (NestedForm $form) {
    $form->text('title', '书名')->rules('required');

    $form->radio('format', '形式')->options([
        '纸质书' => '纸质书',
        '电子书' => '电子书',
        '有声书' => '有声书',
    ])->default('纸质书')
        ->when('电子书', function (NestedForm $form) {
            $form->text('download_url', '下载地址');
        })
        ->when('有声书', function (NestedForm $form) {
            $form->text('narrator', '朗读者');
        });

    $form->decimal('price', '定价');
});
```

### 行为说明

- 仅在**嵌套表单**上下文中拦截：`when($value, $closure)` 等值匹配走行内联动；普通表单（无嵌套上下文）与全写 `when($operator, $value, $closure)` 仍走原生的 `CanCascadeFields::when` 级联，行为不变。
- 联动脚本绑定在**所在行容器**（`.has-many-items-form, .fields-group`）内，兼容 iCheck 的 radio 渲染。
- 新增行（点"新增"按钮）的模板同样生效：模板脚本以动态 script 标签按行 key 替换执行。
- 条件组内的字段**始终会随表单提交**（隐藏仅是 CSS 层面），需要后端忽略时在模型/控制器自行处理。
- 当前支持 `Radio` 字段作为触发器（`Select`/`Checkbox` 可按同样模式扩展）。

### 实现

- `src/Form/NestedFormWhen.php`：行内级联引擎（分组 HTML + 同步脚本）。
- `src/Form/Field/Radio.php`：注入嵌套上下文（`setNestedForm`，由 `NestedForm::__call` 自动调用），覆写 `when()` 分流嵌套/普通场景。

---

## 功能二：多图上传（上传 / 拖拽排序 / 单张删除）

### 效果

嵌套行内的多图选择与上传，支持**拖拽排序**与**单张删除**，图片路径以 JSON 数组存入嵌套行的指定列。

### 用法

```php
$form->hasMany('books', '著作', function (NestedForm $form) {
    // ... 其它字段 ...
    $form->hasmanyMultipleImage('banner', '封面图');   // banner 为 TEXT 列，存 JSON 数组
});
```

### 数据格式

```json
["images/img1.png", "images/img2.png"]
```

- **上传**：走 laravel-admin 原生上传存储（`config/admin.php` 的 `upload` 配置，默认 `admin` 磁盘）。
- **拖拽排序**：拖拽后顺序写入隐藏字段 `{column}__order`，**随表单保存**一并合并落库（`HasMany::prepare` 按 key 分类重排：已有图的 key 为图片路径、新上传图为 `init_N`）。
- **单张删除**：点预览图右上角删除图标 → 确认 → 请求内置路由 `POST {admin}/hasmany-multiple-image/delete` → 从该行 JSON 中按路径精确移除并即时落库（无需保存表单）。

### 单张删除接口的安全加固

- 路由在 admin 路由组内，受 `admin.auth` 鉴权；
- `model` 参数必须是 Eloquent Model 子类（拒绝任意类实例化）；
- `column` 参数仅允许合法列名字符；
- 按**图片路径精确匹配**移除，未命中时不动数据。

### 注意事项

1. **已有行**的删除/排序需要行主键（表单自动携带 hidden id），**新增行**在保存前无法使用单张删除（保存后即可）。
2. 图片处理（缩略图等）失败时会**降级为直接存储原文件**，不会导致整批丢失；0 字节/无效上传会被跳过并记录日志（`[HasManyMultipleImage]` 前缀）。
3. 图片 URL 前缀可在 `.env` 配置 `IMG_URL`（业务侧拼接展示用）。

### 实现

- `src/Form/Field/HasManyMultipleImage.php`：字段类（继承原生 `MultipleImage`）+ `mergeAndSort` 排序合并。
- `src/Form/Concerns/HandlesHasManyMultipleImage.php`：数据层辅助（按路径移除/重排）。
- `src/Controllers/HasManyMultipleImageController.php` + `Admin::routes()`：单张删除端点（含加固）。
- `resources/views/hasmany-multiple-image.blade.php`：字段视图（含排序隐藏字段）。

---

## 更新日志（相对官方 v1.8.19）

| 类型 | 内容 |
|---|---|
| 安全 | HandleController 四入口未授权 RCE 修复（登录校验 + 类白名单）|
| 安全 | Pjax 对非异常错误响应的友好展示（替代 `get_class(null)` 500）|
| 安全 | 多图删除端点三层加固（Model 校验/列名校验/按路径精确移除）|
| 兼容 | PHP 7.2 ~ 8.5（`_remove_` 键访问兜底、动态属性修复等）|
| 兼容 | Laravel 7 ~ 12、`symfony/dom-crawler ^6|^7`、`doctrine/dbal 4` |
| 功能 | 嵌套行内条件显示（when）|
| 功能 | 嵌套行内多图上传/拖拽排序/单张删除 |
| 修复 | 多图删除按路径精确移除（修复错删问题）|
| 修复 | 拖拽排序重复图片（order key 分类解析）|
| 修复 | 0 字节/无效上传文件跳过，图片处理失败降级直存 |
