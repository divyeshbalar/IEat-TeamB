
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">

			<div class="row" >
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="<?php echo base_url() ?>index.php">Pizza <em style="font-size: small;">. Restaurant</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="<?php echo base_url() ?>index.php/menucontroller">Menu</a></li>
						<li><a href="<?php echo base_url() ?>index.php/#favorites">Favorites</a></li>
						<li><a href="<?php echo base_url() ?>index.php/#getInTouch">Contact</a></li>
						<?php
if ($flag == true) {?>
							<li class="has-dropdown btn-cta">
							<a href="services.html"><span><?php echo $_SESSION['uname']; ?></span></a>
							<ul class="dropdown">
								<li><a href="#">Profile</a></li>
								<li><a href="#">Change Password</a></li>
								<li><a href="#">Order History</a></li>
								<li><a href="<?php echo base_url() ?>index.php/logout">Logout</a></li>

							</ul>
						</li>
						<!-- <li class="btn-cta"><a href="<?php echo base_url() ?>index.php/logout"><span>Logout</span></a></li> -->
						<?php } else {?>
						<li class="btn-cta"><a href="<?php echo base_url() ?>index.php"><span>Register/Login</span></a></li>
					<?php }?>
						<!-- <?php if ($flag == true) {?>
							<li class="has-dropdown">
							<a href="services.html"><?php echo $_SESSION['uname']; ?></a>
							<ul class="dropdown">
								<li><a href="#">Profile</a></li>
								<li><a href="#">Change Password</a></li>
								<li><a href="#">Order History</a></li>
								<li><a href="<?php echo base_url() ?>index.php/logout">Logout</a></li>

							</ul>
						</li><?php }?>
 -->
 							<li><a href="<?php echo base_url() ?>index.php/menucontroller/#cart"><span style="border:2px;border-color:#000;!important"><img src="<?php echo base_url() ?>assets/images/cart.png" width="40px" height="40px"></span></a></button></li>
					</ul>
				</div>
			</div>

		</div>

	</nav>

