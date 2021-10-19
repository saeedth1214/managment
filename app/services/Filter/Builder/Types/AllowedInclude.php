<?php

namespace App\services\Filter\Builder\Types;

use App\services\Filter\Builder\Contracts\FilterContract;
use Illuminate\Database\Eloquent\Relations\Relation;

class AllowedInclude extends FilterContract{


      public function filter()
    {
        $this->checkIsEmptyArguments();
        $include= $this->queryBuilder->arguments[0];
        $this->ensureSetIncludeInRequest($include);
        $this->ensureRelationExists($include);
        $this->subjectWithRelation($include);

        return $this->queryBuilder;

    }


    
    private function ensureSetIncludeInRequest($include)
    {
        // dd($include);
        throw_unless(($this->queryBuilder::$request->filled('include') && $this->queryBuilder::$request->include == $include), new \Exception('This Relation Not fount in Request'));
    }


    private function subjectWithRelation($include)
    {
        $this->queryBuilder::$subject = $this->queryBuilder::$subject->with($include);
    }

    private function ensureRelationExists($include)
    {
        if (!method_exists($this->queryBuilder::$subject->getModel(),$include) ||! is_a( $this->queryBuilder::$subject->getModel()->{$include}(), Relation::class)) {
            throw new \Exception("This relation not Found.");
        }
    }

}

