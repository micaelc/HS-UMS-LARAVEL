<?php
/**
 * Created by PhpStorm.
 * User: micae
 * Date: 15/08/2015
 * Time: 12:10
 */

namespace App;


use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];


}