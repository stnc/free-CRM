<?php
$this -> load -> view('admin/header.php');
$this -> load -> helper('datetime');
$pathname='personal';
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
						<a href="#">Personel bilgi düzenleme</a>
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
						<h2><i class="icon-th"></i> Personel Bilgi Düzenleme</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					
							
							
					<div class="box-content">
					  <?php if ($personals){	
					  foreach( $personals as $row ):
		  //if (validation_errors())			
   echo form_open_multipart( 'admin/'.$pathname.'/update/'.$row->id.'?success=ok' ,array('id' => 'form-horizontal','class'=>'form-horizontal'));
// else echo form_open_multipart( 'admin/dashboard' ,array('id' => 'form-horizontal','class'=>'form-horizontal' ));
 ?> <fieldset>
				
				<div class="form-actions" style="padding-left: 20px;">						 
				<?php echo form_submit(array("name"=>"passwordsubmit","class"=>"btn btn-primary", "value"=>'Bilgileri Kaydet')) ?>
							</div>	
						<ul class="nav nav-tabs" id="myTab">
							<li class="active"><a href="#info">Kimlik Bilgileri</a></li>
							<li><a href="#adress_info">İletişim bilgileri</a></li>
							<li><a href="#personal_info">Personel Özlük</a></li>
							<li><a href="#notes_info">Notlar</a></li>
							
							
						</ul>
						 
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane active" id="info">
								<h3>Personel Bilgisi</h3>
								<p>
								
								

								<div class="control-group">
								<label class="control-label" for="iname">Resim</label>
								<div class="controls">
								<input type="file" id="single_file" name="single_file" value="" />
								</div>
								</div>
							  				

							  	<div class="control-group">
								<label class="control-label" for="iname">Resim</label>
								<div class="controls">
<?php if ($row -> picture!='') { ?>
<img style="width: 450px; height: 250px;" src="<?php echo base_url() . '/uploads/' . $row -> picture; ?>"/>
<input type="hidden" name="pic_backup" id="pic_backup" value="<?php echo $row -> picture;  ?>"/>
<?php } ?>

								</div>
							  </div>
							  			
							  
								<div class="control-group<?php echo $err_form1 = form_error('iname') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="iname"><?php  echo $this -> lang -> line('personal_page_name'); ?></label>
								<div class="controls">
				<input class="input-xlarge focused" id="iname" name="iname" type="text" value="<?php echo set_value('iname', $row -> name); ?>"  >
				<?php // echo form_input('name', '', ' class="input-xlarge focused" id="name" size="50" ') ?>
				<span class="help-inline"> <?php echo  form_error('iname')  ?></span>
								</div>
							  </div>
							  
							  
							<div class="control-group<?php echo form_error('surname') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="surname"><?php echo $this -> lang -> line('personal_page_surname'); ?></label>
								<div class="controls">
			 <input class="input-xlarge focused" id="surname" name="surname" type="text" value="<?php echo set_value('surname', $row -> surname); ?>">
								  <span class="help-inline"> <?php echo form_error('surname'); ?></span>
								</div>
							  </div>
							  
							  

							  
							  
							  
							<div class="control-group<?php echo form_error('i_series') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_series"><?php echo $this -> lang -> line('personal_page_i_series'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="i_series" name="i_series" type="text" value="<?php echo set_value('i_series', $row -> i_series); ?>">
								   <span class="help-inline"> <?php echo  form_error('i_series')  ?></span>
								</div>
							  </div>
							  
							  <div class="control-group<?php echo form_error('i_inumber') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_inumber"><?php echo $this -> lang -> line('personal_page_i_inumber'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="i_inumber" name="i_inumber" type="text" value="<?php echo  set_value('i_inumber',$row->i_inumber) ?>">
								   <span class="help-inline"> <?php echo  form_error('i_inumber')  ?></span>
								</div>
							  </div>
							  
							 <div class="control-group<?php echo form_error('i_TcNo') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_TcNo"><?php echo $this -> lang -> line('personal_page_i_TcNo'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="i_TcNo" name="i_TcNo" type="text" value="<?php echo set_value('i_TcNo', $row -> i_TcNo); ?>">
								   <span class="help-inline"> <?php echo  form_error('i_TcNo')  ?></span>
								</div>
							  </div>
							  
							<div class="control-group<?php echo form_error('i_FatherName') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_FatherName"><?php echo $this -> lang -> line('personal_page_i_FatherName'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="i_FatherName" name="i_FatherName" type="text" value="<?php echo set_value('i_FatherName', $row -> i_FatherName); ?>">
								   <span class="help-inline"> <?php echo  form_error('i_FatherName')  ?></span>
								</div>
							  </div>
							  
							   <div class="control-group<?php echo form_error('i_MotherName') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_MotherName"><?php echo $this -> lang -> line('personal_page_i_MotherName'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="i_MotherName" name="i_MotherName" type="text" value="<?php echo set_value('i_MotherName', $row -> i_MotherName); ?>">
								   <span class="help-inline"> <?php echo  form_error('i_MotherName')  ?></span>
								</div>
							  </div>
							  
							 <div class="control-group<?php echo form_error('i_BornPlace') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_BornPlace"><?php echo $this -> lang -> line('personal_page_i_BornPlace'); ?></label>
								<div class="controls">
		<input type="text" class="input-xlarge" id="i_BornPlace" name="i_BornPlace" value="<?php echo set_value('i_BornPlace', $row -> i_BornPlace); ?>">
					<span class="help-inline"> <?php echo  form_error('i_BornPlace')  ?></span> 
						
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
							  
							  
							  
							   <?php //decho set_value('i_LawCivil',$row->i_LawCivil); ?>
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
							  
							  
							   <div class="control-group<?php echo form_error('i_religion') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_religion">Dini</label>
								<div class="controls">
								<input type="text" class="input-xlarge" id="i_religion" name="i_religion" 
								value="<?php echo set_value('i_religion', $row -> i_religion); ?>">
								<span class="help-inline"> <?php echo  form_error('i_religion')  ?> </span> 
						
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
										endforeach;
 ?>    
					</select>			  
					<span class="help-inline"> <?php echo  form_error('i_city')  ?></span> 
								</div>
							  </div>
							  
							  
							  
							   <div class="control-group<?php echo form_error('i_town') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_town"> İlçe </label>
								<div class="controls">
									  <select id="i_town" name="i_town" >
									  <?php
								foreach ($towns as $t) {
								  if ($row -> i_town == $t -> id)
									echo '<option selected="selected" value="' . $t -> id . '">' . $t -> town . '</option>';
									  else
									    echo '<option value="'.$t->id.'">'.$t-> town.'</option>';
										  }?>  
								</select>			  
					<span class="help-inline"> <?php echo  form_error('i_town')  ?></span> 
								</div>
							  </div>
							  
							  
							 
							  
							  
							 
							 <div class="control-group<?php echo form_error('i_neighborhood') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_neighborhood"><?php echo $this -> lang -> line('personal_page_i_neighborhood'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="i_neighborhood" name="i_neighborhood" type="text" value="<?php echo set_value('i_neighborhood', $row -> i_neighborhood); ?>">
								   <span class="help-inline"> <?php echo  form_error('i_neighborhood')  ?></span>
								</div>
							  </div>
							  
							 <div class="control-group<?php echo form_error('i_face_no') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_face_no"><?php echo $this -> lang -> line('personal_page_i_face_no'); ?> </label>
								<div class="controls">
								  <input class="input-xlarge focused" id="i_face_no" name="i_face_no" type="text" 
								  value="<?php echo set_value('i_face_no', $row -> i_face_no); ?>">
								   <span class="help-inline"> <?php echo  form_error('i_face_no')  ?></span>
								</div>
							  </div>
							  
							 
							  
							
							  
							  
							 
							  
							
							<div class="control-group<?php echo form_error('i_FamilyNumber') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_FamilyNumber"><?php echo $this -> lang -> line('personal_page_i_FamilyNumber'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="i_FamilyNumber" name="i_FamilyNumber" type="text" value="<?php echo set_value('i_FamilyNumber', $row -> i_FamilyNumber); ?>">
								   <span class="help-inline"> <?php echo  form_error('i_FamilyNumber')  ?></span>
								</div>
							  </div>
							  
							  
							  
						<div class="control-group<?php echo form_error('i_order_no') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_order_no"><?php echo $this -> lang -> line('personal_page_i_order_no'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="i_order_no" name="i_order_no" type="text" 
								  value="<?php echo set_value('i_order_no', $row -> i_order_no); ?>">
								   <span class="help-inline"> <?php echo  form_error('i_order_no')  ?></span>
								</div>
							  </div>
							  
							
							  
							<div class="control-group<?php echo form_error('i_IdentifyLocation') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_IdentifyLocation"><?php echo $this -> lang -> line('personal_page_i_IdentifyLocation'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="i_IdentifyLocation" name="i_IdentifyLocation" type="text" value="<?php echo set_value('i_IdentifyLocation', $row -> i_IdentifyLocation); ?>">
								   <span class="help-inline"> <?php echo  form_error('i_IdentifyLocation')  ?></span>
								</div>
							  </div>
							  
							<div class="control-group<?php echo form_error('i_whyGive') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_whyGive"><?php echo $this -> lang -> line('personal_page_i_whyGive'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="i_whyGive" name="i_whyGive" type="text" value="<?php echo set_value('i_whyGive', $row -> i_whyGive); ?>">
								   <span class="help-inline"> <?php echo  form_error('i_whyGive')  ?></span>
								</div>
							  </div>
							  
							  <div class="control-group<?php echo form_error('i_RegNo') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="i_RegNo"><?php echo $this -> lang -> line('personal_page_i_RegNo'); ?></label>
								<div class="controls">
<input class="input-xlarge focused" id="i_RegNo" 
								  name="i_RegNo" type="text" value="<?php echo set_value('i_RegNo', $row -> i_RegNo); ?>">
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
							
							<div class="tab-pane" id="personal_info">
								<h3> Personel Özlük  </h3>
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
			<label class="control-label" for="p_SskNo"><?php echo $this -> lang -> line('personal_page_p_SskNo'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="p_SskNo" name="p_SskNo" type="text" value="<?php echo set_value('p_SskNo', $row -> p_SskNo); ?>">
								   <span class="help-inline"> <?php echo  form_error('p_SskNo')  ?></span>
								</div>
							  </div>
							  
						<div class="control-group<?php echo form_error('w_salary') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="w_salary"><?php echo $this -> lang -> line('personal_page_w_salary'); ?></label>
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
								
							<div class="control-group<?php echo form_error('gsm_number') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="gsm_number"><?php echo $this -> lang -> line('personal_page_gsm_number'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="gsm_number" name="gsm_number" type="text" value="<?php echo set_value('gsm_number', $row -> gsm_number); ?>">
								   <span class="help-inline"> <?php echo  form_error('gsm_number')  ?></span>
								</div>
							  </div>
							  
						<div class="control-group<?php echo form_error('home_number') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="home_number"><?php echo $this -> lang -> line('personal_page_home_number'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" id="home_number" name="home_number" type="text" value="<?php echo set_value('home_number', $row -> home_number); ?>">
								   <span class="help-inline"> <?php echo  form_error('home_number')  ?></span>
								</div>
							  </div>
							  
						<div class="control-group<?php echo form_error('personal_page_gsm_number2') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="personal_page_gsm_number2">
								<?php echo $this -> lang -> line('personal_page_gsm_number2'); ?> 2</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="personal_page_gsm_number2" name="personal_page_gsm_number2" type="text" value="<?php echo set_value('personal_page_gsm_number2', $row -> gsm_number2); ?>">
								   <span class="help-inline"> <?php echo  form_error('personal_page_gsm_number2')  ?></span>
								</div>
							  </div>
							  
						<div class="control-group<?php echo form_error('alternative_number') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="alternative_number"><?php echo $this -> lang -> line('personal_page_alternative_number'); ?> Bir yakının numarası</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="alternative_number" name="alternative_number" type="text" value="<?php echo set_value('alternative_number', $row -> alternative_number); ?>">
								   <span class="help-inline"> <?php echo  form_error('alternative_number')  ?></span>
								</div>
							  </div>
							  
							  <div class="control-group<?php echo form_error('alternative_number_who') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="alternative_number_who">Acil durum numara sahibi</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="alternative_number_who" name="alternative_number_who" type="text" value="<?php echo set_value('alternative_number_who', $row -> alternative_number_who); ?>">
								   <span class="help-inline"> <?php echo  form_error('alternative_number_who')  ?></span>
								</div>
							  </div>
							  
							   <div class="control-group<? echo form_error('p_blood_group') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="p_blood_group">Kan Grubu</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="p_blood_group" name="p_blood_group" type="text" value="<?php echo set_value('p_blood_group', $row -> p_blood_group); ?>">
								   <span class="help-inline"> <? echo  form_error('p_blood_group')  ?></span>
								</div>
							  </div>
							  
							  
							 <div class="control-group<?php echo form_error('email_address') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="email_address">Şirket Maili</label>
								<div class="controls">
								
								<div class="input-prepend">
									  <span class="add-on"><i class="icon-envelope"></i></span><input type="text" value="<?php echo set_value('email_address', $row -> email_address); ?>" id="inputIcon" id="email_address" name="email_address" >
									</div>
							
								   <span class="help-inline"> <?php echo  form_error('email_address')  ?></span>
								</div>
							  </div>
							  
							  
							   <div class="control-group<?php echo form_error('personal_email_address') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="personal_email_address">Kişisel Email Adresi</label>
								<div class="controls">
								
								  <div class="input-prepend">
									  <span class="add-on"><i class="icon-envelope"></i></span><input type="text" value="<?php echo set_value('personal_email_address', $row -> personal_email_address); ?>" id="inputIcon" id="personal_email_address" name="personal_email_address" >
									</div>
									
									
								   <span class="help-inline"> <?php echo  form_error('personal_email_address')  ?></span>
								</div>
							  </div>
							  
							  
							  
							  
							<div class="control-group<?php echo form_error('p_register_number') != '' ? ' error' : ''; ?>">
								<label class="control-label" for="p_register_number"><?php echo $this -> lang -> line('personal_page_p_register_number'); ?></label>
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
