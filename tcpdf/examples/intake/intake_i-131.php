<?php
$meta_title     =   "INTAKE FORM I-131";
$page_heading   =   "INTAKE FORM I-131, Application for Travel Documents, Parole Documents, and Arrival/Departure Records ";
include "intake_header.php";
?>
<style>
    .my-5 {
        margin: 3% 0 3% 0;
    }

    .my-4 {
        margin: 1.5% 0 1.5% 0;
    }

    .mx-5 {
        margin: 0 2% 0 3.5%;
    }

    .mx-4 {
        margin: 0 1.5% 0 1.5%;
    }

    .mr-3 {
        margin: 0 3% 0 0%;
    }

    .ml-2 {
        margin: 0 1% 0 0%;
    }

    .my-1 {
        margin: 6px 0 0 0;
    }

    .mb-2 {
        margin-bottom: 20px;
    }

    .d-flex {
        display: flex;
    }

    .text-bold {
        font-weight: 600;

    }
</style>
<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 12</b></p>
    <table>
        <thead>
            <tr>
                <th style="padding: 5px; text-align: center;" colspan="3" class="bg-info">
                    To be completed by an attorney or accredited representative (if any).
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 5px">
                    <label class="control-label">
                        <?php echo createCheckbox("i_864_g_28_box") ?> Fill in box if G-28 is attached to represent the applicant.
                    </label>
                </td>

            </tr>
        </tbody>
    </table>

    <div class="row">
        <div class="col-md-12">
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Part 1. Application Type</b></h4>
            </div>

            <div class="form-group">
                <b>Select the application type below</b>
            </div>
            <div class="bg-info" style="margin-top:10px;">
                <h4><b><i>Reentry Permit</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1. <?php echo createCheckbox("i_864_petitioner_status") ?>
                    I am a lawful permanent resident or conditional permanent resident of the United States, and I am applying for a reentry
                    permit.</label>
            </div>
            <div class="bg-info" style="margin-top:10px;">
                <h4><b><i>Refugee Travel Document </i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. <?php echo createCheckbox("i_864_alien_status") ?>
                    I now hold refugee or asylee status in the United States, and I am applying for a Refugee Travel Document. </label>

            </div>

            <div class="form-group">
                <label class="control-label col-md-12">3. <?php echo createCheckbox("i_864_ownership_status") ?>
                    I am a lawful permanent resident as a direct result of refugee or asylee status, and I am applying for a Refugee Travel
                    Document.
                </label>
            </div>
            <div class="bg-info" style="margin-top:10px;">
                <h4><b><i>Travel Authorization Document (for Temporary Protected Status (TPS) beneficiaries who are inside the
                            United States)</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. <?php echo createCheckbox("i_864_substitute_sponsor") ?>
                    I am a TPS beneficiary in the United States, and I am applying for a TPS Travel Authorization Document under the
                    Immigration and Nationality Act (INA) section 244(f)(3) to allow me to seek admission under TPS upon my return from
                    abroad. The receipt number for my last approved Form I-821, Application for Temporary Protected Status, is: </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                        value="<?php echo showData('i_864_substitute_relation') ?>">
                </div>
            </div>
            <div class="bg-info" style="margin-top:10px;">
                <h4 class=""><b><i>Advance Parole Document (for aliens who are inside the United States) and Advance Permission to Travel
                            for Commonwealth of Northern Mariana Islands (CNMI) Long-Term Residents</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start; margin-bottom: 20px;">
                    <span style="width: 30px; flex-shrink: 0;">5.</span>
                    <span style="flex: 1;">
                    I am located inside the United States, and I am applying for an Advance Parole Document to allow me to seek parole into the
                    United States under INA section 212(d)(5)(A) upon my return from abroad based on:
                    </span>
                </label>
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">A.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        A pending Form I-485, Application to Register Permanent Residence or Adjust Status, receipt number if you are
                        filing this form separately from your Form I-485:
                    </span>
                </label>
                <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                    <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                        value="<?php echo showData('i_864_substitute_relation') ?>">
                </div>
            </div>

        </div>
    </div>

    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px;">
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;">
</fieldset> -->
<!----------------------------------------------------------------------
   -------------------------------- page 2 --------------------------------
   ------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
    <p style="text-align: right"><b>Page 2 of 12</b></p>
    <div class="row ">
        <div class="col-md-12">
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Part 1. Application Type </b> (continued)</h4>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">B.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        A pending Form I-589, Application for Asylum and for Withholding of Removal, receipt number:
                    </span>
                </label>
                <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                    <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                        value="<?php echo showData('i_864_substitute_relation') ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">C.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        A pending initial Form I-821, Application for Temporary Protected Status, receipt number:
                    </span>
                </label>
                <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                    <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                        value="<?php echo showData('i_864_substitute_relation') ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">D.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        Deferred Enforced Departure.
                    </span>
                </label>

            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">E.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        Approved Form I-821D, Consideration of Deferred Action for Childhood Arrivals, receipt number:
                    </span>
                </label>
                <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                    <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                        value="<?php echo showData('i_864_substitute_relation') ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">F.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        An approved Form I-914, Application for T Nonimmigrant Status, or Form I-914, Supplement A, Application for
                        Family Member of T-1 Recipient, receipt number:
                    </span>
                </label>
                <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                    <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                        value="<?php echo showData('i_864_substitute_relation') ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">G.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        An approved Form I-918, Petition for U Nonimmigrant Status, or Form I-918, Supplement A, Petition for
                        Qualifying Family Member of U-1 Recipient, receipt number:
                    </span>
                </label>
                <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                    <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                        value="<?php echo showData('i_864_substitute_relation') ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">H.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        Being a current parolee under INA section 212(d)(5), under class of admission:
                    </span>
                </label>
                <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                    <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                        value="<?php echo showData('i_864_substitute_relation') ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">I.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        An approved Form I-817, Application for Family Unity Benefits, receipt number:
                    </span>
                </label>
                <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                    <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                        value="<?php echo showData('i_864_substitute_relation') ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">J.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        A pending Form I-687, Application for Status as a Temporary Resident Under Section 245A of the Immigration and
                        Nationality Act, receipt number:
                    </span>
                </label>
                <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                    <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                        value="<?php echo showData('i_864_substitute_relation') ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">K.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        An approved V Nonimmigrant Status, receipt number:
                    </span>
                </label>
                <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                    <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                        value="<?php echo showData('i_864_substitute_relation') ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">L.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        CNMI long-term residence, receipt number:
                    </span>
                </label>
                <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                    <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                        value="<?php echo showData('i_864_substitute_relation') ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">M.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        Other (provide explanation):
                    </span>
                </label>
                <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                    <textarea class="form-control" rows="5" name="i_864_substitute_relation"
                        value="<?php echo showData('i_864_substitute_relation') ?>"> </textarea>
                </div>
            </div>

            <div class="bg-info" style="margin-top:10px;">
                <h4><b><i>Initial Parole Document (for aliens who are currently outside the United States)</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start; margin-bottom: 20px;">
                    <span style="width: 30px; flex-shrink: 0;">5.</span>
                    <span style="flex: 1;">
                        I am applying for a parole document under INA section 212(d)(5)(A) on my own behalf and I am outside the United States, or I
                        am applying on behalf of someone else who is outside the United States, for the first time (initial application) under one of the
                        following specific parole programs or processes:
                    </span>
                </label>
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">A.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        Filipino World War II Veterans Parole (FWVP) Program, Form I-130 receipt number:
                    </span>
                </label>
                <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                    <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                        value="<?php echo showData('i_864_substitute_relation') ?>">
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
  -------------------------------- page 3 ------------------------------
  ---------------------------------------------------------------------->
<!-- <fieldset class="setpage">
    <p style="text-align: right"><b>Page 3 of 14</b></p>
    <div class="row ">
        <div class="col-md-12">
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Part 1. Application Type </b> (continued)</h4>
            </div>


            <div style="margin-left: 40px;">
                <div class="form-group">
                    <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                        <span style="width: 30px; flex-shrink: 0;">B.</span>
                        <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                        <span style="flex: 1;">
                            Immigrant Military Members and Veterans Initiative (IMMVI)
                        </span>
                    </label>
                </div>
                <div style="margin-left: 30px;">
                    <div class="form-group">
                        <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                            <span style="width: 30px; flex-shrink: 0;">1.</span>
                            <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                            <span style="flex: 1;">
                                A current or former service member.
                            </span>
                        </label>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                            <span style="width: 30px; flex-shrink: 0;">2.</span>
                            <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                            <span style="flex: 1;">
                                A current spouse, child, or unmarried son or daughter (or their child under 21 years of age) of a current or
                                former service member.
                            </span>
                        </label>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                            <span style="width: 30px; flex-shrink: 0;">3.</span>
                            <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                            <span style="flex: 1;">
                                Current legal guardian or surrogate of a current or former service member.
                            </span>
                        </label>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                        <span style="width: 30px; flex-shrink: 0;">C.</span>
                        <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                        <span style="flex: 1;">
                            Intergovernmental Parole Referral
                        </span>
                    </label>
                    <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                        <span style="flex: 1;">
                            U.S. Federal Executive Branch Government Agency:
                        </span>
                        <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                            value="<?php echo showData('i_864_substitute_relation') ?>">
                    </div>
                    <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                        <span style="flex: 1;">
                            U.S. Federal Government Agency Representative Official Email Address:
                        </span>
                        <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                            value="<?php echo showData('i_864_substitute_relation') ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                        <span style="width: 30px; flex-shrink: 0;">D.</span>
                        <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                        <span style="flex: 1;">
                            Family Reunification Task Force (FRTF) Process; Task Force Registration Number:
                        </span>
                    </label>
                    <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                        <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                            value="<?php echo showData('i_864_substitute_relation') ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                        <span style="width: 30px; flex-shrink: 0;">E.</span>
                        <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                        <span style="flex: 1;">
                            Other: (List specific parole program or process)
                        </span>
                    </label>
                    <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                        <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                            value="<?php echo showData('i_864_substitute_relation') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">7.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        I am applying for a parole document under INA section 212(d)(5)(A) for myself and I am outside the United States, or I
                        am applying for a parole document under INA section 212(d)(5)(A) on behalf of someone else who is outside the United
                        States for the first time (initial application), but not under a specific parole program or process.
                    </span>
                </label>
            </div>

            <div class="bg-info" style="margin-top:10px;">
                <h4><b><i>Initial Request for Arrival/Departure Record for Parole In Place (for aliens who are inside the United States)</i> </b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start; margin-bottom: 20px;">
                    <span style="width: 30px; flex-shrink: 0;">8.</span>
                    <span style="flex: 1;">
                        I am applying for an initial period of parole in place under INA section 212(d)(5)(A) and I am inside the United States, or I am
                        applying for an initial period of parole in place under INA section 212(d)(5)(A) on behalf of someone else who is inside the
                        United States, under:
                    </span>
                </label>
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">A.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        Military Parole in Place (PIP), only on my own behalf, and I am a:
                    </span>
                </label>
                <div style="margin-left: 30px;">
                    <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                        <span style="width: 30px; flex-shrink: 0;">(1)</span>
                        <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                        <span style="flex: 1;">
                            A current or former service member.
                        </span>
                    </label>
                    <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                        <span style="width: 30px; flex-shrink: 0;">(2)</span>
                        <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                        <span style="flex: 1;">
                            A spouse, parent, son, or daughter of a current or former service member
                        </span>
                    </label>
                    <div>
                        <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                            <span style="width: 30px; flex-shrink: 0;">B.</span>
                            <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                            <span style="flex: 1;">
                                Family Reunification Task Force (FRTF) Process; Task Force Registration Number:
                            </span>
                        </label>
                        <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                            <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                                value="<?php echo showData('i_864_substitute_relation') ?>">
                        </div>
                    </div>

                    <div>
                        <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                            <span style="width: 30px; flex-shrink: 0;">C.</span>
                            <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                            <span style="flex: 1;">
                                Other: (List specific program or process)
                            </span>
                        </label>
                        <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                            <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                                value="<?php echo showData('i_864_substitute_relation') ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">9.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        I am applying for an initial period of parole in place under INA section 212(d)(5)(A) and I am inside the United States,
                        but not under a specific program or process, or I am applying for an initial period of parole in place under INA section
                        212(d)(5)(A) for someone else who is inside the United States, but not under a specific program or process.
                    </span>
                </label>
            </div>

        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
    <p style="text-align: right"><b>Page 4 of 14</b></p>
    <div class="row ">
        <div class="col-md-12">
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Part 1. Application Type </b> (continued)</h4>
            </div>
            <div class="bg-info" style="margin-top:10px;">
                <h4><b><i>Arrival/Departure Records for Re-parole for Aliens Who Are Requesting a New Period of Parole (from
                            inside the United States) </i> </b></h4>
            </div>


            <div>
                <div class="form-group">
                    <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                        <span style="width: 30px; flex-shrink: 0;">10.</span>
                        <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                        <span style="flex: 1;">
                            I was initially paroled into the United States or granted parole in place under INA section 212(d)(5)(A) under one of the
                            following programs or processes and I am requesting a new period of parole, or I am applying for a new period of parole on
                            behalf of someone else who was initially paroled into the United States under one of the following programs or processes:
                        </span>
                    </label>
                </div>
                <div style="margin-left: 30px;">
                    <div class="form-group">
                        <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                            <span style="width: 30px; flex-shrink: 0;">A.</span>
                            <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                            <span style="flex: 1;">
                                Family Reunification Parole Process
                            </span>
                        </label>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                            <span style="width: 30px; flex-shrink: 0;">B.</span>
                            <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                            <span style="flex: 1;">
                                Certain Afghans Paroled Into the United States After July 31, 2021 (See form Instructions)
                            </span>
                        </label>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                            <span style="width: 30px; flex-shrink: 0;">C.</span>
                            <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                            <span style="flex: 1;">
                                Re-parole Process for certain Ukrainian Citizens and Their Immediate Family Members Paroled Into the United
                                States on or After February 11, 2022 (See form Instructions)
                            </span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                            <span style="width: 30px; flex-shrink: 0;">D.</span>
                            <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                            <span style="flex: 1;">
                                Filipino World War II Veterans Parole (FWVP) Program
                            </span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                            <span style="width: 30px; flex-shrink: 0;">E.</span>
                            <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                            <span style="flex: 1;">
                                Immigrant Military Members and Veterans Initiative (IMMVI)
                            </span>
                        </label>
                        <div style="margin-left: 30px;">
                            <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                                <span style="width: 30px; flex-shrink: 0;">(1)</span>
                                <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                                <span style="flex: 1;">
                                    A current or former service member.
                                </span>
                            </label>
                            <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                                <span style="width: 30px; flex-shrink: 0;">(2)</span>
                                <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                                <span style="flex: 1;">
                                    A current spouse, child, or unmarried son or daughter (or their child under 21 years of age) of a current or
                                    former service member.
                                </span>
                            </label>
                            <div>
                                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                                    <span style="width: 30px; flex-shrink: 0;">(3)</span>
                                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                                    <span style="flex: 1;">
                                        Current legal guardian or surrogate of a current or former service member.
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                            <span style="width: 30px; flex-shrink: 0;">F.</span>
                            <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                            <span style="flex: 1;">
                                Central American Minors (CAM) Program
                            </span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                            <span style="width: 30px; flex-shrink: 0;">G.</span>
                            <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                            <span style="flex: 1;">
                                Family Reunification Task Force (FRTF) Process
                            </span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                            <span style="width: 30px; flex-shrink: 0;">H.</span>
                            <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                            <span style="flex: 1;">
                                Military Parole in Place (Military PIP)
                            </span>
                        </label>
                    </div>
                    <div style="margin-left: 30px;">
                        <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                            <span style="width: 30px; flex-shrink: 0;">(1)</span>
                            <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                            <span style="flex: 1;">
                                A current or former service member.
                            </span>
                        </label>
                        <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                            <span style="width: 30px; flex-shrink: 0;">(2)</span>
                            <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                            <span style="flex: 1;">
                                A spouse, parent, son, or daughter of a current or former service member.
                            </span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                            <span style="width: 30px; flex-shrink: 0;">I.</span>
                            <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                            <span style="flex: 1;">
                                Other Program or Process (List specific program or process):
                            </span>
                        </label>
                        <div class="col-md-11" style="margin-left: 50px; margin-top: 0.5rem;">
                            <input type="text" class="form-control" maxlength="37" name="i_864_substitute_relation"
                                value="<?php echo showData('i_864_substitute_relation') ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                        <span style="width: 30px; flex-shrink: 0;">11.</span>
                        <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                        <span style="flex: 1; ">
                            I was initially paroled into the United States or granted parole in place under INA section 212(d)(5)(A) and I am
                            requesting a new period of parole, but not under a specific program or process, or I am requesting a new period of
                            parole on behalf of someone else who was initially paroled into the United States or granted parole in place, but not
                            under a specific program or process
                        </span>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. If you selected one of the boxes in Item Numbers 10. or 11., list the Admit
                    cUntil Date/Parole shown on Form I-94: (mm/dd/yyyy)</label>
                <div class="col-md-4 col-md-offset-8">
                    <input type="text" class="form-control" name="i_864_sponsor_household_dependent_children" maxlength="5" value="<?php echo showData('i_864_sponsor_household_dependent_children') ?>">
                </div>
            </div>
            <div class="bg-info" style="margin-top:10px;">
                <h4><b><i>Refugee Status</i> </b></h4>
            </div>

            <div class="form-group">
                <label class="col-md-12">13. Do you hold status as a refugee, were you paroled as a refugee, or are you a lawful permanent resident as a
                    direct result of being a refugee?</label>
                <div class="col-md-4 col-md-offset-10 "><?php echo createRadio("i_864_federal_income_tax_status") ?> </div>
            </div>
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Part 2. Information About You </b></h4>
            </div>
            <div>
                <label class="control-label col-md-12">1. Your Full Name</label>
                <div class="col-md-5">
                    <label class="control-label ">Family Name(Last Name)</label>
                    <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_family_last_name" value="<?php echo showData('i_864_family_member2_family_last_name') ?>" />
                </div>
                <div class="col-md-4">
                    <label class="control-label ">Given Name(First Name)</label>
                    <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_given_first_name" value="<?php echo showData('i_864_family_member2_given_first_name') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label ">Middle Name (if applicable)</label>
                    <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_middle_name" value="<?php echo showData('i_864_family_member2_middle_name') ?>" />
                </div>
                

            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 5  --------------------------------
------------------------------------------------------------------------>

<!-- <fieldset class="setpage">
    <div class="col-md-12">

        <p style="text-align: right"><b>Page 5 of 14</b></p>
        <div class="row ">
            <div class="col-md-12">
                <div class="bg-info">
                    <h4><b>Part 2. Information About You </b>(continued)</h4>
                </div>
                <div>
                    <label class="control-label col-md-12">2. Other Names Used (if applicable)</label>
                    <div class="col-md-4">
                        <label class="control-label ">Family Name(Last Name)</label>
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_family_last_name" value="<?php echo showData('i_864_family_member2_family_last_name') ?>" />
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_family_last_name" value="<?php echo showData('i_864_family_member2_family_last_name') ?>" />
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_family_last_name" value="<?php echo showData('i_864_family_member2_family_last_name') ?>" />
                    </div>
                    <div class="col-md-4">
                        <label class="control-label ">Given Name(First Name)</label>
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_given_first_name" value="<?php echo showData('i_864_family_member2_given_first_name') ?>" />
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_given_first_name" value="<?php echo showData('i_864_family_member2_given_first_name') ?>" />
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_given_first_name" value="<?php echo showData('i_864_family_member2_given_first_name') ?>" />
                    </div>
                    <div class="col-md-4">
                        <label class="control-label ">Middle Name (if applicable)</label>
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_middle_name" value="<?php echo showData('i_864_family_member2_middle_name') ?>" />
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_middle_name" value="<?php echo showData('i_864_family_member2_middle_name') ?>" />
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_middle_name" value="<?php echo showData('i_864_family_member2_middle_name') ?>" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <label class="control-label ">3. Current Mailing Address or Safe Address (if applicable)</label>
        </div>
        <div class="col-md-12">
            <label class="control-label ">In Care Of Name (if any) </label>
            <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_middle_name" value="<?php echo showData('i_864_family_member2_middle_name') ?>" />
        </div>


        <div id="mailingAddressForm" style="margin:0px 3% 0px 3%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
                    <div style="width: 100%;">
                        <input type="text" maxlength="34" class="form-control" name="i_864_sponsor_physical_street_number" value="<?php echo showData('i_864_sponsor_physical_street_number'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                    <div style="flex: 1; margin-left: 5%;">
                        <label>
                            <input type="radio" name="i_864_sponsor_physical_apt_ste_flr" value="apt"
                                <?php echo (showData('i_864_sponsor_physical_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                            Apt. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="i_864_sponsor_physical_apt_ste_flr" value="ste"
                                <?php echo (showData('i_864_sponsor_physical_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                            Ste. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="i_864_sponsor_physical_apt_ste_flr" value="flr"
                                <?php echo (showData('i_864_sponsor_physical_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                            Flr.
                        </label>
                    </div>
                </div>
                <div style="flex: 1;">
                    <label class="control-label">Number</label>
                    <input type="text" class="form-control" name="i_864_sponsor_physical_apt_ste_flr_value"
                        maxlength="6" value="<?php echo showData('i_864_sponsor_physical_apt_ste_flr_value'); ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="i_864_sponsor_physical_state"
                            style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('i_864_sponsor_physical_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code </label>
                    <div class='d-flexible'>
                        <div style="width: 100%;">
                            <input type="text" class="form-control" name="i_864_sponsor_physical_zip_code" maxlength="5" value="<?php echo showData('i_864_sponsor_physical_zip_code'); ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 1.5; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>

                <div class="form-group" style="flex: 2; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
                    <div class='d-flexible'>
                        <div style="width: 100%;">
                            <input type="text" class="form-control" name="i_864_sponsor_physical_zip_code" maxlength="5" value="<?php echo showData('i_864_sponsor_physical_zip_code'); ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <label class="control-label ">4. Current Physical Address (if different from the above address)</label>
        </div>
        <div class="col-md-12">
            <label class="control-label ">In Care Of Name (if any) </label>
            <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_middle_name" value="<?php echo showData('i_864_family_member2_middle_name') ?>" />
        </div>
        <div id="physicalAddressForm" style="margin:0px 3% 0px 3%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
                    <div style="width: 100%;">
                        <input type="text" maxlength="34" class="form-control" name="i_864_sponsor_physical_street_number" value="<?php echo showData('i_864_sponsor_physical_street_number'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                    <div style="flex: 1; margin-left: 5%;">
                        <label>
                            <input type="radio" name="i_864_sponsor_physical_apt_ste_flr" value="apt"
                                <?php echo (showData('i_864_sponsor_physical_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                            Apt. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="i_864_sponsor_physical_apt_ste_flr" value="ste"
                                <?php echo (showData('i_864_sponsor_physical_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                            Ste. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="i_864_sponsor_physical_apt_ste_flr" value="flr"
                                <?php echo (showData('i_864_sponsor_physical_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                            Flr.
                        </label>
                    </div>
                </div>
                <div style="flex: 1;">
                    <label class="control-label">Number</label>
                    <input type="text" class="form-control" name="i_864_sponsor_physical_apt_ste_flr_value"
                        maxlength="6" value="<?php echo showData('i_864_sponsor_physical_apt_ste_flr_value'); ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="i_864_sponsor_physical_state"
                            style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('i_864_sponsor_physical_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code </label>
                    <div class='d-flexible'>
                        <div style="width: 100%;">
                            <input type="text" class="form-control" name="i_864_sponsor_physical_zip_code" maxlength="5" value="<?php echo showData('i_864_sponsor_physical_zip_code'); ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 1.5; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>

                <div class="form-group" style="flex: 2; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
                    <div class='d-flexible'>
                        <div style="width: 100%;">
                            <input type="text" class="form-control" name="i_864_sponsor_physical_zip_code" maxlength="5" value="<?php echo showData('i_864_sponsor_physical_zip_code'); ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-info">
            <h4><b><i>Other Information</i></b></h4>
        </div>

        <div>
            <div class="col-md-6">
                <label class="control-label ">5.Alien Registration Number (A-Number) (if any)</label>
                <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_family_last_name" value="<?php echo showData('i_864_family_member3_family_last_name') ?>" />
            </div>
            <div class="col-md-6">
                <label class="control-label ">6.Country of Birth</label>
                <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_given_first_name" value="<?php echo showData('i_864_family_member3_given_first_name') ?>" />
            </div>
            <div class="col-md-6">
                <label class="control-label ">7.Country of Citizenship or Nationality</label>
                <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_middle_name" value="<?php echo showData('i_864_family_member3_middle_name') ?>" />
            </div>

            <div class="col-md-6">
                <label class="control-label ">8.Sex</label>
                <div style="margin-top: 15px;">
                    <input type="radio" name="parent1_info_gender" value="male" <?php echo (showData('parent1_info_gender') == 'male') ? 'checked' : '' ?>> Male &nbsp;
                    <input type="radio" name="parent1_info_gender" value="female" <?php echo (showData('parent1_info_gender') == 'female') ? 'checked' : '' ?>> Female &nbsp;

                </div>
            </div>
        </div>
        <div class=" col-md-12" style="display: flex; flex-wrap: wrap; justify-items:center; align-items: center; gap: 30px;">
            <div class="form-group" style="flex: 2; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">9.Date of Birth (mm/dd/yyyy)</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 2; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">10.U.S. Social Security Number (if any)</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" style="margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">11. USCIS Online Account Number (if any)</label>
                <div class='d-flexible'>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="i_864_sponsor_physical_zip_code" maxlength="5" value="<?php echo showData('i_864_sponsor_physical_zip_code'); ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <label class="control-label" style="margin: 15px 0px 15px 0;">If you are physically present in the United States, and you are seeking a Temporary Protected Status (TPS) travel authorization
                document, advance parole, a renewed period of parole (re-parole), or parole in place, (Part 1., Item Numbers 4., 5., 8., 9., 10., or 11.)
                complete the following:</label>
        </div>
        <div class="col-md-5">
            <label class="control-label ">12. Class of Admission (COA) (if any)</label>
            <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_date_of_birth" value="<?php echo showData('i_864_family_member3_date_of_birth') ?>" />
        </div>
        <div class="col-md-7">
            <label class="control-label ">13. Most Recent Form I-94 Arrival/Departure Record Number (if any)</label>
            <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_alien_number" value="<?php echo showData('i_864_family_member3_alien_number') ?>" />
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 6  --------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
    <div class="col-md-12">
        <p style="text-align: right"><b>Page 6 of 14</b></p>
        <div class="row ">
            <div class="col-md-12">
                <div class="bg-info">
                    <h4><b>Part 2. Information About You </b>(continued)</h4>
                </div>
             <div class="row">
             <div class="col-md-6">
                    <label class="control-label ">14. Expiration Date of Authorized Stay Shown on Form I-94 (if any) (mm/dd/yyyy)</label>
                    <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_date_of_birth" value="<?php echo showData('i_864_family_member3_date_of_birth') ?>" />
                </div>
                <div class="col-md-6">
                    <label class="control-label ">15. eMedical U.S. Parolee ID (USPID) (if any)</label>
                    <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_alien_number" value="<?php echo showData('i_864_family_member3_alien_number') ?>" />
                </div>
             </div>
                <div class="bg-info">
                    <h4><i><b>Information About Them </b>(Complete this section only if you are applying on behalf of someone else.)</i> </h4>
                </div>
                <label class="control-label ">If you are requesting parole on behalf of someone other than yourself, provide the following information about that person in Item
                Numbers 16. - 27. Do not complete this section if filing for yourself. </label>
                <div>
                    <div class="col-md-4">
                        <label class="control-label ">16. Family Name (Last Name) </label>
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_family_last_name" value="<?php echo showData('i_864_family_member2_family_last_name') ?>" />
                    </div>
                    <div class="col-md-4">
                        <label class="control-label ">Given Name(First Name)</label>
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_given_first_name" value="<?php echo showData('i_864_family_member2_given_first_name') ?>" />
                    </div>
                    <div class="col-md-4">
                        <label class="control-label ">Middle Name (if applicable)</label>
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_middle_name" value="<?php echo showData('i_864_family_member2_middle_name') ?>" />
                    </div>
                </div>
                <div>
                    <label class="control-label col-md-12">17. Their Other Names Used (if applicable)</label>
                    <div class="col-md-4">
                        <label class="control-label ">Family Name(Last Name)</label>
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_family_last_name" value="<?php echo showData('i_864_family_member2_family_last_name') ?>" />
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_family_last_name" value="<?php echo showData('i_864_family_member2_family_last_name') ?>" />
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_family_last_name" value="<?php echo showData('i_864_family_member2_family_last_name') ?>" />
                    </div>
                    <div class="col-md-4">
                        <label class="control-label ">Given Name(First Name)</label>
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_given_first_name" value="<?php echo showData('i_864_family_member2_given_first_name') ?>" />
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_given_first_name" value="<?php echo showData('i_864_family_member2_given_first_name') ?>" />
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_given_first_name" value="<?php echo showData('i_864_family_member2_given_first_name') ?>" />
                    </div>
                    <div class="col-md-4">
                        <label class="control-label ">Middle Name (if applicable)</label>
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_middle_name" value="<?php echo showData('i_864_family_member2_middle_name') ?>" />
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_middle_name" value="<?php echo showData('i_864_family_member2_middle_name') ?>" />
                        <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_middle_name" value="<?php echo showData('i_864_family_member2_middle_name') ?>" />
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="col-md-6">
                <label class="control-label ">18. Date of Birth (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="i_864_family_member3_family_last_name" value="<?php echo showData('i_864_family_member3_family_last_name') ?>" />
            </div>
            <div class="col-md-6">
                <label class="control-label ">19. Country of Birth</label>
                <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_given_first_name" value="<?php echo showData('i_864_family_member3_given_first_name') ?>" />
            </div>
            <div class="col-md-6">
                <label class="control-label ">20. Country of Citizenship or Nationality</label>
                <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_middle_name" value="<?php echo showData('i_864_family_member3_middle_name') ?>" />
            </div>
            <div class="col-md-6">
                <label class="control-label ">21. Daytime Phone Number</label>
                <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_middle_name" value="<?php echo showData('i_864_family_member3_middle_name') ?>" />
            </div>
            <div class="col-md-6">
                <label class="control-label ">22. Email Address (if any)</label>
                <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_middle_name" value="<?php echo showData('i_864_family_member3_middle_name') ?>" />
            </div>
            <div class="col-md-6">
                <label class="control-label ">23. Alien Registration Number (A-Number) (if any) </label>
                <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_middle_name" value="<?php echo showData('i_864_family_member3_middle_name') ?>" />
            </div>
        </div>
        <div class="col-md-12">
            <label class="control-label ">24. Their Current Mailing Address</label>
        </div>
        <div class="col-md-12">
            <label class="control-label ">In Care Of Name (if any) </label>
            <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_middle_name" value="<?php echo showData('i_864_family_member2_middle_name') ?>" />
        </div>
        <div id="mailingAddressForm" style="margin:0px 3% 0px 3%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
                    <div style="width: 100%;">
                        <input type="text" maxlength="34" class="form-control" name="i_864_sponsor_physical_street_number" value="<?php echo showData('i_864_sponsor_physical_street_number'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                    <div style="flex: 1; margin-left: 5%;">
                        <label>
                            <input type="radio" name="i_864_sponsor_physical_apt_ste_flr" value="apt"
                                <?php echo (showData('i_864_sponsor_physical_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                            Apt. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="i_864_sponsor_physical_apt_ste_flr" value="ste"
                                <?php echo (showData('i_864_sponsor_physical_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                            Ste. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="i_864_sponsor_physical_apt_ste_flr" value="flr"
                                <?php echo (showData('i_864_sponsor_physical_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                            Flr.
                        </label>
                    </div>
                </div>
                <div style="flex: 1;">
                    <label class="control-label">Number</label>
                    <input type="text" class="form-control" name="i_864_sponsor_physical_apt_ste_flr_value"
                        maxlength="6" value="<?php echo showData('i_864_sponsor_physical_apt_ste_flr_value'); ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="i_864_sponsor_physical_state"
                            style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('i_864_sponsor_physical_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code </label>
                    <div class='d-flexible'>
                        <div style="width: 100%;">
                            <input type="text" class="form-control" name="i_864_sponsor_physical_zip_code" maxlength="5" value="<?php echo showData('i_864_sponsor_physical_zip_code'); ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 1.5; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>

                <div class="form-group" style="flex: 2; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
                    <div class='d-flexible'>
                        <div style="width: 100%;">
                            <input type="text" class="form-control" name="i_864_sponsor_physical_zip_code" maxlength="5" value="<?php echo showData('i_864_sponsor_physical_zip_code'); ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <label class="control-label ">25. Their Current Physical Address </label>
        </div>
        <div class="col-md-12">
            <label class="control-label ">In Care Of Name (if any) </label>
            <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_middle_name" value="<?php echo showData('i_864_family_member2_middle_name') ?>" />
        </div>
        <div id="physicalAddressForm" style="margin:0px 3% 0px 3%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
                    <div style="width: 100%;">
                        <input type="text" maxlength="34" class="form-control" name="i_864_sponsor_physical_street_number" value="<?php echo showData('i_864_sponsor_physical_street_number'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                    <div style="flex: 1; margin-left: 5%;">
                        <label>
                            <input type="radio" name="i_864_sponsor_physical_apt_ste_flr" value="apt"
                                <?php echo (showData('i_864_sponsor_physical_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                            Apt. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="i_864_sponsor_physical_apt_ste_flr" value="ste"
                                <?php echo (showData('i_864_sponsor_physical_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                            Ste. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="i_864_sponsor_physical_apt_ste_flr" value="flr"
                                <?php echo (showData('i_864_sponsor_physical_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                            Flr.
                        </label>
                    </div>
                </div>
                <div style="flex: 1;">
                    <label class="control-label">Number</label>
                    <input type="text" class="form-control" name="i_864_sponsor_physical_apt_ste_flr_value"
                        maxlength="6" value="<?php echo showData('i_864_sponsor_physical_apt_ste_flr_value'); ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="i_864_sponsor_physical_state"
                            style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('i_864_sponsor_physical_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code </label>
                    <div class='d-flexible'>
                        <div style="width: 100%;">
                            <input type="text" class="form-control" name="i_864_sponsor_physical_zip_code" maxlength="5" value="<?php echo showData('i_864_sponsor_physical_zip_code'); ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 1.5; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>

                <div class="form-group" style="flex: 2; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
                    <div class='d-flexible'>
                        <div style="width: 100%;">
                            <input type="text" class="form-control" name="i_864_sponsor_physical_zip_code" maxlength="5" value="<?php echo showData('i_864_sponsor_physical_zip_code'); ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 7--------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
    <div class="row">
        <p style=" text-align: right; margin-right: 15px;"><b>Page 7 of 12</b></p>
        <div class="col-md-12">
            <div class="bg-info">
                <h4><b>Part 2. Information About You </b>(continued)</h4>
            </div>
            <div class="bg-info">
                <h4><b><i>Other Information</i></b></h4>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="control-label ">26. Class of Admission (COA) (if any)</label>
                    <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_family_last_name" value="<?php echo showData('i_864_family_member3_family_last_name') ?>" />
                </div>
                <div class="col-md-6">
                    <label class="control-label ">27. Most Recent Form I-94 Arrival/Departure Record Number (if any)</label>
                    <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_given_first_name" value="<?php echo showData('i_864_family_member3_given_first_name') ?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 3. Biographic Information of the Person Who Will Receive the Travel Document, Parole Document,
                        or Arrival/Departure Record</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1. Ethnicity (Select only one box)</label>
                <div class="col-md-6 ">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="hispanic" name="biographic_info_ethnicity" value="hispanic" <?php echo (showData('biographic_info_ethnicity') == 'hispanic') ? 'checked' : '' ?>>
                            <label for="hispanic" class="form-check-label">Hispanic or Latino</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="not_hispanic" name="biographic_info_ethnicity" value="nothispanic" <?php echo (showData('biographic_info_ethnicity') == 'nothispanic') ? 'checked' : '' ?>>
                            <label for="not_hispanic" class="form-check-label">Not Hispanic or Latino</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Race (Select all applicable boxes)</label>
                <div class="col-md-12 ">
                    <div class="">
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_american_native") ?>American Indian or Alaska Native</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_asian") ?>Asian</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_black_african") ?>Black or African American</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_native_islander") ?>Native Hawaiian or Other Pacific Islander</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_white") ?>White</label><br>
                    </div>
                </div>
            </div>
            <div style="padding-left: 1.5%;">
                <div>
                    <label>3.Height</label>
                    <label style="padding-left:10%">Feet:</label>
                    <select id="feet" name="biographic_info_height_feet" style="padding: 8px; margin-right: 10px; border: 1px solid #ccc; border-radius: 5px;">
                        <?php echo "<option value=" . showData('biographic_info_height_feet') . " selected>" . showData('biographic_info_height_feet') . "</option>"; ?>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                    <label>Inches:</label>
                    <select id="inches" name="biographic_info_height_inches" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                        <?php echo "<option value=" . showData('biographic_info_height_inches') . " selected>" . showData('biographic_info_height_inches') . "</option>"; ?>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                    </select>
                </div>
                <div>
                    <span><b>4.Weight</b></span>
                    <span style="padding-left:10%"><b> Pounds:</b></span>

                    <input type="text" maxlength="1" name="biographic_info_weight_in_pound1" value="<?php echo showData('biographic_info_weight_in_pound1') ?>" style="width: 40px; margin-right: 10px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">

                    <input type="text" maxlength="1" name="biographic_info_weight_in_pound2" value="<?php echo showData('biographic_info_weight_in_pound2') ?>" style="width: 40px; margin-right: 10px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">

                    <input type="text" maxlength="1" name="biographic_info_weight_in_pound3" value="<?php echo showData('biographic_info_weight_in_pound3') ?>" style="width: 40px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <br>
                <div class="form-group">
                    <label>5. Eye Color (Select only one box )</label><br>
                    <div>
                        <input type="radio" id="eye_black" name="biographic_info_eye_color" value="black" <?php echo (showData('biographic_info_eye_color') == 'black') ? 'checked' : '' ?>>
                        <label for="eye_black">Black</label><br>

                        <input type="radio" id="eye_blue" name="biographic_info_eye_color" value="blue" <?php echo (showData('biographic_info_eye_color') == 'blue') ? 'checked' : '' ?>>
                        <label for="eye_blue">Blue</label><br>

                        <input type="radio" id="eye_brown" name="biographic_info_eye_color" value="brown" <?php echo (showData('biographic_info_eye_color') == 'brown') ? 'checked' : '' ?>>
                        <label for="eye_brown">Brown</label><br>

                        <input type="radio" id="eye_gray" name="biographic_info_eye_color" value="gray" <?php echo (showData('biographic_info_eye_color') == 'gray') ? 'checked' : '' ?>>
                        <label for="eye_gray">Gray</label><br>

                        <input type="radio" id="eye_green" name="biographic_info_eye_color" value="green" <?php echo (showData('biographic_info_eye_color') == 'green') ? 'checked' : '' ?>>
                        <label for="eye_green">Green</label><br>

                        <input type="radio" id="eye_hazel" name="biographic_info_eye_color" value="hazel" <?php echo (showData('biographic_info_eye_color') == 'hazel') ? 'checked' : '' ?>>
                        <label for="eye_hazel">Hazel</label><br>

                        <input type="radio" id="eye_maroon" name="biographic_info_eye_color" value="maroon" <?php echo (showData('biographic_info_eye_color') == 'maroon') ? 'checked' : '' ?>>
                        <label for="eye_maroon">Maroon</label><br>

                        <input type="radio" id="eye_pink" name="biographic_info_eye_color" value="pink" <?php echo (showData('biographic_info_eye_color') == 'pink') ? 'checked' : '' ?>>
                        <label for="eye_pink">Pink</label><br>

                        <input type="radio" id="eye_unknown" name="biographic_info_eye_color" value="unknown" <?php echo (showData('biographic_info_eye_color') == 'unknown') ? 'checked' : '' ?>>
                        <label for="eye_unknown">Unknown/Other</label>
                    </div>
                    <br><br>
                    <label>6. Hair Color (Select only one box )</label><br>
                    <div>
                        <input type="radio" id="hair_bald" name="biographic_info_hair_color" value="bald" <?php echo (showData('biographic_info_hair_color') == 'bald') ? 'checked' : '' ?>>
                        <label for="hair_bald">Bald (No hair)</label><br>

                        <input type="radio" id="hair_black" name="biographic_info_hair_color" value="black" <?php echo (showData('biographic_info_hair_color') == 'black') ? 'checked' : '' ?>>
                        <label for="hair_black">Black</label><br>

                        <input type="radio" id="hair_blond" name="biographic_info_hair_color" value="blond" <?php echo (showData('biographic_info_hair_color') == 'blond') ? 'checked' : '' ?>>
                        <label for="hair_blond">Blond</label><br>

                        <input type="radio" id="hair_brown" name="biographic_info_hair_color" value="brown" <?php echo (showData('biographic_info_hair_color') == 'brown') ? 'checked' : '' ?>>
                        <label for="hair_brown">Brown</label><br>

                        <input type="radio" id="hair_gray" name="biographic_info_hair_color" value="gray" <?php echo (showData('biographic_info_hair_color') == 'gray') ? 'checked' : '' ?>>
                        <label for="hair_gray">Gray</label><br>

                        <input type="radio" id="hair_red" name="biographic_info_hair_color" value="red" <?php echo (showData('biographic_info_hair_color') == 'red') ? 'checked' : '' ?>>
                        <label for="hair_red">Red</label><br>

                        <input type="radio" id="hair_sandy" name="biographic_info_hair_color" value="sandy" <?php echo (showData('biographic_info_hair_color') == 'sandy') ? 'checked' : '' ?>>
                        <label for="hair_sandy">Sandy</label><br>

                        <input type="radio" id="hair_white" name="biographic_info_hair_color" value="white" <?php echo (showData('biographic_info_hair_color') == 'white') ? 'checked' : '' ?>>
                        <label for="hair_white">White</label><br>

                        <input type="radio" id="hair_unknown" name="biographic_info_hair_color" value="unknown" <?php echo (showData('biographic_info_hair_color') == 'unknown') ? 'checked' : '' ?>>
                        <label for="hair_unknown">Unknown/Other</label>
                    </div>

                    <div class="bg-info">
                        <h4><b>Part 4. Processing Information</b></h4>
                    </div>
                    <div>
                        <label class="col-md-12">1. Has the person who will receive the travel document, parole document, or Arrival/Departure Record, if
                            approved, been in any exclusion, deportation, removal, or rescission proceedings?</label>
                        <div class="col-md-4 col-md-offset-10 "><?php echo createRadio("i_864_federal_income_tax_status") ?> </div>
                    </div>
                    <div>
                        <label class="col-md-12">2.a. Have you EVER before been issued a Reentry Permit or Refugee Travel Document? (If you answered
                            “Yes,” provide the information in Item Numbers 2.b. - 2.c. for the last document issued to you.)</label>
                        <div class="col-md-4 col-md-offset-10 "><?php echo createRadio("i_864_federal_income_tax_status") ?> </div>
                    </div>
                    <div class="row" style="margin: 5px;">
                        <div class="col-md-6">
                            <label class="control-label ">2.b. Date Issued (mm/dd/yyyy)</label>
                            <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_family_last_name" value="<?php echo showData('i_864_family_member3_family_last_name') ?>" />
                        </div>
                        <div class="col-md-6">
                            <label class="control-label ">2.c. Disposition (attached, lost, stolen, damaged/destroyed, still in my possession, etc.):</label>
                            <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_given_first_name" value="<?php echo showData('i_864_family_member3_given_first_name') ?>" />
                        </div>
                    </div> <br>
                    <div>
                        <label class="col-md-12">3.a. Have you EVER been issued an Advance Parole Document? (If you answered “Yes,” please provide the
                            information in Item Numbers 3.b. - 3.c. for the last document issued to you.)</label>
                        <div class="col-md-4 col-md-offset-10 "><?php echo createRadio("i_864_federal_income_tax_status") ?> </div>
                    </div>
                    <div class="row" style="margin: 5px;">
                        <div class="col-md-6">
                            <label class="control-label ">3.b. Date Issued (mm/dd/yyyy)</label>
                            <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_family_last_name" value="<?php echo showData('i_864_family_member3_family_last_name') ?>" />
                        </div>
                        <div class="col-md-6">
                            <label class="control-label ">3.c. Disposition (attached, lost, stolen, damaged/destroyed, still in my possession, etc.):</label>
                            <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_given_first_name" value="<?php echo showData('i_864_family_member3_given_first_name') ?>" />
                        </div>
                    </div><br>
                    <label class="col-md-12">If you are requesting parole from outside the United States, parole in place, or re-parole from inside the United States, SKIP to Part 8.</label>
                   <br>
                    <div>
                        <label class="col-md-12">4. Are you requesting a replacement Reentry Permit, Refugee Travel Document, Advance Parole
                            Document, or TPS Travel Authorization Document?</label>
                        <div class="col-md-4 col-md-offset-10 "><?php echo createRadio("i_864_federal_income_tax_status") ?> </div>
                    </div>
                </div>
            </div>
            <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
            <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
            <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 8--------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <div class="row">
        <p style=" text-align: right; margin-right: 15px;"><b>Page 8 of 12</b></p>
        <div class="col-md-12">
            <div class="bg-info">
                <h4><b>Part 4. Processing Information</b>(continued)</h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. If you answered “Yes,” select one of the following boxes and complete Item Numbers 6.a. - 6.b. If you answered “No,” you
                    can skip to Item Number 7.a</label>
                <div class="col-md-12 ">
                    <div class="">
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_american_native") ?>My document was issued, but I did not receive it</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_asian") ?>I received my document, but then it was lost, stolen, or damaged. </label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_black_african") ?>I received my document, but it has incorrect information because of an error caused by me or because my information has
                            changed.</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_native_islander") ?>I received my document, but it has incorrect information because of an error not caused by me (such as a U.S. Citizenship
                            and Immigration Services (USCIS) error).</label><br>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. If you are replacing your Reentry Permit, Refugee Travel Document, Advance Parole Document, or TPS Travel Authorization
                    Document because it has incorrect information, please select the applicable box(es) indicating the information that needs to be
                    corrected and then provide any additional information in the text box that helps USCIS confirm the correction needed.</label>
                <div class="col-md-12 ">
                    <div class="">
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_american_native") ?>Name</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_american_native") ?>A-Number</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_american_native") ?>Country of Birth/Citizenship</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_american_native") ?>Terms and Conditions</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_american_native") ?>Date of Birth</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_american_native") ?>Sex</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_american_native") ?>Validity Date</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_american_native") ?>Photo</label><br>
                    </div>
                </div>
                <label class="control-label col-md-12">Provide an explanation of what is incorrect on your current document to support your request for a correction and attach copies
                    of any documents supporting your request. </label>
            </div>
            <div class="col-md-12">
                <textarea name="i_864_additional_info_6d" class="form-control" maxlength="341" cols="30" rows="5"><?php echo showData('i_864_additional_info_6d') ?></textarea>
            </div>

            <div class="row" style="margin: 5px;">
                <div class="col-md-12">
                    <label class="control-label ">6.b . Provide the receipt number for the Form I-131 related to the Reentry Permit, Refugee Travel Document, Advance Parole
                        Document, or TPS Travel Authorization Document that you are seeking to replace: </label>
                    <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_family_last_name" value="<?php echo showData('i_864_family_member3_family_last_name') ?>" />
                </div>
            </div>
            <br>
            <div>
                <label class="col-md-12">If you are applying for an Advance Parole Document, SKIP to Part 7. <br><br>
                    You must complete the rest of Part 4. if you are requesting a Reentry Permit or Refugee Travel Document. <br> <br>
                    Where do you want your Reentry Permit or Refugee Travel Document sent? Please note that if you want your Reentry Permit or
                    Refugee Travel Document sent to another country, you will need to pick it up at a U.S. Embassy, U.S. Consulate, or USCIS
                    international field office. (Select one)</label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">7.a.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        To the U.S. address shown in Part 2., Item Number 3. of this application.
                    </span>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">7.b.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        To a U.S. Embassy, U.S. Consulate, USCIS international field office, or Department of Homeland Security (DHS) office overseas at:
                    </span>
                </label>
            </div>
            <div class="row" style="margin: 5px;">
                <div class="col-md-6">
                    <label class="control-label ">City or Town</label>
                    <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_family_last_name" value="<?php echo showData('i_864_family_member3_family_last_name') ?>" />
                </div>
                <div class="col-md-6">
                    <label class="control-label ">Country </label>
                    <input type="text" maxlength="29" class="form-control" name="i_864_family_member3_given_first_name" value="<?php echo showData('i_864_family_member3_given_first_name') ?>" />
                </div>
            </div>


        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 9--------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 9 of 14</b></p>
    <div class="row">
        <div class="col-md-12">
            <div class="bg-info">
                <h4> <b>Part 8. Sponsor's Contract, Contact
                        Information, Certification, and
                        Signaturee</b>(continued)</h4>
            </div>
            <label class="control-label col-md-12">If you are requesting that the Reentry Permit or Refugee Travel Document be sent to a U.S. Embassy, U.S. Consulate, or USCIS
                international field office, where should the notification to pick up the travel document be sent? </label>
            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">8.a.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        To the address shown in Part 2., Item Number 3. of this application
                    </span>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
                    <span style="width: 30px; flex-shrink: 0;">8.b.</span>
                    <span style="width: 20px; flex-shrink: 0;"><?php echo createCheckbox("i_864_substitute_sponsor") ?></span>
                    <span style="flex: 1;">
                        To the address shown below in Part 4., Item Number 9.a. of this application.
                    </span>
                </label>
            </div>


            <div class="col-md-12">
                <label class="control-label ">9.a. In Care Of Name (if any) </label>
                <input type="text" maxlength="29" class="form-control" name="i_864_family_member2_middle_name" value="<?php echo showData('i_864_family_member2_middle_name') ?>" />
            </div>
            <div id="physicalAddressForm" style="margin:0px 3% 0px 3%;">
                <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                    <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                        <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
                        <div style="width: 100%;">
                            <input type="text" maxlength="34" class="form-control" name="i_864_sponsor_physical_street_number" value="<?php echo showData('i_864_sponsor_physical_street_number'); ?>"
                                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>
                    <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                        <div style="flex: 1; margin-left: 5%;">
                            <label>
                                <input type="radio" name="i_864_sponsor_physical_apt_ste_flr" value="apt"
                                    <?php echo (showData('i_864_sponsor_physical_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                                Apt. &nbsp;
                            </label>
                            <label>
                                <input type="radio" name="i_864_sponsor_physical_apt_ste_flr" value="ste"
                                    <?php echo (showData('i_864_sponsor_physical_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                                Ste. &nbsp;
                            </label>
                            <label>
                                <input type="radio" name="i_864_sponsor_physical_apt_ste_flr" value="flr"
                                    <?php echo (showData('i_864_sponsor_physical_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                                Flr.
                            </label>
                        </div>
                    </div>
                    <div style="flex: 1;">
                        <label class="control-label">Number</label>
                        <input type="text" class="form-control" name="i_864_sponsor_physical_apt_ste_flr_value"
                            maxlength="6" value="<?php echo showData('i_864_sponsor_physical_apt_ste_flr_value'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                    <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                        <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                        <div style="width: 100%;">
                            <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>
                    <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                        <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                        <div style="width: 100%;">
                            <select class="form-control" name="i_864_sponsor_physical_state"
                                style="width: 100%; padding: 5px; margin-top: 3%;">
                                <option value=''>Select</option>
                                <?php
                                foreach ($allDataCountry as $record) {
                                    if ($record->state_code == showData('i_864_sponsor_physical_state')) $selected = "selected";
                                    else $selected = "";
                                    echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                        <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code </label>
                        <div class='d-flexible'>
                            <div style="width: 100%;">
                                <input type="text" class="form-control" name="i_864_sponsor_physical_zip_code" maxlength="5" value="<?php echo showData('i_864_sponsor_physical_zip_code'); ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                    <div class="form-group" style="flex: 1.5; margin-bottom: 10px;">
                        <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province</label>
                        <div style="width: 100%;">
                            <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>
                    <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                        <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code</label>
                        <div style="width: 100%;">
                            <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>

                    <div class="form-group" style="flex: 2; margin-bottom: 10px;">
                        <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
                        <div class='d-flexible'>
                            <div style="width: 100%;">
                                <input type="text" class="form-control" name="i_864_sponsor_physical_zip_code" maxlength="5" value="<?php echo showData('i_864_sponsor_physical_zip_code'); ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                    <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                        <label class="control-label" style="width: 100%; margin-bottom: 5px;">9.b. Daytime Phone Number</label>
                        <div style="width: 100%;">
                            <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>
                    <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                        <label class="control-label" style="width: 100%; margin-bottom: 5px;">9.c. Email Address</label>
                        <div style="width: 100%;">
                            <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>
                </div>
            </div>


            <div class="bg-info">
                <h4><b>Part 5. Complete Only If Applying for a Reentry Permit (Part 1., Item Number 1.)</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1. Since becoming a permanent resident of the United States (or during the past 5 years, whichever is less), how much total time
                    have you spent outside the United States?</label>
                <div class="col-md-12 ">
                    <div class="">
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_american_native") ?>Less Than 6 Months</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_american_native") ?>6 Months to 1 Year</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_american_native") ?>1 to 2 Years</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_american_native") ?>2 to 3 Years</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_american_native") ?>3 to 4 Years</label><br>
                        <label class="control-label"><?php echo createCheckbox("biographic_info_race_american_native") ?>More Than 4 Years</label><br>

                    </div>
                </div>
            </div>

            <div class="bg-info">
                <h4><b>Part 6. Complete Only If Applying for a Refugee Travel Document (Part 1., Item Number 2. or 3.)</b></h4>
            </div>

            <div class="row" style="display: flex; flex-wrap: wrap;  justify-items:center; align-items: center;  margin:10px 10px 0 10px">
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">1. Country from which you are a refugee or asylee:</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="i_864_sponsor_physical_city_town" maxlength="20" value="<?php echo showData('i_864_sponsor_physical_city_town'); ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">If you answer “Yes” to Item Numbers 2. - 6.c. below, use the space provided in Part 13. Additional Information to provide an
                        explanation.</label>
                </div>
            </div>
            <div>
                <label class="col-md-12">2. Do you plan to travel to the country named above in Item Number 1.?</label>
                <div class="col-md-4 col-md-offset-10 "><?php echo createRadio("i_864_federal_income_tax_status") ?> </div>
            </div>
            <div>
                <label class="col-md-12">Since you were admitted to the United States as a refugee or granted asylee status, have you EVER: </label>
            </div> 
            <div>
                <label class="col-md-12">3.a. Returned to the country named above in Item Number 1.? </label>
                <div class="col-md-4 col-md-offset-10 "><?php echo createRadio("i_864_federal_income_tax_status") ?> </div>
            </div>
            <div>
                <label class="col-md-12">3.b. Applied for and/or obtained a national passport, passport renewal, or entry permit from the country in
                    Item Number 1.?</label>
                <div class="col-md-4 col-md-offset-10 "><?php echo createRadio("i_864_federal_income_tax_status") ?> </div>
            </div>
            <div>
                <label class="col-md-12">3.c. Applied for and/or received any benefit from the country named in Item Number 1. (for example, health
                    insurance benefits)?</label>
                <div class="col-md-4 col-md-offset-10 "><?php echo createRadio("i_864_federal_income_tax_status") ?> </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 10 -------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 10 of 12</b></p>
    <div class="row">
        <div class="col-md-12">
            <div class="bg-info">
                <h4> <b>Part 8. Sponsor's Contract, Contact
                        Information, Certification, and
                        Signaturee</b>(continued)</h4>
            </div><br>

            <div class="bg-info">
                <h4><b><i>Sponsor's Statement</i></b></h4>
            </div>
            <div style="margin-left:17px">
                <b>1. </b>Sponsor's Statement Regarding the Interpreter</b>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">A. <?php echo createCheckbox("sponsor_statement_english_status") ?>I can read and understand English, and I have read and understand every question and instruction on this affidavit and
                    my answer to every question. </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">B. <?php echo createCheckbox("sponsor_statement_interpreter_named_status") ?>The interpreter named in Part 9. read to me every question and instruction on this affidavit and my answer to every question in</label>
                <div class="col-md-12 d-flexible">
                    <input type="text" class="form-control  " name="sponsor_statement_interpreter_named" maxlength="35" value="<?php echo showData('sponsor_statement_interpreter_named') ?>"><b>,</b>
                </div>
                <div style="margin-left: 17px; margin-top: 10px;"><b> a language in which I am fluent, and I understood everything.</b></div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. <?php echo createCheckbox("sponsor_statement_preparer_named_status") ?>At my request, the preparer named in Part 10.,</label>
                <div class="col-md-12 d-flexible">
                    <input type="text" class="form-control  " name="sponsor_statement_preparer_named" maxlength="35" value="<?php echo showData('sponsor_statement_preparer_named') ?>"><b>,</b>
                </div>
                <div style="margin-left: 17px;"><b>prepared this affidavit for me based only upon nformation I provided or authorized.</b></div>
            </div>
            <div class="bg-info">
                <h4><b><i>Sponsor's Contact Information</i></b></h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class=" col-md-6">
                        <label class="control-label">3. Sponsor's Daytime Telephone Number</label>
                        <div class="">
                            <input type="text" class="form-control" name="i_864_sponsor_daytime_tel" maxlength="12" value="<?php echo showData('i_864_sponsor_daytime_tel') ?>">
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <label class="control-label ">4. Sponsor's Mobile Telephone Number (if any)</label>
                        <div class="">
                            <input type="text" class="form-control  " name="i_864_sponsor_mobile" maxlength="13" value="<?php echo showData('i_864_sponsor_mobile') ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label ">5. Sponsor's Email Address (if any)</label>
                        <div class="">
                            <input type="text" class="form-control  " name="i_864_sponsor_email" maxlength="38" value="<?php echo showData('i_864_sponsor_email') ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Sponsor's Declaration and Certification</i></b></h4>
            </div>
            <div style="margin-left: 17px;">
                Copies of any documents I have submitted are exact photocopies of unaltered, original documents, and I understand that USCIS or the
                U.S. Department of State (DOS) may require that I submit original documents to USCIS or DOS at a later date. Furthermore, I
                authorize the release of any information from any of my records that USCIS or DOS may need to determine my eligibility for the
                immigration benefit I seek. <br><br>
                I furthermore authorize release of information contained in this affidavit, in supporting documents, and in my USCIS or DOS records
                to other entities and persons where necessary for the administration and enforcement of U.S. immigration law. <br><br>
                I certify, under penalty of perjury, that all of the information in my affidavit and any document submitted with it were provided or
                authorized by me, that I reviewed and understand all of the information contained in, and submitted with, my affidavit, and that all of
                this information is complete, true, and correct.

            </div>
            <br>
            <div class="col-md-offset-2">
                <b> A.</b> I know the contents of this affidavit of support that I signed
                <br><br>
                <b>B.</b> I have read and I understand each of the obligations described in <b>Part 8</b> ., and I agree, freely and without any mental
                reservation or purpose of evasion, to accept each of those obligations in order to make it possible for the immigrant
                indicated in <b>Part 3</b> . to become a lawful permanent resident of the United States;
                <br><br>
                <b>C.</b> I agree to submit to the personal jurisdiction of any Federal or state court that has subject matter jurisdiction of a lawsuit
                against me to enforce my obligations under this Form I-864EZ;
                <br><br>
            </div>
            <div class="col-md-offset-2">
                <b>D.</b> Each of the Federal income tax returns submitted in support of this affidavit are true copies, or are unaltered tax
                transcripts, of the tax returns I filed with the IRS; <br><br>
                <b>E.</b> I understand that, if I am related to the sponsored immigrant by marriage, the termination of the marriage (by divorce,
                dissolution, annulment, or other legal process) will not relieve me of my obligations under this Form I-864EZ; and
                <br><br>
                <b>F.</b> I authorize the Social Security Administration to release information about me in its records to the USCIS and DOS.
            </div><br>
            <div class="bg-info">
                <h4><b><i>Sponsor's Signature</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. Sponsor's Signature</label>
                <div class="col-md-12">
                    <input type="text" disabled class="form-control" maxlength="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">6.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="i_864_sponsor_sign_date" value="<?php echo showData('i_864_sponsor_sign_date') ?>" />
                </div>
            </div>
            <div><b>NOTE TO ALL SPONSORS:</b> If you do not completely fill out this affidavit or fail to submit required documents listed in the
                Instructions, USCIS or DOS may deny your request.
            </div> <br>
        </div>

    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!-------------------------------------------------------
------------------------ page 11 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 11 of 12</b></p>
    <div class="row">
        <div class="col-md-12">
            <div class="bg-info">
                <h4><b>Part 9. Interpreter's Contact Information, Certification, and Signature</b></h4>
            </div> <br>
            <div class="bg-info">
                <h4><b><i>Interpreter's Full Name</i></b></h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <label class="control-label ">1. Interpreter's Family Name (Last Name)</label>
                        <div class="">
                            <input type="text" class="form-control  " name="i_864_interpreter_family_last_name" maxlength="39" value="<?php echo showData('i_864_interpreter_family_last_name') ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label ">Interpreter's Given Name (First Name)</label>
                        <div class="">
                            <input type="text" class="form-control  " name="i_864_interpreter_given_first_name" maxlength="39" value="<?php echo showData('i_864_interpreter_given_first_name') ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label ">2. Interpreter's Business or Organization Name (if any)</label>
                        <div class="">
                            <input type="text" class="form-control" name="i_864_interpreter_business_name" maxlength="39" value="<?php echo showData('i_864_interpreter_business_name') ?>">
                        </div>
                    </div>
                </div>
            </div>



            <div class="bg-info">
                <h4><b><i>Interpreter's Contact Information</i></b></h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <label class="control-label ">3. Interpreter's Daytime Telephone Number</label>
                        <div class="">
                            <input type="text" class="form-control  " name="i_864_interpreter_daytime_tel" maxlength="10" value="<?php echo showData('i_864_interpreter_daytime_tel') ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label ">4. Interpreter's Mobile Telephone Number (if any)</label>
                        <div class="">
                            <input type="text" class="form-control  " name="i_864_interpreter_mobile" maxlength="10" value="<?php echo showData('i_864_interpreter_mobile') ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label ">5. Interpreter's Email Address (if any)</label>
                        <div class="">
                            <input type="text" class="form-control  " name="i_864_interpreter_email" maxlength="38" value="<?php echo showData('i_864_interpreter_email') ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Certification and Signature</b></i></h4>
            </div>
            <p>I certify, under penalty of perjury, that:</p>
            <div class="form-group" style="display:flex;  align-items: center;">
                <p>that I am fluent in English and</p>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864_interpreter_fluent_in_english" maxlength="23" value="<?php echo showData('i_864_interpreter_fluent_in_english') ?>">
                </div>
            </div>
            <div>and I have interpreted every question on the affidavit and Instructions and interpreted the sponsor's answers to the questions in that language, and the sponsor
                informed me that they understood every instruction, question, and answer on the affidavit. </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Interpreter's Signature</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"> Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_864_interpreter_sign_date" value="<?php echo showData('i_864_interpreter_sign_date') ?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 10. Contact Information, Declaration, and Signature of the Person Preparing this Affidavit, if Other Than the Sponsor</b></h4>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Full Name</b> </h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class=" col-md-6">
                        <label class="control-label ">1. Preparer's Family Name (Last Name)</label>
                        <div class="">
                            <input type="text" class="form-control" name="i_864_preparer_family_last_name" maxlength="39" value="<?php echo showData('i_864_preparer_family_last_name') ?>" />
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <label class="control-label ">1. Preparer's Given Name (First Name)</label>
                        <div class="">
                            <input type="text" class="form-control" name="i_864_preparer_given_first_name" maxlength="39" value="<?php echo showData('i_864_preparer_given_first_name') ?>" />
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <label class="control-label ">2. Preparer's Business or Organization Name (if any)</label>
                        <div class="">
                            <input type="text" class="form-control" name="i_864_preparer_business_name" maxlength="34" value="<?php echo showData('i_864_preparer_business_name') ?>" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-info">
                <h4><b> Preparer's Contact Information</b></h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <label class="control-label">3. Preparer's Daytime Telephone Number</label>
                        <div class="">
                            <input type="text" class="form-control" name="i_864_preparer_daytime_tel" maxlength="10" value="<?php echo showData('i_864_preparer_daytime_tel') ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">4. Preparer's Mobile Telephone Number (if any)</label>
                        <div class="">
                            <input type="text" class="form-control" name="i_864_preparer_mobile" maxlength="10" value="<?php echo showData('i_864_preparer_mobile') ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">5. Preparer's Email Address (if any)</label>
                        <div class="">
                            <input type="text" class="form-control" maxlength="38" name="i_864_preparer_email" value="<?php echo showData('i_864_preparer_email') ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Certification and Signature</b></h4>
            </div>
            <p>I certify, under penalty of perjury, that I prepared this affidavit for the sponsor at their request and with express consent and that all of
                the responses and information contained in and submitted with the affidavit are complete, true, and correct and reflects only
                information provided by the sponsor. The sponsor reviewed the responses and information and informed me that they understand the
                responses and information in or submitted with the affidavit.
            </p>
            <div class="form-group">
                <label class="control-label col-md-12">6. Preparer's Signature </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_864_preparer_sign_date" value="<?php echo showData('i_864_preparer_sign_date') ?>">
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!-------------------------------------------------------
------------------------ page 12 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <div class="row">
        <p style=" text-align: right;  margin-right: 25px;"><b>Page 12 of 12</b></p>
        <div class="col-md-12">
            <div class="bg-info">
                <h4><b>Part 11. Additional Information</b> </h4>
            </div>
            <p>If you need extra space to provide any additional information within this contract, use the space below. If you need more space than
                what is provided, you may make copies of this page to complete and file with this contract or attach a separate sheet of paper. Type or
                print your name and A-Number (if any) at the top of each sheet; indicate the Page Number, Part Number, and Item Number to
                which your answer refers; and sign and date each sheet.
            </p>

            <div class="col-md-4">
                <label class="control-label">1. Family Name(Last Name) </label>
                <input type="text" class="form-control" maxlength="29" name="i_864_additional_info_last_name" value="<?php echo showData('i_864_additional_info_last_name') ?>" />
            </div>


            <div class="col-md-4">
                <label class="control-label">Given Name(First Name) </label>
                <input type="text" class="form-control" maxlength="27" name="i_864_additional_info_first_name" value="<?php echo showData('i_864_additional_info_first_name') ?>" />
            </div>


            <div class="col-md-4">
                <label class="control-label">Middle Name (if applicable)</label>
                <input type="text" class="form-control" maxlength="27" name="i_864_additional_info_middle_name" value="<?php echo showData('i_864_additional_info_middle_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label">2. A-Number (if any) ► A- </label>
                <input type="text" class="form-control" maxlength="9" name="i_864_additional_info_a_number" value="<?php echo showData('i_864_additional_info_a_number') ?>" />
            </div>


            <div class="col-md-12">
                <div class="row">

                    <div class="form-group col-md-3">
                        <label class="control-label ">3. Page Number</label>
                        <input type="text" class="form-control" name="i_864_additional_info_3a_page_no" maxlength="2" value="<?php echo showData('i_864_additional_info_3a_page_no') ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label ">Part Number</label>
                        <input type="text" class="form-control" name="i_864_additional_info_3b_part_no" maxlength="6" value="<?php echo showData('i_864_additional_info_3b_part_no') ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label ">Item Number</label>
                        <input type="text" class="form-control" name="i_864_additional_info_3c_item_no" maxlength="6" value="<?php echo showData('i_864_additional_info_3c_item_no') ?>">
                    </div>
                    <div class="col-md-12">
                        <textarea name="i_864_additional_info_3d" class="form-control" maxlength="341" cols="30" rows="10"><?php echo showData('i_864_additional_info_3d') ?></textarea>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="control-label ">4. Page Number</label>
                        <input type="text" class="form-control" name="i_864_additional_info_4a_page_no" maxlength="2" value="<?php echo showData('i_864_additional_info_4a_page_no') ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label ">Part Number</label>
                        <input type="text" class="form-control" name="i_864_additional_info_4b_part_no" maxlength="6" value="<?php echo showData('i_864_additional_info_4b_part_no') ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label ">Item Number</label>
                        <input type="text" class="form-control" name="i_864_additional_info_4c_item_no" maxlength="6" value="<?php echo showData('i_864_additional_info_4c_item_no') ?>">
                    </div>
                    <div class="col-md-12">
                        <textarea name="i_864_additional_info_4d" class="form-control" maxlength="341" cols="30" rows="10"><?php echo showData('i_864_additional_info_4d') ?></textarea>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="control-label ">5. Page Number</label>
                        <input type="text" class="form-control" name="i_864_additional_info_5a_page_no" maxlength="2" value="<?php echo showData('i_864_additional_info_5a_page_no') ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label ">Part Number</label>
                        <input type="text" class="form-control" name="i_864_additional_info_5b_part_no" maxlength="6" value="<?php echo showData('i_864_additional_info_5b_part_no') ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label ">Item Number</label>
                        <input type="text" class="form-control" name="i_864_additional_info_5c_item_no" maxlength="6" value="<?php echo showData('i_864_additional_info_5c_item_no') ?>">
                    </div>
                    <div class="col-md-12">
                        <textarea name="i_864_additional_info_5d" class="form-control" maxlength="341" cols="30" rows="10"><?php echo showData('i_864_additional_info_5d') ?></textarea>
                    </div>

                    <div class="form-group col-md-3">
                        <label class="control-label ">6. Page Number</label>
                        <input type="text" class="form-control" name="i_864_additional_info_6a_page_no" maxlength="2" value="<?php echo showData('i_864_additional_info_6a_page_no') ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label ">Part Number</label>
                        <input type="text" class="form-control" name="i_864_additional_info_6b_part_no" maxlength="6" value="<?php echo showData('i_864_additional_info_6b_part_no') ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label ">Item Number</label>
                        <input type="text" class="form-control" name="i_864_additional_info_6c_item_no" maxlength="6" value="<?php echo showData('i_864_additional_info_6c_item_no') ?>">
                    </div>
                    <div class="col-md-12">
                        <textarea name="i_864_additional_info_6d" class="form-control" maxlength="341" cols="30" rows="10"><?php echo showData('i_864_additional_info_6d') ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!-- javascript for change the address -->
<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const yesRadio = document.getElementById("mailing_address_yes");
        const noRadio = document.getElementById("mailing_address_no");
        const mailingAddressForm = document.getElementById("mailingAddressForm");
        const physicalAddressForm = document.getElementById("physicalAddressForm");

        function toggleAddressForms() {
            if (yesRadio.checked) {
                mailingAddressForm.style.display = "block";
                physicalAddressForm.style.display = "none";
            } else {
                mailingAddressForm.style.display = "none";
                physicalAddressForm.style.display = "block";
            }
        }

        // Initial check on page load
        toggleAddressForms();

        // Add event listeners
        yesRadio.addEventListener("change", toggleAddressForms);
        noRadio.addEventListener("change", toggleAddressForms);
    });
</script> -->
<?php include "intake_footer.php" ?>