$(document).ready(function(){
	 
	function show_loader(){
		$('body').append("<div id='usmpa_inifiniteLoader'><p id='usmpa_overlay_text'>Please wait...</p></div>");
		$('body #usmpa_inifiniteLoader').show();
	}
	function hide_loader(){
		$('body #usmpa_inifiniteLoader').remove();
	}
	
	// Delete photo start // 
	$(".all_check_top").on("click", function(){
		if($(this).prop("checked") == true){
			$('.all_check_bottom').prop('checked', true);
			$('.delete_rows').prop('checked', true);	
	            
        }else{
        	$('.all_check_bottom').prop('checked', false);
        	$('.delete_rows').prop('checked', false);
        	  
        }
	});
	$(".all_check_bottom").on("click", function(){
		if($(this).prop("checked") == true){
			$('.all_check_top').prop('checked', true);
        	$('.delete_rows').prop('checked', true);
        }else{
        	$('.all_check_top').prop('checked', false);
        	$('.delete_rows').prop('checked', false);
        }
	});
	$("#delete_rows").on("click", function(){
		var delete_row_array = [];
		$. each($("input.delete_rows:checked"), function(){
			delete_row_array. push($(this). val());
		});
		if( delete_row_array.length < 1 ){
			alert("Please select any row");
			return false;
		}
		var confirm_status = confirm("Are you sure?");
		var delete_row_ids = delete_row_array.join("|"); 
		if(confirm_status){
			show_loader();
			var data_string = 'action=delete_uspma_state&delete_id='+delete_row_ids;
			$.ajax({
				url: usmpa_js_object.ajaxurl,
				type: 'post',
				dataType: 'json',
			    data: data_string,
				 success: function(response){
				 	 
				 
				 	if( response.status == 'success'){
				 		 location.reload();
				 	}else{
				 			hide_loader()
				 		alert(response.message);
				 	}
				   	hide_loader()
				 },
				 error: function( error ){
				 	 
				 	hide_loader();
				 }
			});
		}
		 
	});
	// Delete state end //

});