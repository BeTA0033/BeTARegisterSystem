<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','kimlik_id','rol_id'
    ];

    protected $hidden = [
        'password',
    ];

    public function role(){
        return $this->hasOne('App\Http\Models\Role','id','rol_id');
    }
    public function checkRole($need_role){
        return(strtolower($need_role)==strtolower($this->have_role->roladi)) ? true : false;
    }
    public function hasRole($roles){
        $this->have_role =$this->role()->getResults();
        if(is_array($roles)){
            foreach ($roles as $key => $need_role) {
                if($this->checkRole($need_role)){
                    return true;
                }
            }
        }else{
            return $this->checkRole($roles);
        }
    }
}