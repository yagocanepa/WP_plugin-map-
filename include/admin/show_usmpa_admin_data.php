<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
global $wpdb;
$tbl_name = $wpdb->prefix.'ummpa_state_data_list';
$get_all_states = get_option('ummapa_state_list');
$num_results_on_page = 20;
$page_no = 1;
if( isset($_GET['paged'])){
	$page_no = $_GET['paged'];
}
$off_set = ($page_no - 1 )* $num_results_on_page ;
$keyword ='';

$sql_result_string = "SELECT * FROM $tbl_name ORDER BY state_code ASC LIMIT $off_set, $num_results_on_page";
$total_row_query = "SELECT COUNT(*) FROM $tbl_name WHERE 1=1 ";

$get_all_data = $wpdb->get_results($sql_result_string);
$total_records =  $wpdb->get_var( $total_row_query );
?>
<div class="container">
	<h1 class="header">States Data</h1>
	<div class="row">
		<div class="col-md-4">
			<button id="delete_rows" class="btn btn-danger">Delete state data?</button>
		</div>
	</div>
	<div class="row">
		
		 <table class="table table-hover" width="95%">
		 	<thead>
		 		 <th><input type="checkbox" class="all_check_top custom-control-input" name="all_check_top"></th>
		 		<th>State</th>
		 		<th>City</th>
		 		<th>Failure Quarrantine</th>
		 		<th>Failure Contact Trace</th>
		 		<th>Failure Wear Mask</th>
		 		<th>Action</th>
		 	</thead>
		 	<tbody>
 			<?php foreach ($get_all_data as $single_data ) {
 				 
 				?>
				<tr>
					<th>
						<input type="checkbox" data-row="<?php echo $single_data->id;?>" name="row_id_<?php echo $single_data->id;?>" class="delete_rows custom-control-input" value="<?php echo $single_data->id;?>"></th>
				
					<td><?php if(array_key_exists($single_data->state_code, $get_all_states)) {
					 echo $get_all_states[$single_data->state_code]; }else{ echo $single_data->state_code;}?></td>
					<td><?php echo $single_data->city_name;?></td>
					<td><?php echo $single_data->failure_quarrantine;?></td>
					<td><?php echo $single_data->failure_contact_trace;?></td>
					<td><?php echo $single_data->failure_wear_mask;?></td>
					<td>
						<?php 
						$edit_url = admin_url('admin.php?page=usmpa-add-state-data&edit_id='.$single_data->id);?>
						 <a href="<?php echo $edit_url;?>">
							<i class="fa fa-edit" alt="edit" style="font-size:18px"></i>
						</a>
						 
					</td>
				</tr>
 				<?php 
 			}
 			?>
		 	</tbody>
		 	<tfoot>
		 		<th><input type="checkbox"class="all_check_bottom custom-control-input" name="all_check_bottom"></th>
		 		<th>State</th>
		 		<th>City</th>
		 		<th>Failure Quarrantine</th>
		 		<th>Failure Contact Trace</th>
		 		<th>Failure Wear Mask</th>
		 		<th>Action</th>
		 	</tfoot>
		 </table>

		 <!--pagination -->
		<?php 
		if( $get_all_data ){
			$admin_url = ('?page=usmpa-state-data&paged=');
		 	include_once('admin_data_pagination.php');
		}
		?>
		 
	</div> <!-- row -->
</div> <!-- container -->

<style type="text/css">
	input[type=checkbox]{
		height: 2rem;
		width:2rem;
	}
</style>