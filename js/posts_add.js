// Set up the options for ajax
var options = { 
    type: 'POST',
    url: '/posts/p_add/',
    beforeSubmit: function() {
        $('#results').html("Adding...");
    },
    success: function(response) {   
        $('#results').html(response);
    } 
}; 

$('#image1').blur(function(){

	var image1Input = $(this).val();
	$('#resultImage1').empty().append('<img src="'+ image1Input+'">');
});
$('#image2').blur(function(){

	var image2Input = $(this).val();
	$('#resultImage2').empty().append('<img src="'+ image2Input+'">');
});
$('#image3').blur(function(){

	var image3Input = $(this).val();
	$('#resultImage3').empty().append('<img src="'+ image3Input+'">');
});
$('#image4').blur(function(){

	var image4Input = $(this).val();
	$('#resultImage4').empty().append('<img src="'+ image4Input+'">');
});

// Using the above options, ajax'ify the form
$('form').ajaxForm(options);