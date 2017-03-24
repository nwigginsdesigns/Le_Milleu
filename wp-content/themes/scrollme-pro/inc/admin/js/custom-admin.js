/**
* Admin Scripts
*/

jQuery(document).ready(function ($) {
	/** Ad Gallery Image Option **/
	$('.scme_add_img').on('click', function (e) {
		e.preventDefault();

		var index = $(this).prev('ol.scme_add_galimg').find('li:last').attr('index'); //;// li:last-child').html(); //.attr('index'); // li:last-child').attr('index');

		index = parseInt(index)+1;
		
		var htm = '';
			htm += '<li index="'+index+'"><input type="text" name="galimg['+index+'][title]" placeholder="Image Title" value="">';
			htm += '<input size="60" type="text" name="galimg['+index+'][image]" placeholder="http://path/to/image.png" value="">';
			htm += '<span class="sme_galimg_ctrl">';
			htm += '<a class="sme_add_galimg" href="#"><i class="fa fa-plus"></i></a>';
			htm += '<a class="sme_rem_galimg" href="#"><i class="fa fa-minus"></i></a>';
			htm += '<a class="sme_prev_galimg" href="#"><i class="fa fa-eye"></i></a>';
			htm += '</span>';
	        htm += '</li>';

        $(this).prev('ol.scme_add_galimg').append(htm);
	});

	/** Remove Gallery Image Option **/
	$('.sme_galimg_ctrl .sme_rem_galimg').on('click', function (e) {
		e.preventDefault();

		$(this).parents('li').remove();
	});

	/** Upload Gallery Image **/
	$(document).on('click' , '.sme_galimg_ctrl .sme_add_galimg', function(e) {
    	e.preventDefault();
        var $this = $(this);
    	var image = wp.media({ 
    		title: 'Upload Image',
    		// mutiple: true if you want to upload multiple files at once
    		multiple: false
    	}).open()
    	.on('select', function(e){
    		// This will return the selected image from the Media Uploader, the result is an object
    		var uploaded_image = image.state().get('selection').first();
    		// We convert uploaded_image to a JSON object to make accessing it easier
    		// Output to the console uploaded_image
    		var image_url = uploaded_image.toJSON().url;
    		// Let's assign the url value to the input field
    		$this.parent('.sme_galimg_ctrl').prev('input').val(image_url);
    	});
    });

	$('.sme_prev_galimg').mouseover(function (){
		$(this).next('.scme_prev_gal').fadeIn();
	});

	$('.sme_prev_galimg').mouseout(function (){
		$(this).next('.scme_prev_gal').fadeOut();
	});
    
    $(".remove-file, .remove-image").click(function (e) {
        e.preventDefault();
        
        $(this).parents('.widget-upload').find('.upload').val('');
        $(this).parents('.widget-upload').find('.screenshot').html('');
    });

	$("#demo_import").click(function (){		
		$import_true = confirm('Are you sure to import dummy content ? It will overwrite the existing data.');
		if($import_true == false) return;
		var imp = $(this).next('div');
		imp.addClass('demo-loading');

		$(".import-message").html("The Demo Contents are Loading. It might take a while. Please keep patience.");
		$("#demo_import").fadeOut();

		$.ajax({
			url: ajaxurl,
			data: ({
			'action': 'scrollme_demo_import',            
			}),
			success: function(response){
				imp.removeClass('demo-loading');
				alert("Demo Contents Successfully Imported");
				location.reload();
			}
		});

	});
});