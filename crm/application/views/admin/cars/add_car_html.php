<?php
$this -> load -> view('admin/header.php');
$this -> load -> helper('datetime');
$pathname='cars';
 ?>


<body>
		<!-- topbar starts -->
<?php  $this -> load -> view('admin/top_bar.php'); ?>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<?php  $this -> load -> view('admin/left_bar.php'); ?>
				<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Uyarı!</h4>
					<p> <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> lütfen etkinleştirin.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Anasayfa</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Personel bilgi girişi</a>
					</li>
				</ul>
			</div>
			
			<?php 
				if ($this->input->post('passwordsubmit')){
			if (!validation_errors()){ redirect (base_url().'admin/'.$pathname.'/update/'.$msg.'/?success=ok');}
			}
			
			if (validation_errors()) { ?>
			
			<div class="box-content alerts">
						
						<div class="alert alert-error">
							<button data-dismiss="alert" class="close" type="button">×</button>
							<h4 class="alert-heading">Uyarı!!</h4>
							<p>Bilgileri ekleme sırasında bazı hatalar oluştu lütfen bilgilerinizi tekrar kontrol ediniz. 
							<br/>
								<?php echo $err  ?>
							</p>
						</div>
					</div>
			<?php } ?>	
						
						
			
			<?php  //if ($msg1!=''){ ?>			
		<!--	<div class="box-content alerts">
						
						<div class="alert alert-success">
							<button data-dismiss="alert" class="close" type="button">×</button>
							<h4 class="alert-heading">İşlem Başarılı</h4>
							<p><?php  //echo $msg1; ?> </p>
						</div>
					</div>-->
			<?php // } ?>
			
			
            <div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i><?php  echo $this -> lang -> line('car_Text'); ?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
	<?php  echo form_open_multipart(base_url() . 'admin/'.$pathname.'/add/', array('id' => 'form-horizontal', 'class' => 'form-horizontal')); ?> 
 <fieldset>	
				<div class="form-actions" style="padding-left: 7px;">						 
				<?php echo form_submit(array("name"=>"passwordsubmit","class"=>"btn btn-primary", "value"=>'Bilgileri Kaydet')) ?>
				</div>
						  <fieldset>
							<legend><?php  echo $this -> lang -> line('car_Text'); ?></legend>
							
							
						<div class="control-group<? echo form_error('license_plate') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="license_plate"><?php  echo $this -> lang -> line('car_license_plate'); ?></label>
								<div class="controls">
				<input class="input-xlarge focused" id="license_plate" name="license_plate" type="text" value="<?php echo set_value('license_plate'); ?>">
				<span class="help-inline"> <? echo form_error('license_plate'); ?></span>
								</div>
							  </div>
							
							
							
							
							  <div class="control-group<? echo form_error('delivery_date') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="delivery_date"><?php echo $this -> lang -> line('car_delivery_date'); ?></label>
							  <div class="controls">
	<input type="text" class="input-xlarge datepicker" id="delivery_date" name="delivery_date" value="<?php echo set_value('delivery_date'); ?>">
								 <span class="help-inline"> <? echo  form_error('delivery_date')  ?></span>
							  </div>
							</div>

							
								
							  
							  
							  
							  
							   <div class="control-group<? echo form_error('delivery_date') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="delivery_km"><?php echo $this -> lang -> line('car_delivery_km'); ?></label>
							  <div class="controls">
	<input type="text" class="input-xlarge" id="delivery_km" name="delivery_km" value="<?php echo set_value('delivery_km'); ?>">
								 <span class="help-inline"> <? echo  form_error('delivery_km')  ?></span>
							  </div>
							</div>
							
							<div class="control-group<? echo $err_form1 = form_error('back_to_date') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="back_to_date"><?php  echo $this -> lang -> line('car_back_to_date'); ?></label>
								<div class="controls">
				<input class="input-xlarge datepicker" id="back_to_date" name="back_to_date" type="text" value="<?php echo set_value('back_to_date'); ?>">
				<span class="help-inline"> <? echo form_error('back_to_date'); ?></span>
								</div>
							  </div>
							
							  
							    <div class="control-group<? echo form_error('delivery_date') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="total_accident"><?php echo $this -> lang -> line('car_total_accident'); ?></label>
							  <div class="controls">
	<input type="text" class="input-xlarge" id="total_accident" name="total_accident" value="<?php echo set_value('total_accident'); ?>">
								 <span class="help-inline"> <? echo  form_error('total_accident')  ?></span>
							  </div>
							</div>
							
							
							
							 <div class="control-group<? echo form_error('delivery_date') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="total_equivalent"><?php echo $this -> lang -> line('car_total_equivalent'); ?></label>
							  <div class="controls">
	<input type="text" class="input-xlarge" id="total_equivalent" name="total_equivalent" value="<?php echo set_value('total_equivalent'); ?>">
								 <span class="help-inline"> <? echo  form_error('total_equivalent')  ?></span>
							  </div>
							</div>
							
							
							
							 <div class="control-group<? echo form_error('first_accident_date') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="first_accident_date"><?php echo $this -> lang -> line('car_first_accident_date'); ?></label>
							  <div class="controls">
	<input type="text" class="input-xlarge datepicker" id="first_accident_date" name="first_accident_date" value="<?php echo set_value('first_accident_date'); ?>">
								 <span class="help-inline"> <? echo  form_error('first_accident_date')  ?></span>
							  </div>
							</div>
							
							
							 <div class="control-group<? echo form_error('last_accident_date') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="last_accident_date"><?php echo $this -> lang -> line('car_last_accident_date'); ?></label>
							  <div class="controls">
	<input type="text" class="input-xlarge datepicker" id="last_accident_date" name="last_accident_date" value="<?php echo set_value('last_accident_date'); ?>">
								 <span class="help-inline"> <? echo  form_error('last_accident_date')  ?></span>
							  </div>
							</div>
							
							
							
							
							 <div class="control-group<? echo form_error('delivery_date') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="back_to_km"><?php echo $this -> lang -> line('car_back_to_km'); ?></label>
							  <div class="controls">
	<input type="text" class="input-xlarge" id="back_to_km" name="back_to_km" value="<?php echo set_value('back_to_km'); ?>">
								 <span class="help-inline"> <? echo  form_error('back_to_km')  ?></span>
							  </div>
							</div>
							
							
							
							  <div class="control-group<? echo form_error('notes') != '' ? ' error' : ''; ?>">			
							  <label class="control-label" for="notes"><?php echo $this -> lang -> line(''); ?>Not</label>
							  <div class="controls">
			<textarea  style="width: 277px; height: 213px;" id="notes" name="notes" rows="3"><?php echo set_value('notes'); ?></textarea>
								 <span class="help-inline"> <? echo  form_error('notes')  ?></span>
							  </div>
							</div>
							  
								<div class="form-actions">		
					 <input type="submit" class="btn btn-primary" id="passwordsubmit" name="passwordsubmit" value="Bilgileri Kaydet">
							</div>
							
						  </fieldset>
						  
						<?php echo form_close(); ?>  
					</div>
				</div><!--/span-->

			</div>
			<!--/row--><!--/row-->
				  

		  
       
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Ayarlar</h3>
			</div>
			<div class="modal-body">
				<p>deneme amaçlıdır</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Kapat</a>
				<a href="#" class="btn btn-primary">Kaydet</a>
			</div>
		</div>

										
	<?php  $this -> load -> view('admin/footer.php'); ?>
