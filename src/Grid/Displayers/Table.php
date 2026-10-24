<?php

namespace Encore\Admin\Grid\Displayers;

use Illuminate\Support\Arr;

class Table extends AbstractDisplayer
{
    public function display($titles = [])
    {
        if ($this->value instanceof \Illuminate\Contracts\Support\Arrayable) {
            $this->value = $this->value->toArray();
        }

        // the persisted value may be a json string - decode before array_keys
        if (is_string($this->value)) {
            $decoded = json_decode($this->value, true);

            $this->value = is_array($decoded) ? $decoded : [];
        }

        $this->value = array_values(array_filter((array) $this->value, function ($item) {
            return is_array($item);
        }));

        if (empty($this->value)) {
            return '';
        }

        if (empty($titles)) {
            $titles = array_keys($this->value[0]);
        }

        if (Arr::isAssoc($titles)) {
            $columns = array_keys($titles);
        } else {
            $titles = array_combine($titles, $titles);
            $columns = $titles;
        }

        $data = array_map(function ($item) use ($columns) {
            $sorted = [];

            $arr = Arr::only($item, $columns);

            foreach ($columns as $column) {
                if (array_key_exists($column, $arr)) {
                    $sorted[$column] = $arr[$column];
                }
            }

            return $sorted;
        }, $this->value);

        $variables = [
            'titles' => $titles,
            'data'   => $data,
        ];

        return view('admin::grid.displayer.table', $variables)->render();
    }
}
