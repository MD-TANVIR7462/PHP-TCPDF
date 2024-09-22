<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 9 of 12</b></p>
    <div class="row">
        <div class="bg-info" style="margin-top:10px;">
            <h4><b>Part D. Your Signature</b></h4>
        </div>
        <div>
            <div class="col-md-12">
                <label>I certify, under penalty of perjury under the laws of the United States of America, that this application and the evidence submitted with it are all true
                    and correct. Title 18, United States Code, Section 1546(a), provides in part: Whoever knowingly makes under oath, or as permitted under penalty of
                    perjury under Section 1746 of Title 28, United States Code, knowingly subscribes as true, any false statement with respect to a material fact in any
                    application, affidavit, or other document required by the immigration laws or regulations prescribed thereunder, or knowingly presents any such
                    application, affidavit, or other document containing any such false statement or which fails to contain any reasonable basis in law or fact - shall be
                    fined in accordance with this title or imprisoned for up to 25 years. I certify that I am physically present in the United States or seeking admission at
                    a Port of Entry when I execute this application. I authorize the release of any information from my immigration record that U.S. Citizenship and
                    Immigration Services (USCIS) needs to determine eligibility for the benefit I am seeking.</label><br>
                <hr class="my-5" style="border: 1px solid #729af8;">
                <label>WARNING: Applicants who are in the United States unlawfully are subject to removal if their asylum or withholding claims are not
                    granted by an asylum officer or an immigration judge. Any information provided in completing this application may be used as a basis for
                    the institution of, or as evidence in, removal proceedings even if the application is later withdrawn. Applicants determined to have
                    knowingly made a frivolous application for asylum will be permanently ineligible for any benefits under the Immigration and Nationality
                    Act. You may not avoid a frivolous finding simply because someone advised you to provide false information in your asylum application. If
                    filing with USCIS, unexcused failure to appear for an appointment to provide biometrics (such as fingerprints) and your biographical
                    information within the time allowed may result in an asylum officer dismissing your asylum application or referring it to an immigration
                    judge. Failure without good cause to provide DHS with biometrics or other biographical information while in removal proceedings may
                    result in your application being found abandoned by the immigration judge. See sections 208(d)(5)(A) and 208(d)(6) of the INA and 8 CFR
                    sections 208.10, 1208.10, 208.20, 1003.47(d) and 1208.20.</label><br>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label class="control-label " style="font-size: 12px;">Print your complete name </label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-6">
                <label class="control-label " style="font-size: 12px;">Write your name in your native alphabet.</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div class="col-md-12 my-4">
            <label>Did your spouse, parent, or child(ren) assist you in completing this application?</label><br>
            <div>
                <?php echo createRadio("i_485_social_security_status") ?>
            </div>
        </div>
        <div class="col-md-12 ">
            <p><b>NOTE : </b>(If "Yes," list the name and relationship.)</p><br>
        </div>
        <div class="col-md-12 ">
            <div class="col-md-3">
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
                <p style="font-size: 12px; text-align: center; font-weight: 600;">(Name)</p>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                <p style="font-size: 12px; text-align: center; font-weight: 600;">(Relationship)</p>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                <p style="font-size: 12px; text-align: center; font-weight: 600;">(Name)</p>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                <p style="font-size: 12px; text-align: center; font-weight: 600;">(Relationship)</p>
            </div>
        </div>
        <div class="col-md-12 my-4">
            <label>Did someone other than your spouse, parent, or child(ren) prepare this application?</label><br>
            <div>
                <?php echo createRadio("i_485_social_security_status") ?>
            </div>
        </div>
        <div class="col-md-12 ">
            <p><b>NOTE : </b>(If "Yes,"complete Part E.)</p><br>
        </div>
        <div class="col-md-12 my-4">
            <label>Asylum applicants may be represented by counsel. Have you been provided with a list of
                persons who may be available to assist you, at little or no cost, with your asylum claim?</label><br>
            <div>
                <?php echo createRadio("i_485_social_security_status") ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label class="control-label " style="font-size: 12px;">Signature of Applicant (The person in Part. A.I.)</label>
                <input type="text" disabled class="form-control" />
                <p style="font-size: 12px; text-align: center; font-weight: 600;">Sign your name so it all appears within the brackets</p>
            </div>
            <div class="col-md-6">
                <label class="control-label " style="font-size: 12px;">Date (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
    </div>
    <div class="bg-info" style="margin-top:10px;">
        <h4><b>Part E. Declaration of Person Preparing Form, if Other Than Applicant, Spouse, Parent, or Child</b></h4>
    </div>
    <div class="col-md-12">
        <label>I declare that I have prepared this application at the request of the person named in Part D, that the responses provided are based on all information of
            which I have knowledge, or which was provided to me by the applicant, and that the completed application was read to the applicant in his or her
            native language or a language he or she understands for verification before he or she signed the application in my presence. I am aware that the
            knowing placement of false information on the Form I-589 may also subject me to civil penalties under 8 U.S.C. 1324c and/or criminal penalties
            under 18 U.S.C. 1546(a).
        </label>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <label class="control-label " style="font-size: 12px;">Signature of Preparer</label>
            <input type="text" disabled class="form-control" />
        </div>
        <div class="col-md-6">
            <label class="control-label " style="font-size: 12px;">Print Complete Name of Preparer</label>
            <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-5">
            <label class="control-label " style="font-size: 12px;">Daytime Telephone Number</label>
            <div class="d-flexible">
                <span class="col-md-4 d-flexible"> <b>(</b> <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>"> <b>)</b> </span>
                <span class="col-md-8"><input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>"></span>
            </div>
        </div>
        <div class="col-md-7">
            <label class="control-label " style="font-size: 12px;">Address of Preparer: Street Number and Name</label>
            <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
        </div>
    </div>
    <div class="col-md-12 my-5">
        <div class="col-md-3">
            <label class="control-label " style="font-size: 12px;">Apt. Number</label>
            <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
        </div>
        <div class="col-md-3">
            <label class="control-label " style="font-size: 12px;">City</label>
            <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
        </div>
        <div class="col-md-3">
            <label class="control-label " style="font-size: 12px;">State</label>
            <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
        </div>
        <div class="col-md-3">
            <label class="control-label " style="font-size: 12px;">Zip Code</label>
            <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
        </div>
    </div>
    <table style="border-collapse: collapse" class="my-4">
        <thead>
            <tr>
                <th colspan="4" style="padding: 5px; text-align: center; " class="bg-info">To be completed by an
                    Attorney or Accredited Representative (if any).</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 5px;">
                    <label style="cursor: pointer;">
                        <?php echo createCheckbox("i_539_g28_status") ?> Select this box if Form G-28 is attached.
                    </label>
                </td>
                <td style="padding: 5px;">
                    <div>
                        <label class="control-label ">Attorney State Bar Number (if applicable)</label>
                        <input type="text" class="form-control" disabled>
                        <!-- <input type="text" class="form-control" value="<?php echo $attorneyData->bar_number ?>" disabled> -->
                    </div>
                </td>
                <td style="padding: 5px;">
                    <div>
                        <label class="control-label ">Attorney or Accredited Representative USCIS Online Account Number
                            (if any)</label>
                        <input type="text" class="form-control" maxlength="12" disabled>
                        <!-- <input type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number ?>" maxlength="12" disabled> -->
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>