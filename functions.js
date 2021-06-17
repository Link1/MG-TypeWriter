	jQuery('document').ready(function($){
		console.log('TypeWriter');
		$(document).on('input change', '.slider', function() {
			var sliderName = $(this).attr('id');
			var sliderValue = $(this).val();
			$('[data-slider~="'+sliderName+'"]').val(sliderValue);
		});	

		$(document).on('input change', '.sliderValue', function() {
			var sliderName = $(this).data('slider');
			var sliderValue = $(this).val();
			$('#'+sliderName).val(sliderValue);
		});	

		$("#mgtw_save").on('click', function(){
			event.preventDefault();
			var options = {};
			options['strings'] = jQuery('#mgtw_phrases').val().split('\n');
            options['typespeed'] = $('#typeSpeed').val();
            options['backspaceSpeed'] = $('#backspaceSpeed').val();
            options['backspaceDelay'] = $('#backspaceDelay').val();
            options['repeatDelay'] = $('#repeatDelay').val();
            options['startDelay']= $('#startDelay').val();

            options['autoPlay'] = jQuery('#autoPlay').is(":checked");
            options['loop'] = jQuery('#loop').is(":checked");
            options['cursor'] = jQuery('#cursor').is(":checked");
						
			console.log(options);
			
			jQuery.ajax({
				type: 'POST',
				dataType: 'json',
				url: ajaxurl, 
				data: { 
					'action' : 'save_data',
					'mgtw_data': options
			},
			success: function(data){
				if (data.res == true){
					jQuery(".success").fadeIn(200).delay(1000).fadeOut(1500);
					console.log("True" + data);    // success message
				}else{
					console.log("False" + data);    // fail
				}
			},
				error: function(data){
					console.log("Error"+data.message);

				}
			});
			
		});
		
	});