<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Haberler extends Model
{

    protected $table='tb_haberler';
    protected $fillable=['baslik','icerik','kullanici_id',];
}
