<div class="checkout-outer" id="">
        <div class="checkout-header login-form"><h4><i class='icon icon-user'></i> Login</h4></div>
        <div class="checkout-content login-form" >
            <form name="login-form" action="<?php echo Yii::app()->createUrl('user/login', array('returnUrl'=>$returnUrl))?>" method="POST">
                <table style="width: 100%">
                    <tr>
                        <td>Username</td>
                        <td><input type="text" value="" name='login[username]' class='required'></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" value="" name='login[password]' class='required'></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <label class="checkbox">
                                <input type="checkbox" value="1" name='rememberMe' > Remember Me
                            </label>
                        </td>
                    </tr>
                    <tr class="modal-footer">
                        <td align="left">Belum punya akun? <a href='<?php echo Yii::app()->homeUrl;?>' id='daftar-link' class="to-togle">Daftar</a></td>
                        <td style="text-align: right"><button class='btn btn-primary'>Login</button></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="checkout-header daftar-form"><h4><i class='icon icon-user'></i> Daftar</h4></div>
        <div class="checkout-content daftar-form">
            <form name="daftar-form" action="<?php echo Yii::app()->createUrl('user/daftar', array('returnUrl'=>$returnUrl))?>" method="POST">
                <table>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" value="" name='daftar[username]' class='required'></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" value="" name='daftar[password]' class='required'></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" value="" name='daftar[email]' class='required email'></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>
                            <input type="text"  name='daftar[nama_depan]' value="" class='required span2' placeholder="nama depan">
                            <input type="text"  name='daftar[nama_belakang]' value="" class='required span3' placeholder="nama belakang">
                        </td>
                    </tr>
                    <tr>
                        <td>No Telp</td>
                        <td><input type="text" value="" name='daftar[no_telp]' class='required'></td>
                    </tr>
                    <tr>
                        <td>No Telp Lainnya</td>
                        <td><input type="text" value="" name='daftar[no_telp_lainnya]' class=''></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><textarea name='daftar[alamat]' rows='3' class='span3'></textarea></td>
                    </tr>
                    <tr class="modal-footer">
                        <td align="left">Sudah punya akun? <a href='<?php echo Yii::app()->homeUrl;?>' id='login-link' class="to-togle">Login</a></td>
                        <td style="text-align: right"><button class='btn btn-primary'>Daftar</button></td>
                    </tr>
                </table>
            </form>
        </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
   <?php if(empty($type) || $type!='daftar'){?> 
           $('.daftar-form').hide();
   <?php }else{?>        
           $('.login-form').hide();
   <?php }?>        
       $('.to-togle').click(function(event){
           event.preventDefault();
           $('.login-form').toggle();
           $('.daftar-form').toggle();
       });
       $('form[name=daftar-form]').validate();
       $('form[name=login-form]').validate();
});
</script>