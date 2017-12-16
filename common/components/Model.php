<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\components;

use Yii;
use yii\helpers\ArrayHelper;

class Model extends \yii\base\Model {

    /**
     * Creates and populates a set of models.
     *
     * @param string $modelClass
     * @param array $multipleModels
     * @return array
     */
    public static function createMultiple($modelClass, $multipleModels = []) {
        $model = new $modelClass;
        $formName = $model->formName();
        $post = empty($data) ? Yii::$app->request->post($formName) : $data[$formName];
        $models = [];

        if (!empty($multipleModels)) {

            $keys = array_keys(ArrayHelper::map($multipleModels, 'ID', 'ID'));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item['ID']) && !empty($item['ID']) && isset($multipleModels[$item['ID']])) {
                    $models[] = $multipleModels[$item['ID']];
                } else {
                    $models[] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);
        return $models;
    }

    public static function createMultipleGenerator($modelClass, $multipleModels = [], $modelCreator) {
        $model = new $modelClass;
        $formName = $model->formName();
        $creatorName = $modelCreator->formName();
        $post = empty($data) ? Yii::$app->request->post($formName) : $data[$formName];
        $postCreator = empty($data) ? Yii::$app->request->post($creatorName) : $data[$creatorName];
        $models = [];


        if (!empty($multipleModels)) {
            var_dump('has multiple model');
            $keys = array_keys(ArrayHelper::map($multipleModels, 'ID', 'ID'));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if (!empty($modelCreator)) {
            for ($i = 1; $i <= $modelCreator->QUANTITY; $i++) {
                $models[] = new $modelClass;
            }
        }

//        will never hit
        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item['ID']) && !empty($item['ID']) && isset($multipleModels[$item['ID']])) {
                    $models[] = $multipleModels[$item['ID']];
                } else {
                    $models[] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);
        return $models;
    }

}
