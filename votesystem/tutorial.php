<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "votingsystem");
function make_query($connect)
{
	$query = "SELECT * FROM candidates ORDER BY id ASC";
	$result = mysqli_query($connect, $query);
	return $result;
}

function make_slide_indicators($connect)
{
	$output = ''; 
	$count = 0;
	$result = make_query($connect);
	while($row = mysqli_fetch_array($result))
	{
		if($count == 0)
		{
			$output .= '
			<li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
			';
		}
		else
		{
			$output .= '
			<li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
			';
		}
		$count = $count + 1;
	}
	return $output;
}

function make_slides($connect)
{
	$output = '';
	$count = 0;
	$result = make_query($connect);
	while($row = mysqli_fetch_array($result))
	{
		if($count == 0)
		{
			$output .= '<div class="item active">';
		}
		else
		{
			$output .= '<div class="item">';
		}
		$output .= '
		<img src="images/'.$row["photo"].'" alt="'.$row["position_id"].'" style="height: 500px; width: 500px; margin: auto; object-fit: cover;" />
		<div class="carousel-caption ">
		<h4>'.$row["firstname"].' '.$row["lastname"].'</h4>
		<p>Partylist: '.$row["partylist"].'</p>
		<p>Platforms: '.$row["platform"].'</p>
		</div>
		</div>
		';
		$count = $count + 1;
	}
	return $output;
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tutorial Vote</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link
	href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
	rel="stylesheet"
	/>
	<style type="text/css">
		@import url("https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap");

		:root {
			--primary-color: #b32557;
			--white: #ffffff;
			--max-width: 1200px;
		}

		* {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}

		body {
			min-height: 100vh;
			font-family: "Fredoka", sans-serif;
			background-image: url("head.jpg");
			background-position: center center;
			background-repeat: no-repeat;
			background-size: cover;
		}

		.container {
			min-height: 100vh;
			display: flex;
			flex-direction: column;
			max-width: var(--max-width);
			margin: auto;
			overflow: hidden;
		}

		nav {
			padding: 2rem 1rem;
			overflow: hidden;
		}


		.nav__links {
			list-style: none;
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 2rem;
		}

		.nav__links > div li:not(:first-child) {
			display: none;
		}

		.nav__links img {
			max-width: 50px;
		}

		.nav__links a {
			position: relative;
			isolation: isolate;
			padding-bottom: 10px;
			text-decoration: none;
			font-weight: 500;
			color: var(--white);
		}

		.nav__links a::after {
			position: absolute;
			content: "";
			bottom: 0;
			left: 0;
			height: 2px;
			width: 0;
			background-color: var(--white);
			transition: 0.3s;
		}

		.nav__links a:hover::after {
			width: 100%;
		}

		.section__container {
			flex: 1;
			width: 100%;
			position: relative;
			isolation: isolate;
			padding: 5rem 1rem;
			display: flex;
			flex-direction: column;
			justify-content: center;
		}

		.section__container h3 {
			margin-bottom: 1rem;
			font-size: 1.5rem;
			font-weight: 500;
			color: var(--white);
		}

		.section__container h1,
		.section__container h2, {
			font-size: 4rem;
			font-weight: 600;
			color: var(--white);
			line-height: 4rem;
		}
		.section__container p{
			font-size: 1rem;
			font-weight: 250;
			color: var(--white);
			line-height: 1rem;
		}
		.section__container h1 {
			-webkit-text-fill-color: transparent;
			-webkit-text-stroke: 2px var(--white);
		}

		.section__container button {
			max-width: fit-content;
			margin-block: 5rem;
			padding-left: 1rem;
			font-size: 1rem;
			font-weight: 600;
			color: var(--white);
			display: flex;
			align-items: center;
			gap: 1rem;
			background-color: transparent;
			outline: none;
			border: 2px solid var(--white);
			cursor: pointer;
		}

		.section__container button span {
			padding: 10px 25px;
			font-size: 1.5rem;
			color: var(--primary-color);
			background-color: var(--white);
		}

		.scroll__bottom {
			position: absolute;
			bottom: 0;
			transform: translate(-50%, -5rem) rotate(-90deg);
			animation: scroll-down 2s linear infinite;
		}

		.scroll__bottom a {
			text-decoration: none;
			display: flex;
			align-items: center;
			gap: 10px;
			color: var(--white);
		}

		.scroll__bottom span {
			display: block;
			font-size: 1.2rem;
			transform: rotate(90deg);
		}

		@keyframes scroll-down {
			0% {
				translate: 0 0;
			}
			50% {
				translate: 0 10px;
			}
			100% {
				translate: 0 0;
			}
		}

		.socials {
			position: absolute;
			bottom: 2rem;
			right: 2rem;
			display: flex;
			align-items: center;
			gap: 1rem;
		}

		.socials a {
			text-decoration: none;
			padding: 6px 8px;
			font-size: 1.5rem;
			color: var(--primary-color);
			background-color: var(--white);
			border-radius: 100%;
			box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.2);
		}

		@media (width > 540px) {
			.section__container h1,
			.section__container h2 {
				font-size: 5.5rem;
				line-height: 5.5rem;
			}
		}

		@media (width > 768px) {
			.nav__links > div li:not(:first-child) {
				display: block;
			}

			.nav__links > div {


				display: flex;
				align-items: center;
				gap: 2rem;
			}

			.section__container h1,
			.section__container h2 {
				font-size: 7rem;
				line-height: 7rem;
			}
		}
    .glass-container {

    width: 700px;
    height: 600px;
    background-color: rgba(0, 0, 0, 0.2); /* Black with 20% opacity */
    border-radius: 10px; /* Rounded corners for a glass effect */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow effect */
    backdrop-filter: blur(10px); /* Blur effect (for modern browsers) */
  }
	</style>
	<script type="text/javascript">
		const scrollRevealOption = {
			distance: "50px",
			origin: "bottom",
			duration: 1000,
		};

		ScrollReveal().reveal(".section__container h3", {
			...scrollRevealOption,
		});
		ScrollReveal().reveal(".section__container h1", {
			...scrollRevealOption,
			origin: "left",
			delay: 500,
		});
		ScrollReveal().reveal(".section__container h2", {
			...scrollRevealOption,
			origin: "right",
			delay: 1000,
		});
		ScrollReveal().reveal(".section__container button", {
			...scrollRevealOption,
			delay: 1500,
		});

		ScrollReveal().reveal(".nav__links li", {
			...scrollRevealOption,
			origin: "top",
			interval: 300,
			delay: 2000,
		});

		ScrollReveal().reveal(".socials a", {
			duration: 1000,
			interval: 500,
			delay: 4000,
		});
	</script>
	
</head>
<body>
	<div class="container">
		<nav>
			<ul class="nav__links">
				<div>
					<li>
						<img src="logo.png" alt="logo" />
					</li>
					<li><a href="#">University Election Online Ballot</a></li>
					<li><a href="#"><?php 
        				echo $_SESSION['voter']; 
        				?></a>
        			</li>
					<li><a href="home.php">VOTE</a></li>
				</div>
				<li><a href="logout.php">LOGOUT</a></li>
			</ul>
		</nav><center><div class="glass-container">
				<h2 align="center" style="color: white; padding-top: 20px;">Candidates</h2>
				<br>
				
				<div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php echo make_slide_indicators($connect); ?>
					</ol>
					<div class="carousel-inner">
						<?php echo make_slides($connect); ?>
					</div>
					<a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
						<span class="sr-only">Previous</span>
					</a>

					<a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</center>
			<section class="section__container">
				<p style="font-size: 1.25rem; text-align: center;">This project is a web-based ballot management system that allows the students of an institute to vote easily and securely. Security is ensured using SHA encryption and an additional layer of password protection to access the files. Additionally, we employ a VPN to provide more secure data transfers between campuses.
				</p>
			<div class="socials">
				<a href="#"><i class="ri-dribbble-fill"></i></a>
				<a href="#"><i class="ri-instagram-line"></i></a>
				<a href="#"><i class="ri-youtube-fill"></i></a>
			</div>
		</section>
	</div>
	<script src="https://unpkg.com/scrollreveal"></script>
</body>
</html>