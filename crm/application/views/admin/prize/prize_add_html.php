<?php 
$this->load->view('admin/header.php');
 $this->load->helper('datetime'); 
$atthemoment=date('Y-m-d');  
$pathname='prize';
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
						<a href="#">Ödül Listesi</a>
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
					
			
										
										
										
																		
								
			
		<div class="row-fluid sortable">
			<div class="box span12">
			<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>ÖDÜL EKLE</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
			<div class="box-content">
					<?php  echo form_open_multipart (base_url().'admin/'.$pathname.'/insert/' ,array('id' => 'form-horizontal','class'=>'form-horizontal')); ?> 
 <fieldset>	
				
						  <fieldset>
							<legend></legend>
							
							<div class="control-group">
								<label class="control-label" for="selectError2">Grup</label>
								<div class="controls">
									<select data-placeholder="Departman/Personel Seçiniz" id="selectError2" name="personal_id" data-rel="chosen">
										<option value=""></option>
										<?php
                                         $val="start";
										 $positionname=array();
										  $num=0;
										 ?><optgroup label="Departman"><?php
										foreach($department as $lookdep){
                                       	$cm=$lookdep->position;
											if ($val == $cm) { 
											?>
									<option value="<?php echo $lookdep->pst;?>"><?php echo $lookdep->name.' '.$lookdep->surname ?></option>
                                     <?php  }   else { ?>
									 </optgroup>	
                                   <optgroup label=<?php echo $cm  ?>>
								   <option value="<?php echo $lookdep->pst;?>"><?= $lookdep->name.' '.$lookdep->surname ?></option>
                                   <?php 
								   $positionname[]=$cm;
								   $val=$cm;}}
								   ?>
								  </select>
								</div>
							  </div>
							  
							<div class="control-group">
							  <label class="control-label" for="typeahead">Ödül Adı </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="prize_name">
							  </div>
							</div>
							
							
							<div class="control-group">
							  <label class="control-label" for="typeahead">Ödül Türü </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="prize_type">
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="typeahead">Ödülün Alındığı Yer </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="prize_accept_place">
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Ödül Alma Tarihi</label>
							  <div class="controls">
								<input type="text"  class="input-xlarge datepicker" name="prize_accept_date" id="date01">
							  </div>
							</div>
							
						<div><input type="hidden"  class="input-xlarge datepicker" name="prize_record_date" id="date05"  /></div>
							 
							

							        
							
						<div class="form-actions">		
					 <input type="submit" class="btn btn-primary" id="passwordsubmit" name="passwordsubmit" value="Bilgileri Kaydet">
							</div>
						  </fieldset>
						<?php echo form_close(); ?>  

					</div>
			</div>
			</div>
       
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