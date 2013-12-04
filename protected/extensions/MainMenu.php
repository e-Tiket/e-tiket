<?php
Yii::import('zii.widgets.CMenu');

class MainMenu extends CMenu{
    //put your code here
    var $menu=array();
    function __construct($owner = null) {
        parent::__construct($owner);
        $this->menu=array(
            array('module'=>'Master Data',
                'menu'=>array(
                    array('title'=>'Admin','url'=>'pageadmin/admin','access'=>array('admin'=>1)),
                    array('title'=>'Agen Travel','url'=>'pageadmin/agenTravel','access'=>array('admin'=>1)),
                    array('title'=>'Travel','url'=>'pageadmin/travel','access'=>array('admin'=>1)),
                    array('title'=>'Kota Travel','url'=>'pageadmin/travelKota','access'=>array('admin'=>1)),
                    array('title'=>'Seat Travel','url'=>'pageadmin/travelSeat','access'=>array('admin'=>1)),
                    array('title'=>'Custommer','url'=>'pageadmin/custommer','access'=>array('admin'=>1)),
                    array('title'=>'Kapal','url'=>'pageadmin/kapal','access'=>array('admin'=>1)),
                    array('title'=>'Kategori Artikel','url'=>'blog/pageadmin/cmsKategori','access'=>array('admin'=>1)),
                    array('title'=>'Artikel','url'=>'blog/pageadmin/cmsArtikel','access'=>array('admin'=>1)),
//                    array('title'=>'Kelas','url'=>'kelas','access'=>array('admin'=>1)),
                    array('title'=>'Paket Tour','url'=>'pageadmin/paketTour','access'=>array('admin'=>1)),
                    array('title'=>'Pelabuhan','url'=>'pageadmin/pelabuhan','access'=>array('admin'=>1)),
                    array('title'=>'Pemberangkatan Kapal','url'=>'pageadmin/pemberangkatanKapal','access'=>array('admin'=>1)),
                    array('title'=>'Setting Harga Pesawat','url'=>'pageadmin/flightPrice','access'=>array('admin'=>1)),
                    array('title'=>'File Manager','url'=>'pageadmin/admin/filemanager','access'=>array('admin'=>1)),
                ),
            ),
        );
    }
    function getAdminMenu(){
        return $this->menu;
    }
    public function getMenu(){
        return $this->getAdminMenu();
    }
    function getSiteMenu(){
        return array(
            array('title'=>'Home','url'=>'','icon'=>'icon-home','param'=>array()),
            array('title'=>'Pesawat','url'=>'site/index','param'=>array('tab'=>'flight')),
            array('title'=>'Travel','url'=>'site/index','param'=>array('tab'=>'travel')),
            array('title'=>'Kapal','url'=>'site/index','param'=>array('tab'=>'kapal')),
            array('title'=>'Kereta','url'=>'kereta','param'=>array()),
            array('title'=>'Event','url'=>'event/index','param'=>array()),
            array('title'=>'Cara Pemesanan','url'=>'blog/default/article','param'=>array('slug'=>'cara-pemesanan')),
        );
    }
    function run() {
        parent::run();
    }
}

?>
