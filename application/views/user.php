<table class='table'>
	<tr>
		<th><?php echo __('user_table_head_number');?></th>
		<th><?php echo __('user_table_head_firstname');?></th>
		<th><?php echo __('user_table_head_lastname');?></th>
		<th><?php echo __('user_table_head_email');?></th>
		<th><?php echo __('user_table_head_private_code');?></th>
		<th><?php echo __('user_table_head_address');?></th>
		<th><?php echo __('user_table_head_city');?></th>
		<th><?php echo __('user_table_head_country');?></th>
	</tr>

	<?php if (!empty($user_list)) { ?>
		<?php foreach($user_list as $u) { ?>
			<tr>
				<td>
					<?php echo $u['user_id'];?>
				</td>
				<td>
					<?php echo $u['firstname'];?>
				</td>
				<td>
					<?php echo $u['lastname'];?>
				</td>
				<td>
					<?php echo $u['email'];?>
				</td>
				<td>
					<?php echo $u['private_code'];?>
				</td>
				<td>
					<?php echo $u['address'];?>
				</td>
				<td>
					<?php echo $u['city'];?>
				</td>
				<td>
					<?php echo $u['country'];?>
				</td>
			</tr>
		<?php } ?>
	<?php } else { ?>

	<?php } ?>
</table>
