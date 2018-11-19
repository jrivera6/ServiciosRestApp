<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorTemperatura extends Model
{
    //
    
    protected $table="sensor_temperaturas";
    protected $fillable=['chip_id','humedad'];
        public $timestamps = "false";
        
}
