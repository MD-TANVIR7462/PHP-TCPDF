<?php

if(isset($singleDataNote->father_name)) $father_name = $singleDataNote->father_name;
if(isset($singleDataNote->nombore_del_clienty)) $nombore_del_clienty = $singleDataNote->nombore_del_clienty;
if(isset($singleDataNote->client_date)) $client_date = $singleDataNote->client_date;
if(isset($singleDataNote->direction)) $direction = $singleDataNote->direction;
if(isset($singleDataNote->telephono)) $telephono = $singleDataNote->telephono;
if(isset($singleDataNote->dolar_amount)) $dolar_amount = $singleDataNote->dolar_amount;
if(isset($singleDataNote->caso)) $caso = $singleDataNote->caso;
if(isset($singleDataNote->costo)) $costo = $singleDataNote->costo;
if(isset($singleDataNote->goverment_fees)) $goverment_fees = $singleDataNote->goverment_fees;
if(isset($singleDataNote->anticipa)) $anticipa = $singleDataNote->anticipa;
if(isset($singleDataNote->balance)) $balance = $singleDataNote->balance;
if(isset($singleDataNote->payment_plan)) $payment_plan = $singleDataNote->payment_plan;
if(isset($singleDataNote->fess_amount)) $fess_amount = $singleDataNote->fess_amount;

?>

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
                border-radius: 5px;
                background: #fff;
                box-shadow: 0 0 20px 0 #095484;
            }

            input:hover,
            select:hover {
                border: 1px solid transparent;
                box-shadow: 0 0 6px 0 #095484;
                color: #095484;
            }

            hr {
                max-width: 980px;
                height: 2px;
            }

            .bottom_hr {
                max-width: 130px;
            }
        </style>
        <title>Office Contract Form</title>
    </head>
    <body>
        <div class="container" style="padding: 20px;">
            <!-- <h1></h1>
	<div class="progress">
		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
	</div> -->

            <form id="registration_form" class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $singleData->id?>" />
                <input type="hidden" name="client_id" value="<?php echo $clientId?>" />

                <div class="text-center">
                    <p>CONTRATO AL CLIENTE</p>
                    <p>Maria A. Barnett, Attorney at law</p>
                    <p>RETAINER/CONTRATO AL CLIENTE</p>
                </div>
                <hr class="bg-primary" />

                <div class="form-group">
                    <label class="control-label col-md-3" for="nombore_del_clienty">NOMBRE DEL CLIENTE :</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="nombore_del_clienty" value="<?php echo $nombore_del_clienty?>" />
                    </div>
                    <label class="control-label col-md-1" for="client_date">DATE :</label>
                    <div class="col-md-2">
                        <input type="date" class="form-control" name="client_date" value="<?php echo $client_date?>" />
                    </div>
                </div>
                <br />
                <div class="form-group">
                    <label class="control-label col-md-3" for="direction"> DIRECCION :</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="direction" value="<?php echo $direction?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3" for="telephono"> TELEFONO :</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="telephono" value="<?php echo $telephono?>" />
                    </div>
                </div>
                <div class="form-group text-left">
                    <div class="col-md-10 col-md-offset-1">
                        <label for="">
                            De acuerdo a nuestra conversacion y sus honestos declaraciones hacia mi, usted esta formalmente informado que estamos de acuerdo en tomar su representacion. Estaran trabajando en su representacion con la abogada
                            Maria Barnett. Ademas el paralegal de la oficina trabajara activamente en su caso y puede enviarle cartas o hacerle llamadas por telefono. Para el efecto de al representacion recibiremos $ _
                            <br />
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="dolar_amount" value="<?php echo $dolar_amount?>" />
                            </div>
                            para asegurar nuestra disponibilidad para trabajar diligentemente en su caso. Este dinero es propiedad de los abogados. ("engagement retainer") Nuestra representacion consistira en asistirlo en el siguiente caso:
                        </label>
                    </div>
                </div>
                <br />
                <div class="form-group">
                    <label class="control-label col-md-3" for="caso">Caso :</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="caso" value="<?php echo $caso?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3" for="costo"> Costo :</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="costo" value="<?php echo $costo?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="goverment_fees">Fees del Gobierno :</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="goverment_fees" value="<?php echo $goverment_fees?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="anticipa"> Anticipa : .</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="anticipa" value="<?php echo $anticipa?>" />
                    </div>
                    <label class="control-label col-md-1" for="balance">Balance :</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="balance" value="<?php echo $balance?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="payment_plan">Payment plan : .</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="payment_plan" value="<?php echo $payment_plan?>" />
                    </div>
                </div>
                <br />
                <div class="form-group text-left">
                    <div class="col-md-10 col-md-offset-1">
                        <label for="">
                            Los pagos se haran de acuerdo al schedule A adjunto a este contrato. En su caso Habra un cargo de $ _
                            <br />
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="fess_amount" value="<?php echo $fess_amount?>" />
                            </div>
                            por traducciones, llamadas telefonicas, envios por correo, fotocopias y creation y archivo de su carpeta. Nos reservamos el derecho de no enviar el caso a Inmigraciones por falta de pago. PAGOS ATRASADOS: Habra
                            un recargo de $ 50 por cada semana de atraso aunque sea por un solo dia, AUDIENCES Y ENTREVISTAS: se pagaran 10 dias antes de la cita.
                        </label>
                    </div>
                </div>
                <br/>

                <div class="form-group text-left">
                    <div class="col-md-10 col-md-offset-1">
                        <label for="">
                            A pesar de enviar todos los documentos requeridos, a veces lnmigraciones pide masinformacion sobre el caso o documentos. No adelantamos que este pedido.sea hecho en sucaso, pero si un "Request for Evidence" es
                            hecho en su caso habra un .cargo de $ 750 porcontestarlo y poner junta la informacion que es requerida de usted. Las entrevistas yaudiencias en corte deben ser pagadas previamente a la cita. Si la entrevista o
                            audiencia sesuspende por la carte o el servicio de lnmigraciones y el Abogado isistio a la cita, esa citatiene su cargo regular.
                            <br />

                            El cliente se compromete a colaborar activamente en su caso y seguir las citas, entrevistaso audiencias que hayan en su caso; a proporcionar la evidencia y documentos requeridos ya mantener actualizada su
                            informacion.

                            <br />
                            <br />

                            El cliente esta notificado de que los abogados pueden renunciar a la representacion si elcliente o otra persona responsable por los pagos Calla en los pagos o no respeta el acuerdoo da falsa informacion en
                            coneccion con el caso. Si el cliente termina la representacion elcliente u otra persona encargada de los pagos debera pagar el trabajo realizado hasta el diade termination a un precio por hora($ 350 por hora).
                            Considerado por hora el costo delcaso puede ser mayor que el fee initial establecido.
                            <br />
                            <br />
                            DEVOLUClONES: se retornara la procion no usada de los aranceles pagados menos lashoras trabajadas en el caso .
                            <br />
                            <br />
                            No podemos garantizar el resultado de ningun caso pero es nuestro compromiso el utilizarnuestros mejores esfUerzos y conocimientos en la materia para obtener los mejoresresultados posibles y terrninar felizmente
                            nuestro trabajo. Si el trabajo debiera hacersenuevamente habra un precio adicional pero bajo acuerdo de ambas partes.
                        </label>
                    </div>
                </div>

                <br />
                <br />
                <br />
                <br />

                <div class="form-group">
                    <div class="col-md-2 col-md-offset-1">
                        <hr class="bg-primary" />
                    </div>
                    <div class="col-md-3 col-md-offset-5">
                        <hr class="bg-primary" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 col-md-offset-1">
                        Firma del cliente o su.agente
                    </div>
                    <div class="col-md-3 col-md-offset-4">
                        Maria Barnett, EsqAttorneys at Law78-05 /79-13 Roosevelt Ave,-Jackson Heights, NY 11372
                    </div>
                </div>
                <div class="" style="padding-bottom: 30px;">
                   <input style="float: right;" type="submit" name="submit" class="submit btn btn-sm btn-success" value="Save" id="submit_data" /> 
                </div>
                
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
		url:"fetch.php?formNo=4&<?php echo $getId?>",
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
