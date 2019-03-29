// Модальное окно

// открыть по кнопке
$('.js-button-campaign').click(function() { 
	
	
	$('.js-overlay-campaign').fadeIn();
	$('.js-overlay-campaign').addClass('disabled');


	
	 var getvalue_name = $('.name_tree').val();
	 var getvalue_text = $('.text_tree').val();
	 var getvalue_email = $('.email_tree').val();
	 var getvalue_image = $('.image_tree').val();

	 var val = getvalue_image, split = val.split('\\');
	var getvalue_image = split[split.length-1];
	 //alert(getvalue);
	 $('.name_tree1').html(getvalue_name);
	 $('.text_tree1').html(getvalue_text);
	 $('.email_tree1').html(getvalue_email);
	 $('.image_tree1').html(getvalue_image);
	



});

// закрыть на крестик
$('.js-close-campaign').click(function() { 
	$('.js-overlay-campaign').fadeOut();
	
});

// закрыть по клику вне окна
$(document).mouseup(function (e) { 
	var popup = $('.js-popup-campaign');
	//если не является само окно или его дочерние свойтсва
	if (e.target!=popup[0]&&popup.has(e.target).length === 0){
		$('.js-overlay-campaign').fadeOut();
		
	}
});





 // var getvalue = $('.input').attr('guestname');

 // $('.tree')
 // .html('<p>All new content. <em>You bet!</em></p>');

 // $('.tree')
 // .html($('.input').attr('guestname'));

// $('.ro').click(function() {
//  var getvalue_name = $('.name_tree').val();
//  var getvalue_text = $('.text_tree').val();
//  var getvalue_email = $('.email_tree').val();
//  var getvalue_image = $('.image_tree').val();
//  //alert(getvalue);
//  $('.name_tree1').html(getvalue_name);
//  $('.text_tree1').html(getvalue_text);
//  $('.email_tree1').html(getvalue_email);
//  $('.image_tree1').html(getvalue_image);
// });

 



