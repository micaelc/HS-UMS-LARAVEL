<?php
/**
 * Created by PhpStorm.
 * User: micael campos
 * Date: 04/09/2015
 * Time: 22:21
 */

namespace App;


trait HsEntrustTrait
{

    /**
     * Checks if the role has a permission by its name.
     *
     * @param string|array    $name       Permission name or array of permission names.
     * @param bool            $requireAll  All permissions in the array are required.
     *
     * @return bool
     */
    public function hasPermission($name, $requireAll = false)
    {
        if (is_array($name)) {
            foreach ($name as $permissionName) {
                $hasPermission = $this->hasPermission($permissionName);

                if ($hasPermission && !$requireAll) {
                    return true;
                } elseif (!$hasPermission && $requireAll) {
                    return false;
                }
            }

            return $requireAll;

        } else {
            foreach ($this->perms as $permission) {
                if ($permission->name == $name) {
                    return true;
                }
            }
        }

        return false;
    }

}