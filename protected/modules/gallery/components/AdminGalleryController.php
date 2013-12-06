<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 *
 * @author fendi
 */
class AdminGalleryController extends MyAdminController{
    function getModuleUrl(){
        return $this->getModule()->getName();
    }
    function getGalleryPath($gambar=null){
        if($gambar==null)
            return 'upload/gallery';
        else
            return 'upload/gallery/'.$gambar;
    }
    function getGalleryThumbPath($gambar=null){
        if($gambar==null)
            return 'upload/gallery/thumb';
        else
            return 'upload/gallery/thumb/'.$gambar;
    }
}

?>
