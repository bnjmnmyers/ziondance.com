<?php
	include 'includes/_dbConnect.php';
	$tourDates = getTourDates();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Welcome to the Home Page of Zion Dance Company. Discover what dates we will be in your area." />
	<meta name="keywords" content="dance company, zion dance company, zion dance, jefferson city tn, jefferson city, morristown tn, morristown, knoxville tn, knoxville, tennessee, dance company in jefferson city tn, dance company in knoxville tn, professional dance company, dance, company, dance troop, dance group, christian dance company, christian dance, christian, myers, moss, loveday, jones, mason, recker" />
	<title>Zion Dance Company | Discover what dates we will be in your area - Dates</title>
	<link rel="shortcut icon" href="http://www.ziondance.com/favicon.ico" />
	<link href="css/global.css" rel="stylesheet" />
	<link href="css/dates.css" rel="stylesheet" />
	<?php include 'includes/_scriptIncludes.php' ?>
</head>

<body>
	<div id="outterWrapper">
		<?php include 'includes/_nav.php'; ?>
		<div id="wrapper">
			<div id="infoTop">
				<h1 class="pageTitle">Dates</h1>
			</div>
			<div id="info">
				<div id="datesCont" class="infoCont">
					<?php
						if(mysql_num_rows($tourDates) > 0)
						{
							$i = 1;
							while($row = mysql_fetch_array($tourDates))
							{	
								$address = $row['address'];
								$city = $row['city'];
								$endDate = $row['endDate'];
								$hostLink = $row['hostLink'];
								$hostName = $row['hostName'];
								$performanceTime = $row['performanceTime'];
								$postalCode = $row['postalCode'];
								$program = $row['program'];
								$date = $row['date'];
								$state = $row['state'];
								$venueName = $row['venueName'];
								$event = $row['event'];
								
								$programRef = '';
								
								if($program == 'The Story')
								{
									$programRef = 'theStory';	
								}
								else
								{
									$programRef = 'encounter';	
								}
								
								echo 
									"<table class='tour'>
										<tr>
											<td colspan='2' class='date'>".$date.((strlen($endDate) ? ' - '.$endDate : ''))."</td>
										</tr>
										<tr class='eventCont'>
											<td class='tourLabel'>Event:</td>
											<td>".$event."</td>
										</tr>
										<tr>
											<td class='tourLabel'>Program:</td>
											<td><a href='repertoire.php?program=".$programRef."'>".$program."</a></td>
										</tr>
										<tr>
											<td class='tourLabel'>Program Host:</td>
											<td>".((strlen($hostLink) ? '<a href="'.$hostLink.'"target="_blank"/>' : '')).$hostName.((strlen($hostLink) ? '</a>' : ''))."</td>
										</tr>
										<tr>
											<td class='tourLabel'>Location:</td>
											<td>
												<p>".$address."</p>
												<p>".$city.', '.$state.' '.$postalCode."</p>
											</td>
										</tr>
										<tr>
											<td class='tourLabel'>Program Time:</td>
											<td>".$performanceTime."</td>
										</tr>
									</table>";
									$i++;
							}
						}else{
							echo "<p id='tour'>There are currently no tour dates scheduled.<br/>To book Zion Dance Company, go to our<br/> <a href='contact.php'>Contact Page</a></p>";
						}
					?>
				</div>
			</div>
			<div id="infoBttm"></div>
			<div id="footer">
				
			</div>
		</div>
	</div>
</body>
</html>