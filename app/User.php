<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Role;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /*
    Получение данных таблицы roles, через таблицу rolemembers
    ВАЖНО: в таблице rolemembers поля должны быть user_id, role_id
    */
    public function user_roles(){
        return $this->belongsToMany(Role::class, 'rolemembers');
    }

    /*
    Проверка соответствия заявленных ролей, т.е. запрашивамая роль $check
    иммется ли в списке делегированных ролей пользователя.
    Возвращает bool значение.
    */
    public function hasRole($check){
        return $this->user_roles->contains('role_name', $check);
    }
}
