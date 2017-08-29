 <?php 

 ////////////////////////////////////////
 ////Select user data to fill inputs ////
 ////////////////////////////////////////
$sql = "SELECT * FROM user Where user_id='".$_SESSION['user_id']."' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $username=$row["username"];
        $email=$row["email"];
        $phone=$row["phone"];
        $address=$row["address"];
        $city=$row["city"];
        $zip_code=$row["zip_code"];
        $country=$row["country"];
        $state=$row["state"];
    }
} else {
    echo "Error!";
}

  ?>



                        <form class="form-horizontal" id="update_info"  role="form"  >

                          <div class="form-group">
                            <label class="col-sm-3 control-label ">Username</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control " id="username12"  <?php echo "value='".$username."'"; $_SESSION["originalusername"]= $username;?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label ">Email</label>
                            <div class="col-sm-7">
                              <input type="email" class="form-control " id="email12" <?php echo "value='".$email."'"; $_SESSION["originalemail"]= $email;?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label ">Phone</label>
                            <div class="col-sm-7">
                              <input type="number" min="0" class="form-control " id="phone12" <?php echo "value='".$phone."'"; ?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label ">Address</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control " id="address12" <?php echo "value='".$address."'"; ?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label ">City</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control " id="city12" <?php echo "value='".$city."'"; ?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" min="0" class="col-sm-3 control-label ">Zip Code</label>
                            <div class="col-sm-7">
                              <input type="number" class="form-control " id="zip_code12" <?php echo "value='".$zip_code."'"; ?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label ">State</label>
                            <div class="col-sm-6">
                            

                                        <select  id="state12" class="form-control " required  >
                                            <option value="None" <?php if (!empty($state) && $state == 'None' ) echo 'selected = "selected"'; ?>>None</option>
                                            <option value="AL" <?php if (!empty($state) && $state == 'AL' ) echo 'selected = "selected"'; ?>>Alabama</option>
                                            <option value="AK" <?php if (!empty($state) && $state == 'AK' ) echo 'selected = "selected"'; ?>>Alaska</option>
                                            <option value="AZ" <?php if (!empty($state) && $state == 'AZ' ) echo 'selected = "selected"'; ?>>Arizona</option>
                                            <option value="AR" <?php if (!empty($state) && $state == 'AR' ) echo 'selected = "selected"'; ?>>Arkansas</option>
                                            <option value="CA" <?php if (!empty($state) && $state == 'CA' ) echo 'selected = "selected"'; ?>>California</option>
                                            <option value="CO" <?php if (!empty($state) && $state == 'CO' ) echo 'selected = "selected"'; ?>>Colorado</option>
                                            <option value="CT" <?php if (!empty($state) && $state == 'CT' ) echo 'selected = "selected"'; ?>>Connecticut</option>
                                            <option value="DE" <?php if (!empty($state) && $state == 'DE' ) echo 'selected = "selected"'; ?>>Delaware</option>
                                            <option value="DC" <?php if (!empty($state) && $state == 'DC' ) echo 'selected = "selected"'; ?>>District Of Columbia</option>
                                            <option value="FL" <?php if (!empty($state) && $state == 'FL' ) echo 'selected = "selected"'; ?>>Florida</option>
                                            <option value="GA" <?php if (!empty($state) && $state == 'GA' ) echo 'selected = "selected"'; ?>>Georgia</option>
                                            <option value="HI" <?php if (!empty($state) && $state == 'HI' ) echo 'selected = "selected"'; ?>>Hawaii</option>
                                            <option value="ID" <?php if (!empty($state) && $state == 'ID' ) echo 'selected = "selected"'; ?>>Idaho</option>
                                            <option value="IL" <?php if (!empty($state) && $state == 'IL' ) echo 'selected = "selected"'; ?>>Illinois</option>
                                            <option value="IN" <?php if (!empty($state) && $state == 'IN' ) echo 'selected = "selected"'; ?>>Indiana</option>
                                            <option value="IA" <?php if (!empty($state) && $state == 'IA' ) echo 'selected = "selected"'; ?>>Iowa</option>
                                            <option value="KS" <?php if (!empty($state) && $state == 'KS' ) echo 'selected = "selected"'; ?>>Kansas</option>
                                            <option value="KY" <?php if (!empty($state) && $state == 'KY' ) echo 'selected = "selected"'; ?>>Kentucky</option>
                                            <option value="LA" <?php if (!empty($state) && $state == 'LA' ) echo 'selected = "selected"'; ?>>Louisiana</option>
                                            <option value="ME" <?php if (!empty($state) && $state == 'ME' ) echo 'selected = "selected"'; ?>>Maine</option>
                                            <option value="MD" <?php if (!empty($state) && $state == 'MD' ) echo 'selected = "selected"'; ?>>Maryland</option>
                                            <option value="MA" <?php if (!empty($state) && $state == 'MA' ) echo 'selected = "selected"'; ?>>Massachusetts</option>
                                            <option value="MI" <?php if (!empty($state) && $state == 'MI' ) echo 'selected = "selected"'; ?>>Michigan</option>
                                            <option value="MN" <?php if (!empty($state) && $state == 'MN' ) echo 'selected = "selected"'; ?>>Minnesota</option>
                                            <option value="MS" <?php if (!empty($state) && $state == 'MS' ) echo 'selected = "selected"'; ?>>Mississippi</option>
                                            <option value="MO" <?php if (!empty($state) && $state == 'MO' ) echo 'selected = "selected"'; ?>>Missouri</option>
                                            <option value="MT" <?php if (!empty($state) && $state == 'MT' ) echo 'selected = "selected"'; ?>>Montana</option>
                                            <option value="NE" <?php if (!empty($state) && $state == 'NE' ) echo 'selected = "selected"'; ?>>Nebraska</option>
                                            <option value="NV" <?php if (!empty($state) && $state == 'NV' ) echo 'selected = "selected"'; ?>>Nevada</option>
                                            <option value="NH" <?php if (!empty($state) && $state == 'NH' ) echo 'selected = "selected"'; ?>>New Hampshire</option>
                                            <option value="NJ" <?php if (!empty($state) && $state == 'NJ' ) echo 'selected = "selected"'; ?>>New Jersey</option>
                                            <option value="NM" <?php if (!empty($state) && $state == 'NM' ) echo 'selected = "selected"'; ?>>New Mexico</option>
                                            <option value="NY" <?php if (!empty($state) && $state == 'NY' ) echo 'selected = "selected"'; ?>>New York</option>
                                            <option value="NC" <?php if (!empty($state) && $state == 'NC' ) echo 'selected = "selected"'; ?>>North Carolina</option>
                                            <option value="ND" <?php if (!empty($state) && $state == 'ND' ) echo 'selected = "selected"'; ?>>North Dakota</option>
                                            <option value="OH" <?php if (!empty($state) && $state == 'OH' ) echo 'selected = "selected"'; ?>>Ohio</option>
                                            <option value="OK" <?php if (!empty($state) && $state == 'OK' ) echo 'selected = "selected"'; ?>>Oklahoma</option>
                                            <option value="OR" <?php if (!empty($state) && $state == 'OR' ) echo 'selected = "selected"'; ?>>Oregon</option>
                                            <option value="PA" <?php if (!empty($state) && $state == 'PA' ) echo 'selected = "selected"'; ?>>Pennsylvania</option>
                                            <option value="RI" <?php if (!empty($state) && $state == 'RI' ) echo 'selected = "selected"'; ?>>Rhode Island</option>
                                            <option value="SC" <?php if (!empty($state) && $state == 'SC' ) echo 'selected = "selected"'; ?>>South Carolina</option>
                                            <option value="SD" <?php if (!empty($state) && $state == 'SD' ) echo 'selected = "selected"'; ?>>South Dakota</option>
                                            <option value="TN" <?php if (!empty($state) && $state == 'TN' ) echo 'selected = "selected"'; ?>>Tennessee</option>
                                            <option value="TX" <?php if (!empty($state) && $state == 'TX' ) echo 'selected = "selected"'; ?>>Texas</option>
                                            <option value="UT" <?php if (!empty($state) && $state == 'UT' ) echo 'selected = "selected"'; ?>>Utah</option>
                                            <option value="VT" <?php if (!empty($state) && $state == 'VT' ) echo 'selected = "selected"'; ?>>Vermont</option>
                                            <option value="VA" <?php if (!empty($state) && $state == 'VA' ) echo 'selected = "selected"'; ?>>Virginia</option>
                                            <option value="WA" <?php if (!empty($state) && $state == 'WA' ) echo 'selected = "selected"'; ?>>Washington</option>
                                            <option value="WV" <?php if (!empty($state) && $state == 'WV' ) echo 'selected = "selected"'; ?>>West Virginia</option>
                                            <option value="WI" <?php if (!empty($state) && $state == 'WI' ) echo 'selected = "selected"'; ?>>Wisconsin</option>
                                            <option value="WY" <?php if (!empty($state) && $state == 'WY' ) echo 'selected = "selected"'; ?>>Wyoming</option>
                                        </select>
                                    
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Country</label>
                            <div class="col-sm-6">
                              <select class="form-control bfh-countries"  id="country12" >
                                                <option value="US" <?php if (!empty($country) && $country == 'US' ) echo 'selected = "selected"'; ?>>United States</option>
                                                <option value="AF" <?php if (!empty($country) && $country == 'AF' ) echo 'selected = "selected"'; ?>>Afghanistan</option>
                                                <option value="AL" <?php if (!empty($country) && $country == 'AL' ) echo 'selected = "selected"'; ?>>Albania</option>
                                                <option value="DZ" <?php if (!empty($country) && $country == 'DZ' ) echo 'selected = "selected"'; ?>>Algeria</option>
                                                <option value="AS" <?php if (!empty($country) && $country == 'AS' ) echo 'selected = "selected"'; ?>>American Samoa</option>
                                                <option value="AD" <?php if (!empty($country) && $country == 'AD' ) echo 'selected = "selected"'; ?>>Andorra</option>
                                                <option value="AO" <?php if (!empty($country) && $country == 'AO' ) echo 'selected = "selected"'; ?>>Angola</option>
                                                <option value="AI" <?php if (!empty($country) && $country == 'AI' ) echo 'selected = "selected"'; ?>>Anguilla</option>
                                                <option value="AQ" <?php if (!empty($country) && $country == 'AQ' ) echo 'selected = "selected"'; ?>>Antarctica</option>
                                                <option value="AG" <?php if (!empty($country) && $country == 'AG' ) echo 'selected = "selected"'; ?>>Antigua and Barbuda</option>
                                                <option value="AR" <?php if (!empty($country) && $country == 'AR' ) echo 'selected = "selected"'; ?>>Argentina</option>
                                                <option value="AM" <?php if (!empty($country) && $country == 'AM' ) echo 'selected = "selected"'; ?>>Armenia</option>
                                                <option value="AW" <?php if (!empty($country) && $country == 'AW' ) echo 'selected = "selected"'; ?>>Aruba</option>
                                                <option value="AU" <?php if (!empty($country) && $country == 'AU' ) echo 'selected = "selected"'; ?>>Australia</option>
                                                <option value="AT" <?php if (!empty($country) && $country == 'AT' ) echo 'selected = "selected"'; ?>>Austria</option>
                                                <option value="AZ" <?php if (!empty($country) && $country == 'AZ' ) echo 'selected = "selected"'; ?>>Azerbaijan</option>
                                                <option value="BS" <?php if (!empty($country) && $country == 'BS' ) echo 'selected = "selected"'; ?>>Bahamas</option>
                                                <option value="BH" <?php if (!empty($country) && $country == 'BH' ) echo 'selected = "selected"'; ?>>Bahrain</option>
                                                <option value="BD" <?php if (!empty($country) && $country == 'BD' ) echo 'selected = "selected"'; ?>>Bangladesh</option>
                                                <option value="BB" <?php if (!empty($country) && $country == 'BB' ) echo 'selected = "selected"'; ?>>Barbados</option>
                                                <option value="BY" <?php if (!empty($country) && $country == 'BY' ) echo 'selected = "selected"'; ?>>Belarus</option>
                                                <option value="BE" <?php if (!empty($country) && $country == 'BE' ) echo 'selected = "selected"'; ?>>Belgium</option>
                                                <option value="BZ" <?php if (!empty($country) && $country == 'BZ' ) echo 'selected = "selected"'; ?>>Belize</option>
                                                <option value="BJ" <?php if (!empty($country) && $country == 'BJ' ) echo 'selected = "selected"'; ?>>Benin</option>
                                                <option value="BM" <?php if (!empty($country) && $country == 'BM' ) echo 'selected = "selected"'; ?>>Bermuda</option>
                                                <option value="BT" <?php if (!empty($country) && $country == 'BT' ) echo 'selected = "selected"'; ?>>Bhutan</option>
                                                <option value="BO" <?php if (!empty($country) && $country == 'BO' ) echo 'selected = "selected"'; ?>>Bolivia, Plurinational State of</option>
                                                <option value="BQ" <?php if (!empty($country) && $country == 'BQ' ) echo 'selected = "selected"'; ?>>Bonaire, Sint Eustatius and Saba</option>
                                                <option value="BA" <?php if (!empty($country) && $country == 'BA' ) echo 'selected = "selected"'; ?>>Bosnia and Herzegovina</option>
                                                <option value="BW" <?php if (!empty($country) && $country == 'BW' ) echo 'selected = "selected"'; ?>>Botswana</option>
                                                <option value="BV" <?php if (!empty($country) && $country == 'BV' ) echo 'selected = "selected"'; ?>>Bouvet Island</option>
                                                <option value="BR" <?php if (!empty($country) && $country == 'BR' ) echo 'selected = "selected"'; ?>>Brazil</option>
                                                <option value="IO" <?php if (!empty($country) && $country == 'IO' ) echo 'selected = "selected"'; ?>>British Indian Ocean Territory</option>
                                                <option value="BN" <?php if (!empty($country) && $country == 'BN' ) echo 'selected = "selected"'; ?>>Brunei Darussalam</option>
                                                <option value="BG" <?php if (!empty($country) && $country == 'BG' ) echo 'selected = "selected"'; ?>>Bulgaria</option>
                                                <option value="BF" <?php if (!empty($country) && $country == 'BF' ) echo 'selected = "selected"'; ?>>Burkina Faso</option>
                                                <option value="BI" <?php if (!empty($country) && $country == 'BI' ) echo 'selected = "selected"'; ?>>Burundi</option>
                                                <option value="KH" <?php if (!empty($country) && $country == 'KH' ) echo 'selected = "selected"'; ?>>Cambodia</option>
                                                <option value="CM" <?php if (!empty($country) && $country == 'CM' ) echo 'selected = "selected"'; ?>>Cameroon</option>
                                                <option value="CA" <?php if (!empty($country) && $country == 'CA' ) echo 'selected = "selected"'; ?>>Canada</option>
                                                <option value="CV" <?php if (!empty($country) && $country == 'CV' ) echo 'selected = "selected"'; ?>>Cape Verde</option>
                                                <option value="KY" <?php if (!empty($country) && $country == 'KY' ) echo 'selected = "selected"'; ?>>Cayman Islands</option>
                                                <option value="CF" <?php if (!empty($country) && $country == 'CF' ) echo 'selected = "selected"'; ?>>Central African Republic</option>
                                                <option value="TD" <?php if (!empty($country) && $country == 'TD' ) echo 'selected = "selected"'; ?>>Chad</option>
                                                <option value="CL" <?php if (!empty($country) && $country == 'CL' ) echo 'selected = "selected"'; ?>>Chile</option>
                                                <option value="CN" <?php if (!empty($country) && $country == 'CN' ) echo 'selected = "selected"'; ?>>China</option>
                                                <option value="CX" <?php if (!empty($country) && $country == 'CX' ) echo 'selected = "selected"'; ?>>Christmas Island</option>
                                                <option value="CC" <?php if (!empty($country) && $country == 'CC' ) echo 'selected = "selected"'; ?>>Cocos (Keeling) Islands</option>
                                                <option value="CO" <?php if (!empty($country) && $country == 'CO' ) echo 'selected = "selected"'; ?>>Colombia</option>
                                                <option value="KM" <?php if (!empty($country) && $country == 'KM' ) echo 'selected = "selected"'; ?>>Comoros</option>
                                                <option value="CG" <?php if (!empty($country) && $country == 'CG' ) echo 'selected = "selected"'; ?>>Congo</option>
                                                <option value="CD" <?php if (!empty($country) && $country == 'CD' ) echo 'selected = "selected"'; ?>>Congo, the Democratic Republic of the</option>
                                                <option value="CK" <?php if (!empty($country) && $country == 'CK' ) echo 'selected = "selected"'; ?>>Cook Islands</option>
                                                <option value="CR" <?php if (!empty($country) && $country == 'CR' ) echo 'selected = "selected"'; ?>>Costa Rica</option>
                                                <option value="CI" <?php if (!empty($country) && $country == 'CI' ) echo 'selected = "selected"'; ?>>Côte d'Ivoire</option>
                                                <option value="HR" <?php if (!empty($country) && $country == 'HR' ) echo 'selected = "selected"'; ?>>Croatia</option>
                                                <option value="CU" <?php if (!empty($country) && $country == 'CU' ) echo 'selected = "selected"'; ?>>Cuba</option>
                                                <option value="CW" <?php if (!empty($country) && $country == 'CW' ) echo 'selected = "selected"'; ?>>Curaçao</option>
                                                <option value="CY" <?php if (!empty($country) && $country == 'CY' ) echo 'selected = "selected"'; ?>>Cyprus</option>
                                                <option value="CZ" <?php if (!empty($country) && $country == 'CZ' ) echo 'selected = "selected"'; ?>>Czech Republic</option>
                                                <option value="DK" <?php if (!empty($country) && $country == 'DK' ) echo 'selected = "selected"'; ?>>Denmark</option>
                                                <option value="DJ" <?php if (!empty($country) && $country == 'DJ' ) echo 'selected = "selected"'; ?>>Djibouti</option>
                                                <option value="DM" <?php if (!empty($country) && $country == 'DM' ) echo 'selected = "selected"'; ?>>Dominica</option>
                                                <option value="DO" <?php if (!empty($country) && $country == 'DO' ) echo 'selected = "selected"'; ?>>Dominican Republic</option>
                                                <option value="EC" <?php if (!empty($country) && $country == 'EC' ) echo 'selected = "selected"'; ?>>Ecuador</option>
                                                <option value="EG" <?php if (!empty($country) && $country == 'EG' ) echo 'selected = "selected"'; ?>>Egypt</option>
                                                <option value="SV" <?php if (!empty($country) && $country == 'SV' ) echo 'selected = "selected"'; ?>>El Salvador</option>
                                                <option value="GQ" <?php if (!empty($country) && $country == 'GQ' ) echo 'selected = "selected"'; ?>>Equatorial Guinea</option>
                                                <option value="ER" <?php if (!empty($country) && $country == 'ER' ) echo 'selected = "selected"'; ?>>Eritrea</option>
                                                <option value="EE" <?php if (!empty($country) && $country == 'EE' ) echo 'selected = "selected"'; ?>>Estonia</option>
                                                <option value="ET" <?php if (!empty($country) && $country == 'ET' ) echo 'selected = "selected"'; ?>>Ethiopia</option>
                                                <option value="FK" <?php if (!empty($country) && $country == 'FK' ) echo 'selected = "selected"'; ?>>Falkland Islands (Malvinas)</option>
                                                <option value="FO" <?php if (!empty($country) && $country == 'FO' ) echo 'selected = "selected"'; ?>>Faroe Islands</option>
                                                <option value="FJ" <?php if (!empty($country) && $country == 'FJ' ) echo 'selected = "selected"'; ?>>Fiji</option>
                                                <option value="FI" <?php if (!empty($country) && $country == 'FI' ) echo 'selected = "selected"'; ?>>Finland</option>
                                                <option value="FR" <?php if (!empty($country) && $country == 'FR' ) echo 'selected = "selected"'; ?>>France</option>
                                                <option value="GF" <?php if (!empty($country) && $country == 'GF' ) echo 'selected = "selected"'; ?>>French Guiana</option>
                                                <option value="PF" <?php if (!empty($country) && $country == 'PF' ) echo 'selected = "selected"'; ?>>French Polynesia</option>
                                                <option value="TF" <?php if (!empty($country) && $country == 'TF' ) echo 'selected = "selected"'; ?>>French Southern Territories</option>
                                                <option value="GA" <?php if (!empty($country) && $country == 'GA' ) echo 'selected = "selected"'; ?>>Gabon</option>
                                                <option value="GM" <?php if (!empty($country) && $country == 'GM' ) echo 'selected = "selected"'; ?>>Gambia</option>
                                                <option value="GE" <?php if (!empty($country) && $country == 'GE' ) echo 'selected = "selected"'; ?>>Georgia</option>
                                                <option value="DE" <?php if (!empty($country) && $country == 'DE' ) echo 'selected = "selected"'; ?>>Germany</option>
                                                <option value="GH" <?php if (!empty($country) && $country == 'GH' ) echo 'selected = "selected"'; ?>>Ghana</option>
                                                <option value="GI" <?php if (!empty($country) && $country == 'GI' ) echo 'selected = "selected"'; ?>>Gibraltar</option>
                                                <option value="GR" <?php if (!empty($country) && $country == 'GR' ) echo 'selected = "selected"'; ?>>Greece</option>
                                                <option value="GL" <?php if (!empty($country) && $country == 'GL' ) echo 'selected = "selected"'; ?>>Greenland</option>
                                                <option value="GD" <?php if (!empty($country) && $country == 'GD' ) echo 'selected = "selected"'; ?>>Grenada</option>
                                                <option value="GP" <?php if (!empty($country) && $country == 'GP' ) echo 'selected = "selected"'; ?>>Guadeloupe</option>
                                                <option value="GU" <?php if (!empty($country) && $country == 'GU' ) echo 'selected = "selected"'; ?>>Guam</option>
                                                <option value="GT" <?php if (!empty($country) && $country == 'GT' ) echo 'selected = "selected"'; ?>>Guatemala</option>
                                                <option value="GG" <?php if (!empty($country) && $country == 'GG' ) echo 'selected = "selected"'; ?>>Guernsey</option>
                                                <option value="GN" <?php if (!empty($country) && $country == 'GN' ) echo 'selected = "selected"'; ?>>Guinea</option>
                                                <option value="GW" <?php if (!empty($country) && $country == 'GW' ) echo 'selected = "selected"'; ?>>Guinea-Bissau</option>
                                                <option value="GY" <?php if (!empty($country) && $country == 'GY' ) echo 'selected = "selected"'; ?>>Guyana</option>
                                                <option value="HT" <?php if (!empty($country) && $country == 'HT' ) echo 'selected = "selected"'; ?>>Haiti</option>
                                                <option value="HM" <?php if (!empty($country) && $country == 'HM' ) echo 'selected = "selected"'; ?>>Heard Island and McDonald Islands</option>
                                                <option value="VA" <?php if (!empty($country) && $country == 'VA' ) echo 'selected = "selected"'; ?>>Holy See (Vatican City State)</option>
                                                <option value="HN" <?php if (!empty($country) && $country == 'HN' ) echo 'selected = "selected"'; ?>>Honduras</option>
                                                <option value="HK" <?php if (!empty($country) && $country == 'HK' ) echo 'selected = "selected"'; ?>>Hong Kong</option>
                                                <option value="HU" <?php if (!empty($country) && $country == 'HU' ) echo 'selected = "selected"'; ?>>Hungary</option>
                                                <option value="IS" <?php if (!empty($country) && $country == 'IS' ) echo 'selected = "selected"'; ?>>Iceland</option>
                                                <option value="IN" <?php if (!empty($country) && $country == 'IN' ) echo 'selected = "selected"'; ?>>India</option>
                                                <option value="ID" <?php if (!empty($country) && $country == 'ID' ) echo 'selected = "selected"'; ?>>Indonesia</option>
                                                <option value="IR" <?php if (!empty($country) && $country == 'IR' ) echo 'selected = "selected"'; ?>>Iran, Islamic Republic of</option>
                                                <option value="IQ" <?php if (!empty($country) && $country == 'IQ' ) echo 'selected = "selected"'; ?>>Iraq</option>
                                                <option value="IE" <?php if (!empty($country) && $country == 'IE' ) echo 'selected = "selected"'; ?>>Ireland</option>
                                                <option value="IM" <?php if (!empty($country) && $country == 'IM' ) echo 'selected = "selected"'; ?>>Isle of Man</option>
                                                <option value="IL" <?php if (!empty($country) && $country == 'IL' ) echo 'selected = "selected"'; ?>>Israel</option>
                                                <option value="IT" <?php if (!empty($country) && $country == 'IT' ) echo 'selected = "selected"'; ?>>Italy</option>
                                                <option value="JM" <?php if (!empty($country) && $country == 'JM' ) echo 'selected = "selected"'; ?>>Jamaica</option>
                                                <option value="JP" <?php if (!empty($country) && $country == 'JP' ) echo 'selected = "selected"'; ?>>Japan</option>
                                                <option value="JE" <?php if (!empty($country) && $country == 'JE' ) echo 'selected = "selected"'; ?>>Jersey</option>
                                                <option value="JO" <?php if (!empty($country) && $country == 'JO' ) echo 'selected = "selected"'; ?>>Jordan</option>
                                                <option value="KZ" <?php if (!empty($country) && $country == 'KZ' ) echo 'selected = "selected"'; ?>>Kazakhstan</option>
                                                <option value="KE" <?php if (!empty($country) && $country == 'KE' ) echo 'selected = "selected"'; ?>>Kenya</option>
                                                <option value="KI" <?php if (!empty($country) && $country == 'KI' ) echo 'selected = "selected"'; ?>>Kiribati</option>
                                                <option value="KP" <?php if (!empty($country) && $country == 'KP' ) echo 'selected = "selected"'; ?>>Korea, Democratic People's Republic of</option>
                                                <option value="KR" <?php if (!empty($country) && $country == 'KR' ) echo 'selected = "selected"'; ?>>Korea, Republic of</option>
                                                <option value="KW" <?php if (!empty($country) && $country == 'KW' ) echo 'selected = "selected"'; ?>>Kuwait</option>
                                                <option value="KG" <?php if (!empty($country) && $country == 'KG' ) echo 'selected = "selected"'; ?>>Kyrgyzstan</option>
                                                <option value="LA" <?php if (!empty($country) && $country == 'LA' ) echo 'selected = "selected"'; ?>>Lao People's Democratic Republic</option>
                                                <option value="LV" <?php if (!empty($country) && $country == 'LV' ) echo 'selected = "selected"'; ?>>Latvia</option>
                                                <option value="LB" <?php if (!empty($country) && $country == 'LB' ) echo 'selected = "selected"'; ?>>Lebanon</option>
                                                <option value="LS" <?php if (!empty($country) && $country == 'LS' ) echo 'selected = "selected"'; ?>>Lesotho</option>
                                                <option value="LR" <?php if (!empty($country) && $country == 'LR' ) echo 'selected = "selected"'; ?>>Liberia</option>
                                                <option value="LY" <?php if (!empty($country) && $country == 'LY' ) echo 'selected = "selected"'; ?>>Libya</option>
                                                <option value="LI" <?php if (!empty($country) && $country == 'LI' ) echo 'selected = "selected"'; ?>>Liechtenstein</option>
                                                <option value="LT" <?php if (!empty($country) && $country == 'LT' ) echo 'selected = "selected"'; ?>>Lithuania</option>
                                                <option value="LU" <?php if (!empty($country) && $country == 'LU' ) echo 'selected = "selected"'; ?>>Luxembourg</option>
                                                <option value="MO" <?php if (!empty($country) && $country == 'MO' ) echo 'selected = "selected"'; ?>>Macao</option>
                                                <option value="MK" <?php if (!empty($country) && $country == 'MK' ) echo 'selected = "selected"'; ?>>Macedonia, the former Yugoslav Republic of</option>
                                                <option value="MG" <?php if (!empty($country) && $country == 'MG' ) echo 'selected = "selected"'; ?>>Madagascar</option>
                                                <option value="MW" <?php if (!empty($country) && $country == 'MW' ) echo 'selected = "selected"'; ?>>Malawi</option>
                                                <option value="MY" <?php if (!empty($country) && $country == 'MY' ) echo 'selected = "selected"'; ?>>Malaysia</option>
                                                <option value="MV" <?php if (!empty($country) && $country == 'MV' ) echo 'selected = "selected"'; ?>>Maldives</option>
                                                <option value="ML" <?php if (!empty($country) && $country == 'ML' ) echo 'selected = "selected"'; ?>>Mali</option>
                                                <option value="MT" <?php if (!empty($country) && $country == 'MT' ) echo 'selected = "selected"'; ?>>Malta</option>
                                                <option value="MH" <?php if (!empty($country) && $country == 'MH' ) echo 'selected = "selected"'; ?>>Marshall Islands</option>
                                                <option value="MQ" <?php if (!empty($country) && $country == 'MQ' ) echo 'selected = "selected"'; ?>>Martinique</option>
                                                <option value="MR" <?php if (!empty($country) && $country == 'MR' ) echo 'selected = "selected"'; ?>>Mauritania</option>
                                                <option value="MU" <?php if (!empty($country) && $country == 'MU' ) echo 'selected = "selected"'; ?>>Mauritius</option>
                                                <option value="YT" <?php if (!empty($country) && $country == 'YT' ) echo 'selected = "selected"'; ?>>Mayotte</option>
                                                <option value="MX" <?php if (!empty($country) && $country == 'MX' ) echo 'selected = "selected"'; ?>>Mexico</option>
                                                <option value="FM" <?php if (!empty($country) && $country == 'FM' ) echo 'selected = "selected"'; ?>>Micronesia, Federated States of</option>
                                                <option value="MD" <?php if (!empty($country) && $country == 'MD' ) echo 'selected = "selected"'; ?>>Moldova, Republic of</option>
                                                <option value="MC" <?php if (!empty($country) && $country == 'MC' ) echo 'selected = "selected"'; ?>>Monaco</option>
                                                <option value="MN" <?php if (!empty($country) && $country == 'MN' ) echo 'selected = "selected"'; ?>>Mongolia</option>
                                                <option value="ME" <?php if (!empty($country) && $country == 'ME' ) echo 'selected = "selected"'; ?>>Montenegro</option>
                                                <option value="MS" <?php if (!empty($country) && $country == 'MS' ) echo 'selected = "selected"'; ?>>Montserrat</option>
                                                <option value="MA" <?php if (!empty($country) && $country == 'MA' ) echo 'selected = "selected"'; ?>>Morocco</option>
                                                <option value="MZ" <?php if (!empty($country) && $country == 'MZ' ) echo 'selected = "selected"'; ?>>Mozambique</option>
                                                <option value="MM" <?php if (!empty($country) && $country == 'MM' ) echo 'selected = "selected"'; ?>>Myanmar</option>
                                                <option value="NA" <?php if (!empty($country) && $country == 'NA' ) echo 'selected = "selected"'; ?>>Namibia</option>
                                                <option value="NR" <?php if (!empty($country) && $country == 'NR' ) echo 'selected = "selected"'; ?>>Nauru</option>
                                                <option value="NP" <?php if (!empty($country) && $country == 'NP' ) echo 'selected = "selected"'; ?>>Nepal</option>
                                                <option value="NL" <?php if (!empty($country) && $country == 'NL' ) echo 'selected = "selected"'; ?>>Netherlands</option>
                                                <option value="NC" <?php if (!empty($country) && $country == 'NC' ) echo 'selected = "selected"'; ?>>New Caledonia</option>
                                                <option value="NZ" <?php if (!empty($country) && $country == 'NZ' ) echo 'selected = "selected"'; ?>>New Zealand</option>
                                                <option value="NI" <?php if (!empty($country) && $country == 'NI' ) echo 'selected = "selected"'; ?>>Nicaragua</option>
                                                <option value="NE" <?php if (!empty($country) && $country == 'NE' ) echo 'selected = "selected"'; ?>>Niger</option>
                                                <option value="NG" <?php if (!empty($country) && $country == 'NG' ) echo 'selected = "selected"'; ?>>Nigeria</option>
                                                <option value="NU" <?php if (!empty($country) && $country == 'NU' ) echo 'selected = "selected"'; ?>>Niue</option>
                                                <option value="NF" <?php if (!empty($country) && $country == 'NF' ) echo 'selected = "selected"'; ?>>Norfolk Island</option>
                                                <option value="MP" <?php if (!empty($country) && $country == 'MP' ) echo 'selected = "selected"'; ?>>Northern Mariana Islands</option>
                                                <option value="NO" <?php if (!empty($country) && $country == 'NO' ) echo 'selected = "selected"'; ?>>Norway</option>
                                                <option value="OM" <?php if (!empty($country) && $country == 'OM' ) echo 'selected = "selected"'; ?>>Oman</option>
                                                <option value="PK" <?php if (!empty($country) && $country == 'PK' ) echo 'selected = "selected"'; ?>>Pakistan</option>
                                                <option value="PW" <?php if (!empty($country) && $country == 'PW' ) echo 'selected = "selected"'; ?>>Palau</option>
                                                <option value="PS" <?php if (!empty($country) && $country == 'PS' ) echo 'selected = "selected"'; ?>>Palestinian Territory, Occupied</option>
                                                <option value="PA" <?php if (!empty($country) && $country == 'PA' ) echo 'selected = "selected"'; ?>>Panama</option>
                                                <option value="PG" <?php if (!empty($country) && $country == 'PG' ) echo 'selected = "selected"'; ?>>Papua New Guinea</option>
                                                <option value="PY" <?php if (!empty($country) && $country == 'PY' ) echo 'selected = "selected"'; ?>>Paraguay</option>
                                                <option value="PE" <?php if (!empty($country) && $country == 'PE' ) echo 'selected = "selected"'; ?>>Peru</option>
                                                <option value="PH" <?php if (!empty($country) && $country == 'PH' ) echo 'selected = "selected"'; ?>>Philippines</option>
                                                <option value="PN" <?php if (!empty($country) && $country == 'PN' ) echo 'selected = "selected"'; ?>>Pitcairn</option>
                                                <option value="PL" <?php if (!empty($country) && $country == 'PL' ) echo 'selected = "selected"'; ?>>Poland</option>
                                                <option value="PT" <?php if (!empty($country) && $country == 'PT' ) echo 'selected = "selected"'; ?>>Portugal</option>
                                                <option value="PR" <?php if (!empty($country) && $country == 'PR' ) echo 'selected = "selected"'; ?>>Puerto Rico</option>
                                                <option value="QA" <?php if (!empty($country) && $country == 'QA' ) echo 'selected = "selected"'; ?>>Qatar</option>
                                                <option value="RE" <?php if (!empty($country) && $country == 'RE' ) echo 'selected = "selected"'; ?>>Réunion</option>
                                                <option value="RO" <?php if (!empty($country) && $country == 'RO' ) echo 'selected = "selected"'; ?>>Romania</option>
                                                <option value="RU" <?php if (!empty($country) && $country == 'RU' ) echo 'selected = "selected"'; ?>>Russian Federation</option>
                                                <option value="RW" <?php if (!empty($country) && $country == 'RW' ) echo 'selected = "selected"'; ?>>Rwanda</option>
                                                <option value="BL" <?php if (!empty($country) && $country == 'BL' ) echo 'selected = "selected"'; ?>>Saint Barthélemy</option>
                                                <option value="SH" <?php if (!empty($country) && $country == 'SH' ) echo 'selected = "selected"'; ?>>Saint Helena, Ascension and Tristan da Cunha</option>
                                                <option value="KN" <?php if (!empty($country) && $country == 'KN' ) echo 'selected = "selected"'; ?>>Saint Kitts and Nevis</option>
                                                <option value="LC" <?php if (!empty($country) && $country == 'LC' ) echo 'selected = "selected"'; ?>>Saint Lucia</option>
                                                <option value="MF" <?php if (!empty($country) && $country == 'MF' ) echo 'selected = "selected"'; ?>>Saint Martin (French part)</option>
                                                <option value="PM" <?php if (!empty($country) && $country == 'PM' ) echo 'selected = "selected"'; ?>>Saint Pierre and Miquelon</option>
                                                <option value="VC" <?php if (!empty($country) && $country == 'VC' ) echo 'selected = "selected"'; ?>>Saint Vincent and the Grenadines</option>
                                                <option value="WS" <?php if (!empty($country) && $country == 'WS' ) echo 'selected = "selected"'; ?>>Samoa</option>
                                                <option value="SM" <?php if (!empty($country) && $country == 'SM' ) echo 'selected = "selected"'; ?>>San Marino</option>
                                                <option value="ST" <?php if (!empty($country) && $country == 'ST' ) echo 'selected = "selected"'; ?>>Sao Tome and Principe</option>
                                                <option value="SA" <?php if (!empty($country) && $country == 'SA' ) echo 'selected = "selected"'; ?>>Saudi Arabia</option>
                                                <option value="SN" <?php if (!empty($country) && $country == 'SN' ) echo 'selected = "selected"'; ?>>Senegal</option>
                                                <option value="RS" <?php if (!empty($country) && $country == 'RS' ) echo 'selected = "selected"'; ?>>Serbia</option>
                                                <option value="SC" <?php if (!empty($country) && $country == 'SC' ) echo 'selected = "selected"'; ?>>Seychelles</option>
                                                <option value="SL" <?php if (!empty($country) && $country == 'SL' ) echo 'selected = "selected"'; ?>>Sierra Leone</option>
                                                <option value="SG" <?php if (!empty($country) && $country == 'SG' ) echo 'selected = "selected"'; ?>>Singapore</option>
                                                <option value="SX" <?php if (!empty($country) && $country == 'SX' ) echo 'selected = "selected"'; ?>>Sint Maarten (Dutch part)</option>
                                                <option value="SK" <?php if (!empty($country) && $country == 'SK' ) echo 'selected = "selected"'; ?>>Slovakia</option>
                                                <option value="SI" <?php if (!empty($country) && $country == 'SI' ) echo 'selected = "selected"'; ?>>Slovenia</option>
                                                <option value="SB" <?php if (!empty($country) && $country == 'SB' ) echo 'selected = "selected"'; ?>>Solomon Islands</option>
                                                <option value="SO" <?php if (!empty($country) && $country == 'SO' ) echo 'selected = "selected"'; ?>>Somalia</option>
                                                <option value="ZA" <?php if (!empty($country) && $country == 'ZA' ) echo 'selected = "selected"'; ?>>South Africa</option>
                                                <option value="GS" <?php if (!empty($country) && $country == 'GS' ) echo 'selected = "selected"'; ?>>South Georgia and the South Sandwich Islands</option>
                                                <option value="SS" <?php if (!empty($country) && $country == 'SS' ) echo 'selected = "selected"'; ?>>South Sudan</option>
                                                <option value="ES" <?php if (!empty($country) && $country == 'ES' ) echo 'selected = "selected"'; ?>>Spain</option>
                                                <option value="LK" <?php if (!empty($country) && $country == 'LK' ) echo 'selected = "selected"'; ?>>Sri Lanka</option>
                                                <option value="SD" <?php if (!empty($country) && $country == 'SD' ) echo 'selected = "selected"'; ?>>Sudan</option>
                                                <option value="SR" <?php if (!empty($country) && $country == 'SR' ) echo 'selected = "selected"'; ?>>Suriname</option>
                                                <option value="SJ" <?php if (!empty($country) && $country == 'SJ' ) echo 'selected = "selected"'; ?>>Svalbard and Jan Mayen</option>
                                                <option value="SZ" <?php if (!empty($country) && $country == 'SZ' ) echo 'selected = "selected"'; ?>>Swaziland</option>
                                                <option value="SE" <?php if (!empty($country) && $country == 'SE' ) echo 'selected = "selected"'; ?>>Sweden</option>
                                                <option value="CH" <?php if (!empty($country) && $country == 'CH' ) echo 'selected = "selected"'; ?>>Switzerland</option>
                                                <option value="SY" <?php if (!empty($country) && $country == 'SY' ) echo 'selected = "selected"'; ?>>Syrian Arab Republic</option>
                                                <option value="TW" <?php if (!empty($country) && $country == 'TW' ) echo 'selected = "selected"'; ?>>Taiwan, Province of China</option>
                                                <option value="TJ" <?php if (!empty($country) && $country == 'TJ' ) echo 'selected = "selected"'; ?>>Tajikistan</option>
                                                <option value="TZ" <?php if (!empty($country) && $country == 'TZ' ) echo 'selected = "selected"'; ?>>Tanzania, United Republic of</option>
                                                <option value="TH" <?php if (!empty($country) && $country == 'TH' ) echo 'selected = "selected"'; ?>>Thailand</option>
                                                <option value="TL" <?php if (!empty($country) && $country == 'TL' ) echo 'selected = "selected"'; ?>>Timor-Leste</option>
                                                <option value="TG" <?php if (!empty($country) && $country == 'TG' ) echo 'selected = "selected"'; ?>>Togo</option>
                                                <option value="TK" <?php if (!empty($country) && $country == 'TK' ) echo 'selected = "selected"'; ?>>Tokelau</option>
                                                <option value="TO" <?php if (!empty($country) && $country == 'TO' ) echo 'selected = "selected"'; ?>>Tonga</option>
                                                <option value="TT" <?php if (!empty($country) && $country == 'TT' ) echo 'selected = "selected"'; ?>>Trinidad and Tobago</option>
                                                <option value="TN" <?php if (!empty($country) && $country == 'TN' ) echo 'selected = "selected"'; ?>>Tunisia</option>
                                                <option value="TR" <?php if (!empty($country) && $country == 'TR' ) echo 'selected = "selected"'; ?>>Turkey</option>
                                                <option value="TM" <?php if (!empty($country) && $country == 'TM' ) echo 'selected = "selected"'; ?>>Turkmenistan</option>
                                                <option value="TC" <?php if (!empty($country) && $country == 'TC' ) echo 'selected = "selected"'; ?>>Turks and Caicos Islands</option>
                                                <option value="TV" <?php if (!empty($country) && $country == 'TV' ) echo 'selected = "selected"'; ?>>Tuvalu</option>
                                                <option value="UG" <?php if (!empty($country) && $country == 'UG' ) echo 'selected = "selected"'; ?>>Uganda</option>
                                                <option value="UA" <?php if (!empty($country) && $country == 'UA' ) echo 'selected = "selected"'; ?>>Ukraine</option>
                                                <option value="AE" <?php if (!empty($country) && $country == 'AE' ) echo 'selected = "selected"'; ?>>United Arab Emirates</option>
                                                <option value="GB" <?php if (!empty($country) && $country == 'GB' ) echo 'selected = "selected"'; ?>>United Kingdom</option>
                                                <option value="UM" <?php if (!empty($country) && $country == 'UM' ) echo 'selected = "selected"'; ?>>United States Minor Outlying Islands</option>
                                                <option value="UY" <?php if (!empty($country) && $country == 'UY' ) echo 'selected = "selected"'; ?>>Uruguay</option>
                                                <option value="UZ" <?php if (!empty($country) && $country == 'UZ' ) echo 'selected = "selected"'; ?>>Uzbekistan</option>
                                                <option value="VU" <?php if (!empty($country) && $country == 'VU' ) echo 'selected = "selected"'; ?>>Vanuatu</option>
                                                <option value="VE" <?php if (!empty($country) && $country == 'VE' ) echo 'selected = "selected"'; ?>>Venezuela, Bolivarian Republic of</option>
                                                <option value="VN" <?php if (!empty($country) && $country == 'VN' ) echo 'selected = "selected"'; ?>>Viet Nam</option>
                                                <option value="VG" <?php if (!empty($country) && $country == 'VG' ) echo 'selected = "selected"'; ?>>Virgin Islands, British</option>
                                                <option value="VI" <?php if (!empty($country) && $country == 'VI' ) echo 'selected = "selected"'; ?>>Virgin Islands, U.S.</option>
                                                <option value="WF" <?php if (!empty($country) && $country == 'WF' ) echo 'selected = "selected"'; ?>>Wallis and Futuna</option>
                                                <option value="EH" <?php if (!empty($country) && $country == 'EH' ) echo 'selected = "selected"'; ?>>Western Sahara</option>
                                                <option value="YE" <?php if (!empty($country) && $country == 'YE' ) echo 'selected = "selected"'; ?>>Yemen</option>
                                                <option value="ZM" <?php if (!empty($country) && $country == 'ZM' ) echo 'selected = "selected"'; ?>>Zambia</option>
                                                <option value="ZW" <?php if (!empty($country) && $country == 'ZW' ) echo 'selected = "selected"'; ?>>Zimbabwe</option>
                                        </select>
                            </div>
                          </div>

                          
                          <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-4 col-md-4 col-xs-4">
                              <button type="button" id="updateinfobutton" class="btn btn-success btn-md " ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Update</button>
                            </div>
                          </div>
                        </form>