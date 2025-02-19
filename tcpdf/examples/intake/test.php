<fieldset class="setpage">
    <div class="row ">
         
    <div style="margin:0px 2% 0px 2%;">
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
                <div style="width: 100%;">
                    <input type="text" maxlength="34" class="form-control" name="information_about_you_us_mailing_street_number" value="<?php echo showData('information_about_you_us_mailing_street_number') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                <div style="flex: 1; margin-left: 5%;">
                    <label>
                        <input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="apt"
                            <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="ste"
                            <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="flr"
                            <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
            </div>
            <div style="flex: 1;">
                <label class="control-label">Number</label>
                <input type="text" class="form-control" name="information_about_you_us_mailing_apt_ste_flr_value"
                    maxlength="5" value="<?php echo showData('information_about_you_us_mailing_apt_ste_flr_value') ?>"
                    style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="row"
            style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_city_town" maxlength="28" value="<?php echo showData('information_about_you_us_mailing_city_town') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                <div style="width: 100%;">
                    <select class="form-control" name="information_about_you_us_mailing_state"
                        style="width: 100%; padding: 5px; margin-top: 3%;">
                        <option value=''>Select</option>
                        <?php
foreach ($allDataCountry as $record)
{
    if ($record->state_code == showData('information_about_you_us_mailing_state')) $selected = "selected";
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
                        <input type="text" class="form-control" name="information_about_you_us_mailing_zip_code" maxlength="5" value="<?php echo showData('information_about_you_us_mailing_zip_code') ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>     

<div class="row">
<div class="col-md-4" >
                <label class="control-label ">Province</label>
           
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_us_mailing_province" value="<?php echo showData('information_about_you_us_mailing_province') ?>" />
         
            </div>
            <div class="col-md-3">
                <label class="control-label ">Postal Code</label>
           
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_us_mailing_postal_code" value="<?php echo showData('information_about_you_us_mailing_postal_code') ?>" />
          
            </div>
            <div class="col-md-5">
                <label class="control-label ">Country</label>
  <input type="text" maxlength="29" class="form-control" name="information_about_you_us_mailing_country" value="<?php echo showData('information_about_you_us_mailing_country') ?>" />
    </div>
 </div>
    <div >
        <label class=" col-md-6 my-4">3. Is your current mailing address the same as your physical address?</label>
        <div class="col-md-2 my-4">
             <input type="radio" class="form-check-input " id="mailing_address_yes" name="is_your_current_mailing_address_same_as_physical"  value="Y" <?php echo showData('is_your_current_mailing_address_same_as_physical') == "Y" ? "checked" : ""; ?> />
                <label for="mailing_address_yes" class="mx-4"> Yes</label>
             <input type="radio" class="form-check-input" id="mailing_address_no" name="is_your_current_mailing_address_same_as_physical"  value="N" <?php echo showData('is_your_current_mailing_address_same_as_physical') == "N" ? "checked" : ""; ?> />
        <label for="mailing_address_no"> No</label>
    </div>
  </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">If you answered "No" to Item Number 3., provide your physical address.</label>
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
    <div class="bg-info">
                <h4><b><i>Physical Address 
                </i></b></h4>
            </div>
    </div>
    
<!-- Dynamic Mail address and Physical Address From start -->

<!-- Mailing Address Form -->
<div style="margin:0px 2% 0px 2%;" id="mailingAddressForm">
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
                <div style="width: 100%;">
                    <input type="text" maxlength="34" class="form-control" name="" value="<?php echo showData('information_about_you_us_mailing_street_number') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                <div style="flex: 1; margin-left: 5%;">
                    <label>
                        <input type="radio" name="" value="apt"
                            <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="" value="ste"
                            <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="" value="flr"
                            <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
            </div>
            <div style="flex: 1;">
                <label class="control-label">Number</label>
                <input type="text" class="form-control" name=""
                    maxlength="5" value="<?php echo showData('information_about_you_us_mailing_apt_ste_flr_value'); ?>"
                    style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="" maxlength="28" value="<?php echo showData('information_about_you_us_mailing_city_town'); ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                <div style="width: 100%;">
                    <select class="form-control" name=""
                        style="width: 100%; padding: 5px; margin-top: 3%;">
                        <option value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
                            if ($record->state_code == showData('information_about_you_us_mailing_state')) $selected = "selected";
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
                        <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('information_about_you_us_mailing_zip_code'); ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="control-label">Province</label>
                <input type="text" maxlength="29" class="form-control" name="" value="<?php echo showData('information_about_you_us_mailing_province'); ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label">Postal Code</label>
                <input type="text" maxlength="29" class="form-control" name="" value="<?php echo showData('information_about_you_us_mailing_postal_code'); ?>" />
            </div>
            <div class="col-md-5">
                <label class="control-label">Country</label>
                <input type="text" maxlength="29" class="form-control" name="" value="<?php echo showData('information_about_you_us_mailing_country'); ?>" />
            </div>
        </div>
    </div>

<!-- Physical Address Form -->
<div id="physicalAddressForm"  style="margin:0px 2% 0px 2%;">
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
                <div style="width: 100%;">
                    <input type="text" maxlength="34" class="form-control" name="information_about_you_home_street_number" value="<?php echo showData('information_about_you_home_street_number'); ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                <div style="flex: 1; margin-left: 5%;">
                    <label>
                        <input type="radio" name="information_about_you_home_apt_ste_flr" value="apt"
                            <?php echo (showData('information_about_you_home_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="information_about_you_home_apt_ste_flr" value="ste"
                            <?php echo (showData('information_about_you_home_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="information_about_you_home_apt_ste_flr" value="flr"
                            <?php echo (showData('information_about_you_home_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
            </div>
    </div>
<!-- Dynamic Mail address and Physical Address From End -->

</div>
</div>
    </div>

</fieldset>