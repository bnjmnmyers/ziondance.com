<?php
	include 'includes/_dbConnect.php';
	$memberBios = getMemberBios();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Welcome to the About Page of Zion Dance Company. Learn about this mission, vision, core values and dance members of our christian dance company." />
	<meta name="keywords" content="dance company, zion dance company, zion dance, jefferson city tn, jefferson city, morristown tn, morristown, knoxville tn, knoxville, tennessee, dance company in jefferson city tn, dance company in knoxville tn, professional dance company, dance, company, dance troop, dance group, christian dance company, christian dance, christian, myers, moss, loveday, jones, mason, recker" />
	<title>Zion Dance Company | Learn all about Zion Dance Company - About</title>
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
				<h1 class="pageTitle">About</h1>
			</div>
			<div id="info">
				<ul id="subNav">
					<li><span>Select a category:</span></li>
					<li id="whoWeAre" class="subNavLink active">Who We Are</li>
					<li id="theVizion" class="subNavLink">The Vizion</li>
					<li id="theMission" class="subNavLink">The Mission</li>
					<li id="coreValues" class="subNavLink">Core Values</li>
					<li id="whyDance" class="subNavLink">Why Dance</li>
					<li id="theCompany" class="subNavLink">The Company</li>
				</ul>
				<div id="whoWeAreCont" class="infoCont">
					<h2>Who We Are</h2>
					<p>
Zion Dance Company has chosen to use their dance to serve the Lord and minister to others. This christian dance company was founded in the Fall of 2012. Their first touring programs include <a href="repertoire.php?program=encounter">"Encounter"</a> and <a href="repertoire.php?program=theStory">"The Story"</a>. They look forward to adding to their repertoire of productions in order to reach the widest audience and expand His kingdom. Current company members are comprised of studio directors and instructors. ZDC is the blend of six dancers who are a varied combination of ages, backgrounds, and experiences. They find that their hearts are unified in vision and purpose in their expression of worship to the Lord.<br/><br/>

It is in our heart to grow as the Lord would allow us. Our goal is to spread the word and build a strong, wide foundation for ZDC so that we can expand when the time comes. In the future, we look forward to holding auditions and interviews and creating an avenue for other dancers to use their gifts.<br/><br/>

Zion Dance Company is an expansion of <a href="http://www.fuzionstudio.net" target="_blank">Fuzion Studio</a> located in Jefferson City, TN. Fuzion Studio opened its doors in January 2012 in their newly remodeled facility and are blessed to serve the community. They offer a wide range of dance and fitness classes for all ages.<br/><br/>
					</p>
				</div>
				<div id="theVizionCont" class="infoCont">
					<h2>The Vizion</h2>
					<p>
						  We will become a people who are wholly devoted to God and learn to love Him with all our heart, soul, mind and strength.  We will grow and mature in the talents and gifts that God has placed within each of us so that we may glorify His name. Zion Dance Company will be a place for skilled dancers, both male and female, to achieve excellence in technique in an atmosphere that values the presence of God.  We will create productions that draw the audience to the Lord.   This christian dance company will perform locally, nationally and internationally to expand the body of Christ as we encounter the Living God and His transforming power through the ministry of dance.<br/><br/>
					</p>
				</div>
				<div id="theMissionCont" class="infoCont">
					<h2>The Mission</h2>
					<p>
						As a christian dance company our heart is to increase, expand, and enlarge, the Kingdom of God through dance.<br/><br/>
						
						Zion: A Place or religious community regarded as sacredly devoted to God.<br/><br/>
					"For the Lord has chosen Zion; He has desired it for His habitation, saying, ‘This is my resting place forever and ever; here I will sit enthroned, for I have desired it."
						 - Psalm 132:13-14<br/><br/>
						 "They will ask for the way to Zion, turning their faces in its direction; they will come that they may join themselves to the Lord in an everlasting covenant that will not be forgotten." - Jeremiah 50:5<br/><br/>
					</p>
				</div>
				<div id="coreValuesCont" class="infoCont">
					<h2>Core Values</h2>
					<ul>
						<li>Presence over perfection</li>
						<li>Substance over show</li>
						<li>Integrity over advancement</li>
						<li>God's Glory before Zion's fame</li>
						<li>Others before self</li>
						<li>Unity in relationships</li>
						<li>Hard work and commitment</li>
						<li>Character over talent</li>
					</ul>
				</div>
				<div id="whyDanceCont" class="infoCont">
					<h2>Why Dance</h2>
					<p>
					We believe that worship is a foundational part of our relationship with God.  At Zion Dance Company, we dance because the word teaches “Let them praise His name with dance.” Psalm 149:3<br/><br/>

We were created in the image of God. Zephaniah 3:17 says that “God will quiet you with His love and rejoice over you with singing.” In Hebrew, the word “rejoice” literally means “to spin under passionate emotion.” At Zion Dance Company, we want to be like our Father: He dances, so we dance.<br/><br/>

Scripture also tells us in Romans 12:1 to “Present your bodies as a living sacrifices, holy and pleasing to God - this is your spiritual act of worship.” At Zion Dance Company, we offer our sacrifice of worship to the Lord through dance.<br/><br/>

Dance can also be a form of communication to those around us regardless of the language we speak. Dance creates visual images that bring music and lyrics to life in a beautiful and emotional way to touch us in deep places that mere words alone could never reach. We have seen the impact that this art form can have on its audience as people are drawn into the Lord’s presence and are forever changed.
					</p>
				</div>			
				<div id="theCompanyCont" class="infoCont">
					<h2>The Company</h2>
					<?php
						while($row = mysql_fetch_array($memberBios))
						{
							$bioPic = $row['bioPic'];
							$bioText = $row['bioText'];
							$firstname = $row['firstname'];
							$maidenname = $row['maidenname'];
							$memberRole = $row['memberRole'];
							$lastname = $row['lastname'];
							
							echo
							"<div class='memberBioCont'>
								<div class='nameTitleCont'>
									<h3 class='memberName'>".$firstname.' '.$maidenname.' '.$lastname."</h3>
									<p class='memberRole'> - ".$memberRole."</p>
								</div>
								<div class='picBioCont'>
									<img class='memberPic' src='".$bioPic."' alt='Biography Picture of Zion Dance Company Member ".$firstname." ".$lastname."' title='Biography Picture of Zion Dance Company Member ".$firstname." ".$lastname."' height='255' width='170'/>
									<p class='memberBio'>".$bioText."</p>
								</div>
							</div>";
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