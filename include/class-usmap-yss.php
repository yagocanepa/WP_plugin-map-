<?php
/**
 * Holds all custom functions for wordpress like add new columns or custom fields or more or ajax.
 *
 * @author Yogendra Singh Solanki
 * @since 1.0.0
 */
class usmap_yss {
	var $usmpa_plugin_path = USMPA_BASE_DIR;
	var $usmpa_plugin_url = USMPA_BASE_URL;
	/**
	 * The public constructor.
	 */
    public function __construct() {
        global $wpdb;
        add_shortcode('usmapfa_data_show', array( $this, 'usmapfa_data_show' ) ) ;
        add_action("wp_ajax_delete_uspma_state", array( $this, "delete_uspma_state") );
    }

    /**
     * Show filter data accroding to state
     * @version 1.0.0
     *
     */
    
    public function usmapfa_data_show(){
		ob_start();
		global $wpdb;
		$tbl_name = $wpdb->prefix.'ummpa_state_data_list';

		$data_array = array(
						'WA' => array('name' => 'WASHINGTON DC',
									   'failure_quarrantine' => '$10,000',
									   'failure_contact_trace' => '' ,
									   'Failure_wear_masks' => ''
									   ),

						'OR' => array(
							'name' => 'OREGON',
							 'failure_quarrantine' => '$1,250',
									   'failure_contact_trace' => '' ,
									   'Failure_wear_masks' => '$100'
							)
					);
		if(isset( $_REQUEST['state'] ) && $_REQUEST['state'] != '' ){
				$state_id = strtoupper(trim( sanitize_text_field( $_REQUEST['state'] ) ));
				$get_all_states = get_option('ummapa_state_list');
  				$get_state_result =  $wpdb->get_results($wpdb->prepare("SELECT * FROM $tbl_name WHERE `state_code` = %s ", $state_id));
				// check key is exists or not
				if ($get_state_result)
				{
					?>
					<div classs="row us-map-filter-wrap">
						<table>
							<tr>
								<th>State</th>
								<th>City</th>
								<th>Failure to Quarrantine</th>
								<th>Failure to Contact Trace</th>
								<th>Failure to Wear Masks</th>
								<th>Source URL (Quarrantine) </th>
								<th>Source URL (Contact Trace) </th>
								<th>Source URL (Wear Masks) </th>
							</tr>
							<?php foreach ($get_state_result as $key => $value) {
						 ?>
							<tr>
								<td>
								<?php if(array_key_exists($value->state_code, $get_all_states)) {

								 echo $get_all_states[$value->state_code]; }
								 else{ echo $value->state_code;}
								 ?>
								 	
								 </td>
								<td><?php echo $value->city_name;?></td>
								<td><?php echo $value->failure_quarrantine;?></td>
								<td><?php echo $value->failure_contact_trace;?></td>
								<td><?php echo $value->failure_wear_mask;?></td>
								<td>
								<?php 
								if( trim($value->source_url_quarrantine) != '' ):
									?>
									<a href="<?php echo $value->source_url_quarrantine;?>">View</a>
									<?php
								endif;
								?>
								</td>
								<td>
								<?php 
								if( trim($value->source_url_contacttrace) != '' ):
									?>
									<a href="<?php echo $value->source_url_contacttrace;?>">View</a>
									<?php
								endif;
								?>
								</td>

								<td>
								<?php 
								if( trim($value->source_url_wearmask) != '' ):
									?>
									<a href="<?php echo $value->source_url_wearmask;?>">View</a>
									<?php
								endif;
								?>
								</td>

								 
							</tr>
						<?php } ?>
						</table>
					</div>
					<?php
				}
		} 		
		$html = ob_get_clean();
		return $html;
	}

	/**
	 * Delete state data
	 * @since 1.0.0
	 * @return json
	 */
	function delete_uspma_state(){
		if(isset($_POST['action'], $_POST['delete_id'])){
			global $wpdb;
			$tbl_name = $wpdb->prefix.'ummpa_state_data_list';
			$delete_id = sanitize_text_field( $_POST['delete_id'] );
			$ids = explode('|', $delete_id );
			if( count($ids ) >= 1){
				foreach ($ids as $id) {
					$id = (int) $id;
					$sql_result = $wpdb->get_row("SELECT * FROM $tbl_name WHERE `id` = $id ");
					if(isset($sql_result->id)){
						$delete_status = $wpdb->delete($tbl_name, array("id" => $id));
					}
				}
				echo json_encode(array("status" => 'success', 'message' => 'Deleted successfully'));
				exit();
			}
			echo json_encode(array("status" => 'error', 'message' => 'Please select any row'));
			exit();	

		}
		echo json_encode(array("status" => 'error', 'message' => 'Invalid Request'));
		exit();
	}
	


}
$usmap_yss = new usmap_yss(); 