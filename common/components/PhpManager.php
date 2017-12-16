<?php

namespace common\components;

use Yii;
use yii\rbac\PhpManager;

class PhpManager extends PhpManager {

    public function init() {
        if ($this->authFile === NULL)
            $this->authFile = Yii::getAlias('@common/models/rbac') . '.php'; // HERE GOES YOUR RBAC TREE FILE

        parent::init();

        if (!Yii::$app->user->isGuest) {
            $this->assign(Yii::$app->user->identity->id, Yii::$app->user->identity->role); // we suppose that user's role is stored in identity
        }
    }
    //newly added
    public function getAssignments($userId) {
        if (!Yii::$app->user->isGuest) {
            $assignment = new \yii\rbac\Assignment;
            $assignment->userId = $userId;
            $assignment->roleName = Yii::$app->user->identity->role;
            return [$assignment->roleName => $assignment];
        }
    }

}
