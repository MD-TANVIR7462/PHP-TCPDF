<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 2 of 15</b></p>

    <div class=" form-group">
    <div class="form-group" style="margin-bottom: 10px;">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">10. Mailing Address</label>
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">In Care Of Name (if any)</label>
        <div style="width: 100%;">
            <input type="text" class="form-control" name="information_about_you_residence_care_of_name" maxlength="86"
                value="<?php echo showData('information_about_you_residence_care_of_name') ?>"
                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
    <div style="margin-left:1.5%; margin-right: 1.5%;">
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
                <div style="width: 100%;">
                    <input type="text" maxlength="63" class="form-control" name="" value="<?php echo showData('') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                <div style="flex: 1; margin-left: 5%;">
                    <label>
                        <input type="radio" name="information_about_you_residence_apt_ste_flr" value="apt"
                            <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="information_about_you_residence_apt_ste_flr" value="ste"
                            <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="information_about_you_residence_apt_ste_flr" value="flr"
                            <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
            </div>
            <div style="flex: 1;">
                <label class="control-label">Number</label>
                <input type="text" class="form-control" name="information_about_you_residence_apt_ste_flr_value"
                    maxlength="5" value="<?php echo showData('information_about_you_residence_apt_ste_flr_value') ?>"
                    style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="row"
            style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="" maxlength="63" value="<?php echo showData('') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                <div style="width: 100%;">
                    <select class="form-control" name="information_about_you_residence_state"
                        style="width: 100%; padding: 5px; margin-top: 3%;">
                        <option value=''>Select</option>
                        <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('information_about_you_residence_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                    </select>
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code + 4</label>
                <div class='d-flexible'>
                    <div style="width: 50%;">
                        <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('') ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                    <div style="width: 40%;">
                        <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('') ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province (foreign address
                    only)</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="information_about_you_residence_province"
                        maxlength="26" value="<?php echo showData('information_about_you_residence_province') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code (foreign address
                    only)</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="information_about_you_residence_postal_code"
                        maxlength="9" value="<?php echo showData('information_about_you_residence_postal_code') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country (foreign address
                    only)</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="" maxlength="37" value="<?php echo showData('') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- //......... -->

    <div class="form-group">
        <div class="form-group" style="margin-bottom: 10px;">
            <h4 class="" style="width: 100%; margin-bottom: 5px;">11. Physical Address</h4>
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">In Care Of Name (if any)</label>
            <div style="width: 100%;">
                <input type="text" class="form-control" name="information_about_you_residence_care_of_name"
                    maxlength="86" value="<?php echo showData('information_about_you_residence_care_of_name') ?>"
                    style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div style="margin-left:1.5%; margin-right: 1.5%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style=" margin-bottom: 5px; font-size:13px;">Street Number and Name (Do
                        not provide a PO Box in this space unless it is your ONLY address.)</label>
                    <div style="width: 100%;">
                        <input type="text" maxlength="63" class="form-control" name=""
                            value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                    <div style="flex: 1; margin-left: 5%;">
                        <label>
                            <input type="radio" name="information_about_you_residence_apt_ste_flr" value="apt"
                                <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                            Apt. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="information_about_you_residence_apt_ste_flr" value="ste"
                                <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                            Ste. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="information_about_you_residence_apt_ste_flr" value="flr"
                                <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                            Flr.
                        </label>
                    </div>
                </div>
                <div style="flex: 1;">
                    <label class="control-label">Number</label>
                    <input type="text" class="form-control" name="information_about_you_residence_apt_ste_flr_value"
                        maxlength="5"
                        value="<?php echo showData('information_about_you_residence_apt_ste_flr_value') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="row"
                style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="" maxlength="63"
                            value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="information_about_you_residence_state"
                            style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('information_about_you_residence_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code + 4</label>
                    <div class='d-flexible'>
                        <div style="width: 50%;">
                            <input type="text" class="form-control" name="" maxlength="5"
                                value="<?php echo showData('') ?>"
                                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                        <div style="width: 40%;">
                            <input type="text" class="form-control" name="" maxlength="5"
                                value="<?php echo showData('') ?>"
                                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province (foreign address
                        only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_residence_province"
                            maxlength="26" value="<?php echo showData('information_about_you_residence_province') ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code (foreign address
                        only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_residence_postal_code"
                            maxlength="9" value="<?php echo showData('information_about_you_residence_postal_code') ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country (foreign address
                        only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="" maxlength="37"
                            value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  -->
    <div class="form-group">
        <label>12. Current Marital Status</label><br>
        <div style="margin-left:2%">
            <input type="radio" id="hair_bald" name="biographic_info_hair_color" value="bald"
                <?php echo (showData('biographic_info_hair_color') == 'bald') ? 'checked' : '' ?>>
            <label for="hair_bald">Single, Never Married</label><br>

            <input type="radio" id="hair_black" name="biographic_info_hair_color" value="black"
                <?php echo (showData('biographic_info_hair_color') == 'black') ? 'checked' : '' ?>>
            <label for="hair_black">Married</label><br>

            <input type="radio" id="hair_blond" name="biographic_info_hair_color" value="blond"
                <?php echo (showData('biographic_info_hair_color') == 'blond') ? 'checked' : '' ?>>
            <label for="hair_blond">Divorced</label><br>

            <input type="radio" id="hair_brown" name="biographic_info_hair_color" value="brown"
                <?php echo (showData('biographic_info_hair_color') == 'brown') ? 'checked' : '' ?>>
            <label for="hair_brown">Widowed</label><br>

            <input type="radio" id="hair_gray" name="biographic_info_hair_color" value="gray"
                <?php echo (showData('biographic_info_hair_color') == 'gray') ? 'checked' : '' ?>>
            <label for="hair_gray">Separated</label><br>

            <input type="radio" id="hair_red" name="biographic_info_hair_color" value="red"
                <?php echo (showData('biographic_info_hair_color') == 'red') ? 'checked' : '' ?>>
            <label for="hair_red">Marriage Annulled </label><br>

            <input type="radio" id="hair_sandy" name="biographic_info_hair_color" value="sandy"
                <?php echo (showData('biographic_info_hair_color') == 'sandy') ? 'checked' : '' ?>>
            <label for="hair_sandy">Other (Explain):</label>
            <input type="text" class="form-control" name="" maxlength="37" value="<?php echo showData('') ?>"
                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-md-10">13. U.S. Armed Forces <br> Are you a member or veteran of any branch of
            the U.S. Armed Forces?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_us_citizen_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-12">14. Information About Your Admission into the United States and Current
            Immigration Status</label>
        <p style='margin-left:20px'><b>A. I arrived in the following manner</b></p><br>
        <p style='margin-left:20px'><b>Port-of-Entry</p>
    </div>
    <div class="row"
        style="display: flex; flex-wrap: wrap;  margin:0px 0px 10px 20px;  justify-items:center; align-items: center; width:98% ">
        <div class="form-group" style="flex: 3; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
            <div style="width: 100%;">
                <input type="text" class="form-control" name="" maxlength="63" value="<?php echo showData('') ?>"
                    style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
            <div style="width: 100%;">
                <select class="form-control" name="information_about_you_residence_state"
                    style="width: 100%; padding: 5px; margin-top: 3%;">
                    <option value=''>Select</option>
                    <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('information_about_you_residence_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                </select>
            </div>
        </div>
        <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Date of Entry (mm/dd/yyyy)</label>
            <input type="date" class="form-control" name="" value="<?php echo showData('') ?>"
                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>

    <h5><b>1. Current Legal Name (do not provide a nickname)</b> </h5>

    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_family_last_name" maxlength="35"
                value="<?php echo showData('information_about_you_current_family_last_name') ?>">
        </div>
    </div>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_given_first_name" maxlength="27"
                value="<?php echo showData('information_about_you_current_given_first_name') ?>">
        </div>
    </div>
    <div class=" col-md-4" style='margin-bottom:20px'>
        <label class="control-label " style="margin-left: 15px;">Middle Name (if applicable)
        </label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22"
                value="<?php echo showData('information_about_you_current_middle_name') ?>">
        </div>
    </div>


    <!-- buttons     -->
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>