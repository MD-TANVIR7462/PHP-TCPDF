
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <style type="text/css">
            #registration_form fieldset:not(:first-of-type) {
                display: none;
            }

            body,
            div,
            form,
            input,
            select,
            p {
                padding: 0;
                margin: 0;
                outline: none;
                font-family: Roboto, Arial, sans-serif;
                font-size: 14px;
                color: #666;
                line-height: 22px;
            }

            form {
                width: 100%;
                padding: 20px;
                border-radius: 6px;
                background: #fff;
                box-shadow: 0 0 20px 0 #095484;
            }

            input:hover,
            select:hover {
                border: 1px solid transparent;
                box-shadow: 0 0 6px 0 #095484;
                color: #095484;
            }
            input{
                margin-top:10px;
            }
            .bg-info > h4 {
            padding: 3px;
            }
            .form-horizontal .control-label {
            text-align: left;
            }
        </style>
        <title>INTAKE FOR FORM I-912</title>
    </head>
    <body>
        <div class="container" style="padding: 20px;">
            <h1></h1>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div CLASS="text-center">
              <h3>Intake Form I-912, Request for Free Waiver</h3>
            </div>
            <form id="registration_form" class="form-horizontal" action="#" method="post">
                <input type="hidden" name="id" value="<?php echo $singleData->id?>" />
		         <input type="hidden" name="client_id" value="<?php echo $clientId?>" />
                <fieldset>
                    <div class="bg-info">
						<h4><b>Part 2. Information About You (Requestor)</b> </h4>
					</div>
                    <div class="form-group"> 
                        <div class="col-md-12">
                             <label class="control-label col-md-10"> 1. Full Name</label> 
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                             <label class="control-label col-md-10"> Family Name (Last Name)</label> 
                             <input type="text" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name')?>" />
                        </div>
                        <div class="col-md-5">
                             <label class="control-label col-md-10"> Given Name (First Name)</label> 
                             <input type="text" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name')?>" />
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-md-12">
                             <label class="control-label col-md-10">2. Other Names Used (if any)</label> 
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                             <label class="control-label col-md-10"> Family Name (Last Name)</label> 
                             <input type="text" class="form-control" name="information_about_you_other_family_last_name" value="<?php echo showData('information_about_you_other_family_last_name')?>" />
                        </div>
                        <div class="col-md-5">
                             <label class="control-label col-md-10"> Given Name (First Name)</label> 
                             <input type="text" class="form-control" name="information_about_you_other_given_first_name" value="<?php echo showData('information_about_you_other_given_first_name')?>" />
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-md-5">
                             <label class="control-label col-md-10">3. Alien Registration Number (A-Number) (if any) </label> 
                             <input type="text" class="form-control col-md-offset-1" name="other_information_about_you_alien_registration_number" value="<?php echo showData('other_information_about_you_alien_registration_number')?>" />
                        </div>
                        <div class="col-md-5">
                             <label class="control-label col-md-10 col-md-offset-1">4. USCIS Online Account Number (if any)</label> 
                             <input type="text" class="form-control col-md-offset-2" name="other_information_about_you_uscis_online_account_number" value="<?php echo showData('other_information_about_you_uscis_online_account_number')?>" />
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-md-5">
                             <label class="control-label col-md-10">5. Date of Birth (mm/dd/yyyy) </label> 
                             <input type="date" class="form-control col-md-offset-1" name="other_information_about_you_date_of_birth" value="<?php echo showData('other_information_about_you_date_of_birth')?>" />
                        </div>
                        <div class="col-md-5">
                             <label class="control-label col-md-10 col-md-offset-1">6. U.S. Social Security Number (if any)</label> 
                             <input type="text" class="form-control col-md-offset-2" name="other_information_about_you_social_security_number" value="<?php echo showData('other_information_about_you_social_security_number')?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-10">7. Marital Status </label>  
                        <div class="col-md-10 col-md-offset-1">
                             <label class="control-label">
                                <input type="radio" name="other_information_about_you_marital_status" value="single" <?php echo (showData('other_information_about_you_marital_status') == 'single') ? 'checked' : ''; ?>> Single,Never Married
                            </label>
                            &nbsp;
                            <label class="control-label">
                                <input type="radio" name="other_information_about_you_marital_status" value="married" <?php echo (showData('other_information_about_you_marital_status') == 'married') ? 'checked' : ''; ?>> Married
                            </label>
                                &nbsp;
                            <label class="control-label">
                                <input type="radio" name="other_information_about_you_marital_status" value="divorced" <?php echo (showData('other_information_about_you_marital_status') == 'divorced') ? 'checked' : ''; ?>> Divorced
                            </label>
                                &nbsp;
                            <label class="control-label">
                                <input type="radio" name="other_information_about_you_marital_status" value="widowed" <?php echo (showData('other_information_about_you_marital_status') == 'widowed') ? 'checked' : ''; ?>> Widowed
                            </label>
                            <label class="control-label">
                                <input type="radio" name="other_information_about_you_marital_status" value="annulled" <?php echo (showData('other_information_about_you_marital_status') == 'annulled') ? 'checked' : ''; ?>> Married Annulled
                            </label>
                            <label class="control-label">
                                <input type="radio" name="other_information_about_you_marital_status" value="separated" <?php echo (showData('other_information_about_you_marital_status') == 'separated') ? 'checked' : ''; ?>> Separated
                            </label>
                            <label class="control-label">
                                <input type="radio" name="other_information_about_you_marital_status" value="other" <?php echo (showData('other_information_about_you_marital_status') == 'other') ? 'checked' : ''; ?>> Other
                            </label>
                        </div>
                    </div>
                    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
                </fieldset><!-- field set 1 end  -->
            </form>
        </div>
    </body>
</html>

<script type="text/javascript">
    $(document).ready(function () {
        var current = 1,
            current_step,
            next_step,
            steps;
        steps = $("fieldset").length;
        $(".next").click(function () {
            current_step = $(this).parent();
            next_step = $(this).parent().next();
            next_step.show();
            current_step.hide();
            setProgressBar(++current);
        });
        $(".previous").click(function () {
            current_step = $(this).parent();
            next_step = $(this).parent().prev();
            next_step.show();
            current_step.hide();
            setProgressBar(--current);
        });
        setProgressBar(current);
        // Change progress bar action
        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
                .html(percent + "%");
        }
    });

    $(document).on('submit', '#registration_form', function(event){
	 event.preventDefault();
	$.ajax({
		url:"fetch.php?formNo=10&<?php echo $getId?>",
		method:'POST',
		data:new FormData(this),
		contentType:false,
		processData:false,
		success:function(data)
		{	
			alert(data);
		}
	}); 
	
});
</script>



