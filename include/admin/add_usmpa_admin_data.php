  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="container">
<?php
  global $wpdb;
  $tbl_name = $wpdb->prefix.'ummpa_state_data_list';
  $get_all_states = get_option('ummapa_state_list');

  if( gettype( $get_all_states)  != 'array'){
         $data_state =  array( 
             "AA" => "Armed Forces America",
             "AE" => "Armed Forces",
             "AK" => "Alaska",
             "AL" => "Alabama",
             "AP" => "Armed Forces Pacific",
             "AR" => "Arkansas",
             "AS" => "American Samoa",
             "AZ" => "Arizona",
             "CA" => "California",
             "CO" => "Colorado",
             "CT" => "Connecticut",
             "DC" => " Washington DC",
             "DE" => "Delaware",
             "FL" => "Florida",
             "GA" => "Georgia",
             "GU" => "Guam",
             "HI" => "Hawaii",
             "IA" => "Iowa",
             "ID" => "Idaho",
             "IL" => "Illinois",
             "IN" => "Indiana",
             "KS" => "Kansas",
             "KY" => "Kentucky",
             "LA" => "Louisiana",
             "MA" => "Massachusetts",
             "MD" => "Maryland",
             "MI" => "Michigan",
             "MN" => "Minnesota",
             "MO" => "Missouri",
             "MS" => "Mississippi",
             "MT" => "Montana",
             "NC" => "North Carolina",
             "ND" => "North Dakota",
             "NE" => "Nebraska",
             "NH" => "New Hampshire",
             "NJ" => "New Jersey",
             "NM" => "New Mexico",
             "NV" => "Nevada",
             "NY" => "New York",
             "OH" => "Ohio",
             "OK" => "Oklahoma",
             "OR" => "Oregon",
             "PA" => "Pennsylvania",
             "PR" => "Puerto Rico",
             "RI" => "Rhode Island",
             "SC" => "South Carolina",
             "SD" => "South Dakota",
             "TN" => "Tennessee",
             "TX" => "Texas",
             "UT" => "Utah",
             "VA" => "Virginia",
             "VI" => "Virgin Islands",
             "VT" => "Vermont",
             "WA" => "Washington",
             "WI" => "Wisconsin",
             "WV" => "West Virginia",
             "WY" => "Wyoming"
        );
         update_option('ummapa_state_list', $data_state );
  }

  $get_all_states = get_option('ummapa_state_list');
  
 
if(isset($_POST['submit_edit_state_data'],$_POST['edit_state_id'], $_POST['state_name'])){
      $edit_state_id =  trim( sanitize_text_field( $_POST['edit_state_id'] ) );
       $state_name =  trim( sanitize_text_field( $_POST['state_name'] ) );
      $city_name =  trim( sanitize_text_field( $_POST['city_name'] ) );
      $failure_quarrantine =  trim( sanitize_text_field( $_POST['failure_quarrantine'] ) );
      $failure_contact_trace =  trim( sanitize_text_field( $_POST['failure_contact_trace'] ) );
      $failure_wear_mask =  trim( sanitize_text_field( $_POST['failure_wear_mask'] ) );
      $source_url_quarrantine =  trim( sanitize_text_field( $_POST['source_url_quarrantine'] ) );
      $source_url_contacttrace =  trim( sanitize_text_field( $_POST['source_url_contacttrace'] ) );
      $source_url_wearmask =  trim( sanitize_text_field( $_POST['source_url_wearmask'] ) );
      $update_data = array(
             'state_code' => $state_name,
             'city_name' => $city_name,
             'failure_quarrantine' => $failure_quarrantine,
             'source_url_quarrantine' => $source_url_quarrantine,
             'failure_contact_trace' => $failure_contact_trace,
             'source_url_contacttrace' => $source_url_contacttrace,
             'failure_wear_mask' => $failure_wear_mask,
             'source_url_wearmask' => $source_url_wearmask,
           );
      $update_where = array('id' => $edit_state_id);
       $lastupdate = $wpdb->update( $tbl_name, $update_data, $update_where);
       if( $update_where ){

         echo '<div class="alert alert-success alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  Data Successfully Updated. <a  style="font-size: 13px;" class="btn btn-default" href="'.admin_url('admin.php?page=usmpa-state-data').'">View All States Data</a>
                </div>';
       }else{
         echo '<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Failed: Something Wrong. </div>';
       }

  }

 
  // check edit option
  $edit_type = 0;
  if(isset($_GET['edit_id']) && $_GET['edit_id'] != ''){
      $edit_type = (int) trim( sanitize_text_field( $_GET['edit_id'] ) );
      $edit_date = $wpdb->get_row("SELECT * FROM $tbl_name WHERE `id` = $edit_type");
      $edit_type = ( $edit_date->id) ? $edit_type : 0;
  } 

  // if edit type is greaten than zero means edit page else add 
  if( $edit_type > 0 ){
   include('templates/eidt_state_data.php');
  }else{
    include('templates/add_new_state_data.php');
  }

?>
  
</div>