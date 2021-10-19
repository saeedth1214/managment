<?php


namespace App\services\Filter\Builder;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\services\Filter\Builder\Contracts\FilterContract;

/**
 * @method AllowedFilter
 * @method GetSubjectQuery
 * @method AllowedInclude
 * @method AllowedSorts
 * @method AllowedWith
 * @method AllowedWithCount
 * @method GetResult
 *
 */


class QueryBuilder extends FilterContract
{
    protected $filterClass=null;

    private $baseFilterTypes= "App\services\Filter\Builder\Types\\";

    public static function for(string $subject, Request $request)
    {
        if (!is_subclass_of($subject, Model::class)) {
            return null;
        }
        self::$subject=$subject::query();
        self::$request=$request;
        return new static;
    }

    public function __call($name, $arguments)
    {
        $this->arguments= $arguments;
        $this->filterClassExists($name);

        $class=$this->baseFilterTypes . $name;
        $this->filterClass = new $class($this);
        return $this->filter();
    }

    protected function filter()
    {
        return $this->filterClass->filter();
    }

    public function filterClassExists($className)
    {
        if (!class_exists($this->baseFilterTypes.$className)) {
            throw new \Exception("Class [ $this->baseFilterTypes $className ] Not Found :( .");
        }
    }


    public function join()
    {

    }

    public function select ()
    {
    }


    
}
