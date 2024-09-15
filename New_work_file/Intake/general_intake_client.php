<?php
$meta_title 	= "GENERAL INTAKE FORM";
$page_heading 	= "GENERAL INTAKE FORM";
include "intake_header.php";
?>
<link rel="stylesheet" href="../../resources/assets/css/font-icons/entypo/css/entypo.css">
<style>
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
</style>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">	
	<p style="text-align:right;"><b>Page 1 of 7</b></p>	
	<?php include 'include/general_inake/i_94_information.php'?>	
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">	
	<p style="text-align:right;"><b>Page 2 of 7</b></p>	
	<?php include 'include/general_inake/personal_information.php'?>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">	
	<p style="text-align:right;"><b>Page 3 of 7</b></p>	
	<?php include 'include/general_inake/address_information.php'?>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">	
	<p style="text-align:right;"><b>Page 4 of 7</b></p>	
	<?php include 'include/general_inake/parents_information.php'?>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">	
	<p style="text-align:right;"><b>Page 5 of 7</b></p>	
	<?php include 'include/general_inake/spouse_children_information.php'?>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 6 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">	
	<p style="text-align:right;"><b>Page 6 of 7</b></p>	
	<?php include 'include/general_inake/employment_information.php'?>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 7 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">	
	<p style="text-align:right;"><b>Page 7 of 7</b></p>	
	<?php include 'include/general_inake/petitioner_information.php'?>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<?php include "intake_footer.php" ?>