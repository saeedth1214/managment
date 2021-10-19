<?php

namespace App\services\Filter\Builder\Types;

use App\services\Filter\Builder\Contracts\FilterContract;

class GetResult extends FilterContract
{
    
    public function filter()
    {
        return $this->queryBuilder::$subject->get();
    }
}
