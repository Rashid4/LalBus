<!DOCTYPE html>
<html>
	<head>
		<?php
			include "Myheader.php";
			setTitle($_GET['var']);
		?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
		<link href="plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
		<style>
			body{
				<?php
					setBackground($_GET['var']);
				?>
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-size: 100% 100%;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
		<link rel="icon" href="images/DU.PNG">
	</head>
	<body>
		<div class="header_container d-flex flex-row align-items-center justify-content-start">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<div>dulalbus</div>
					<div>du transports</div>
					<div class="logo_image"><img src="images/logo.png" alt=""></div>
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav ml-auto">
				<ul class="main_nav_list">
					<li class="main_nav_item"><a href="index.php">Home</a></li>
					<li class="main_nav_item active">
					<div class="dropdown">
						<a class="dropbtn" id="id1" onmouseover="makeActive()" href="bus.php">Bus</a>
						<div class="dropdown-content">
							<?php
								addDropdown();
							?>
						</div>
					</div>
					</li>
					<li class="main_nav_item"><a href="about.php">About us</a></li>
					<li class="main_nav_item"><a href="contact.php">Contact</a></li>
				</ul>
			</nav>

			<!-- Search -->
			<div class="search">
				<form action="#" class="search_form">
					<input type="search" name="search_input" class="search_input ctrl_class" required="required" placeholder="Keyword">
					<button type="submit" class="search_button ml-auto ctrl_class"><img src="images/search.png" alt=""></button>
				</form>
			</div>

			<!-- Hamburger -->
			<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
		</div>
		<div class="tab">
			<button class="tablinks" onclick="openPage(event, 'Home')" id="defaultOpen">Bus Name</button>
			<p>.............................................</p>
			<button class="tablinks" onclick="openPage(event, 'Stoppage')">Stoppage</button>
			<button class="tablinks" onclick="openPage(event, 'Uptrip')">Uptrip</button>
			<button class="tablinks" onclick="openPage(event, 'Downtrip')">Downtrip</button>
			<button class="tablinks" onclick="openPage(event, 'Comittee')">Comittee</button>
		</div>
		
		<div id="Home" class="tabcontent">
			<h1>Bus name</h1>
			<?php
				echo "<p>Bus name is ".$_GET['var']."</p>";
			?>
			<a href="https://maps.app.goo.gl/GNLOLsYaPOSSWDMk1">View track</a>
		</div>

		<div id="Stoppage" class="tabcontent">
			<h1>Stoppage</h1>
			<?php
				$conn = openmysqlconnection();
				$sql = "SELECT stopage from businfo where busid = '".getBusId($conn, $_GET['var'])."'";
				$result = mysqli_query($conn, $sql);
				echo "<ul>";
				while($row = mysqli_fetch_assoc($result))
				{
					echo "<li><p>" . $row['stopage'] . "</p></li>";
				}
				echo "</ul>";
				closemysql($conn);
			?>
		</div>

		<div id="Uptrip" class="tabcontent">
			<h1>Uptrip</h1>
			<?php
				$conn = openmysqlconnection();
				$sql = "SELECT schedule from uptrip where busid = '".getBusId($conn, $_GET['var'])."'";
				$result = mysqli_query($conn, $sql);
				echo "<ul>";
				while($row = mysqli_fetch_assoc($result))
				{
					$data = $row['schedule'];
					$hour = substr($data, 0, 2);
					if((int)$hour < 12)
					{
						echo "<li><p>" . $data . " AM</p></li>";
					}
					else
					{
						echo "<li><p>" . ((int)$hour - 12) . substr($data, 2, 6) . " PM</p></li>";
					}
				}
				echo "</ul>";
				closemysql($conn);
			?>
		</div>

		<div id="Downtrip" class="tabcontent">
			<h1>Downtrip</h1>
			<?php
				$conn = openmysqlconnection();
				$sql = "SELECT schedule from downtrip where busid = '".getBusId($conn, $_GET['var'])."'";
				$result = mysqli_query($conn, $sql);
				echo "<ul>";
				while($row = mysqli_fetch_assoc($result))
				{
					$data = $row['schedule'];
					$hour = substr($data, 0, 2);
					if((int)$hour < 12)
					{
						echo "<li><p>" . $data . " AM</p></li>";
					}
					else
					{
						if((int)$hour>12)
						echo "<li><p>" . ((int)$hour - 12) . substr($data, 2, 6) . " PM</p></li>";
						else
							echo "<li><p>" . $data . " PM</p></li>";
					}
				}
				echo "</ul>";
				closemysql($conn);
			?>
		</div>
		
		<div id="Comittee" class="tabcontent">
			<h1>Comittee</h1>
			<p>Here are comittee members</p>
		</div>

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="styles/bootstrap4/popper.js"></script>
		<script src="styles/bootstrap4/bootstrap.min.js"></script>
		<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
		<script src="plugins/easing/easing.js"></script>
		<script src="plugins/parallax-js-master/parallax.min.js"></script>
		<script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="js/custom.js"></script>

		<script>
			function openPage(evt, cityName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(cityName).style.display = "block";
				evt.currentTarget.className += " active";
			}

			// Get the element with id="defaultOpen" and click on it
			document.getElementById("defaultOpen").click();
		</script>
	</body>
</html> 
