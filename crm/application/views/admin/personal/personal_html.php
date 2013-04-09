<?php 
$this->load->view('admin/header.php');
 $this->load->helper('datetime');
 $pathname='personal';
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
						<a href="<?php echo base_url().'admin/'.$pathname.'/' ?>">Personel Listesi</a>
					</li>
						<li>
						<a href="<?php echo base_url().'admin/'.$pathname.'/add/' ?>">/Personel ekle</a>
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
								<?php echo $err;   ?>
							</p>
						</div>
					</div>
			<?php } ?>	
						
						
			
			<?php  //if ($msg1!=''){  ?>			
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
						<h2><i class="icon-user"></i> Personel Listesi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Ad Soyad</th>
								   <th>Email adresi</th>
								  <th>İşe giriş Tarihi</th>
								  <th>Bölümü</th>
								  <th>Durumu</th>
								  <th>Olaylar</th>
							  </tr>
						  </thead>   
						  <tbody>
		<?php $c = 0; 
		if ($allpersonal){												
	foreach ( $allpersonal as $row ): ?>
	<tr class="<?php // echo ($c++%2==1) ? "odd":"even" ?>">
								<td> <?php echo $row->name.' '.$row->surname; ?>  </td>
								<td class="center"><?php echo $row->email_address; ?> </td>
								<td class="center"><?php echo tr_date($row->w_datetime); ?> </td>
								<td class="center">Yazılım</td>
								<td class="center">
									<span class="label label-success">Çalışıyor</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="icon-zoom-in icon-white"></i>  
										Görüntüle                                            
									</a>
						<a class="btn btn-info" href="<?php echo base_url().'/admin/'.$pathname.'/update/'.$row->id; ?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									
									<input type="submit" class="btn btn-danger" onclick="show_confirm('<?php echo '/admin/'.$pathname.'/delete/'.$row->id; ?>')"  value="Sil" name="delete_button"/>
										
									
								</td>
							</tr>
                            <?php  endforeach; } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
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