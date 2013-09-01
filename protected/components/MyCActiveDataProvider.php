<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyCActiveDataProvider
 *
 * @author fendi
 */
class MyCActiveDataProvider extends CActiveDataProvider {
    public function __construct($modelClass, $config = array()) {
        parent::__construct($modelClass, $config);
        $this->pagination->pageSize=5;
    }
    //put your code here
}

?>
