<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Verta;
use App\Repositories\convertDateRepository;
use Carbon\Carbon;

class discount extends Model
{
    use HasFactory;

    public $isActive=true;

    protected $fillable=[
        'code',
        'percent',
        'max_use',
        'expires_at',
    ];
    
    
    public $timestamps=false;
    public function setExpiresAtAttribute($date)
    {
        $this->attributes['expires_at'] = convertDateRepository::convertToMiladi($date);
    }
    public function getExpiresAtAttribute()
    {
        $this->isActiveDate();
        return convertDateRepository::convertToShamsi($this->attributes['expires_at']);
    }

    public function isActiveDate()
    {
        $date = new Carbon($this->attributes['expires_at']);
        $now = Carbon::now();
        $this->isActive = $date->gt($now);
    }
}
