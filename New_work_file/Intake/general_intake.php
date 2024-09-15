<?php
require_once '../index/header.php';
$objSettings 		= new \App\settings\settings();
$objAllDataQuery 	= new \App\dataTableQuery\dataTableQuery();
$pageHeading 		= "General Intake";
?>
<style>
	body {
		text-transform: none;
	}

	.bg-info>h4 {
		padding: 8px;
	}

	.form-horizontal .control-label {
		text-align: left;
	}

	.setpage>.panel-info>.panel-heading>.panel-title {
		float: left;
		padding: 5px 15px;
	}

	.panel-heading:after {
		clear: both;
	}

	.panel-heading:before,
	.panel-heading:after {
		content: " ";
		display: table;
	}

	.panel-heading>.panel-options {
		float: right;
		padding-right: 15px;
	}

	#registration_form .panel-group .panel .panel-heading h4 a:before {
		position: relative;
		content: '\e87a';
		display: inline-block;
		font-family: "Entypo";
		color: rgba(115, 120, 129, 0.7);
		padding: 10px 15px;
		padding: 0;
		float: right;
		font-size: 17px;
		margin-left: 13px;
		top: 0px;
		-webkit-transition: all 300ms ease-in-out;
		-moz-transition: all 300ms ease-in-out;
		-o-transition: all 300ms ease-in-out;
		transition: all 300ms ease-in-out;
	}

	#registration_form .panel-group .panel .panel-heading h4 a.collapsed:before {
		-webkit-transform: rotate(180deg);
		-moz-transform: rotate(180deg);
		-ms-transform: rotate(180deg);
		-o-transform: rotate(180deg);
		transform: rotate(180deg);
	}

	/* Start Google TranslateElement */
	iframe {
		display: none;
	}

	.fixed-con {
		z-index: 9724790009779558 !important;
		background-color: #f7f8fc;
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		overflow-y: auto;
	}

	.VIpgJd-ZVi9od-aZ2wEe-wOHMyf {
		z-index: 9724790009779 !important;
		top: 0;
		left: unset;
		right: -5px;
		display: none !important;
		border-radius: 50%;
		border: 2px solid gold;
	}

	.VIpgJd-ZVi9od-aZ2wEe-OiiCO {
		width: 80px;
		height: 80px;
	}

	/*hide google translate link | logo | banner-frame */
	.goog-logo-link,
	.gskiptranslate,
	.goog-te-gadget span,
	.goog-te-banner-frame,
	#goog-gt-tt,
	.goog-te-balloon-frame,
	div#goog-gt- {
		display: none !important;
	}

	.goog-te-gadget {
		color: transparent !important;
		font-size: 0px;
	}

	#google_translate_element,
	.goog-te-gadget {
		display: inline;
	}

	.goog-text-highlight {
		background: none !important;
		box-shadow: none !important;
	}

	/*google translate Dropdown */

	#google_translate_element select {
		background: #f6edfd;
		color: #383ffa;
		border: 1px solid #e9cdff;
		border-radius: 3px;
		padding: 6px 8px
	}

	.goog-te-banner-frame.skiptranslate,
	.goog-te-gadget-icon {
		display: none !important;
	}

	body {
		top: 0px !important;
	}

	.goog-tooltip {
		display: none !important;
	}

	.goog-tooltip:hover {
		display: none !important;
	}

	.goog-text-highlight {
		background-color: transparent !important;
		border: none !important;
		box-shadow: none !important;
	}

	/* End Google TranslateElement */
</style>
<h3 style="margin:20px 0px;">
	<i class="entypo-right-circled"></i> <?php echo $pageHeading ?>
	<div id="google_translate_element"></div>
</h3>
<hr />

<div class="row">
	<div class="col-md-12">
		<form id="registration_form" class="form-horizontal" action="#" method="post">
			<input type="hidden" name="id" value="<?php echo $singleData->id ?>" />
			<input type="hidden" name="client_id" value="<?php echo $clientId ?>" />
			<div class="tabs-vertical-env">
				<ul class="nav tabs-vertical">
					<li class="active"><a href="#tabI94" data-toggle="tab">I-94 Information</a></li>
					<li><a href="#tabPersonal" data-toggle="tab">Personal Information</a></li>
					<li><a href="#tabAddress" data-toggle="tab">Address Information</a></li>
					<li><a href="#tabParents" data-toggle="tab">Parents Information</a></li>
					<li><a href="#tabSpouse" data-toggle="tab">Spouse / Children</a></li>
					<li><a href="#tabEmployment" data-toggle="tab">Employment Information</a></li>
					<li><a href="#tabPetitioner" data-toggle="tab">Petitioner Information</a></li>
					<li><a href="#tabAttorney" data-toggle="tab">Attorney Information</a></li>
				</ul>
				<div class="tab-content">

					<!----------------------------------------------------------------------
					-------------------------------- page 1 --------------------------------
					------------------------------------------------------------------------>

					<div class="tab-pane  fade in active" id="tabI94">
						<fieldset class="setpage">
							<div class="panel panel-info">
								<div class="panel-heading">
									<div class="panel-title">I-94 Information</div>
									<div class="panel-options">
										<input type="submit" name="submit" class="submit btn btn-success" value="Save" />
									</div>
								</div>
								<div class="panel-body">
									<?php include 'include/general_inake/i_94_information.php'?>
								</div>
							</div>
						</fieldset>
					</div>

					<!----------------------------------------------------------------------
					-------------------------------- page 2 --------------------------------
					------------------------------------------------------------------------>

					<div class="tab-pane" id="tabPersonal">
						<fieldset class="setpage">
							<div class="panel panel-info">
								<div class="panel-heading">
									<div class="panel-title">Personal Information</div>
									<div class="panel-options">
										<input type="submit" name="submit" class="submit btn btn-success" value="Save" />
									</div>
								</div>
								<div class="panel-body">
									<?php include 'include/general_inake/personal_information.php'?>
								</div>
							</div>
						</fieldset>
					</div>

					<!----------------------------------------------------------------------
					-------------------------------- page 3 --------------------------------
					------------------------------------------------------------------------>

					<div class="tab-pane" id="tabAddress">
						<fieldset class="setpage">
							<div class="panel panel-info">
								<div class="panel-heading">
									<div class="panel-title">Address Information</div>
									<div class="panel-options">
										<input type="submit" name="submit" class="submit btn btn-success" value="Save" />
									</div>
								</div>
								<div class="panel-body">
									<?php include 'include/general_inake/address_information.php'?>
								</div>
							</div>
						</fieldset>
					</div>

					<!----------------------------------------------------------------------
					-------------------------------- page 4 --------------------------------
					------------------------------------------------------------------------>

					<div class="tab-pane" id="tabParents">
						<fieldset class="setpage">
							<div class="panel panel-info">
								<div class="panel-heading">
									<div class="panel-title">Parents Information</div>
									<div class="panel-options">
										<input type="submit" name="submit" class="submit btn btn-success" value="Save" />
									</div>
								</div>
								<div class="panel-body">
									<?php include 'include/general_inake/parents_information.php'?>
								</div>
							</div>
						</fieldset>
					</div>

					<!----------------------------------------------------------------------
					-------------------------------- page 5 --------------------------------
					------------------------------------------------------------------------>

					<div class="tab-pane" id="tabSpouse">
						<fieldset class="setpage">
							<div class="panel panel-info">
								<div class="panel-heading">
									<div class="panel-title">Spouse / Children Information</div>
									<div class="panel-options">
										<input type="submit" name="submit" class="submit btn btn-success" value="Save" />
									</div>
								</div>
								<div class="panel-body">
									<?php include 'include/general_inake/spouse_children_information.php'?>
								</div>
							</div>
						</fieldset>
					</div>

					<!----------------------------------------------------------------------
					-------------------------------- page 6 --------------------------------
					------------------------------------------------------------------------>

					<div class="tab-pane" id="tabEmployment">
						<fieldset class="setpage">
							<div class="panel panel-info">
								<div class="panel-heading">
									<div class="panel-title">Employment Information</div>
									<div class="panel-options">
										<input type="submit" name="submit" class="submit btn btn-success" value="Save" />
									</div>
								</div>
								<div class="panel-body">
									<?php include 'include/general_inake/employment_information.php'?>
								</div>
							</div>
						</fieldset>
					</div>

					<!----------------------------------------------------------------------
					-------------------------------- page 7 --------------------------------
					------------------------------------------------------------------------>

					<div class="tab-pane" id="tabPetitioner">
						<fieldset class="setpage">
							<div class="panel panel-info">
								<div class="panel-heading">
									<div class="panel-title">Petitioner Information</div>
									<div class="panel-options">
										<input type="submit" name="submit" class="submit btn btn-success" value="Save" />
									</div>
								</div>
								<div class="panel-body">
									<?php include 'include/general_inake/petitioner_information.php'?>
								</div>
							</div>
						</fieldset>
					</div>
					
					<!----------------------------------------------------------------------
					-------------------------------- page 8 --------------------------------
					------------------------------------------------------------------------>

					<div class="tab-pane" id="tabAttorney">
						<fieldset class="setpage">
							<div class="panel panel-info">
								<div class="panel-heading">
									<div class="panel-title">Attorney Information <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="I-102,I-130,I-485,I-765,I-918"></i></div>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-4">
											<label class="control-label" for="attorney">Volag Number:</label><br>
											<input type="text" class="form-control" value="<?php echo $attorneyData->volag_number ?>" disabled="">
										</div>
										<div class="col-md-4">
											<label class="control-label">Attorney State Bar Number:</label><br>
											<input type="text" class="form-control" value="<?php echo $attorneyData->bar_number ?>" disabled="">
										</div>
										<div class="col-md-4">
											<label class="control-label">Attorney USCIS Online Account Number:</label><br>
											<input type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number ?>" disabled="">
										</div>
									</div>
								</div>
							</div>
						</fieldset>
					</div>

				</div>
			</div>
		</form>
	</div>
</div>

<!-- Footer -->
<?php include '../index/footer.php' ?>

<script type="text/javascript">
function checkboxValue(input, output) {
	inputValue = input.checked ? "Y" : "N";
	$('#' + output).val(inputValue);
}

function googleTranslateElementInit() {
	new google.translate.TranslateElement({
		pageLanguage: 'en',
		autoDisplay: 'true',
		includedLanguages: '<?php echo $transIncLan ?>',
		layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
	}, 'google_translate_element');
}

$(document).on('submit', '#registration_form', function(event) {
	event.preventDefault();
	$("html, body").animate({
		scrollTop: 0
	}, 800);
	$.ajax({
		url: "fetch.php?formNo=<?php echo $formNo ?>&<?php echo $getId ?>",
		method: 'POST',
		data: new FormData(this),
		contentType: false,
		processData: false,
		success: function(data) {
			// alert(data);
			toastr.success(data);
			// console.log(data);
		}
	});
});
</script>
<script src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>