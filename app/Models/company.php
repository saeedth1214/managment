<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\convertDateRepository;
use App\Widgets\dbStatus;
use Carbon\Carbon;

class company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'database',
        'db_status',
        "status",
        "activation_at",
        'user_id'
    ];


    protected $hidden=[
        'activation_at',
        'company_id'
    ];


    protected $attributes=[

        'user_id'=> 100007,
        'status'=>0,

    ];
    public $timestamps = false;

    public function setActivationAtAttribute($date)
    {
        $this->attributes['activation_at'] = convertDateRepository::convertToMiladi($date);
    }
    public function getActivationAtAttribute()
    {
        return convertDateRepository::convertToShamsi($this->attributes['activation_at']);
    }
    public function devices()
    {
        return $this->hasMany(fetch_device::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoices()
    {
        return $this->hasMany(invoice::class);
    }
    public function alerts()
    {
        return $this->belongsToMany(alert::class, 'company_has_alert')->withPivot('delivered_at');
    }
    public function packages()
    {
        return $this->belongsToMany(package::class, 'company_has_package', 'company_id', 'package_id')
        ->withPivot(['start_at',"end_at"])/*->wherePivot(
            'start_at',
            '<=',
            now()
        )
        ->withPivot(['start_at',"end_at"])->wherePivot(
            'end_at',
            '>=',
            now()
        )*/;
    }
}
