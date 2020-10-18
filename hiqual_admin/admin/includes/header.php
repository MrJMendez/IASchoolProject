<div class="brand clearfix">
	<img style=" width: 70px ; height: 70px;" src="includes/logo.png">
	<a href="dashboard.php" style="font-size: 20px; color: white; ">HiQual Electronics </a>  
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			
			<li class="ts-account">

				<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> <?php if(isset($_SESSION['alogin'])): echo $_SESSION['aName'];?><?php else: echo Account?><?php endif ?> <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="change-password.php">Change Password</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
