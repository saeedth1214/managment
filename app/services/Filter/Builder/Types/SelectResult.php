<?php

namespace App\services\Filter\Builder\Types;

use App\services\Filter\Builder\Contracts\FilterContract;

class SelectResult extends FilterContract
{
    
    public function filter()
    {
         $this->queryBuilder::$subject->select($this->queryBuilder->arguments);
        return $this->queryBuilder;
    }

}
