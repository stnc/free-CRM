<?php
$this -> load -> view('admin/header.php');
$this -> load -> helper('datetime');
$pathname='car_accident';
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
						<a href="#">Araç kaza bilgi ekleme</a>
					</li>
				</ul>
			</div>
			
			<?php 
				if ($this->input->post('passwordsubmit')){
			if (!validation_errors()){ redirect (base_url().'admin/'.$pathname.'/update_accident/'.$msg.'/?success=ok');}
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
						
						
		
			
			
            <div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>  <?php echo $this -> lang -> line('car_accident_Text'); ?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
	<?php  echo form_open(base_url() . 'admin/'.$pathname.'/add_accident/', array('id' => 'form-horizontal', 'class' => 'form-horizontal')); ?> 
 <fieldset>	
				<div class="form-actions" style="padding-left: 7px;">						 
				<?php echo form_submit(array("name"=>"passwordsubmit","class"=>"btn btn-primary", "value"=>'Bilgileri Kaydet')) ?>
				</div>
						  <fieldset>
							<legend><?php  echo $this -> lang -> line('car_accident_Text'); ?></legend>
							
							
	
							  <div class="control-group<? echo form_error('accident_date') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="accident_date"><?php echo $this -> lang -> line('car_accident_accident_date'); ?></label>
							  <div class="controls">
	<input type="text" class="input-xlarge datepicker" id="accident_date" name="accident_date" value="<?php echo set_value('accident_date'); ?>'/>
								 <span class="help-inline"> <? echo  form_error('accident_date')  ?></span>
							  </div>
							</div>



							
							<div class="control-group<? echo form_error('repairs_price') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="repairs_price"><?php  echo $this -> lang -> line('car_accident_repairs_price'); ?></label>
								<div class="controls">
				<input class="input-xlarge" id="repairs_price" name="repairs_price" type="text" value="<?php echo set_value('repairs_price'); ?>">
				<span class="help-inline"> <? echo form_error('repairs_price'); ?></span>
								</div>
							  </div>
							

							
							
							  <div class="control-group<? echo form_error('comment') != '' ? ' error' : ''; ?>">			
							  <label class="control-label" for="comment"><?php echo $this -> lang -> line('car_accident_comment'); ?></label>
							  <div class="controls">
			<textarea  style="width: 277px; height: 213px;" id="comment" name="comment" rows="3"><?php echo set_value('comment'); ?></textarea>
								 <span class="help-inline"> <? echo  form_error('comment')  ?></span>
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
