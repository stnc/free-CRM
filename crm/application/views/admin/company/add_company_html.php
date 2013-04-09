<?php
$this -> load -> view('admin/header.php');
$this -> load -> helper('datetime');
$pathname='company';
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
						<a href="<?php echo base_url().'admin/'.$pathname.'/' ?>"> Firma Listesi</a> <span class="divider">/</span>
					</li>
						<li>
						<a href="<?php echo base_url().'admin/'.$pathname.'/add/' ?>">  Firma ekle</a> 
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
								<?php echo $err;  //validation_errors();//?>
							</p>
						</div>
					</div>
			<?php } ?>	
						

			<div class="row-fluid sortable">
		  <div class="box span12">
					<div class="box-header well">
						<h2><i class="icon-th"></i> Firma Ekleme</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					
							
							
					<div class="box-content">
					
		<?php

						echo form_open_multipart(base_url() . 'admin/'.$pathname.'/add/', array('id' => 'form-horizontal', 'class' => 'form-horizontal'));
 ?> 
 <fieldset>
				
				<div class="form-actions" style="padding-left: 7px;">						 
				<?php echo form_submit(array("name"=>"passwordsubmit","class"=>"btn btn-primary", "value"=>'Bilgileri Kaydet')) ?>
							</div>	
						<ul class="nav nav-tabs" id="myTab">
							<li class="active"><a href="#company_commercial_info">Firma Ticari Bilgileri</a></li>
							<li><a href="#company_info">Firma Bilgileri</a></li>
							<li><a href="#adress_info">Firma Adres Bilgileri</a></li>
							<li><a href="#notes_info">Notlar</a></li>
							
							
						</ul>
						 
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane active" id="company_commercial_info">
								<h3>Firma Bilgisi</h3>
								<p>
								
			
							  
							   <div class="control-group<? echo form_error('company_name') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_name"><?php echo $this -> lang -> line('company_company_name'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="company_name" name="company_name" type="text" value="<?php echo set_value('company_name'); ?>">
								   <span class="help-inline"> <? echo  form_error('company_name')  ?></span>
								</div>
							  </div>
							  
							  
							    <div class="control-group<? echo form_error('company_type') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_type"><?php echo $this -> lang -> line('company_company_type'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="company_type" name="company_type" type="text" value="<?php echo set_value('company_type'); ?>">
								   <span class="help-inline"> <? echo  form_error('company_type')  ?></span>
								</div>
							  </div>
							  
							  
								<div class="control-group<? echo  form_error('company_authorized_name') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_authorized_name"><?php  echo $this -> lang -> line('company_authorized_name'); ?></label>
								<div class="controls">
				<input class="input-xlarge focused" id="company_authorized_name" name="company_authorized_name" type="text" value="<?php echo set_value('company_authorized_name'); ?>"  >
				<span class="help-inline"> <? echo  form_error('company_authorized_name')  ?></span>
								</div>
							  </div>
							  
							  
							<div class="control-group<? echo form_error('company_authorized_lastname') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_authorized_lastname"><?php echo $this -> lang -> line('company_authorized_lastname'); ?></label>
								<div class="controls">
			 <input class="input-xlarge focused" id="company_authorized_lastname" name="company_authorized_lastname" type="text" value="<?php echo set_value('company_authorized_lastname'); ?>">
								  <span class="help-inline"> <? echo form_error('company_authorized_lastname'); ?></span>
								</div>
							  </div>
							  
							
							  
							 
							  

							<div class="control-group<? echo form_error('company_webpage') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_webpage"><?php echo $this -> lang -> line('company_company_webpage'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="company_webpage" name="company_webpage" type="text" value="<?php echo set_value('company_webpage'); ?>">
								   <span class="help-inline"> <? echo  form_error('company_webpage')  ?></span>
								</div>
							  </div>
							  
							  
				           
						   <div class="control-group<? echo form_error('company_commercial_name') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_commercial_name"><?php echo $this -> lang -> line('company_company_commercial_name'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="company_commercial_name" name="company_commercial_name" type="text" value="<?php echo  set_value('company_commercial_name') ?>">
								   <span class="help-inline"> <? echo  form_error('company_commercial_name')  ?></span>
								</div>
							  </div>
							  
							 
							  
							  
		<div class="control-group<? echo form_error('company_referance_id') != '' ? ' error' : ''; ?>">
		<label class="control-label" for="company_referance_id"><?php echo $this -> lang -> line('company_company_referance_id'); ?></label>
		<div class="controls">
		<input type="text" class="input-xlarge" id="company_referance_id" name="company_referance_id" value="<?php echo set_value('company_referance_id'); ?>">
					<span class="help-inline"> <? echo  form_error('company_referance_id')  ?></span> 
						
								</div>
							  </div>
							  
							   
							  
							  
							   <div class="control-group<?php echo form_error('company_sector_id') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_sector_id"><?php echo $this -> lang -> line('company_company_sector_id'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="company_sector_id" name="company_sector_id" type="text" value="<?php echo set_value('company_sector_id'); ?>">
								   <span class="help-inline"> <? echo  form_error('company_sector_id')  ?></span>
								</div>
							  </div>
							  
							  
							  
							  <div class="control-group<? echo form_error('company_gsm') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_gsm"><?php echo $this -> lang -> line('company_company_gsm'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="company_gsm" name="company_gsm" type="text" value="<?php echo set_value('company_gsm'); ?>">
								   <span class="help-inline"> <? echo  form_error('company_gsm')  ?></span>
								</div>
							  </div>
							  
							  
							  
						<div class="control-group<? echo form_error('company_phone') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_phone"><?php echo $this -> lang -> line('company_company_phone'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="company_phone" name="company_phone" type="text" value="<?php echo set_value('company_phone'); ?>">
								   <span class="help-inline"> <? echo  form_error('company_phone')  ?></span>
								</div>
							  </div>
							  
							  
							  
						<div class="control-group<? echo form_error('company_company_fax') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_company_fax">
								<?php echo $this -> lang -> line('company_company_fax'); ?> 2</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="company_company_fax" name="company_company_fax" type="text" value="<?php echo set_value('company_company_fax'); ?>">
								   <span class="help-inline"> <? echo  form_error('company_company_fax')  ?></span>
								</div>
							  </div>
							  
							  
							 
							  
							  
								</p>
							</div>
							
					<div class="tab-pane" id="company_info">
								<h3> Firma Bilgileri  </h3>
								
								<div class="control-group<? echo form_error('company_sectors_id') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_sectors_id">Firmanın Sektörü</label>
								<div class="controls">
								  
					<select  id="company_sectors_id" name="company_sectors_id" data-rel="chosen">
						<?php foreach($sectors as $s): 
						if ( $this->input->post('company_sectors_id')==$s->id ){ ?>  	
						<option  selected="selected" value="<?php echo $s -> id; ?>"><?php echo $s -> title; ?></option>
						<?php } else { ?>
						<option value="<?php echo $s -> id; ?>"><?php echo $s -> title; ?></option>
						<?php }  endforeach; ?>  
						</select>
						
						
					<span class="help-inline"> <? echo  form_error('company_sectors_id')  ?></span> 
								</div>
							  </div>
							  
								
								<div class="control-group<? echo form_error('firm_risk') != '' ? ' error' : ''; ?>">
								<label class="control-label">Kayıt tipi risk durumu 
								<span>
								<a data-rel="tooltip" href="#" data-original-title=" Bu firma sizin için şu an veya ilerde tehlike oluşturuyormu onu belirtmek içindir. ">?</a>
								</span>
								</label>
								<div class="controls">
								<label class="radio">
							    <div class="radio" id="uniform-optionsRadios1">
							   <span class="">
			   <input type="radio" <?php echo set_value('firm_risk') =="1" ? 'checked="checked"' : "" ; ?>  value="1" id="optionsRadios1" name="firm_risk" style="opacity: 0;"></span></div>Firma </label>
								  <div style="clear:both"></div>
								  <label class="radio">
									<div class="radio" id="uniform-optionsRadios2"><span class="checked">
									<input type="radio" <?php echo set_value('firm_risk') =="2" ? 'checked="checked"' : "" ; ?>  value="2" id="optionsRadios2" name="firm_risk" style="opacity: 0;"></span></div>
									Kişi
								  </label>
								  <span class="help-inline"> <? echo  form_error('firm_risk')  ?></span>
								</div></div>
							  
					
							  
							  <div class="control-group<? echo form_error('relation_personal_id') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="relation_personal_id"><?php echo $this -> lang -> line('company_relation_personal_id'); ?></label>
								<div class="controls">
								 	  <select  id="relation_personal_id" name="relation_personal_id">
									  	<option value="">Seçiniz</option><?php 
				$this -> load -> model('General_model');
				$per = $this -> General_model -> list_personals();
			foreach ($per as $r_row) {
			if ( $this->input->post('relation_personal_id') == $r_row -> id)
				echo '<option selected="selected" value="'.$r_row -> id.'">'.$r_row ->name.' '.$r_row ->surname.'</option>';
				else 
			    echo '<option  value="'. $r_row->id.'">'. $r_row->name.' '.$r_row ->surname.'</option>';
			}?></select> <span class="help-inline"> <? echo  form_error('relation_personal_id')  ?></span>
								</div>
							  </div>
							  
							  
							 <div class="control-group">
								<label class="control-label">Yetki grup olacak mı ?</label>
								<div class="controls">
								  <label class="checkbox inline">
					<div class="checker" id="uniform-inlineCheckbox1"><span class="">
					<input type="checkbox" value="option1" id="inlineCheckbox1" style="opacity: 0;"></span></div> Evet
								  </label>
								  
								</div>
							  </div>
							  
							  
							

					
                  	
                        
						
						<div class="control-group<?php echo form_error('position_id') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="position_id"> Pozisyonlar </label>
								<div class="controls">
									  <select  id="position_id" name="position_id"  data-rel="chosen">
									  <option value=""> Seçiniz</option>
									  	<?php foreach($positions as $p):
									if ( $this->input->post('position_id')==$p->id ) { ?>  
						<option selected="selected" value="<?php echo $p -> id; ?>"> <?php echo $p -> position; ?></option>
							<?php } else { ?>
							<option value="<?php echo $p -> id; ?>"> <?php echo $p -> position; ?></option>
						<?php } endforeach; ?>    
					</select>
					<span class="help-inline"> <? echo  form_error('position_id')  ?></span> 
								</div>
							  </div>
							  
							  
							    <div class="control-group<? echo form_error('section_id') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="section_id"> Bölümler </label>
								<div class="controls">
									  <select  id="section_id" name="section_id">
				<?php 
					if ($this->input->post('passwordsubmit')){
				$this -> load -> model('General_model');
				$sss = $this -> General_model -> get_section_list($this->input->post('position_id'));
			foreach ($sss as $s) {
			if ( $this->input->post('section_id') == $s -> id)
				echo '<option selected="selected" value="'.$s -> id.'">'.$s ->section.'</option>';
				else 
			    echo '<option  value="'. $s->id.'">'. $s->section.'</option>';
			}}?></select>
					<span class="help-inline"> <? echo  form_error('section_id')  ?></span> 
								</div>
							  </div>
						
						
						
                                 
                 



							  	 
						
					
							  
							  
							  
							  <div class="control-group<? echo form_error('tax_verge') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="tax_verge"><?php echo $this -> lang -> line('company_tax_verge'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="tax_verge" name="tax_verge" type="text" value="<?php echo set_value('tax_verge'); ?>">
								   <span class="help-inline"> <? echo  form_error('tax_verge')  ?></span>
								</div>
							  </div>
							
							  
							  
							  
							   <div class="control-group<? echo form_error('tax_number') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="tax_number"><?php echo $this -> lang -> line('company_tax_number'); ?>  </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="tax_number" name="tax_number" type="text" value="<?php echo set_value('tax_number'); ?>">
								   <span class="help-inline"> <? echo  form_error('tax_number')  ?></span>
								</div>
							  </div>
							 
							
							 
							  
							
							
							  
 
								
								
							
					
							  
							  
						
							
							
						</div>
							
							
							<div class="tab-pane" id="adress_info">
								<h3> Adres Fatura  Bilgileri </h3>
								
								
	
							  
						<div class="control-group<? echo form_error('adress_1') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="adress_1"><?php echo $this -> lang -> line(''); ?>Adres Bilgisi</label>
							  <div class="controls">
								<textarea  id="adress_1" style="width: 279px; height: 114px;"  name="adress_1" rows="3"><?php echo set_value('adress_1'); ?></textarea>
								 <span class="help-inline"> <? echo  form_error('adress_1')  ?></span>
							  </div>
							</div>
							
							
							
							
							  <div class="control-group<? echo form_error('adress_city') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="adress_city"> İl </label>
								<div class="controls">
									  <select  id="adress_city" name="adress_city"">
									  	<?php foreach($city as $v): 
										if ( $this->input->post('adress_city')==$v->id ){ ?>  	
						<option  selected="selected" value="<?php echo $v -> id; ?>"><?php echo $v -> city; ?></option>
						<?php } else { ?>
						<option value="<?php echo $v -> id; ?>"><?php echo $v -> city; ?></option>
						<?php }  endforeach; ?>       
					</select>			  
					<span class="help-inline"> <? echo  form_error('adress_city')  ?></span> 
								</div>
							  </div>
							  
							  
							  
							   <div class="control-group<? echo form_error('adress_town') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="adress_town"> İlçe </label>
								<div class="controls">
									  <select  id="adress_town" name="adress_town">
									  	<option value="">Seçiniz</option>
									<?php 
					if ($this->input->post('passwordsubmit')){
				$this -> load -> model('General_model');
				$arrCities = $this -> General_model -> get_town_list($this->input->post('adress_city'));
			foreach ($arrCities as $cities) {
			if ( $this->input->post('adress_town') == $cities -> id)
				echo '<option selected="selected" value="'.$cities -> id.'">'.$cities ->town.'</option>';
				else 
			    echo '<option  value="'. $cities->id.'">'. $cities->town.'</option>';
			}}?></select>

									
					<span class="help-inline"> <? echo  form_error('adress_town')  ?></span> 
								</div>
							  </div>
							
							
							
							
								
								
							</div>
							
							

						
						<div class="tab-pane" id="notes_info">
								<h3> Notlar  </h3>
								
								
					<div class="control-group<? echo form_error('notes2') != '' ? ' error' : ''; ?>">
					
							  <label class="control-label" for="notes2"><?php echo $this -> lang -> line(''); ?>Not</label>
							  <div class="controls">
			<textarea  style="width: 351px; height: 209px;" id="notes2" name="notes2" rows="3"><?php echo set_value('notes2'); ?></textarea>
								 <span class="help-inline"> <? echo  form_error('notes2')  ?></span>
								
								 
							  </div>
							</div>
								
								
						</div>
						
						
						</div>
						
						<div class="form-actions">
							 		
					 <input type="submit" class="btn btn-primary" id="passwordsubmit" name="passwordsubmit" value="Bilgileri Kaydet">
							</div>
							
						  </fieldset>
						  
						<?php echo form_close(); ?>  
						
					</div>
				</div><!--/span--><!--/span--><!--/span-->
			</div><!--/row--><!--/row-->
				  

		  
       
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
