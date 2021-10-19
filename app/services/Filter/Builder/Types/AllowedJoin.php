<?php

namespace App\services\Filter\Builder\Types;

use App\services\Filter\Builder\Contracts\FilterContract;

class AllowedJoin extends FilterContract
{

    public function filter()
    {
        $withTable= $this->queryBuilder->arguments[0];
        $primaryKey= $this->queryBuilder->arguments[1];
        $pivotKey= $this->queryBuilder->arguments[2];
         $this->queryBuilder::$subject->join($withTable,$primaryKey,$pivotKey);
         

        return $this->queryBuilder;
    }
}
