
<?php 
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>
<div class="container" style="padding: 20px;">
    <h1></h1>
	<div class="progress">
		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
	
    <form id="regiration_form" class="form-horizontal" method="post">
        <div class="text-center">
            <img src="KB_Image.jpg" alt="KBLAW IMAGE">
            <h4><b><?php echo $userData->name?> </h4></p>
            <p><?php echo $userData->address?></p>
            <h3>CLIENT INTAKE FORM</h3>
        </div>       
		<input type="hidden" name="id" value="<?php echo $singleData->id?>" />
		<input type="hidden" name="client_id" value="<?php echo $clientId?>" />
        
    <fieldset>
            <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
            <h3>Step 1 Of 4</h3>
            
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-2" for="create_date">Date:</label>
                        <div class="col-md-3">
                           <input type="date" class="form-control" name="create_date" id="create_date" value="<?php echo showData("create_date")?>">
                        </div>

                        <label class="control-label col-md-2" for="referred by">Referred by:</label>
                        <div class="col-md-3">
                           <input type="text" class="form-control" name="referred_by" id="referred_by" value="<?php echo showData("referred_by")?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-2" for="name">Name:</label>
                        <div class="col-md-3">
                           <input type="text" class="form-control" name="name" id="name" value="<?php echo showData("name")?>">
                        </div>
                        
                        <label class="control-label col-md-2" for="address">Address:</label>
                        <div class="col-md-3">
                           <input type="text" class="form-control" name="address" id="address" value="<?php echo showData("address")?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-2" for="telephone">Tel(cell):</label>
                        <div class="col-md-3">
                           <input type="text" class="form-control" name="telephone" id="telephone" value="<?php echo showData("telephone")?>">
                        </div>
                        
                        <label class="control-label col-md-2" for="other">(Other):</label>
                        <div class="col-md-3">
                           <input type="text" class="form-control" name="other" id="other" value="<?php echo showData("other")?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-2" for="date of birth">Date Of Birth:</label>
                        <div class="col-md-3">
                           <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="<?php echo showData("date_of_birth")?>">
                        </div>
                        
                        <label class="control-label col-md-2" for="place of birth">Place Of Birth:</label>
                        <div class="col-md-3">
                           <input type="text" class="form-control" name="place_of_birth" id="place_of_birth" value="<?php echo showData("place_of_birth")?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-2" for="nationality">Nationality:</label>
                        <div class="col-md-3">
                           <input type="text" class="form-control" name="nationality" id="nationality" value="<?php echo showData("nationality")?>">
                        </div>
                        
                        <label class="control-label col-md-2" for="email">Email:</label>
                        <div class="col-md-3">
                           <input type="text" class="form-control" name="email" id="email" value="<?php echo showData("email")?>">
                        </div>
                    </div>
                </div>

                <div class="text-center bg-info">
                    <h4>Immigration History</h4>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-3" for="first enter ">When did you first enter the U.S.? :</label>
                        <div class="col-md-2">
                           <input type="text" class="form-control" name="your_first_enter_us" id="your_first_enter_us" value="<?php echo showData("your_first_enter_us")?>">
                        </div>
                        
                        <label class="control-label col-md-3" for="when last time">When was the last time?:</label>
                        <div class="col-md-2">
                           <input type="text" class="form-control" name="when_was_last_time" id="when_was_last_time" value="<?php echo showData("when_was_last_time")?>">
                        </div>
                    </div>
                </div>

                 <div class="">
                    <h4>How did you enter the last time?</h4>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="form-check form-check-inline col-md-3 col-md-offset-1">
                        <input class="form-check-input" type="checkbox" id="visa" name="visa" value="visa" <?php echo (showData("visa") =='visa')? 'checked':''?> />
                        <label class="form-check-label" for="visa">Visa :</label>
                        </div>
                        
                        <div class="col-md-4">
                           <input type="text" class="form-control" name="visa_detail" id="visa_detail" value="<?php echo showData("visa_detail")?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="form-check form-check-inline col-md-3 col-md-offset-1">
                        <input class="form-check-input" type="checkbox" id="no_papers" name="no_papers" value="no_papers" <?php echo (showData("no_papers") =='no_papers')? 'checked':''?>/>
                        <label class="form-check-label" for="no_papers">No papers, but at a check point:</label>
                        </div>
                        
                        <div class="col-md-4">
                           <input type="text" class="form-control" name="no_paper_detail" id="no_paper_detail" value="<?php echo showData("no_paper_detail")?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="form-check form-check-inline col-md-3 col-md-offset-1">
                        <input class="form-check-input" type="checkbox" id="not_inspect" name="not_inspect" value="not_inspect" <?php echo (showData("not_inspect") =='not_inspect')? 'checked':''?>/>
                        <label class="form-check-label" for="not_inspect">Not inspected/other:</label>
                        </div>
                        
                        <div class="col-md-4">
                           <input type="text" class="form-control" name="not_inspect_detail" id="not_inspect_detail" value="<?php echo showData("not_inspect_detail")?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <h4 class="col-md-10 col-md-offset-1">List all entries to and exits from the U.S. (Give dates, and whether or not you went through an immigration inspection upon those entries.)</h4>
                </div>

                <div class="text-center">
                <table class=" table table-bordered table-striped ">
                    <thead class="thead-dark">
                    <tr>
                    <td><h4>SL#</h4></td>
                    <td><h4>Entry</h4></td> 
                    <td><h4>Exit</h4></td> 
                    <td><h4>Inspected by immigration authorities?</h4></td> 
                    <td><h4>If yes, what status (visa) did you have on entry?</h4></td> 
                    <td><h4>When did authorized stay expire?</h4></td> 
                    </tr>  
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><input class="form-control" type="text" name="enry[]"  value="<?php echo showData("enry")[0]?>"></td>
                            <td><input class="form-control" type="text" name="exit[]"  value="<?php echo showData("exit")[0]?>"></td>
                            <td><input class="form-control" type="text" name="inspected_by[]"  value="<?php echo showData("inspected_by")[0]?>"></td>
                            <td><input class="form-control" type="text" name="status[]"  value="<?php echo showData("status")[0]?>"></td>
                            <td><input class="form-control" type="text" name="when_did_expire[]" value="<?php echo showData("when_did_expire")[0]?>"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><input class="form-control" type="text" name="enry[]" value="<?php echo showData("enry")[1]?>"></td>
                            <td><input class="form-control" type="text" name="exit[]"  value="<?php echo showData("exit")[1]?>"></td>
                            <td><input class="form-control" type="text" name="inspected_by[]" value="<?php echo showData("inspected_by")[1]?>"></td>
                            <td><input class="form-control" type="text" name="status[]"   value="<?php echo showData("status")[1]?>"></td>
                            <td><input class="form-control" type="text" name="when_did_expire[]" value="<?php echo showData("when_did_expire")[1]?>"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><input class="form-control" type="text" name="enry[]" value="<?php echo showData("enry")[2]?>"></td>
                            <td><input class="form-control" type="text" name="exit[]"  value="<?php echo showData("exit")[2]?>"></td>
                            <td><input class="form-control" type="text" name="inspected_by[]" value="<?php echo showData("inspected_by")[2]?>"></td>
                            <td><input class="form-control" type="text" name="status[]" value="<?php echo showData("status")[2]?>"></td>
                            <td><input class="form-control" type="text" name="when_did_expire[]" value="<?php echo showData("when_did_expire")[2]?>"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><input class="form-control" type="text" name="enry[]" value="<?php echo showData("enry")[3]?>"></td>
                            <td><input class="form-control" type="text" name="exit[]"  value="<?php echo showData("exit")[3]?>"></td>
                            <td><input class="form-control" type="text" name="inspected_by[]"  value="<?php echo showData("inspected_by")[3]?>"></td>
                            <td><input class="form-control" type="text" name="status[]"  value="<?php echo showData("status")[3]?>"></td>
                            <td><input class="form-control" type="text" name="when_did_expire[]" value="<?php echo showData("when_did_expire")[3]?>"></td>
                        </tr>
                    </tbody>
                </table>
        </div>
        <p><i>(Make a copy of any visas and I-94s)</i></p>


		    <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float:right" />
    </fieldset>



    <fieldset>
            <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
            <h3>Step 2 Of 4</h3>


             <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-5" for="">What problems have brought you here to this office? What do you hope that the advocate can do about those problems?:</label>
                        <div class="col-md-5">
                           <textarea class="form-control" name="what_is_your_hope" cols="65" rows="4"><?php echo showData("what_is_your_hope")?></textarea>
                        </div>
                    </div>
            </div>

            <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-5" for="remove_order">Have you ever been ordered removed or deported from the U.S.?:</label>
                        <div class="form-check form-check-inline col-md-5">
                        <input class="form-check-input" type="radio" name="remove_order" id="remove_order1" value="yes" <?php echo (showData("remove_order") =='yes')? 'checked':''?>/>
                        <label class="form-check-label" for="remove_order1">Yes</label>
                        <br>
                        <input class="form-check-input" type="radio" name="remove_order" id="remove_order2" value="no" <?php echo (showData("remove_order") =='no')? 'checked':''?>/>
                        <label class="form-check-label" for="remove_order2">No</label>
                        </div>
                    </div>
            </div>


             <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-5" for="immigration_court">Have you ever been in immigration court? :</label>
                        <div class="form-check-inline col-md-5">
                        <input class="form-check-input" type="radio" name="immigration_court" id="immigration_court1" value="yes" <?php echo (showData("immigration_court") =='yes')? 'checked':''?>/>
                        <label class="form-check-label" for="immigration_court1">Yes</label>
                        <br>
                        <input class="form-check-input" type="radio" name="immigration_court" id="immigration_court2" value="no" <?php echo (showData("immigration_court") =='no')? 'checked':''?>/>
                        <label class="form-check-label" for="immigration_court2">No</label>
                        </div>
                    </div>
            </div>

            <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-5" for="immigration_court">Have you ever been stopped by immigration officials?:</label>
                        <div class="form-check-inline col-md-5">
                        <input class="form-check-input" type="radio" name="immigration_stoped_officia" id="immigration_stoped_officia1" value="yes" <?php echo (showData("immigration_stoped_officia") =='yes')? 'checked':''?>/>
                        <label class="form-check-label" for="immigration_stoped_officia1">Yes</label>
                        <br>
                        <input class="form-check-input" type="radio" name="immigration_stoped_officia" id="immigration_stoped_officia2" value="no" <?php echo (showData("immigration_stoped_officia") =='no')? 'checked':''?>/>
                        <label class="form-check-label" for="immigration_stoped_officia2">No</label>
                        </div>
                    </div>
            </div>

            <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-5" for="">If yes to any of the above, please describe:</label>
                        <div class="col-md-5">
                           <textarea class="form-control" name="any_above_describe" cols="65" rows="4"><?php echo showData("what_is_your_hope")?><?php echo showData("any_above_describe")?></textarea>
                        </div>
                    </div>
            </div>

            <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-5" for="">Have you ever applied for any immigration benefit? (Examples: Permanent residency, asylum, amnesty, TPS, cancellation, suspension, Family Unity, DACA, visa petition, U visa, T visa, SIJS, or any other immigration benefit). If so, please tell us when and what types of paperwork:</label>
                        <div class="col-md-5">
                           <textarea class="form-control" name="ever_applyed_immigration_benefit" cols="65" rows="4"><?php echo showData("what_is_your_hope")?><?php echo showData("ever_applyed_immigration_benefit")?></textarea>
                        </div>
                    </div>
            </div>

            <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-5" for="">What was the result? :</label>
                        <div class="col-md-5">
                           <textarea class="form-control" name="what_was_the_result" cols="65" rows="4"><?php echo showData("what_was_the_result")?></textarea>
                        </div>
                    </div>
            </div>

            <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-5" for="any_paper_work_your_behalf">Has any paperwork been filed on your behalf? (Visa petition by family?): </label>
                        <div class="form-check-inline col-md-5">
                        <input class="form-check-input" type="radio" name="any_paper_work_your_behalf" id="any_paper_work_your_behalf1" value="yes" <?php echo (showData("any_paper_work_your_behalf") =='yes')? 'checked':''?>/>
                        <label class="form-check-label" for="any_paper_work_your_behalf1">Yes</label>
                        <br>
                        <input class="form-check-input" type="radio" name="any_paper_work_your_behalf" id="any_paper_work_your_behalf2" value="no" <?php echo (showData("any_paper_work_your_behalf") =='no')? 'checked':''?>/>
                        <label class="form-check-label" for="any_paper_work_your_behalf2">No</label>
                        </div>
                    </div>
            </div>

            <div class="bg-info">
               <h3>Family</h3>
            </div>

            <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-5" for="were_parent_us_citizen">Were your parent(s) or your grandparents U.S. citizens?: </label>
                        <div class="form-check-inline col-md-5">
                        <input class="form-check-input" type="radio" name="were_parent_us_citizen" id="were_parent_us_citizen1" value="yes" <?php echo (showData("were_parent_us_citizen") =='yes')? 'checked':''?> />
                        <label class="form-check-label" for="were_parent_us_citizen1">Yes</label>
                        <br>
                        <input class="form-check-input" type="radio" name="were_parent_us_citizen" id="were_parent_us_citizen2" value="no"  <?php echo (showData("were_parent_us_citizen") =='no')? 'checked':''?>/>
                        <label class="form-check-label" for="were_parent_us_citizen2">No</label>
                        </div>
                    </div>
            </div>

            <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-5" for="are_you_married">Are you married?:</label>
                        <div class="form-check-inline col-md-5">
                        <input class="form-check-input" type="radio" name="are_you_married" id="are_you_married1" value="yes" <?php echo (showData("are_you_married") =='yes')? 'checked':''?>/>
                        <label class="form-check-label" for="are_you_married1">Yes</label>
                        <br>
                        <input class="form-check-input" type="radio" name="are_you_married" id="are_you_married2" value="no"  <?php echo (showData("are_you_married") =='no')? 'checked':''?>/>
                        <label class="form-check-label" for="are_you_married2">No</label>
                        </div>
                    </div>
            </div>

            <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-5" for="">When and where? :</label>
                        <div class="col-md-5">
                           <textarea class="form-control" name="when_and_where" cols="65" rows="4"><?php echo showData("when_and_where")?></textarea>
                        </div>
                    </div>
            </div>

            <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-5" for="">Name of spouse, status, date married: </label>
                        <div class="col-md-5">
                           <textarea class="form-control" name="spouse_name_status_date_married" cols="65" rows="4"><?php echo showData("spouse_name_status_date_married")?></textarea>
                        </div>
                    </div>
            </div>

            <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-5" for="">Name of previous spouse, status, and date marriage ended :</label>
                        <div class="col-md-5">
                           <textarea class="form-control" name="previous_spouse_name_status_date_end" cols="65" rows="4"><?php echo showData("previous_spouse_name_status_date_end")?></textarea>
                        </div>
                    </div>
            </div>



     <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
     <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float:right" />
    </fieldset>

    <fieldset>
        <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
        <h3>Step 3 Of 4</h3>

        <div class="form-group">
            <div class="row">
                <label class="control-label col-md-5" for="do_you_have_children">Do you have children?:</label>
                <div class="form-check-inline col-md-5">
                <input class="form-check-input" type="radio" name="do_you_have_children" id="do_you_have_children1" value="yes" <?php echo (showData("do_you_have_children") =='yes')? 'checked':''?>/>
                <label class="form-check-label" for="do_you_have_children1">Yes</label>
                <br>
                <input class="form-check-input" type="radio" name="do_you_have_children" id="do_you_have_children2" value="no" <?php echo (showData("do_you_have_children") =='no')? 'checked':''?>/>
                <label class="form-check-label" for="do_you_have_children2">No</label>
                </div>
            </div>
        </div>

        <div class="">
            <h4>If so, provide the following information:</h4>
        </div>

        <div class="text-center">
                <table class=" table table-bordered table-striped ">
                    <thead class="thead-dark">
                    <tr>
                    <td><h4>SL#</h4></td>
                    <td><h4>Children</h4></td> 
                    <td><h4>Date and Place of Birth</h4></td> 
                    <td><h4>Immigration status</h4></td> 
                    <td><h4>In U.S. now?</h4></td> 
                    </tr>  
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><input class="form-control" type="text" name="children[]"  value="<?php echo showData("children")[0]?>"></td>
                            <td><input class="form-control" type="text" name="child_date_place_birth[]"  value="<?php echo showData("child_date_place_birth")[0]?>"></td>
                            <td><input class="form-control" type="text" name="child_immigration_status[]"  value="<?php echo showData("child_immigration_status")[0]?>"></td>
                            <td><input class="form-control" type="text" name="child_in_us_now[]"  value="<?php echo showData("child_in_us_now")[0]?>"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><input class="form-control" type="text" name="children[]" value="<?php echo showData("children")[1]?>"></td>
                            <td><input class="form-control" type="text" name="child_date_place_birth[]"  value="<?php echo showData("child_date_place_birth")[1]?>"></td>
                            <td><input class="form-control" type="text" name="child_immigration_status[]" value="<?php echo showData("child_immigration_status")[1]?>"></td>
                            <td><input class="form-control" type="text" name="child_in_us_now[]"   value="<?php echo showData("child_in_us_now")[1]?>"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><input class="form-control" type="text" name="children[]" value="<?php echo showData("children")[2]?>"></td>
                            <td><input class="form-control" type="text" name="child_date_place_birth[]"  value="<?php echo showData("child_date_place_birth")[2]?>"></td>
                            <td><input class="form-control" type="text" name="child_immigration_status[]" value="<?php echo showData("child_immigration_status")[2]?>"></td>
                            <td><input class="form-control" type="text" name="child_in_us_now[]" value="<?php echo showData("child_in_us_now")[2]?>"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><input class="form-control" type="text" name="children[]" value="<?php echo showData("children")[3]?>"></td>
                            <td><input class="form-control" type="text" name="child_date_place_birth[]"  value="<?php echo showData("child_date_place_birth")[3]?>"></td>
                            <td><input class="form-control" type="text" name="child_immigration_status[]"  value="<?php echo showData("child_immigration_status")[3]?>"></td>
                            <td><input class="form-control" type="text" name="child_in_us_now[]"  value="<?php echo showData("child_in_us_now")[3]?>"></td>
                        </tr>
                    </tbody>
                </table>
        </div>


        <div class="form-group">
            <div class="row">
                <label class="control-label col-md-5" for="do_you_have_family_member_us">Do you have any other family members in the U.S.?:</label>
                <div class="form-check-inline col-md-5">
                <input class="form-check-input" type="radio" name="do_you_have_family_member_us" id="do_you_have_family_member_us1" value="yes" <?php echo (showData("do_you_have_family_member_us") =='yes')? 'checked':''?>/>
                <label class="form-check-label" for="do_you_have_family_member_us1">Yes</label>
                <br>
                <input class="form-check-input" type="radio" name="do_you_have_family_member_us" id="do_you_have_family_member_us2" value="no" <?php echo (showData("do_you_have_family_member_us") =='no')? 'checked':''?>/>
                <label class="form-check-label" for="do_you_have_family_member_us2">No</label>
                </div>
            </div>
        </div>


        <div class="text-center">
                <table class=" table table-bordered table-striped ">
                    <thead class="thead-dark">
                    <tr>
                    <td><h4>SL#</h4></td>
                    <td><h4>Name</h4></td> 
                    <td><h4>Relation</h4></td> 
                    <td><h4>Immigration status</h4></td> 
                    <td><h4>In U.S. now?</h4></td> 
                    </tr>  
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><input class="form-control" type="text" name="family_member_name[]"  value="<?php echo showData("family_member_name")[0]?>"></td>
                            <td><input class="form-control" type="text" name="family_member_relation[]"  value="<?php echo showData("family_member_relation")[0]?>"></td>
                            <td><input class="form-control" type="text" name="family_member_status[]"  value="<?php echo showData("family_member_status")[0]?>"></td>
                            <td><input class="form-control" type="text" name="family_member_in_us_now[]"  value="<?php echo showData("family_member_in_us_now")[0]?>"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><input class="form-control" type="text" name="family_member_name[]" value="<?php echo showData("family_member_name")[1]?>"></td>
                            <td><input class="form-control" type="text" name="family_member_relation[]"  value="<?php echo showData("family_member_relation")[1]?>"></td>
                            <td><input class="form-control" type="text" name="family_member_status[]" value="<?php echo showData("family_member_status")[1]?>"></td>
                            <td><input class="form-control" type="text" name="family_member_in_us_now[]"   value="<?php echo showData("family_member_in_us_now")[1]?>"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><input class="form-control" type="text" name="family_member_name[]" value="<?php echo showData("family_member_name")[2]?>"></td>
                            <td><input class="form-control" type="text" name="family_member_relation[]"  value="<?php echo showData("family_member_relation")[2]?>"></td>
                            <td><input class="form-control" type="text" name="family_member_status[]" value="<?php echo showData("family_member_status")[2]?>"></td>
                            <td><input class="form-control" type="text" name="family_member_in_us_now[]" value="<?php echo showData("family_member_in_us_now")[2]?>"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><input class="form-control" type="text" name="family_member_name[]" value="<?php echo showData("family_member_name")[3]?>"></td>
                            <td><input class="form-control" type="text" name="family_member_relation[]"  value="<?php echo showData("family_member_relation")[3]?>"></td>
                            <td><input class="form-control" type="text" name="family_member_status[]"  value="<?php echo showData("family_member_status")[3]?>"></td>
                            <td><input class="form-control" type="text" name="family_member_in_us_now[]"  value="<?php echo showData("family_member_in_us_now")[3]?>"></td>
                        </tr>
                    </tbody>
                </table>
        </div>

        <div class="">
            <h4>Employment in U.S. -- Dates and types of employment, name & address of employer :</h4>
        </div>

        <div class="text-center">
                <table class=" table table-bordered table-striped ">
                    <thead class="thead-dark">
                    <tr>
                    <td><h4>SL#</h4></td>
                    <td><h4>Name of Employer</h4></td> 
                    <td><h4>Address of Employer</h4></td> 
                    <td><h4>Type of Employment</h4></td> 
                    <td><h4>Period of Employment</h4></td> 
                    <td><h4>Work authorized?</h4></td> 
                    </tr>  
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><input class="form-control" type="text" name="name_of_employer[]"  value="<?php echo showData("name_of_employer")[0]?>"></td>
                            <td><input class="form-control" type="text" name="address_of_employer[]"  value="<?php echo showData("address_of_employer")[0]?>"></td>
                            <td><input class="form-control" type="text" name="type_of_employement[]"  value="<?php echo showData("type_of_employement")[0]?>"></td>
                            <td><input class="form-control" type="text" name="period_of_employement[]"  value="<?php echo showData("period_of_employement")[0]?>"></td>
                            <td><input class="form-control" type="text" name="work_authorized[]"  value="<?php echo showData("work_authorized")[0]?>"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><input class="form-control" type="text" name="name_of_employer[]"  value="<?php echo showData("name_of_employer")[1]?>"></td>
                            <td><input class="form-control" type="text" name="address_of_employer[]"  value="<?php echo showData("address_of_employer")[1]?>"></td>
                            <td><input class="form-control" type="text" name="type_of_employement[]"  value="<?php echo showData("type_of_employement")[1]?>"></td>
                            <td><input class="form-control" type="text" name="period_of_employement[]"  value="<?php echo showData("period_of_employement")[1]?>"></td>
                            <td><input class="form-control" type="text" name="work_authorized[]"  value="<?php echo showData("work_authorized")[1]?>"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><input class="form-control" type="text" name="name_of_employer[]"  value="<?php echo showData("name_of_employer")[2]?>"></td>
                            <td><input class="form-control" type="text" name="address_of_employer[]"  value="<?php echo showData("address_of_employer")[2]?>"></td>
                            <td><input class="form-control" type="text" name="type_of_employement[]"  value="<?php echo showData("type_of_employement")[2]?>"></td>
                            <td><input class="form-control" type="text" name="period_of_employement[]"  value="<?php echo showData("period_of_employement")[2]?>"></td>
                            <td><input class="form-control" type="text" name="work_authorized[]"  value="<?php echo showData("work_authorized")[2]?>"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><input class="form-control" type="text" name="name_of_employer[]"  value="<?php echo showData("name_of_employer")[3]?>"></td>
                            <td><input class="form-control" type="text" name="address_of_employer[]"  value="<?php echo showData("address_of_employer")[3]?>"></td>
                            <td><input class="form-control" type="text" name="type_of_employement[]"  value="<?php echo showData("type_of_employement")[3]?>"></td>
                            <td><input class="form-control" type="text" name="period_of_employement[]"  value="<?php echo showData("period_of_employement")[3]?>"></td>
                            <td><input class="form-control" type="text" name="work_authorized[]"  value="<?php echo showData("work_authorized")[3]?>"></td>
                        </tr>
                    </tbody>
                </table>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="control-label col-md-5" for="">Have you ever had trouble with the police or been arrested in the U.S.? If so when and for what? What sentence did you receive? :</label>
                <div class="col-md-5">
                    <textarea class="form-control" name="have_you_arrested_or_trouble_polish" cols="65" rows="4"><?php echo showData("have_you_arrested_or_trouble_polish")?></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="control-label col-md-5" for="">Do you have any reason to fear going back to your country? Who do you fear and why? :</label>
                <div class="col-md-5">
                    <textarea class="form-control" name="do_you_have_reason_fear_going_back" cols="65" rows="4"><?php echo showData("do_you_have_reason_fear_going_back")?></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="control-label col-md-5" for="ever_victim_domestic_abuse">Have you ever been a victim of domestic abuse by a spouse, parent or child? :</label>
                <div class="form-check-inline col-md-5">
                <input class="form-check-input" type="radio" name="ever_victim_domestic_abuse" id="ever_victim_domestic_abuse1" value="yes" <?php echo (showData("ever_victim_domestic_abuse") =='yes')? 'checked':''?>/>
                <label class="form-check-label" for="ever_victim_domestic_abuse1">Yes</label>
                <br>
                <input class="form-check-input" type="radio" name="ever_victim_domestic_abuse" id="ever_victim_domestic_abuse2" value="no" <?php echo (showData("ever_victim_domestic_abuse") =='no')? 'checked':''?>/>
                <label class="form-check-label" for="ever_victim_domestic_abuse2">No</label>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <label class="control-label col-md-5" for="threatened_or_harmed_by_spouse">Have you ever been threatened or harmed by a spouse, parent or child? :</label>
                <div class="form-check-inline col-md-5">
                <input class="form-check-input" type="radio" name="threatened_or_harmed_by_spouse" id="threatened_or_harmed_by_spouse1" value="yes" <?php echo (showData("threatened_or_harmed_by_spouse") =='yes')? 'checked':''?>/>
                <label class="form-check-label" for="threatened_or_harmed_by_spouse1">Yes</label>
                <br>
                <input class="form-check-input" type="radio" name="threatened_or_harmed_by_spouse" id="threatened_or_harmed_by_spouse2" value="no" <?php echo (showData("threatened_or_harmed_by_spouse") =='no')? 'checked':''?>/>
                <label class="form-check-label" for="threatened_or_harmed_by_spouse2">No</label>
                </div>
            </div>
        </div>



      <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
      <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float:right" />
    </fieldset>

     <fieldset>
            <h3>Step 4 of 4</h3>
             
            
        <div class="form-group">
            <div class="row">
                <label class="control-label col-md-5" for="your_spouse_child_parent_us_parmanent_residence">If so, did your spouse, parent or child have U.S. citizenship status or lawful permanent residency?:</label>
                <div class="form-check-inline col-md-5">
                <input class="form-check-input" type="radio" name="your_spouse_child_parent_us_parmanent_residence" id="your_spouse_child_parent_us_parmanent_residence1" value="yes" <?php echo (showData("your_spouse_child_parent_us_parmanent_residence") =='yes')? 'checked':''?>/>
                <label class="form-check-label" for="your_spouse_child_parent_us_parmanent_residence1">Yes</label>
                <br>
                <input class="form-check-input" type="radio" name="your_spouse_child_parent_us_parmanent_residence" id="your_spouse_child_parent_us_parmanent_residence2" value="no" <?php echo (showData("your_spouse_child_parent_us_parmanent_residence") =='no')? 'checked':''?>/>
                <label class="form-check-label" for="your_spouse_child_parent_us_parmanent_residence2">No</label>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <label class="control-label col-md-5" for="have_you_ever_been_victime_crime">Have you ever been the victim of a crime?:</label>
                <div class="form-check-inline col-md-5">
                <input class="form-check-input" type="radio" name="have_you_ever_been_victime_crime" id="have_you_ever_been_victime_crime1" value="yes"  <?php echo (showData("have_you_ever_been_victime_crime") =='yes')? 'checked':''?>/>
                <label class="form-check-label" for="have_you_ever_been_victime_crime1">Yes</label>
                <br>
                <input class="form-check-input" type="radio" name="have_you_ever_been_victime_crime" id="have_you_ever_been_victime_crime2" value="no" <?php echo (showData("have_you_ever_been_victime_crime") =='no')? 'checked':''?>/>
                <label class="form-check-label" for="have_you_ever_been_victime_crime2">No</label>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <label class="control-label col-md-5" for=""> If so, what crime? :</label>
                <div class="col-md-5">
                    <textarea class="form-control" name="if_so_what_crime" cols="65" rows="4"><?php echo showData("if_so_what_crime")?></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="control-label col-md-5" for="report_police_criminal_investigation">If so, did you report it to the police or help with the criminal investigation or prosecution?:</label>
                <div class="form-check-inline col-md-5">
                <input class="form-check-input" type="radio" name="report_police_criminal_investigation" id="report_police_criminal_investigation1" value="yes" <?php echo (showData("report_police_criminal_investigation") =='yes')? 'checked':''?>/>
                <label class="form-check-label" for="report_police_criminal_investigation1">Yes</label>
                <br>
                <input class="form-check-input" type="radio" name="report_police_criminal_investigation" id="report_police_criminal_investigation2" value="no" <?php echo (showData("report_police_criminal_investigation") =='no')? 'checked':''?>/>
                <label class="form-check-label" for="report_police_criminal_investigation2">No</label>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <label class="control-label col-md-5" for="anyone_recruit_home_country_us">Did anyone recruit you in your home country to work in the United States?:</label>
                <div class="form-check-inline col-md-5">
                <input class="form-check-input" type="radio" name="anyone_recruit_home_country_us" id="anyone_recruit_home_country_us1" value="yes" <?php echo (showData("anyone_recruit_home_country_us") =='yes')? 'checked':''?>/>
                <label class="form-check-label" for="anyone_recruit_home_country_us1">Yes</label>
                <br>
                <input class="form-check-input" type="radio" name="anyone_recruit_home_country_us" id="anyone_recruit_home_country_us2" value="no" <?php echo (showData("anyone_recruit_home_country_us") =='no')? 'checked':''?>/>
                <label class="form-check-label" for="anyone_recruit_home_country_us2">No</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="control-label col-md-5" for="did_fell_force_work_trick">Did you feel forced to work or tricked into working?:</label>
                <div class="form-check-inline col-md-5">
                <input class="form-check-input" type="radio" name="did_fell_force_work_trick" id="did_fell_force_work_trick1" value="yes" <?php echo (showData("did_fell_force_work_trick") =='yes')? 'checked':''?>/>
                <label class="form-check-label" for="did_fell_force_work_trick1">Yes</label>
                <br>
                <input class="form-check-input" type="radio" name="did_fell_force_work_trick" id="did_fell_force_work_trick2" value="no" <?php echo (showData("did_fell_force_work_trick") =='no')? 'checked':''?>/>
                <label class="form-check-label" for="did_fell_force_work_trick2">No</label>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <label class="control-label col-md-5" for="where_require_work_without_pay">Were you required to work without pay? (or less pay than allowed or expected)?:</label>
                <div class="form-check-inline col-md-5">
                <input class="form-check-input" type="radio" name="where_require_work_without_pay" id="where_require_work_without_pay1" value="yes"  <?php echo (showData("where_require_work_without_pay") =='yes')? 'checked':''?>/>
                <label class="form-check-label" for="where_require_work_without_pay1">Yes</label>
                <br>
                <input class="form-check-input" type="radio" name="where_require_work_without_pay" id="where_require_work_without_pay2" value="no" <?php echo (showData("where_require_work_without_pay") =='no')? 'checked':''?>/>
                <label class="form-check-label" for="where_require_work_without_pay2">No</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="control-label col-md-5" for="have_you_abandoned_neglacted_abuse_parent">Have you been abandoned, abused, or neglected by a parent? :</label>
                <div class="form-check-inline col-md-5">
                <input class="form-check-input" type="radio" name="have_you_abandoned_neglacted_abuse_parent" id="have_you_abandoned_neglacted_abuse_parent1" value="yes" <?php echo (showData("have_you_abandoned_neglacted_abuse_parent") =='yes')? 'checked':''?>/>
                <label class="form-check-label" for="have_you_abandoned_neglacted_abuse_parent1">Yes</label>
                <br>
                <input class="form-check-input" type="radio" name="have_you_abandoned_neglacted_abuse_parent" id="have_you_abandoned_neglacted_abuse_parent2" value="no" <?php echo (showData("have_you_abandoned_neglacted_abuse_parent") =='no')? 'checked':''?>/>
                <label class="form-check-label" for="have_you_abandoned_neglacted_abuse_parent2">No</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label class="control-label col-md-5" for="currently_under_jurisdiction_juvenile">Are you
currently under the jurisdiction of a juvenile court (dependency, delinquency or probate guardianship)? :</label>
                <div class="form-check-inline col-md-5">
                <input class="form-check-input" type="radio" name="currently_under_jurisdiction_juvenile" id="currently_under_jurisdiction_juvenile1" value="yes" <?php echo (showData("currently_under_jurisdiction_juvenile") =='yes')? 'checked':''?>/>
                <label class="form-check-label" for="currently_under_jurisdiction_juvenile1">Yes</label>
                <br>
                <input class="form-check-input" type="radio" name="currently_under_jurisdiction_juvenile" id="currently_under_jurisdiction_juvenile2" value="no" <?php echo (showData("currently_under_jurisdiction_juvenile") =='no')? 'checked':''?>/>
                <label class="form-check-label" for="currently_under_jurisdiction_juvenile2">No</label>
                </div>
            </div>
        </div>

        <div class="bg-info">
            <h3><b><u>Attorney Notes: </u></b></h3>
        </div>

        <div class="text-center">
            <h4>SCREENING REMINDERS </h4>
        </div>

       <div>
            <h4>If Undocumented:</h4>
            <ul style="margin-left: 40px;">
                <li>If parent a USC, screen for possible derivative or acquired citizenship.</li>
                <li>If LPR or USC parent, spouse, child, sibling, screen for possible adjustment or consular process options.</li>
                <li>If harmed in home country, screen for asylum and related relief.</li>
                <li>If harmed in the U.S., screen for VAWA and U visa.</li>
                <li>If a victim of a crime, screen for VAWA, U visa, and T visa.</li>
                <li>If family member is in the military, screen for parole-in-place and naturalization for military.</li>
                <li>If under 21, screen for possible SIJS.</li>
                <li>If brought to work in U.S. or forced into commercial sex act, screen for T visa.</li>
                <li>If TPS country, check list here: <a href="https://www.uscis.gov/humanitarian/temporary-protected-status#Countries%20Currently%20Designated%20for%20TPS">www.uscis.gov/humanitarian/temporary-protected- status#Countries%20Currently%20Designated%20for%20TPS</a>,<br>screen for possible TPS or late registration.</li>
                <li>If been here at least 10 years and has LPR or USC spouse, child, or parent, screen for cancellation of removal for non- LPRs (and suspension if only conviction before April 1, 1997).</li>
                <li>If from El Salvador and entered the U.S. by Sept. 19, 1990 or Guatemala and entered by Oct. 1, 1990, screen for NACARA. Screen children if parents entered by the above dates.</li>
                
            </ul>
        </div>

         <div>
            <h4>For LPRs:</h4>
            <ul style="margin-left: 40px;">
                <li>Screen for naturalization.</li>
                <li>If parent is a USC or can become a USC by the time client turns 18, screen for derivation.</li>
                <li>If parent or grandparent a USC, screen for acquisition.</li>
                <li>If potential deportation:
                    <ul>
                        <li>Cancellation of removal; and prior 212(c)</li>
                    </ul>
                </li>
                <li>If fear of harm in home country, screen for asylum, CAT, withholding</li>
                <li>If any family members in status, screen for possible re-adjustment as defense</li>
            </ul>
        </div>

                
            <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
            <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
            <br>
     </fieldset>

	</form>
  </div>

    <?php 
    include 'footer.php';
    ?>

	
</body>
</html>