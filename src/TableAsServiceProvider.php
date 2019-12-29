<?php


namespace Eslym\Eloquent\TableAs;


use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Support\ServiceProvider;

class TableAsServiceProvider extends ServiceProvider
{
    public function boot(){
        QueryBuilder::macro("as", function($alias) {
            if(is_string($this->from)){
                $table = $this->grammar->wrapTable($this->from);
                preg_match('/^`((?:``|[^`])*)`/', $table, $matches);
                $real_table = Str::after(
                    str_replace('``', '`', $matches[1]),
                    $this->grammar->getTablePrefix()
                );
                $this->from = $real_table." as ".$alias;
            }
            return $this;
        });

        EloquentBuilder::macro("as", function($alias){
            $this->query->as($alias);
            $this->model->setTable($alias);
            return $this;
        });

        EloquentBuilder::macro("fromSub", function($sub, $alias){
            $this->query->fromSub($sub, $alias);
            $this->model->setTable($alias);
            return $this;
        });
    }
}