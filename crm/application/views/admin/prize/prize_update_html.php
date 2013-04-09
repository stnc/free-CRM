<?php 
$this->load->view('admin/header.php');
 $this->load->helper('datetime'); 
/* echo '<pre>';
print_r ($updateprizes);
echo '<pre>'; */
// tek deger gelecekse eger bu sekılde alıyoruz----   -----                 $updateprizes[0]->id;
 //$name=$this->input->get('name'); 
 $nm= $updateprizes[0]->name; 
 $srnm= $updateprizes[0]->surname; 
 $name=$nm." ".$srnm;
 $acceptdate= tr_date($updateprizes[0]->prize_accept_date);
 $prizeid= $this->uri->segment(4);
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
						<a href="#">Ödül Güncelleme Sayfası</a>
					</li>
				</ul>
			</div>
			

			
			
		<div class="row-fluid sortable">
			<div class="box span12">
			<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>ÖDÜL GÜNCELLEME SAYFASI</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
			<div class="box-content">
					<?php	echo form_open (base_url().'admin/'.$pathname.'/updatework/'.$prizeid.'' ,array('id' => 'form-horizontal','class'=>'form-horizontal')); ?>
						  <fieldset>
							<legend></legend>
							
							
							<div class="control-group">
							  <label class="control-label" for="typeahead">Personel </label>
							  <div class="controls">
								<label class="control-label" for="typeahead"><?php echo  $name; ?> </label>				
							  </div>
							</div>
							
							
							<div class="control-group">
							  <label class="control-label" for="typeahead">Ödül Adı </label>
							  <div class="controls">
		<input type="text" class="span6 typeahead" id="typeahead" name="prize_name"  value="<?php echo  $updateprizes[0]->prize_name; ?>" >
				</div>
							</div>
							
							
							<div class="control-group">
							  <label class="control-label" for="typeahead">Ödül Türü </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="prize_type" value="<?php echo  $updateprizes[0]->prize_type; ?>">
								
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="typeahead">Ödülün Alındığı Yer </label>
							  <div class="controls">
<input type="text" class="span6 typeahead" id="typeahead" name="prize_accept_place" value="<?php echo  $updateprizes[0]->prize_accept_place; ?>"> </div>
</div>
							
							
							
							<div class="control-group">
							  <label class="control-label" for="date01">Ödül Alma Tarihi</label>
							  <div class="controls">
								<input type="text"  class="input-xlarge datepicker" name="prize_accept_date" value="<?php echo  $acceptdate ?>" id="date01">
							  </div>
							</div>
							

							        
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Bilgileri Kaydet</button>
							  <button type="reset" class="btn">Temizle</button>
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