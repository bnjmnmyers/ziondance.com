// JavaScript Document
/**
 * @authors myersb & kolbe
 * Created: 10-28-10
 * 
 * img tags must have a class of rollOver and the image itself must be named *_ovr.extension
 * 
 */
$("img.rollOver, input.rollOver").bind('mouseover', function(){
	imgSrc = $(this).attr('src');
	imgOvr = imgSrc.replace(/(\.\w{3,4})$/i, '_ovr$1');
	$(this).attr('src', imgOvr);
}).bind('mouseout', function(){
	$(this).attr('src', imgSrc);
});