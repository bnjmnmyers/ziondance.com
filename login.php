<?php
	include 'includes/_dbConnect.php';
	
	if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
	{
		
		$clientUsername = $_REQUEST['username'];
		$clientPassword = $_REQUEST['password'];
		
		$loginMessage = login($clientUsername, $clientPassword);

	}
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
	<link href="css/login.css" rel="stylesheet" />
	<?php include 'includes/_scriptIncludes.php' ?>
</head>

<body>
	<div id="outterWrapper">
		<?php include 'includes/_nav.php'; ?>
		<div id="wrapper">
			<div id="infoTop">
				<h1 class="pageTitle">Login</h1>
			</div>
			<div id="info">
				<?php
					if(isset($loginMessage))
					{
						echo "<span id='loginError' class='error'>".$loginMessage."</span>";	
					}
				?>
				<form id="loginForm" action="login.php" method="post">
					<table cellpadding="0">
						<tr>
							<td class="label">
								<label for="username">Username:</label>
							</td>
							<td>
								<input type="text" name="username" /><br/>
							</td>
						</tr>
						<tr>
							<td class="label">
								<label for="password">Password:</label>
							</td>
							<td>
								<input type="password" name="password" /><br/>
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" name="submit" value="Login" />
							</td>
						</tr>
					</table>
				</form>
			</div>
			<div id="infoBttm"></div>
			<div id="footer">	
			</div>
		</div>
	</div>
</body>
</html>