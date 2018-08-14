<nav class="colorlib-nav" role="navigation">
	<div class="top-menu">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-2">
					<div id="colorlib-logo"><a href="index.php">Ghurte Jai</a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li class="<?php echo basename($_SERVER['PHP_SELF'])=="index.php" ? "active" : "" ?>"><a href="index.php">Home</a></li>
						<li class="<?php echo basename($_SERVER['PHP_SELF'])=="tours.php" ? "active" : "" ?>"><a href="tours.php">Tours</a></li>
						<li class="<?php echo basename($_SERVER['PHP_SELF'])=="hotels.php" ? "active" : "" ?>"><a href="hotels.php">Hotels</a></li>
						<li class="<?php echo basename($_SERVER['PHP_SELF'])=="blog.php" ? "active" : "" ?>"><a href="blog.php">Blog</a></li>
						<li class="<?php echo basename($_SERVER['PHP_SELF'])=="about.php" ? "active" : "" ?>"><a href="about.php">About</a></li>
						<li class="<?php echo basename($_SERVER['PHP_SELF'])=="contact.php" ? "active" : "" ?>"><a href="contact.php">Contact</a></li>
						<?php
			                $login= "<li id=\"id01\"><a href=\"#\" onclick=\"document.getElementById('id01').style.display='block'\" style=\"width:auto;\" >Login</a></li>";
			                $logout= "<li><a href=\"Admin/logout.php\">Logout</a></li>";

        					echo isset($_SESSION['user']) ? $logout : $login;
    					?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>