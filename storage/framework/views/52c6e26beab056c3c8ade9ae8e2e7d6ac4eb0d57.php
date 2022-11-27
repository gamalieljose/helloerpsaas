<div class="row">
	<div class="col-md-4">
		<div class="input-group date">
			<?php echo Form::text('attendance_by_date_filter', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'id' => 'attendance_by_date_filter', 'class' => 'form-control', 'readonly']);; ?>

    		<span class="input-group-addon"><i class="fas fa-calendar"></i></span>
    	</div>
	</div>
	<div class="col-md-12">
		<br>
		<table class="table" id="attendance_by_date_table">
			<thead>
				<tr>
					<th>
						<?php echo app('translator')->getFromJson('lang_v1.date'); ?>
					</th>
					<th>
						<?php echo app('translator')->getFromJson('essentials::lang.present'); ?>
					</th>
					<th>
						<?php echo app('translator')->getFromJson('essentials::lang.absent'); ?>
					</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Essentials/Providers/../Resources/views/attendance/attendance_by_date.blade.php ENDPATH**/ ?>