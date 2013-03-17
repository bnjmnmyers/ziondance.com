<?php
	include 'includes/_dbConnect.php';
	$videos = getVideos();
	$firstVideo = getFirstVideo();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Welcome to the Videos Page of Zion Dance Company. Enjoy demos of performances as well as bloopers and other things." />
	<meta name="keywords" content="dance company, zion dance company, zion dance, jefferson city tn, jefferson city, morristown tn, morristown, knoxville tn, knoxville, tennessee, dance company in jefferson city tn, dance company in knoxville tn, professional dance company, dance, company, dance troop, dance group, christian dance company, christian dance, christian, myers, moss, loveday, jones, mason, recker" />
	<title>Zion Dance Company | Enjoy past perfomances of tours from Zion Dance Company - Videos</title>
	<link rel="shortcut icon" href="http://www.ziondance.com/favicon.ico" />
	<link href="css/global.css" rel="stylesheet" />
	<link href="css/videos.css" rel="stylesheet" />
	<?php include 'includes/_scriptIncludes.php' ?>
</head>

<body>
	<div id="outterWrapper">
		<?php include 'includes/_nav.php'; ?>
		<div id="wrapper">
			<div id="infoTop">
				<h1 class="pageTitle">Videos</h1>
			</div>
			<div id="info">
				<div id="links">
					<ul>
						<?php
							while($row = mysql_fetch_array($videos))
							{
								$videoLink = $row['videoLink'];
								$performanceDate = $row['performanceDate'];
								$performanceName = $row['performanceName'];
								
								echo "<li id='".$videoLink."' class='videoLink'>".$performanceDate." - ".$performanceName."</li>";
							}
						?>
					</ul>
				</div>
				<div id="videoCont">
					<?php
						$firstVideoRow = mysql_fetch_array($firstVideo);
						$firstVideoLink = $firstVideoRow['videoLink'];
					?>
					<iframe id="video" src="<?php echo $firstVideoLink; ?>" width="700" height="394" frameborder="0" scrolling="no"></iframe>
				</div>
			</div>
			<div id="infoBttm"></div>
			<div id="footer">
				
			</div>
		</div>
	</div>
	<script type="text/javascript" language="javascript">
		$(function(){
			$('.videoLink').bind('click', function(){
				$('#video').attr('src',$(this).attr('id'));	
			});	
		});
	</script>
</body>
</html>