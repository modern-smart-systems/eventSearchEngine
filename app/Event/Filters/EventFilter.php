<?php

namespace App\Event\Filters;

class EventFilter extends Filter
{
    /**
     * Filter by country name.
     * Get all the event by the given city name.
     *
     * @param $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function city($name)
    {
        return $this->builder->where('city', $name);
    }

    /**
     * Filter by country name.
     * Get all the event by the given country name.
     *
     * @param $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function country($name)
    {
        return $this->builder->where('country', $name);
    }
}
