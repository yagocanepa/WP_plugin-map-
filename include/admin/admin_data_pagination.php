
 <div class="pagination total_records-<?php echo $total_records;?>" style="justify-content: center;" >
		<?php if (ceil($total_records / $num_results_on_page) > 0): ?>
	<ul class="pagination photo_pagination">
		<?php if ($page_no > 1): ?>
		<li class="prev"><a data-id="<?php echo $page_no-1 ?>" href="<?php echo $admin_url;?><?php echo $page_no-1 ?>">Prev</a></li>
		<?php endif; ?>

		<?php if ($page_no > 3): ?>
		<li class="start"><a data-id="1" href="<?php echo $admin_url;?>1">1</a></li>
		<li class="dots">...</li>
		<?php endif; ?>

		<?php if ($page_no-2 > 0): ?><li class="page"><a data-id="<?php echo $page_no-2 ?>" href="<?php echo $admin_url;?>?php echo $page_no-2 ?>"><?php echo $page_no-2 ?></a></li><?php endif; ?>
		<?php if ($page_no-1 > 0): ?><li class="page"><a data-id="<?php echo $page_no-1 ?>" href="<?php echo $admin_url;?><?php echo $page_no-1 ?>"><?php echo $page_no-1 ?></a></li><?php endif; ?>
		<?php if(ceil($total_records / $num_results_on_page) > 1 ): ?>
		<li class="currentpage"><a class="active_page" data-id="<?php echo $page_no ?>" href="<?php echo $admin_url;?><?php echo $page_no ?>"><?php echo $page_no ?></a></li>
	<?php endif;?>
		<?php if ($page_no+1 < ceil($total_records / $num_results_on_page)+1): ?><li class="page"><a data-id="<?php echo $page_no+1 ?>" href="<?php echo $admin_url;?><?php echo $page_no+1 ?>"><?php echo $page_no+1 ?></a></li><?php endif; ?>
		<?php if ($page_no+2 < ceil($total_records / $num_results_on_page)+1): ?><li class="page"><a data-id="<?php echo $page_no+2 ?>" href="<?php echo $admin_url;?><?php echo $page_no+2 ?>"><?php echo $page_no+2 ?></a></li><?php endif; ?>

		<?php if ($page_no < ceil($total_records / $num_results_on_page)-2): ?>
		<li class="dots">...</li>
		<li class="end"><a data-id="<?php echo ceil($total_records / $num_results_on_page) ?>" href="<?php echo $admin_url;?><?php echo ceil($total_records / $num_results_on_page) ?>"><?php echo ceil($total_records / $num_results_on_page) ?></a></li>
		<?php endif; ?>

		<?php if ($page_no < ceil($total_records / $num_results_on_page)): ?>
		<li><a class="next" data-id="<?php echo $page_no+1 ?>" href="<?php echo $admin_url;?><?php echo $page_no+1 ?>">Next</a></li>
		<?php endif; ?>
	</ul>
	<?php endif; ?>
</div>
