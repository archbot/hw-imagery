<section class="subscribe text-center section-padding contact-wrap" id="contact"> 
  <div class="col-md-12">
    <h1 class="arrow2">Drop us a line</h1>
  </div>

	<!-- Contact Popup Form -->
	<div class="form-style" id="contact_form">
	  <div id="contact_results"></div>
	  <div id="contact_body" class="contact-body">
	    <label><span>Name <span class="required">*</span></span>
	      <input type="text" name="name" id="name" required="true" class="input-field"/>
	    </label>
	    <label><span>Email <span class="required">*</span></span>
	      <input type="email" name="email" required="true" class="input-field"/>
	    </label>
	    <label><span>Phone</span>
	      <input type="phone" name="phone" maxlength="15" required="false" class="tel-number-field long" />
	    </label>
	    <label for="field5"><span>Message <span class="required">*</span></span>
	      <textarea name="message" id="message" class="textarea-field" required="true"></textarea>
	    </label>
	    <label>
	      <input type="submit" id="submit_btn" class="submit_btn" value="Submit" />
	    </label>
	  </div>
	</div>

  <div class="row contact-details">
    <a href="https://www.facebook.com/hannahwphotography" target="_blank" class="no-style">
      <div class="col-md-4 card">
        <div class="light-box box-hover">
          <h2 class="contact-title"><i class="fa fa-facebook"></i><span>Facebook</span></h2>
          <p>Hannah W Photography</p>
        </div>
      </div>
    </a>
      
  <div class="col-md-4 card">
    <a href="#contact" class="no-style" onclick="$('#contact_form').fadeToggle()">
    <div class="light-box box-hover">
      <h2 class="contact-title"><i class="fa fa-paper-plane"></i><span>Email</span></h2>
      <p>Ask Us Anything</p>
    </div>
    </a>
  </div>
  
  <a href="https://www.google.com/maps/place/Tampa,+FL" target="_blank" class="no-style"> 
    <div class="col-md-4 card">
      <div class="light-box box-hover">
        <h2 class="contact-title"><i class="fa fa-map-marker"></i><span>Location</span></h2>
        <p>Tampa, FL</p>
      </div>
    </div>
  </a>
  <div class="text-center">
    <h1 id="feedback" class="feedback"><?php echo $feedback; ?></h1>
  </div>
</section>
<script>
	$(document).ready(function() 
	{
    $("#submit_btn").click(function() 
    { 
	    var proceed = true;
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields		
			$("#contact_form input[required=true], #contact_form textarea[required=true]").each(function()
			{
				$(this).css('border-color',''); 
				if(!$.trim($(this).val())){ //if this field is empty 
					$(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
				}
				//check invalid email
				var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
				if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val())))
				{
					$(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag				
				}	
			});
      if(proceed) //everything looks good! proceed...
      {
			//get input field values data to be sent to server
        post_data = 
        {
				'user_name'		: $('input[name=name]').val(), 
				'user_email'	: $('input[name=email]').val(), 
				'phone_number'	: $('input[name=phone]').val(), 
				'subject'		: $('select[name=subject]').val(), 
				'msg'			: $('textarea[name=message]').val()
				};
        //Ajax post data to server
        $.post('contact_me.php', post_data, function(response)
        {  
					if(response.type == 'error') //load json data from server and output message     
					{ 
						output = '<div class="error">'+response.text+'</div>';
					} 
					else 
					{
					  output = '<div class="success">'+response.text+'</div>';
						//reset values in all input fields
						$("#contact_form  input[required=true], #contact_form textarea[required=true]").val(''); 
						$("#contact_form #contact_body").slideUp(); //hide form after success
					}
					$("#contact_form #contact_results").hide().html(output).slideDown();
        }, 'json');
      }
    });
	  //reset previously set border colors and hide all message on .keyup()
	  $("#contact_form  input[required=true], #contact_form textarea[required=true]").keyup(function() 
	  { 
	    $(this).css('border-color',''); 
	    $("#result").slideUp();
	  });
	});
</script>