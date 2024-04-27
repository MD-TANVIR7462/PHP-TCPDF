<?php
require_once("config.php");
if (!isset($_SESSION)) session_start();
$message="";
?>


<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <style type="text/css">
   #regiration_form fieldset:not(:first-of-type) {
       display: none;
   }

    body, div, form, input, select, p { 
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

       input:hover, select:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #095484;
      color: #095484;
      }

 </style>
 <title>  FORM I-90 INTAKE </title>
</head>
<body>
<div class="container" style="padding: 20px;">
    <!-- <h1></h1>
	<div class="progress">
		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
	</div> -->
	
    <form id="regiration_form" class="form-horizontal" action="#"  method="post">
		<input type="hidden" name="id" value="" />
        <fieldset>
            <h2>I-90 INTAKE PART : 1</h2>
			<div class="text-center">
	  				<h4>I-90 Intake & Checklist: </h4>
			</div>
                <br>

                <div class="form-group">
                    
					<label class="control-label col-md-3" for="office_fees"> Office Fees/ Costo de Oficina: $440 empez: </label>	
                    <div class="col-md-2">
				        <input type="text" class="form-control" name="office_fees" id="office_fees" placeholder="$"  value="">
			        </div> 

                    <label class="control-label col-md-3" for="immigration_fees"> Immigration Fees/ Costo de Inmigracion: $450: </label>	
                    <div class="col-md-2">
				        <input type="text" class="form-control" name="immigration_fees" id="immigration_fees" placeholder="pagado en cheque o en money order) Documents / Documentos"  value="">
			        </div>

                </div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-2 col-md-offset-1">
							<h5>Green card </h5>
						</div>
						
						<div class="col-md-2">
							<input type="radio" name="greencard"  value="Yes"> Yes
							<br>
							<input type="radio" name="greencard"  value="No"> No 
					   </div>
				 </div>
             </div>
			 <div class="form-group">
				 <label class="control-label col-md-5 " for="greencard_details">If No, please write a sworn declaration as to what happened and have it dated and have client :</label>
                    <div class="col-md-5">
                        <textarea name="greencard_details" id="greencard_details" cols="59" rows="3"></textarea>
                    </div>
             </div>
			 <div class="form-group">

				 <label class="control-label col-md-5 " for="signature"> Sign it, as it is a requirement when we apply for a I-90:</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="signature" id="signature">
                    </div>

             </div>

			 <div class="form-group">
				 <label class="control-label col-md-5" for="police_report">Also please attach police report if
					client has one.) :</label>
                    <div class="col-md-5">
                        <input type="file" class="form-control" name="police_report" id="police_report">
                    </div>
             </div>

			 <div class="form-group">
				 <label class="control-label col-md-5" for="social_security"> Social Security #: (If client DOES NOT have social security # but knows it, write it down. ):</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="social_security" id="social_security">
                    </div>
             </div>

			 <div class="form-group">
				 <label class="control-label col-md-5" for="pasport"> Passport (This is optional):</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="passport" id="passport">
                    </div>
             </div>
			 <div class="form-group">
				 <label class="control-label col-md-5" for="picture"> PICTURES!!!:</label>
                    <div class="col-md-5">
                        <input type="file" class="form-control" name="picture" id="picture">
                </div>
             </div>
			 <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <h4>   &nbsp; &nbsp; Donde fue que el aplicante hizo el proceso con inmigración? :</h4>
                    </div>
                    
                    <div class="col-md-4">
                    <input type="radio" name="proceso_immigration"  value="aqui_nyc"> Aqui en NYC
                    <br>
                   	<input type="radio" name="proceso_immigration"  value="embajada">  en la embajada de su Pasi
                   </div>
                 </div>
            </div>
	  		<div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <h4>   &nbsp; &nbsp;Donde llego el cliente cuando entro al pais por primera vez? :</h4>
                    </div>
                    
                    <div class="col-md-4">
                    <input type="radio" name="client_intro"  value="jfk"> JFK
                    <br>
                   	<input type="radio" name="client_intro"  value="nyc"> NYC
					   <br>
                   	<input type="radio" name="client_intro"  value="ny"> NY
                   </div>
                 </div>
            </div>

			<div class="">
                <h4>Como se llaman los padres del aplicante:</h4>
            </div>

			<div class="form-group">
                <div class="row">
                    <label class="control-label col-md-2" for="father_name"> Padre:</label>
                    <div class="col-md-3">
                    <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Nombre del Padre" value="">
                    </div>

                    <label class="control-label col-md-2" for="mother_name">Madre:</label>
                    <div class="col-md-3">
                    <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Nombre del madre" value="">
                    </div>
                 </div>
            </div>

			<div class="form-group">
                <div class="row">
                    <label class="control-label col-md-2" for="birth_city_state"> Donde nacieron ?:</label>
                    <div class="col-md-3">
                    <input type="text" class="form-control" name="birth_city_state" id="birth_city_state" placeholder="cuidad y pais" value="">
                    </div>
                 </div>
            </div>
			<div class="form-group">
                <div class="row">
				<label class="control-label col-md-5" for="greencard_place"> Direction donde aplicante quiere que llegue la greencard? :</label>
                    <div class="col-md-4 col-md-offset-1">
                    <input type="text" class="form-control" name="greencard_place" id="greencard_place" placeholder="" value="">
                    </div>
                 </div>
            </div>
			<div class="form-group">
                <div class="row">
				<label class="control-label col-md-5" for="emergency_phone"> Otro numero de telefono, por emergencia? : </label>
                    <div class="col-md-4 col-md-offset-1">
                    <input type="number" class="form-control" name="emergency_phone" id="emergency_phone" placeholder="" value="">
                    </div>
                 </div>
            </div>

			<div class="form-group">
                <div class="row">
					<label class="control-label col-md-2" for="name_of_persons"> Name of person: </label>
                    <div class="col-md-3 ">
                    <input type="text" class="form-control" name="name_of_persons" id="name_of_persons" placeholder="" value="">
                    </div>

					<label class="control-label col-md-3" for="person_change_name"> Han cambiado su nombre?: </label>
                    <div class="col-md-3 ">
						
					<input type="radio" name="person_change_name"  value="yes"> Yes
                    <br>
                   	<input type="radio" name="person_change_name"  value="no"> No
                    </div>

                 </div>
            </div>

			<div class="form-group">
                <div class="row">
				<label class="control-label col-md-5" for="client_tall"> Cuanto mide el cliente en estatura (en pies no metros)? : </label>
                    <div class="col-md-4 col-md-offset-1">
                    <input type="number" class="form-control" name="client_tall" id="client_tall" placeholder="  " value="">
                    </div>
                 </div>
            </div>

			<div class="form-group">
                <div class="row">
				<label class="control-label col-md-5" for="client_wait"> Cuanto pesa el cliente en libras (no kilos)? : </label>
                    <div class="col-md-4 col-md-offset-1">
                    <input type="number" class="form-control" name="client_wait" id="client_wait" placeholder=" Lbs." value="">
                    </div>
                 </div>
            </div>

			<div class="form-group">
                <div class="row">
					<label class="control-label col-md-3" for="client_deportation"> El cliente estuvo en deportacion?: </label>
                    <div class="col-md-2 ">
					<input type="radio" name="client_deportation"  value="yes"> Yes
                    <br>
                   	<input type="radio" name="client_deportation"  value="no"> No
                    </div>

					<label class="control-label col-md-2" for="photos"> FOTOS!!: </label>
                    <div class="col-md-3 ">
					<input type="file" name="photos" class="form-control" id="photos" value=""> 
                    </div>
                 </div>
            </div>

			<div class="form-group">
                <div class="row">
						<div class="col-md-5 col-md-offset-1">
	  						<h5> <input type="checkbox" name="client_agreement" id="client_agreement"> &nbsp; &nbsp; Yo he contestado todas las preguntas con la verdad.</h5>
                        </div>
						 <label class="control-label col-md-2" for="date"> Date: </label>
					   <div class="col-md-2">
	  				  <input type="date"  class="form-control" name="date" id="date">		
                     </div>
                 </div>

				 
            </div>


            <input style="float: right;" type="submit" name="submit" class="submit btn btn-lg btn-success" value="Save" id="submit_data" />
        </fieldset>
        
	</form>
  </div>
</body>
</html>




<!-- 
<script type="text/javascript">
$(document).ready(function(){
	var current = 1,current_step,next_step,steps;
	steps = $("fieldset").length;
	$(".next").click(function(){
		current_step = $(this).parent();
		next_step = $(this).parent().next();
		next_step.show();
		current_step.hide();
		setProgressBar(++current);
	});
	$(".previous").click(function(){
		current_step = $(this).parent();
		next_step = $(this).parent().prev();
		next_step.show();
		current_step.hide();
		setProgressBar(--current);
	});
	setProgressBar(current);
	// Change progress bar action
	function setProgressBar(curStep){
		var percent = parseFloat(100 / steps) * curStep;
		percent = percent.toFixed();
		$(".progress-bar")
			.css("width",percent+"%")
			.html(percent+"%");		
	}
});


</script> -->