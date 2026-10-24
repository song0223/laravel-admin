<?php

namespace Encore\Admin\Controllers;

use Encore\Admin\Form\Concerns\HandlesHasManyMultipleImage;
use Encore\Admin\Form\Field;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * [Feature] hasMany 多图字段（HasManyMultipleImage）已有行的单张删除端点。
 *
 * [Security] 该端点随 admin 路由组受 admin.auth 鉴权；另做四层加固：
 * ① model 必须是 Eloquent Model 子类（拒绝任意类实例化）；
 * ② model 可选白名单收紧（admin.hasmany_multiple_image.allowed_models，
 *    空 = 不限制，默认保持兼容；配置后仅允许列出的类）；
 * ③ column 仅允许合法列名字符；
 * ④ 按图片路径精确移除（不依赖数组索引），未命中时不动数据。
 */
class HasManyMultipleImageController extends Controller
{
    use HandlesHasManyMultipleImage;

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        $itemId = $request->input('item_id');
        $modelClass = $request->input('model');
        $column = $request->input('column', 'banner');
        // fileinput 删除请求自动附带 initialPreviewConfig 的 key（=图片路径）
        $path = $request->input('key', $request->input(Field::FILE_DELETE_FLAG));

        if (!$modelClass || !class_exists($modelClass) || !is_a($modelClass, Model::class, true)) {
            return response()->json(['status' => false, 'message' => 'invalid model'], 422);
        }

        // [Security] optional model whitelist - an admin session used to be
        // able to touch ANY model/table of the application through here
        $allowedModels = (array) config('admin.hasmany_multiple_image.allowed_models', []);

        if (!empty($allowedModels) && !in_array($modelClass, $allowedModels, true)) {
            return response()->json(['status' => false, 'message' => 'model not allowed'], 422);
        }

        if (!preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', (string) $column)) {
            return response()->json(['status' => false, 'message' => 'invalid column'], 422);
        }

        if (!$itemId || !$path) {
            return response()->json(['status' => false, 'message' => 'missing item or key'], 422);
        }

        $deleted = $this->deleteHasManyMultipleImage($modelClass, $itemId, $path, $column);

        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'record not found'], 404);
        }

        return response()->json(['status' => true]);
    }
}
