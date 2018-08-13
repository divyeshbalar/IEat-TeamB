
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">

			<div class="row" >
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="<?php echo base_url() ?>index.php/admincontrol">IEat <em style="font-size: small;">.Admin Panel</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul><?php
if ($flag == true) {?>
						<li><a href="<?php echo base_url() ?>index.php/admincontroller/readOrders">Orders</a></li>
						<li><a href="<?php echo base_url() ?>index.php/admincontroller/readDishes">Update Menu</a></li>
						<li><a href="<?php echo base_url() ?>index.php/admincontroller/readSections">Manage Section</a></li>
							<li class="has-dropdown btn">
							<a href="#">Configure</a>


							<ul class="dropdown">
								<li><a href="<?php echo base_url() ?>index.php/admincontroller/readAreas">Delivery Areas</a></li>

								<li><a href="<?php echo base_url() ?>index.php/admincontroller/readTaxes">Tax</a></li>

								<li><a href="<?php echo base_url() ?>index.php/admincontroller/getOpenhours">Timing</a></li>

							</ul>
						</li>
							<li class="has-dropdown btn-cta">
							<a href="#"><span><?php echo $_SESSION['adminuname']; ?></span></a>
							<ul class="dropdown">
								<li><a href="<?php echo base_url() ?>index.php/admincontroller/readEmployees">Manage users</a></li>
								<li><a href="#">Change Password</a></li>
								<li><a href="<?php echo base_url() ?>index.php/adminlogoutcontroller">Logout</a></li>

							</ul>
						</li>
					<?php }?>
					</ul>
				</div>
			</div>

		</div>

	</nav>

