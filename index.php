<?php
	include 'includes/_dbConnect.php';
	$tourDates = getTourDates();
	//Using to limit the number of tour dates that are displayed on the fronpage.
	$i = 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Welcome to the Home Page of Zion Dance Company. Find out all that you need to know about our christian dance company located in Jefferson City, TN." />
	<meta name="keywords" content="dance company, zion dance company, zion dance, jefferson city tn, jefferson city, morristown tn, morristown, knoxville tn, knoxville, tennessee, dance company in jefferson city tn, dance company in knoxville tn, professional dance company, dance, company, dance troop, dance group, christian dance company, christian dance, christian, myers, moss, loveday, jones, mason, recker" />
	<title>Zion Dance Company | Welcome to the home of Zion Dance Company in Jefferson City, TN - Home Page</title>
	<link rel="shortcut icon" href="http://www.ziondance.com/favicon.ico" />
	<link href="css/global.css" rel="stylesheet" />
	<link href="css/index.css" rel="stylesheet" />
	<?php include 'includes/_scriptIncludes.php' ?>
	<script type="text/javascript" language="javascript" src="/js/slides.min.jquery.js"></script>
	<script type="text/javascript" language="javascript">
		$(function(){
			$('#slides').slides({
				generatePagination: false,
				preload: true,
				play: 5000
			});	
		});
	</script>
</head>

<body>
	<div id="outterWrapper">
		<?php include 'includes/_nav.php'; ?>
		<div id="wrapper">
			<div id="slides">
				<div class="slides_container">
					<div>
						<a href="dates.php">
							<img src="images/encounterFeature.jpg" height="330" width="940" alt="Zion Dance Performs Encounter" title="Encounter Tour Announcement" />
						</a>
					</div>
					<div>
						<a href="dates.php">
							<img src="images/theStoryFeature.jpg" height="330" width="940" alt="Zion Dance Performs The Story" title="The Story Tour Announcement" />
						</a>
					</div>
				</div>
			</div>
			<div id="info">
				<div id="gallery">
					<div id="galleryTitle" class="infoTitles">
						<img src="images/galleryTitle.jpg" height="44" width="136" alt="Zion Dance Company Gallery" title="Zion Dance Company Gallery Title" />
					</div>
					<div id="galleryCont" class="infoBlock">
						<img src="images/zion.jpg" height="286" width="590" alt="Zion Dance Company Rehearsal Picture" title="Zion Dance Company Works on Encounter" />
					</div>
				</div>
				<div id="tourDates">
					<div id="tourDatesTitle" class="infoTitles">
						<img src="images/tourDatesTitle.jpg" height="44" width="184" alt="Zion Dance Company Tour Dates" title="Zion Dance Company Tour Dates Title" />
					</div>
					<div id="tourDatesCont" class="infoBlock">
						<?php
							if(mysql_num_rows($tourDates) > 0)
							{
								$i = 1;
								while($row = mysql_fetch_array($tourDates))
								{	
									$date = $row['date'];
									$endDate = $row['endDate'];
									$hostName = $row['hostName'];
									$hostLink = $row['hostLink'];
									$program = $row['program'];
									$performanceTime = $row['performanceTime'];
									$venueName = $row['venueName'];
									
									
									if($i < 5)
									{
										echo 
										"<div id='tour'>
											<p>Venue: <span class='venue'>".$venueName."</span></p>
											<p>Host: <span class='host'>".((strlen($hostLink) ? '<a href="'.$hostLink.'"target="_blank"/>' : '')).$hostName.((strlen($hostLink) ? '</a>' : ''))."</span></p>
											<p>Program: <span class='program'>".$program."</span></p>
											<p class='date'>".$date.((strlen($endDate) ? ' - '.$endDate : ''))." @&nbsp;</p>
											<p class='time'>".$performanceTime."</p>
										</div>";
										$i++;
									}
								}
							}else{
								echo "<p id='tour'>There are currently no tour dates scheduled.<br/>To book Zion Dance Company, go to our<br/> <a href='contact.php'>Contact Page</a></p>";
							}
						?>
					</div>
				</div>
			</div>
			<div id="footer">
				<?php include 'includes/_social.php'; ?>
			</div>
		</div>
	</div>
</body>
</html>