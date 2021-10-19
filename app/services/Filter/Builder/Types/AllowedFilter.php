<?php

namespace App\services\Filter\Builder\Types;

use App\services\Filter\Builder\Contracts\FilterContract;
use Illuminate\Support\Arr;

class AllowedFilter extends FilterContract
{

    public function filter()
    {
        $this->checkIsEmptyArguments();
        $filters = Arr::flatten($this->queryBuilder->arguments);
        $filters = array_filter($this->queryBuilder::$request->only(array_values($filters)));
        $this->checkValidFilters($filters);
        $this->queryBuilder::$subject = $this->queryBuilder::$subject->where($filters);

         return $this->queryBuilder;
    }
    
    
    private function checkValidFilters($filters)
    {
        throw_unless(count($filters), new \Exception("Filter Parameter is empty"));
    }
}
