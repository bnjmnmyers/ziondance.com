// JavaScript Document
$(document).ready(function(){
	var inTesting = true;
	var pathname = window.location.pathname;
	if(inTesting){
		var testDir = '/test';	
	}
	else{
		var testDir = '';	
	}
	switch(pathname){
		case testDir+'/about.php':
			$('#navAbout').addClass('current');
			break;	
		case testDir+'/contact.php':
			$('#navContact').addClass('current');
			break;
		case testDir+'/dates.php':
			$('#navDates').addClass('current');
			break;
		case testDir+'/repertoire.php':
			$('#navRepertoire').addClass('current');
			break;
		default:
			$('#navHome').addClass('current');	
	}
	
	$('.current').children('a').css({'color':'#FFF'});
	
	$('#nav ul li').bind('mouseover',function(){
		$(this).children('a').css({
			'color':'#FFF'
		});	
	}).bind('mouseout',function(){
		if(!$(this).hasClass('current')){
			$(this).children('a').css({
				'color':'#555'
			});
		}
	});
})