<?php
$this -> load -> view('admin/header.php');
$this -> load -> helper('datetime');
$pathname='movable';
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
						<a href="#"><?php  echo $this -> lang -> line('movable_Text_edit'); ?></a>
					</li>
				</ul>
			</div>
			
			<?php if (validation_errors()){  ?>			
			<div class="box-content alerts">
						
						<div class="alert alert-error">
							<button data-dismiss="alert" class="close" type="button">×</button>
							<h4 class="alert-heading">Uyarı!!</h4>
							<p>Bilgileri ekleme sırasında bazı hatalar oluştu lütfen bilgilerinizi tekrar kontrol ediniz. 
							<br/>
								<?php echo $err; ?>
							</p>
						</div>
					</div>
			<?php }  if ($msg!='' or $this->input->get('success')=='ok' ){ ?>			
			<div class="box-content alerts">
						
						<div class="alert alert-success">
							<button data-dismiss="alert" class="close" type="button">×</button>
							<h4 class="alert-heading">İşlem Başarı ile kaydedildi</h4>
							<p><?php  echo $msg; ?> </p>
						</div>
					</div>
			<?php } ?>
			
			
            <div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i><?php   echo $this -> lang -> line('movable_Text_edit'); ?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
	<?php 
		if ($movables){		
		foreach( $movables as $row ):
	echo form_open_multipart (base_url().'admin/'.$pathname.'/update/'.$row->id.'' ,array('id' => 'form-horizontal','class'=>'form-horizontal')); ?> 
 <fieldset>	
				<div class="form-actions" style="padding-left: 7px;">						 
				<?php echo form_submit(array("name"=>"passwordsubmit","class"=>"btn btn-primary", "value"=>'Bilgileri Kaydet')) ?>
				</div>
						  <fieldset>
							<legend><?php  echo $this -> lang -> line('movable_Text_edit'); ?></legend>
							
							
						<div class="control-group<? echo form_error('personal_id') != '' ? ' error' : ''; ?>">
			<label class="control-label" for="personal_id"> <?php echo $this -> lang -> line('movable_personal_id'); ?> </label>
								<div class="controls">
									  <select  id="personal_id" name="personal_id"" data-rel="chosen">
									  	<?php foreach($personals as $v): 
										if ( $row->personal_id==$v->id ){ ?>  	
						<option  selected="selected" value="<?php echo $v -> id; ?>"><?php echo $v -> name; ?></option>
						<?php } else { ?>
						<option value="<?php echo $v -> id; ?>"><?php echo $v -> name; ?></option>
						<?php }  endforeach; ?>       
					</select>			  
					<span class="help-inline"> <? echo  form_error('personal_id')  ?></span> 
								</div>
							  </div>
							

							
		<div class="control-group<? echo form_error('movable_number') != '' ? ' error' : ''; ?>">
		<label class="control-label" for="movable_number"><?php echo $this -> lang -> line('movable_movable_number'); ?></label>
		<div class="controls">
		<input type="text" class="input-xlarge" id="movable_number" 
		name="movable_number" value="<?php echo set_value('movable_number', $row -> movable_number); ?>'/>
		<span class="help-inline"> <? echo form_error('movable_number'); ?></span>
		</div>
		</div>

							  
							  
			<div class="control-group<? echo form_error('series_number') != '' ? ' error' : ''; ?>">
			<label class="control-label" for="series_number"><?php echo $this -> lang -> line('movable_series_number'); ?></label>
			<div class="controls">
		<input type="text" class="input-xlarge" id="series_number" name="series_number"
		value="<?php echo set_value('series_number', $row -> series_number); ?>">
			<span class="help-inline"> <? echo  form_error('series_number')  ?></span>
			</div>
			</div>
				

				
		
							
							  
			<div class="control-group<? echo form_error('unit') != '' ? ' error' : ''; ?>">
				<label class="control-label" for="unit"><?php echo $this -> lang -> line('movable_unit'); ?></label>
							  <div class="controls">
	<input type="text" class="input-xlarge" id="unit" name="unit" value="<?php echo set_value('unit', $row -> unit); ?>">
								 <span class="help-inline"> <? echo  form_error('unit')  ?></span>
							  </div>
							</div>
							
							
							
		
							
							 <div class="control-group<? echo form_error('give_date') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="give_date"><?php echo $this -> lang -> line('movable_give_date'); ?></label>
							  <div class="controls">
	<input type="text" class="input-xlarge datepicker" id="give_date" name="give_date" 
	value="<?php echo set_value('give_date', tr_date($row -> give_date)); ?>">
								 <span class="help-inline"> <? echo  form_error('give_date')  ?></span>
							  </div>
							</div>
							
							
							
							 <div class="control-group<? echo form_error('take_date') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="take_date"><?php echo $this -> lang -> line('movable_take_date'); ?></label>
							  <div class="controls">
	<input type="text" class="input-xlarge datepicker" id="take_date" name="take_date" 
	value="<?php echo set_value('take_date', tr_date($row -> take_date)); ?>">
								 <span class="help-inline"> <? echo  form_error('take_date')  ?></span>
							  </div>
							</div>
							
							
							
							  <div class="control-group<? echo form_error('comment') != '' ? ' error' : ''; ?>">			
							  <label class="control-label" for="comment"><?php echo $this -> lang -> line('movable_comment'); ?></label>
							  <div class="controls">
			<textarea  style="width: 277px; height: 213px;" id="comment" name="comment"
			rows="3"><?php echo set_value('comment', $row -> comment); ?></textarea>
								 <span class="help-inline"> <? echo  form_error('comment')  ?></span>
							  </div>
							</div>
							  
								<div class="form-actions">		
					 <input type="submit" class="btn btn-primary" id="passwordsubmit" name="passwordsubmit" value="Bilgileri Kaydet">
							</div>
							
						  </fieldset>
						  
						<?php  endforeach; }  echo form_close(); ?>  
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
