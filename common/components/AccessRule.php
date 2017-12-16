<?php

namespace common\components;

class AccessRule extends \yii\filters\AccessRule {

    protected function matchRole($user) {
        if (empty($this->role)) {
            return true;
        }
//        var_dump($this->roles);
//        var_dump($user->role);
//        die();
//        if ($this->roles == $user->role) {
//            return true;
//        }
        foreach ($this->role as $role) {
            if ($role === '?' && $user->getIsGuest()) {
                return true;
            } elseif ($role === '@' && !$user->getIsGuest()) {
                return true;
            } elseif (!$user->getIsGuest()) {
                // user is not guest, let's check his role (or do something else)
                //if ($role === $user->identity->role) {
                if ($role === $user->role) {
                    return true;
                }
            }
        }
        return false;
    }

}
