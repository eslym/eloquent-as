<?php

namespace Illuminate\Database\Query{
    /**
     * Class Builder
     * @package Illuminate\Database\Query
     *
     * @method $this as(string $alias)
     */
    class Builder {}
}

namespace Illuminate\Database\Eloquent{
    /**
     * Class Builder
     * @package Illuminate\Database\Query
     *
     * @method $this as(string $alias)
     */
    class Builder extends \Illuminate\Database\Query\Builder {}
}