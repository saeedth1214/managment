<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;

    public $timestamps=false;
    protected $fillable=[
        'package_id',
        'company_id',
        'amount',
        'discount',
        'status'
    ];

    // public $attributes=[
    //     'status'=>0,
    // ];


    public function company ()
    {
        return $this->belongsTo(company::class);
    }
    public function package()
    {
        return $this->belongsTo(package::class);
    }


}
