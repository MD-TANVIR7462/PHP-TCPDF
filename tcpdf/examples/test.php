if (showData('other_information_about_you_gender') == "male") $checked_male = "checked";else $checked_male = "";
if (showData('other_information_about_you_gender') == "female") $checked_female = "checked";else $checked_female = "";
checked="' . $checked_male . '"
checked="' . $checked_female . '"


if (showData('other_information_about_you_marital_status') == "single") $checked_single = "checked";else $checked_single = "";
if (showData('other_information_about_you_marital_status') == "married") $checked_married = "checked";else $checked_married = "";
if (showData('other_information_about_you_marital_status') == "divorced") $checked_divorce = "checked";else $checked_divorce = "";
if (showData('other_information_about_you_marital_status') == "widowed") $checked_widowed = "checked";else $checked_divorce = "";

if (showData('i_589_fluent_in_english_status') == "Y") $checked_Y = "checked";else $checked_Y = "";
if (showData('i_589_fluent_in_english_status') == "N") $checked_N = "checked";else $checked_N = "";
checked="' . $checked_Y . '"
checked="' . $checked_N . '"

if (showData('i_589_fluent_in_english_status') == "Y") $checked = "checked";else $checked = "";
checked="' . $checked . '"
