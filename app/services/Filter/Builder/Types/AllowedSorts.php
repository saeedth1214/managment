<?php

namespace App\services\Filter\Builder\Types;

use App\services\Filter\Builder\Contracts\FilterContract;


class AllowedSorts extends FilterContract
{
    protected $defualtSort='desc';

  
    public function filter()
    {
        $this->checkIsEmptyArguments();
        if (isset($this->queryBuilder->arguments[1])) {
            $this->setDefualtSort($this->queryBuilder->arguments[1]);
        }
        $this->ensureSetSortInRequest($this->queryBuilder->arguments[0]);
        $this->queryBuilder::$subject=$this->queryBuilder::$subject->orderBy($this->queryBuilder->arguments[0], $this->defualtSort);
        return $this->queryBuilder;

    }
    private function setDefualtSort($sort)
    {
        $this->defualtSort=$sort;
    }
    private function ensureSetSortInRequest($sortName)
    {
        throw_unless(($this->queryBuilder::$request->filled('sort') && $this->queryBuilder::$request->sort == $sortName), new \Exception('The Request Hasn\'t got Sort'));
    }
}
