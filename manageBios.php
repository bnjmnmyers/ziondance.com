<?php
	include 'includes/_dbConnect.php';
	$isLoggedIn = isLoggedIn();
	if(isset($_REQUEST['process']) && $_REQUEST['process'] == 'add')
	{	
		$processMessage = addMemberBio();
	}
	else if(isset($_REQUEST['process']) && $_REQUEST['process'] == 'edit')
	{
		$processMessage = editMemberBio();	
	}
	else if(isset($_REQUEST['process']) && $_REQUEST['process'] == 'remove')
	{
		$processMessage = removeMemberBio();	
	}
	$tourDates = getMemberBio();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Welcome to the Home Page of Zion Dance Company. Find out all that you need to know about our dance company located in Jefferson City, TN." />
	<meta name="keywords" content="dance company, zion dance company, zion dance, jefferson city tn, jefferson city, morristown tn, morristown, knoxville tn, knoxville, tennessee, dance company in jefferson city tn, dance company in knoxville tn, professional dance company, dance, company, dance troop, dance group, christian dance company, christian dance, christian, myers, moss, loveday, jones, mason, recker" />
	<title>Zion Dance Company | Learn all about Zion Dance Company - About</title>
	<link rel="shortcut icon" href="http://www.ziondance.com/favicon.ico" />
	<link href="css/global.css" rel="stylesheet" />
	<link href="css/admin.css" rel="stylesheet" />
	<link href="css/manageDates.css" rel="stylesheet" />
	<?php include 'includes/_scriptIncludes.php' ?>
</head>

<body>
	<div id="outterWrapper">
		<?php include 'includes/_nav.php'; ?>
		<div id="wrapper">
			<div id="infoTop">
				<h1 class="pageTitle">Manage Dates</h1>
			</div>
			<div id="info">
				<ul id="subNav">
					<li><span>Select a category:</span></li>
					<li id="addDates" class="subNavLink<?php if(!isset($_REQUEST['confirm']) || $_REQUEST['confirm'] == 'add'){?> active<?php } ?>">Add Bio</li>
					<li id="editDates" class="subNavLink<?php if(isset($_REQUEST['confirm']) && $_REQUEST['confirm'] == 'edit'){?> active<?php } ?>">Edit Bios</li>
					<li id="removeDates" class="subNavLink<?php if(isset($_REQUEST['confirm']) && $_REQUEST['confirm'] == 'remove'){?> active<?php } ?>">Remove Bios</li>
				</ul>
				<?php 
					if(strlen($processMessage))
					{
						echo "<div id='processMessage'>";
						echo $processMessage;
						echo "</div>";
					}
				?>
				<div id="addDatesCont" class="infoCont">
					<h2>Add Dates</h2>
					<form id="addDates" method="post" action="manageDates.php?process=add">
						<label for="venueName">Venue:</label>
						<input type="text" name="venueName" />
						<label for="hostName">Host:</label>
						<input type="text" name="hostName" />
						<label for="hostLink">Host Link:</label>
						<input type="text" name="hostLink" /><br/>
						<label for="event">Event:</label>
						<input type="text" name="event" /><br/>
						<label for="program">Program:</label>
						<input type="text" name="program" /><br/>
						<label for="address">Address:</label>
						<input type="text" name="address" /><br/>
						<label for="city">City:</label>
						<input type="text" name="city" />
						<label for="state">State:</label>
						<input type="text" name="state" />
						<label for="zip">Zip:</label>
						<input type="text" name="zip" /><br/>
						<label for="date">Start Date:</label>
						<input type="text" name="date" />
						<label for="endDate">End Date:</label>
						<input type="text" name="endDate" />
						<label for="time">Time:</label>
						<input type="text" name="time" /><br/>
						<input type="submit" name="submit" value="Add" />
					</form>
				</div>
				<div id="editDatesCont" class="infoCont">
					<h2>Edit Dates</h2>
					<?php
						if(mysql_num_rows($tourDates) > 0)
						{
							while($row = mysql_fetch_array($tourDates))
							{	
								$endDate = $row['endDate'];
								$hostLink = $row['hostLink'];
								$hostName = $row['hostName'];
								$program = $row['program'];
								$event = $row['event'];
								$performanceTime = $row['performanceTime'];
								$venueName = $row['venueName'];
								$tourID = $row['tourID'];
								$address = $row['address'];
								$city = $row['city'];
								$date = $row['date'];
								$state = $row['state'];
								$postalCode = $row['postalCode'];
								
								echo
								"<h3>Tour Date: ".$date."</h3>
								<form method='post' action='manageDates.php?process=edit&tourID=".$tourID."'>
									<table class='event'>
										<tr>
											<td>Venue Name</td>
											<td>Host Link</td>
											<td>Host Name</td>
											<td>Event</td>
											<td>Program</td>
										</tr>
										<tr class='inputRow'>
											<td>
												<input type='text' name='venueName' value='".$venueName."' />
											</td>
											<td>
												<input type='text' name='hostLink' value='".$hostLink."' />
											</td>
											<td>
												<input type='text' name='hostName' value='".$hostName."' />
											</td>
											<td>
												<input type='text' name='event' value='".$event."' />
											</td>
											<td>
												<input type='text' name='program' value='".$program."' />
											</td>
										</tr>
										<tr>
											<td>Address</td>
											<td>City</td>
											<td>State</td>
											<td>Zip</td>
										</tr>
										<tr class='inputRow'>
											<td>
												<input type='text' name='address' value='".$address."' />
											</td>
											<td>
												<input type='text' name='city' value='".$city."' />
											</td>
											<td>
												<input type='text' name='state' value='".$state."' />
											</td>
											<td>
												<input type='text' name='zip' value='".$postalCode."' />
											</td>
										</tr>
										<tr>
											<td>Start Date</td>
											<td>End Date</td>
											<td>Time</td>
										</tr>
										<tr class='inputRow'>
											<td>
												<input type='text' name='date' value='".$date."' />
											</td>
											<td>
												<input type='text' name='endDate' value='".$endDate."' />
											</td>
											<td>
												<input type='text' name='time' value='".$performanceTime."' />
											</td>
											<td>
												<input type='submit' name='submit' value='update' />
											</td>
										</tr>
									</table>
								</form>";	
							}
						}else{
							echo "<p id='tour'>There are currently no tour dates scheduled.<br/>To book Zion Dance Company, go to our<br/> <a href='contact.php'>Contact Page</a></p>";
						}
					?>
				</div>
				<div id="removeDatesCont" class="infoCont">
					<h2>Remove Dates</h2>
				</div>
			</div>
			<div id="infoBttm"></div>
			<div id="footer">	
			</div>
		</div>
	</div>
</body>
</html>