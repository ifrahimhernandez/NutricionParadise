 <?php 

 ////////////////////////////////////////
 ////Select user data to fill inputs ////
 ////////////////////////////////////////
$sql = "SELECT * FROM user Where user_id='".$_SESSION['user_id']."' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $shipping_name=$row["shipping_name"];
        $shipping_mail=$row["shipping_mail"];
        $shipping_phone=$row["shipping_phone"];
        $shipping_address=$row["shipping_address"];  //client shipping information
        $shipping_city=$row["shipping_city"];
        $shipping_zip_code=$row["shipping_zip_code"];
        $shipping_country=$row["shipping_country"];
        $shipping_state=$row["shipping_state"];
    }
} else {
    echo "Error!";
}

  ?>



                        <form class="form-horizontal" id="update_info" action="" method="post" role="form"  >

                          <div class="form-group">
                            <label class="col-sm-3 control-label ">First & Last Name</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control " id="shipping_name"  <?php echo "value='".$shipping_name."'";?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label ">Email</label>
                            <div class="col-sm-7">
                              <input type="email" class="form-control " id="shipping_mail" <?php echo "value='".$shipping_mail."'"; ?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label ">Phone</label>
                            <div class="col-sm-7">
                              <input type="number" min="0" class="form-control " id="shipping_phone" <?php echo "value='".$shipping_phone."'"; ?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label ">Address</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control " id="shipping_address" <?php echo "value='".$shipping_address."'"; ?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label ">City</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control " id="shipping_city" <?php echo "value='".$shipping_city."'"; ?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" min="0" class="col-sm-3 control-label ">Zip Code</label>
                            <div class="col-sm-7">
                              <input type="number" class="form-control " id="shipping_zip_code" <?php echo "value='".$shipping_zip_code."'"; ?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label ">State</label>
                            <div class="col-sm-6">
                            

                                        <select  id="shipping_state" class="form-control " required  >
                                            <option value="None" <?php if (!empty($shipping_state) && $shipping_state == 'None' ) echo 'selected = "selected"'; ?>>None</option>
                                            <option value="AL" <?php if (!empty($shipping_state) && $shipping_state == 'AL' ) echo 'selected = "selected"'; ?>>Alabama</option>
                                            <option value="AK" <?php if (!empty($shipping_state) && $shipping_state == 'AK' ) echo 'selected = "selected"'; ?>>Alaska</option>
                                            <option value="AZ" <?php if (!empty($shipping_state) && $shipping_state == 'AZ' ) echo 'selected = "selected"'; ?>>Arizona</option>
                                            <option value="AR" <?php if (!empty($shipping_state) && $shipping_state == 'AR' ) echo 'selected = "selected"'; ?>>Arkansas</option>
                                            <option value="CA" <?php if (!empty($shipping_state) && $shipping_state == 'CA' ) echo 'selected = "selected"'; ?>>California</option>
                                            <option value="CO" <?php if (!empty($shipping_state) && $shipping_state == 'CO' ) echo 'selected = "selected"'; ?>>Colorado</option>
                                            <option value="CT" <?php if (!empty($shipping_state) && $shipping_state == 'CT' ) echo 'selected = "selected"'; ?>>Connecticut</option>
                                            <option value="DE" <?php if (!empty($shipping_state) && $shipping_state == 'DE' ) echo 'selected = "selected"'; ?>>Delaware</option>
                                            <option value="DC" <?php if (!empty($shipping_state) && $shipping_state == 'DC' ) echo 'selected = "selected"'; ?>>District Of Columbia</option>
                                            <option value="FL" <?php if (!empty($shipping_state) && $shipping_state == 'FL' ) echo 'selected = "selected"'; ?>>Florida</option>
                                            <option value="GA" <?php if (!empty($shipping_state) && $shipping_state == 'GA' ) echo 'selected = "selected"'; ?>>Georgia</option>
                                            <option value="HI" <?php if (!empty($shipping_state) && $shipping_state == 'HI' ) echo 'selected = "selected"'; ?>>Hawaii</option>
                                            <option value="ID" <?php if (!empty($shipping_state) && $shipping_state == 'ID' ) echo 'selected = "selected"'; ?>>Idaho</option>
                                            <option value="IL" <?php if (!empty($shipping_state) && $shipping_state == 'IL' ) echo 'selected = "selected"'; ?>>Illinois</option>
                                            <option value="IN" <?php if (!empty($shipping_state) && $shipping_state == 'IN' ) echo 'selected = "selected"'; ?>>Indiana</option>
                                            <option value="IA" <?php if (!empty($shipping_state) && $shipping_state == 'IA' ) echo 'selected = "selected"'; ?>>Iowa</option>
                                            <option value="KS" <?php if (!empty($shipping_state) && $shipping_state == 'KS' ) echo 'selected = "selected"'; ?>>Kansas</option>
                                            <option value="KY" <?php if (!empty($shipping_state) && $shipping_state == 'KY' ) echo 'selected = "selected"'; ?>>Kentucky</option>
                                            <option value="LA" <?php if (!empty($shipping_state) && $shipping_state == 'LA' ) echo 'selected = "selected"'; ?>>Louisiana</option>
                                            <option value="ME" <?php if (!empty($shipping_state) && $shipping_state == 'ME' ) echo 'selected = "selected"'; ?>>Maine</option>
                                            <option value="MD" <?php if (!empty($shipping_state) && $shipping_state == 'MD' ) echo 'selected = "selected"'; ?>>Maryland</option>
                                            <option value="MA" <?php if (!empty($shipping_state) && $shipping_state == 'MA' ) echo 'selected = "selected"'; ?>>Massachusetts</option>
                                            <option value="MI" <?php if (!empty($shipping_state) && $shipping_state == 'MI' ) echo 'selected = "selected"'; ?>>Michigan</option>
                                            <option value="MN" <?php if (!empty($shipping_state) && $shipping_state == 'MN' ) echo 'selected = "selected"'; ?>>Minnesota</option>
                                            <option value="MS" <?php if (!empty($shipping_state) && $shipping_state == 'MS' ) echo 'selected = "selected"'; ?>>Mississippi</option>
                                            <option value="MO" <?php if (!empty($shipping_state) && $shipping_state == 'MO' ) echo 'selected = "selected"'; ?>>Missouri</option>
                                            <option value="MT" <?php if (!empty($shipping_state) && $shipping_state == 'MT' ) echo 'selected = "selected"'; ?>>Montana</option>
                                            <option value="NE" <?php if (!empty($shipping_state) && $shipping_state == 'NE' ) echo 'selected = "selected"'; ?>>Nebraska</option>
                                            <option value="NV" <?php if (!empty($shipping_state) && $shipping_state == 'NV' ) echo 'selected = "selected"'; ?>>Nevada</option>
                                            <option value="NH" <?php if (!empty($shipping_state) && $shipping_state == 'NH' ) echo 'selected = "selected"'; ?>>New Hampshire</option>
                                            <option value="NJ" <?php if (!empty($shipping_state) && $shipping_state == 'NJ' ) echo 'selected = "selected"'; ?>>New Jersey</option>
                                            <option value="NM" <?php if (!empty($shipping_state) && $shipping_state == 'NM' ) echo 'selected = "selected"'; ?>>New Mexico</option>
                                            <option value="NY" <?php if (!empty($shipping_state) && $shipping_state == 'NY' ) echo 'selected = "selected"'; ?>>New York</option>
                                            <option value="NC" <?php if (!empty($shipping_state) && $shipping_state == 'NC' ) echo 'selected = "selected"'; ?>>North Carolina</option>
                                            <option value="ND" <?php if (!empty($shipping_state) && $shipping_state == 'ND' ) echo 'selected = "selected"'; ?>>North Dakota</option>
                                            <option value="OH" <?php if (!empty($shipping_state) && $shipping_state == 'OH' ) echo 'selected = "selected"'; ?>>Ohio</option>
                                            <option value="OK" <?php if (!empty($shipping_state) && $shipping_state == 'OK' ) echo 'selected = "selected"'; ?>>Oklahoma</option>
                                            <option value="OR" <?php if (!empty($shipping_state) && $shipping_state == 'OR' ) echo 'selected = "selected"'; ?>>Oregon</option>
                                            <option value="PA" <?php if (!empty($shipping_state) && $shipping_state == 'PA' ) echo 'selected = "selected"'; ?>>Pennsylvania</option>
                                            <option value="RI" <?php if (!empty($shipping_state) && $shipping_state == 'RI' ) echo 'selected = "selected"'; ?>>Rhode Island</option>
                                            <option value="SC" <?php if (!empty($shipping_state) && $shipping_state == 'SC' ) echo 'selected = "selected"'; ?>>South Carolina</option>
                                            <option value="SD" <?php if (!empty($shipping_state) && $shipping_state == 'SD' ) echo 'selected = "selected"'; ?>>South Dakota</option>
                                            <option value="TN" <?php if (!empty($shipping_state) && $shipping_state == 'TN' ) echo 'selected = "selected"'; ?>>Tennessee</option>
                                            <option value="TX" <?php if (!empty($shipping_state) && $shipping_state == 'TX' ) echo 'selected = "selected"'; ?>>Texas</option>
                                            <option value="UT" <?php if (!empty($shipping_state) && $shipping_state == 'UT' ) echo 'selected = "selected"'; ?>>Utah</option>
                                            <option value="VT" <?php if (!empty($shipping_state) && $shipping_state == 'VT' ) echo 'selected = "selected"'; ?>>Vermont</option>
                                            <option value="VA" <?php if (!empty($shipping_state) && $shipping_state == 'VA' ) echo 'selected = "selected"'; ?>>Virginia</option>
                                            <option value="WA" <?php if (!empty($shipping_state) && $shipping_state == 'WA' ) echo 'selected = "selected"'; ?>>Washington</option>
                                            <option value="WV" <?php if (!empty($shipping_state) && $shipping_state == 'WV' ) echo 'selected = "selected"'; ?>>West Virginia</option>
                                            <option value="WI" <?php if (!empty($shipping_state) && $shipping_state == 'WI' ) echo 'selected = "selected"'; ?>>Wisconsin</option>
                                            <option value="WY" <?php if (!empty($shipping_state) && $shipping_state == 'WY' ) echo 'selected = "selected"'; ?>>Wyoming</option>
                                        </select>
                                    
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Country</label>
                            <div class="col-sm-6">
                              <select class="form-control bfh-countries"  id="shipping_country" >
                                                <option value="US" <?php if (!empty($shipping_country) && $shipping_country == 'US' ) echo 'selected = "selected"'; ?>>United States</option>
                                                <option value="AF" <?php if (!empty($shipping_country) && $shipping_country == 'AF' ) echo 'selected = "selected"'; ?>>Afghanistan</option>
                                                <option value="AL" <?php if (!empty($shipping_country) && $shipping_country == 'AL' ) echo 'selected = "selected"'; ?>>Albania</option>
                                                <option value="DZ" <?php if (!empty($shipping_country) && $shipping_country == 'DZ' ) echo 'selected = "selected"'; ?>>Algeria</option>
                                                <option value="AS" <?php if (!empty($shipping_country) && $shipping_country == 'AS' ) echo 'selected = "selected"'; ?>>American Samoa</option>
                                                <option value="AD" <?php if (!empty($shipping_country) && $shipping_country == 'AD' ) echo 'selected = "selected"'; ?>>Andorra</option>
                                                <option value="AO" <?php if (!empty($shipping_country) && $shipping_country == 'AO' ) echo 'selected = "selected"'; ?>>Angola</option>
                                                <option value="AI" <?php if (!empty($shipping_country) && $shipping_country == 'AI' ) echo 'selected = "selected"'; ?>>Anguilla</option>
                                                <option value="AQ" <?php if (!empty($shipping_country) && $shipping_country == 'AQ' ) echo 'selected = "selected"'; ?>>Antarctica</option>
                                                <option value="AG" <?php if (!empty($shipping_country) && $shipping_country == 'AG' ) echo 'selected = "selected"'; ?>>Antigua and Barbuda</option>
                                                <option value="AR" <?php if (!empty($shipping_country) && $shipping_country == 'AR' ) echo 'selected = "selected"'; ?>>Argentina</option>
                                                <option value="AM" <?php if (!empty($shipping_country) && $shipping_country == 'AM' ) echo 'selected = "selected"'; ?>>Armenia</option>
                                                <option value="AW" <?php if (!empty($shipping_country) && $shipping_country == 'AW' ) echo 'selected = "selected"'; ?>>Aruba</option>
                                                <option value="AU" <?php if (!empty($shipping_country) && $shipping_country == 'AU' ) echo 'selected = "selected"'; ?>>Australia</option>
                                                <option value="AT" <?php if (!empty($shipping_country) && $shipping_country == 'AT' ) echo 'selected = "selected"'; ?>>Austria</option>
                                                <option value="AZ" <?php if (!empty($shipping_country) && $shipping_country == 'AZ' ) echo 'selected = "selected"'; ?>>Azerbaijan</option>
                                                <option value="BS" <?php if (!empty($shipping_country) && $shipping_country == 'BS' ) echo 'selected = "selected"'; ?>>Bahamas</option>
                                                <option value="BH" <?php if (!empty($shipping_country) && $shipping_country == 'BH' ) echo 'selected = "selected"'; ?>>Bahrain</option>
                                                <option value="BD" <?php if (!empty($shipping_country) && $shipping_country == 'BD' ) echo 'selected = "selected"'; ?>>Bangladesh</option>
                                                <option value="BB" <?php if (!empty($shipping_country) && $shipping_country == 'BB' ) echo 'selected = "selected"'; ?>>Barbados</option>
                                                <option value="BY" <?php if (!empty($shipping_country) && $shipping_country == 'BY' ) echo 'selected = "selected"'; ?>>Belarus</option>
                                                <option value="BE" <?php if (!empty($shipping_country) && $shipping_country == 'BE' ) echo 'selected = "selected"'; ?>>Belgium</option>
                                                <option value="BZ" <?php if (!empty($shipping_country) && $shipping_country == 'BZ' ) echo 'selected = "selected"'; ?>>Belize</option>
                                                <option value="BJ" <?php if (!empty($shipping_country) && $shipping_country == 'BJ' ) echo 'selected = "selected"'; ?>>Benin</option>
                                                <option value="BM" <?php if (!empty($shipping_country) && $shipping_country == 'BM' ) echo 'selected = "selected"'; ?>>Bermuda</option>
                                                <option value="BT" <?php if (!empty($shipping_country) && $shipping_country == 'BT' ) echo 'selected = "selected"'; ?>>Bhutan</option>
                                                <option value="BO" <?php if (!empty($shipping_country) && $shipping_country == 'BO' ) echo 'selected = "selected"'; ?>>Bolivia</option>
                                                <option value="BQ" <?php if (!empty($shipping_country) && $shipping_country == 'BQ' ) echo 'selected = "selected"'; ?>>Bonaire, Sint Eustatius and Saba</option>
                                                <option value="BA" <?php if (!empty($shipping_country) && $shipping_country == 'BA' ) echo 'selected = "selected"'; ?>>Bosnia and Herzegovina</option>
                                                <option value="BW" <?php if (!empty($shipping_country) && $shipping_country == 'BW' ) echo 'selected = "selected"'; ?>>Botswana</option>
                                                <option value="BV" <?php if (!empty($shipping_country) && $shipping_country == 'BV' ) echo 'selected = "selected"'; ?>>Bouvet Island</option>
                                                <option value="BR" <?php if (!empty($shipping_country) && $shipping_country == 'BR' ) echo 'selected = "selected"'; ?>>Brazil</option>
                                                <option value="IO" <?php if (!empty($shipping_country) && $shipping_country == 'IO' ) echo 'selected = "selected"'; ?>>British Indian Ocean Territory</option>
                                                <option value="BN" <?php if (!empty($shipping_country) && $shipping_country == 'BN' ) echo 'selected = "selected"'; ?>>Brunei Darussalam</option>
                                                <option value="BG" <?php if (!empty($shipping_country) && $shipping_country == 'BG' ) echo 'selected = "selected"'; ?>>Bulgaria</option>
                                                <option value="BF" <?php if (!empty($shipping_country) && $shipping_country == 'BF' ) echo 'selected = "selected"'; ?>>Burkina Faso</option>
                                                <option value="BI" <?php if (!empty($shipping_country) && $shipping_country == 'BI' ) echo 'selected = "selected"'; ?>>Burundi</option>
                                                <option value="KH" <?php if (!empty($shipping_country) && $shipping_country == 'KH' ) echo 'selected = "selected"'; ?>>Cambodia</option>
                                                <option value="CM" <?php if (!empty($shipping_country) && $shipping_country == 'CM' ) echo 'selected = "selected"'; ?>>Cameroon</option>
                                                <option value="CA" <?php if (!empty($shipping_country) && $shipping_country == 'CA' ) echo 'selected = "selected"'; ?>>Canada</option>
                                                <option value="CV" <?php if (!empty($shipping_country) && $shipping_country == 'CV' ) echo 'selected = "selected"'; ?>>Cape Verde</option>
                                                <option value="KY" <?php if (!empty($shipping_country) && $shipping_country == 'KY' ) echo 'selected = "selected"'; ?>>Cayman Islands</option>
                                                <option value="CF" <?php if (!empty($shipping_country) && $shipping_country == 'CF' ) echo 'selected = "selected"'; ?>>Central African Republic</option>
                                                <option value="TD" <?php if (!empty($shipping_country) && $shipping_country == 'TD' ) echo 'selected = "selected"'; ?>>Chad</option>
                                                <option value="CL" <?php if (!empty($shipping_country) && $shipping_country == 'CL' ) echo 'selected = "selected"'; ?>>Chile</option>
                                                <option value="CN" <?php if (!empty($shipping_country) && $shipping_country == 'CN' ) echo 'selected = "selected"'; ?>>China</option>
                                                <option value="CX" <?php if (!empty($shipping_country) && $shipping_country == 'CX' ) echo 'selected = "selected"'; ?>>Christmas Island</option>
                                                <option value="CC" <?php if (!empty($shipping_country) && $shipping_country == 'CC' ) echo 'selected = "selected"'; ?>>Cocos (Keeling) Islands</option>
                                                <option value="CO" <?php if (!empty($shipping_country) && $shipping_country == 'CO' ) echo 'selected = "selected"'; ?>>Colombia</option>
                                                <option value="KM" <?php if (!empty($shipping_country) && $shipping_country == 'KM' ) echo 'selected = "selected"'; ?>>Comoros</option>
                                                <option value="CG" <?php if (!empty($shipping_country) && $shipping_country == 'CG' ) echo 'selected = "selected"'; ?>>Congo</option>
                                                <option value="CD" <?php if (!empty($shipping_country) && $shipping_country == 'CD' ) echo 'selected = "selected"'; ?>>Congo, the Democratic Republic of the</option>
                                                <option value="CK" <?php if (!empty($shipping_country) && $shipping_country == 'CK' ) echo 'selected = "selected"'; ?>>Cook Islands</option>
                                                <option value="CR" <?php if (!empty($shipping_country) && $shipping_country == 'CR' ) echo 'selected = "selected"'; ?>>Costa Rica</option>
                                                <option value="CI" <?php if (!empty($shipping_country) && $shipping_country == 'CI' ) echo 'selected = "selected"'; ?>>Côte d'Ivoire</option>
                                                <option value="HR" <?php if (!empty($shipping_country) && $shipping_country == 'HR' ) echo 'selected = "selected"'; ?>>Croatia</option>
                                                <option value="CU" <?php if (!empty($shipping_country) && $shipping_country == 'CU' ) echo 'selected = "selected"'; ?>>Cuba</option>
                                                <option value="CW" <?php if (!empty($shipping_country) && $shipping_country == 'CW' ) echo 'selected = "selected"'; ?>>Curaçao</option>
                                                <option value="CY" <?php if (!empty($shipping_country) && $shipping_country == 'CY' ) echo 'selected = "selected"'; ?>>Cyprus</option>
                                                <option value="CZ" <?php if (!empty($shipping_country) && $shipping_country == 'CZ' ) echo 'selected = "selected"'; ?>>Czech Republic</option>
                                                <option value="DK" <?php if (!empty($shipping_country) && $shipping_country == 'DK' ) echo 'selected = "selected"'; ?>>Denmark</option>
                                                <option value="DJ" <?php if (!empty($shipping_country) && $shipping_country == 'DJ' ) echo 'selected = "selected"'; ?>>Djibouti</option>
                                                <option value="DM" <?php if (!empty($shipping_country) && $shipping_country == 'DM' ) echo 'selected = "selected"'; ?>>Dominica</option>
                                                <option value="DO" <?php if (!empty($shipping_country) && $shipping_country == 'DO' ) echo 'selected = "selected"'; ?>>Dominican Republic</option>
                                                <option value="EC" <?php if (!empty($shipping_country) && $shipping_country == 'EC' ) echo 'selected = "selected"'; ?>>Ecuador</option>
                                                <option value="EG" <?php if (!empty($shipping_country) && $shipping_country == 'EG' ) echo 'selected = "selected"'; ?>>Egypt</option>
                                                <option value="SV" <?php if (!empty($shipping_country) && $shipping_country == 'SV' ) echo 'selected = "selected"'; ?>>El Salvador</option>
                                                <option value="GQ" <?php if (!empty($shipping_country) && $shipping_country == 'GQ' ) echo 'selected = "selected"'; ?>>Equatorial Guinea</option>
                                                <option value="ER" <?php if (!empty($shipping_country) && $shipping_country == 'ER' ) echo 'selected = "selected"'; ?>>Eritrea</option>
                                                <option value="EE" <?php if (!empty($shipping_country) && $shipping_country == 'EE' ) echo 'selected = "selected"'; ?>>Estonia</option>
                                                <option value="ET" <?php if (!empty($shipping_country) && $shipping_country == 'ET' ) echo 'selected = "selected"'; ?>>Ethiopia</option>
                                                <option value="FK" <?php if (!empty($shipping_country) && $shipping_country == 'FK' ) echo 'selected = "selected"'; ?>>Falkland Islands (Malvinas)</option>
                                                <option value="FO" <?php if (!empty($shipping_country) && $shipping_country == 'FO' ) echo 'selected = "selected"'; ?>>Faroe Islands</option>
                                                <option value="FJ" <?php if (!empty($shipping_country) && $shipping_country == 'FJ' ) echo 'selected = "selected"'; ?>>Fiji</option>
                                                <option value="FI" <?php if (!empty($shipping_country) && $shipping_country == 'FI' ) echo 'selected = "selected"'; ?>>Finland</option>
                                                <option value="FR" <?php if (!empty($shipping_country) && $shipping_country == 'FR' ) echo 'selected = "selected"'; ?>>France</option>
                                                <option value="GF" <?php if (!empty($shipping_country) && $shipping_country == 'GF' ) echo 'selected = "selected"'; ?>>French Guiana</option>
                                                <option value="PF" <?php if (!empty($shipping_country) && $shipping_country == 'PF' ) echo 'selected = "selected"'; ?>>French Polynesia</option>
                                                <option value="TF" <?php if (!empty($shipping_country) && $shipping_country == 'TF' ) echo 'selected = "selected"'; ?>>French Southern Territories</option>
                                                <option value="GA" <?php if (!empty($shipping_country) && $shipping_country == 'GA' ) echo 'selected = "selected"'; ?>>Gabon</option>
                                                <option value="GM" <?php if (!empty($shipping_country) && $shipping_country == 'GM' ) echo 'selected = "selected"'; ?>>Gambia</option>
                                                <option value="GE" <?php if (!empty($shipping_country) && $shipping_country == 'GE' ) echo 'selected = "selected"'; ?>>Georgia</option>
                                                <option value="DE" <?php if (!empty($shipping_country) && $shipping_country == 'DE' ) echo 'selected = "selected"'; ?>>Germany</option>
                                                <option value="GH" <?php if (!empty($shipping_country) && $shipping_country == 'GH' ) echo 'selected = "selected"'; ?>>Ghana</option>
                                                <option value="GI" <?php if (!empty($shipping_country) && $shipping_country == 'GI' ) echo 'selected = "selected"'; ?>>Gibraltar</option>
                                                <option value="GR" <?php if (!empty($shipping_country) && $shipping_country == 'GR' ) echo 'selected = "selected"'; ?>>Greece</option>
                                                <option value="GL" <?php if (!empty($shipping_country) && $shipping_country == 'GL' ) echo 'selected = "selected"'; ?>>Greenland</option>
                                                <option value="GD" <?php if (!empty($shipping_country) && $shipping_country == 'GD' ) echo 'selected = "selected"'; ?>>Grenada</option>
                                                <option value="GP" <?php if (!empty($shipping_country) && $shipping_country == 'GP' ) echo 'selected = "selected"'; ?>>Guadeloupe</option>
                                                <option value="GU" <?php if (!empty($shipping_country) && $shipping_country == 'GU' ) echo 'selected = "selected"'; ?>>Guam</option>
                                                <option value="GT" <?php if (!empty($shipping_country) && $shipping_country == 'GT' ) echo 'selected = "selected"'; ?>>Guatemala</option>
                                                <option value="GG" <?php if (!empty($shipping_country) && $shipping_country == 'GG' ) echo 'selected = "selected"'; ?>>Guernsey</option>
                                                <option value="GN" <?php if (!empty($shipping_country) && $shipping_country == 'GN' ) echo 'selected = "selected"'; ?>>Guinea</option>
                                                <option value="GW" <?php if (!empty($shipping_country) && $shipping_country == 'GW' ) echo 'selected = "selected"'; ?>>Guinea-Bissau</option>
                                                <option value="GY" <?php if (!empty($shipping_country) && $shipping_country == 'GY' ) echo 'selected = "selected"'; ?>>Guyana</option>
                                                <option value="HT" <?php if (!empty($shipping_country) && $shipping_country == 'HT' ) echo 'selected = "selected"'; ?>>Haiti</option>
                                                <option value="HM" <?php if (!empty($shipping_country) && $shipping_country == 'HM' ) echo 'selected = "selected"'; ?>>Heard Island and McDonald Islands</option>
                                                <option value="VA" <?php if (!empty($shipping_country) && $shipping_country == 'VA' ) echo 'selected = "selected"'; ?>>Holy See (Vatican City State)</option>
                                                <option value="HN" <?php if (!empty($shipping_country) && $shipping_country == 'HN' ) echo 'selected = "selected"'; ?>>Honduras</option>
                                                <option value="HK" <?php if (!empty($shipping_country) && $shipping_country == 'HK' ) echo 'selected = "selected"'; ?>>Hong Kong</option>
                                                <option value="HU" <?php if (!empty($shipping_country) && $shipping_country == 'HU' ) echo 'selected = "selected"'; ?>>Hungary</option>
                                                <option value="IS" <?php if (!empty($shipping_country) && $shipping_country == 'IS' ) echo 'selected = "selected"'; ?>>Iceland</option>
                                                <option value="IN" <?php if (!empty($shipping_country) && $shipping_country == 'IN' ) echo 'selected = "selected"'; ?>>India</option>
                                                <option value="ID" <?php if (!empty($shipping_country) && $shipping_country == 'ID' ) echo 'selected = "selected"'; ?>>Indonesia</option>
                                                <option value="IR" <?php if (!empty($shipping_country) && $shipping_country == 'IR' ) echo 'selected = "selected"'; ?>>Iran, Islamic Republic of</option>
                                                <option value="IQ" <?php if (!empty($shipping_country) && $shipping_country == 'IQ' ) echo 'selected = "selected"'; ?>>Iraq</option>
                                                <option value="IE" <?php if (!empty($shipping_country) && $shipping_country == 'IE' ) echo 'selected = "selected"'; ?>>Ireland</option>
                                                <option value="IM" <?php if (!empty($shipping_country) && $shipping_country == 'IM' ) echo 'selected = "selected"'; ?>>Isle of Man</option>
                                                <option value="IL" <?php if (!empty($shipping_country) && $shipping_country == 'IL' ) echo 'selected = "selected"'; ?>>Israel</option>
                                                <option value="IT" <?php if (!empty($shipping_country) && $shipping_country == 'IT' ) echo 'selected = "selected"'; ?>>Italy</option>
                                                <option value="JM" <?php if (!empty($shipping_country) && $shipping_country == 'JM' ) echo 'selected = "selected"'; ?>>Jamaica</option>
                                                <option value="JP" <?php if (!empty($shipping_country) && $shipping_country == 'JP' ) echo 'selected = "selected"'; ?>>Japan</option>
                                                <option value="JE" <?php if (!empty($shipping_country) && $shipping_country == 'JE' ) echo 'selected = "selected"'; ?>>Jersey</option>
                                                <option value="JO" <?php if (!empty($shipping_country) && $shipping_country == 'JO' ) echo 'selected = "selected"'; ?>>Jordan</option>
                                                <option value="KZ" <?php if (!empty($shipping_country) && $shipping_country == 'KZ' ) echo 'selected = "selected"'; ?>>Kazakhstan</option>
                                                <option value="KE" <?php if (!empty($shipping_country) && $shipping_country == 'KE' ) echo 'selected = "selected"'; ?>>Kenya</option>
                                                <option value="KI" <?php if (!empty($shipping_country) && $shipping_country == 'KI' ) echo 'selected = "selected"'; ?>>Kiribati</option>
                                                <option value="KP" <?php if (!empty($shipping_country) && $shipping_country == 'KP' ) echo 'selected = "selected"'; ?>>Korea, Democratic People's Republic of</option>
                                                <option value="KR" <?php if (!empty($shipping_country) && $shipping_country == 'KR' ) echo 'selected = "selected"'; ?>>Korea, Republic of</option>
                                                <option value="KW" <?php if (!empty($shipping_country) && $shipping_country == 'KW' ) echo 'selected = "selected"'; ?>>Kuwait</option>
                                                <option value="KG" <?php if (!empty($shipping_country) && $shipping_country == 'KG' ) echo 'selected = "selected"'; ?>>Kyrgyzstan</option>
                                                <option value="LA" <?php if (!empty($shipping_country) && $shipping_country == 'LA' ) echo 'selected = "selected"'; ?>>Lao People's Democratic Republic</option>
                                                <option value="LV" <?php if (!empty($shipping_country) && $shipping_country == 'LV' ) echo 'selected = "selected"'; ?>>Latvia</option>
                                                <option value="LB" <?php if (!empty($shipping_country) && $shipping_country == 'LB' ) echo 'selected = "selected"'; ?>>Lebanon</option>
                                                <option value="LS" <?php if (!empty($shipping_country) && $shipping_country == 'LS' ) echo 'selected = "selected"'; ?>>Lesotho</option>
                                                <option value="LR" <?php if (!empty($shipping_country) && $shipping_country == 'LR' ) echo 'selected = "selected"'; ?>>Liberia</option>
                                                <option value="LY" <?php if (!empty($shipping_country) && $shipping_country == 'LY' ) echo 'selected = "selected"'; ?>>Libya</option>
                                                <option value="LI" <?php if (!empty($shipping_country) && $shipping_country == 'LI' ) echo 'selected = "selected"'; ?>>Liechtenstein</option>
                                                <option value="LT" <?php if (!empty($shipping_country) && $shipping_country == 'LT' ) echo 'selected = "selected"'; ?>>Lithuania</option>
                                                <option value="LU" <?php if (!empty($shipping_country) && $shipping_country == 'LU' ) echo 'selected = "selected"'; ?>>Luxembourg</option>
                                                <option value="MO" <?php if (!empty($shipping_country) && $shipping_country == 'MO' ) echo 'selected = "selected"'; ?>>Macao</option>
                                                <option value="MK" <?php if (!empty($shipping_country) && $shipping_country == 'MK' ) echo 'selected = "selected"'; ?>>Macedonia, the former Yugoslav Republic of</option>
                                                <option value="MG" <?php if (!empty($shipping_country) && $shipping_country == 'MG' ) echo 'selected = "selected"'; ?>>Madagascar</option>
                                                <option value="MW" <?php if (!empty($shipping_country) && $shipping_country == 'MW' ) echo 'selected = "selected"'; ?>>Malawi</option>
                                                <option value="MY" <?php if (!empty($shipping_country) && $shipping_country == 'MY' ) echo 'selected = "selected"'; ?>>Malaysia</option>
                                                <option value="MV" <?php if (!empty($shipping_country) && $shipping_country == 'MV' ) echo 'selected = "selected"'; ?>>Maldives</option>
                                                <option value="ML" <?php if (!empty($shipping_country) && $shipping_country == 'ML' ) echo 'selected = "selected"'; ?>>Mali</option>
                                                <option value="MT" <?php if (!empty($shipping_country) && $shipping_country == 'MT' ) echo 'selected = "selected"'; ?>>Malta</option>
                                                <option value="MH" <?php if (!empty($shipping_country) && $shipping_country == 'MH' ) echo 'selected = "selected"'; ?>>Marshall Islands</option>
                                                <option value="MQ" <?php if (!empty($shipping_country) && $shipping_country == 'MQ' ) echo 'selected = "selected"'; ?>>Martinique</option>
                                                <option value="MR" <?php if (!empty($shipping_country) && $shipping_country == 'MR' ) echo 'selected = "selected"'; ?>>Mauritania</option>
                                                <option value="MU" <?php if (!empty($shipping_country) && $shipping_country == 'MU' ) echo 'selected = "selected"'; ?>>Mauritius</option>
                                                <option value="YT" <?php if (!empty($shipping_country) && $shipping_country == 'YT' ) echo 'selected = "selected"'; ?>>Mayotte</option>
                                                <option value="MX" <?php if (!empty($shipping_country) && $shipping_country == 'MX' ) echo 'selected = "selected"'; ?>>Mexico</option>
                                                <option value="FM" <?php if (!empty($shipping_country) && $shipping_country == 'FM' ) echo 'selected = "selected"'; ?>>Micronesia, Federated States of</option>
                                                <option value="MD" <?php if (!empty($shipping_country) && $shipping_country == 'MD' ) echo 'selected = "selected"'; ?>>Moldova, Republic of</option>
                                                <option value="MC" <?php if (!empty($shipping_country) && $shipping_country == 'MC' ) echo 'selected = "selected"'; ?>>Monaco</option>
                                                <option value="MN" <?php if (!empty($shipping_country) && $shipping_country == 'MN' ) echo 'selected = "selected"'; ?>>Mongolia</option>
                                                <option value="ME" <?php if (!empty($shipping_country) && $shipping_country == 'ME' ) echo 'selected = "selected"'; ?>>Montenegro</option>
                                                <option value="MS" <?php if (!empty($shipping_country) && $shipping_country == 'MS' ) echo 'selected = "selected"'; ?>>Montserrat</option>
                                                <option value="MA" <?php if (!empty($shipping_country) && $shipping_country == 'MA' ) echo 'selected = "selected"'; ?>>Morocco</option>
                                                <option value="MZ" <?php if (!empty($shipping_country) && $shipping_country == 'MZ' ) echo 'selected = "selected"'; ?>>Mozambique</option>
                                                <option value="MM" <?php if (!empty($shipping_country) && $shipping_country == 'MM' ) echo 'selected = "selected"'; ?>>Myanmar</option>
                                                <option value="NA" <?php if (!empty($shipping_country) && $shipping_country == 'NA' ) echo 'selected = "selected"'; ?>>Namibia</option>
                                                <option value="NR" <?php if (!empty($shipping_country) && $shipping_country == 'NR' ) echo 'selected = "selected"'; ?>>Nauru</option>
                                                <option value="NP" <?php if (!empty($shipping_country) && $shipping_country == 'NP' ) echo 'selected = "selected"'; ?>>Nepal</option>
                                                <option value="NL" <?php if (!empty($shipping_country) && $shipping_country == 'NL' ) echo 'selected = "selected"'; ?>>Netherlands</option>
                                                <option value="NC" <?php if (!empty($shipping_country) && $shipping_country == 'NC' ) echo 'selected = "selected"'; ?>>New Caledonia</option>
                                                <option value="NZ" <?php if (!empty($shipping_country) && $shipping_country == 'NZ' ) echo 'selected = "selected"'; ?>>New Zealand</option>
                                                <option value="NI" <?php if (!empty($shipping_country) && $shipping_country == 'NI' ) echo 'selected = "selected"'; ?>>Nicaragua</option>
                                                <option value="NE" <?php if (!empty($shipping_country) && $shipping_country == 'NE' ) echo 'selected = "selected"'; ?>>Niger</option>
                                                <option value="NG" <?php if (!empty($shipping_country) && $shipping_country == 'NG' ) echo 'selected = "selected"'; ?>>Nigeria</option>
                                                <option value="NU" <?php if (!empty($shipping_country) && $shipping_country == 'NU' ) echo 'selected = "selected"'; ?>>Niue</option>
                                                <option value="NF" <?php if (!empty($shipping_country) && $shipping_country == 'NF' ) echo 'selected = "selected"'; ?>>Norfolk Island</option>
                                                <option value="MP" <?php if (!empty($shipping_country) && $shipping_country == 'MP' ) echo 'selected = "selected"'; ?>>Northern Mariana Islands</option>
                                                <option value="NO" <?php if (!empty($shipping_country) && $shipping_country == 'NO' ) echo 'selected = "selected"'; ?>>Norway</option>
                                                <option value="OM" <?php if (!empty($shipping_country) && $shipping_country == 'OM' ) echo 'selected = "selected"'; ?>>Oman</option>
                                                <option value="PK" <?php if (!empty($shipping_country) && $shipping_country == 'PK' ) echo 'selected = "selected"'; ?>>Pakistan</option>
                                                <option value="PW" <?php if (!empty($shipping_country) && $shipping_country == 'PW' ) echo 'selected = "selected"'; ?>>Palau</option>
                                                <option value="PS" <?php if (!empty($shipping_country) && $shipping_country == 'PS' ) echo 'selected = "selected"'; ?>>Palestinian Territory, Occupied</option>
                                                <option value="PA" <?php if (!empty($shipping_country) && $shipping_country == 'PA' ) echo 'selected = "selected"'; ?>>Panama</option>
                                                <option value="PG" <?php if (!empty($shipping_country) && $shipping_country == 'PG' ) echo 'selected = "selected"'; ?>>Papua New Guinea</option>
                                                <option value="PY" <?php if (!empty($shipping_country) && $shipping_country == 'PY' ) echo 'selected = "selected"'; ?>>Paraguay</option>
                                                <option value="PE" <?php if (!empty($shipping_country) && $shipping_country == 'PE' ) echo 'selected = "selected"'; ?>>Peru</option>
                                                <option value="PH" <?php if (!empty($shipping_country) && $shipping_country == 'PH' ) echo 'selected = "selected"'; ?>>Philippines</option>
                                                <option value="PN" <?php if (!empty($shipping_country) && $shipping_country == 'PN' ) echo 'selected = "selected"'; ?>>Pitcairn</option>
                                                <option value="PL" <?php if (!empty($shipping_country) && $shipping_country == 'PL' ) echo 'selected = "selected"'; ?>>Poland</option>
                                                <option value="PT" <?php if (!empty($shipping_country) && $shipping_country == 'PT' ) echo 'selected = "selected"'; ?>>Portugal</option>
                                                <option value="PR" <?php if (!empty($shipping_country) && $shipping_country == 'PR' ) echo 'selected = "selected"'; ?>>Puerto Rico</option>
                                                <option value="QA" <?php if (!empty($shipping_country) && $shipping_country == 'QA' ) echo 'selected = "selected"'; ?>>Qatar</option>
                                                <option value="RE" <?php if (!empty($shipping_country) && $shipping_country == 'RE' ) echo 'selected = "selected"'; ?>>Réunion</option>
                                                <option value="RO" <?php if (!empty($shipping_country) && $shipping_country == 'RO' ) echo 'selected = "selected"'; ?>>Romania</option>
                                                <option value="RU" <?php if (!empty($shipping_country) && $shipping_country == 'RU' ) echo 'selected = "selected"'; ?>>Russian Federation</option>
                                                <option value="RW" <?php if (!empty($shipping_country) && $shipping_country == 'RW' ) echo 'selected = "selected"'; ?>>Rwanda</option>
                                                <option value="BL" <?php if (!empty($shipping_country) && $shipping_country == 'BL' ) echo 'selected = "selected"'; ?>>Saint Barthélemy</option>
                                                <option value="SH" <?php if (!empty($shipping_country) && $shipping_country == 'SH' ) echo 'selected = "selected"'; ?>>Saint Helena, Ascension and Tristan da Cunha</option>
                                                <option value="KN" <?php if (!empty($shipping_country) && $shipping_country == 'KN' ) echo 'selected = "selected"'; ?>>Saint Kitts and Nevis</option>
                                                <option value="LC" <?php if (!empty($shipping_country) && $shipping_country == 'LC' ) echo 'selected = "selected"'; ?>>Saint Lucia</option>
                                                <option value="MF" <?php if (!empty($shipping_country) && $shipping_country == 'MF' ) echo 'selected = "selected"'; ?>>Saint Martin (French part)</option>
                                                <option value="PM" <?php if (!empty($shipping_country) && $shipping_country == 'PM' ) echo 'selected = "selected"'; ?>>Saint Pierre and Miquelon</option>
                                                <option value="VC" <?php if (!empty($shipping_country) && $shipping_country == 'VC' ) echo 'selected = "selected"'; ?>>Saint Vincent and the Grenadines</option>
                                                <option value="WS" <?php if (!empty($shipping_country) && $shipping_country == 'WS' ) echo 'selected = "selected"'; ?>>Samoa</option>
                                                <option value="SM" <?php if (!empty($shipping_country) && $shipping_country == 'SM' ) echo 'selected = "selected"'; ?>>San Marino</option>
                                                <option value="ST" <?php if (!empty($shipping_country) && $shipping_country == 'ST' ) echo 'selected = "selected"'; ?>>Sao Tome and Principe</option>
                                                <option value="SA" <?php if (!empty($shipping_country) && $shipping_country == 'SA' ) echo 'selected = "selected"'; ?>>Saudi Arabia</option>
                                                <option value="SN" <?php if (!empty($shipping_country) && $shipping_country == 'SN' ) echo 'selected = "selected"'; ?>>Senegal</option>
                                                <option value="RS" <?php if (!empty($shipping_country) && $shipping_country == 'RS' ) echo 'selected = "selected"'; ?>>Serbia</option>
                                                <option value="SC" <?php if (!empty($shipping_country) && $shipping_country == 'SC' ) echo 'selected = "selected"'; ?>>Seychelles</option>
                                                <option value="SL" <?php if (!empty($shipping_country) && $shipping_country == 'SL' ) echo 'selected = "selected"'; ?>>Sierra Leone</option>
                                                <option value="SG" <?php if (!empty($shipping_country) && $shipping_country == 'SG' ) echo 'selected = "selected"'; ?>>Singapore</option>
                                                <option value="SX" <?php if (!empty($shipping_country) && $shipping_country == 'SX' ) echo 'selected = "selected"'; ?>>Sint Maarten (Dutch part)</option>
                                                <option value="SK" <?php if (!empty($shipping_country) && $shipping_country == 'SK' ) echo 'selected = "selected"'; ?>>Slovakia</option>
                                                <option value="SI" <?php if (!empty($shipping_country) && $shipping_country == 'SI' ) echo 'selected = "selected"'; ?>>Slovenia</option>
                                                <option value="SB" <?php if (!empty($shipping_country) && $shipping_country == 'SB' ) echo 'selected = "selected"'; ?>>Solomon Islands</option>
                                                <option value="SO" <?php if (!empty($shipping_country) && $shipping_country == 'SO' ) echo 'selected = "selected"'; ?>>Somalia</option>
                                                <option value="ZA" <?php if (!empty($shipping_country) && $shipping_country == 'ZA' ) echo 'selected = "selected"'; ?>>South Africa</option>
                                                <option value="GS" <?php if (!empty($shipping_country) && $shipping_country == 'GS' ) echo 'selected = "selected"'; ?>>South Georgia and the South Sandwich Islands</option>
                                                <option value="SS" <?php if (!empty($shipping_country) && $shipping_country == 'SS' ) echo 'selected = "selected"'; ?>>South Sudan</option>
                                                <option value="ES" <?php if (!empty($shipping_country) && $shipping_country == 'ES' ) echo 'selected = "selected"'; ?>>Spain</option>
                                                <option value="LK" <?php if (!empty($shipping_country) && $shipping_country == 'LK' ) echo 'selected = "selected"'; ?>>Sri Lanka</option>
                                                <option value="SD" <?php if (!empty($shipping_country) && $shipping_country == 'SD' ) echo 'selected = "selected"'; ?>>Sudan</option>
                                                <option value="SR" <?php if (!empty($shipping_country) && $shipping_country == 'SR' ) echo 'selected = "selected"'; ?>>Suriname</option>
                                                <option value="SJ" <?php if (!empty($shipping_country) && $shipping_country == 'SJ' ) echo 'selected = "selected"'; ?>>Svalbard and Jan Mayen</option>
                                                <option value="SZ" <?php if (!empty($shipping_country) && $shipping_country == 'SZ' ) echo 'selected = "selected"'; ?>>Swaziland</option>
                                                <option value="SE" <?php if (!empty($shipping_country) && $shipping_country == 'SE' ) echo 'selected = "selected"'; ?>>Sweden</option>
                                                <option value="CH" <?php if (!empty($shipping_country) && $shipping_country == 'CH' ) echo 'selected = "selected"'; ?>>Switzerland</option>
                                                <option value="SY" <?php if (!empty($shipping_country) && $shipping_country == 'SY' ) echo 'selected = "selected"'; ?>>Syrian Arab Republic</option>
                                                <option value="TW" <?php if (!empty($shipping_country) && $shipping_country == 'TW' ) echo 'selected = "selected"'; ?>>Taiwan, Province of China</option>
                                                <option value="TJ" <?php if (!empty($shipping_country) && $shipping_country == 'TJ' ) echo 'selected = "selected"'; ?>>Tajikistan</option>
                                                <option value="TZ" <?php if (!empty($shipping_country) && $shipping_country == 'TZ' ) echo 'selected = "selected"'; ?>>Tanzania, United Republic of</option>
                                                <option value="TH" <?php if (!empty($shipping_country) && $shipping_country == 'TH' ) echo 'selected = "selected"'; ?>>Thailand</option>
                                                <option value="TL" <?php if (!empty($shipping_country) && $shipping_country == 'TL' ) echo 'selected = "selected"'; ?>>Timor-Leste</option>
                                                <option value="TG" <?php if (!empty($shipping_country) && $shipping_country == 'TG' ) echo 'selected = "selected"'; ?>>Togo</option>
                                                <option value="TK" <?php if (!empty($shipping_country) && $shipping_country == 'TK' ) echo 'selected = "selected"'; ?>>Tokelau</option>
                                                <option value="TO" <?php if (!empty($shipping_country) && $shipping_country == 'TO' ) echo 'selected = "selected"'; ?>>Tonga</option>
                                                <option value="TT" <?php if (!empty($shipping_country) && $shipping_country == 'TT' ) echo 'selected = "selected"'; ?>>Trinidad and Tobago</option>
                                                <option value="TN" <?php if (!empty($shipping_country) && $shipping_country == 'TN' ) echo 'selected = "selected"'; ?>>Tunisia</option>
                                                <option value="TR" <?php if (!empty($shipping_country) && $shipping_country == 'TR' ) echo 'selected = "selected"'; ?>>Turkey</option>
                                                <option value="TM" <?php if (!empty($shipping_country) && $shipping_country == 'TM' ) echo 'selected = "selected"'; ?>>Turkmenistan</option>
                                                <option value="TC" <?php if (!empty($shipping_country) && $shipping_country == 'TC' ) echo 'selected = "selected"'; ?>>Turks and Caicos Islands</option>
                                                <option value="TV" <?php if (!empty($shipping_country) && $shipping_country == 'TV' ) echo 'selected = "selected"'; ?>>Tuvalu</option>
                                                <option value="UG" <?php if (!empty($shipping_country) && $shipping_country == 'UG' ) echo 'selected = "selected"'; ?>>Uganda</option>
                                                <option value="UA" <?php if (!empty($shipping_country) && $shipping_country == 'UA' ) echo 'selected = "selected"'; ?>>Ukraine</option>
                                                <option value="AE" <?php if (!empty($shipping_country) && $shipping_country == 'AE' ) echo 'selected = "selected"'; ?>>United Arab Emirates</option>
                                                <option value="GB" <?php if (!empty($shipping_country) && $shipping_country == 'GB' ) echo 'selected = "selected"'; ?>>United Kingdom</option>
                                                <option value="UM" <?php if (!empty($shipping_country) && $shipping_country == 'UM' ) echo 'selected = "selected"'; ?>>United States Minor Outlying Islands</option>
                                                <option value="UY" <?php if (!empty($shipping_country) && $shipping_country == 'UY' ) echo 'selected = "selected"'; ?>>Uruguay</option>
                                                <option value="UZ" <?php if (!empty($shipping_country) && $shipping_country == 'UZ' ) echo 'selected = "selected"'; ?>>Uzbekistan</option>
                                                <option value="VU" <?php if (!empty($shipping_country) && $shipping_country == 'VU' ) echo 'selected = "selected"'; ?>>Vanuatu</option>
                                                <option value="VE" <?php if (!empty($shipping_country) && $shipping_country == 'VE' ) echo 'selected = "selected"'; ?>>Venezuela, Bolivarian Republic of</option>
                                                <option value="VN" <?php if (!empty($shipping_country) && $shipping_country == 'VN' ) echo 'selected = "selected"'; ?>>Viet Nam</option>
                                                <option value="VG" <?php if (!empty($shipping_country) && $shipping_country == 'VG' ) echo 'selected = "selected"'; ?>>Virgin Islands, British</option>
                                                <option value="VI" <?php if (!empty($shipping_country) && $shipping_country == 'VI' ) echo 'selected = "selected"'; ?>>Virgin Islands, U.S.</option>
                                                <option value="WF" <?php if (!empty($shipping_country) && $shipping_country == 'WF' ) echo 'selected = "selected"'; ?>>Wallis and Futuna</option>
                                                <option value="EH" <?php if (!empty($shipping_country) && $shipping_country == 'EH' ) echo 'selected = "selected"'; ?>>Western Sahara</option>
                                                <option value="YE" <?php if (!empty($shipping_country) && $shipping_country == 'YE' ) echo 'selected = "selected"'; ?>>Yemen</option>
                                                <option value="ZM" <?php if (!empty($shipping_country) && $shipping_country == 'ZM' ) echo 'selected = "selected"'; ?>>Zambia</option>
                                                <option value="ZW" <?php if (!empty($shipping_country) && $shipping_country == 'ZW' ) echo 'selected = "selected"'; ?>>Zimbabwe</option>
                                        </select>
                            </div>
                          </div>

                          
                          <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-4 col-md-4 col-xs-4">
                              <button type="submit" id="updateshipbutton" class="btn btn-success btn-md " ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Update</button>
                            </div>
                          </div>
                        </form>