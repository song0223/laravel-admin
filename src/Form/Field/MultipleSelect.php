<?php

namespace Encore\Admin\Form\Field;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany as HasManyRelation;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class MultipleSelect extends Select
{
    /**
     * Other key for many-to-many relation.
     *
     * @var string
     */
    protected $otherKey;

    /**
     * Get other key for this many-to-many relation.
     *
     * @throws \Exception
     *
     * @return string
     */
    protected function getOtherKey()
    {
        if ($this->otherKey) {
            return $this->otherKey;
        }

        if (is_callable([$this->form->model(), $this->column])) {
            $relation = $this->form->model()->{$this->column}();

            if ($relation instanceof BelongsToMany) {
                /* @var BelongsToMany $relation */
                $fullKey = $relation->getQualifiedRelatedPivotKeyName();
                $fullKeyArray = explode('.', $fullKey);

                return $this->otherKey = 'pivot.'.end($fullKeyArray);
            } elseif ($relation instanceof HasManyRelation) {
                /* @var HasManyRelation $relation */
                return $this->otherKey = $relation->getRelated()->getKeyName();
            }
        }

        throw new \Exception('Column of this field must be a `BelongsToMany` or `HasMany` relation.');
    }

    /**
     * {@inheritdoc}
     */
    public function fill($data)
    {
        if ($this->form && $this->form->shouldSnakeAttributes()) {
            $key = Str::snake($this->column);
        } else {
            $key = $this->column;
        }

        $relations = Arr::get($data, $key);

        if (is_string($relations)) {
            // accept both comma-separated (the documented format) and json
            // (what an array attribute persists as when the model has an
            // array/json cast)
            $decoded = json_decode($relations, true);

            $this->value = is_array($decoded) ? $decoded : array_filter(explode(',', $relations), 'strlen');
        }

        if (!is_array($relations)) {
            $this->applyCascadeConditions();

            return;
        }

        $first = current($relations);

        if (is_null($first)) {
            $this->value = null;

        // MultipleSelect value store as an ont-to-many relationship.
        } elseif (is_array($first)) {
            foreach ($relations as $relation) {
                $this->value[] = Arr::get($relation, $this->getOtherKey());
            }

            // MultipleSelect value store as a column.
        } else {
            $this->value = $relations;
        }

        $this->applyCascadeConditions();
    }

    /**
     * {@inheritdoc}
     */
    public function setOriginal($data)
    {
        $relations = Arr::get($data, $this->column);

        if (is_string($relations)) {
            $decoded = json_decode($relations, true);

            $this->original = is_array($decoded) ? $decoded : array_filter(explode(',', $relations), 'strlen');
        }

        if (!is_array($relations)) {
            return;
        }

        $first = current($relations);

        if (is_null($first)) {
            $this->original = null;

        // MultipleSelect value store as an ont-to-many relationship.
        } elseif (is_array($first)) {
            foreach ($relations as $relation) {
                $this->original[] = Arr::get($relation, $this->getOtherKey());
            }

            // MultipleSelect value store as a column.
        } else {
            $this->original = $relations;
        }
    }

    public function prepare($value)
    {
        $value = array_values(array_filter((array) $value, 'strlen'));

        // relation columns (BelongsToMany/HasMany) are consumed as arrays by
        // the relation flow; plain columns persist as a comma-separated
        // string - handing an array to the insert/update binder throws
        // "Array to string conversion". method_exists, not is_callable:
        // Model::__call makes is_callable true for ANY name.
        if ($this->form && $this->form->model() && method_exists($this->form->model(), $this->column)) {
            return $value;
        }

        return implode(',', $value);
    }
}
