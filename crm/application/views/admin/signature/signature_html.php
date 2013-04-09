<?php 
$this->load->view('admin/header.php');
 $this->load->helper('datetime');
 $pathname='signature';
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
						<a href="#">İmza Listesi</a>
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
						
						
			
			
		<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> İmza Listesi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Ad Soyad</th>
								  <th>Giriş Tarihi</th>
								  <th>Çıkış Tarihi</th>
								<th>Süre</th>
								  <th>Olaylar</th>
							  </tr>
						  </thead>   
						  <tbody>
		<?php $c = 0; 
		if ($allsign){												
	foreach ( $allsign as $row ): ?>
	<tr class="<?php // echo ($c++%2==1) ? "odd":"even" ?>">
								<td> <?php echo $row->name_.' '.$row->surname ?>  </td>
								<td class="center"><?php echo tr_date($row->signature_date).' '.$row->signature_time;  ?> </td>
								<td class="center"> <?php //echo tr_date($row->signature_out_date).' '.$row->signature_out_time; ?></td>
								<td> <?php echo $row->name_.' '.$row->surname ?>  </td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="icon-zoom-in icon-white"></i>  
										Görüntüle                                            
									</a>
									<a class="btn btn-info" href="<?php echo base_url().'/admin/'.$pathname.'/update/'.$row->pid; ?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
										<input type="submit" class="btn btn-danger" onclick="show_confirm('<?php echo '/admin/'.$pathname.'/delete/'.$row->sid; ?>')"  value="Sil" name="delete_button"/>
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