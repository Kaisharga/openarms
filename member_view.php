<?php

$list_sql = "SELECT * FROM members WHERE member_id=".$_GET['member_id']; 


if ($res = mysqli_query($link, $list_sql)) { 
    if (mysqli_num_rows($res) > 0) { 
?>
<form action="member_action.php" method="GET">
<input type="hidden" id="maction" name="maction" value="UPDATE">
<table border=1><tr><td>
<table>
<?php 
        while ($row = mysqli_fetch_array($res)) { 
?>
<tr><td>Member ID:</td><td><?php echo $row['member_id']; ?>
<input type="hidden" name="member_id" value="<?php echo $row['member_id']; ?>"></td></tr>
<tr><td>Membership Date:</td><td><input type="date" name="member_date" value="<?php echo $row['member_date']; ?>"></td></tr>
<tr><td>First name:</td><td><input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"></td></tr>
<tr><td>Last name:</td><td><input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"> </td></tr>
<tr><td>Family size:</td><td><select name="family_size">
  <option value="1" <?php if($row['family_size']==1){ echo "selected"; } ?>>1</option>
  <option value="2" <?php if($row['family_size']==2){ echo "selected"; } ?>>2</option>
  <option value="3" <?php if($row['family_size']==3){ echo "selected"; } ?>>3</option>
  <option value="4" <?php if($row['family_size']==4){ echo "selected"; } ?>>4</option>
  <option value="5" <?php if($row['family_size']==5){ echo "selected"; } ?>>5</option>
  <option value="6" <?php if($row['family_size']==6){ echo "selected"; } ?>>6</option>
  <option value="7" <?php if($row['family_size']==7){ echo "selected"; } ?>>7</option>
  <option value="8" <?php if($row['family_size']==8){ echo "selected"; } ?>>8</option>
  <option value="9" <?php if($row['family_size']==9){ echo "selected"; } ?>>9</option>
  <option value="10" <?php if($row['family_size']==10){ echo "selected"; } ?>>10</option>
  <option value="11" <?php if($row['family_size']==11){ echo "selected"; } ?>>11</option>
  <option value="12" <?php if($row['family_size']==12){ echo "selected"; } ?>>12</option>
  <option value="13" <?php if($row['family_size']==13){ echo "selected"; } ?>>13</option>
  <option value="14" <?php if($row['family_size']==14){ echo "selected"; } ?>>14</option>
  <option value="15" <?php if($row['family_size']==15){ echo "selected"; } ?>>15</option>
  <option value="16" <?php if($row['family_size']==16){ echo "selected"; } ?>>16</option>
  <option value="17" <?php if($row['family_size']==17){ echo "selected"; } ?>>17</option>
  <option value="18" <?php if($row['family_size']==18){ echo "selected"; } ?>>18</option>
  <option value="19" <?php if($row['family_size']==19){ echo "selected"; } ?>>19</option>
  <option value="20" <?php if($row['family_size']==20){ echo "selected"; } ?>>20</option>
</select></td></tr>
<tr><td>Family 65 or over:</td><td>
<select name="over64">
  <option value="0" <?php if($row['over64']==0){ echo "selected"; } ?>>0</option>
  <option value="1" <?php if($row['over64']==1){ echo "selected"; } ?>>1</option>
  <option value="2" <?php if($row['over64']==2){ echo "selected"; } ?>>2</option>
  <option value="3" <?php if($row['over64']==3){ echo "selected"; } ?>>3</option>
  <option value="4" <?php if($row['over64']==4){ echo "selected"; } ?>>4</option>
  <option value="5" <?php if($row['over64']==5){ echo "selected"; } ?>>5</option>
  <option value="6" <?php if($row['over64']==6){ echo "selected"; } ?>>6</option>
  <option value="7" <?php if($row['over64']==7){ echo "selected"; } ?>>7</option>
  <option value="8" <?php if($row['over64']==8){ echo "selected"; } ?>>8</option>
  <option value="9" <?php if($row['over64']==9){ echo "selected"; } ?>>9</option>
  <option value="10" <?php if($row['over64']==10){ echo "selected"; } ?>>10</option>
  <option value="11" <?php if($row['over64']==11){ echo "selected"; } ?>>11</option>
  <option value="12" <?php if($row['over64']==12){ echo "selected"; } ?>>12</option>
  <option value="13" <?php if($row['over64']==13){ echo "selected"; } ?>>13</option>
  <option value="14" <?php if($row['over64']==14){ echo "selected"; } ?>>14</option>
  <option value="15" <?php if($row['over64']==15){ echo "selected"; } ?>>15</option>
  <option value="16" <?php if($row['over64']==16){ echo "selected"; } ?>>16</option>
  <option value="17" <?php if($row['over64']==17){ echo "selected"; } ?>>17</option>
  <option value="18" <?php if($row['over64']==18){ echo "selected"; } ?>>18</option>
  <option value="19" <?php if($row['over64']==19){ echo "selected"; } ?>>19</option>
  <option value="20" <?php if($row['over64']==20){ echo "selected"; } ?>>20</option>
</select></td></tr>
<tr><td>Family 18 or younger:</td><td>
<select name="under19">
  <option value="0" <?php if($row['under19']==0){ echo "selected"; } ?>>0</option>
  <option value="1" <?php if($row['under19']==1){ echo "selected"; } ?>>1</option>
  <option value="2" <?php if($row['under19']==2){ echo "selected"; } ?>>2</option>
  <option value="3" <?php if($row['under19']==3){ echo "selected"; } ?>>3</option>
  <option value="4" <?php if($row['under19']==4){ echo "selected"; } ?>>4</option>
  <option value="5" <?php if($row['under19']==5){ echo "selected"; } ?>>5</option>
  <option value="6" <?php if($row['under19']==6){ echo "selected"; } ?>>6</option>
  <option value="7" <?php if($row['under19']==7){ echo "selected"; } ?>>7</option>
  <option value="8" <?php if($row['under19']==8){ echo "selected"; } ?>>8</option>
  <option value="9" <?php if($row['under19']==9){ echo "selected"; } ?>>9</option>
  <option value="10" <?php if($row['under19']==10){ echo "selected"; } ?>>10</option>
  <option value="11" <?php if($row['under19']==11){ echo "selected"; } ?>>11</option>
  <option value="12" <?php if($row['under19']==12){ echo "selected"; } ?>>12</option>
  <option value="13" <?php if($row['under19']==13){ echo "selected"; } ?>>13</option>
  <option value="14" <?php if($row['under19']==14){ echo "selected"; } ?>>14</option>
  <option value="15" <?php if($row['under19']==15){ echo "selected"; } ?>>15</option>
  <option value="16" <?php if($row['under19']==16){ echo "selected"; } ?>>16</option>
  <option value="17" <?php if($row['under19']==17){ echo "selected"; } ?>>17</option>
  <option value="18" <?php if($row['under19']==18){ echo "selected"; } ?>>18</option>
  <option value="19" <?php if($row['under19']==19){ echo "selected"; } ?>>19</option>
  <option value="20" <?php if($row['under19']==20){ echo "selected"; } ?>>20</option>
</select></td></tr>
<tr><td>Address Line 1:</td><td><input type="text" name="addr_line_1" value="<?php echo $row['addr_line_1']; ?>"></td></tr>
<tr><td>Address Line 2:</td><td><input type="text" name="addr_line_2" value="<?php echo $row['addr_line_2']; ?>"></td></tr>
<tr><td>City:</td><td><input type="text" name="city" value="<?php echo $row['city']; ?>"></td></tr>
<tr><td>State:</td><td>
<select name="state">
	<option value="AL"<?php if($row['state']=="AL"){ echo "selected"; } ?>>Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO"<?php if($row['state']=="CO"){ echo "selected"; } ?>>Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>				
</td></tr>
<tr><td>Zip Code:</td><td><input type="text" name="zipcode" value="<?php echo $row['zipcode']; ?>"></td></tr>
<tr><td>Jeffco Resident:</td><td>
<input type="checkbox" name="jeffco_resident" <?php if($row['jeffco_resident']==1) { echo "checked"; }?>></td></tr>
<tr><td>Ethnicity:</td><td>
<select name="ethnicity">
  <option value="Will not anwser" <?php if($row['ethnicity']=="Will not anwser"){ echo "selected"; } ?>>Will not anwser</option>
  <option value="Asian" <?php if($row['ethnicity']=="Asian"){ echo "selected"; } ?>>Asian</option>
  <option value="Black" <?php if($row['ethnicity']=="Black"){ echo "selected"; } ?>>Black</option>
  <option value="Caucasian" <?php if($row['ethnicity']=="Caucasian"){ echo "selected"; } ?>>Caucasian</option>
  <option value="Hispanic" <?php if($row['ethnicity']=="Hispanic"){ echo "selected"; } ?>>Hispanic</option>
  <option value="Native American" <?php if($row['ethnicity']=="Native American"){ echo "selected"; } ?>>Native American</option>
</select></td></tr>
<tr><td>Last Review Date:</td><td><?php echo $row['data_review_date']; ?></td></tr>
<tr><td align=center><button type="submit" name="maction" value="update">UPDATE</button></td>
<td align=center><button type="submit" name="maction" value="delete">DELETE</button></td></tr>
</table>
<?php
        } 
?>
</td></tr></table>
</form>
<input type="hidden" id="member_date" name="member_date" value="<?php echo $row['membership_date']; ?>">
<?PHP   
   } 
    else { 
        echo "No matching records are found."; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($link); 
} 
?>

