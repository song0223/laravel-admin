<?php

namespace Encore\Admin\Grid\Displayers;

class Link extends AbstractDisplayer
{
    public function display($callback = '', $target = '_blank')
    {
        if ($callback instanceof \Closure) {
            $callback = $callback->bindTo($this->row);
            $href = call_user_func_array($callback, [$this->row]);
        } else {
            $href = $callback ?: $this->value;
        }

        // [Security] escape both sides and refuse javascript:/data: schemes
        // - the value comes from the DB and used to land raw in the href
        $href = (string) $href;
        if (preg_match('/^\s*(javascript|data|vbscript)\s*:/i', $href)) {
            $href = '#';
        }
        $href = e($href);

        return "<a href='$href' target='$target'>".e($this->value).'</a>';
    }
}
