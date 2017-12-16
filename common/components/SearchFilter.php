<?php

namespace common\components;

use yii\base\Behavior;

class SearchFilter extends Behavior
{
    public $prop1;

    private $_prop2;

    public function init()
    {
        parent::init();
        var_dump($this->rel_transaction_id);
    }

    public function getProp2()
    {
        return $this->_prop2;
    }

    public function setProp2($value)
    {
        $this->_prop2 = $value;
    }

    public function foo()
    {
        // ...
    }
}
