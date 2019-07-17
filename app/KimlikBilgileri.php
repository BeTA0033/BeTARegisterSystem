<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KimlikBilgileri extends Model
{
    protected $table='tb_kimlik_bilgileri';
    protected $fillable=['id','no','ad','soyad','telefon','adres'];
}
