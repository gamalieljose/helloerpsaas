
<?php $__env->startSection('title', __('repair::lang.add_jobsheet_parts')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('repair::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->getFromJson('repair::lang.add_jobsheet_parts'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
	<?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
		<table class="table">
			<tr>
				<th><?php echo app('translator')->getFromJson('repair::lang.job_sheet_no'); ?>:</th>
				<td><?php echo e($job_sheet->job_sheet_no, false); ?></td>
				<th><?php echo app('translator')->getFromJson('receipt.date'); ?>:</th>
				<td><?php echo e(\Carbon::createFromTimestamp(strtotime($job_sheet->created_at))->format(session('business.date_format') . ' ' . 'H:i'), false); ?></td>
			</tr>
			<tr>
				<th>
					<?php echo app('translator')->getFromJson('role.customer'); ?>:
				</th>
				<td><?php echo e($job_sheet->customer->name, false); ?></td>
				<th><?php echo app('translator')->getFromJson('business.location'); ?>:</th>
				<td>
					<?php echo e(optional($job_sheet->businessLocation)->name, false); ?>

				</td>
			</tr>
		</table>
	<?php echo $__env->renderComponent(); ?>
	<?php echo Form::open(['url' => action('\Modules\Repair\Http\Controllers\JobSheetController@saveParts', $job_sheet->id), 'method' => 'post' ]); ?>

	<?php $__env->startComponent('components.widget', ['class' => 'box-solid', 'title' => __('repair::lang.add_parts')]); ?>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-search"></i>
						</span>
						<?php echo Form::text('search_product', null, ['class' => 'form-control', 'id' => 'search_job_sheet_parts', 'placeholder' => __('repair::lang.search_parts')]);; ?>

					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="table-responsive">
				<table class="table table-bordered table-striped table-condensed" 
				id="job_sheet_parts_table">
					<thead>
						<tr>
							<th class="col-sm-4 text-center">	
								<?php echo app('translator')->getFromJson('repair::lang.part'); ?>
							</th>
							<th class="col-sm-2 text-center">
								<?php echo app('translator')->getFromJson('sale.qty'); ?>
							</th>
							<th class="col-sm-2 text-center"><i class="fa fa-trash" aria-hidden="true"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($parts)): ?>
							<?php $__currentLoopData = $parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php echo $__env->make('repair::job_sheet.partials.job_sheet_part_row', ['variation_name' => $part['variation_name'], 'unit' => $part['unit'], 'quantity' => $part['quantity'], 'variation_id' => $part['variation_id']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	<?php echo $__env->renderComponent(); ?>
	<?php if(!empty($status_update_data) && $status_update_data['job_sheet_id'] == $job_sheet->id): ?>
		<?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
			<?php echo $__env->make('repair::job_sheet.partials.edit_status_form', ['status_update_data' => $status_update_data], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php echo $__env->renderComponent(); ?>
	<?php endif; ?>
	<div class="row">
		<div class="col-sm-12">
			<button type="submit" class="btn btn-primary pull-right"><?php echo app('translator')->getFromJson('messages.save'); ?></button>
		</div>
	</div>
	<?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
	$(document).ready( function(){
		$('#search_job_sheet_parts')
            .autocomplete({
                source: function(request, response) {
                    $.getJSON(
                        '/products/list',
                        { term: request.term },
                        response
                    );
                },
                minLength: 2,
                response: function(event, ui) {
                    if (ui.content.length == 1) {
                        ui.item = ui.content[0];
                        $(this)
                                .data('ui-autocomplete')
                                ._trigger('select', 'autocompleteselect', ui);
                        $(this).autocomplete('close');
                    } else if (ui.content.length == 0) {
                        swal(LANG.no_products_found);
                    }
                },
                select: function(event, ui) {
                   job_sheet_parts_row(ui.item.variation_id);
                },
            })
            .autocomplete('instance')._renderItem = function(ul, item) {
	            var string = '<div>' + item.name;
	                if (item.type == 'variable') {
	                    string += '-' + item.variation;
	                }
	                string += ' (' + item.sub_sku + ') </div>';
	                return $('<li>')
	                    .append(string)
	                    .appendTo(ul);
        	};

       	//initialize editor
        tinymce.init({
            selector: 'textarea#email_body',
        });

        $('#send_sms').change(function() {
            if ($(this). is(":checked")) {
                $('div.sms_body').fadeIn();
            } else {
                $('div.sms_body').fadeOut();
            }
        });

        $('#send_email').change(function() {
            if ($(this). is(":checked")) {
                $('div.email_template').fadeIn();
            } else {
                $('div.email_template').fadeOut();
            }
        });

        if ($('#status_id_modal').length) {
            ;
            $("#sms_body").val($("#status_id_modal :selected").data('sms_template'));
            $("#email_subject").val($("#status_id_modal :selected").data('email_subject'));
            tinymce.activeEditor.setContent($("#status_id_modal :selected").data('email_body'));  
        }

        $('#status_id_modal').on('change', function() {
            var sms_template = $(this).find(':selected').data('sms_template');
            var email_subject = $(this).find(':selected').data('email_subject');
            var email_body = $(this).find(':selected').data('email_body');

            $("#sms_body").val(sms_template);
            $("#email_subject").val(email_subject);
            tinymce.activeEditor.setContent(email_body);

            if ($('#status_modal .mark-as-complete-btn').length) {
                if ($(this).find(':selected').data('is_completed_status') == 1) 
                {
                    $('#status_modal').find('.mark-as-complete-btn').removeClass('hide');
                    $('#status_modal').find('.mark-as-incomplete-btn').addClass('hide');
                } else {
                    $('#status_modal').find('.mark-as-complete-btn').addClass('hide');
                    $('#status_modal').find('.mark-as-incomplete-btn').removeClass('hide');
                }
            }
        });
	});

	function job_sheet_parts_row(variation_id) {
		var row_index = parseInt($('#product_row_index').val());
	    var location_id = $('select#location_id').val();
	    $.ajax({
	        method: 'POST',
	        url: "<?php echo e(action('\Modules\Repair\Http\Controllers\JobSheetController@jobsheetPartRow'), false); ?>",
	        data: { variation_id: variation_id },
	        dataType: 'html',
	        success: function(result) {
	            $('table#job_sheet_parts_table tbody').append(result);
	            
	        },
	    });
	}

	$(document).on('click', '.remove_product_row', function(){
		$(this).closest('tr').remove();
	})
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Repair/Providers/../Resources/views/job_sheet/add_parts.blade.php ENDPATH**/ ?>