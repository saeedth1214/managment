<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alert extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'message',
    ];

    public $attributes=[
        'active'=>0
    ];


    public $timestamps=false;


    public function companies ()
    {
        return $this->belongsToMany(company::class, 'company_has_alert', 'alert_id', 'company_id')->withPivot('deliverd_at');
    
    }

}
