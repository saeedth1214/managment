<?php

namespace App\services\Filter\Builder\Types;

use App\services\Filter\Builder\Contracts\FilterContract;
use PHPUnit\Framework\Exception;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Model;

class AllowedWithCount extends FilterContract
{
    public function filter()
    {
        $this->checkIsEmptyArguments();
        $include = $this->queryBuilder->arguments[0];
        $this->ensureRelationExists($include);
        $this->subjectWithRelation($include);
        return $this->queryBuilder;

    }
    private function subjectWithRelation($include)
    {

        $this->queryBuilder::$subject=$this->queryBuilder::$subject->withCount($include);
    }

    private function ensureRelationExists($include)
    {
        if (!method_exists($this->queryBuilder::$subject->getModel(), $include) ||! is_a($this->queryBuilder::$subject->getModel()->{$include}(), Relation::class)) {
            throw new  Exception("This relation not Found.");
        }
    }
}
