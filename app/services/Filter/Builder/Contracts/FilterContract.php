<?php


namespace App\services\Filter\Builder\Contracts;

use App\services\Filter\Builder\QueryBuilder;

abstract class FilterContract
{
    protected static $request;
    protected static $subject;
    protected $arguments;

    protected $queryBuilder;

    public function __construct(QueryBuilder $queryBuilder=null)
    {
        $this->queryBuilder = $queryBuilder;
    }

    protected function checkIsEmptyArguments()
    {
        throw_if(empty($this->queryBuilder->arguments),new \Exception('The parameters is empty'));
    }
    abstract protected function filter();
}
