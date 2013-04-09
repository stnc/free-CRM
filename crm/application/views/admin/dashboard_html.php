<?php 
$this -> load -> view('admin/header.php');
 $this->load->helper('datetime'); 
 ?>
		


<body>
		<!-- topbar starts -->
<?php  $this -> load -> view('admin/top_bar.php'); ?>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->

			<?php $this -> load -> view('admin/left_bar.php'); ?>

			<!-- left menu ends -->
			
			
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">dikkat</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> i lütfen etkinleştirin</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Anasayfa</a> <span class="divider">/</span>
					</li>
					
				</ul>
			</div>
			<div class="sortable row-fluid">
				<a data-rel="tooltip" title="mesaj gelecek." class="well span3 top-block" href="#">
					<span class="icon32 icon-red icon-user"></span>
					<div>Toplam Personel</div>
					<div>20</div>
					<span class="notification">6</span>
				</a>

				<a data-rel="tooltip" title="mesaj gelecek" class="well span3 top-block" href="#">
					<span class="icon32 icon-color icon-star-on"></span>
					<div>Toplam Araç</div>
					<div>228</div>
					<span class="notification green">4</span>
				</a>

				<a data-rel="tooltip" title="mesaj gelecek" class="well span3 top-block" href="#">
					<span class="icon32 icon-color icon-cart"></span>
					<div>Bekleyen Müşteri</div>
					<div>0</div>
					<span class="notification yellow">$34</span>
				</a>
				
				<a data-rel="tooltip" title="mesaj gelecek" class="well span3 top-block" href="#">
					<span class="icon32 icon-color icon-envelope-closed"></span>
					<div>mesajlar</div>
					<div>25</div>
					<span class="notification red">12</span>
				</a>
			</div>
			
		
					
		

		
				  

		  
       
					
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>
	<?php  $this->load->view('admin/footer.php'); ?>