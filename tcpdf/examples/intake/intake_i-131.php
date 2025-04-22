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
<fieldset class="setpage">
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
</fieldset>
<!-- <fieldset class="setpage">
    <div class="row">
        <p style=" text-align: right;  margin-right: 25px;"><b>Page 6 of 12</b></p>

        <div class="bg-info">
            <h4><b>Part 6. Sponsor's Employment and Income (continued) </b>
            </h4>
        </div>

        <h5 style="margin-left:17px;"><b>8. Person 1</b></h5>
        <div class="d-flexible">
            <div class="form-group col-md-6">
                <label class="control-label ">Name</label>
                <div>
                    <input type="text" class="form-control" name="i_864_person1_name" maxlength="38" value="<?php echo showData('i_864_person1_name') ?>">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label ">Relationship </label>
                <div class="">
                    <input type="text" class="form-control" name="i_864_person1_relationship" maxlength="38" value="<?php echo showData('i_864_person1_relationship') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2">Current Income </label>
            <div class="col-md-3 d-flexible">
                $<input type="text" class="form-control" name="i_864_person1_current_income" maxlength="16" value="<?php echo showData('i_864_person1_current_income') ?>">
            </div>
        </div>

        <h5 style="margin-left:17px;"><b>9. Person 2</b></h5>
        <div class="d-flexible">
            <div class="form-group col-md-6">
                <label class="control-label ">Name</label>
                <div>
                    <input type="text" class="form-control" name="i_864_person2_name" maxlength="38" value="<?php echo showData('i_864_person2_name') ?>">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label ">Relationship </label>
                <div class="">
                    <input type="text" class="form-control" name="i_864_person2_relationship" maxlength="38" value="<?php echo showData('i_864_person2_relationship') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2">Current Income </label>
            <div class="col-md-3 d-flexible">
                $<input type="text" class="form-control" name="i_864_person2_current_income" maxlength="16" value="<?php echo showData('i_864_person2_current_income') ?>">
            </div>
        </div>

        <h5 style="margin-left:17px;"><b>10. Person 3</b></h5>
        <div class="d-flexible">
            <div class="form-group col-md-6">
                <label class="control-label ">Name</label>
                <div>
                    <input type="text" class="form-control" name="i_864_person3_name" maxlength="38" value="<?php echo showData('i_864_person3_name') ?>">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label ">Relationship </label>
                <div class="">
                    <input type="text" class="form-control" name="i_864_person3_relationship" maxlength="38" value="<?php echo showData('i_864_person3_relationship') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2">Current Income </label>
            <div class="col-md-3 d-flexible">
                $<input type="text" class="form-control" name="i_864_person3_current_income" maxlength="16" value="<?php echo showData('i_864_person3_current_income') ?>">
            </div>
        </div>

        <h5 style="margin-left:17px;"><b>11. Person 4</b></h5>
        <div class="d-flexible">
            <div class="form-group col-md-6">
                <label class="control-label ">Name</label>
                <div>
                    <input type="text" class="form-control" name="i_864_person4_name" maxlength="38" value="<?php echo showData('i_864_person4_name') ?>">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label ">Relationship </label>
                <div class="">
                    <input type="text" class="form-control" name="i_864_person4_relationship" maxlength="38" value="<?php echo showData('i_864_person4_relationship') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2">Current Income </label>
            <div class="col-md-3 d-flexible">
                $<input type="text" class="form-control" name="i_864_person4_current_income" maxlength="16" value="<?php echo showData('i_864_person4_current_income') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">If you need additional space, use the space provided in Part 11. Additional Information </label>
            <label class="control-label col-md-12">Remarks </label>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">12. My Current Annual Household Income $ (Total all lines from Part 6. Item Numbers 7. - 11.; the total will be compared to Federal Poverty Guidelines on Form I-864P.) </label>
            <div class="col-md-4 col-md-offset-8">
                <input type="text" class="form-control" name="i_864_current_household_income" maxlength="16" value="<?php echo showData('i_864_current_household_income') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">13. <?php echo createCheckbox("i_864_completed_form_i864_status") ?>The people listed in Item Numbers 8. - 11. have completed Form I-864A. I am filing along with this affidavit all necessary
                Form I-864As completed by these people.</label>

        </div>
        <div class="form-group">
            <label class="control-label col-md-12">14. <?php echo createCheckbox("i_864_accompanying_dependents_status") ?>One or more of the people listed in Item Numbers 8. - 11. do not need to complete Form I-864A because he or she is the intending immigrant and has no accompanying dependents </label>
            <div class="col-md-6 col-md-offset-6 ">
                <input type="text" class="form-control" name="i_864_accompanying_dependents" maxlength="36" value="<?php echo showData('i_864_accompanying_dependents') ?>">
            </div>
        </div>
        <div class="bg-info">
            <h4><b>Federal Income Tax Return Information</b>
            </h4>
        </div>
        <div class="form-group">
            <label class="col-md-12">15. Have you filed a Federal income tax return for each of the three most recent tax years?</label>
            <div class="col-md-4 col-md-offset-6 "><?php echo createRadio("i_864_federal_income_tax_status") ?> </div>
        </div>
        <div class="form-group">
            <div class="col-md-12 ">NOTE: You MUST attach a photocopy or transcript of your Federal income tax return for only the most recent tax year and
                complete Item Number 16.a. If you believe additional returns may help you to establish your ability to maintain sufficient income,
                you may submit transcripts or photocopies of your Federal individual income tax returns for the three most recent years and complete
                Item Numbers 16.a. - 16.c.
            </div>
            <div class="col-md-12 my-4">Type or print the most recent tax year and your total income for that most recent tax year. If the amount was zero, type or print “zero”
                or if you were not required to file a Federal income tax return type or print “N/A” for not applicable. Type or print “N/A” for not
                applicable for Item Numbers 16.b. - 16.c. if you do are not submitting any additional tax returns.
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
<fieldset class="setpage">
    <div class="row">
        <p style=" text-align: right; margin-right: 15px;"><b>Page 7 of 12</b></p>
        <div class="col-md-12">

            <div class="bg-info">
                <h4><b>Part 6. Sponsor's Employment and Income </b>(continued)</h4>
            </div>

            <p style="margin-left: 17px;">My total income (adjusted gross income on Internal Revenue Service (IRS) Form 1040EZ) as reported on my Federal income tax returns for the most recent three years was: </p>
            <div class="d-flexible row" style="margin-left: 37%;">
                <div class="col-md-6"><b>Tax Year</b></div>
                <div class="col-md-6"><b>Total Income</b></div>
            </div>
            <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                <label class="control-label" style="flex: 1;">24.a. Most Recent</label>
                <input type="text" style="flex: 1;  padding: 10px;" class="form-control" name="sponsor_employment_most_recent_tax_year" maxlength="4" value="<?php echo showData('sponsor_employment_most_recent_tax_year') ?>">
                $<input type="text" style="flex: 1;  padding: 10px;" class="form-control" name="sponsor_employment_most_recent_total_income" maxlength="13" value="<?php echo showData('sponsor_employment_most_recent_total_income') ?>">
            </div>

            <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                <label class="control-label" style="flex: 1;">24.b. 2nd Most Recent</label>
                <input type="text" style="flex: 1;  padding: 10px;" class="form-control" name="sponsor_employment_2nd_most_recent_tax_year" maxlength="4" value="<?php echo showData('sponsor_employment_2nd_most_recent_tax_year') ?>">
                $<input type="text" style="flex: 1;  padding: 10px;" class="form-control" name="sponsor_employment_2nd_most_recent_total_income" maxlength="13" value="<?php echo showData('sponsor_employment_2nd_most_recent_total_income') ?>">
            </div>

            <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                <label class="control-label" style="flex: 1;">24.c. 3rd Most Recent</label>
                <input type="text" class="form-control" style="flex: 1;  padding: 10px;" name="sponsor_employment_3rd_most_recent_tax_year" maxlength="4" value="<?php echo showData('sponsor_employment_3rd_most_recent_tax_year') ?>">
                $<input type="text" class="form-control" style="flex: 1;  padding: 10px;" name="sponsor_employment_3rd_most_recent_total_income" maxlength="13" value="<?php echo showData('sponsor_employment_3rd_most_recent_total_income') ?>">
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">25. <?php echo createCheckbox("sponsor_employment_irs_required_level_status") ?>I was not required to file a Federal income tax return
                    as my income was below the IRS required level and I have attached evidence to support this.</label>
            </div>

            <div class="bg-info">
                <h4><b>Part 7. Use of Assets to Supplement Income</b>(if Applicable)</h4>
            </div>
            <div class="form-group">
                If your income, or the total income for you and your household.from <b>Part 6., Item Numbers 12</b>. or <b>16</b>, exceeds the
                Federal Poverty Guidelines for your household size, <b>YOU ARE NOT REQUIRED</b> to complete this <b>Part 7</b>. Skip to <b>Part 8.</b>
                <b>Your Assets (if applicable)</b>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1. Enter the balance of all cash, savings, and checking accounts. </label>
                <div class="col-md-6  col-md-offset-6 d-flexible">
                    $<input type="text" class="form-control  " name="sponsor_assets_of_supplement_saving_accounts" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_saving_accounts') ?>">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">2. Enter the net cash value of real-estate holdings. (Net value means assessed value minus mortgage
                    debt.) $ </label>
                <div class="col-md-6  col-md-offset-6 d-flexible">
                    $<input type="text" class="form-control  " name="sponsor_assets_of_supplement_real_estate_holdings" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_real_estate_holdings') ?>">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">3. Enter the net cash value of all stocks, bonds, certificates of deposit, and any other assets not already included in Item Number 1. or Item Number 2. </span></label>
                <div class="col-md-6  col-md-offset-6 d-flexible">
                    $<input type="text" class="form-control  " name="sponsor_assets_of_supplement_stocks_bonds_certificates" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_stocks_bonds_certificates') ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">4. Add together Item Numbers 1. - 3. and enter the number here. </span></label>
                <div class="col-md-6  col-md-offset-6 d-flexible">
                    $<input type="text" class="form-control  " name="sponsor_assets_of_supplement_add_together" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_stocks_bonds_certificates') ?>">
                </div>
            </div>
            <div class="mx-4"><b>Assets of your household members (if applicable)</b><br><br><b>Your household members who are combining their income with yours, report their assets on Form I-864A Part 4., in Item Number 6</b></div>

            <div class="form-group">
                <label class="control-label col-md-12">5. Add together the household members' assets reported on all the Form I-864A
                    Part 4., Item Number 6. and enter the number here. .</label>
                <div class="col-md-8  col-md-offset-4 d-flexible">
                    <div style="font-size: larger;"><b>TOTAL</b></div>:$<input type="text" class="form-control  " name="sponsor_assets_of_supplement_total" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_total') ?>">
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 8--------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 8 of 12</b></p>
    <div class="row">
        <div class="col-md-12">
            <div class="bg-info">
                <h4><b>Part 7. Use of Assets to Supplement Income</b> (if Applicable) (continued)</h4>
            </div>
            <label class="control-label col-md-12">Assets of the principal sponsored immigrant (if applicable).</label>
            <label class="control-label col-md-12">The principal sponsored immigrant is the person listed in Part 3., Item Number 1. Only include the assets if the principal immigrant
                is being sponsored by this affidavit of support.</label>
            <div class="form-group">
                <label class="control-label col-md-12">6. Enter the balance of the principal immigrant's savings and checking accounts.</label>
                <div class="col-md-6 col-md-offset-6 d-flexible">
                    $<input type="text" class="form-control" name="sponsor_assets_of_supplement_saving_checking_accounts" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_saving_checking_accounts'); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7. Enter the net cash value of all the principal immigrant's real estate holdings. (Net value means
                    investment value minus mortgage debt.)</label>
                <div class="col-md-6 col-md-offset-6 d-flexible">
                    $<input type="text" class="form-control" name="sponsor_assets_of_supplement_saving_cash_value" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_saving_cash_value'); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8. Enter the current cash value of the principal immigrant's stocks, bonds, certificates of deposit, and
                    other assets not included in Item Number 6. or Item Number 7.</label>
                <div class="col-md-6 col-md-offset-6 d-flexible">
                    $<input type="text" class="form-control" name="sponsor_assets_of_supplement_current_cash_value" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_current_cash_value'); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">9. Add together Item Numbers 6. - 8. and enter the number here.</label>
                <div class="col-md-6 col-md-offset-6 d-flexible">
                    $<input type="text" class="form-control" name="sponsor_assets_of_supplement_add_together2" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_add_together2'); ?>">
                </div>
            </div>
            <h4 style="margin-left: 17px;"><b>Total Value of Assets </b></h4>
            <div class="form-group">
                <label class="control-label col-md-12">10. Add together Item Numbers 4., 5., and 9. and enter the number here.</label>
                <div class="col-md-7 col-md-offset-5 d-flexible ">
                    <div style="font-size: larger;"><b>TOTAL</b></div>:$<input type="text" class="form-control" name="sponsor_assets_of_supplement_total2" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_total2'); ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4> <b>Part 8. Sponsor's Contract, Contact Information, Certification, and Signature</b></h4>
            </div>
            <div style="margin-left: 17px;">
                <b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-864 Instructions before completing this part.
            </div>



            <div class="bg-info">
                <h4> <b> Sponsor's Contract</b></h4>
            </div>
            <div style="margin-left: 17px;">
                Please note that, by signing this Form I-864, you agree to assume certain specific obligations under the Immigration and Nationality
                Act (INA) and other Federal laws. The following paragraphs describe those obligations. Please read the following information
                carefully before you sign Form I-864. If you do not understand the obligations, you may wish to consult an attorney or accredited
                representative.

                <br><br>
                <b>What is the Legal Effect of My Signing Form I-864?</b>
                <br><br>
                If you sign Form I-864 on behalf of any person (called the intending immigrant) who is applying for an immigrant visa or for
                adjustment of status to a lawful permanent resident, and that intending immigrant submits Form I-864 to the U.S. Government with his
                or her application for an immigrant visa or adjustment of status, under INA section 213A, these actions create a contract between you
                and the U.S. Government. The intending immigrant becoming a lawful permanent resident is the consideration for the contract.
                <br><br>
                Under this contract, you agree that, in deciding whether the intending immigrant can establish that he or she is not inadmissible to the
                United States as a person likely to become a public charge, the U.S. Government can consider your income and assets as available for
                the support of the intending immigrant.
            </div>
            <br><br>
            <div style="margin-left: 17px;">
                <b> What If I Choose Not to Sign Form I-864?</b>
                <br><br>
                The U.S. Government cannot make you sign Form 1-864 if you do not want to do so. But if you do not sign Form I-864, the intending
                immigrant may not become a lawful permanent resident in the United States.
                <br><br>
                <b>What Does Signing Form I-864 Require Me To Do?</b>
                <br><br>
                If an intending immigrant becomes a lawful permanent resident in the United States based on a Form I-864 that you have signed, then,
                until your obligations under Form I-864 terminate, you must:
            </div>
            <br>
            <div class="col-md-offset-2">
                <b> A.</b> Provide the intending immigrant any support necessary to maintain him or her at an income that is at least 125 percent of
                the Federal Poverty Guidelines for his or her household size (100 percent if you are the petitioning sponsor and are on
                active duty in the U.S. Armed Forces or U.S. Coast Guard, and the person is your husband, wife, or unmarried child under
                21 years of age); and
                <br><br>
                <b>B.</b> Notify U.S. Citizenship and Immigration Services (USCIS) of any change in your address, within 30 days of the change, by
                filing Form I-865.
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 9--------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 9 of 12</b></p>
    <div class="row">
        <div class="col-md-12">
            <div class="bg-info">
                <h4> <b>Part 8. Sponsor's Contract, Contact
                        Information, Certification, and
                        Signaturee</b>(continued)</h4>
            </div>
            <div>
                <b> What Other Consequences Are There?</b>
                <br><br>
                If an intending immigrant becomes a lawful permanent resident
                in the United States based on a Form I-864 that you have
                signed, then, until your obligations under Form I-864 terminate,
                the U.S. Government may consider (deem) your income and
                assets as available to that person, in determining whether he or
                she is eligible for certain Federal means-tested public and also
                for state or local means-tested public benefits, if the state or
                local government's rules provide for consideration (deeming) of
                your income and assets as available to the person.
                <br><br>
                This provision does not apply to public benefits specified in
                section 403(c) of the Welfare Reform Act such as emergency
                Medicaid, short-term, non-cash emergency relief; services
                provided under the National School Lunch and Child Nutrition
                Acts; immunizations and testing and treatment for
                communicable diseases; and means-tested programs under the
                Elementary and Secondary Education Act.
                <br><br>
                <b>What If I Do Not Fulfill My Obligations?</b>
                <br><br>
                If you do not provide sufficient support to the person who
                becomes a lawful permanent resident based on a Form I-864
                that you signed, that person may sue you for this support.
            </div>
            <div style="margin-left: 17px;">
                If a Federal, state, local, or private agency provided any covered
                means-tested public benefit to the person who becomes a lawful
                permanent resident based on a Form I-864 that you signed, the
                agency may ask you to reimburse them for the amount of the
                benefits they provided. If you do not make the reimbursement,
                the agency may sue you for the amount that the agency believes
                you owe.
                <br><br>
                If you are sued, and the court enters a judgment against you, the
                person or agency that sued you may use any legally permitted
                procedures for enforcing or collecting the judgment. You may
                also be required to pay the costs of collection, including
                attorney fees.
                <br><br>
                If you do not file a properly completed Form I-865 within 30
                days of any change of address, USCIS may impose a civil fine
                for your failing to do so.
                <br><br>
                <b>When Will These Obligations End?</b>
                <br><br>
                Your obligations under a Form I-864 that you signed will end if
                the person who becomes a lawful permanent resident based on
                that affidavit:
            </div> <br>
            <div style="margin-left: 17px;">
                <b>A.</b> Becomes a U.S. citizen;<br><br>
                <b>B.</b> Has worked, or can receive credit for, 40 quarters of
                coverage under the Social Security Act;<br><br>
                <b>C.</b> No longer has lawful permanent resident status and has
                departed the United States;<br><br>
                <b>D.</b> Is subject to removal, but applies for and obtains, in
                removal proceedings, a new grant of adjustment of status,
                based on a new affidavit of support, if one is required; or <br><br>
                <b>E.</b> Dies.
            </div>
            <br>
            <div style="margin-left: 17px;"><b>NOTE:</b> Divorce <b>does not</b> terminate your obligations under
                Form I-864. <br><br>
                Your obligations under a Form I-864 that you signed also end
                if you die. Therefore, if you die, your estate is not required to
                take responsibility for the person's support after your death.
                However, your estate may owe any support that you
                accumulated before you died. <br><br>
                <b>NOTE:</b> Select the box for either <b> Item A. or B</b> in <b> Item Number 1.</b> If applicable, select the box for <b> Item Number 2.</b>
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