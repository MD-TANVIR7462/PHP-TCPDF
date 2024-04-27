
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>INTAKE FORM G-28</title>

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
		  <h3>Formulario de admisión G-28, Aviso de presentación de comparecencia como abogado o representante acreditado</h3>  
		</div>
		<form id="registration_form" class="form-horizontal" action="#" method="post">
			<input type="hidden" name="id" value="<?php echo $singleData->id?>" />
			<input type="hidden" name="client_id" value="<?php echo $clientId?>" />			
			
			<!----------------------------------------------------------------------
			-------------------------------- page 2 --------------------------------
			------------------------------------------------------------------------>
			
			<fieldset>
				<div class="form-group">
					<div class="row"> 
						<div class="page_number">
							<p style="text-align: right; margin-right:30px"><b>Página 2 de 4</b></p>
						</div>
					</div> 
				</div>
				<div class="row">
					<div class="notice">
						<marquee behavior="" direction=""><h4 ><b>**Nota: La Parte 1 y la Parte 2 se completan con información del abogado.</b> </h4></marquee>
					</div>
					<div class="col-md-5">
						<div class="bg-info">
							<h4><b>Parte 3. Aviso de comparecencia como abogado o representante acreditado</b> </h4>
						</div>
						<h5><b>Si necesita espacio adicional para completar esta sección, utilice el espacio provisto en la Parte 6. Información adicional. </b></h5>
						<h5><b>Esta comparecencia se relaciona con asuntos migratorios anteriores (seleccione solo una casilla):</b></h5>
						<div class="form-group">
							<label class="control-label col-md-12">1.a.
								
								<input type="hidden" name="notice_apperance_as_attorney_or_accredited_reprentative_immegration" id="notice_apperance_as_attorney_or_accredited_reprentative_immegration" 
								value="<?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_immegration') == 'Y') ? 'Y' : 'N'; ?>" />

								<input type="checkbox" onChange="checkboxValue(this,'notice_apperance_as_attorney_or_accredited_reprentative_immegration')" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_immegration') == 'Y') ? 'checked' : ''; ?>>Servicios de Ciudadanía e Inmigración de los Estados Unidos (USCIS)

							</label>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">1.b. Enumere los números de formulario o asunto específico en el que se ingresa la comparecencia.</label>
							<div class="col-md-12" >
								<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_immegration_spececific_matter" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_immegration_spececific_matter')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">2.a.
								
								<input type="hidden" name="us_immigration_and_custom_enforcement" id="us_immigration_and_custom_enforcement" value="<?php echo (showData('us_immigration_and_custom_enforcement') == 'Y') ? 'Y' : 'N'; ?>" />

								<input type="checkbox" onChange="checkboxValue(this,'us_immigration_and_custom_enforcement')" <?php echo (showData('us_immigration_and_custom_enforcement') == 'Y') ? 'checked' : ''; ?>>Servicio de Inmigración y Control de Aduanas de EE. UU. (ICE)
							</label>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">2.b. Enumere el asunto específico en el que se presenta la comparecencia.</label>
							<div class="col-md-12" >
								<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_2b_list_the_specific_matter" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_2b_list_the_specific_matter')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">3.a.
								
								<input type="hidden" name="us_custom_and_border_protection" id="us_custom_and_border_protection" value="<?php echo (showData('us_custom_and_border_protection') == 'Y') ? 'Y' : 'N'; ?>" />

								<input type="checkbox" onChange="checkboxValue(this,'us_custom_and_border_protection')" <?php echo (showData('us_custom_and_border_protection') == 'Y') ? 'checked' : ''; ?>> Aduanas y Protección Fronteriza de EE. UU. (CBP)
							</label>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">3.b. Enumere el asunto específico en el que se presenta la comparecencia..</label>
							<div class="col-md-12" >
								<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_3b_list_the_specific_matter" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_3b_list_the_specific_matter')?>" />
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-12">4. Número de recibo (si corresponde): &#x2B9E; </label>
							<div class="col-md-8 col-md-offset-4">
								 <input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_receipt_number" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_receipt_number')?>" />
							</div>
						</div>


						<div class="form-group">
							<label class="control-label col-md-12">5. Me presento como abogado o representante acreditado a solicitud de (seleccione solo una casilla):
  							 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
								<input type="radio" name="notice_apperance_as_attorney_or_accredited_reprentative_check" value="applicant" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_check') == 'applicant') ? 'checked' : ''; ?>> Applicant &nbsp;
								<input type="radio" name="notice_apperance_as_attorney_or_accredited_reprentative_check" value="petitioner" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_check') == 'petitioner') ? 'checked' : ''; ?>> Petitioner &nbsp; 
								<input type="radio" name="notice_apperance_as_attorney_or_accredited_reprentative_check" value="requester" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_check') == 'requester') ? 'checked' : ''; ?>> Requestor &nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="notice_apperance_as_attorney_or_accredited_reprentative_check" value="benificiary" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_check') == 'benificiary') ? 'checked' : ''; ?>> Beneficiary/Derivative  &nbsp; 
								<input type="radio" name="notice_apperance_as_attorney_or_accredited_reprentative_check" value="respondent" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_check') == 'respondent') ? 'checked' : ''; ?>> Respondent (ICE, CBP)</label>
						</div>

						<div class="bg-info">
							<h4><b>Información sobre el cliente (solicitante, peticionario, solicitante, beneficiario o derivado, demandado o signatario autorizado de una entidad)</b> </h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">6.a. Nombre de familia (Apellido):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_last_name" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_last_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">6.b. Nombre de pila (nombre):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_first_name" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_first_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">6.c. Segundo nombre:</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_middle_name" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_middle_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">7.a. Nombre de la entidad (si corresponde)</label>
							<div class="col-md-12" >
								<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_immegration_name_of_entity_1" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_immegration_name_of_entity_1')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">7.b. Título del firmante autorizado de la entidad (si corresponde) </label>
							<div class="col-md-12" >
								<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_title_of_authorized_signatory" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_title_of_authorized_signatory')?>" />
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-12">8. Número de cuenta en línea de USCIS del cliente (si corresponde) &#x2B9E; </label>
							<div class="col-md-8 col-md-offset-4">
								 <input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_uscis_account_number" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_uscis_account_number')?>" />
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-12">9. Número de registro de extranjero del cliente (Número A) (si corresponde) &#x2B9E; A- </label>
							<div class="col-md-8 col-md-offset-4">
								 <input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_alien_reg_no" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_alien_reg_no')?>" />
							</div>
						</div>

						
					</div><!-- left side column -->

					<div class="col-md-5 col-md-offset-1">
					
					<div class="bg-info">
							<h4><b><i>Información de contacto del cliente</i></b></h4>
					</div>
						<div class="form-group">
							<label class="control-label col-md-12">10. Número de teléfono diurno:</label>
							<div class="col-md-12 ">
								<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_day_time_telephone_number" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_day_time_telephone_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">11. Número de Teléfono Móvil (si lo hubiera): </label>
							<div class="col-md-12 ">
								<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_day_time_mobile_number" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_day_time_mobile_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">12. Dirección de correo electrónico (si corresponde): </label>
							<div class="col-md-12 ">
								<input type="email" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_day_time_eamil_address" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_day_time_eamil_address')?>" />
							</div>
						</div>

						<div class="bg-info">
							<h4><b> Dirección de correo de la cliente</b></h4>
						</div>
						<h5><b>NOTA: Proporcione la dirección postal del cliente. No proporcione la dirección postal comercial del abogado o representante acreditado a menos que sirva como dirección postal segura en la solicitud o petición que se presenta con este Formulario G-28.</b></h5>

						<div class="form-group">
							<label class="control-label col-md-5">13.a. Número y nombre de la calle:</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_street_number" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_street_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-6">13.b.  &nbsp; 
								<input type="radio" name="notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_flr" value="apt" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_flr') == 'apt') ? 'checked' : ''; ?>> Apta. &nbsp;

								<input type="radio" name="notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_flr" value="ste" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp; 

								<input type="radio" name="notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_flr" value="flr" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_flr') == 'flr') ? 'checked' : ''; ?>> piso.:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="interpreter_contact_information_mailing_address_number" value="<?php echo showData('information_about_you_safe_us_physical_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">13.c. Ciudad o pueblo :</label>
							<div class="col-md-7">
								 <input type="text" class="form-control" name="interpreter_contact_information_mailing_address_city_or_town" value="<?php echo showData('interpreter_contact_information_mailing_address_city_or_town')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">13.d. Estado:</label>
							<div class="col-md-7">
								<select class="form-control" name="information_mailing_address_client_state">
									<option style="" value=''>Seleccionar</option>
									<?php
									
									if(showData('information_mailing_address_client_state')!='')
                                            echo"<option value='".showData('information_mailing_address_client_state')."' selected>".showData('information_mailing_address_client_state')."</option>";
										
									foreach ($allDataCountry as $record) {
										echo "<option value='$record->state_code'>$record->state_code</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">13.e. Código postal :</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="interpreter_contact_information_mailing_address_zip" value="<?php echo showData('interpreter_contact_information_mailing_address_zip')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">13.f. Provincia :</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="interpreter_contact_information_mailing_address_province" value="<?php echo showData('interpreter_contact_information_mailing_address_province')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">13.g. Codigo postal :</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="interpreter_contact_information_mailing_address_postel_code" value="<?php echo showData('interpreter_contact_information_mailing_address_postel_code')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">13.h. País :</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="interpreter_contact_information_mailing_address_country" value="<?php echo showData('interpreter_contact_information_mailing_address_country')?>" />
							</div>
						</div>

						<div class="bg-info">
							<h4><b>Parte 4. Consentimiento del Cliente para la Representación y Firma </b></h4>
						</div>
						<div class="bg-info">
							<h4><b><i>Consentimiento para representación y divulgación de información</i> </b></h4>
						</div>
						<h5><b>He solicitado la representación y consentido en ser
representado por el abogado o representante acreditado nombrado
en la Parte 1. de este formulario. Según la Ley de Privacidad de 1974
y política del Departamento de Seguridad Nacional (DHS) de EE. UU., 1
también consiento a la divulgación al abogado designado o
representante acreditado de cualquier registro que me pertenezca y que
aparecer en cualquier sistema de registros de USCIS, ICE o CBP.</b></h5>


					</div><!-- right side column -->
				</div>
				
				<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;">
				<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data">
			</fieldset>
			
			<!----------------------------------------------------------------------
			-------------------------------- page 3 --------------------------------
			------------------------------------------------------------------------>
			
			<fieldset>
                <div class="row">
					<div class="page_number">
						<p style="text-align: right; margin-right:30px"><b>Página 3 de 4</b></p>
					</div>
                    	<div class="col-md-5">
						

							<div class="bg-info">
								<h4><b>Parte 4. Consentimiento del cliente para representación y firma (continuación) </b></h4>
							</div>
							<div class="bg-info">
								<h4><b><i>Opciones con respecto a la recepción de avisos y documentos de USCIS</i> </b></h4>
							</div>
							<h5><b>USCIS enviará avisos tanto a la parte representada (el cliente)
y su abogado o representante acreditado ya sea
a través de correo postal o entrega electrónica. USCIS enviará todos los seguros
Documentos de identidad y Documentos de Viaje a los EE.UU. del cliente.
Dirección de envio.</b></h5>
							<h5><b>Si desea tener avisos y/o documentos de identidad seguros
enviado a su abogado o representante acreditado registrado
en lugar de a usted, seleccione todos los elementos aplicables a continuación.
Usted puede cambiar estas elecciones mediante notificación por escrito a
USCIS.</b></h5>

							<div class="form-group">
								<label class="control-label col-md-12">1.a. 
								<input type="hidden" name="client_consent_to_representation_and_signature_continued_1_a" id="client_consent_to_representation_and_signature_continued_1_a" value="<?php echo (showData('client_consent_to_representation_and_signature_continued_1_a') == 'Y') ? 'Y' : 'N'; ?>" />	
								

								<input type="checkbox" onChange="checkboxValue(this,'client_consent_to_representation_and_signature_continued_1_a')"  <?php echo (showData('client_consent_to_representation_and_signature_continued_1_a') == 'Y') ? 'checked' : ''; ?>>Solicito que USCIS envíe avisos originales sobre una solicitud o petición a la dirección comercial de mi abogado o representante acreditado como se indica en este formulario.
								</label>
							</div>

							<div class="form-group">
								<label class="control-label col-md-12">1.b. 
								<input type="hidden" name="request_that_uscis_send_any_secure_identity" id="request_that_uscis_send_any_secure_identity" value="<?php echo (showData('request_that_uscis_send_any_secure_identity') == 'Y') ? 'Y' : 'N'; ?>" />	
								

								<input type="checkbox" onChange="checkboxValue(this,'request_that_uscis_send_any_secure_identity')"  <?php echo (showData('request_that_uscis_send_any_secure_identity') == 'Y') ? 'checked' : ''; ?>> Solicito que USCIS envíe cualquier documento de identidad seguro
(Tarjeta de Residencia Permanente, Autorización de Empleo
Documento, o Documento de Viaje) que recibo en el
Dirección comercial en EE. UU. de mi abogado o acreditado
representante (o ante un representante militar o diplomático designado)
dirección en un país extranjero (si está permitido)).
								</label>
							</div>

							<h5><b>NOTA: Si su aviso contiene el Formulario I-94, Registro de Llegada y Salida, USCIS enviará el aviso al
Dirección comercial de su abogado o acreditado en los EE. UU.
representante. Si prefieres tener tu formulario
I-94 enviado directamente a usted, seleccione Número de artículo 1.c.
							</b></h5>

							<div class="form-group">
								<label class="control-label col-md-12">1.c. 
								<input type="hidden" name="client_consent_to_representation_and_signature_continued_1_c" id="client_consent_to_representation_and_signature_continued_1_c" value="<?php echo (showData('client_consent_to_representation_and_signature_continued_1_c') == 'Y') ? 'Y' : 'N'; ?>" />	
								

								<input type="checkbox" onChange="checkboxValue(this,'client_consent_to_representation_and_signature_continued_1_c')"  <?php echo (showData('client_consent_to_representation_and_signature_continued_1_c') == 'Y') ? 'checked' : ''; ?>> Solicito que USCIS me envíe mi aviso que contiene el Formulario I-94 a mi dirección postal en los EE. UU.
								</label>
							</div>


							<div class="bg-info">
								<h4><b><i>Firma del cliente o firmante autorizado de una entidad</i> </b></h4>
							</div>

							<div class="form-group">
								<label class="control-label col-md-12">2.a.Firma del Cliente o Firmante Autorizado de una Entidad </label>
								<div class="col-md-12 ">
									<input type="text" class="form-control" disabled name="client_consent_to_representation_and_signature_continued_signature" value="<?php echo showData('client_consent_to_representation_and_signature_continued_signature')?>" />
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-7">2.b. Fecha de la firma (dd/mm/aaaa)</label>
									<div class="col-md-5">
										<input type="date" class="form-control" name="client_consent_to_representation_and_signature_continued_signature_date_of_signature" value="<?php echo showData('client_consent_to_representation_and_signature_continued_signature_date_of_signature')?>" />
									</div>
							</div>
                        </div><!--end column-->  

                        <div class="col-md-5 col-md-offset-1">
                            
							<div class="bg-info">
								<h4><b><i>Parte 5. Firma del Abogado o Representante Acreditado </i> </b></h4>
							</div>
							<h5><b>He leído y entiendo las normas y condiciones.
contenida en 8 CFR 103.2 y 292 que rigen las apariencias y
representación ante el DHS. Declaro bajo pena de perjurio
Según las leyes de los Estados Unidos, la información que tengo
proporcionada en este formulario es verdadera y correcta.</b></h5>
							<div class="form-group">
								<label class="control-label col-md-12">1.a.Firma del Abogado o Representante Acreditado</label>
								<div class="col-md-12 ">
									<input type="text" disabled class="form-control" name="signature_of_attorney_or_accredited_representative_1_a" value="<?php echo showData('signature_of_attorney_or_accredited_representative_1_a')?>" />
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-7">1.b. Fecha de la firma (dd/mm/aaaa) </label>
									<div class="col-md-5">
										<input type="date" class="form-control" name="signature_of_attorney_or_accredited_representative_signature_1_b" value="<?php echo showData('signature_of_attorney_or_accredited_representative_signature_1_b')?>" />
									</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-12">2.a.Firma del Estudiante de Derecho o Licenciado en Derecho </label>
								<div class="col-md-12 ">
									<input type="text" disabled class="form-control" name="signature_of_attorney_or_accredited_representative_2_a" value="<?php echo showData('signature_of_attorney_or_accredited_representative_2_a')?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-7">2.b. Fecha de la firma (dd/mm/aaaa) </label>
									<div class="col-md-5">
										<input type="date" class="form-control" name="signature_of_attorney_or_accredited_representative_signature_2_b" value="<?php echo showData('signature_of_attorney_or_accredited_representative_signature_2_b')?>" />
									</div>
							</div>
                        </div><!--end column-->
                    </div>

				<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
				<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
				<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />				
            </fieldset>
			
			<!----------------------------------------------------------------------
			-------------------------------- page 4 --------------------------------
			------------------------------------------------------------------------>
			
			<fieldset><!-- field set 4 start  -->
				<div class="row">
					<div class="page_number">
						<p style="text-align: right; margin-right:30px"><b>Página 4 de 4</b></p>
					</div>
                    <div class="col-md-5">
						<div class="bg-info">
							<h4><b>Parte 6. Información adicional</b></h4>
						</div>
						
                        <p>Si necesita espacio adicional para proporcionar información adicional
dentro de este formulario, utilice el espacio a continuación. Si necesitas más
espacio del que se proporciona, usted puede hacer copias de esta página
para completar y presentar con este formulario o adjuntar un formulario por separado
hoja de papel. Escriba o imprima su nombre y número A (si corresponde)
en la parte superior de cada hoja; índica el<b>Número de página, parte
Número,</b> y <b>Número de artículo</b> a lo que se refiere su respuesta; y
firmar y fechar cada hoja.</p>

						<div class="form-group">
							<label class="control-label col-md-5">1.a. Nombre de familia (Apellido):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_last_name" value="<?php echo showData('g_28_additional_info_last_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">1.b. Nombre de pila (nombre):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_first_name" value="<?php echo showData('g_28_additional_info_first_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">1.c. Segundo nombre:</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_middle_name" value="<?php echo showData('g_28_additional_info_middle_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">2.a. Número de página</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_2a_page_no" value="<?php echo showData('g_28_additional_info_2a_page_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">2.b. Número de pieza</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_2b_part_no" value="<?php echo showData('g_28_additional_info_2b_part_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">2.c. Número de artículo</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_2c_item_no" value="<?php echo showData('g_28_additional_info_2c_item_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span><b>2.d.</b></span>
								<textarea class="form-control" id="g_28_additional_info_2d" name="g_28_additional_info_2d" rows="8" cols="50"><?php echo showData('g_28_additional_info_2d')?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.a. Número de página</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_3a_page_no" value="<?php echo showData('g_28_additional_info_3a_page_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.b. Número de pieza</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_3b_part_no" value="<?php echo showData('g_28_additional_info_3b_part_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">3.c. Número de artículo</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_3c_item_no" value="<?php echo showData('g_28_additional_info_3c_item_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span><b>3.d.</b></span>
								<textarea class="form-control" id="g_28_additional_info_3d" name="g_28_additional_info_3d" rows="8" cols="50"><?php echo showData('g_28_additional_info_3d')?></textarea>
							</div>
						</div>
					</div><!--end column-->
                    
                    <div class="col-md-5 col-md-offset-1">
						<div class="form-group">
							<label class="control-label col-md-5">4.a. Número de página</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_4a_page_no" value="<?php echo showData('g_28_additional_info_4a_page_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">4.b. Número de pieza</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_4b_part_no" value="<?php echo showData('g_28_additional_info_4b_part_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">4.c. Número de artículo</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_4c_item_no" value="<?php echo showData('g_28_additional_info_4c_item_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span><b>4.d.</b></span>
								<textarea class="form-control" id="g_28_additional_info_4d" name="g_28_additional_info_4d" rows="8" cols="50"><?php echo showData('g_28_additional_info_4d')?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">5.a. Número de página</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_5a_page_no" value="<?php echo showData('g_28_additional_info_5a_page_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">5.b. Número de pieza</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_5b_part_no" value="<?php echo showData('g_28_additional_info_5b_part_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">5.c. Número de artículo</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_5c_item_no" value="<?php echo showData('g_28_additional_info_5c_item_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span><b>5.d.</b></span>
								<textarea class="form-control" id="g_28_additional_info_5d" name="g_28_additional_info_5d" rows="8" cols="50"><?php echo showData('g_28_additional_info_5d')?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">6.a. Número de página</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_6a_page_no" value="<?php echo showData('g_28_additional_info_6a_page_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">6.b. Número de pieza</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_6b_part_no" value="<?php echo showData('g_28_additional_info_6b_part_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">6.c. Número de artículo</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="g_28_additional_info_6c_item_no" value="<?php echo showData('g_28_additional_info_6c_item_no')?>" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span><b>6.d.</b></span>
								<textarea class="form-control" id="g_28_additional_info_6d" name="g_28_additional_info_6d" rows="8" cols="50"><?php echo showData('g_28_additional_info_6d')?></textarea>
							</div>
						</div>
					</div><!--end column-->
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

$(document).on('submit', '#registration_form', function(event){
	event.preventDefault();
	$.ajax({
		url:"fetch.php?formNo=13&<?php echo $getId?>",
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

function checkboxValue(input,output){
	inputValue = input.checked ? "Y" : "N";
	$('#'+output).val(inputValue);
}
</script>