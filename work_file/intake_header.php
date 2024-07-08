<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title><?php echo $meta_title?></title>
<meta name="google" content="notranslate"/>
<meta name="robots" content="noindex,nofollow">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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

.form-group {
    margin-right: 0px!important;
    margin-left: 5px!important;
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
/* .d-flexible {
	display: flex;
	align-items: baseline;
	gap: 1rem;
	margin-left: 100px;
	margin-top: 37px;
} */
.d-flexible {
	display: flex;
	align-items: baseline;
	gap: 1rem;
}
.d-flexible-floating {
	display: flex;
	align-items: baseline;
	justify-content: space-between;
	margin: 0 5px;
}
table {
	width: 100%;
	border: 1px solid black;
}
th, td {
	width: 5%;
	border: 1px solid black;
	text-align: center;
	border-collapse: collapse;
}

iframe {
	display: none;
}
.fixed-con {
    z-index: 9724790009779558!important;
    background-color: #f7f8fc;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow-y: auto;
}
.VIpgJd-ZVi9od-aZ2wEe-wOHMyf{
    z-index: 9724790009779!important;
    top:0;
    left:unset;
    right:-5px;
    display:none!important;
    border-radius:50%;
    border:2px solid gold;
}
.VIpgJd-ZVi9od-aZ2wEe-OiiCO{
    width:80px;
    height:80px;
}
/*hide google translate link | logo | banner-frame */
.goog-logo-link,.gskiptranslate,.goog-te-gadget span,.goog-te-banner-frame,#goog-gt-tt, .goog-te-balloon-frame,div#goog-gt-{
    display: none!important;
}
.goog-te-gadget {
    color: transparent!important;
    font-size:0px;
}

#google_translate_element, .goog-te-gadget {
	display: inline;	
}

.goog-text-highlight {
    background: none !important;
    box-shadow: none !important;
}

/*google translate Dropdown */

#google_translate_element select{
    background:#f6edfd;
    color:#383ffa;
    border: 1px solid #e9cdff;
    border-radius:3px;
    padding:6px 8px
}

.goog-te-banner-frame.skiptranslate, .goog-te-gadget-icon {
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
.toast-message {
	color: #fff;
}
</style>
</head>
<body>
	<div class="container" style="padding: 20px;">
		<div class="progress">
			<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
		<div CLASS="text-center">
		  <h3><?php echo $page_heading?> &nbsp;&nbsp; <div id="google_translate_element"></div></h3>  
		</div>
		<form id="registration_form" class="form-horizontal" action="#" method="post">
			<input type="hidden" name="id" value="<?php echo $singleData->id?>" />
			<input type="hidden" name="client_id" value="<?php echo $clientId?>" />