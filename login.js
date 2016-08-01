//basic form ajax
	$("#login").validationEngine({promptPosition: 'inline'});
	$("#login").submit(function(event) {
      event.preventDefault(); // stop form from submitting normally
      if ($("#login").validationEngine('validate')) 
      {
      	var login_form = $("#login").serialize();

			$.ajax({
				type: "POST",
				dataType:'text',
				cashe:false,
				url: base_url+'admin/ajax_login',
				data: login_form,
				success: function(data)
				{
					var json = $.parseJSON(data);
					if(json.status == 'true'){
						$('.login_from_response_error').css('display','none');
					 $('.login_from_response').css('display','block');
					 $('.login_from_response_inner').text(json.message);
					 window.location.href = 'dashboard';
					}else{
					$('.login_from_response').css('display','none');
					$('.login_from_response_error').css('display','block');
                    $('.login_from_response_error_inner').text(json.message);
					}
				},
				error: function(error)
                    {
					$('.login_from_response').css('display','none');
					$('.login_from_response_error').css('display','block');
                    $('.login_from_response_error_inner').text("Bad Request");
                  
                    }
				});

			    		


    

      }
  });
