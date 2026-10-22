<?php

namespace Encore\Admin\Form\Field;

use Closure;
use Encore\Admin\Form\Field;
use Encore\Admin\Form\NestedForm;
use Encore\Admin\Form\NestedFormWhen;
use Illuminate\Contracts\Support\Arrayable;

class Radio extends Field
{
    // PHP 8 起禁止以 TraitName::method() 静态语法调用 trait 非静态方法,
    // 别名保留一条直接调用原生级联 when 的通道(见本类 when() 覆盖)
    use CanCascadeFields {
        when as whenCascade;
    }

    protected $inline = true;

    /**
     * 所属嵌套表单（hasMany 行），由 NestedForm::__call 注入。
     *
     * @var NestedForm|null
     */
    protected $nestedForm;

    /**
     * 嵌套 when 条件显示的联动脚本（由 NestedFormWhen 追加）。
     *
     * @var string
     */
    protected $nestedWhenScript = '';

    protected static $css = [
        '/vendor/laravel-admin/AdminLTE/plugins/iCheck/all.css',
    ];

    protected static $js = [
        '/vendor/laravel-admin/AdminLTE/plugins/iCheck/icheck.min.js',
    ];

    /**
     * @var string
     */
    protected $cascadeEvent = 'ifChecked';

    /**
     * Set options.
     *
     * @param array|callable|string $options
     *
     * @return $this
     */
    public function options($options = [])
    {
        if ($options instanceof Arrayable) {
            $options = $options->toArray();
        }

        $this->options = (array) $options;

        return $this;
    }

    /**
     * Set checked.
     *
     * @param array|callable|string $checked
     *
     * @return $this
     */
    public function checked($checked = [])
    {
        if ($checked instanceof Arrayable) {
            $checked = $checked->toArray();
        }

        // input radio checked should be unique
        $this->checked = is_array($checked) ? (array) end($checked) : (array) $checked;

        return $this;
    }

    /**
     * Draw inline radios.
     *
     * @return $this
     */
    public function inline()
    {
        $this->inline = true;

        return $this;
    }

    /**
     * Draw stacked radios.
     *
     * @return $this
     */
    public function stacked()
    {
        $this->inline = false;

        return $this;
    }

    /**
     * Set options.
     *
     * @param array|callable|string $values
     *
     * @return $this
     */
    public function values($values)
    {
        return $this->options($values);
    }

    /**
     * 注入所属嵌套表单（由 NestedForm::__call 自动调用）。
     *
     * @param NestedForm $nestedForm
     *
     * @return $this
     */
    public function setNestedForm(NestedForm $nestedForm)
    {
        $this->nestedForm = $nestedForm;

        return $this;
    }

    /**
     * [Feature] 嵌套表单（hasMany 行）内的条件显示：按本字段选中值
     * 显示/隐藏同行闭包中的字段，行与行之间互不影响。
     * 普通表单（非嵌套）仍走原生 CanCascadeFields::when 级联。
     *
     * 支持 when($value, $closure) 简写与原生 when($operator, $value, $closure) 全写。
     *
     * @param mixed    $operator
     * @param mixed    $value
     * @param Closure|null $closure
     *
     * @return $this
     */
    public function when($operator, $value, $closure = null)
    {
        if (func_num_args() == 2) {
            $closure = $value;
            $value = $operator;
            $operator = '=';
        }

        if ($this->nestedForm instanceof NestedForm && $operator === '=' && $closure instanceof Closure) {
            NestedFormWhen::make($this->nestedForm, $this)->when($value, $closure);

            return $this;
        }

        // 原生级联：显式调用 trait 实现（when 已被本类覆盖，parent:: 不可用）
        return $this->whenCascade($operator, $value, $closure);
    }

    /**
     * 追加嵌套 when 联动脚本（由 NestedFormWhen 调用）。
     *
     * @param string $script
     *
     * @return $this
     */
    public function appendNestedWhenScript($script)
    {
        $this->nestedWhenScript .= "\n".$script;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        $this->script = "$('{$this->getElementClassSelector()}').iCheck({radioClass:'iradio_minimal-blue'});";

        $this->addCascadeScript();

        if ($this->nestedWhenScript) {
            $this->script .= "\n".$this->nestedWhenScript;
        }

        $this->addVariables(['options' => $this->options, 'checked' => $this->checked, 'inline' => $this->inline]);

        return parent::render();
    }
}
