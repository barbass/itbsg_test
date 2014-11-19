<table class='table user_list'>
	<tr>
		<th><?php echo __('user_table_head_number');?></th>
		<th><?php echo __('user_table_head_firstname');?></th>
		<th><?php echo __('user_table_head_lastname');?></th>
		<th><?php echo __('user_table_head_email');?></th>
		<th><?php echo __('user_table_head_private_code');?></th>
		<th><?php echo __('user_table_head_address');?></th>
		<th><?php echo __('user_table_head_city');?></th>
		<th><?php echo __('user_table_head_country');?></th>
		<th><?php echo __('action');?></th>
	</tr>

	<?php if (!empty($user_list)) { ?>
		<?php foreach($user_list as $u) { ?>
			<tr>
				<td>
					<?php echo $u['user_id'];?>
				</td>
				<td class='row_user_firstname'>
					<?php echo $u['firstname'];?>
				</td>
				<td class='row_user_lastname'>
					<?php echo $u['lastname'];?>
				</td>
				<td class='row_user_email'>
					<?php echo $u['email'];?>
				</td>
				<td class='row_user_private_code'>
					<?php echo $u['private_code'];?>
				</td>
				<td class='row_user_address'>
					<?php echo $u['address'];?>
				</td>
				<td>
					<?php echo $u['city'];?>
				</td>
				<td>
					<?php echo $u['country'];?>
				</td>
				<td>
					<a href='javascript:void(0);' class='a_user_edit'><?php echo __('edit');?></a>
					/
					<a href='javascript:void(0);' class='a_user_delete'><?php echo __('delete');?></a>
				</td>
				<input type='hidden' class='row_user_id' value='<?php echo $u['user_id'];?>'>
				<input type='hidden' class='row_city_id' value='<?php echo $u['city_id'];?>'>
				<input type='hidden' class='row_country_id' value='<?php echo $u['country_id'];?>'>
			</tr>
		<?php } ?>
	<?php } else { ?>
		<tr>
			<td colspan='9'>
				<?php echo __('not_found');?>
			</td>
		</tr>
	<?php } ?>
</table>

<div>
	<button type='button' class='btn btn-primary a_user_add'><?php echo __('add');?></button>
</div>

<div class='hide user_block'>
	<h4></h4>

	<table class='table'>
		<tr>
			<td><?php echo __('user_table_head_firstname');?></td>
			<td><input type='text' name='firstname' class='form-control' value='' maxlength='45' placeholder='Petr'></td>
		</tr>
		<tr>
			<td><?php echo __('user_table_head_lastname');?></td>
			<td><input type='text' name='lastname' class='form-control' value='' maxlength='45' placeholder='Petr'></td>
		</tr>
		<tr>
			<td><?php echo __('user_table_head_email');?></td>
			<td><input type='email' name='email' class='form-control' value='' maxlength='150' placeholder='mail@mail.com'></td>
		</tr>
		<tr>
			<td><?php echo __('user_table_head_private_code');?></td>
			<td><input type='text' class='form-control' name='private_code' value='' maxlength='45' placeholder='000'></td>
		</tr>

		<tr>
			<td><?php echo __('user_table_head_country');?></td>
			<td>
				<select name='country' class='form-control'>
					<option value='0' selected><?php echo __('select_default');?></option>
					<?php foreach($country_list as $c) { ?>
						<option value='<?php echo $c['country_id'];?>'><?php echo $c['country'];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo __('user_table_head_city');?></td>
			<td>
				<select name='city' class='form-control'>
					<option value='0' selected><?php echo __('select_default');?></option>
				</select>
			</td>
		</tr>

		<tr>
			<td><?php echo __('user_table_head_address');?></td>
			<td><textarea type='text' class='form-control' name='address' value='' maxlength='145' placeholder='st. Home, h.1'></textarea></td>
		</tr>

		<tr>
			<td>
				<button type='button' class='btn btn-primary a_user_save'><?php echo __('save');?></button>
			</td>
			<td>
				<button type='button' class='btn btn-primary a_user_close'><?php echo __('close');?></button>
			</td>
		</tr>

		<input type='hidden' name='user_id' value=''>
	</table>
</div>


<script type='text/javascript'>
	$(document).ready(function() {
		$('.a_user_delete').on('click', function() {
			var user_id = $(this).parents('tr').eq(0).find('.row_user_id').val();
			userDelete(user_id);
		});

		$('.a_user_add, .a_user_edit').on('click', function() {
			var user_block = $('.user_block')
			$(user_block).removeClass('hide');

			if ($(this).hasClass('a_user_edit')) {
				var row = $(this).parents('tr').eq(0);

				var user_id = $(row).find('.row_user_id').val();
				var country_id = $(row).find('.row_country_id').val();
				var city_id = $(row).find('.row_city_id').val();

				$(user_block).find('input[name=firstname]').val(
					$(row).find('.row_user_firstname').text().trim()
				);
				$(user_block).find('input[name=lastname]').val(
					$(row).find('.row_user_lastname').text().trim()
				);
				$(user_block).find('input[name=email]').val(
					$(row).find('.row_user_email').text().trim()
				);
				$(user_block).find('input[name=private_code]').val(
					$(row).find('.row_user_private_code').text().trim()
				);
				$(user_block).find('textarea[name=address]').val(
					$(row).find('.row_user_address').text().trim()
				);

				$(user_block).find('input[name=user_id]').val(user_id);
				$(user_block).find('select[name=country] option[value='+country_id+']').attr('selected', 'selected');
				$(user_block).find('select[name=country]').change();

				$(user_block).find('select[name=city] option[value='+city_id+']').attr('selected', 'selected');
			} else {
				clearUserBlock();
			}
		});

		$('.a_user_save').on('click', function() {
			var fields_data = $('.user_block').find('input, select, textarea').serializeArray();
			var data = {};

			for(var key in fields_data) {
				data[fields_data[key]['name']] = fields_data[key]['value'];
			}

			userEdit(data);
		});

		$('.a_user_close').on('click', function() {
			clearUserBlock();
			$('.user_block').addClass('hide');
		});

		$('.user_block select[name=country]').on('change', function() {
			var country_city_list = JSON.parse('<?php echo json_encode($country_city_list);?>');
			var country_id = $(this).find('option:selected').val();

			$('.user_block').find('select[name=city] option[value!=0]').remove();

			if (!country_id) {
				return;
			}

			if (country_city_list[country_id]) {
				var city_list = [];
				for(var key in country_city_list[country_id]) {
					city_list.push("<option value='"+country_city_list[country_id][key]['city_id']+"'>"+country_city_list[country_id][key]['city']+"</option>");
				}

				$('.user_block').find('select[name=city]').append(city_list.join(''));
			}

		});
	});

	/**
	 * Добавление/изменение пользователя
	 * @param object
	 */
	function userEdit(data) {
		$('.alert').remove();

		var errors = validate(data);

		if (errors.length > 0) {
			$('.user_list').before("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong><p>"+errors.join('</p><p>')+"</p></strong></div>");
			return;
		}

		$.ajax({
			url: "<?php echo $action;?>",
			data: data,
			type: "POST",
			dataType: 'json',
			success: function(json) {
				if (!json || (json['success'] && json['success'] == false)) {
					$('.user_list').before("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong><?php echo __('error_ajax_response');?></strong></div>");
					return;
				} else if (json['success'] && json['success'] == true) {

					clearUserBlock();
					$('.user_block').addClass('hide');
					$('.user_list').before("<div class='alert alert-dismissable alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>"+json['message']+"</strong></div>");

					setTimeout(function() {window.location.reload()}, 2000);
					return;
			} else {
					$('.user_list').before("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>"+json['message']+"</strong></div>");
					return;
				}
			},
			error: function() {
				$('.user_list').before("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong><?php echo __('error_ajax_response');?></strong></div>");
			},
		});
	}

	/**
	 * Удаление пользователя
	 * @param int user_id
	 */
	function userDelete(user_id) {
		if (!confirm('<?php echo __('confirm_delete');?>')) {
			return;
		}

		$('.alert').remove();

		$.ajax({
			url: "<?php echo $action;?>",
			data: {'user_id':user_id},
			type: "POST",
			dataType: 'json',
			success: function(json) {
				if (!json || (json['success'] && json['success'] == false)) {
					$('.user_list').before("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong><?php echo __('error_ajax_response');?></strong></div>");
					return;
				} else if (json['success'] && json['success'] == true) {
					$('.user_list').find('.row_user_id[value='+user_id+']').parents('tr').eq(0).remove();
					$('.user_list').before("<div class='alert alert-dismissable alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>"+json['message']+"</strong></div>");
					return;
				} else {
					$('.user_list').before("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>"+json['message']+"</strong></div>");
					return;
				}
			},
			error: function() {
				$('.user_list').before("<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong><?php echo __('error_ajax_response');?></strong></div>");
			},
		});
	}

	/**
	 * Проверка данных
	 * @param object data
	 * return array
	 */
	function validate(data) {
		var errors = [];

		if (!data) {
			errors.push('<?php echo __('empty_data');?>');
		}

		if (!data['firstname'] ||
			(
				data['firstname'].length < 2 ||
				data['firstname'].length > 45
			)
		) {
			errors.push('<?php echo __('error_field_user_firstname');?>');
		}
		if (!data['lastname'] ||
			(
				data['lastname'].length < 2 ||
				data['lastname'].length > 45
			)
		) {
			errors.push('<?php echo __('error_field_user_lastname');?>');
		}
		if (!data['address'] ||
			(
				data['address'].length < 2 ||
				data['address'].length > 145
			)
		) {
			errors.push('<?php echo __('error_field_user_address');?>');
		}
		if (!data['email']) {
			errors.push('<?php echo __('error_field_user_email');?>');
		} else {
			var emails = data['email'].split('@');
			if (emails.length == 1) {
				errors.push('<?php echo __('error_field_user_email');?>');
			}
		}
		if (!data['private_code'] ||
			(
				(data['private_code']).length < 2 ||
				(data['private_code']).length > 45
			)
		) {
			errors.push('<?php echo __('error_field_user_private_code');?>');
		}
		if (!data['city']) {
			errors.push('<?php echo __('error_field_user_city');?>');
		} else {
			var city_id = parseInt(data['city']);
			if (city_id == 0 || isNaN(city_id)) {
				errors.push('<?php echo __('error_field_user_city');?>');
			}
		}

		return errors;
	}

	/**
	 * Очищение данных
	 */
	function clearUserBlock() {
		var user_block = $('.user_block');
		$(user_block).find('input, textarea').val('');
		$(user_block).find('select[name=country] option[value=0]').attr('selected', 'selected');
		$(user_block).find('select[name=city] option[value!=0]').remove();
	}
</script>
