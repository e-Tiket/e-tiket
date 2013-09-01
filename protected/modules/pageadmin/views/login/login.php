<div class="span12 center HeaderTitle login-header">
    <h2>Login Admin</h2>
</div><!--/span-->    
<div class="well span5 center login-box">
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form loginform',
	'enableAjaxValidation'=>true,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>
        <div class="alert alert-info">
            Please login with your Username and Password.
        </div>
        <?php echo $form->error($model,'username',array('class'=>'alert alert-error')); ?>
        <?php echo $form->error($model,'password',array('class'=>'alert alert-error')); ?>
        <fieldset>
            <div class="input-prepend" title="Username" data-rel="tooltip">
                <span class="add-on"><i class="icon-user"></i></span>
                <?php echo $form->textField($model,'username',array('class'=>'input-large span10','autofocus'=>'autofocus')); ?>
            </div>
            <div class="clearfix"></div>

            <div class="input-prepend" title="Password" data-rel="tooltip">
                <span class="add-on"><i class="icon-lock"></i></span>
                <?php echo $form->passwordField($model,'password',array('class'=>'input-large span10')); ?>
            </div>
            <div class="clearfix"></div>
            <div class="input-prepend">
                <label class="remember checkbox" for="remember">
                    <?php echo $form->checkBox($model, 'rememberMe'); ?> Remember me
                </label>
            </div>
            <p class="center span5">
                <button type="submit" class="btn btn-default btn-block">Login</button>
            </p>
        </fieldset>
    <?php $this->endWidget(); ?>
</div><!--/span-->