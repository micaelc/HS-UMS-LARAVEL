<?php
/**
 * Created by PhpStorm.
 * User: micae
 * Date: 15/08/2015
 * Time: 12:11
 */

namespace App;


use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
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