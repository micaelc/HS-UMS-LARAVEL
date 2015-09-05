<?php
/**
 * Created by PhpStorm.
 * User: micael campos
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
        'context',
        'name',
        'display_name',
        'description'
    ];


    protected $casts = [
        'checked' => 'boolean',
    ];

}