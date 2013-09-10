</div><!--end row-->


		</div><!--end conatiner-->


		<!--begain footer-->
		<footer>
		<div class="footerOuter">
			<div class="container">
				<div class="row-fluid">

					<div class="span6">
						<div class="titleHeader clearfix">
							<h3>Usefull Links</h3>
						</div>

						
						<div class="usefullLinks">
							<div class="row-fluid">
								<div class="span6">
									<ul class="unstyled">
										<li><a class="invarseColor" href="#"><i class="icon-caret-right"></i> About Us</a></li>
										<li><a class="invarseColor" href="#"><i class="icon-caret-right"></i> Delivery Information</a></li>
										<li><a class="invarseColor" href="#"><i class="icon-caret-right"></i> Privecy Police</a></li>
										<li><a class="invarseColor" href="#"><i class="icon-caret-right"></i> Tarms &amp; Condations</a></li>
									</ul>
								</div>

								<div class="span6">
									<ul class="unstyled">
										<li><a class="invarseColor" href="#"><i class="icon-caret-right"></i> Surf Brands</a></li>
										<li><a class="invarseColor" href="#"><i class="icon-caret-right"></i> Customer Support</a></li>
										<li><a class="invarseColor" href="#"><i class="icon-caret-right"></i> Special Gifs</a></li>
										<li><a class="invarseColor" href="#"><i class="icon-caret-right"></i> Browse Site Map</a></li>
									</ul>
								</div>
							</div>
						</div>

					</div><!--end span6-->

					<div class="span3">
						<div class="titleHeader clearfix">
							<h3>Contact Info</h3>
						</div>

						<div class="contactInfo">
							<ul class="unstyled">
								<li>
									<button class="btn btn-small">
										<i class="icon-volume-up"></i>
									</button>
									Call Us: <a class="invarseColor" href="#">5246-4697-891</a>
								</li>
								<li>
									<button class="btn btn-small">
										<i class="icon-envelope-alt"></i>
									</button>
									<a class="invarseColor" href="#">shopfine@shopfine.com</a>
								</li>
								<li>
									<button class="btn btn-small">
										<i class="icon-map-marker"></i>
									</button>
									22 Avenue Park, Los Angeles
								</li>
							</ul>
						</div>

					</div><!--end span3-->

					<div class="span3">
						<div class="titleHeader clearfix">
							<h3>Newslatter</h3>
						</div>

						<div class="newslatter">
							<form method="#" action="#">
								<input class="input-block-level" type="text" name="email" value="" placeholder="Your Name..." Name="">
								<input class="input-block-level" type="text" name="email" value="" placeholder="Your E-Mail..." Name="">
								<button class="btn btn-block" type="submit" name="">Join Us Now</button>
							</form>
						</div>

					</div><!--end span3-->

				</div><!--end row-fluid-->

			</div><!--end container-->
		</div><!--end footerOuter-->

		<div class="container">
			<div class="row">
				<div class="span12">
					<ul class="payments inline pull-right">
						<li class="visia"></li>
						<li class="paypal"></li>
						<li class="electron"></li>
						<li class="discover"></li>
					</ul>
					<p>© Copyrights 2012 for shopfine.com</p>
				</div>
			</div>
		</div>
		</footer>
		<!--end footer-->

	</div><!--end mainContainer-->


	<!-- Sidebar Widget
	================================================== -->
	<div class="switcher">
		<h3>Site Switcher</h3>
		<a class="Widget-toggle-link">+</a>

		<div class="switcher-content clearfix">
			<div class="layout-switch">
				<h4>Layout Style</h4>
				<div class="btn-group">
					<a id="wide-style" class="btn">Wide</a>
	  				<a id="boxed-style" class="btn">Boxed</a>
				</div>
			</div><!--end layout-switch-->

			<div class="color-switch clearfix">
				<h4>Color Style</h4>
				<a id="orange-color" class="color-switch-link">orange</a>
				<a id="blue-color" class="color-switch-link">blue</a>
				<a id="green-color" class="color-switch-link">green</a>
				<a id="brown-color" class="color-switch-link">brown</a>
				<a id="red-color" class="color-switch-link">red</a>
			</div><!--end color-switch-->

			<div class="pattern-switch">
				<h4>BG Pattern</h4>
				<a style="background:url(<?php echo Yii::app()->theme->baseUrl; ?>/img/backgrounds/retina_wood.png);">retina_wood</a>
				<a style="background:url(<?php echo Yii::app()->theme->baseUrl; ?>/img/backgrounds/bgnoise_lg.png);">bgnoise_lg</a>
				<a style="background:url(<?php echo Yii::app()->theme->baseUrl; ?>/img/backgrounds/purty_wood.png);">purty_wood</a>
				<a style="background:url(<?php echo Yii::app()->theme->baseUrl; ?>/img/backgrounds/irongrip.png);">irongrip</a>
				<a style="background:url(<?php echo Yii::app()->theme->baseUrl; ?>/img/backgrounds/low_contrast_linen.png);">low_contrast_linen</a>
				<a style="background:url(<?php echo Yii::app()->theme->baseUrl; ?>/img/backgrounds/tex2res5.png);">tex2res5</a>
				<a style="background:url(<?php echo Yii::app()->theme->baseUrl; ?>/img/backgrounds/wood_pattern.png);">wood_pattern</a>
			</div><!--end pattern-switch-->

		</div><!--end switcher-content-->
	</div>
	<!-- End Sidebar Widget-->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/chosen.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/tambahan/dialog.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.chosen').chosen({ search_contains: true });
        })
    </script>
    
    <?php $this->beginContent('//layouts/live_chat'); ?>
<?php $this->endContent(); ?>
</body>

</html>