<?php
/* error_reporting (E_ALL ^ E_NOTICE);
require_once("config.php"); */
	
/* if(isset($singleDataNote->create_date) AND $singleDataNote->create_date!="" AND $singleDataNote->create_date!="00/00/00"){
    $createDate = $singleDataNote->create_date;
} else {
    $createDate = date("Y-m-d");
} */

if(isset($singleDataNote->father_name)) $father_name = $singleDataNote->father_name;
if(isset($singleDataNote->office_fees)) $office_fees = $singleDataNote->office_fees;
if(isset($singleDataNote->immigration_fees)) $immigration_fees = $singleDataNote->immigration_fees;
if(isset($singleDataNote->greencard)) $greencard = $singleDataNote->greencard;
if(isset($singleDataNote->greencard_details)) $greencard_details = $singleDataNote->greencard_details;
if(isset($singleDataNote->signature)) $signature = $singleDataNote->signature;
if(isset($singleDataNote->social_security)) $social_security = $singleDataNote->social_security;
if(isset($singleDataNote->passport)) $passport = $singleDataNote->passport;
if(isset($singleDataNote->proceso_immigration)) $proceso_immigration = $singleDataNote->proceso_immigration;
if(isset($singleDataNote->mother_name)) $mother_name = $singleDataNote->mother_name;
if(isset($singleDataNote->client_intro)) $client_intro = $singleDataNote->client_intro;
if(isset($singleDataNote->birth_city_state)) $birth_city_state = $singleDataNote->birth_city_state;
if(isset($singleDataNote->greencard_place)) $greencard_place = $singleDataNote->greencard_place;
if(isset($singleDataNote->emergency_phone)) $emergency_phone = $singleDataNote->emergency_phone;
if(isset($singleDataNote->name_of_persons)) $name_of_persons = $singleDataNote->name_of_persons;
if(isset($singleDataNote->person_change_name)) $person_change_name = $singleDataNote->person_change_name;
if(isset($singleDataNote->client_tall)) $client_tall = $singleDataNote->client_tall;
if(isset($singleDataNote->client_wait)) $client_wait = $singleDataNote->client_wait;
if(isset($singleDataNote->client_deportation)) $client_deportation = $singleDataNote->client_deportation;
if(isset($singleDataNote->client_agreement)) $client_agreement = $singleDataNote->client_agreement;
if(isset($singleDataNote->police_report_file)) $police_report_file = $singleDataNote->police_report_file;
if(isset($singleDataNote->picture_file)) $picture_file = $singleDataNote->picture_file;
if(isset($singleDataNote->photo_file)) $photo_file = $singleDataNote->photo_file;


if($singleDataNote->create_date!="" && $singleDataNote->create_date!="0000-00-00"){
    $create_date = date("Y-m-d",strtotime($singleDataNote->create_date));
}




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
 <title>  FORM I-90 INTAKE PART 1 </title>
</head>
<body>
<div class="container" style="padding: 20px;">
    <!-- <h1></h1>
	<div class="progress">
		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
	</div> -->
	
    <form id="registration_form" class="form-horizontal" action="#"  method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $singleData->id?>" />
		<input type="hidden" name="client_id" value="<?php echo $clientId?>" />
        <fieldset>
            <h2>I-90 INTAKE PART : 1</h2>
			<div class="text-center">
	  				<h4>I-90 Intake & Checklist: </h4>
			</div>
                <br>
                <div class="form-group">
					<label class="control-label col-md-5" for="office_fees"> Office Fees/ Costo de Oficina: $440 empez con $: </label>	
					<div class="col-md-6">
						<input type="text" class="form-control" name="office_fees" id="office_fees" placeholder=""  value="<?php echo $office_fees?>">
					</div>
                </div>
                <div class="form-group">
					<label class="control-label col-md-5" for="immigration_fees"> Immigration Fees/ Costo de Inmigracion: $450: </label>	
					<div class="col-md-6">
						<input type="text" class="form-control" name="immigration_fees" id="immigration_fees" placeholder="pagado en cheque o en money order) Documents / Documentos"  value="<?php echo $immigration_fees?>">
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-md-5" for="immigration_fees">Green card :</label>	
					<div class="col-md-6">
                    
						<label class="radio-inline">
							<input type="radio" name="greencard"  value="Yes" <?php echo ($greencard=="Yes") ? "checked" : " "?> > Yes
						</label>
						<label class="radio-inline">
							<input type="radio" name="greencard"  value="No" <?php echo ($greencard=="No") ? "checked" : " "?> > No 
						</label>
					</div>
				</div>
				
			 <div class="form-group">
				 <label class="control-label col-md-5 " for="greencard_details">If No, please write a sworn declaration as to what happened and have it dated and have client :</label>
                    <div class="col-md-5 col-sm-6">
                        <textarea name="greencard_details" id="greencard_details" cols="52" rows="3"><?php echo $greencard_details?> </textarea>
                    </div>
             </div>
			 <div class="form-group">

				 <label class="control-label col-md-5 " for="signature"> Sign it, as it is a requirement when we apply for a I-90:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="signature" id="signature" value="<?php echo $signature?>">
                    </div>

             </div>

			 <div class="form-group">
				 <label class="control-label col-md-5" for="police_report_file">Also please attach police report if
					client has one.) :</label>
                    <div class="col-md-5">
                        <input type="file" class="form-control" name="police_report_file" id="police_report_file" value="" > 
                    </div>
                    <?php if($police_report_file!=""){?>
                    <div class="col-md-2">
                        <a class="btn btn-success btn-sm" href="../uploads/intake/<?php echo $police_report_file?>" target="_blank">Preview</a>
                    </div>
                    <?php }?>
             </div>

			 <div class="form-group">
				<label class="control-label col-md-5" for="social_security"> Social Security #: (If client DOES NOT have social security # but knows it, write it down. ):</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="social_security" id="social_security" value="<?php echo $social_security?> ">
				</div>
             </div>

			 <div class="form-group">
				 <label class="control-label col-md-5" for="passport"> Passport (This is optional):</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="passport" id="passport" value="<?php echo $passport?> ">
                    </div>
             </div>
			 <div class="form-group">
				<label class="control-label col-md-5" for="picture_file"> PICTURES!!!:</label>
                <div class="col-md-5">
                        <input type="file" class="form-control" name="picture_file" id="picture_file"  value="">
                </div>
                <?php if($picture_file!=""){?>
                    <div class="col-md-2">
                        <a class="btn btn-success btn-sm" href="../uploads/intake/<?php echo $picture_file?>" target="_blank">Preview</a>
                    </div>
                 <?php }?>

             </div>
			 <div class="form-group">
               
                    <div class="col-md-6">
                        <h4>   &nbsp; &nbsp; Donde fue que el aplicante hizo el proceso con inmigración? :</h4>
                    </div>
                    
                    <div class="col-md-6">

                        <label class="radio-inline">
                            <input type="radio" name="proceso_immigration"  value="aqui_nyc" <?php echo ($proceso_immigration=="aqui_nyc") ? "checked" : " "?>> Aqui en NYC
                        </label>
                    
                        <label class="radio-inline">
                            <input type="radio" name="proceso_immigration"  value="embajada" <?php echo ($proceso_immigration=="embajada") ? "checked" : " "?>>  en la embajada de su Pasi
                        </label>
                   </div>
                 
            </div>
	  		<div class="form-group">
                
                    <div class="col-md-6">
                        <h4>   &nbsp; &nbsp;Donde llego el cliente cuando entro al pais por primera vez? :</h4>
                    </div>
                    
                    <div class="col-md-4">

                        <label class="radio-inline">
                             <input type="radio" name="client_intro" id="client_intro" value="jfk" <?php echo ($client_intro=="jfk") ? "checked" : " "?> > JFK
                        </label>
                   
                        <label class="radio-inline">
                            <input type="radio" name="client_intro" id="client_intro"  value="nyc" <?php echo ($client_intro=="nyc") ? "checked" : " "?> > NYC
                        </label>

                        <label class="radio-inline">
                             <input type="radio" name="client_intro"  id="client_intro"   value="ny" <?php echo ($client_intro=="ny") ? "checked" : " "?> > NY
                        </label>
                   </div>
                 
            </div>

			<div class="">
                <h4>Como se llaman los padres del aplicante:</h4>
            </div>

			<div class="form-group">
                    <label class="control-label col-md-5" for="father_name"> Padre:</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Nombre del Padre" value="<?php echo $father_name?>">
                    </div>
            </div>

            <div class="form-group">
                    <label class="control-label col-md-5" for="mother_name">Madre:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Nombre del madre" value="<?php echo $mother_name?>">
                    </div>
            </div>

			<div class="form-group">
                <label class="control-label col-md-5" for="birth_city_state"> Donde nacieron ?:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="birth_city_state" id="birth_city_state" placeholder="cuidad y pais" value="<?php echo $birth_city_state?>">
                </div>
            </div>
			<div class="form-group">
				<label class="control-label col-md-5" for="greencard_place"> Direction donde aplicante quiere que llegue la greencard? :</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="greencard_place" id="greencard_place" placeholder="" value="<?php echo $greencard_place?>">
                 </div>
            </div>
			<div class="form-group">
				<label class="control-label col-md-5" for="emergency_phone"> Otro numero de telefono, por emergencia? : </label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="emergency_phone" id="emergency_phone" placeholder="" value="<?php echo $emergency_phone?>">
                </div>
            </div>

			<div class="form-group">
					<label class="control-label col-md-5" for="name_of_persons"> Name of person: </label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="name_of_persons" id="name_of_persons" placeholder="" value="<?php echo $name_of_persons?>">
                    </div>
            </div>
            <div class="form-group">
					<label class="control-label col-md-5" for="person_change_name"> Han cambiado su nombre?: </label>
                    <div class="col-md-6 ">
					   <label class="radio-inline">	
					       <input type="radio" name="person_change_name"  value="yes" <?php echo ($person_change_name=="yes") ? "checked" : " "?> > Yes
                       </label>
                    <label class="radio-inline">
                   	    <input type="radio" name="person_change_name"  value="no" <?php echo ($person_change_name=="no") ? "checked" : " "?>> No
                    </label>
                    </div>
            </div>

			<div class="form-group">
				<label class="control-label col-md-5" for="client_tall"> Cuanto mide el cliente en estatura (en pies no metros)? : </label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="client_tall" id="client_tall" placeholder="  " value=" <?php echo $client_tall?> ">
                    </div>
            </div>

			<div class="form-group">
				<label class="control-label col-md-5" for="client_wait"> Cuanto pesa el cliente en libras (no kilos)? : </label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="client_wait" id="client_wait" placeholder="Lbs." value="<?php echo $client_wait?> ">
                    </div>
            </div>

			<div class="form-group">
					<label class="control-label col-md-5" for="client_deportation"> El cliente estuvo en deportacion?: </label>
                    <div class="col-md-6 ">
                        <label class="radio-inline">
                            <input type="radio" name="client_deportation"  value="yes" <?php echo ($client_deportation=="yes") ? "checked" : " "?>> Yes
                        </label>
                 
                        <label class="radio-inline">
                        <input type="radio" name="client_deportation"  value="no" <?php echo ($client_deportation=="no") ? "checked" : " "?> > No
                        </label>
                    </div>
            </div>

            <div class="form-group">
					
				<label class="control-label col-md-5" for="photo_file"> FOTOS!!: </label>
                <div class="col-md-5">
					    <input type="file" class="form-control" name="photo_file" id="photo_file" value=""> 
                 </div>
                 <?php if($photo_file!=""){?>
                    <div class="col-md-2">
                        <a class="btn btn-success btn-sm" href="../uploads/intake/<?php echo $photo_file?>" target="_blank">Preview</a>
                    </div>
                 <?php }?>
            </div>

			<div class="form-group">
				<label class="control-label col-md-5" for="create_date"> Date: </label>
				<div class="col-md-6">
	  				<input type="date"  class="form-control" name="create_date" id="create_date" value="<?php echo $create_date?>">	
                 </div>
            </div>

            <div class="form-group">
				<div class="col-md-5 col-md-offset-5">
	  			<h5> <input type="checkbox" name="client_agreement" id="client_agreement" value="1" <?php echo ($client_agreement=="1") ? "checked" : " "?> > &nbsp; &nbsp; Yo he contestado todas las preguntas con la verdad.</h5>
                 </div>
            </div>


            <input style="float: right;" type="submit" name="submit" class="submit btn btn-lg btn-success" value="Save" id="submit_data" />
        </fieldset>
        
	</form>
  </div>
</body>
</html>



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

$(document).on('submit', '#registration_form', function(event){
	 event.preventDefault();
	$.ajax({
		url:"fetch.php?formNo=2&<?php echo $getId?>",
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