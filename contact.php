<?php
	include 'includes/_dbConnect.php';
	$booking = $_REQUEST['booking'];
	$comments  = $_REQUEST['comments'];
	$confirmEmail = $_REQUEST['confirmEmail'];
	$contactMethod = $_REQUEST['contactMethod'];
	$firstname = $_REQUEST['firstname'];
	$email = $_REQUEST['email'];
	$lastname = $_REQUEST['lastname'];
	$phone = $_REQUEST['phone'];
	$proposedDate = $_REQUEST['proposedDate'];
	
	if($_REQUEST['submit'])
	{
		$processMessage = processContact();
		
		if($processMessage == 'Success')
		{				
			$booking = '';
			$comments = '';
			$confirmEmail = '';
			$firstname = '';
			$email = '';
			$lastname = '';
			$phone = '';
			$proposedDate = '';
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Welcome to the Contact Page of Zion Dance Company. Get into touch with Zion about having us visit your church or event." />
	<meta name="keywords" content="dance company, zion dance company, zion dance, jefferson city tn, jefferson city, morristown tn, morristown, knoxville tn, knoxville, tennessee, dance company in jefferson city tn, dance company in knoxville tn, professional dance company, dance, company, dance troop, dance group, christian dance company, christian dance, christian, myers, moss, loveday, jones, mason, recker" />
	<title>Zion Dance Company | Get in touch with some one for more information about ZDC - Contact</title>
	<link rel="shortcut icon" href="http://www.ziondance.com/favicon.ico" />
	<link href="css/global.css" rel="stylesheet" />
	<link href="css/contact.css" rel="stylesheet" />
	<link href="css/zion-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet">
	<?php include 'includes/_scriptIncludes.php' ?>
	<script type="text/javascript" language="javascript" src="js/jquery-ui-1.10.0.custom.min.js"></script>
	<script type="text/javascript" language="javascript">
		$(document).ready(function(){
			
			$('.interest').bind('click', function(){
				if($(this).attr('id') == 'interested'){
					$('#date').show();	
				}
				else{
					$('#date').hide();	
				}
			})
		})
		
		$(function(){
			$("#datepicker").datepicker({
				inline: true
			});
		})
	</script>
</head>

<body>
	<div id="outterWrapper">
		<?php include 'includes/_nav.php'; ?>
		<div id="wrapper">
			<div id="infoTop">
				<h1 class="pageTitle">Contact</h1>
			</div>
			<div id="info">
				<div id="colOne">
					<span id="required">* Required Fields</span>
					<?php
						if(strlen($processMessage) > 0)
						{
							echo "<span class='error'>".$processMessage."</span>";	
						}
					?>
					<form method="post" action="contact.php">
						<input type="hidden" name="honeyPot" value="" />
						<div id="leftSide">
							<div>
								<label for="firstname">First Name:<span class="requiredMarker">*</span></label><br/>
								<input type="text" name="firstname" value="<?php echo $firstname; ?>" />
							</div>
							<div>
								<label for="lastname">Last Name:<span class="requiredMarker">*</span></label><br/>
								<input type="text" name="lastname" value="<?php echo $lastname; ?>" />
							</div>
							<div>
								<label for="email">Email:<span class="requiredMarker">*</span></label><br/>
								<input type="text" name="email" value="<?php echo $email; ?>" />
							</div>
							<div>
								<label for="confirmEmail">Confirm Email:<span class="requiredMarker">*</span></label><br/>
								<input type="text" name="confirmEmail" value="<?php echo $confirmEmail; ?>" />
							</div>
							<div>
								<label for="phone">Phone:<span class="requiredMarker">*</span> <span class="example">ex: 865-245-9466</span></label><br/>
								<input type="text" name="phone" value="<?php echo $phone; ?>" />
							</div>
						</div>
						<div id="rightSide">
							<div id="contactMethod">
								<label for="contactMethod">Preferred Contact Method:</label>
								Phone: <input type="radio" name="contactMethod" value="phone" />
								Email: <input type="radio" name="contactMethod" value="email" />
							</div>
							<div id="booking">
								<label for="booking">Interested in booking Zion?</label>
								Yes: <input id="interested" class="interest" type="radio" name="booking" value="Y" />
								No: <input id="notInterested" class="interest" type="radio" name="booking" value="N" checked/>
							</div>
							<div id="date" style="display: none;">
								<label for="proposedDate">Suggested Date: <span class="example">ex: 01/27/13</span></label><br/>
								<input type="text" id="datepicker" name="proposedDate"  value="<?php echo $proposedDate; ?>"/>
							</div>
							<div id="comments">
								<label for"comments">Comments:</label><br/>
								<textarea name="comments" rows="10" cols="50"><?php echo $comments; ?></textarea>
							</div>
							<div id="submit">
								<input type="submit" name="submit" value="Submit" />
							</div>
						</div>
					</form>
				</div>
				<div id="colTwo">
					<p>Phone: (865)245-ZION(9466)</p>
					<p>Email: info@ziondance.com</p>
				</div>
			</div>
			<div id="infoBttm"></div>
			<div id="footer">
				
			</div>
		</div>
	</div>
</body>
</html>