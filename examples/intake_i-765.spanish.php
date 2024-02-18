
<?php 
$singleDataNote= json_decode(file_get_contents('http://demolms.siscotech.com/views/work_file/apiData.php'));

function showData($name){
	global $singleDataNote;
	if(isset($singleDataNote->$name)) return $singleDataNote->$name;
	else return '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>INTAKE FOR FORM I-765</title>

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
.d-flexible {
        display: flex;
        align-items: baseline;
        gap: 1rem;
		margin-left: 100px;
    	margin-top: 37px;
    }
</style>
</head>
<body>
	<div class="container" style="padding: 20px;">
		<h1></h1>
		<div class="progress">
			<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
		<div CLASS="text-center">
		  <h3>Formulario de admisión I-765, Solicitud de autorización de empleo</h3>  
		</div>
		<form id="registration_form" class="form-horizontal" action="#" method="post">
			<!-- <input type="hidden" name="id" value="<?php echo $singleData->id?>" />
			<input type="hidden" name="client_id" value="<?php echo $clientId?>" /> -->

			
			<!----------------------------------------------------------------------
			-------------------------------- page 1 --------------------------------
			------------------------------------------------------------------------>
			
			<fieldset>
				<div class="form-group">
					<div class="page_number">
						<p style="text-align:right;padding-right:10px"><b>Página 1 de 7</b></p>
					</div>
				</div>
				<div class="form-group">
					<div class="row"> 
						<div class="col-md-4 col-md-offset-1">
							<label class="control-label col-md-10">Número de registro extranjero</label>
							<input type="text" class="form-control" name="alien_registration_number" value="<?php echo showData('alien_registration_number')?>" maxlength="9" />
						</div>
						<div class="col-md-4 col-md-offset-1">
							<label class="control-label col-md-10">
Abogado o representante correspondiente Número de cuenta en línea de USCIS (si corresponde):</label>
							<input type="text" class="form-control" name="attorney_uscis_online_account_number" value="<?php echo showData('attorney_uscis_online_account_number')?>" maxlength="12" />
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row"> 
						<div class="col-md-5">
							<div class="d-flexible" style="margin-top:0">
								<input type="checkbox" name="" id="">
								<p><b>Seleccione esta casilla si se adjunta el Formulario G-28.</b></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">

						<div class="bg-info">
							<h4><b>Parte 1. Motivo de la solicitud</b> </h4>
						</div>
						<h5><b>Estoy solicitando (seleccione solo una casilla): </b></h5>
						<div class="form-group">
							<label class="control-label col-md-12">1.a.
								
								<input type="hidden" name="reason_applying_initial_permission_to_accept" id="reason_applying_initial_permission_to_accept" value="<?php echo (showData('reason_applying_initial_permission_to_accept') == 'Y') ? 'Y' : 'N'; ?>" />

								<input type="checkbox" onChange="checkboxValue(this,'reason_applying_initial_permission_to_accept')" <?php echo (showData('reason_applying_initial_permission_to_accept') == 'Y') ? 'checked' : ''; ?>> Permiso inicial para aceptar empleo: 

							</label>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">1.b. 
							<input type="hidden" name="reason_applying_replacement_of_lost" id="reason_applying_replacement_of_lost" value="<?php echo (showData('reason_applying_renewal_of_permission') == 'Y') ? 'Y' : 'N'; ?>" />	
							
							<input type="checkbox" onChange="checkboxValue(this,'reason_applying_replacement_of_lost')"  <?php echo (showData('reason_applying_replacement_of_lost') == 'Y') ? 'checked' : ''; ?>>
                            Reemplazo de empleo perdido, robado o dañado
documento de autorización, o corrección de mi documento de autorización de empleo NO DEBIDO a un error del Servicio de Ciudadanía e Inmigración de EE. UU. (USCIS)
NOTA: El reemplazo (corrección) de un documento de autorización de empleo debido a un error de USCIS no requiere un nuevo Formulario I-765 ni una tarifa de presentación. Consulte Reemplazo de tarjeta
                             Error en la sección ¿Qué es la tarifa de presentación? de las Instrucciones del Formulario I-765 para obtener más detalles.
							</label>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">1.c. 

							<input type="hidden" name="reason_applying_renewal_of_permission" id="reason_applying_renewal_of_permission" value="<?php echo (showData('reason_applying_renewal_of_permission') == 'Y') ? 'Y' : 'N'; ?>" />
							
							<input type="checkbox" onChange="checkboxValue(this,'reason_applying_renewal_of_permission')" <?php echo (showData('reason_applying_renewal_of_permission') == 'Y') ? 'checked' : ''; ?>>Renovación de mi permiso para aceptar empleo. (Adjunte una copia de su documento de autorización de empleo anterior).

							</label>
						</div>

						<div class="bg-info">
							<h4><b>Parte 2. Información sobre usted</b> </h4>
				
							
						</div>
						<h4 class="bg-info"><b><i>
Su nombre legal completo</i></b> </h4>
						<div class="form-group">
							<label class="control-label col-md-5">
1.a. Nombre de familia (Apellido):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="29" name="information_about_you_family_last_name"  value="<?php echo showData('information_about_you_family_last_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">1.b. Nombre de pila (nombre):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="29" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">1.c. 
Segundo nombre:</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="29" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name')?>" />
							</div>
						</div>
					</div><!-- left side column -->

					<div class="col-md-6">
						<div class="bg-info">
							<h4><b><i>Otro nombre utilizado</i></b> </h4>
						</div>
						<h5><b>
                        Proporcione todos los demás nombres que haya utilizado alguna vez, incluidos alias, apellidos de soltera y apodos. Si necesita espacio adicional para completar esta sección, utilice el espacio provisto en la Parte 6. Información adicional.</b></h5>

						<div class="form-group">
							<label class="control-label col-md-5">2.a. 
Nombre de familia (Apellido):</label>
							<div class="col-md-7">
								<input type="text" class="form-control"  maxlength="29"  name="information_about_you_other_family_last_name" value="<?php echo showData('information_about_you_other_family_last_name')?>" maxlength="29" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">2.b. 
Nombre de pila (nombre):</label>
							<div class="col-md-7">
								<input type="text" class="form-control"  maxlength="29" name="information_about_you_other_given_first_name" value="<?php echo showData('information_about_you_other_given_first_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">2.c. 
Segundo nombre:</label>
							<div class="col-md-7">
								<input type="text" class="form-control"  maxlength="29" name="information_about_you_other_middle_name" value="<?php echo showData('information_about_you_other_middle_name')?>" />
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label class="control-label col-md-5">3.a. Nombre de familia (Apellido):</label>
							<div class="col-md-7">
								<input type="text" class="form-control"  maxlength="29" name="information_about_you_other_family_last_name_2" value="<?php echo showData('information_about_you_other_family_last_name_2')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.b. Nombre de pila (nombre):</label>
							<div class="col-md-7">
								<input type="text" class="form-control"  maxlength="29" name="information_about_you_other_given_first_name_2" value="<?php echo showData('information_about_you_other_given_first_name_2')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.c. 
Segundo nombre:</label>
							<div class="col-md-7">
								<input type="text" class="form-control"  maxlength="29" name="information_about_you_other_middle_name_2" value="<?php echo showData('information_about_you_other_middle_name_2')?>" />
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label class="control-label col-md-5">4.a. Nombre de familia (Apellido):</label>
							<div class="col-md-7">
								<input type="text" class="form-control"  maxlength="29" name="information_about_you_other_family_last_name_3" value="<?php echo showData('information_about_you_other_family_last_name_3')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">4.b. 
Nombre de pila (nombre):</label>
							<div class="col-md-7">
								<input type="text" class="form-control"  maxlength="29" name="information_about_you_other_given_first_name_3" value="<?php echo showData('information_about_you_other_given_first_name_3')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">4.c. 
Segundo nombre:</label>
							<div class="col-md-7">
								<input type="text" class="form-control"  maxlength="29" name="information_about_you_other_middle_name_3" value="<?php echo showData('information_about_you_other_middle_name_3')?>" />
							</div>
						</div>

					</div><!-- right side column -->
				</div>
				<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
				<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
			</fieldset>
			
			<!----------------------------------------------------------------------
			-------------------------------- page 2 --------------------------------
			------------------------------------------------------------------------>
			
			<fieldset>
				<div class="row">
					<div class="page_number">
						<b><p style="padding-left:1000px;">Página 2 de 7</p></b>
					</div>
                    <div class="col-md-6">
						<div class="bg-info">
							<h4><b>Parte 2. Información sobre usted (continuación)</b> </h4>
						</div>
						<div class="bg-info">
							
							<h4><b>
Su dirección postal en EE. UU.</b> </h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">5.a. A cargo del nombre (si corresponde):</label>
							<div class="col-md-7">
								<input type="text" maxlength="34" class="form-control" name="information_about_you_safe_mailing_care_of_name" value="<?php echo showData('information_about_you_safe_mailing_care_of_name')?>"  />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">
5.b. Número y nombre de la calle:</label>
							<div class="col-md-7">
								<input type="text" maxlength="27" class="form-control" name="information_about_you_safe_mailing_street_number" value="<?php echo showData('information_about_you_safe_mailing_street_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-6">5.c.  &nbsp; 
								<input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apta. &nbsp;

								<input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp; 

								<input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> piso.:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="information_about_you_safe_mailing_number" value="<?php echo showData('information_about_you_safe_mailing_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">5.d. Ciudad o pueblo :</label>
							<div class="col-md-7">
								 <input type="text" class="form-control" maxlength="20" name="information_about_you_safe_mailing_city_town" value="<?php echo showData('information_about_you_safe_mailing_city_town')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">5.e. Estado :</label>
							<div class="col-md-7">
								<select class="form-control" name="information_about_you_safe_mailing_state">
                                    <option style="display:none" value=''>Seleccionar</option>
									<?php
									foreach($allDataCountry as $record){
										if($record->state_code==showData('information_about_you_safe_mailing_state')) $selected = "selected"; else $selected = "";
										echo "<option value='$record->state_code' $selected>$record->state_code</option>";
									}
									?>
                                </select>	
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">5.f. Código postal :</label>
							<div class="col-md-7">
								<input type="text" maxlength="5" class="form-control" name="information_about_you_safe_mailing_zip_code" value="<?php echo showData('information_about_you_safe_mailing_zip_code')?>" />
							</div>
						</div>
						 <div class="form-group">
							<label class="control-label col-md-12">6.Su dirección postal actual es la misma que su dirección física? </label>
							<div class="col-md-5 col-md-offset-7">
								<label class="control-label">
									<input type="radio" name="is_your_current_mailing_same_as_physical" value="yes" <?php echo (showData('is_your_current_mailing_same_as_physical') == 'yes') ? 'checked' : ''; ?>> Sí
								</label>
								&nbsp;
								<label class="control-label">
									<input type="radio" name="is_your_current_mailing_same_as_physical" value="no" <?php echo (showData('is_your_current_mailing_same_as_physical') == 'no') ? 'checked' : ''; ?>> No
								</label>
							</div>
						</div>
						<h5><b>
NOTA: Si respondió "No" al artículo número 6, proporcione su dirección física a continuación.</b></h5>
						<div class="bg-info">
							<h4><b>
Dirección física de EE. UU.</b></h4>
						</div>

						<div class="form-group">
							<label class="control-label col-md-5">7.a. Número y nombre de la calle:</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="27" name="information_about_you_safe_us_physical_street_number" value="<?php echo showData('information_about_you_safe_us_physical_street_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-6">7.b.  &nbsp; 
								<input type="radio" name="information_about_you_safe_us_physical_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_safe_us_physical_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apta. &nbsp;

								<input type="radio" name="information_about_you_safe_us_physical_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_safe_us_physical_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp; 

								<input type="radio" name="information_about_you_safe_us_physical_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_safe_us_physical_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> piso.:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="information_about_you_safe_us_physical_number" value="<?php echo showData('information_about_you_safe_us_physical_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">7.c. Ciudad o pueblo
 :</label>
							<div class="col-md-7">
								 <input type="text" class="form-control" maxlength="20" name="information_about_you_safe_us_physical_city_town" value="<?php echo showData('information_about_you_safe_us_physical_city_town')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">7.d. Estado
 :</label>
							<div class="col-md-7">								
								<select class="form-control" name="information_about_you_safe_us_physical_state">
                                    <option style="display:none" value=''>Seleccionar
</option>
									<?php
									foreach($allDataCountry as $record){
										if($record->state_code==showData('information_about_you_safe_us_physical_state')) $selected = "selected"; else $selected = "";
										echo "<option value='$record->state_code' $selected>$record->state_code</option>";
									}
									?>
                                </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">7.e. Código postal
 :</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="5" name="information_about_you_safe_us_physical_zip_code" value="<?php echo showData('information_about_you_safe_us_physical_zip_code')?>" />
							</div>
						</div>

						<div class="bg-info">
							<h4><b>Otra información</b></h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">8. Número de registro de extranjero (Número A) (si corresponde) : &#x2B9E; </label>
							<div class="col-md-8 col-md-offset-4">
								 <input type="text" class="form-control" maxlength="9" name="other_information_about_you_alien_registration_number" value="<?php echo showData('other_information_about_you_alien_registration_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">9. Número de cuenta en línea de USCIS (si corresponde)  : &#x2B9E; </label>
							<div class="col-md-8 col-md-offset-4">
								<input type="text" class="form-control" maxlength="12" name="other_information_about_you_uscis_online_account_number" value="<?php echo showData('other_information_about_you_uscis_online_account_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">10. Género: </label>
							<div class="col-md-6">
								<label class="control-label">
									<input type="radio" name="other_information_about_you_gender" value="male" <?php echo (showData('other_information_about_you_gender') == 'male') ? 'checked' : ''; ?>> Masculina
								</label>
								&nbsp;
								<label class="control-label">
									<input type="radio" name="other_information_about_you_gender" value="female" <?php echo (showData('other_information_about_you_gender') == 'female') ? 'checked' : ''; ?>> Femenina
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-7">11. Marital Status: </label>
							<div class="col-md-10 col-md-offset-2">
								<label class="control-label">
									<input type="radio" name="other_information_about_you_marital_status" value="single" <?php echo (showData('other_information_about_you_marital_status') == 'single') ? 'checked' : ''; ?>> Soltera
								</label>
								&nbsp;
								<label class="control-label">
									<input type="radio" name="other_information_about_you_marital_status" value="married" <?php echo (showData('other_information_about_you_marital_status') == 'married') ? 'checked' : ''; ?>> Casada
								</label>
								 &nbsp;
								<label class="control-label">
									<input type="radio" name="other_information_about_you_marital_status" value="divorced" <?php echo (showData('other_information_about_you_marital_status') == 'divorced') ? 'checked' : ''; ?>> Divorciada
								</label>
								 &nbsp;
								<label class="control-label">
									<input type="radio" name="other_information_about_you_marital_status" value="widowed" <?php echo (showData('other_information_about_you_marital_status') == 'widowed') ? 'checked' : ''; ?>> Viuda
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">12. Ha presentado anteriormente el Formulario I-765? : </label>
							<div class="col-md-5 col-md-offset-7">
								<label class="control-label">
									<input type="radio" name="other_information_have_you_previously_filed_I_765" value="yes" <?php echo (showData('other_information_have_you_previously_filed_I_765') == 'yes') ? 'checked' : ''; ?>> Sí
								</label>
								&nbsp;
								<label class="control-label">
									<input type="radio" name="other_information_have_you_previously_filed_I_765" value="no" <?php echo (showData('other_information_have_you_previously_filed_I_765') == 'no') ? 'checked' : ''; ?>> No
								</label>
							</div>
						</div>


						<div class="form-group">
							<label class="control-label col-md-12">13.a. Alguna vez la Administración del Seguro Social (SSA) le ha emitido oficialmente una tarjeta de Seguro Social? : </label>
							<div class="col-md-5 col-md-offset-7">
								<label class="control-label">
									<input type="radio" name="other_information_social_security_card" value="yes" <?php echo (showData('other_information_social_security_card') == 'yes') ? 'checked' : ''; ?>> Sí
								</label>
								&nbsp;
								<label class="control-label">
									<input type="radio" name="other_information_social_security_card" value="no" <?php echo (showData('other_information_social_security_card') == 'no') ? 'checked' : ''; ?>> No
								</label>
							</div>
						</div>
						<h5><b>
NOTA: Si respondió "No" al Artículo Número 13.a., pase al Artículo Número 14. Si respondió "Sí" al Artículo Número 13.a., proporcione la información solicitada en el Artículo Número 13.b.</b></h5>
						

					</div><!-- left side column -->
					
					<div class="col-md-6">
                            
						<div class="form-group">
							<label class="control-label col-md-12">
13.b.Proporcione su número de Seguro Social (SSN) (si lo conoce).: &#x2B9E; </label>
							<div class="col-md-8 col-md-offset-4">
								 <input type="text" class="form-control" name="other_information_social_security_number_ssn" value="<?php echo showData('other_information_social_security_number_ssn')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">
14. Quiere que la SSA le emita una tarjeta de Seguro Social? (También debe responder "Sí" al punto número 15, Consentimiento para la divulgación, para recibir una tarjeta):</label>
							<div class="col-md-5 col-md-offset-7">
								<label class="control-label">
									<input type="radio" name="other_information_social_security_card_issue" value="yes" <?php echo (showData('other_information_social_security_card_issue') == 'yes') ? 'checked' : ''; ?>> Sí
								</label>
								&nbsp;
								<label class="control-label">
									<input type="radio" name="other_information_social_security_card_issue" value="no" <?php echo (showData('other_information_social_security_card_issue') == 'no') ? 'checked' : ''; ?>> No
								</label>
							</div>
						</div>

						<h5><b>
NOTA: Si respondió "No" al punto número 14, omita
a la Parte 2., Artículo Número 18.a. Si respondió "Sí" a
Número de artículo 14. También debe responder "Sí" al artículo
Número 15.
						</b></h5>
						<div class="form-group">
							<label class="control-label col-md-12">15. Consentimiento para la divulgación: Autorizo ​​la divulgación de información de esta solicitud a la SSA según sea necesario con el fin de asignarme un SSN y emitirme una tarjeta de Seguro Social. </label>
							<div class="col-md-5 col-md-offset-7">
								<label class="control-label">
									<input type="radio" name="other_information_constant_for_disclosure" value="yes" <?php echo (showData('other_information_constant_for_disclosure') == 'yes') ? 'checked' : ''; ?>> Sí
								</label>
								&nbsp;
								<label class="control-label">
									<input type="radio" name="other_information_constant_for_disclosure" value="no" <?php echo (showData('other_information_constant_for_disclosure') == 'no') ? 'checked' : ''; ?>> No
								</label>
							</div>
						</div>

						<h5><b>NOTA: Si respondió "Sí" a los Números de artículo 14. - 15., proporcione la información solicitada en los Números de artículo 16.a. - 17.b.</b></h5>
						
						<div class="f-name">
							<b>Nombre del Padre</b></br>							
							<b>Proporciona el nombre de nacimiento de tu padre.</b>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">16.a. Nombre de familia (Apellido):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="29" name="information_about_your_father_family_last_name" value="<?php echo showData('information_about_your_father_family_last_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">16.b.Nombre de pila (primer nombre):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="29" name="information_about_your_father_given_first_name" value="<?php echo showData('information_about_your_father_given_first_name')?>" />
							</div>
						</div>
						<div class="f-name">
							<b>Nombre de la madre</b></br>							
							<b>Proporcione el nombre de nacimiento de su madre.</b>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">17.a. Nombre de familia (Apellido):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="29" name="information_about_your_mother_family_last_name" value="<?php echo showData('information_about_your_mother_family_last_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">17.b. Nombre de pila (nombre):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="29" name="information_about_your_mother_given_first_name" value="<?php echo showData('information_about_your_mother_given_first_name')?>" />
							</div>
						</div>
						<div class="bg-info">
							<h4><b>Su país o países de ciudadanía o nacionalidad</b></h4>
						</div>
						<h5><b>Enumere todos los países de los que actualmente es ciudadano o nacional. Si necesita espacio adicional para completar este punto, utilice el espacio provisto en la Parte 6. Información adicional.</b></h5>
						<div class="form-group">
							<label class="control-label col-md-5">18.a. País:</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="39" name="other_information_about_you_country_of_citizen" value="<?php echo showData('other_information_about_you_country_of_citizen')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">18.b. País:</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="39" name="other_information_about_you_country_of_citizen_2" value="<?php echo showData('other_information_about_you_country_of_citizen_2')?>" />
							</div>
						</div>						

					</div><!-- right side column -->
				</div>

				<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
				<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
				<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
			</fieldset>
			
			<!----------------------------------------------------------------------
			-------------------------------- page 3 --------------------------------
			------------------------------------------------------------------------>
			
			<fieldset>
				<div class="row">
					<div class="page_number">
						<b><p style="padding-left:1000px;">Página 3 de 7</p></b>
					</div>
                    
					<div class="col-md-6">
						<div class="bg-info">
							<h4><b>Part 2.Information about you (continued)</b></h4>
						</div>
						
						<div class="bg-info">
							<h4><b>Lugar de nacimiento</b></h4>
						</div>
						<h5><b>Indique la ciudad/pueblo/pueblo, estado/provincia y país donde nació.</b></h5>
						<div class="form-group">
							<label class="control-label col-md-5">19.a. Ciudad/Pueblo/Pueblo de Nacimiento:</label>
							<div class="col-md-7">
								<input type="text" maxlength="39" class="form-control" name="information_about_you_city_town_village" value="<?php echo showData('information_about_you_city_town_village')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">
19.b. Estado/Provincia de Nacimiento:</label>
							<div class="col-md-7">
								<select class="form-control" name="information_about_you_state_province">
                                    <option style="display:none" value=''>Seleccionar</option>
									<?php
									foreach($allDataCountry as $record){
										if($record->state_code==showData('information_about_you_state_province')) $selected = "selected"; else $selected = "";
										echo "<option value='$record->state_code' $selected>$record->state_code</option>";
									}
									?>
                                </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">19.c.  País de nacimiento:</label>
							<div class="col-md-7">
								<input type="text" maxlength="39" class="form-control" name="other_information_about_you_country_of_birth" value="<?php echo showData('other_information_about_you_country_of_birth')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">20.  Fecha de nacimiento (mm / dd / aaaa):</label>
							<div class="col-md-7 col-md-offset-5">
								<input type="date" maxlength="14" class="form-control" name="other_information_about_you_date_of_birth" value="<?php echo showData('other_information_about_you_date_of_birth')?>" />
							</div>
						</div>

						<div class="bg-info">
							<h4><b>Información sobre su última llegada a Estados Unidos</b></h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">21.a.  Formulario I-94 Número de registro de llegada-depratura (si corresponde): </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" maxlength="11" class="form-control" name="other_information_about_you_arival_record_number" value="<?php echo showData('other_information_about_you_arival_record_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">21.b.  Número de pasaporte de su pasaporte emitido más recientemente: </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" maxlength="39" class="form-control" name="other_information_about_you_passport_number" value="<?php echo showData('other_information_about_you_passport_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">21.c. Número de documento de viaje (si corresponde): </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" maxlength="39" class="form-control" name="other_information_about_you_travel_document_number" value="<?php echo showData('other_information_about_you_travel_document_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">21.d. País que emitió su pasaporte o documento de viaje: </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" maxlength="39" class="form-control" name="other_information_about_you_country_issuance_passport" value="<?php echo showData('other_information_about_you_country_issuance_passport')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">21.e. Fecha de Vencimiento del Pasaporte o Documento de Viaje (dd/mm/aaaa): </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="date"  class="form-control" name="other_information_about_you_expiry_date_issuance_passport" value="<?php echo showData('other_information_about_you_expiry_date_issuance_passport')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">22. Fecha de su última llegada a los Estados Unidos. En o alrededor de (dd/mm/aaaa): </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="date"  class="form-control" name="information_about_you_last_arrivat_us" value="<?php echo showData('information_about_you_last_arrivat_us')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">23. Lugar de su última llegada a los Estados Unidos: </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" maxlength="39" class="form-control" name="information_about_you_place_your_last_arrival_us" value="<?php echo showData('information_about_you_place_your_last_arrival_us')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">24. Estado migratorio en su última llegada (por ejemplo, visitante B-2, estudiante F-1 o sin estatus): </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" maxlength="39" class="form-control" name="information_about_you_place_your_immigration_status" value="<?php echo showData('information_about_you_place_your_immigration_status')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">25. Su estado o categoría migratoria actual (por ejemplo, visitante B-2, estudiante F-1, persona en libertad condicional, acción diferida o sin estado o categoría): </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" maxlength="39" class="form-control" name="information_about_you_place_your_immigration_status_category" value="<?php echo showData('information_about_you_place_your_immigration_status_category')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">26. Número del Sistema de Información de Estudiantes y Visitantes de Intercambio (SEVIS) (si corresponde):  &#x2B9E; NORTE-</label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" maxlength="10" class="form-control" name="information_about_you_place_your_student_exchange_visitor" value="<?php echo showData('information_about_you_place_your_immigration_status_category')?>" />
							</div>
						</div>
					
                    </div><!--end of left side column -->
                    
                    <div class="col-md-6">
                            
						<div class="bg-info">
							<h4><b>Información sobre su categoría de elegibilidad</b></h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">27. Categoría de elegibilidad. Consulte el formulario Quién puede presentar una solicitud
Sección I-765 del Formulario I-765 Instrucciones para determinar
la categoría de elegibilidad apropiada para esta solicitud.
Ingrese la letra y el número apropiados para su elegibilidad
categoría siguiente (por ejemplo, (a)(8), (c)(17)(iii)): </label>
							<div class="col-md-2 col-md-offset-5">
								<input type="text" class="form-control" name="information_about_you_elligability_category1" maxlength="4" value="<?php echo showData('information_about_you_elligability_category1')?>" />
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="information_about_you_elligability_category2" maxlength="3" value="<?php echo showData('information_about_you_elligability_category2')?>" />
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="information_about_you_elligability_category3" maxlength="4" value="<?php echo showData('information_about_you_elligability_category3')?>" />
							</div>							
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">28.a. Grado:</label>
							<div class="col-md-7">
								<input type="text" maxlength="16" class="form-control" name="information_about_you_elligability_degree" value="<?php echo showData('information_about_you_elligability_degree')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">28.b. Nombre del empleador tal como figura en E-Verify: </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" class="form-control" maxlength="39" name="information_about_you_place_your_employer_name_e_verify" value="<?php echo showData('information_about_you_place_your_employer_name_e_verify')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">28.c.Número de identificación de empresa de E-Verify del empleador o número de identificación de empresa de cliente de E-Verify válido: </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" class="form-control" maxlength="39" name="information_about_you_place_your_employer_name_e_verify_identification" value="<?php echo showData('information_about_you_place_your_employer_name_e_verify_identification')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">29.(c)(26) Categoría de elegibilidad. Si ingresó la categoría de elegibilidad (c)(26) en el Artículo Número 27, proporcione el número de recibo del Formulario I-797 Aviso más reciente de su cónyuge H-IB para el Formulario I-129, Petición para un trabajador no inmigrante:   &#x2B9E; </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" maxlength="13" class="form-control" name="information_about_you_place_your_employer_name_e_verify_nominigrant_worker" value="<?php echo showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">30. (c)(8) Categoría de elegibilidad. Si ingresó la elegibilidad
categoría (c)(8) en el artículo número 27. ¿Alguna vez ha
¿Ha sido arrestado y/o condenado por algún delito?: </label>
							<div class="col-md-5 col-md-offset-7">
								<label class="control-label">
									<input type="radio" name="information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested" value="yes" <?php echo (showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested') == 'yes') ? 'checked' : ''; ?>> Yes
								</label>
								&nbsp;
								<label class="control-label">
									<input type="radio" name="information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested" value="no" <?php echo (showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested') == 'no') ? 'checked' : ''; ?>> No
								</label>
							</div>
						</div>
						<h5><b>NOTA: Si respondió "Sí" al artículo número 30.,
consulte las Instrucciones de presentación especiales para aquellos con
Solicitudes de asilo pendientes (c)(8) en el período requerido
Sección de documentación de las Instrucciones del Formulario I-765
para obtener información sobre cómo proporcionar disposiciones judiciales</b></h5>

						<div class="form-group">
							<label class="control-label col-md-12">31.a. (c)(35) y (c)(36) Categoría de elegibilidad. Si ingresó la categoría de elegibilidad (c)(35) en el artículo número 27, proporcione el número de recibo de su Aviso del Formulario I-797 para el Formulario I-140, Petición de inmigrante para trabajador extranjero. Si ingresó la categoría de elegibilidad (c)(36) en el artículo número 27, proporcione el número de recibo del Aviso del Formulario I-797 de su cónyuge o sus padres para el Formulario I-140:   &#x2B9E;</label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" class="form-control" maxlength="13" name="information_about_you_place_your_employer_name_e_verify_nominigrant_worker_31" value="<?php echo showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker_31')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">31.b. Si ingresó a la categoría de elegibilidad (c)(35) o (c)(36) en
Artículo número 27. ¿ALGUNA VEZ ha sido arrestado por
y/o condenado por algún delito? </label>
							<div class="col-md-5 col-md-offset-7">
								<label class="control-label">
									<input type="radio" name="information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested_2" value="yes" <?php echo (showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested_2') == 'yes') ? 'checked' : ''; ?>> Sí
								</label>
								&nbsp;
								<label class="control-label">
									<input type="radio" name="information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested_2" value="no" <?php echo (showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested_2') == 'no') ? 'checked' : ''; ?>> No
								</label>
							</div>
						</div>
						<h5><b>NOTA: Si respondió “Sí” al punto número 31.b.,
consulte Categorías de no inmigrantes basadas en el empleo,
Artículos 8. - 9., en la sección Quién puede presentar el Formulario I-765
de las Instrucciones del Formulario I-765 para obtener información sobre
proporcionando disposiciones judiciales</b></h5>
						
					</div><!--end of right side column -->
				</div>

				<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
				<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
				<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
			</fieldset>
			
			<!----------------------------------------------------------------------
			-------------------------------- page 4 --------------------------------
			------------------------------------------------------------------------>
			
			<fieldset>
				<div class="row">
					<div class="page_number">
						<b><p style="padding-left:1000px;">Page 4 of 7</p></b>
					</div>
					
                    <div class="col-md-6">
						<div class="bg-info">
							<h4><b>Part 3. Applicant's Statement, Contact Information, Declaration, Certification, and Signature</b></h4>
						</div>
						<h5><b>NOTE: Read the Penalties section of the Form 1-765
						Instructions before completing this section. You must file
						Form I-765 while in the United States.</b></h5>
						<div class="bg-info">
							<h4><b><i>Applicant's Statement</i></b></h4>
						</div>
						<h5><b>NOTE: Select the box for either Item Number 1.a. or 1.b. If applicable, select the box for Item Number 2. </b></h5>

						<div class="form-group">
							<label class="control-label col-md-12">1.a.
								
								<input type="hidden" name="applicant_statement_1a" id="applicant_statement_1a" value="<?php echo (showData('applicant_statement_1a') == 'Y') ? 'Y' : 'N'; ?>" />

								<input type="checkbox" onChange="checkboxValue(this,'applicant_statement_1a')" <?php echo (showData('applicant_statement_1a') == 'Y') ? 'checked' : ''; ?>> I can read and understand English, and I have read and
								understand every question and instruction on this
								application and my answer to every question.: 

							</label>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">1.b.
								
								<input type="hidden" name="applicant_statement_1b" id="applicant_statement_1b" value="<?php echo (showData('applicant_statement_1b') == 'Y') ? 'Y' : 'N'; ?>" />

								<input type="checkbox" onChange="checkboxValue(this,'applicant_statement_1b')" <?php echo (showData('applicant_statement_1b') == 'Y') ? 'checked' : ''; ?>> The interpreter named in Part 4. read to me every
							question and instruction on this application and my
							answer to every question in
							</label>
						</div>
						
						<input type="text" class="form-control" name="applicant_statement_1_b_write" value="<?php echo showData('applicant_statement_1_b_write')?>" />
						<h5><b>a language in which I am fluent, and I understood everything</b></h5>

						<div class="form-group">
							<label class="control-label col-md-12">2.
								
								<input type="hidden" name="applicant_statement_2" id="applicant_statement_2" value="<?php echo (showData('applicant_statement_2') == 'Y') ? 'Y' : 'N'; ?>" />

								<input type="checkbox" onChange="checkboxValue(this,'applicant_statement_2')" <?php echo (showData('applicant_statement_2') == 'Y') ? 'checked' : ''; ?>> At my request, the preparer named in Part 5.,
							</label>
						</div>
						
						<input type="text" class="form-control" name="applicant_statement_2_write" value="<?php echo showData('applicant_statement_2_write')?>" />
						<h5><b>prepared this application for me based only upon information I provided or authorized.</b></h5>


						<div class="bg-info">
							<h4><b><i>Applicant's Contact Information</i></b></h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">3.  Applicant's Daytime Telephone Number: </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" class="form-control" maxlength="10" name="petitioner_information_daytime_telephone_number" value="<?php echo showData('petitioner_information_daytime_telephone_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">4.  Applicant's Mobile Telephone Number (if any): </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" class="form-control" maxlength="10" name="petitioner_information_mobile_telephone_number" value="<?php echo showData('petitioner_information_mobile_telephone_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">5. Applicant's Email Address (if any): </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="email" class="form-control" maxlength="38" name="petitioner_information_email_address" value="<?php echo showData('petitioner_information_email_address')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">6.
								
								<input type="hidden" name="applicant_statement_6" id="applicant_statement_6" value="<?php echo (showData('applicant_statement_6') == 'Y') ? 'Y' : 'N'; ?>" />

								<input type="checkbox" onChange="checkboxValue(this,'applicant_statement_6')" <?php echo (showData('applicant_statement_6') == 'Y') ? 'checked' : ''; ?>>Select this box if you are a Salvadoran or Guatemalan
							national eligible for benefits under the ABC settlement
							agreement.
							</label>
						</div>					
					
                    </div><!--end of left side column -->
                    
                    <div class="col-md-6">
						
						<div class="bg-info">
							<h4><b><i>Applicant's Signature</i></b></h4>
						</div>

						<div class="form-group">
                            <label class="control-label col-md-7">7.b. Date of Birth (mm/dd/yyyy) :</label>
                            <div class="col-md-5">
                                    <input type="date" class="form-control" name="applicant_statement_applicant_date_of_birth" value="<?php echo showData('applicant_statement_applicant_date_of_birth')?>" />
                             </div>
                        </div>
						<h5><b>NOTE TO ALL APPLICANTS: If you do not completely fill
							out this application or fail to submit required documents listed
							in the Instructions, USCIS may deny your application.</b></h5>

						<div class="bg-info">
                            <h4><b>Part 4. Interpreter's Contact Information, Certification, and Signature </b> </h4>
                        </div>
						<h5><b>Provide the following information about the interpreter.</b></h5>
						<div class="bg-info">
							<h4><b><i>Interpreter's Full Name</i></b></h4>
						</div>

						<div class="form-group">
							<label class="control-label col-md-12">1.a.  Interpreter's Family Name (Last Name)</label>
							<div class="col-md-12">
								<input type="text" maxlength="39" class="form-control" name="i_765_interpreter_family_last_name" value="<?php echo showData('i_765_interpreter_family_last_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">1.b.Interpreter's Given Name (First Name) </label>
							<div class="col-md-12">
								<input type="text" maxlength="39" class="form-control" name="i_765_interpreter_family_given_first_name" value="<?php echo showData('i_765_interpreter_family_given_first_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">2. Interpreter's Business or Organization Name (if any): </label>
							<div class="col-md-12">
								<input type="text" maxlength="34" class="form-control" name="i_765_interpreter_business_name" value="<?php echo showData('i_765_interpreter_business_name')?>" />
							</div>
						</div>

					</div><!--end of right side column -->
				</div>

				<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
				<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
				<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
			</fieldset>
			
			<!----------------------------------------------------------------------
			-------------------------------- page 5 --------------------------------
			------------------------------------------------------------------------>
			
			<fieldset>
                <div class="row">
					<div class="page_number">
						<b><p style="padding-left:1000px;">Page 5 of 7</p></b>
					</div>
                    <div class="col-md-6">
						<div class="bg-info">
							<h4><b>Part 4. Interpreter's Contact Information, Certification, and Signature</b></h4>
						</div>

						<div class="bg-info">
							<h4><b>Interpreter's Mailing Address</b></h4>
						</div>

						<div class="form-group">
							<label class="control-label col-md-5">3.a. Street Number and Name:</label>
							<div class="col-md-7">
								<input type="text" maxlength="28" class="form-control" name="i_765_interpreter_mailing_address_street_number" value="<?php echo showData('i_765_interpreter_mailing_address_street_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-6">3.b.  &nbsp; 
								<input type="radio" name="i_765_interpreter_mailing_address_apt_ste_flr" value="apt" <?php echo (showData('i_765_interpreter_mailing_address_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;

								<input type="radio" name="i_765_interpreter_mailing_address_apt_ste_flr" value="ste" <?php echo (showData('i_765_interpreter_mailing_address_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp; 

								<input type="radio" name="i_765_interpreter_mailing_address_apt_ste_flr" value="flr" <?php echo (showData('i_765_interpreter_mailing_address_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="i_765_interpreter_mailing_address_apt_ste_flr_value" value="<?php echo showData('i_765_interpreter_mailing_address_apt_ste_flr_value')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.c. City or Town :</label>
							<div class="col-md-7">
								 <input type="text" maxlength="20" class="form-control" name="i_765_interpreter_mailing_address_city_town" value="<?php echo showData('i_765_interpreter_mailing_address_city_town')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.d. State :</label>
							<div class="col-md-7">
								<select class="form-control" name="i_765_interpreter_mailing_address_state">
                                    <option style="display:none" value=''>Select</option>
									<?php
									foreach($allDataCountry as $record){
										if($record->state_code==showData('i_765_interpreter_mailing_address_state')) $selected = "selected"; else $selected = "";
										echo "<option value='$record->state_code' $selected>$record->state_code</option>";
									}
									?>
                                </select>								
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.e. Zip Code :</label>
							<div class="col-md-7">
								<input type="text" maxlength="5" class="form-control" name="i_765_interpreter_mailing_address_zip_code" value="<?php echo showData('i_765_interpreter_mailing_address_zip_code')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.f. Province :</label>
							<div class="col-md-7">
								<input type="text" maxlength="20" class="form-control" name="i_765_interpreter_mailing_address_province" value="<?php echo showData('i_765_interpreter_mailing_address_province')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.g. Postal Code :</label>
							<div class="col-md-7">
								<input type="text" maxlength="9" class="form-control" name="i_765_interpreter_mailing_address_postal_code" value="<?php echo showData('i_765_interpreter_mailing_address_postal_code')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.h. Country :</label>
							<div class="col-md-7">
								<input type="text" maxlength="39" class="form-control" name="i_765_interpreter_mailing_address_country" value="<?php echo showData('i_765_interpreter_mailing_address_country')?>" />
							</div>
						</div>

						<div class="bg-info">
							<h4><b><i>Interpreter's  Contact Information</i></b></h4>
						</div>

						<div class="form-group">
							<label class="control-label col-md-12">4.  Interpreter's Daytime Telephone Number</label>
							<div class="col-md-12">
								<input type="text" class="form-control" maxlength="10" name="i_765_interpreter_daytime_tel" value="<?php echo showData('i_765_interpreter_daytime_tel')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if any)  </label>
							<div class="col-md-12">
								<input type="text" class="form-control" maxlength="10" name="i_765_interpreter_mobile" value="<?php echo showData('i_765_interpreter_mobile')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">6. Interpreter's Email Address (if any) </label>
							<div class="col-md-12">
								<input type="email" class="form-control" maxlength="38" name="i_765_interpreter_email" value="<?php echo showData('i_765_interpreter_email')?>" />
							</div>
						</div>

						<div class="bg-info">
							<h4><b><i>Interpreter's Certification</i></b></h4>
						</div>
						
						<h5><b>I certify, under penalty of perjury, that:</b></h5>
						<h5><b>I am fluent in English and</b></h5><input type="text" maxlength="24" class="form-control" name="i_765_interpreter_certification_language_skill" value="<?php echo showData('i_765_interpreter_certification_language_skill')?>" />
						<h5><b>which is the same language specified in Part 3., Item Number
						1.b., and I have read to this applicant in the identified language
						every question and instruction on this application and his or her
						answer to every question. The applicant informed me that he or
						she understands every instruction, question, and answer on the
						application, including the Applicant's Declaration and
						Certification, and has verified the accuracy of every answer.</b></h5>

						<div class="bg-info">
							<h4><b><i>Interpreter's Signature</i></b></h4>
						</div>
						<div class="form-group">
                            <label class="control-label col-md-7">7.b. Date of Birth (mm/dd/yyyy) :</label>
							<div class="col-md-5">
								<input type="date" class="form-control" name="i_765_interpreter_sign_date" value="<?php echo showData('i_765_interpreter_sign_date')?>" />
                            </div>
                        </div>
                    </div><!--end of left side column -->
                    
					<div class="col-md-6">
						<div class="bg-info">
							<h4><b>Part 5. Contact Information, Declaration, and Signature of the Person Preparing this Application, if Other Than the Applicant</b></h4>
						</div>
						<h5><b>Provide the following information about the preparer.</b></h5>
						<div class="bg-info">
							<h4><b>Preparers's Full Name</b></h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">1.a.  Preparer's Family Name (Last Name)</label>
							<div class="col-md-12">
								<input type="text" maxlength="39" class="form-control" name="i_765_preparer_family_last_name" value="<?php echo showData('i_765_preparer_family_last_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">1.b.Preparer's Given Name (First Name)  </label>
							<div class="col-md-12">
								<input type="text" maxlength="39" class="form-control" name="i_765_preparer_family_given_first_name" value="<?php echo showData('i_765_preparer_family_given_first_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">2.Preparer's Business or Organization Name (if any) </label>
							<div class="col-md-12">
								<input type="text" maxlength="34" class="form-control" name="i_765_preparer_business_name" value="<?php echo showData('i_765_preparer_business_name')?>" />
							</div>
						</div>
						<div class="bg-info">
							<h4><b>Preparer's Mailing Address</b></h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.a. Street Number and Name:</label>
							<div class="col-md-7">
								<input type="text" maxlength="28" class="form-control" name="i_765_preparer_mailing_address_street_number" value="<?php echo showData('i_765_preparer_mailing_address_street_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-6">3.b.  &nbsp; 
								<input type="radio" name="i_765_preparer_mailing_address_apt_ste_flr" value="apt" <?php echo (showData('i_765_preparer_mailing_address_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;

								<input type="radio" name="i_765_preparer_mailing_address_apt_ste_flr" value="ste" <?php echo (showData('i_765_preparer_mailing_address_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp; 

								<input type="radio" name="i_765_preparer_mailing_address_apt_ste_flr" value="flr" <?php echo (showData('i_765_preparer_mailing_address_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="i_765_preparer_mailing_address_apt_ste_flr_value" value="<?php echo showData('i_765_preparer_mailing_address_apt_ste_flr_value')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.c. City or Town :</label>
							<div class="col-md-7">
								 <input type="text" maxlength="20" class="form-control" name="i_765_preparer_mailing_address_city_town" value="<?php echo showData('i_765_preparer_mailing_address_city_town')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.d. State :</label>
							<div class="col-md-7">
                                <select class="form-control" name="i_765_preparer_mailing_address_state">
                                    <option style="display:none" value=''>Select</option>
									<?php
									foreach($allDataCountry as $record){
										if($record->state_code==showData('i_765_preparer_mailing_address_state')) $selected = "selected"; else $selected = "";
										echo "<option value='$record->state_code'>$record->state_code</option>";
									}
									?>
                                </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.e. Zip Code :</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="5" name="i_765_preparer_mailing_address_zip_code" value="<?php echo showData('i_765_preparer_mailing_address_zip_code')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.f. Province :</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="20" name="i_765_preparer_mailing_address_province" value="<?php echo showData('i_765_preparer_mailing_address_province')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.g. Postal Code :</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="9" name="i_765_preparer_mailing_address_postal_code" value="<?php echo showData('i_765_preparer_mailing_address_postal_code')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.h. Country :</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="39" name="i_765_preparer_mailing_address_country" value="<?php echo showData('i_765_preparer_mailing_address_country')?>" />
							</div>
						</div>
						<div class="bg-info">
							<h4><b><i>Preparer's Contact Information</i></b></h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">4.  Preparer's Daytime Telephone Number</label>
							<div class="col-md-12">
								<input type="text" class="form-control" maxlength="10" name="i_765_preparer_daytime_tel" value="<?php echo showData('i_765_preparer_daytime_tel')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">5.Preparer's Mobile Telephone Number (if any)  </label>
							<div class="col-md-12">
								<input type="text" class="form-control" maxlength="10" name="i_765_preparer_mobile" value="<?php echo showData('i_765_preparer_mobile')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">6. Preparer's Email Address (if any) </label>
							<div class="col-md-12">
								<input type="email" class="form-control" maxlength="38" name="i_765_preparer_email" value="<?php echo showData('i_765_preparer_email')?>" />
							</div>
						</div>
                    </div><!--end of right side column -->				
				</div>

				<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
				<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
				<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
            </fieldset>
			
			<!----------------------------------------------------------------------
			-------------------------------- page 6 --------------------------------
			------------------------------------------------------------------------>
			
			<fieldset>
				<div class="row">
					<div class="page_number">
						<b><p style="padding-left:1000px;">Page 6 of 7</p></b>
					</div>
                    <div class="col-md-6">
						<div class="bg-info">
							<h4><b>Part 5. Contact Information, Declaration, and Signature of the Person Preparing this Application, if Other Than the Applicant(continued)</b></h4>
						</div>
						<div class="bg-info">
							<h4><b>Preparer's Statement</b></h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">7.a.
								
								<input type="hidden" name="i_765_preparer_statement_7a" id="i_765_preparer_statement_7a" value="<?php echo (showData('i_765_preparer_statement_7a') == 'Y') ? 'Y' : 'N'; ?>" />

								<input type="checkbox" onChange="checkboxValue(this,'i_765_preparer_statement_7a')" <?php echo (showData('i_765_preparer_statement_7a') == 'Y') ? 'checked' : ''; ?>> I am not an attorney or accredited representative but
								have prepared this application on behalf of the
								applicant and with the applicant's consent.
							</label>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">7.b.
								
								<input type="hidden" name="i_765_preparer_statement_7b" id="i_765_preparer_statement_7b" value="<?php echo (showData('i_765_preparer_statement_7b') == 'Y') ? 'Y' : 'N'; ?>" />
								<input type="checkbox" onChange="checkboxValue(this,'i_765_preparer_statement_7b')" <?php echo (showData('i_765_preparer_statement_7b') == 'Y') ? 'checked' : ''; ?>> I am an attorney or accredited representative and my
								representation of the applicant in this case 
								
								<input type="hidden" name="i_765_preparer_statement_7b_extend" id="i_765_preparer_statement_7b_extend" value="<?php echo (showData('i_765_preparer_statement_7b_extend') == 'Y') ? 'Y' : 'N'; ?>" />
								<input type="checkbox" onChange="checkboxValue(this,'i_765_preparer_statement_7b_extend')" <?php echo (showData('i_765_preparer_statement_7b_extend') == 'Y') ? 'checked' : ''; ?>> extends
								
								<input type="hidden" name="i_765_preparer_statement_7b_not_extend" id="i_765_preparer_statement_7b_not_extend" value="<?php echo (showData('i_765_preparer_statement_7b_not_extend') == 'Y') ? 'Y' : 'N'; ?>" />
								<input type="checkbox" onChange="checkboxValue(this,'i_765_preparer_statement_7b_not_extend')" <?php echo (showData('i_765_preparer_statement_7b_not_extend') == 'Y') ? 'checked' : ''; ?>> does not extend beyond the preparation of this application.
							</label>
						</div>
						
						<h5><b>NOTE: If you are an attorney or accredited
						representative, you may be obliged to submit a
						completed Form G-28, Notice of Entry of Appearance
						as Attorney or Accredited Representative, with this
						application.</b></h5>

						<div class="bg-info">
							<h4><b><i>Preparer's Signature</i></b></h4>
						</div>						
						<div class="form-group">
                            <label class="control-label col-md-7">8.b. Date of Birth (mm/dd/yyyy) :</label>
							<div class="col-md-5">
								<input type="date" class="form-control" name="i_765_preparer_sign_date" value="<?php echo showData('i_765_preparer_sign_date')?>" />
							</div>
                        </div>						
					</div><!--end of left side column -->
					
					<div class="col-md-6">

					</div><!--end of right side column -->
				</div>

				<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
				<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
				<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
			</fieldset>
			
			<!----------------------------------------------------------------------
			-------------------------------- page 7 --------------------------------
			------------------------------------------------------------------------>
			
			<fieldset>
				<div class="row">
					<div class="page_number">
						<b><p style="padding-left:1000px;">Page 7 of 7</p></b>
					</div>
					
                    <div class="col-md-6">
						<div class="bg-info">
							<h4><b>Part 6. Additional Information</b></h4>
						</div>
						
                        <p>If you need extra space to provide any additional information
						within this application, use the space below. If you need more
						space than what is provided, you may make copies of this page
						to complete and file with this application or attach a separate
						sheet of paper. Type or print your name and A-Number (if any)
						at the top of each sheet; indicate the <b>Page Number, Part
						Number,</b> and <b>Item Number</b> to which your answer refers; and
						sign and date each sheet.</p>

						<div class="form-group">
							<label class="control-label col-md-5">1.a. Family Name(Last Name):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="i_765_additional_info_last_name" value="<?php echo showData('i_765_additional_info_last_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">1.b. Given Name(First Name):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="i_765_additional_info_first_name" value="<?php echo showData('i_765_additional_info_first_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">1.c. Middle Name:</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="i_765_additional_info_middle_name" value="<?php echo showData('i_765_additional_info_middle_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">2. A-Number (if any) ► A-</label>
							<div class="col-md-7">
								<input type="text" maxlength="9" class="form-control" name="i_765_additional_info_a_number" value="<?php echo showData('i_765_additional_info_a_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.a. Page Number</label>
							<div class="col-md-7">
								<input type="text" maxlength="2" class="form-control" name="i_765_additional_info_3a_page_no" value="<?php echo showData('i_765_additional_info_3a_page_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.b. Part Number</label>
							<div class="col-md-7">
								<input type="text" maxlength="6" class="form-control" name="i_765_additional_info_3b_part_no" value="<?php echo showData('i_765_additional_info_3b_part_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.c. Item Number</label>
							<div class="col-md-7">
								<input type="text" maxlength="342" class="form-control" name="i_765_additional_info_3c_item_no" value="<?php echo showData('i_765_additional_info_3c_item_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span><b>3.d.</b></span>
								<textarea class="form-control" maxlength="6" id="i_765_additional_info_3d" name="i_765_additional_info_3d" rows="8" cols="50"><?php echo showData('i_765_additional_info_3d')?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">4.a. Page Number</label>
							<div class="col-md-7">
								<input type="text" maxlength="2" class="form-control" name="i_765_additional_info_4a_page_no" value="<?php echo showData('i_765_additional_info_4a_page_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">4.b. Part Number</label>
							<div class="col-md-7">
								<input type="text" maxlength="6" class="form-control" name="i_765_additional_info_4b_part_no" value="<?php echo showData('i_765_additional_info_4b_part_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">4.c. Item Number</label>
							<div class="col-md-7">
								<input type="text" maxlength="6" class="form-control" name="i_765_additional_info_4c_item_no" value="<?php echo showData('i_765_additional_info_4c_item_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span><b>4.d.</b></span>
								<textarea class="form-control" maxlength="342" id="i_765_additional_info_4d" name="i_765_additional_info_4d" rows="8" cols="50"><?php echo showData('i_765_additional_info_4d')?></textarea>
							</div>
						</div>
					</div><!--end of left side column -->
                    
                    <div class="col-md-5 col-md-offset-1">
						<div class="form-group">
							<label class="control-label col-md-5">5.a. Page Number</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="2" name="i_765_additional_info_5a_page_no" value="<?php echo showData('i_765_additional_info_5a_page_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">5.b. Part Number</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="6" name="i_765_additional_info_5b_part_no" value="<?php echo showData('i_765_additional_info_5b_part_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">5.c. Item Number</label>
							<div class="col-md-7">
								<input type="text" maxlength="6" class="form-control" name="i_765_additional_info_5c_item_no" value="<?php echo showData('i_765_additional_info_5c_item_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span><b>5.d.</b></span>
								<textarea class="form-control" maxlength="227" id="i_765_additional_info_5d" name="i_765_additional_info_5d" rows="8" cols="50"><?php echo showData('i_765_additional_info_5d')?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">6.a. Page Number</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="2" name="i_765_additional_info_6a_page_no" value="<?php echo showData('i_765_additional_info_6a_page_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">6.b. Part Number</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="6" name="i_765_additional_info_6b_part_no" value="<?php echo showData('i_765_additional_info_6b_part_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">6.c. Item Number</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="6" name="i_765_additional_info_6c_item_no" value="<?php echo showData('i_765_additional_info_6c_item_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span><b>6.d.</b></span>
								<textarea class="form-control" id="i_765_additional_info_6d" maxlength="303" name="i_765_additional_info_6d" rows="8" cols="50"><?php echo showData('i_765_additional_info_6d')?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">7.a. Page Number</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="2" name="i_765_additional_info_7a_page_no" value="<?php echo showData('i_765_additional_info_7a_page_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">7.b. Part Number</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="6" name="i_765_additional_info_7b_part_no" value="<?php echo showData('i_765_additional_info_7b_part_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">7.c. Item Number</label>
							<div class="col-md-7">
								<input type="text" class="form-control" maxlength="6" name="i_765_additional_info_7c_item_no" value="<?php echo showData('i_765_additional_info_7c_item_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span><b>7.d.</b></span>
								<textarea class="form-control" maxlength="342" id="i_765_additional_info_7d" name="i_765_additional_info_7d" rows="8" cols="50"><?php echo showData('i_765_additional_info_7d')?></textarea>
							</div>
						</div>
					</div><!--end of right side column -->
				</div>

				<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
				<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
			</fieldset>

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

/*$(document).on('submit', '#registration_form', function(event){
	event.preventDefault();
	$.ajax({
		url:"fetch.php?formNo=11&<?php echo $getId?>",
		method:'POST',
		data:new FormData(this),
		contentType:false,
		processData:false,
		success:function(data)
		{	
			alert(data);
		}
	}); 
});*/

function checkboxValue(input,output){
	inputValue = input.checked ? "Y" : "N";
	$('#'+output).val(inputValue);
}
</script>