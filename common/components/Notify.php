<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\components;

use Yii;

class Notify {

    public $message;
    public $duration;

    public function fail($message = null, $duration = 8000) {
        return Yii::$app->session->setFlash('error', [
                    'type' => 'danger',
                    'duration' => $duration,
                    'icon' => 'glyphicon glyphicon-remove-sign',
                    'title' => Yii::t('app',' Fail'),
                    'message' => isset($message) ? $message : Yii::t('app','Error processing request')
        ]);
    }

    public function success($message = null, $duration = 3000) {
        return Yii::$app->session->setFlash('success', [
                    'type' => 'success',
                    'duration' => $duration,
                    'icon' => 'glyphicon glyphicon-check-sign',
                    'title' => Yii::t('app',' Success'),
                    'message' => isset($message) ? $message : Yii::t('app','Request successfull')
        ]);
    }

    public function info($message, $duration = 3000) {
        return Yii::$app->session->setFlash('info', [
                    'type' => 'info',
                    'duration' => $duration,
                    'icon' => 'glyphicon glyphicon-info-sign',
                    'title' => Yii::t('app',' Info'),
                    'message' => $message
        ]);
    }

    public function warning($message, $duration = 3000) {
        return Yii::$app->session->setFlash('warning', [
                    'type' => 'warning',
                    'duration' => $duration,
                    'icon' => 'glyphicon glyphicon-exclamation-mark',
                    'title' => Yii::t('app',' Warning'),
                    'message' => $message
        ]);
    }

}
