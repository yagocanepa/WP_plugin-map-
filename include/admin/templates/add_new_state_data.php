<?php if(isset($_POST['submit_state_data'], $_POST['state_name'])){
      $state_name =  trim( sanitize_text_field( $_POST['state_name'] ) );
      $city_name =  trim( sanitize_text_field( $_POST['city_name'] ) );
      $failure_quarrantine =  trim( sanitize_text_field( $_POST['failure_quarrantine'] ) );
      $failure_contact_trace =  trim( sanitize_text_field( $_POST['failure_contact_trace'] ) );
      $failure_wear_mask =  trim( sanitize_text_field( $_POST['failure_wear_mask'] ) );
      $source_url_quarrantine =  trim( sanitize_text_field( $_POST['source_url_quarrantine'] ) );
      $source_url_contacttrace =  trim( sanitize_text_field( $_POST['source_url_contacttrace'] ) );
      $source_url_wearmask =  trim( sanitize_text_field( $_POST['source_url_wearmask'] ) );
      $data = array(
             'state_code' => $state_name,
             'city_name' => $city_name,
             'failure_quarrantine' => $failure_quarrantine,
             'source_url_quarrantine' => $source_url_quarrantine,
             'failure_contact_trace' => $failure_contact_trace,
             'source_url_contacttrace' => $source_url_contacttrace,
             'failure_wear_mask' => $failure_wear_mask,
             'source_url_wearmask' => $source_url_wearmask,
             'author_id' => get_current_user_id()
           );
       $lastkey = $wpdb->insert( $tbl_name, $data );
       if( $lastkey ){

         echo '<div class="alert alert-success alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  Data Successfully added.
                </div>';
       }else{
         echo '<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Failed: Something Wrong. </div>';
       }

  }
  ?>
<h3>Add New State Data</h3>
  <form class="form-horizontal"  method="post" action="#">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">State:</label>
      <div class="col-sm-10">
        <select name="state_name" required="" class="form-control">
          <option value="">Select One</option>
           <?php foreach ($get_all_states as $key => $state) {
              echo "<option value='".$key."'>".$state."</option>";
           }
           ?>
        </select>
         
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">City:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="Enter city name" name="city_name">
      </div>
    </div>
      
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Failure to Quarrantine:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" placeholder="Enter Failure Quarrantine Amount" name="failure_quarrantine">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Source URL for Quarrantine:</label>
      <div class="col-sm-10">          
        <input type="url" class="form-control" placeholder="Enter Source URL" name="source_url_quarrantine">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Failure Contact Trace:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="Enter Failure Contact Trace Amount" name="failure_contact_trace">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Source URL for Contact Trace:</label>
      <div class="col-sm-10">          
        <input type="url" class="form-control" placeholder="Enter Source URL" name="source_url_contacttrace">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Failure Wear Mask:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="Enter Failure Wear Mask Amount" name="failure_wear_mask">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Source URL for Wear Mask:</label>
      <div class="col-sm-10">          
        <input type="url" class="form-control" placeholder="Enter Source URL" name="source_url_wearmask">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit_state_data" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>