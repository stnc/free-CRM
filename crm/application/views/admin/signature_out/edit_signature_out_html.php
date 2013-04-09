<?php 
$this->load->view('admin/header.php');
 $this->load->helper('datetime'); 
$pathname='signature_out'; 
 ?>


<body>
		<!-- topbar starts -->
<?php  $this->load->view('admin/top_bar.php'); ?>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<?php  $this->load->view('admin/left_bar.php'); ?>
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
						<a href="#"><?php  echo $this->lang->line('signature_Text_edit'); ?></a>
					</li>
				</ul>
			</div>
			
			<?php 
			/*	if ($this->input->post('passwordsubmit')){
			if (!validation_errors()){ redirect (base_url().'admin/'.$pathname.'/add/'.$msg.'/?success=ok');}
			}*/
			
			if ($msg!='') { ?>
			
			<div class="box-content alerts">
						
						<div class="alert alert-error">
							<button data-dismiss="alert" class="close" type="button">×</button>
							<h4 class="alert-heading">Uyarı!!</h4>
							<p>
							<br/>
								<?php echo $msg  ?>
							</p>
						</div>
					</div>
			<?php } ?>	
						
						
			
		
			
            <div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i><?php  echo $this->lang->line('signature_Text_edit'); ?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
	<?php  
	if ($signature){		
		foreach( $signature as $row ):
	echo form_open_multipart (base_url().'admin/'.$pathname.'/edit/' ,array('id' => 'form-horizontal','class'=>'form-horizontal')); ?> 
 <fieldset>	
				<div class="form-actions" style="padding-left: 7px;">						 
				<?php echo form_submit(array("name"=>"passwordsubmit","class"=>"btn btn-primary", "value"=>'İmzala')) ?>
				</div>
						  <fieldset>
						
					
							

							
			<div class="control-group">
		<label class="control-label" for="signature_number"><?php echo $this->lang->line('signature_out_date'); ?></label>
		<div class="controls">
	    <?php echo date("j.n.Y H:i");?>
		<span class="help-inline"></span>
		</div>
		</div>

							  
							  
		
							  <div class="control-group<? echo   form_error('today_report') != '' ? ' error' : ''; ?>">			
					<label class="control-label" for="today_report"><?php echo $this->lang->line('signature_today_report'); ?></label>
							  <div class="controls">
<textarea style="width: 879px; height: 200px;" id="today_report" name="today_report" rows="3"><?php echo set_value('today_report',$row->today_report); ?></textarea>
	<input type="hidden" id="pid" value="1" name="pid">		
								 <span class="help-inline"> <? echo  form_error('today_report')  ?></span>
							  </div>
							</div>
							  
								
							<div class="form-actions" style="padding-left: 7px;">						 
				<?php echo form_submit(array("name"=>"passwordsubmit","class"=>"btn btn-primary", "value"=>'İmzala')) ?>
				</div>
						  </fieldset>
						  
						<?php endforeach; } echo form_close(); ?>  
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

										
	<?php  $this->load->view('admin/footer.php'); ?>
