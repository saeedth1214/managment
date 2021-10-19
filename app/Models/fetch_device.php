<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Widgets\deviceName;
use App\Repositories\convertDateRepository;

class fetch_device extends Model
{
    use HasFactory;
    public $timestamps=false;


    protected $fillable=[
        'company_id',
        'device_id',
        'period',
        'last_request_at',
    ];
    protected $hidden = [
        // 'last_request_at',
    ];


    public function setLastRequestAtAttribute($date)
    {
        $this->attributes['last_request_at'] = convertDateRepository::convertToMiladi($date);
    }
    public function getDeviceIdAttribute($value)
    {
        return deviceName::DEVICES[$value];
    }
    public function getLastRequestAtAttribute()
    {
        return convertDateRepository::convertToShamsi($this->attributes['last_request_at']);
    }

    public function company()
    {
        return $this->belongsTo(company::class);
    }
}
