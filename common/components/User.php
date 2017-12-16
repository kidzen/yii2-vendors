<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\components;

class User extends \yii\web\User {

    public function getStatus() {
        $identity = $this->getIdentity();

        return $identity !== null ? 'Online' : 'Offline';
    }
    public function getAvatar() {
        $identity = $this->getIdentity();

        return $identity !== null ? $identity->avatar : 'dist/img/tiada_gambar.jpg';
    }
    public function getUsername() {
        $identity = $this->getIdentity();

        return $identity !== null ? $identity->username : null;
    }
    public function getName() {
        $identity = $this->getIdentity();
        return $identity !== null ? $identity->profile->name : null;
    }

    public function getRole() {
        $identity = $this->getIdentity();

        return $identity !== null ? $identity->role->name : null;
    }

    public function getStoreList() {
        $identity = $this->getIdentity();

        return $identity !== null ? $identity->storeList : null;
    }

    public function getIsDev() {
        $identity = $this->getRole();

        return $identity === 'Developer' ? true : false;
    }

    public function getIsAdmin() {
        $identity = $this->getRole();

        return $identity === 'Administrator' ? true : false;
    }

    public function getIsPegawaiStor() {
        $identity = $this->getRole();

        return $identity === 'Pegawai Stor' ? true : false;
    }

    public function getIsAdminStore() {
        $identity = $this->getRole();

        return $identity === 'Admin Stor' ? true : false;
    }

    public function getIsUser() {
        $identity = $this->getRole();

        return $identity === 'User' ? true : false;
    }

    public function getIsSpectator() {
        $identity = $this->getRole();

        return $identity === 'Sepectator' ? true : false;
    }

    public function getIsVendor() {
        $identity = $this->getRole();

        return $identity === 'Vendor' ? true : false;
    }

    public function getIsApprover() {
        $identity = $this->getRole();

        return $identity === 'Approver' ? true : false;
    }

    public function getIsManager() {
        $identity = $this->getRole();

        return $identity === 'Manager' ? true : false;
    }

    public function getIsJurugegas() {
        $identity = $this->getRole();

        return $identity === 'Jurugegas' ? true : false;
    }

//    public function getIdentity($autoRenew = true) {
//        if ($this->_identity === false) {
//            if ($this->enableSession && $autoRenew) {
//                $this->_identity = null;
//                $this->renewAuthStatus();
//            } else {
//                return null;
//            }
//        }
//
//        return $this->_identity;
//    }
}
