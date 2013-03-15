// JavaScript Document
$(document).ready(function(){
	$('.infoCont').hide();
	$('.infoCont:first').show();
	$('#subNav li:eq(1)').css({'text-decoration':'none'});
	if($('#subNav li').hasClass('active')){
		currentProgram = $('li.active').attr('id');
		$('.infoCont').hide();
		$('.subNavLink').css({'text-decoration':'underline'})
		$('.active').css({'text-decoration':'none'})
		$("#"+currentProgram+"Cont").show();
	}
	$('.subNavLink').bind('click',function(){
		$('.infoCont').hide();
		$("#"+$(this).attr('id')+"Cont").show();
		$('.subNavLink').css({'text-decoration':'underline'}).removeClass('active');
		$(this).css({'text-decoration':'none'}).addClass('active');	
	}).bind('mouseover',function(){
		$(this).css({'text-decoration':'none'});
	}).bind('mouseout',function(){
		if($(this).hasClass('active')){
			
		}
		else{
			$(this).css({'text-decoration':'underline'});
		}
	})
})