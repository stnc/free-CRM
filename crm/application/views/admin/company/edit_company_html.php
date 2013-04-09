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
						<a href="#">Firma bilgi düzenleme</a>
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
					<div class="box-header well">
						<h2><i class="icon-th"></i> Firma Bilgi Düzenleme</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					
							
							
					<div class="box-content">
					  <?php if ($companys){	
					  foreach( $companys as $row ):
		  //if (validation_errors())			
   echo form_open_multipart( 'admin/'.$pathname.'/update/'.$row->id.'?success=ok' ,array('id' => 'form-horizontal','class'=>'form-horizontal'));
// else echo form_open_multipart( 'admin/dashboard' ,array('id' => 'form-horizontal','class'=>'form-horizontal' ));
 ?> <fieldset>
				
				<div class="form-actions" style="padding-left: 20px;">						 
				<?php echo form_submit(array("name"=>"passwordsubmit","class"=>"btn btn-primary", "value"=>'Bilgileri Kaydet')) ?>
							</div>	
						<ul class="nav nav-tabs" id="myTab">
							<li class="active"><a href="#info">Firma Ticari Bilgileri</a></li>
							<li><a href="#adress_info">İletişim Bilgileri</a></li>
							<li><a href="#company_info">Firma Özlük</a></li>
							<li><a href="#notes_info">Notlar</a></li>
							
							
						</ul>
						 
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane active" id="info">
								<h3>Firma Bilgisi</h3>
								<p>
								
								

				<div class="control-group">
								<label class="control-label" for="company_authorized_name">Resim</label>
								<div class="controls">
			
			<input type="file" id="single_file" name="single_file" value="" />
								</div>
							  </div>
							  				

							  	<div class="control-group">
								<label class="control-label" for="company_authorized_name">Resim</label>
								<div class="controls">
			<?php if ($row -> picture!=''){ ?>
			<img style="width: 450px; height: 250px;" src="<?php echo base_url() . '/uploads/' . $row -> picture; ?>"/>
			<?php } ?>
								</div>
							  </div>
							  			
							  
								<div class="control-group<?php echo  form_error('company_authorized_name') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_authorized_name"><?php  echo $this -> lang -> line('company_page_name'); ?></label>
								<div class="controls">
				<input class="input-xlarge focused" id="company_authorized_name" name="company_authorized_name" type="text" value="<?php echo set_value('company_authorized_name', $row -> name); ?>" />
				<span class="help-inline"> <?php echo  form_error('company_authorized_name')  ?></span>
								</div>
							  </div>
							  
							  
							<div class="control-group<?php echo form_error('company_authorized_lastname') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_authorized_lastname"><?php echo $this -> lang -> line('company_page_company_authorized_lastname'); ?></label>
								<div class="controls">
			 <input class="input-xlarge focused" id="company_authorized_lastname" name="company_authorized_lastname" type="text" value="<?php echo set_value('company_authorized_lastname', $row -> company_authorized_lastname); ?>">
								  <span class="help-inline"> <?php echo form_error('company_authorized_lastname'); ?></span>
								</div>
							  </div>
							    
							  
							  
							<div class="control-group<?php echo form_error('company_webpage') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_webpage"><?php echo $this -> lang -> line('company_page_company_webpage'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="company_webpage" name="company_webpage" type="text" value="<?php echo set_value('company_webpage', $row -> company_webpage); ?>">
								   <span class="help-inline"> <?php echo  form_error('company_webpage')  ?></span>
								</div>
							  </div>
							  
							  
							  
							  <div class="control-group<?php echo form_error('company_commercial_name') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_commercial_name"><?php echo $this -> lang -> line('company_page_company_commercial_name'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="company_commercial_name" name="company_commercial_name" type="text" value="<?php echo  set_value('company_commercial_name',$row->company_commercial_name) ?>">
								   <span class="help-inline"> <?php echo  form_error('company_commercial_name')  ?></span>
								</div>
							  </div>
							  
							  
							  
							 <div class="control-group<?php echo form_error('tax_number') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="tax_number"><?php echo $this -> lang -> line('company_page_tax_number'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="tax_number" name="tax_number" type="text" value="<?php echo set_value('tax_number', $row -> tax_number); ?>">
								   <span class="help-inline"> <?php echo  form_error('tax_number')  ?></span>
								</div>
							  </div>
							  
							<div class="control-group<?php echo form_error('company_name') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_name"><?php echo $this -> lang -> line('company_page_company_name'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="company_name" name="company_name" type="text" value="<?php echo set_value('company_name', $row -> company_name); ?>">
								   <span class="help-inline"> <?php echo  form_error('company_name')  ?></span>
								</div>
							  </div>
							  
							   <div class="control-group<?php echo form_error('company_type') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_type"><?php echo $this -> lang -> line('company_page_company_type'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="company_type" name="company_type" type="text" value="<?php echo set_value('company_type', $row -> company_type); ?>">
								   <span class="help-inline"> <?php echo  form_error('company_type')  ?></span>
								</div>
							  </div>
							  
							 <div class="control-group<?php echo form_error('company_referance_id') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_referance_id"><?php echo $this -> lang -> line('company_page_company_referance_id'); ?></label>
								<div class="controls">
		<input type="text" class="input-xlarge" id="company_referance_id" name="company_referance_id" value="<?php echo set_value('company_referance_id', $row -> company_referance_id); ?>">
					<span class="help-inline"> <?php echo  form_error('company_referance_id')  ?></span> 
						
								</div>
							  </div>
							  
							  
							  <div class="control-group<?php echo form_error('date03') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="date03"><?php echo $this -> lang -> line(''); ?>Doğum Tarihi</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker" id="date03" name="date03" 
								value="<?php echo set_value('date03', tr_date($row -> i_BornDate, '-')); ?>">
								 <span class="help-inline"> <?php echo  form_error('date03')  ?></span>
							  </div>
							</div>
							  
							  
							  
							
							  <div class="control-group<?php echo form_error('i_LawCivil') != '' ? ' error' : ''; ?>">
								<label class="control-label">Medeni Hali</label>
								<div class="controls">
								  <label class="radio">
									<div class="radio" id="uniform-optionsRadios1"><span class="">
									<input type="radio"  <?php
										if ($row -> i_LawCivil == 1)
											echo 'checked="checked"';
									?>   value="1" id="optionsRadios1" name="i_LawCivil" style="opacity: 0;"></span></div>
									Evli
								  </label>
								  <div style="clear:both"></div>
								  <label class="radio">
									<div class="radio" id="uniform-optionsRadios2"><span class="checked">
									<input type="radio" <?php
										if ($row -> i_LawCivil == 2)
											echo 'checked="checked"';
									?> value="2" id="optionsRadios2" name="i_LawCivil" style="opacity: 0;"></span></div>
									Bekar
								  </label>
								  <div style="clear:both"></div>
								  <label class="radio">
									<div class="radio" id="uniform-optionsRadios2"><span class="checked">
									<input type="radio" <?php
										if ($row -> i_LawCivil == 3)
											echo 'checked="checked"';
									?> value="3" id="optionsRadios3" name="i_LawCivil" style="opacity: 0;"></span></div>
									Boşanmış
								  </label>
								  
								     <span class="help-inline"> <?php echo  form_error('i_LawCivil')  ?></span>
								</div>
							  </div>
							  
							  
							   <div class="control-group<?php echo form_error('company_sectors_id') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_sectors_id">Dini</label>
								<div class="controls">
								<input type="text" class="input-xlarge" id="company_sectors_id" name="company_sectors_id" 
								value="<?php echo set_value('company_sectors_id', $row -> company_sectors_id); ?>">
								<span class="help-inline"> <?php echo  form_error('company_sectors_id')  ?> </span> 
						
								</div>
							  </div>
							  
							  
							  	  <div class="control-group<?php echo form_error('i_city') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_city"> İl </label>
								<div class="controls">
									  <select  id="i_city" name="i_city" data-rel="chosen">
									  	<?php
										foreach ($city as $v) :
											if ($row -> i_city == $v -> id)
												echo '<option  selected="selected" value="' . $v -> id . '">' . $v -> city . '</option>';
											else
												echo '<option value="' . $v -> id . '">' . $v -> city . '</option>';
										endforeach; ?>    </select>			  
					<span class="help-inline"> <?php echo  form_error('i_city')  ?></span> 
								</div>
							  </div>
							  
							  
							  
							   <div class="control-group<?php echo form_error('i_town') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_town"> İlçe </label>
								<div class="controls">
									  <select id="i_town" name="i_town" >
							<?php	foreach ($towns as $t) {
								  if ($row -> i_town == $t -> id)
									echo '<option selected="selected" value="' . $t -> id . '">' . $t -> town . '</option>';
									  else
									    echo '<option value="'.$t->id.'">'.$t-> town.'</option>';
										  } ?>  
								</select>			  
					<span class="help-inline"> <?php echo  form_error('i_town')  ?></span> 
								</div>
							  </div>
							  
							  
							 
							  
							  
							 
							 <div class="control-group<?php echo form_error('company_sector_id') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_sector_id"><?php echo $this -> lang -> line('company_page_company_sector_id'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="company_sector_id" name="company_sector_id" type="text" value="<?php echo set_value('company_sector_id', $row -> company_sector_id); ?>">
								   <span class="help-inline"> <?php echo  form_error('company_sector_id')  ?></span>
								</div>
							  </div>
							  
							  
							  
							 <div class="control-group<?php echo form_error('firm_risk') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="firm_risk"><?php echo $this -> lang -> line('company_page_firm_risk'); ?> </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="firm_risk" name="firm_risk" type="text" 
								  value="<?php echo set_value('firm_risk', $row -> firm_risk); ?>">
								   <span class="help-inline"> <?php echo  form_error('firm_risk')  ?></span>
								</div>
							  </div>
							  
							 
							  

							<div class="control-group<?php echo form_error('tax_verge') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="tax_verge"><?php echo $this -> lang -> line('company_page_tax_verge'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="tax_verge" name="tax_verge" type="text" value="<?php echo set_value('tax_verge', $row -> tax_verge); ?>">
								   <span class="help-inline"> <?php echo  form_error('tax_verge')  ?></span>
								</div>
							  </div>
							  
							  
							  
						<div class="control-group<?php echo form_error('relation_personal_id') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="relation_personal_id"><?php echo $this -> lang -> line('company_page_relation_personal_id'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="relation_personal_id" name="relation_personal_id" type="text" 
								  value="<?php echo set_value('relation_personal_id', $row -> relation_personal_id); ?>">
								   <span class="help-inline"> <?php echo  form_error('relation_personal_id')  ?></span>
								</div>
							  </div>
							  
							
							  
							<div class="control-group<?php echo form_error('i_IdentifyLocation') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_IdentifyLocation"><?php echo $this -> lang -> line('company_page_i_IdentifyLocation'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="i_IdentifyLocation" name="i_IdentifyLocation" type="text" value="<?php echo set_value('i_IdentifyLocation', $row -> i_IdentifyLocation); ?>">
								   <span class="help-inline"> <?php echo  form_error('i_IdentifyLocation')  ?></span>
								</div>
							  </div>
							  
							<div class="control-group<?php echo form_error('i_whyGive') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_whyGive"><?php echo $this -> lang -> line('company_page_i_whyGive'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="i_whyGive" name="i_whyGive" type="text" value="<?php echo set_value('i_whyGive', $row -> i_whyGive); ?>">
								   <span class="help-inline"> <?php echo  form_error('i_whyGive')  ?></span>
								</div>
							  </div>
							  
							  <div class="control-group<?php echo form_error('tax_verge') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="tax_verge"><?php echo $this -> lang -> line('company_page_tax_verge'); ?></label>
								<div class="controls">
<input class="input-xlarge focused" id="tax_verge" 
								  name="tax_verge" type="text" value="<?php echo set_value('tax_verge', $row -> tax_verge); ?>">
								</div>
							  </div>
							  
							  
							 
							  
							  
							  <div class="control-group<?php echo form_error('i_GiveDate') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_GiveDate"> Veriliş tarihi </label>
								<div class="controls">
								<input class="input-xlarge focused datepicker" id="i_GiveDate" 
								  name="i_GiveDate" type="text" value="<?php echo set_value('i_GiveDate', tr_date($row -> i_GiveDate)); ?>">
								</div>
							  </div>
							  
							  
							  
						
							  
							  
								</p>
							</div>
							
							<div class="tab-pane" id="company_info">
								<h3> Firma Özlük  </h3>
								<p>
								
								
															    <div class="control-group<?php echo form_error('position_id') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="position_id"> Bölümler </label>
								<div class="controls">
									  <select  id="position_id" name="position_id"  data-rel="chosen">
									  <option value=""> Seçiniz </option>
									  	<?php
										foreach ($positions as $p) :
											if ($row -> position_id == $p -> id)
												echo '<option selected="selected" value=" ' . $p -> id . '"> ' . $p -> position . '</option>';
											else
												echo '<option value=" ' . $p -> id . '"> ' . $p -> position . '</option>';

										endforeach;
 ?>    
					</select>			  
					<span class="help-inline"> <?php echo  form_error('position_id')  ?></span> 
								</div>
							  </div>
							  
							  
							    <div class="control-group<?php echo form_error('section_id') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="section_id"> Pozisyonlar </label>
								<div class="controls">
									  <select  id="section_id" name="section_id" >
					<?php
										foreach ($sections as $pi) :
											if ($row -> section_id == $pi -> id)
												echo '<option selected="selected" value=" ' . $pi -> id . '">  ' . $pi -> section . ' </option>';
											else
												echo '<option  value=" ' . $pi -> id . '">  ' . $pi -> section . ' </option>';
										endforeach;
 ?>   									  
					</select>			  
							<span class="help-inline"> <?php echo  form_error('section_id')  ?></span> 
								</div>
							  </div>
							  
							  
							  
							  
							<div class="control-group<?php echo form_error('p_SskNo') != '' ? ' error' : ''; ?>">
			<label class="control-label" for="p_SskNo"><?php echo $this -> lang -> line('company_page_p_SskNo'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="p_SskNo" name="p_SskNo" type="text" value="<?php echo set_value('p_SskNo', $row -> p_SskNo); ?>">
								   <span class="help-inline"> <?php echo  form_error('p_SskNo')  ?></span>
								</div>
							  </div>
							  
						<div class="control-group<?php echo form_error('w_salary') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="w_salary"><?php echo $this -> lang -> line('company_page_w_salary'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="w_salary" name="w_salary" type="text" value="<?php echo set_value('w_salary', $row -> w_salary); ?>">
								   <span class="help-inline"> <?php echo  form_error('w_salary')  ?></span>
								</div>
							  </div>
							
							
						
							
						<div class="control-group<?php echo form_error('date01') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="date01"><?php echo $this -> lang -> line(''); ?>İşe Giriş Tarihi</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker" id="date01" name="date01" 
								value="<?php echo set_value('date01', tr_date($row -> w_datetime)); ?>">
								 <span class="help-inline"> <?php echo  form_error('date01')  ?></span>
							  </div>
							</div>
							
							
						<div class="control-group<?php echo form_error('date02') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="date02"><?php echo $this -> lang -> line(''); ?>İşden ayrılma tarihi</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker" id="date02" name="date02" value="<?php echo set_value('date02', tr_date($row -> w_enddate)); ?>">
								 <span class="help-inline"> <?php echo  form_error('date02')  ?></span>
							  </div>
							</div>
								
								
						<div class="control-group<?php echo form_error('p_give_why') != '' ? ' error' : ''; ?>">
					<label class="control-label" for="p_give_why"><?php echo $this -> lang -> line(''); ?>İşten ayrılma nedeni</label>
							  <div class="controls">
							<textarea style="width: 279px; height: 114px;"  id="p_give_why" name="p_give_why" rows="3"><?php echo set_value('p_give_why', $row -> p_give_why); ?></textarea>
								 <span class="help-inline"> <?php echo  form_error('p_give_why')  ?></span>
							  </div>
							</div>
							
							
								</p>
						</div>
							
							
							<div class="tab-pane" id="adress_info">
								<h3> İletişim Bilgileri </h3>
								<p>
								
							<div class="control-group<?php echo form_error('company_gsm') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_gsm"><?php echo $this -> lang -> line('company_page_company_gsm'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="company_gsm" name="company_gsm" type="text" value="<?php echo set_value('company_gsm', $row -> company_gsm); ?>">
								   <span class="help-inline"> <?php echo  form_error('company_gsm')  ?></span>
								</div>
							  </div>
							  
						<div class="control-group<?php echo form_error('company_phone') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_phone"><?php echo $this -> lang -> line('company_page_company_phone'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="company_phone" name="company_phone" type="text" value="<?php echo set_value('company_phone', $row -> company_phone); ?>">
								   <span class="help-inline"> <?php echo  form_error('company_phone')  ?></span>
								</div>
							  </div>
							  
						<div class="control-group<?php echo form_error('company_page_company_fax') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_page_company_fax">
								<?php echo $this -> lang -> line('company_page_company_fax'); ?> 2</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="company_page_company_fax" name="company_page_company_fax" type="text" value="<?php echo set_value('company_page_company_fax', $row -> company_fax); ?>">
								   <span class="help-inline"> <?php echo  form_error('company_page_company_fax')  ?></span>
								</div>
							  </div>
							  
						<div class="control-group<?php echo form_error('alternative_number') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="alternative_number"><?php echo $this -> lang -> line('company_page_alternative_number'); ?> Bir yakının numarası</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="alternative_number" name="alternative_number" type="text" value="<?php echo set_value('alternative_number', $row -> alternative_number); ?>">
								   <span class="help-inline"> <?php echo  form_error('alternative_number')  ?></span>
								</div>
							  </div>
							  
							
							  
							  
							 <div class="control-group<?php echo form_error('company_authorized_email_address') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_authorized_email_address">Şirket Maili</label>
								<div class="controls">
								
								<div class="input-prepend">
									  <span class="add-on"><i class="icon-envelope"></i></span><input type="text" value="<?php echo set_value('company_authorized_email_address', $row -> company_authorized_email_address); ?>" id="inputIcon" id="company_authorized_email_address" name="company_authorized_email_address" >
									</div>
							
								   <span class="help-inline"> <?php echo  form_error('company_authorized_email_address')  ?></span>
								</div>
							  </div>
							  
							  
							   <div class="control-group<?php echo form_error('company_company_authorized_email_address') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="company_company_authorized_email_address">Kişisel Email Adresi</label>
								<div class="controls">
								
								  <div class="input-prepend">
									  <span class="add-on"><i class="icon-envelope"></i></span><input type="text" value="<?php echo set_value('company_company_authorized_email_address', $row -> company_company_authorized_email_address); ?>" id="inputIcon" id="company_company_authorized_email_address" name="company_company_authorized_email_address" >
									</div>
									
									
								   <span class="help-inline"> <?php echo  form_error('company_company_authorized_email_address')  ?></span>
								</div>
							  </div>
							  
							  
							  
							  
							<div class="control-group<?php echo form_error('p_register_number') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="p_register_number"><?php echo $this -> lang -> line('company_page_p_register_number'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="p_register_number" name="p_register_number" type="text" value="<?php echo set_value('p_register_number', $row -> p_register_number); ?>">
								   <span class="help-inline"> <?php echo  form_error('p_register_number')  ?></span>
								</div>
							  </div>
							  
						<div class="control-group<?php echo form_error('adress_1') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="adress_1"><?php echo $this -> lang -> line(''); ?>Adres Bilgisi</label>
							  <div class="controls">
								<textarea  id="adress_1" style="width: 279px; height: 114px;"  name="adress_1" rows="3"><?php echo set_value('adress_1', $row -> adress_1); ?></textarea>
								 <span class="help-inline"> <?php echo  form_error('adress_1')  ?></span>
							  </div>
							</div>
							
							
							
						 <div class="control-group<?php echo form_error('adress_city') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="adress_city"> İl </label>
								<div class="controls">
									  <select  id="adress_city" name="adress_city">
									  	<?php foreach($city as $v): 
										if ( $row->adress_city == $v->id ){ ?>  	
						<option  selected="selected" value="<?php echo $v -> id; ?>"><?php echo $v -> city; ?></option>
						<?php } else { ?>
						<option value="<?php echo $v -> id; ?>"><?php echo $v -> city; ?></option>
						<?php }  endforeach; ?>       
					</select>			  
					<span class="help-inline"> <?php echo  form_error('adress_city')  ?></span> 
								</div>
							  </div>
							  
							  
							  
							   <div class="control-group<?php echo form_error('adress_town') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="adress_town"> İlçe </label>
								<div class="controls">
						<select id="adress_town" name="adress_town"  >
									  <?php
								foreach ($towns as $t) {
								  if ($row -> adress_town == $t -> id)
									echo '<option selected="selected" value="' . $t -> id . '">' . $t -> town . '</option>';
									  else
									    echo '<option value="'.$t->id.'">'.$t-> town.'</option>';
										  }?>  
								</select>	

								
					<span class="help-inline"> <?php echo  form_error('adress_town')  ?></span> 
								</div>
							  </div>
							  
							  
							  <div class="control-group<?php echo form_error('adress_2') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="adress_2"><?php echo $this -> lang -> line(''); ?>Diğer Adres Bilgileri</label>
							  <div class="controls">
								<textarea  id="adress_2"  style="width: 279px; height: 114px;"  name="adress_2" rows="3">
								<?php echo set_value('adress_2', $row -> adress_2); ?></textarea>
								 <span class="help-inline"> <?php echo  form_error('adress_2')  ?></span>
							  </div>
							</div>
							  
								
								</p>
							</div>
							
							

						
						<div class="tab-pane" id="notes_info">
								<h3> Notlar  </h3>
								<p>
								
					<div class="control-group<?php echo form_error('notes2') != '' ? ' error' : ''; ?>">
							  <label class="control-label" for="notes2"><?php echo $this -> lang -> line(''); ?>Not</label>
							  <div class="controls">
			<textarea  style="width: 351px; height: 209px;" id="notes2" name="notes2" 
			rows="3"><?php echo set_value('notes2', $row -> notes); ?></textarea>
								 <span class="help-inline"> <?php echo  form_error('notes2')  ?></span>
							  </div>
							</div>
								
								</p>
						</div>
						
						
						</div>
						
						<div class="form-actions">
							  <input type="submit" class="btn btn-primary" value="Bilgileri kaydet">
							 
							</div>
							
						  </fieldset>
						  <?php  endforeach; }
							echo form_close(); //selman
 ?>  
						
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
