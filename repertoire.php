<?php
	include 'includes/_dbConnect.php';
	$memberBios = getMemberBios();
	$isEncounterActive = '';
	$isStoryActive = '';
	
	if(isset($_REQUEST['program']) && $_REQUEST['program'] == 'theStory')
	{
		$isStoryActive = 'active';	
	}
	elseif(isset($_REQUEST['program']) && $_REQUEST['program'] == 'encounter')
	{
		$isEncounterActive = 'active';	
	}
	else
	{
		$isEncounterActive = 'active';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Welcome to the Repertoire Page of Zion Dance Company. Learn about the programs that Zion has to offer." />
	<meta name="keywords" content="dance company, zion dance company, zion dance, jefferson city tn, jefferson city, morristown tn, morristown, knoxville tn, knoxville, tennessee, dance company in jefferson city tn, dance company in knoxville tn, professional dance company, dance, company, dance troop, dance group, christian dance company, christian dance, christian, myers, moss, loveday, jones, mason, recker" />
	<title>Zion Dance Company | Read about the different programs that Zion Dance Company has to offer. - Repertoire</title>
	<link rel="shortcut icon" href="http://www.ziondance.com/favicon.ico" />
	<link href="css/global.css" rel="stylesheet" />
	<link href="css/about.css" rel="stylesheet" />
	<?php include 'includes/_scriptIncludes.php' ?>
</head>

<body>
	<div id="outterWrapper">
		<?php include 'includes/_nav.php'; ?>
		<div id="wrapper">
			<div id="infoTop">
				<h1 class="pageTitle">Repertoire</h1>
			</div>
			<div id="info">
				<ul id="subNav">
					<li><span>Select a category:</span></li>
					<li id="encounter" class="subNavLink <?php echo $isEncounterActive ?>">Encounter</li>
					<li id="theStory" class="subNavLink <?php echo $isStoryActive ?>">The Story</li>
				</ul>
				<div id="encounterCont" class="infoCont">
					<img src="images/repertoire/encounterLogo.png" height="94" width="206" alt="Encounter Logo" title="Encounter Logo" />
					<p>
					Encounter: to come upon or experience especially unexpectedly.<br/><br/>
					Encounter is a worship set of 5 dance pieces that lasts 30 minutes. The goal of this program is to move the audience from observation to experience. The heart of this piece is to open a door for each person to encounter the Lord; feeling His love and experiencing His presence in a tangible way. It is designed to flow within your regular church service. At the conclusion, the ZDC team’s heart is to take a few minutes and pray with anyone who desires it. If our host prefers, ZDC can bring “Encounter” as a special service and lengthen the time to just over an hour. This type of service would include “Encounter”, worship provided by ZDC’s worship leader, and sharing from some of the team members.
					</p>
				</div>
				<div id="theStoryCont" class="infoCont">
					<img src="images/repertoire/theStoryLogo.png" height="94" width="206" alt="The Story Logo" title="The Story Logo" />
					<p>
					This program is a dramatic presentation through dance that lasts an hour and fifteen minutes. It is a journey through both the Old and New Testaments. Those in scripture who walked with God, received His anointing, witnessed His death and resurrection were only human. ZDC’s desire is that you would sit through an evening, feeling the same emotions they felt and would be able to parallel them to your present day experiences.This is a moving program and will be concluded with prayer for those who desire it.
					</p>
				</div>
			</div>
			<div id="infoBttm"></div>
			<div id="footer">
				
			</div>
		</div>
	</div>
</body>
</html>