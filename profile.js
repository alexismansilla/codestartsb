//profle form ajax
	$("#profile").validationEngine({promptPosition: 'inline'});
	$("#profile").submit(function(event) {
      event.preventDefault(); // stop form from submitting normally
      if ($("#profile").validationEngine('validate')) 
      {
      	var form = $("#profile").serialize();

			$.ajax({
				type: "POST",
				dataType:'text',
				cashe:false,
				url: base_url+'admin/ajax_profile',
				data: form,
				success: function(data)
				{
					var json = $.parseJSON(data);
					
					if(json.status == 'true'){
					$('.profile_from_response_error').css('display','none');
					 $('.profile_from_response').css('display','block');
					 $('.profile_from_response_inner').text(json.message);
					
					}else{
					$('.profile_from_response').css('display','none');
					$('.profile_from_response_error').css('display','block');
                    $('.profile_from_response_error_inner').text(json.message);
					}
				},
				error: function(error)
                    {
					$('.profile_from_response').css('display','none');
					$('.profile_from_response_error').css('display','block');
                    $('.profile_from_response_error_inner').text("Bad Request");
                  
                    }
				});

			    		


    

      }
  });


//profle form ajax
	$("#password").validationEngine({promptPosition: 'inline'});
	$("#password").submit(function(event) {
      event.preventDefault(); // stop form from submitting normally
      if ($("#password").validationEngine('validate')) 
      {
      	var form = $("#password").serialize();

			$.ajax({
				type: "POST",
				dataType:'text',
				cashe:false,
				url: base_url+'admin/ajax_password',
				data: form,
				success: function(data)
				{
					var json = $.parseJSON(data);
					
					if(json.status == 'true'){
					$('.password_from_response_error').css('display','none');
					 $('.password_from_response').css('display','block');
					 $('.password_from_response_inner').text(json.message);
					
					}else{
					$('.password_from_response').css('display','none');
					$('.password_from_response_error').css('display','block');
                    $('.password_from_response_error_inner').text(json.message);
					}
				},
				error: function(error)
                    {
					$('.password_from_response').css('display','none');
					$('.password_from_response_error').css('display','block');
                    $('.password_from_response_error_inner').text("Bad Request");
                  
                    }
				});

			    		


    

      }
  });
