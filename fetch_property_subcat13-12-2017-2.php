<?php
 require_once("function.php");
 if(isset($_GET["pc_id"])){
 $category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>$_GET["pc_id"])));
 ?>
 <option value="0">Select</option>
 <?php
                         $i='1';
                        foreach ($category as $k => $v) {
                                
                         ?>
                        <option value="<?php echo $v["pc_id"]; ?>" id="<?php echo 'for_rent_'.$i; ?>"><?php echo $v["category"];  ?></option>
                        <?php $i++;
                      }
} ?>
<?php 
//var_dump($_POST["option_value"]);
if(@$_POST["option_value"]==22) {

   $session= $_POST["session_id"];
  ?>
<form name="submit_form" id="submit_form" class="dropzone form_front_style" action="javascript:void(0);" method="post" enctype="multipart/form-data">
          <div id="ajax_form">
                  <div id="step-plan"  class="accordion-navigation step-wrapper step-plan current" style='background-color: #05242f; border: 1px solid #05242f;'> <a class="step-heading active" href="javascript:void(0);"><span >*</span><span style="color: #fff;">Listing Title</span><span><i class="fa fa-caret-down"></i><i style="color: #fff;" class="fa fa-caret-right"></i></span></a> </div>
                 <div class="form_row clearfix custom_fileds  owner_name">
            <label class=r_lbl>Rent :<span class="required">*</span>
            </label>
            <input name="rent" id="amount" value="" type="text" class="textfield " placeholder=" " />
            <span id="owner_name_error " class="message_error2 "></span> </div>
        <div class="form_row clearfix custom_fileds  owner_name" id="open_home_date_container">
            <label class=r_lbl>Available From :<span class="required">*</span>
            </label>
            <input id="datepicker2" name="available_from" value="" type="date" class="textfield " placeholder="" style="max-width:370px !important;" />
        </div>
        <div class="form_row clearfix custom_fileds  owner_name">
            <label class=r_lbl>Max number of Tenants :<span class="required">*</span>
            </label>
            <select name="max_number_of_tenants" id="listing_title" value="" class="textfield">
                <option value="0">--Select Listing--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5+">5+</option>
            </select>

        </div>
        <div class="form_row clearfix custom_fileds  owner_name">
            <label class=r_lbl>Pets Ok :<span class="required">*</span>
            </label>
            <input type="radio" name="pets" value="yes" checked> Yes
            <input type="radio" name="pets" value="no"> No
            <input type="radio" name="pets" value="dont_know"> Don't Know
            <input type="radio" name="pets" value="negotiable">Negotiable
        </div>

                <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Ideal Tenants :<span class="required">*</span>
                    </label>
                    <input name="ideal_tenants" id="amount" value="" type="text" class="textfield " placeholder=" " />
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Smokers ok :<span class="required">*</span>
                    </label>
                    <input type="radio" name="smoker" value="yes" checked> Yes
                    <input type="radio" name="smoker" value="no"> No
                    <input type="radio" name="smoker" value="dont_know"> Don't Know
                    <input type="radio" name="smoker" value="negotiable">Negotiable </div>

                        <!--<div class="form_row clearfix custom_fileds  owner_name">-->
                        <!--   <label class=r_lbl>Ideal Tenants :<span class="required">*</span></label>-->
                        <!--   <input name="ideal_tenants" id="amount" value="" type="text" class="textfield "  placeholder=" "/>-->
                        <!--   <span id="owner_name_error " class="message_error2 "></span> </div>-->
                        <!-- Listing extra fields  -->
                        <div class="form_row clearfix custom_fileds  owner_name">
                            <label class=r_lbl>Listing Title :<span class="required">*</span>
                            </label>
                            <input name="listing_title" id="listing_title" value="" type="text" class="textfield " placeholder=" " />
                            <label class=r_lbl>Listing Dropdown :<span class="required">*</span>
                            </label>
                            <select name="listing_title" id="listing_title" value="" class="textfield">
                                <option value="0">--Select Listing--</option>
                                <option value="Rent per Week">Rent per Week</option>
                                <option value="Rent per Month">Rent per Month</option>
                            </select>

                        </div>
                        <div class="form_row clearfix custom_fileds  owner_name">
                            <label class=r_lbl>Listing Duration :<span class="required">*</span>
                            </label>
                            <!--input name="listing_duration" id="datepicker2" readonly value="" type="text" class="textfield "  placeholder="/-->
                             <select name="listing_duration" id="datepicker21"  class="textfield textfield_x " >
                      <option value="0" >--Select Listing--</option>
                      <option value="4" >4 Days</option>
                      <option value="5" >5 Days</option>
                      <option value="6" >6 Days</option>
                      <option value="7" >7 Days</option>
                      <option value="10" >10 Days</option>
                      <option value="14" >14 Days</option>
                    </select>
                  </div>
                        </div>
           
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">House and street details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Street :<span class="required">*</span></label>
                    <input name="street" id="street" value="" type="text" class="textfield lsspl"  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Unit/ Flat :<span class="required">*</span></label>
                    <input name="unit_flat" id="unit_flat" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Street Name :<span class="required">*</span></label>
                    <input name="street_name" id="street_name" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Location</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <?php $loginUserId= $session;
                $countryId= 0;
                $getCountries=getDetails(doSelect("country","ambit_registration",array("ar_id"=>$loginUserId)));
                if(count($getCountries) > 0){
                    foreach($getCountries as $getCountriesKey=>$getCountriesVals){
                        $countryId= $getCountriesVals['country'];
                    }
                    if(!empty($countryId)){
                        
            ?>
                  
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Country :</label>
                    <select name="country" id="country" onchange="fetch_city();"  class="textfield textfield_x " >
                      <?php
                $country=getDetails(doSelect("cn_id,cn_name","ambit_country",array("cn_id"=>$countryId)));
                //var_dump($country);

                foreach($country as $countryk=>$countryv){
              ?>
                      <option value="<?php echo $countryv["cn_id"]; ?>" <?php echo ($countryv["cn_id"] == $countryId)?'selected="selected"':''; ?>><?php echo $countryv["cn_name"];  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>City :</label>
                    <select name="city" id="city_update" class="textfield textfield_x " onchange="fetch_region();">
                      <option value="0">--Select City--</option>
                      <?php $getCity=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$countryId))); 
                      //var_dump($getCity);
                foreach($getCity as $getCityKey=>$getCityVals){
              ?>
                      <option value="<?php echo $getCityVals["ct_id"]; ?>"><?php echo $getCityVals["ct_name"];  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Region :</label>
                    <select  id="region" name="region"  onchange="fetch_suburb();" class="textfield textfield_x " >
                      <option value="0">--Select Region--</option>
                      <!--<?php $getCity=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$countryId))); 
                foreach($getCity as $getCityKey=>$getCityVals){
              ?>
                      <option value="<?php echo $getCityVals["ct_id"]; ?>"><?php echo $getCityVals["ct_name"];  ?></option>
                      <?php } ?>-->
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Suburb  :</label>
                    <select id="suburb" name="suburb" class="textfield textfield_x " >
                      <option value="0">--Select Suburb--</option>
                    </select>
                  </div>
                  <?php } } ?>
                    
                  <!-- AJAX PRICE FIELD -->
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Features</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                       <div class="form_row clearfix custom_fileds  post_content">
                            <label class=''>Furniture and whiteware provided: <span class="required">*</span>
                            </label>
                            <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                                <div id="wp-post_content-editor-container" class="wp-editor-container">
                                    <textarea class="wp-editor-area" rows="6" autocomplete="off" cols="40" id="prop_desc" name="furniture_and_whiteware_provided"></textarea>
                                </div>
                                <span id="address_error" class=""></span> </div>
                        </div>
                  <div class="form_row clearfix custom_fileds  owner_name" id="bedroom_container">
                    <label class="r_lbl">Bedroom :<span class="required">*</span></label>
                    <!--input name="bedroom"  id="bedroom" value="" type="text" class="textfield "  placeholder=" "/-->
                    <select id="bedroom" name="bedroom" class="textfield textfield_x " >
                      <option value="0">--Select Bedroom--</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option>
                    </select>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name"  id="bathroom_container"> 
                    <label class=r_lbl>Bathroom :<span class="required">*</span></label>
                    <!--input name="bathroom"  id="bathroom" value="" type="text" class="textfield "  placeholder=" "/-->
                    <select id="bathroom" name="bathroom" class="textfield textfield_x " >
                      <option value="0">--Select Bathroom--</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option>
                    </select>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                           <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Furniture and whiteware provided : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="prop_desc" name="furniture_and_whiteware_provided" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
<!-- floor area and rent area for rental condition  -->


                    <!-- floor area and rent area for rental condition  -->
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Property Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Property Details : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="prop_desc" name="prop_desc" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Parking or garaging : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="parking" name="parking" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Amenities in the area : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="30" id="amenities" name="amenities" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Smoke alarm :</label>
                    <select name="smoke_alarm" id="smoke_alarm" class="textfield textfield_x " >
                      <option value="0">Don't Know</option>
                      <option value="1">No</option>
                      <option value="2">Yes</option>
                    </select>
                  </div>
                    <!--  <div class="form_row clearfix custom_fileds  owner_name">-->
                    <!--<label class=r_lbl>Agency Reference :<span class="required">*</span></label>-->
                    <!--<input name="agency_reference"  id="agency_reference" value="" type="text" class="textfield "  placeholder=" "/>-->
                    <!--<span id="owner_name_error " class="message_error2 "></span> </div> -->
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Contact Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <!--<div class="form_row clearfix custom_fileds classified_tag ">-->
                  <!--  <label class=>Contact Details:</label>-->
                  <!--  <select name="contact_type" id="contact_type"  onchange="enable_contact_form('contact_type');" class="textfield textfield_x " >-->
                  <!--    <option value="1">Potential buyers should contact me</option>-->
                  <!--    <option value="2">Potential buyers should contact my real estate agent</option>-->
                  <!--  </select>-->
                  <!--</div>-->
                  <input name="contact_type" id="contact_type" value="1" type="hidden" class="textfield "  placeholder=" "/>
                  <div id="ajax_contact_field">
                    <div class="form_row clearfix custom_fileds classified_tag ">
                                <label class=>Are you a licensed real estate agent? :</label>
                                <select name="realestate_agent" id="realestate_agent" onchange="real_state_for_rent();" class="textfield textfield_x ">
                                    <option value="0" id="for_rent_1">No</option>
                                    <option value="1" id="for_rent_2">Yes</option>
                                </select>
                            </div>
                     <div id="ajax_contact_field_for_rent">
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Email Address :<span class="required">*</span></label>
                      <input name="agent_email"  id="agent_email" class="abc" value="" type="email" class="textfield "  placeholder=" "/>
                    </div>
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Your Name :<span class="required">*</span></label>
                      <input name="name"  id="name" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                 
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
                      <input name="mobile"  id="mobile" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Landline No. :<span class="required">*</span></label>
                      <input name="landline"  id="landline" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                      <div class="form_row clearfix custom_fileds  owner_name">
        <label class="r_lbl">Upload Photo (Size 90x90px) :<span class="required">*</span></label>
        <div class="select-file-div">Select File</div>
        <input name="selectphoto" id="selectphoto" value="" type="file" class="textfield " placeholder=" ">
        </div>
                  <!-- END AJAX CONTACT FIELD -->
                
                 <!-- <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Logo :<span class="required">*</span></label>
                    <input name="logo"  id="logo" value="" type="file" class="textfield "  placeholder=" "/>
                  </div>-->
                  <input type="hidden" name="next_form" value="photo_upload" />
                  <input type="hidden" name="db_name" value="add_property" />
                  <input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" ></div>
                </div>
              </div>
            </div>
          </div>
          <!-- END AJAX DIV -->
        </form>
<?php } ?>
<?php  
if(@$_POST["option_value"]==21) {
   $session= $_POST["session_id"];
  ?>
  
  <form name="submit_form" id="submit_form" class="dropzone form_front_style" action="javascript:void(0);" method="post" enctype="multipart/form-data">
          <div id="ajax_form">
                  <div id="step-plan"  class="accordion-navigation step-wrapper step-plan current" style='background-color: #05242f; border: 1px solid #05242f;'> <a class="step-heading active" href="javascript:void(0);"><span >*</span><span style="color: #fff;">Listing Title</span><span><i class="fa fa-caret-down"></i><i style="color: #fff;" class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Listing Title :<span class="required">*</span></label>
                    <input name="listing_title" id="listing_title" value="" type="text" class="textfield "  placeholder=" "/>
                    <!--<<label class=r_lbl>Listing Dropdown :<span class="required">*</span></label>
                    select name="listing_title" id="listing_title" value=""  class="textfield" >
                        <option value="0" >--Select Listing--</option>
                        <option value="Rent per Week">Rent per Week</option>
                        <option value="Rent per Month">Rent per Month</option>
                    </select>-->
                    
                  </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Listing Duration :<span class="required">*</span></label>
                    <!--<input name="listing_duration" id="datepicker2" value="" type="text" class="textfield "  placeholder="">-->
                     <select name="listing_duration" id="datepicker21"  class="textfield textfield_x " >
                     
                      <option value="0" >--Select Listing--</option>
                      <option value="21" >21 Days</option>
                      <option value="28" >28 Days</option>
                      <option value="35" >35 Days</option>
                      <option value="42" >42 Days</option>
                      <option value="60" >60 Days</option>
                    </select>
                   
                  </div>
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">House and street details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Street :<span class="required">*</span></label>
                    <input name="street" id="street" value="" type="text" class="textfield lsspl"  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Unit/ Flat :<span class="required">*</span></label>
                    <input name="unit_flat" id="unit_flat" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Street Name :<span class="required">*</span></label>
                    <input name="street_name" id="street_name" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Location</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <?php $loginUserId= $session;
                $countryId= 0;
                $getCountries=getDetails(doSelect("country","ambit_registration",array("ar_id"=>$loginUserId)));
                if(count($getCountries) > 0){
                    foreach($getCountries as $getCountriesKey=>$getCountriesVals){
                        $countryId= $getCountriesVals['country'];
                    }
                    if(!empty($countryId)){
                        
            ?>
                 <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Country :</label>
                    <select name="country" id="country" onchange="fetch_city();"  class="textfield textfield_x " >
                      <?php
                $country=getDetails(doSelect("cn_id,cn_name","ambit_country",array("cn_id"=>$countryId)));
                //var_dump($country);

                foreach($country as $countryk=>$countryv){
              ?>
                      <option value="<?php echo $countryv["cn_id"]; ?>" <?php echo ($countryv["cn_id"] == $countryId)?'selected="selected"':''; ?>><?php echo $countryv["cn_name"];  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>City :</label>
                    <select name="city" id="city_update" class="textfield textfield_x " onchange="fetch_region();">
                      <option value="0">--Select City--</option>
                      <?php $getCity=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$countryId))); 
                      //var_dump($getCity);
                foreach($getCity as $getCityKey=>$getCityVals){
              ?>
                      <option value="<?php echo $getCityVals["ct_id"]; ?>"><?php echo $getCityVals["ct_name"];  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Region :</label>
                    <select  id="region" name="region"  onchange="fetch_suburb();" class="textfield textfield_x " >
                      <option value="0">--Select Region--</option>
                      <!--<?php $getCity=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$countryId))); 
                foreach($getCity as $getCityKey=>$getCityVals){
              ?>
                      <option value="<?php echo $getCityVals["ct_id"]; ?>"><?php echo $getCityVals["ct_name"];  ?></option>
                      <?php } ?>-->
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Suburb  :</label>
                    <select id="suburb" name="suburb" class="textfield textfield_x " >
                      <option value="0">--Select Suburb--</option>
                    </select>
                  </div>
                  <?php } } ?>
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current pricing_feild_on_rent" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Pricing</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  
                  
                   
                  <div class="form_row clearfix custom_fileds  owner_name pricing_feild_on_rent" id="rateable_value_container">
                    <label class=r_lbl>Rateble Value :<span class="required">*</span></label>
                    <input name="rateable_value" id="rateable_value" value="" type="text" class="textfield "  placeholder=" "/>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag pricing_feild_on_rent " id="rateable_value_hide_container ">
                    <label class=>Hide Rateble value On Linsting :</label>
                    <select name="rateable_value_hide" id="rateable_value_hide" class="textfield textfield_x " >
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds  owner_name pricing_feild_on_rent" id="rexpected_sale_price_container">
                    <label class=r_lbl>Expected Sale Price :<span class="required">*</span></label>
                <!--    <input name="expected_sale_price"  id="expected_sale_price" value="" type="text" class="textfield "  placeholder=" "/> -->
                   <?php 
                        $salesPrices= array('$100,000' ,'$150,000', '$200,000', '$250,000', '$300,000', '$350,000', '$400,000', '$450,000', '$500,000', '$550,000', '$600,000', '$650,000', '$700,000', '$750,000', '$800,000', '$850,000', '$900,000', '$950,000', '$1,000,000', '$1,100,000', '$1,150,000', '$1,200,000', '$1,250,000', '$1,300,000', '$1,350,000', '$1,400,000', '$1,450,000', '$1,500,000', '$1,600,000', '$1,700,000', '$1,750,000', '$1,800,000', '$1,900,000', '$2,000,000', '$2,100,000', '$2,200,000', '$2,250,000', '$3,000,000', '$3,500,000', '$4,000,000', '$4,500,000', '$5,000,000', '$6,000,000', '$7,000,000+'); 
                    
                    ?> 
                     <select name="expected_sale_price" id="expected_sale_price" class="textfield textfield_x " >
                      <option value="0">--Select Sale Rate--</option>
                      <?php foreach($salesPrices as $salesPricesVals){ 
                            $priceVals=  str_replace("$","",$salesPricesVals);
                            $priceVals=  str_replace(",","",$priceVals);
                            
                        ?>
                      <option value="<?php echo $priceVals;?>"><?php echo $salesPricesVals;?></option>
                      <?php } ?>
                    </select>
                  </div> 
                  
                  <div class="form_row clearfix custom_fileds classified_tag pricing_feild_on_rent ">
                    <label class=>Price :</label>
                    <select  id="price" name="price" onchange="enable_price_field('price');" class="textfield textfield_x " >
                      <option value="1">Asking price</option>
                      <option value="2">Enquiries over</option>
                      <option value="3">To be auctioned on</option>
                      <option value="4">Tenders closing on</option>
                      <option value="5">Price by negotiation</option>
                      <option value="6">Deadline Private Treaty by</option>
                    </select>
                  </div>
                   
                  <div class="form_row clearfix custom_fileds classified_tag " id="specify_price_container" style="display:none;">
                    <label class=>Specify a price(exclude taxes)</label>
                     <input name="specify_price"  id="specify_price" value="" type="text" class="textfield" style="max-width:370px !important;"/>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag " id="duration_type_container" style="display:none;">
                     <select  id="duration_type" name="duration_type" class="textfield textfield_x " >
                      <option value="Per Month">Per Month</option>
                      <option value="Per Year">Per Year</option>
                     </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag " id="outgoing_gross_lease_container" style="display:none;">
                     <input type="checkbox" name="outgoing_gross_lease" id="outgoing_gross_lease" value="Yes"/>Includes Includes outgoings (gross lease)
                  </div>
                  
                  <div id="ajax_price_field" class="pricing_feild_on_rent">
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction1" style="display:block;">
                      <label  class=r_lbl>Asking Price :<span class="required">*</span></label>
                      <input type="hidden" name="price1[]" id="Pdatepicker1" class="gui-input PhdnPrice" value="Asking price" />
                      <input name="price1[]"  id="datepicker1" value="" type="text" class="textfield Pricedatepicker31" style="max-width:370px !important;"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction2" style="display:none;">
                      <label class=r_lbl>Enquiries over :<span class="required">*</span></label>
                      <input type="hidden" name="price2[]" id="Pdatepicker2" class="gui-input PhdnPrice" value="Enquiries over" disabled="disabled"/>
                      <input name="price2[]" id="datepicker21" value="" type="text" class="textfield Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction3" style="display:none;">
                      <label class=r_lbl>Auction Date :<span class="required">*</span></label>
                      <input type="hidden" name="price3[]" id="Pdatepicker3" class="gui-input PhdnPrice" value="Auction Date" disabled="disabled" />
                      <input name="price3[]" id="datepicker3" value="" type="text" class="textfield Pricedatepicker3 Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction4">
                      <label class=r_lbl>Tender Closing Date :<span class="required">*</span></label>
                      <input type="hidden" id="Pdatepicker4" name="price4[]" class="gui-input PhdnPrice" value="Tender Closing Date" disabled="disabled"/>
                      <input id="datepicker41"  name="price4[]" value="" type="text" class="textfield Pricedatepicker3 Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction5">
                      <label class=r_lbl>Price By Negotiation :<span class="required">*</span></label>
                      <input type="hidden" id="Pdatepicker5" name="price5[]" class="gui-input PhdnPrice" value="Yes" disabled="disabled"/>
                      <input id="datepicker5"  name="price5[]" value="Yes" type="text" class="textfield Pricedatepicker31" style="max-width:370px !important;" readonly="readonly" disabled="disabled"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction6">
                      <label class=r_lbl>Deadline Private Treaty By :<span class="required">*</span></label>
                      <input type="hidden" name="price6[]" id="Pdatepicker6" class="gui-input PhdnPrice" value="Deadline Private Treaty By" disabled="disabled"/>
                      <input id="datepicker6"  name="price6[]" value="" type="text" class="textfield Pricedatepicker3 Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                  </div>
                  <!-- AJAX PRICE FIELD -->
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Features</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  owner_name" id="bedroom_container">
                    <label class="r_lbl">Bedroom :<span class="required">*</span></label>
                    <!--input name="bedroom"  id="bedroom" value="" type="text" class="textfield "  placeholder=" "/-->
                    <select id="bedroom" name="bedroom" class="textfield textfield_x " >
                      <option value="0">--Select Bedroom--</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option>
                    </select>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name"  id="bathroom_container"> 
                    <label class=r_lbl>Bathroom :<span class="required">*</span></label>
                    <!--input name="bathroom"  id="bathroom" value="" type="text" class="textfield "  placeholder=" "/-->
                    <select id="bathroom" name="bathroom" class="textfield textfield_x " >
                      <option value="0">--Select Bathroom--</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option>
                    </select>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                           <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Furniture and whiteware provided : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="prop_desc" name="furniture_and_whiteware_provided" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
<!-- floor area and rent area for rental condition  -->

                 <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Floor Area :<span class="required">*</span></label>
                    <input name="floor_area"  id="floor_area" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Land Area :<span class="required">*</span></label>
                    <input name="land_area"  id="land_area" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 
                <div id="step-plan" class="accordion-navigation step-wrapper step-plan current openhomecontainer" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Open Home</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>   
                  <div class="form_row clearfix custom_fileds  owner_name" id="open_home_date_container"> 
                    <label class=r_lbl>Date :<span class="required">*</span></label>
                    <input id="datepicker2"  name="open_home_date" value="" type="text" class="textfield "  placeholder="" style="max-width:370px !important;"/>
                  </div> 
               <div class="form_row clearfix custom_fileds  owner_name"  id="open_home_start_time_container">
                    <label class=r_lbl>Start Time :<span class="required">*</span></label>
                    <input id="timepicker2" name="open_home_strt_time" value="" type="text" class="textfield "  placeholder=" "/>
                  </div> 
                 <div class="form_row clearfix custom_fileds  owner_name"  id="open_home_end_time_container">
                    <label class=r_lbl>End Time :<span class="required">*</span></label>
                    <input id="timepicker3" name="open_home_end_time" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 

                    <!-- floor area and rent area for rental condition  -->
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Property Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Property Details : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="prop_desc" name="prop_desc" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Parking or garaging : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="parking" name="parking" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Amenities in the area : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="30" id="amenities" name="amenities" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Smoke alarm :</label>
                    <select name="smoke_alarm" id="smoke_alarm" class="textfield textfield_x " >
                      <option value="0">Don't Know</option>
                      <option value="1">No</option>
                      <option value="2">Yes</option>
                    </select>
                  </div>
                      <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Agency Reference :<span class="required">*</span></label>
                    <input name="agency_reference"  id="agency_reference" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 
                   <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Contact Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <!--<div class="form_row clearfix custom_fileds classified_tag ">-->
                  <!--  <label class=>Contact Details:</label>-->
                  <!--  <select name="contact_type" id="contact_type"  onchange="enable_contact_form('contact_type');" class="textfield textfield_x " >-->
                  <!--    <option value="1">Potential buyers should contact me</option>-->
                  <!--    <option value="2">Potential buyers should contact my real estate agent</option>-->
                  <!--  </select>-->
                  <!--</div>-->
                  <input name="contact_type" id="contact_type" value="1" type="hidden" class="textfield "  placeholder=" "/>
                  <div id="ajax_contact_field">
                    <div class="form_row clearfix custom_fileds classified_tag ">
                                <label class=>Are you a licensed real estate agent? :</label>
                                <select name="realestate_agent" id="realestate_agent" onchange="real_state_for_rent();" class="textfield textfield_x ">
                                    <option value="0" id="for_rent_1">No</option>
                                    <option value="1" id="for_rent_2">Yes</option>
                                </select>
                            </div>
                     <div id="ajax_contact_field_for_rent">
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Email Address :<span class="required">*</span></label>
                      <input name="agent_email"  id="agent_email" class="abc" value="" type="email" class="textfield "  placeholder=" "/>
                    </div>
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Your Name :<span class="required">*</span></label>
                      <input name="name"  id="name" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                 
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
                      <input name="mobile"  id="mobile" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Landline No. :<span class="required">*</span></label>
                      <input name="landline"  id="landline" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                  
                  <!-- END AJAX CONTACT FIELD -->
                    <div class="form_row clearfix custom_fileds  owner_name">
        <label class="r_lbl">Upload Photo (Size 90x90px) :<span class="required">*</span></label>
        <div class="select-file-div">Select File</div>
        <input name="selectphoto" id="selectphoto" value="" type="file" class="textfield " placeholder=" ">
        </div>
                 <!-- <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Logo :<span class="required">*</span></label>
                    <input name="logo"  id="logo" value="" type="file" class="textfield "  placeholder=" "/>
                  </div>-->
                  <input type="hidden" name="next_form" value="photo_upload" />
                  <input type="hidden" name="db_name" value="add_property" />
                  <input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" ></div>
                </div>
              </div>
            </div>
          </div>
          <!-- END AJAX DIV -->
        </form>
  
  <?php } ?>
<?php  
if(@$_POST["category_value"]==2) {
   $session= $_POST["session_id"];
  ?>
  
  <form name="submit_form" id="submit_form" class="dropzone form_front_style" action="javascript:void(0);" method="post" enctype="multipart/form-data">
          <div id="ajax_form">
                  <div id="step-plan"  class="accordion-navigation step-wrapper step-plan current" style='background-color: #05242f; border: 1px solid #05242f;'> <a class="step-heading active" href="javascript:void(0);"><span >*</span><span style="color: #fff;">Listing Title</span><span><i class="fa fa-caret-down"></i><i style="color: #fff;" class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Listing Title :<span class="required">*</span></label>
                    <input name="listing_title" id="listing_title" value="" type="text" class="textfield "  placeholder=" "/>
                    <label class=r_lbl>Listing Dropdown :<span class="required">*</span></label>
                    <select name="listing_title" id="listing_title" value=""  class="textfield" >
                        <option value="0" >--Select Listing--</option>
                        <option value="Rent per Week">Rent per Week</option>
                        <option value="Rent per Month">Rent per Month</option>
                    </select>
                    
                  </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Listing Duration :<span class="required">*</span></label>
                    <!--input name="listing_duration" id="datepicker2" readonly value="" type="text" class="textfield "  placeholder="/-->
                     <select name="listing_duration" id="datepicker21"  class="textfield textfield_x " >
                      <option value="0" >--Select Listing--</option>
                      <option value="4" >4 Days</option>
                      <option value="5" >5 Days</option>
                      <option value="6" >6 Days</option>
                      <option value="7" >7 Days</option>
                      <option value="10" >10 Days</option>
                      <option value="14" >14 Days</option>
                    </select>
                  </div>
                  </div>
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">House and street details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Street :<span class="required">*</span></label>
                    <input name="street" id="street" value="" type="text" class="textfield lsspl"  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Unit/ Flat :<span class="required">*</span></label>
                    <input name="unit_flat" id="unit_flat" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Street Name :<span class="required">*</span></label>
                    <input name="street_name" id="street_name" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Location</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <?php $loginUserId= $session;
                $countryId= 0;
                $getCountries=getDetails(doSelect("country","ambit_registration",array("ar_id"=>$loginUserId)));
                if(count($getCountries) > 0){
                    foreach($getCountries as $getCountriesKey=>$getCountriesVals){
                        $countryId= $getCountriesVals['country'];
                    }
                    if(!empty($countryId)){
                        
            ?>
                   <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Country :</label>
                    <select name="country" id="country" onchange="fetch_city();"  class="textfield textfield_x " >
                      <?php
                $country=getDetails(doSelect("cn_id,cn_name","ambit_country",array("cn_id"=>$countryId)));
                //var_dump($country);

                foreach($country as $countryk=>$countryv){
              ?>
                      <option value="<?php echo $countryv["cn_id"]; ?>" <?php echo ($countryv["cn_id"] == $countryId)?'selected="selected"':''; ?>><?php echo $countryv["cn_name"];  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>City :</label>
                    <select name="city" id="city_update" class="textfield textfield_x " onchange="fetch_region();">
                      <option value="0">--Select City--</option>
                      <?php $getCity=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$countryId))); 
                      //var_dump($getCity);
                foreach($getCity as $getCityKey=>$getCityVals){
              ?>
                      <option value="<?php echo $getCityVals["ct_id"]; ?>"><?php echo $getCityVals["ct_name"];  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Region :</label>
                    <select  id="region" name="region"  onchange="fetch_suburb();" class="textfield textfield_x " >
                      <option value="0">--Select Region--</option>
                      <!--<?php $getCity=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$countryId))); 
                foreach($getCity as $getCityKey=>$getCityVals){
              ?>
                      <option value="<?php echo $getCityVals["ct_id"]; ?>"><?php echo $getCityVals["ct_name"];  ?></option>
                      <?php } ?>-->
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Suburb  :</label>
                    <select id="suburb" name="suburb" class="textfield textfield_x " >
                      <option value="0">--Select Suburb--</option>
                    </select>
                  </div>
                  <?php } } ?>
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current pricing_feild_on_rent" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Pricing</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  
                  
                   
                  <div class="form_row clearfix custom_fileds  owner_name pricing_feild_on_rent" id="rateable_value_container">
                    <label class=r_lbl>Rateble Value :<span class="required">*</span></label>
                    <input name="rateable_value" id="rateable_value" value="" type="text" class="textfield "  placeholder=" "/>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag pricing_feild_on_rent " id="rateable_value_hide_container ">
                    <label class=>Hide Rateble value On Linsting :</label>
                    <select name="rateable_value_hide" id="rateable_value_hide" class="textfield textfield_x " >
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds  owner_name pricing_feild_on_rent" id="rexpected_sale_price_container">
                    <label class=r_lbl>Expected Sale Price :<span class="required">*</span></label>
                <!--    <input name="expected_sale_price"  id="expected_sale_price" value="" type="text" class="textfield "  placeholder=" "/> -->
                   <?php 
                        $salesPrices= array('$100,000' ,'$150,000', '$200,000', '$250,000', '$300,000', '$350,000', '$400,000', '$450,000', '$500,000', '$550,000', '$600,000', '$650,000', '$700,000', '$750,000', '$800,000', '$850,000', '$900,000', '$950,000', '$1,000,000', '$1,100,000', '$1,150,000', '$1,200,000', '$1,250,000', '$1,300,000', '$1,350,000', '$1,400,000', '$1,450,000', '$1,500,000', '$1,600,000', '$1,700,000', '$1,750,000', '$1,800,000', '$1,900,000', '$2,000,000', '$2,100,000', '$2,200,000', '$2,250,000', '$3,000,000', '$3,500,000', '$4,000,000', '$4,500,000', '$5,000,000', '$6,000,000', '$7,000,000+'); 
                    
                    ?> 
                     <select name="expected_sale_price" id="expected_sale_price" class="textfield textfield_x " >
                      <option value="0">--Select Sale Rate--</option>
                      <?php foreach($salesPrices as $salesPricesVals){ 
                            $priceVals=  str_replace("$","",$salesPricesVals);
                            $priceVals=  str_replace(",","",$priceVals);
                            
                        ?>
                      <option value="<?php echo $priceVals;?>"><?php echo $salesPricesVals;?></option>
                      <?php } ?>
                    </select>
                  </div> 
                  
                  <div class="form_row clearfix custom_fileds classified_tag pricing_feild_on_rent ">
                    <label class=>Price :</label>
                    <select  id="price" name="price" onchange="enable_price_field('price');" class="textfield textfield_x " >
                      <option value="1">Asking price</option>
                      <option value="2">Enquiries over</option>
                      <option value="3">To be auctioned on</option>
                      <option value="4">Tenders closing on</option>
                      <option value="5">Price by negotiation</option>
                      <option value="6">Deadline Private Treaty by</option>
                    </select>
                  </div>
                   
                  <div class="form_row clearfix custom_fileds classified_tag " id="specify_price_container" style="display:none;">
                    <label class=>Specify a price(exclude taxes)</label>
                     <input name="specify_price"  id="specify_price" value="" type="text" class="textfield" style="max-width:370px !important;"/>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag " id="duration_type_container" style="display:none;">
                     <select  id="duration_type" name="duration_type" class="textfield textfield_x " >
                      <option value="Per Month">Per Month</option>
                      <option value="Per Year">Per Year</option>
                     </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag " id="outgoing_gross_lease_container" style="display:none;">
                     <input type="checkbox" name="outgoing_gross_lease" id="outgoing_gross_lease" value="Yes"/>Includes Includes outgoings (gross lease)
                  </div>
                  
                  <div id="ajax_price_field" class="pricing_feild_on_rent">
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction1" style="display:block;">
                      <label  class=r_lbl>Asking Price :<span class="required">*</span></label>
                      <input type="hidden" name="price1[]" id="Pdatepicker1" class="gui-input PhdnPrice" value="Asking price" />
                      <input name="price1[]"  id="datepicker1" value="" type="text" class="textfield Pricedatepicker31" style="max-width:370px !important;"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction2" style="display:none;">
                      <label class=r_lbl>Enquiries over :<span class="required">*</span></label>
                      <input type="hidden" name="price2[]" id="Pdatepicker2" class="gui-input PhdnPrice" value="Enquiries over" disabled="disabled"/>
                      <input name="price2[]" id="datepicker21" value="" type="text" class="textfield Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction3" style="display:none;">
                      <label class=r_lbl>Auction Date :<span class="required">*</span></label>
                      <input type="hidden" name="price3[]" id="Pdatepicker3" class="gui-input PhdnPrice" value="Auction Date" disabled="disabled" />
                      <input name="price3[]" id="datepicker3" value="" type="text" class="textfield Pricedatepicker3 Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction4">
                      <label class=r_lbl>Tender Closing Date :<span class="required">*</span></label>
                      <input type="hidden" id="Pdatepicker4" name="price4[]" class="gui-input PhdnPrice" value="Tender Closing Date" disabled="disabled"/>
                      <input id="datepicker41"  name="price4[]" value="" type="text" class="textfield Pricedatepicker3 Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction5">
                      <label class=r_lbl>Price By Negotiation :<span class="required">*</span></label>
                      <input type="hidden" id="Pdatepicker5" name="price5[]" class="gui-input PhdnPrice" value="Yes" disabled="disabled"/>
                      <input id="datepicker5"  name="price5[]" value="Yes" type="text" class="textfield Pricedatepicker31" style="max-width:370px !important;" readonly="readonly" disabled="disabled"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction6">
                      <label class=r_lbl>Deadline Private Treaty By :<span class="required">*</span></label>
                      <input type="hidden" name="price6[]" id="Pdatepicker6" class="gui-input PhdnPrice" value="Deadline Private Treaty By" disabled="disabled"/>
                      <input id="datepicker6"  name="price6[]" value="" type="text" class="textfield Pricedatepicker3 Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                  </div>
                  <!-- AJAX PRICE FIELD -->
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Features</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  owner_name" id="bedroom_container">
                    <label class="r_lbl">Bedroom :<span class="required">*</span></label>
                    <!--input name="bedroom"  id="bedroom" value="" type="text" class="textfield "  placeholder=" "/-->
                    <select id="bedroom" name="bedroom" class="textfield textfield_x " >
                      <option value="0">--Select Bedroom--</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option>
                    </select>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name"  id="bathroom_container"> 
                    <label class=r_lbl>Bathroom :<span class="required">*</span></label>
                    <!--input name="bathroom"  id="bathroom" value="" type="text" class="textfield "  placeholder=" "/-->
                    <select id="bathroom" name="bathroom" class="textfield textfield_x " >
                      <option value="0">--Select Bathroom--</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option>
                    </select>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                           <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Furniture and whiteware provided : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="prop_desc" name="furniture_and_whiteware_provided" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
<!-- floor area and rent area for rental condition  -->

                 <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Floor Area :<span class="required">*</span></label>
                    <input name="floor_area"  id="floor_area" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Land Area :<span class="required">*</span></label>
                    <input name="land_area"  id="land_area" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 
                <div id="step-plan" class="accordion-navigation step-wrapper step-plan current openhomecontainer" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Open Home</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>   
                  <div class="form_row clearfix custom_fileds  owner_name" id="open_home_date_container"> 
                    <label class=r_lbl>Date :<span class="required">*</span></label>
                    <input id="datepicker2"  name="open_home_date" value="" type="text" class="textfield "  placeholder="" style="max-width:370px !important;"/>
                  </div> 
               <div class="form_row clearfix custom_fileds  owner_name"  id="open_home_start_time_container">
                    <label class=r_lbl>Start Time :<span class="required">*</span></label>
                    <input id="timepicker2" name="open_home_strt_time" value="" type="text" class="textfield "  placeholder=" "/>
                  </div> 
                 <div class="form_row clearfix custom_fileds  owner_name"  id="open_home_end_time_container">
                    <label class=r_lbl>End Time :<span class="required">*</span></label>
                    <input id="timepicker3" name="open_home_end_time" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 

                    <!-- floor area and rent area for rental condition  -->
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Property Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Property Details : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="prop_desc" name="prop_desc" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Parking or garaging : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="parking" name="parking" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Amenities in the area : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="30" id="amenities" name="amenities" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Smoke alarm :</label>
                    <select name="smoke_alarm" id="smoke_alarm" class="textfield textfield_x " >
                      <option value="0">Don't Know</option>
                      <option value="1">No</option>
                      <option value="2">Yes</option>
                    </select>
                  </div>
                      <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Agency Reference :<span class="required">*</span></label>
                    <input name="agency_reference"  id="agency_reference" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Contact Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <!--<div class="form_row clearfix custom_fileds classified_tag ">-->
                  <!--  <label class=>Contact Details:</label>-->
                  <!--  <select name="contact_type" id="contact_type"  onchange="enable_contact_form('contact_type');" class="textfield textfield_x " >-->
                  <!--    <option value="1">Potential buyers should contact me</option>-->
                  <!--    <option value="2">Potential buyers should contact my real estate agent</option>-->
                  <!--  </select>-->
                  <!--</div>-->
                  <input name="contact_type" id="contact_type" value="1" type="hidden" class="textfield "  placeholder=" "/>
                  <div id="ajax_contact_field">
                    <div class="form_row clearfix custom_fileds classified_tag ">
                                <label class=>Are you a licensed real estate agent? :</label>
                                <select name="realestate_agent" id="realestate_agent" onchange="real_state_for_rent();" class="textfield textfield_x ">
                                    <option value="0" id="for_rent_1">No</option>
                                    <option value="1" id="for_rent_2">Yes</option>
                                </select>
                            </div>
                     <div id="ajax_contact_field_for_rent">
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Email Address :<span class="required">*</span></label>
                      <input name="agent_email"  id="agent_email" class="abc" value="" type="email" class="textfield "  placeholder=" "/>
                    </div>
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Your Name :<span class="required">*</span></label>
                      <input name="name"  id="name" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                 
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
                      <input name="mobile"  id="mobile" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Landline No. :<span class="required">*</span></label>
                      <input name="landline"  id="landline" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                      <div class="form_row clearfix custom_fileds  owner_name">
        <label class="r_lbl">Upload Photo (Size 90x90px) :<span class="required">*</span></label>
        <div class="select-file-div">Select File</div>
        <input name="selectphoto" id="selectphoto" value="" type="file" class="textfield " placeholder=" ">
        </div>
                  <!-- END AJAX CONTACT FIELD -->
                
                  <!--<div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Logo :<span class="required">*</span></label>
                    <input name="logo"  id="logo" value="" type="file" class="textfield "  placeholder=" "/>
                  </div>-->
                  <input type="hidden" name="next_form" value="photo_upload" />
                  <input type="hidden" name="db_name" value="add_property" />
                  <input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" ></div>
                </div>
              </div>
            </div>
          </div>
          <!-- END AJAX DIV -->
        </form>
  
  <?php } ?>
<?php  
if(@$_POST["category_value"]==3) {
   $session= $_POST["session_id"];
  ?>
  
  <form name="submit_form" id="submit_form" class="dropzone form_front_style" action="javascript:void(0);" method="post" enctype="multipart/form-data">
          <div id="ajax_form">
                  <div id="step-plan"  class="accordion-navigation step-wrapper step-plan current" style='background-color: #05242f; border: 1px solid #05242f;'> <a class="step-heading active" href="javascript:void(0);"><span >*</span><span style="color: #fff;">Listing Title</span><span><i class="fa fa-caret-down"></i><i style="color: #fff;" class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Listing Title :<span class="required">*</span></label>
                    <input name="listing_title" id="listing_title" value="" type="text" class="textfield "  placeholder=" "/>
                    <label class=r_lbl>Listing Dropdown :<span class="required">*</span></label>
                    <select name="listing_title" id="listing_title" value=""  class="textfield" >
                        <option value="0" >--Select Listing--</option>
                        <option value="Rent per Week">Rent per Week</option>
                        <option value="Rent per Month">Rent per Month</option>
                    </select>
                    
                  </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Listing Duration :<span class="required">*</span></label>
                    <!--input name="listing_duration" id="datepicker2" readonly value="" type="text" class="textfield "  placeholder="/-->
                    <select name="listing_duration" id="datepicker21"  class="textfield textfield_x " >
                      <option value="0" >--Select Listing--</option>
                      <option value="4" >4 Days</option>
                      <option value="5" >5 Days</option>
                      <option value="6" >6 Days</option>
                      <option value="7" >7 Days</option>
                      <option value="10" >10 Days</option>
                      <option value="14" >14 Days</option>
                    </select>
                  </div>
                  </div>
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">House and street details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Street :<span class="required">*</span></label>
                    <input name="street" id="street" value="" type="text" class="textfield lsspl"  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Unit/ Flat :<span class="required">*</span></label>
                    <input name="unit_flat" id="unit_flat" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Street Name :<span class="required">*</span></label>
                    <input name="street_name" id="street_name" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Location</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <?php $loginUserId= $session;
                $countryId= 0;
                $getCountries=getDetails(doSelect("country","ambit_registration",array("ar_id"=>$loginUserId)));
                if(count($getCountries) > 0){
                    foreach($getCountries as $getCountriesKey=>$getCountriesVals){
                        $countryId= $getCountriesVals['country'];
                    }
                    if(!empty($countryId)){
                        
            ?>
                   <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Country :</label>
                    <select name="country" id="country" onchange="fetch_city();"  class="textfield textfield_x " >
                      <?php
                $country=getDetails(doSelect("cn_id,cn_name","ambit_country",array("cn_id"=>$countryId)));
                //var_dump($country);

                foreach($country as $countryk=>$countryv){
              ?>
                      <option value="<?php echo $countryv["cn_id"]; ?>" <?php echo ($countryv["cn_id"] == $countryId)?'selected="selected"':''; ?>><?php echo $countryv["cn_name"];  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>City :</label>
                    <select name="city" id="city_update" class="textfield textfield_x " onchange="fetch_region();">
                      <option value="0">--Select City--</option>
                      <?php $getCity=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$countryId))); 
                      //var_dump($getCity);
                foreach($getCity as $getCityKey=>$getCityVals){
              ?>
                      <option value="<?php echo $getCityVals["ct_id"]; ?>"><?php echo $getCityVals["ct_name"];  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Region :</label>
                    <select  id="region" name="region"  onchange="fetch_suburb();" class="textfield textfield_x " >
                      <option value="0">--Select Region--</option>
                      <!--<?php $getCity=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$countryId))); 
                foreach($getCity as $getCityKey=>$getCityVals){
              ?>
                      <option value="<?php echo $getCityVals["ct_id"]; ?>"><?php echo $getCityVals["ct_name"];  ?></option>
                      <?php } ?>-->
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Suburb  :</label>
                    <select id="suburb" name="suburb" class="textfield textfield_x " >
                      <option value="0">--Select Suburb--</option>
                    </select>
                  </div>
                  <?php } } ?>
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current pricing_feild_on_rent" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Pricing</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  
                  
                   
                  <div class="form_row clearfix custom_fileds  owner_name pricing_feild_on_rent" id="rateable_value_container">
                    <label class=r_lbl>Rateble Value :<span class="required">*</span></label>
                    <input name="rateable_value" id="rateable_value" value="" type="text" class="textfield "  placeholder=" "/>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag pricing_feild_on_rent " id="rateable_value_hide_container ">
                    <label class=>Hide Rateble value On Linsting :</label>
                    <select name="rateable_value_hide" id="rateable_value_hide" class="textfield textfield_x " >
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds  owner_name pricing_feild_on_rent" id="rexpected_sale_price_container">
                    <label class=r_lbl>Expected Sale Price :<span class="required">*</span></label>
                <!--    <input name="expected_sale_price"  id="expected_sale_price" value="" type="text" class="textfield "  placeholder=" "/> -->
                   <?php 
                        $salesPrices= array('$100,000' ,'$150,000', '$200,000', '$250,000', '$300,000', '$350,000', '$400,000', '$450,000', '$500,000', '$550,000', '$600,000', '$650,000', '$700,000', '$750,000', '$800,000', '$850,000', '$900,000', '$950,000', '$1,000,000', '$1,100,000', '$1,150,000', '$1,200,000', '$1,250,000', '$1,300,000', '$1,350,000', '$1,400,000', '$1,450,000', '$1,500,000', '$1,600,000', '$1,700,000', '$1,750,000', '$1,800,000', '$1,900,000', '$2,000,000', '$2,100,000', '$2,200,000', '$2,250,000', '$3,000,000', '$3,500,000', '$4,000,000', '$4,500,000', '$5,000,000', '$6,000,000', '$7,000,000+'); 
                    
                    ?> 
                     <select name="expected_sale_price" id="expected_sale_price" class="textfield textfield_x " >
                      <option value="0">--Select Sale Rate--</option>
                      <?php foreach($salesPrices as $salesPricesVals){ 
                            $priceVals=  str_replace("$","",$salesPricesVals);
                            $priceVals=  str_replace(",","",$priceVals);
                            
                        ?>
                      <option value="<?php echo $priceVals;?>"><?php echo $salesPricesVals;?></option>
                      <?php } ?>
                    </select>
                  </div> 
                  
                  <div class="form_row clearfix custom_fileds classified_tag pricing_feild_on_rent ">
                    <label class=>Price :</label>
                    <select  id="price" name="price" onchange="enable_price_field('price');" class="textfield textfield_x " >
                      <option value="1">Asking price</option>
                      <option value="2">Enquiries over</option>
                      <option value="3">To be auctioned on</option>
                      <option value="4">Tenders closing on</option>
                      <option value="5">Price by negotiation</option>
                      <option value="6">Deadline Private Treaty by</option>
                    </select>
                  </div>
                   
                  <div class="form_row clearfix custom_fileds classified_tag " id="specify_price_container" style="display:none;">
                    <label class=>Specify a price(exclude taxes)</label>
                     <input name="specify_price"  id="specify_price" value="" type="text" class="textfield" style="max-width:370px !important;"/>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag " id="duration_type_container" style="display:none;">
                     <select  id="duration_type" name="duration_type" class="textfield textfield_x " >
                      <option value="Per Month">Per Month</option>
                      <option value="Per Year">Per Year</option>
                     </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag " id="outgoing_gross_lease_container" style="display:none;">
                     <input type="checkbox" name="outgoing_gross_lease" id="outgoing_gross_lease" value="Yes"/>Includes Includes outgoings (gross lease)
                  </div>
                  
                  <div id="ajax_price_field" class="pricing_feild_on_rent">
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction1" style="display:block;">
                      <label  class=r_lbl>Asking Price :<span class="required">*</span></label>
                      <input type="hidden" name="price1[]" id="Pdatepicker1" class="gui-input PhdnPrice" value="Asking price" />
                      <input name="price1[]"  id="datepicker1" value="" type="text" class="textfield Pricedatepicker31" style="max-width:370px !important;"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction2" style="display:none;">
                      <label class=r_lbl>Enquiries over :<span class="required">*</span></label>
                      <input type="hidden" name="price2[]" id="Pdatepicker2" class="gui-input PhdnPrice" value="Enquiries over" disabled="disabled"/>
                      <input name="price2[]" id="datepicker21" value="" type="text" class="textfield Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction3" style="display:none;">
                      <label class=r_lbl>Auction Date :<span class="required">*</span></label>
                      <input type="hidden" name="price3[]" id="Pdatepicker3" class="gui-input PhdnPrice" value="Auction Date" disabled="disabled" />
                      <input name="price3[]" id="datepicker3" value="" type="text" class="textfield Pricedatepicker3 Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction4">
                      <label class=r_lbl>Tender Closing Date :<span class="required">*</span></label>
                      <input type="hidden" id="Pdatepicker4" name="price4[]" class="gui-input PhdnPrice" value="Tender Closing Date" disabled="disabled"/>
                      <input id="datepicker41"  name="price4[]" value="" type="text" class="textfield Pricedatepicker3 Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction5">
                      <label class=r_lbl>Price By Negotiation :<span class="required">*</span></label>
                      <input type="hidden" id="Pdatepicker5" name="price5[]" class="gui-input PhdnPrice" value="Yes" disabled="disabled"/>
                      <input id="datepicker5"  name="price5[]" value="Yes" type="text" class="textfield Pricedatepicker31" style="max-width:370px !important;" readonly="readonly" disabled="disabled"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction6">
                      <label class=r_lbl>Deadline Private Treaty By :<span class="required">*</span></label>
                      <input type="hidden" name="price6[]" id="Pdatepicker6" class="gui-input PhdnPrice" value="Deadline Private Treaty By" disabled="disabled"/>
                      <input id="datepicker6"  name="price6[]" value="" type="text" class="textfield Pricedatepicker3 Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                  </div>
                  <!-- AJAX PRICE FIELD -->
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Features</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  owner_name" id="bedroom_container">
                    <label class="r_lbl">Bedroom :<span class="required">*</span></label>
                    <!--input name="bedroom"  id="bedroom" value="" type="text" class="textfield "  placeholder=" "/-->
                    <select id="bedroom" name="bedroom" class="textfield textfield_x " >
                      <option value="0">--Select Bedroom--</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option>
                    </select>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name"  id="bathroom_container"> 
                    <label class=r_lbl>Bathroom :<span class="required">*</span></label>
                    <!--input name="bathroom"  id="bathroom" value="" type="text" class="textfield "  placeholder=" "/-->
                    <select id="bathroom" name="bathroom" class="textfield textfield_x " >
                      <option value="0">--Select Bathroom--</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option>
                    </select>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                           <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Furniture and whiteware provided : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="prop_desc" name="furniture_and_whiteware_provided" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
<!-- floor area and rent area for rental condition  -->

                 <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Floor Area :<span class="required">*</span></label>
                    <input name="floor_area"  id="floor_area" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Land Area :<span class="required">*</span></label>
                    <input name="land_area"  id="land_area" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 
                <div id="step-plan" class="accordion-navigation step-wrapper step-plan current openhomecontainer" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Open Home</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>   
                  <div class="form_row clearfix custom_fileds  owner_name" id="open_home_date_container"> 
                    <label class=r_lbl>Date :<span class="required">*</span></label>
                    <input id="datepicker2"  name="open_home_date" value="" type="text" class="textfield "  placeholder="" style="max-width:370px !important;"/>
                  </div> 
               <div class="form_row clearfix custom_fileds  owner_name"  id="open_home_start_time_container">
                    <label class=r_lbl>Start Time :<span class="required">*</span></label>
                    <input id="timepicker2" name="open_home_strt_time" value="" type="text" class="textfield "  placeholder=" "/>
                  </div> 
                 <div class="form_row clearfix custom_fileds  owner_name"  id="open_home_end_time_container">
                    <label class=r_lbl>End Time :<span class="required">*</span></label>
                    <input id="timepicker3" name="open_home_end_time" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 

                    <!-- floor area and rent area for rental condition  -->
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Property Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Property Details : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="prop_desc" name="prop_desc" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Parking or garaging : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="parking" name="parking" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Amenities in the area : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="30" id="amenities" name="amenities" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Smoke alarm :</label>
                    <select name="smoke_alarm" id="smoke_alarm" class="textfield textfield_x " >
                      <option value="0">Don't Know</option>
                      <option value="1">No</option>
                      <option value="2">Yes</option>
                    </select>
                  </div>
                      <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Agency Reference :<span class="required">*</span></label>
                    <input name="agency_reference"  id="agency_reference" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Contact Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <!--<div class="form_row clearfix custom_fileds classified_tag ">-->
                  <!--  <label class=>Contact Details:</label>-->
                  <!--  <select name="contact_type" id="contact_type"  onchange="enable_contact_form('contact_type');" class="textfield textfield_x " >-->
                  <!--    <option value="1">Potential buyers should contact me</option>-->
                  <!--    <option value="2">Potential buyers should contact my real estate agent</option>-->
                  <!--  </select>-->
                  <!--</div>-->
                  <input name="contact_type" id="contact_type" value="1" type="hidden" class="textfield "  placeholder=" "/>
                  <div id="ajax_contact_field">
                    <div class="form_row clearfix custom_fileds classified_tag ">
                                <label class=>Are you a licensed real estate agent? :</label>
                                <select name="realestate_agent" id="realestate_agent" onchange="real_state_for_rent();" class="textfield textfield_x ">
                                    <option value="0" id="for_rent_1">No</option>
                                    <option value="1" id="for_rent_2">Yes</option>
                                </select>
                            </div>
                     <div id="ajax_contact_field_for_rent">
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Email Address :<span class="required">*</span></label>
                      <input name="agent_email"  id="agent_email" class="abc" value="" type="email" class="textfield "  placeholder=" "/>
                    </div>
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Your Name :<span class="required">*</span></label>
                      <input name="name"  id="name" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                 
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
                      <input name="mobile"  id="mobile" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Landline No. :<span class="required">*</span></label>
                      <input name="landline"  id="landline" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                      <div class="form_row clearfix custom_fileds  owner_name">
        <label class="r_lbl">Upload Photo (Size 90x90px) :<span class="required">*</span></label>
        <div class="select-file-div">Select File</div>
        <input name="selectphoto" id="selectphoto" value="" type="file" class="textfield " placeholder=" ">
        </div>
                  <!-- END AJAX CONTACT FIELD -->
                
                  <!--<div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Logo :<span class="required">*</span></label>
                    <input name="logo"  id="logo" value="" type="file" class="textfield "  placeholder=" "/>
                  </div>-->
                  <input type="hidden" name="next_form" value="photo_upload" />
                  <input type="hidden" name="db_name" value="add_property" />
                  <input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" ></div>
                </div>
              </div>
            </div>
          </div>
          <!-- END AJAX DIV -->
        </form>
  
  <?php } ?>
<?php  
if(@$_POST["category_value"]==20) {
   $session= $_POST["session_id"];
  ?>
  
  <form name="submit_form" id="submit_form" class="dropzone form_front_style" action="javascript:void(0);" method="post" enctype="multipart/form-data">
          <div id="ajax_form">
                  <div id="step-plan"  class="accordion-navigation step-wrapper step-plan current" style='background-color: #05242f; border: 1px solid #05242f;'> <a class="step-heading active" href="javascript:void(0);"><span >*</span><span style="color: #fff;">Listing Title</span><span><i class="fa fa-caret-down"></i><i style="color: #fff;" class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Listing Title :<span class="required">*</span></label>
                    <input name="listing_title" id="listing_title" value="" type="text" class="textfield "  placeholder=" "/>
                    <label class=r_lbl>Listing Dropdown :<span class="required">*</span></label>
                    <select name="listing_title" id="listing_title" value=""  class="textfield" >
                        <option value="0" >--Select Listing--</option>
                        <option value="Rent per Week">Rent per Week</option>
                        <option value="Rent per Month">Rent per Month</option>
                    </select>
                    
                  </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Listing Duration :<span class="required">*</span></label>
                    <!--input name="listing_duration" id="datepicker2" readonly value="" type="text" class="textfield "  placeholder="/-->
                    <select name="listing_duration" id="datepicker21"  class="textfield textfield_x " >
                      <option value="0" >--Select Listing--</option>
                      <option value="4" >4 Days</option>
                      <option value="5" >5 Days</option>
                      <option value="6" >6 Days</option>
                      <option value="7" >7 Days</option>
                      <option value="10" >10 Days</option>
                      <option value="14" >14 Days</option>
                    </select>
                  </div>
                  </div>
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">House and street details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Street :<span class="required">*</span></label>
                    <input name="street" id="street" value="" type="text" class="textfield lsspl"  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Unit/ Flat :<span class="required">*</span></label>
                    <input name="unit_flat" id="unit_flat" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Street Name :<span class="required">*</span></label>
                    <input name="street_name" id="street_name" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Location</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <?php $loginUserId= $session;
                $countryId= 0;
                $getCountries=getDetails(doSelect("country","ambit_registration",array("ar_id"=>$loginUserId)));
                if(count($getCountries) > 0){
                    foreach($getCountries as $getCountriesKey=>$getCountriesVals){
                        $countryId= $getCountriesVals['country'];
                    }
                    if(!empty($countryId)){
                        
            ?>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Country :</label>
                    <select name="country" id="country" onchange="fetch_city();"  class="textfield textfield_x " >
                      <?php
                $country=getDetails(doSelect("cn_id,cn_name","ambit_country",array("cn_id"=>$countryId)));
                //var_dump($country);

                foreach($country as $countryk=>$countryv){
              ?>
                      <option value="<?php echo $countryv["cn_id"]; ?>" <?php echo ($countryv["cn_id"] == $countryId)?'selected="selected"':''; ?>><?php echo $countryv["cn_name"];  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>City :</label>
                    <select name="city" id="city_update" class="textfield textfield_x " onchange="fetch_region();">
                      <option value="0">--Select City--</option>
                      <?php $getCity=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$countryId))); 
                      //var_dump($getCity);
                foreach($getCity as $getCityKey=>$getCityVals){
              ?>
                      <option value="<?php echo $getCityVals["ct_id"]; ?>"><?php echo $getCityVals["ct_name"];  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Region :</label>
                    <select  id="region" name="region"  onchange="fetch_suburb();" class="textfield textfield_x " >
                      <option value="0">--Select Region--</option>
                      <!--<?php $getCity=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$countryId))); 
                foreach($getCity as $getCityKey=>$getCityVals){
              ?>
                      <option value="<?php echo $getCityVals["ct_id"]; ?>"><?php echo $getCityVals["ct_name"];  ?></option>
                      <?php } ?>-->
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Suburb  :</label>
                    <select id="suburb" name="suburb" class="textfield textfield_x " >
                      <option value="0">--Select Suburb--</option>
                    </select>
                  </div>  
                  <?php } } ?>
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current pricing_feild_on_rent" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Pricing</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  
                  
                   
                  <div class="form_row clearfix custom_fileds  owner_name pricing_feild_on_rent" id="rateable_value_container">
                    <label class=r_lbl>Rateble Value :<span class="required">*</span></label>
                    <input name="rateable_value" id="rateable_value" value="" type="text" class="textfield "  placeholder=" "/>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag pricing_feild_on_rent " id="rateable_value_hide_container ">
                    <label class=>Hide Rateble value On Linsting :</label>
                    <select name="rateable_value_hide" id="rateable_value_hide" class="textfield textfield_x " >
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                    </select>
                  </div>
                  <div class="form_row clearfix custom_fileds  owner_name pricing_feild_on_rent" id="rexpected_sale_price_container">
                    <label class=r_lbl>Expected Sale Price :<span class="required">*</span></label>
                <!--    <input name="expected_sale_price"  id="expected_sale_price" value="" type="text" class="textfield "  placeholder=" "/> -->
                   <?php 
                        $salesPrices= array('$100,000' ,'$150,000', '$200,000', '$250,000', '$300,000', '$350,000', '$400,000', '$450,000', '$500,000', '$550,000', '$600,000', '$650,000', '$700,000', '$750,000', '$800,000', '$850,000', '$900,000', '$950,000', '$1,000,000', '$1,100,000', '$1,150,000', '$1,200,000', '$1,250,000', '$1,300,000', '$1,350,000', '$1,400,000', '$1,450,000', '$1,500,000', '$1,600,000', '$1,700,000', '$1,750,000', '$1,800,000', '$1,900,000', '$2,000,000', '$2,100,000', '$2,200,000', '$2,250,000', '$3,000,000', '$3,500,000', '$4,000,000', '$4,500,000', '$5,000,000', '$6,000,000', '$7,000,000+'); 
                    
                    ?> 
                     <select name="expected_sale_price" id="expected_sale_price" class="textfield textfield_x " >
                      <option value="0">--Select Sale Rate--</option>
                      <?php foreach($salesPrices as $salesPricesVals){ 
                            $priceVals=  str_replace("$","",$salesPricesVals);
                            $priceVals=  str_replace(",","",$priceVals);
                            
                        ?>
                      <option value="<?php echo $priceVals;?>"><?php echo $salesPricesVals;?></option>
                      <?php } ?>
                    </select>
                  </div> 
                  
                  <div class="form_row clearfix custom_fileds classified_tag pricing_feild_on_rent ">
                    <label class=>Price :</label>
                    <select  id="price" name="price" onchange="enable_price_field('price');" class="textfield textfield_x " >
                      <option value="1">Asking price</option>
                      <option value="2">Enquiries over</option>
                      <option value="3">To be auctioned on</option>
                      <option value="4">Tenders closing on</option>
                      <option value="5">Price by negotiation</option>
                      <option value="6">Deadline Private Treaty by</option>
                    </select>
                  </div>
                   
                  <div class="form_row clearfix custom_fileds classified_tag " id="specify_price_container" style="display:none;">
                    <label class=>Specify a price(exclude taxes)</label>
                     <input name="specify_price"  id="specify_price" value="" type="text" class="textfield" style="max-width:370px !important;"/>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag " id="duration_type_container" style="display:none;">
                     <select  id="duration_type" name="duration_type" class="textfield textfield_x " >
                      <option value="Per Month">Per Month</option>
                      <option value="Per Year">Per Year</option>
                     </select>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag " id="outgoing_gross_lease_container" style="display:none;">
                     <input type="checkbox" name="outgoing_gross_lease" id="outgoing_gross_lease" value="Yes"/>Includes Includes outgoings (gross lease)
                  </div>
                  
                  <div id="ajax_price_field" class="pricing_feild_on_rent">
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction1" style="display:block;">
                      <label  class=r_lbl>Asking Price :<span class="required">*</span></label>
                      <input type="hidden" name="price1[]" id="Pdatepicker1" class="gui-input PhdnPrice" value="Asking price" />
                      <input name="price1[]"  id="datepicker1" value="" type="text" class="textfield Pricedatepicker31" style="max-width:370px !important;"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction2" style="display:none;">
                      <label class=r_lbl>Enquiries over :<span class="required">*</span></label>
                      <input type="hidden" name="price2[]" id="Pdatepicker2" class="gui-input PhdnPrice" value="Enquiries over" disabled="disabled"/>
                      <input name="price2[]" id="datepicker21" value="" type="text" class="textfield Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction3" style="display:none;">
                      <label class=r_lbl>Auction Date :<span class="required">*</span></label>
                      <input type="hidden" name="price3[]" id="Pdatepicker3" class="gui-input PhdnPrice" value="Auction Date" disabled="disabled" />
                      <input name="price3[]" id="datepicker3" value="" type="text" class="textfield Pricedatepicker3 Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction4">
                      <label class=r_lbl>Tender Closing Date :<span class="required">*</span></label>
                      <input type="hidden" id="Pdatepicker4" name="price4[]" class="gui-input PhdnPrice" value="Tender Closing Date" disabled="disabled"/>
                      <input id="datepicker41"  name="price4[]" value="" type="text" class="textfield Pricedatepicker3 Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction5">
                      <label class=r_lbl>Price By Negotiation :<span class="required">*</span></label>
                      <input type="hidden" id="Pdatepicker5" name="price5[]" class="gui-input PhdnPrice" value="Yes" disabled="disabled"/>
                      <input id="datepicker5"  name="price5[]" value="Yes" type="text" class="textfield Pricedatepicker31" style="max-width:370px !important;" readonly="readonly" disabled="disabled"/>
                    </div>
                    <div class="form_row clearfix custom_fileds owner_name pricingOwner" id="pricingAuction6">
                      <label class=r_lbl>Deadline Private Treaty By :<span class="required">*</span></label>
                      <input type="hidden" name="price6[]" id="Pdatepicker6" class="gui-input PhdnPrice" value="Deadline Private Treaty By" disabled="disabled"/>
                      <input id="datepicker6"  name="price6[]" value="" type="text" class="textfield Pricedatepicker3 Pricedatepicker31" style="max-width:370px !important;" disabled="disabled"/>
                    </div>
                  </div>
                  <!-- AJAX PRICE FIELD -->
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Features</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  owner_name" id="bedroom_container">
                    <label class="r_lbl">Bedroom :<span class="required">*</span></label>
                    <!--input name="bedroom"  id="bedroom" value="" type="text" class="textfield "  placeholder=" "/-->
                    <select id="bedroom" name="bedroom" class="textfield textfield_x " >
                      <option value="0">--Select Bedroom--</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option>
                    </select>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                  <div class="form_row clearfix custom_fileds  owner_name"  id="bathroom_container"> 
                    <label class=r_lbl>Bathroom :<span class="required">*</span></label>
                    <!--input name="bathroom"  id="bathroom" value="" type="text" class="textfield "  placeholder=" "/-->
                    <select id="bathroom" name="bathroom" class="textfield textfield_x " >
                      <option value="0">--Select Bathroom--</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6+">6+</option>
                    </select>
                    <span id="owner_name_error " class="message_error2 "></span> </div>
                           <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Furniture and whiteware provided : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="prop_desc" name="furniture_and_whiteware_provided" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
<!-- floor area and rent area for rental condition  -->

                 <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Floor Area :<span class="required">*</span></label>
                    <input name="floor_area"  id="floor_area" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 
                  <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Land Area :<span class="required">*</span></label>
                    <input name="land_area"  id="land_area" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 
                <div id="step-plan" class="accordion-navigation step-wrapper step-plan current openhomecontainer" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Open Home</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>   
                  <div class="form_row clearfix custom_fileds  owner_name" id="open_home_date_container"> 
                    <label class=r_lbl>Date :<span class="required">*</span></label>
                    <input id="datepicker2"  name="open_home_date" value="" type="text" class="textfield "  placeholder="" style="max-width:370px !important;"/>
                  </div> 
               <div class="form_row clearfix custom_fileds  owner_name"  id="open_home_start_time_container">
                    <label class=r_lbl>Start Time :<span class="required">*</span></label>
                    <input id="timepicker2" name="open_home_strt_time" value="" type="text" class="textfield "  placeholder=" "/>
                  </div> 
                 <div class="form_row clearfix custom_fileds  owner_name"  id="open_home_end_time_container">
                    <label class=r_lbl>End Time :<span class="required">*</span></label>
                    <input id="timepicker3" name="open_home_end_time" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 

                    <!-- floor area and rent area for rental condition  -->
                  <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Property Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Property Details : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="prop_desc" name="prop_desc" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Parking or garaging : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="40" id="parking" name="parking" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds  post_content">
                    <label class=''>Amenities in the area : <span class="required">*</span></label>
                    <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                      <div id="wp-post_content-editor-container" class="wp-editor-container">
                        <textarea class="wp-editor-area"  rows="6" autocomplete="off" cols="30" id="amenities" name="amenities" ></textarea>
                      </div>
                      <span id="address_error" class=""></span> </div>
                  </div>
                  <div class="form_row clearfix custom_fileds classified_tag ">
                    <label class=>Smoke alarm :</label>
                    <select name="smoke_alarm" id="smoke_alarm" class="textfield textfield_x " >
                      <option value="0">Don't Know</option>
                      <option value="1">No</option>
                      <option value="2">Yes</option>
                    </select>
                  </div>
                      <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Agency Reference :<span class="required">*</span></label>
                    <input name="agency_reference"  id="agency_reference" value="" type="text" class="textfield "  placeholder=" "/>
                    <span id="owner_name_error " class="message_error2 "></span> </div> 
                 <div id="step-plan" class="accordion-navigation step-wrapper step-plan current" style="background-color: #05242f; border: 1px solid #05242f;"> <a class="step-heading active" href="javascript:void(0);"><span>*</span><span style="color: #fff;">Contact Details</span><span><i class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i></span></a> </div>
                  <!--<div class="form_row clearfix custom_fileds classified_tag ">-->
                  <!--  <label class=>Contact Details:</label>-->
                  <!--  <select name="contact_type" id="contact_type"  onchange="enable_contact_form('contact_type');" class="textfield textfield_x " >-->
                  <!--    <option value="1">Potential buyers should contact me</option>-->
                  <!--    <option value="2">Potential buyers should contact my real estate agent</option>-->
                  <!--  </select>-->
                  <!--</div>-->
                  <input name="contact_type" id="contact_type" value="1" type="hidden" class="textfield "  placeholder=" "/>
                  <div id="ajax_contact_field">
                    <div class="form_row clearfix custom_fileds classified_tag ">
                                <label class=>Are you a licensed real estate agent? :</label>
                                <select name="realestate_agent" id="realestate_agent" onchange="real_state_for_rent();" class="textfield textfield_x ">
                                    <option value="0" id="for_rent_1">No</option>
                                    <option value="1" id="for_rent_2">Yes</option>
                                </select>
                            </div>
                     <div id="ajax_contact_field_for_rent">
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Email Address :<span class="required">*</span></label>
                      <input name="agent_email"  id="agent_email" class="abc" value="" type="email" class="textfield "  placeholder=" "/>
                    </div>
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Your Name :<span class="required">*</span></label>
                      <input name="name"  id="name" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                 
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
                      <input name="mobile"  id="mobile" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                    <div class="form_row clearfix custom_fileds  owner_name">
                      <label class=r_lbl>Landline No. :<span class="required">*</span></label>
                      <input name="landline"  id="landline" value="" type="text" class="textfield "  placeholder=" "/>
                    </div>
                  
                  <!-- END AJAX CONTACT FIELD -->
                    <div class="form_row clearfix custom_fileds  owner_name">
        <label class="r_lbl">Upload Photo (Size 90x90px) :<span class="required">*</span></label>
        <div class="select-file-div">Select File</div>
        <input name="selectphoto" id="selectphoto" value="" type="file" class="textfield " placeholder=" ">
        </div>
                 <!-- <div class="form_row clearfix custom_fileds  owner_name">
                    <label class=r_lbl>Logo :<span class="required">*</span></label>
                    <input name="logo"  id="logo" value="" type="file" class="textfield "  placeholder=" "/>
                  </div>-->
                  <input type="hidden" name="next_form" value="photo_upload" />
                  <input type="hidden" name="db_name" value="add_property" />
                  <input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" ></div>
                </div>
              </div>
            </div>
          </div>
          <!-- END AJAX DIV -->
        </form>
  
  <?php } ?>
<?php 
if(@$_POST["realStateId"]=='for_rent_1'){ ?>

    <div class="form_row clearfix custom_fileds  owner_name">
        <label class=r_lbl>Email Address:<span class="required">*</span></label>
        <input name="agent_email"  id="agent_email" value="" type="email" class="textfield "  placeholder=" "/>
    </div>
        <div class="form_row clearfix custom_fileds  owner_name">
        <label class=r_lbl>Your name :<span class="required">*</span></label>
        <input name="name"  id="name" value="" type="text" class="textfield "  placeholder=" "/>
    </div>
    <div class="form_row clearfix custom_fileds  owner_name">
        <label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
        <input name="mobile"  id="mobile" value="" type="text" class="textfield "  placeholder=" "/>
    </div>
    <div class="form_row clearfix custom_fileds  owner_name">
        <label class=r_lbl>Landline No. :<span class="required">*</span></label>
        <input name="landline"  id="landline" value="" type="text" class="textfield "  placeholder=" "/>
    </div>
            <div class="form_row clearfix custom_fileds  owner_name">
            <label class=r_lbl>Upload Photo (Size 90x90px) :<span class="required">*</span></label>
            <div class="select-file-div">Choose File</div>
            <input name="selectphoto"  id="selectphoto" value="" type="file" class="textfield "  placeholder=" "/>
        </div>
   <input type="hidden" name="next_form" value="photo_upload" />
                  <input type="hidden" name="db_name" value="add_property" />
                  <input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" >
<?php } ?>

<?php 
if(@$_POST["realStateId"]=='for_rent_2'){ ?>
    
    <div class="form_row clearfix custom_fileds  owner_name">
        <label class=r_lbl>Your name :<span class="required">*</span></label>
        <input name="name"  id="name" value="" type="text" class="textfield "  placeholder=" "/>
    </div>
    <div class="form_row clearfix custom_fileds  owner_name">
        <label class=r_lbl>Email Address:<span class="required">*</span></label>
        <input name="agent_email"  id="agent_email" value="" type="email" class="textfield "  placeholder=" "/>
    </div>
       
    <div class="form_row clearfix custom_fileds  owner_name">
        <label class=r_lbl>Agency :<span class="required">*</span></label>
        <input name="agency"  id="agency" value="" type="text" class="textfield "  placeholder=" "/>
    </div>
    <div class="form_row clearfix custom_fileds  owner_name">
        <label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
        <input name="mobile"  id="mobile" value="" type="text" class="textfield "  placeholder=" "/>
    </div>
    <div class="form_row clearfix custom_fileds  owner_name">
        <label class=r_lbl>Landline No. :<span class="required">*</span></label>
        <input name="landline"  id="landline" value="" type="text" class="textfield "  placeholder=" "/>
    </div>
   <div class="form_row clearfix custom_fileds  owner_name">
        <label class=r_lbl>Website address :<span class="required">*</span></label>
        <input name="website_address"  id="website_address" value="" type="text" class="textfield "  placeholder=" "/>
  </div>
     <div class="form_row clearfix custom_fileds  owner_name">
        <label class=r_lbl>Logo :<span class="required">*</span></label>
        <input name="logo"  id="logo" value="" type="file" class="textfield "  placeholder=" "/>
     </div>
           <!--<div class="form_row clearfix custom_fileds  owner_name">
            <label class=r_lbl>Upload Photo (Size 90x90px) :<span class="required">*</span></label>
            <div class="select-file-div">Choose File</div>
            <input name="selectphoto"  id="selectphoto" value="" type="file" class="textfield "  placeholder=" "/>
        </div>-->
    <input type="hidden" name="next_form" value="photo_upload" />
    <input type="hidden" name="db_name" value="add_property" />
    <div class="agent_details">
         <input class="agent_checkbox" onchange="agent_checkbox();" id="checkBoxagent" type="checkbox">  
         <label>2 Agent Details</label2> 
    </div>
    <div class="other_agent_field"></div>
   <input type="hidden" name="next_form" value="photo_upload" />
                  <input type="hidden" name="db_name" value="add_property" />
                  <input type="submit"  class="btn btn-lg btn-primary button select-plan" value="Continue" >
      
    <!--<h4><b>2 Agent Details</b></h4>-->
    <!--<div class="form_row clearfix custom_fileds  owner_name">-->
    <!--<label class=r_lbl>Name :<span class="required">*</span></label>-->
    <!--<input name="name2"  id="name2" value="" type="text" class="textfield "  placeholder=" "/>-->
    <!--</div>-->
    <!--<div class="form_row clearfix custom_fileds  owner_name">-->
    <!--<label class=r_lbl>Email Address :<span class="required">*</span></label>-->
    <!--<input name="email_address2"  id="email_address2" value="" type="email" class="textfield "  placeholder=" "/>-->
    <!--</div>-->
    <!--<div class="form_row clearfix custom_fileds  owner_name">-->
    <!--<label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>-->
 <!--   <input name="mobile2"  id="mobile2" value="" type="text" class="textfield "  placeholder=" "/>-->
    <!--</div>-->
    <!--<div class="form_row clearfix custom_fileds  owner_name">-->
    <!--<label class=r_lbl>Landline No. :<span class="required">*</span></label>-->
    <!--<input name="landline2"  id="landline2" value="" type="text" class="textfield "  placeholder=" "/>-->
    <!--</div>-->
<?php }

?>
<?php 
if(isset($_POST['checkboxIsNotChecked'])){
  
}
?>

<?php
if(isset($_POST['checkBoxagent'])){ ?>
    <h4><b>2 Agent Details</b></h4>
    <div class="form_row clearfix custom_fileds  owner_name">
    <label class=r_lbl>Name :<span class="required">*</span></label>
    <input name="name2"  id="name2" value="" type="text" class="textfield "  placeholder=" "/>
    </div>
    <div class="form_row clearfix custom_fileds  owner_name">
    <label class=r_lbl>Email Address :<span class="required">*</span></label>
    <input name="email_address2"  id="email_address2" value="" type="email" class="textfield "  placeholder=" "/>
    </div>
    <div class="form_row clearfix custom_fileds  owner_name">
    <label class=r_lbl>Mobile Ph. :<span class="required">*</span></label>
    <input name="mobile2"  id="mobile2" value="" type="text" class="textfield "  placeholder=" "/>
    </div>
    <div class="form_row clearfix custom_fileds  owner_name">
    <label class=r_lbl>Landline No. :<span class="required">*</span></label>
    <input name="landline2"  id="landline2" value="" type="text" class="textfield "  placeholder=" "/>
    </div>
         <div class="form_row clearfix custom_fileds  owner_name">
            <label class=r_lbl>Upload Photo (Size 90x90px) :<span class="required">*</span></label>
            <div class="select-file-div">Choose File</div>
            <input name="selectphoto"  id="selectphoto" value="" type="file" class="textfield "  placeholder=" "/>
        </div>
    <input type="hidden" name="next_form" value="photo_upload" />
    <input type="hidden" name="db_name" value="add_property" />
<?php
}
?>