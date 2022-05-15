<?php

namespace App\EloquentFilters;

use Illuminate\Database\Eloquent\Builder;

class NameFilter
{
    /**
     * Apply the filter after validation passes & sanitize
     * @param string $value
     * @param  Builder  $builder
     */
    public function handle(string $value, Builder $builder): void
    {
        $builder->where('title','like', '$value%')
        ->orWhere('id', $value);
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function sanitize($value)
    {
        return is_string($value) ? $value : '';
    }

    /**
     * @param mixed $value
     * @return bool|string|array
     */
    public function validate($value)
    {
        return strlen($value) > 5 && strlen($value) < 100;
    }
}
