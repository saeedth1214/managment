<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\services\Filter\FilterManagement;

class package extends Model
{
    use HasFactory;
    protected $fillable = [
        'package_name',
        'persons',
        'shifts',
        'traffics',
        'turn_shift_groups',
        'max_salary_month',
        'locations',
        'price',
        'duration',
        'discount',
        'sms_charge',
        'access_salary',
        'online_connect',
    ];

    public $timestamps = false;
    protected $attributes = [

        "access_salary" => 0,
        "online_connect" => 0
    ];

    public function invoices()
    {
        return $this->hasMany(invoice::class);
    }
    public function companies ()
    {
        return $this->belongsToMany(company::class,'company_has_package','package_id','company_id');
    }



    public static function scopeFilter (Builder $builder,$request)
    {
        return (new FilterManagement($request))->filter($builder);

        // dd($builder->toSql());
    }
}
