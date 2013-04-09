	<?php
$this -> load -> view('admin/header.php');
$this -> load -> helper('datetime');
 $pathname='prize';
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
						<a href="#"></a>
					</li>
				</ul>
			</div>


		<div class="box-content">
		<?php echo form_open(base_url() . 'admin/'.$pathname.'/add', array('id' => 'form-horizontal', 'class' => 'form-horizontal')); ?>
 <fieldset>



							</div>



								<h3> Ödül listesi  </h3>

			<!-- content starts -->





			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Personel  </h2>
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
								  <th>Ödül Adı</th>
								  <th>Ödül Türü</th>
								  <th>Ödül Tarihi</th>
								  <th>Verildiği Yer</th>
								  <th>Olaylar</th>
							  </tr>
							  </thead>
						  		<tbody>			  
					<?php
                                         $val="start";
										 $posnum=0;//departmana ait odul miktarı için
										  $num=0;//toplam odul mıktarı için
										  $dgr=0;//denemedir
										  	
			
										 foreach($prizes as $lookprz){
										 $prsnlid=$lookprz->przid;
										$namesurname=$lookprz->name." ".$lookprz->surname;
                                       	$cm=$lookprz->position_id;
										$acceptdate = tr_date($lookprz->prize_accept_date);
											if ($val == $cm) { 
											
											?>
											<tr>
								<td><? echo $namesurname ?></td>
								
								<td class="center"><?= $lookprz -> prize_name ?></td>
								<td class="center"><?= $lookprz -> prize_type ?></td>
								<td class="center"><?= $acceptdate ?></td>
								<td class="center"><?= $lookprz -> prize_accept_place ?></td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="icon-zoom-in icon-white"></i>  
										Görüntüle                                            
									</a>
									<a class="btn btn-info" href="<?php echo base_url().'/admin/'.$pathname.'/update/'.$prsnlid."?name=".$namesurname ?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									<a class="btn btn-danger" href="<?php echo base_url() . '/admin/'.$pathname.'/delete/' . $prsnlid; ?>">
										<i class="icon-trash icon-white"></i> 
										Sil
									</a>
								</td>
							    </tr>
                                     <?php  }   else{ ?>
								
								<tr class="cntr">
								
								<td class="center" colspan="6"><div  class="senug"><h4 class="positionprize"><?= mb_strtoupper($lookprz -> position); ?></h4></div></td>
								
								</tr>							
								
								
								
								<tr>
								<td><? echo $namesurname ?></td>
								<td class="center"><?= $lookprz -> prize_name ?></td>
								<td class="center"><?= $lookprz -> prize_type ?></td>
								<td class="center"><?= $acceptdate ?></td>
								<td class="center"><?= $lookprz -> prize_accept_place ?></td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="icon-zoom-in icon-white"></i>  
										Görüntüle                                            
									</a>
									<a class="btn btn-info" href="<?php echo base_url() . '/admin/'.$pathname.'/update/' . $prsnlid . "?name=" . $namesurname; ?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
										<input type="submit" class="btn btn-danger" onclick="show_confirm('<?php echo '/admin/'.$pathname.'/delete/'.$personal->id; ?>')"  value="Sil" name="delete_button"/>
								</td>
							    </tr>
                                   <?php

									}
									$num = $num + 1;
									$val=$cm;
									//$dgr=$dgr+1;
									}
										?>
					
						
						 
		<?php /* $c = 0;
							 if (isset($allpersonal)){
							 foreach ( $allpersonal as $personal ): ?>
							 <tr>
							 <td>  </td>
							 <td class="center"></td>
							 <td class="center"></td>
							 <td class="center"></td>
							 <td class="center">
							 <a class="btn btn-success" href="#">
							 <i class="icon-zoom-in icon-white"></i>
							 Görüntüle
							 </a>
							 <a class="btn btn-info" href="<?php echo base_url().'/admin/personal/update/'.$personal->id; ?>">
							 <i class="icon-edit icon-white"></i>
							 Düzenle
							 </a>
							 <a class="btn btn-danger" href="#">
							 <i class="icon-trash icon-white"></i>
							 Sil
							 </a>
							 </td>
							 </tr>
							 <?php  endforeach; }
							 else
							 {
							 echo  "Sunucu Kaynaklı Bir Hata Oluştu Tekrar Deneyiniz...";
							 } */
							?>
						 <tr class="cntr">
								
								<td class="center" colspan="6"><h6><?= 'Kayıtlı ' . $num . ' Adet Ödül Bulunmaktadır.'; ?></h6></td>
								
								</tr>		
					  </tbody>
					  </table>
					</div>
				</div><!--/span-->

			</div><!--/row--> 