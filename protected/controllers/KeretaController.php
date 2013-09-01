<?php
class KeretaController extends MyController{
    public function actionIndex(){
        require_once 'simple_html_dom.php';
        $content="";
        if($_POST){
            $postdata = http_build_query($_POST);

            $opts = array('http' =>
                array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $postdata
                )
            );

            $context  = stream_context_create($opts);
            
            $result = file_get_html('https://tiket.kereta-api.co.id?'.Helper::generateGetParam($_GET), false, $context);
            foreach($result->find("div.col_three_fifth") as $a){
                $content=$a;
            }
        }else{
            //parsing form
            $result=  file_get_html("https://tiket.kereta-api.co.id/?#reservasi");
        }
        foreach($result->find("div.col_two_fifth") as $a){
            $form=$a;
        }
        
//        $form=$result->find("div.col_two_fifth",0)->plaintext;
        $this->render("index",array('form'=>$form,'content'=>$content));
    }
}
?>
