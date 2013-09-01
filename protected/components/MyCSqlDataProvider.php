<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyCSqlDataProvider
 *
 * @author fendi
 */
class MyCSqlDataProvider extends CSqlDataProvider{
    public function __construct($sql, $config = array()) {
        parent::__construct($sql, $config);
        $this->setPagination(array(
//                'class' => 'MyPagination',
                'pageSize' => 20,
                ));
    }
}

?>
