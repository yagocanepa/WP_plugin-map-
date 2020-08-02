

<h3>Edit State Data</h3>
<!--  -->
  <form class="form-horizontal"  method="post" action="#">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">State:</label>
      <div class="col-sm-10">
        <input type="hidden" name="edit_state_id" required="" value="<?php echo $edit_date->id;?>">
        <select name="state_name" required="" class="form-control">
          <option value="">Select One</option>
           <?php foreach ($get_all_states as $key => $state) {
            $selected = ( $key == $edit_date->state_code) ? 'selected' : '';
              echo "<option " . $selected." value='".$key."'>".$state."</option>";
           }
           ?>
        </select>
         
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">City:</label>
      <div class="col-sm-10">          
        <input value="<?php echo $edit_date->city_name;?>" type="text" class="form-control" id="pwd" placeholder="Enter city name" name="city_name">
      </div>
    </div>
      
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Failure to Quarrantine:</label>
      <div class="col-sm-10">          
        <input value="<?php echo $edit_date->failure_quarrantine;?>" type="text" class="form-control" placeholder="Enter Failure Quarrantine Amount" name="failure_quarrantine">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Source URL for Quarrantine:</label>
      <div class="col-sm-10">          
        <input type="url" value="<?php echo $edit_date->source_url_quarrantine;?>" class="form-control" placeholder="Enter Source URL" name="source_url_quarrantine">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Failure Contact Trace:</label>
      <div class="col-sm-10">          
        <input type="text" value="<?php echo $edit_date->failure_contact_trace;?>" class="form-control" id="pwd" placeholder="Enter Failure Contact Trace Amount" name="failure_contact_trace">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Source URL for Contact Trace:</label>
      <div class="col-sm-10">          
        <input type="url" value="<?php echo $edit_date->source_url_contacttrace;?>" class="form-control" placeholder="Enter Source URL" name="source_url_contacttrace">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Failure Wear Mask:</label>
      <div class="col-sm-10">          
        <input type="text" value="<?php echo $edit_date->failure_wear_mask;?>" class="form-control" id="pwd" placeholder="Enter Failure Wear Mask Amount" name="failure_wear_mask">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Source URL for Wear Mask:</label>
      <div class="col-sm-10">          
        <input type="url" value="<?php echo $edit_date->source_url_wearmask;?>" class="form-control" placeholder="Enter Source URL" name="source_url_wearmask">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit_edit_state_data" class="btn btn-primary">Update Now</button>
      </div>
    </div>
  </form>