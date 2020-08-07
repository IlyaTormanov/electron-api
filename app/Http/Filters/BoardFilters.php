<?php


namespace App\Http\Filters;


class BoardFilters extends QueryFilter
{
        public function author($author){
            if(!empty($author)){
                return $this->builder->where('columns.tasks.author_id',$author);
            }
        }


}
