<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Helper
 *
 * @author fendi
 */
class Helper {
    public static function rupiah($nominal,$withRp=true){
        $rupiah = number_format($nominal, 0, ",", ".");
        if($withRp)
            $rupiah = "Rp " . $rupiah . ",-";
        return $rupiah;
    }
    /**
     * 
     * @param type $message pesan yang mau ditampilkan
     * @param type $type 'error','danger','info','success'
     */
    public static function alert($message,$type){
        echo "<div class='alert alert-$type'>$message</div>";
    }
    public static function getQuery($name,$defaultValue=null){
         return Yii::app()->request->getQuery($name, $defaultValue);
    }
    
    public static function generateGetParam($data){
        $result='';
        foreach($data as $i=>$d){
            if($result!=''){
                $result.="&";
            }
            $result.="$i=$d";
        }
        return $result;
    }
    /**
     * 
     * @return AdminUser
     */
    public static function getUserLogin(){
        return Yii::app()->user;
    }
    public static function getTitleList(){
        return array(
            'Tuan'=>'Tuan',
            'Nyonya'=>'Nyonya',
            'Nona'=>'Nona',
        );
    }
    /**
     * 
     * @param type $jamAwal y-m-d h-m-s
     * @param type $jamAkhir y-m-d h-m-s
     */
    public static function selisihJam($jamAwal,$jamAkhir){
        $result=Yii::app()->db->createCommand("
            select (hour(timediff('$jamAwal','$jamAkhir')))*(IF('$jamAwal'<'$jamAkhir',1,-1))  as selisih_jam
            ")->queryRow();
        return $result['selisih_jam'];
    }
    public static function show_array($array){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
    /**
     * 
     * @param type $url
     * @return type return Yii::app()->baseUrl.'/'.$url;
     */
    public static function getImageUrl($url){
        return Yii::app()->baseUrl.'/'.$url;
    }
    public static function removeFile($dir){
        if(file_exists($dir)){
            unlink($dir);
            return true;
        }else
            return false;
    }
    /**
     * 
     * @param type $datetimeMysqlFormat y-m-d jam:menit:detik
     */
    public static function parseDateTimeFormat($datetimeMysqlFormat){
        if($datetimeMysqlFormat==null || $datetimeMysqlFormat=='')
            return '';
        $parse=  explode(' ', $datetimeMysqlFormat);
        $parseTnggal=  explode('-', $parse[0]);
        $jam=  explode(':', $parse[1]);
        return "$parseTnggal[2] ".Helper::getBulan($parseTnggal[1])." $parseTnggal[0] $jam[0]:$jam[1]";
    }
    public static function dayOfWeek($day){
        $data=array(
            1=>'Senin',
            2=>'Selasa',
            3=>'Rabu',
            4=>'Kamis',
            5=>'Jumat',
            6=>'Sabtu',
            7=>'Minggu',
        );
        return $data[$day];
    }
    /**
     * 
     * @param type $bln jika $bln null return array() list bulan, kalo bukan maka ambil nama bilan berdasarkan indexnya 1-12
     * @return string
     */
    public static function getBulan($bln=null){
        $bulanList=array(
            1=>'Januari',
            2=>'Februari',
            3=>'Maret',
            4=>'April',
            5=>'Mei',
            6=>'Juni',
            7=>'Juli',
            8=>'Agustus',
            9=>'September',
            10=>'Oktober',
            11=>'November',
            12=>'Desember',
        );
        if($bln==null)
            return $bulanList;
        else
            return $bulanList[$bln];
    }
}

?>
