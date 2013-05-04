<?php

	session_start();

	mysql_connect("mysql51-025.wc2.dfw1.stabletransit.com", "414848_zdance", "Psalm1321314") or die();
	
	if(mysql_ping())
	{
		mysql_select_db("414848_zdance");
	
		// getMemberBios
		function getMemberBios(){
			$result = mysql_query("
				SELECT *
				FROM tblBiosRead
				ORDER BY memberRole, lastname ASC
			");
			
			return $result;	
		}
		
		//addMemberBio
		function addMemberBio(){
		
		}
		
		//editMemberBio
		function editMemberBio(){
		
		}
		
		//removeMemberBio
		function removeMemberBio(){
		
		}
		
		// addTourDates
		function addTourDates()
		{
			$venueName = $_REQUEST['venueName'];
			$hostLink = $_REQUEST['hostLink'];
			$hostName = $_REQUEST['hostName'];
			$program = $_REQUEST['program'];
			$address = $_REQUEST['address'];
			$city = $_REQUEST['city'];
			$state = $_REQUEST['state'];
			$postalCode = $_REQUEST['zip'];
			$date = $_REQUEST['date'];
			$endDate = $_REQUEST['endDate'];
			$event = $_REQUEST['event'];
			$performanceTime = $_REQUEST['time'];
			
			$processMessage = '';
			if($venueName != '' && $hostName != '' && $program != '' && $address != '' && $city != '' && $state != '' && $postalCode != '' && $date != '' && $performanceTime != '')
			{
				mysql_query("
					INSERT INTO tblToursRead(address, city, date, endDate, event, hostLink, hostName, performanceTime, postalCode, program, state, venueName) 
					VALUES('$address', '$city', '$date', '$endDate', '$event', '$hostLink', '$hostName', '$performanceTime', '$postalCode', '$program', '$state', '$venueName')
				");
				
				$rows = mysql_affected_rows();
				
				if($rows > 0)
				{
					$processMessage = "Tour successfully inserted.";
					
					$_REQUEST['venueName'] = '';
					$_REQUEST['hostLink'] = '';
					$_REQUEST['hostName'] = '';
					$_REQUEST['program'] = '';
					$_REQUEST['address'] = '';
					$_REQUEST['city'] = '';
					$_REQUEST['state'] = '';
					$_REQUEST['zip'] = '';
					$_REQUEST['date'] = '';
					$_REQUEST['endDate'] = '';
					$_REQUEST['event'] = '';
					$_REQUEST['time'] = '';
				}
			}
			else
			{
				$processMessage = "All fields are required.";	
			}
			
			return $processMessage;
		}
		
		//editTourDates
		function editTourDates(){
			$address = $_REQUEST['address'];
			$city = $_REQUEST['city'];
			$date = $_REQUEST['date'];
			$endDate = $_REQUEST['endDate'];
			$event = $_REQUEST['event'];
			$hostLink = $_REQUEST['hostLink'];
			$hostName = $_REQUEST['hostName'];
			$performanceTime = $_REQUEST['time'];
			$postalCode = $_REQUEST['zip'];
			$program = $_REQUEST['program'];
			$state = $_REQUEST['state'];
			$tourID = $_REQUEST['tourID'];
			$venueName = $_REQUEST['venueName'];
			
			mysql_query("
				UPDATE tblToursRead
				SET address='$address', city='$city', date='$date', endDate='$endDate', event='$event', hostLink='$hostLink', hostName='$hostName',
				performanceTime='$performanceTime', postalCode='$postalCode', program='$program', state='$state', venueName='$venueName'
				WHERE tourID = $tourID
			");
			
			$rows = mysql_affected_rows();
				
			if($rows > 0)
			{
				$processMessage = "Tour successfully inserted.";
				
				$_REQUEST['venueName'] = '';
				$_REQUEST['hostLink'] = '';
				$_REQUEST['hostName'] = '';
				$_REQUEST['program'] = '';
				$_REQUEST['address'] = '';
				$_REQUEST['city'] = '';
				$_REQUEST['state'] = '';
				$_REQUEST['zip'] = '';
				$_REQUEST['date'] = '';
				$_REQUEST['endDate'] = '';
				$_REQUEST['event'] = '';
				$_REQUEST['time'] = '';
				
				header('Location: manageDates.php?confirm=edit');
			}
		}
		
		// getTourDates
		function getTourDates(){

			date_default_timezone_set('EST');
			
			$today = date("m/d/y");
			
			$result = mysql_query("
				SELECT *
				FROM tblToursRead
				WHERE date >= '$today' or endDate >= '$today'
				ORDER BY date
			");	
			
			return $result;	
			
			mysql_close();		
		}
		
		//getVideos
		function getVideos()
		{
			$result = mysql_query("
				SELECT *
				FROM tblVideosRead
			");
			
			return $result;
		}
		
		//addVideo
		function addVideo(){
		
		}
		
		//editVideo
		function editVideo(){
		
		}
		
		//removeVideo
		function removeVideo(){
		
		}
		
		
		// getFirstVideo
		function getFirstVideo()
		{
			$result = mysql_query("
				SELECT videoLink
				FROM tblVideosRead LIMIT 1
			");
			
			return $result;
		}
		
		// login - Receives username and password
		function login($username, $password)
		{
			$clientUsername = $username;
			$clientPassword = $password;
			
			$result = mysql_query("
				SELECT *
				FROM tblUsersRead
				WHERE username = '$clientUsername' and password = '$clientPassword'
			");
			
			$row = mysql_fetch_array($result);
			$storedPassword = $row['Password'];
			
			if(mysql_num_rows($result) > 0 && ($clientPassword === $storedPassword))
			{
				$_SESSION['username'] = $clientUsername;
				$_SESSION['password'] = $clientPassword;
				$_SESSION['firstname'] = $row['firstname'];	
				
				header('Location: admin.php');	
			}
			else
			{
				$loginMessage = "Incorrect Username or Password.";	
				
				return $loginMessage;
			}
		}
	
		// logout - Receives url variables $logout
		function logout($logout)
		{
			if($logout == 'yes')
			{
				$_SESSION['username'] = '';
				$_SESSION['password'] = '';
				
				header('Location: login.php');	
			}
		}
		
		// isLoggedIn - Test if a user is logged in
		function isLoggedIn()
		{
			if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
			{
				header('Location: login.php');
			}	
		}
	
		//processContact - receives form variables, sends e-mail to info@ziondance.com, and stores inquiries in tblContactInquiriesRead
		function processContact()
		{
			$booking = $_REQUEST['booking'];
			$comments = $_REQUEST['comments'];
			$confirmEmail = $_REQUEST['confirmEmail'];
			$contactMethod = $_REQUEST['contactMethod'];
			$firstname = $_REQUEST['firstname'];
			$email = $_REQUEST['email'];
			$lastname = $_REQUEST['lastname'];
			$phone = $_REQUEST['phone'];
			$proposedDate = $_REQUEST['proposedDate'];
			
			if($_REQUEST['honeyPot'] == '')
			{
				if($firstname != '')
				{
					if($lastname != '')
					{
						if($email != '' && ($email == $confirmEmail))
						{
							if($phone != '')
							{
								mysql_query("
									INSERT INTO tblContactInquiriesRead(booking, comments, contactMethod, firstname, email, lastname, phone, proposedDate)
									VALUES('$booking', '$comments', '$contactMethod', '$firstname', '$email', '$lastname', '$phone', '$proposedDate')
								");
					
								$rows = mysql_affected_rows();
								
								if($rows > 0)
								{
												
									if($contactMethod == '')
									{
										$contactMethod = 'n/a';	
									}
									
									$to = "info@ziondance.com";
									$subject = "Zion Inquiry";
									$message = "Booking: ".$booking.
									"\r\nProposed Date: ".$proposedDate.
									"\r\nPhone: ".$phone.
									"\r\nPrefered Contact Method: ".$contactMethod.
									"\r\nComments: ".$comments;
									
									$header = "From: ".$firstname.' '.$lastname.' '.'<'.$email.'>';
									
									mail($to,$subject,$message,$header);
															
									$processMessage = "Success";
									return $processMessage;
								}
							}
							else
							{
								$processMessage = "Please enter a valid phone number.";
								return $processMessage;
							}
						}
						else
						{
							$processMessage = "Please enter a valid email.";
							return $processMessage;	
						}
					}
					else
					{
						$processMessage = "Please enter a lastname.";
						return $processMessage;
					}
				}
				else
				{
					$processMessage = "Please enter a firstname.";
					return $processMessage;
				}
			}
		}
	}

?>