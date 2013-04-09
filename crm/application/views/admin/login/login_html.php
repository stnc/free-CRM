<?php
$this -> load -> view('admin/header.php');
$this -> load -> helper('datetime');
 ?>


<body>
		<!-- topbar starts -->

	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
		
			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>STNC CRM</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
					<?php echo validation_errors(); ?>
					</div>
<?php echo form_open (base_url() . 'admin/login', array('id' => 'form-horizontal', 'class' => 'form-horizontal')); ?> 
						<fieldset>
					
							<div class="input-prepend" title="Email adresiniz" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span>
								<input autofocus class="input-large span10" name="email_address" id="email_address" type="text" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Şifreniz" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password"  />
							</div>
							<div class="clearfix"></div>

							<!--<div class="input-prepend">
							<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
							</div>
							<div class="clearfix"></div>-->

							<p class="center span5">
							<button type="submit" class="btn btn-primary">Giriş</button>
							</p>
						</fieldset>
						<?php echo form_close(); ?>
					</form>
				</div><!--/span-->
			</div><!--/row-->
				</div><!--/fluid-row-->
		
	</div><!--/.fluid-container-->

		<?php  $this -> load -> view('admin/footer.php'); ?>
