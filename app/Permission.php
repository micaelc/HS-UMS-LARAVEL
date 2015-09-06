<?php
/**
 * Created by PhpStorm.
 * User: micael campos
 * Date: 15/08/2015
 * Time: 12:11
 */

namespace App;


use Zizaco\Entrust\EntrustPermission;

/**
 * App\Permission
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('entrust.role')[] $roles
 * @property integer $id
 * @property string $context
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property boolean $checked
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Permission whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Permission whereContext($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Permission whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Permission whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Permission whereChecked($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Permission whereUpdatedAt($value)
 */
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