<?php
	include 'includes/_dbConnect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Welcome to the Booking Page of Zion Dance Company. Discover the information that you need to know in order to have Zion at your event." />
	<meta name="keywords" content="dance company, zion dance company, zion dance, jefferson city tn, jefferson city, morristown tn, morristown, knoxville tn, knoxville, tennessee, dance company in jefferson city tn, dance company in knoxville tn, professional dance company, dance, company, dance troop, dance group, christian dance company, christian dance, christian, myers, moss, loveday, jones, mason, recker" />
	<title>Zion Dance Company | Zion Dance Company Booking Information - Booking</title>
	<link rel="shortcut icon" href="http://www.ziondance.com/favicon.ico" />
	<link href="css/global.css" rel="stylesheet" />
	<link href="css/booking.css" rel="stylesheet" />
	<?php include 'includes/_scriptIncludes.php' ?>
	<!--<script type="text/javascript" language="javascript">
		$(document).ready(function(){
			$('.section ul').hide();
			$('.section h3').bind('click', function(){
				if($(this).siblings('ul').hasClass('expanded'))
				{
					$(this).siblings('ul').removeClass('expanded').slideUp();	
				}
				else
				{
					$(this).siblings('ul').addClass('expanded').slideDown();
				}
			});
		});
	</script>-->
</head>

<body>
	<div id="outterWrapper">
		<?php include 'includes/_nav.php'; ?>
		<div id="wrapper">
			<div id="infoTop">
				<h1 class="pageTitle">Booking</h1>
			</div>
			<div id="info">
				<p>If you are interested in booking Zion Dance Company, please review the following information.</p>
				<div class="section">
					<h3>Scheduling</h3>
					<ul>
						<li>Choose a program from ZDC’s <a href="repertoire.php">Repertoire</a> and contact us today for availability.</li>
						<li>ZDC is also willing to minister requested pieces at special events (conferences, retreats, schools, etc.)  You may select songs from their repertoire or submit a song request to be choreographed and performed at your event.</li>
					</ul>
				</div>
				<div class="section">
					<h3>Facility</h3>
					<ul>
						<li>Their preferred stage dimensions are 40 feet wide by 25 feet deep.  However, they are willing to work with the space you have available.</li>
						<li>ZDC travels with a Marley Dance floor.</li>
					</ul>
				</div>
				<div class="section">
					<h3>Finances</h3>
					<ul>
						<li>There is no booking fee.</li>
						<li>At some point in the program it is customary for a ZDC member to share briefly about the vision of the company. This is an appropriate time to receive a love offering.</li>
						<li>Occasionally ZDC will perform in a venue that will be ticketed.</li>
						<li>For long distance travel, ZDC will request travel expenses in addition to receiving a love offering.</li>
						<li>If you have booked a special event performance where it would not be appropriate to receive a love offering, an honorarium is appreciated.</li>
					</ul>
				</div>
			</div>
			<div id="infoBttm"></div>
			<div id="footer">
				
			</div>
		</div>
	</div>
</body>
</html>