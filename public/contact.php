<?php 
error_reporting(E_ALL ^ E_NOTICE); // hide all basic notices from PHP

//If the form is submitted
if(isset($_POST['submitted'])) {
	

	
	// need valid referral code
	if(trim($_POST['referral_code']) === '')  {
		$referralError = 'Forgot to enter in your referral code.';
		$hasError = true;
	} else if (!preg_match("/^([a-zA-Z0-9]{6,6})$/i", trim($_POST['referral_code']))) {
		$referralError = 'You entered an invalid referral code.';
		$hasError = true;
	} else {
		$referral = trim($_POST['referral_code']);
	}
		
		
	
}
?>
<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="en" lang="en"> 
<head> 
<title>HTML5/CSS Ajax Contact Form with jQuery</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href="styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- @begin contact -->
	<div id="contact" class="section">
		<div class="container content">
		
	        <?php if(isset($referralFound) && $referralFound == true) { ?>
                <p class="info">Your referral details was found.</p>
            <?php } else { ?>
            

				
				<div id="contact-form">
					<?php if(isset($hasError) || isset($captchaError) ) { ?>
                        <p class="alert">Error submitting the form</p>
                    <?php } ?>
				
					<form id="contact-us" action="contact.php" method="post">

                        
						<div class="formblock">
							<label class="screen-reader-text">Referral Code</label>
							<input type="text" name="referral_code" id="referral_code" value="<?php if(isset($_POST['referral_code']))  echo $_POST['referral_code'];?>" class="txt requiredField email" placeholder="Referrral Code:" />
							<?php if($referralError != '') { ?>
								<br /><span class="error"><?php echo $referralError;?></span>
							<?php } ?>
						</div>
                        
                        
							<button name="submit" type="submit" id="btSubmit" class="subbutton">Find referral details</button>
							<input type="hidden" name="submitted" id="submitted" value="true" />
					</form>			
				</div>
				
			<?php } ?>
		</div>
    </div><!-- End #contact -->
	
<script type="text/javascript">
	<!--//--><![CDATA[//><!--
	$(document).ready(function() {
		$('#btSubmit').attr('disabled', 'disabled');
		//alert('abc'+$('#referral_code').text());
       $('#referral_code').on('input change', function () {
                    var referralCode = $('#referral_code').val();
                    var referralReg = /^([a-zA-Z0-9]{6,6})?$/;
                    
                    if ($.trim(referralCode) == '')
                    {
                        $('#btSubmit').prop('disabled', true);
                    }
                    else if (referralReg.test($.trim(referralCode))){
                        $('#btSubmit').prop('disabled', false);
                    }
                    else {
                    $('#btSubmit').prop('disabled', true);
                    }
        });
        
		$('form#contact-us').submit(function() {
			$('form#contact-us .error').remove();
            
			var hasError = false;
			$('.requiredField').each(function() {
				if($.trim($(this).val()) == '') {
					var labelText = $(this).prev('label').text();
					$(this).parent().append('<span class="error">Your forgot to enter your '+labelText+'.</span>');
					$(this).addClass('inputError');
					hasError = true;
				} else if($(this).hasClass('referral_code')) {
					var referralReg = /^([a-zA-Z0-9]{6,6})?$/;
					if(!referralReg.test($.trim($(this).val()))) {
						var labelText = $(this).prev('label').text();
						$(this).parent().append('<span class="error">Sorry! You\'ve entered an invalid '+labelText+'.</span>');
						$(this).addClass('inputError');
						hasError = true;
					}
				}
			});
			if(!hasError) {
				var formInput = $(this).serialize();
				$.post('/api/v1/owner',formInput, function(data,status){
					$('form#contact-us').slideDown("fast", function() {
                        if (data==''){
                        
                        $(this).after('<p class="tick"> Your referral details has been not found.</p>');
                        }
                        else {
                        
                        $(this).after('<p class="tick"> Your referral '+data[0].name+' details has been found.</p>');
                        }
						
                                                 
					});
				});
			}
			return false;	
		});
	});
	//-->!]]>
</script>

</body>
</html>
