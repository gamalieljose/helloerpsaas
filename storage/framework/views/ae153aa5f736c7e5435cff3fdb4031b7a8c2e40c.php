<div class="col-md-3">
	<div class="form-group">
		<?php echo Form::label('repair_model_id', __('repair::lang.device_model') . ':'); ?>

		<?php echo Form::select('repair_model_id', $view_data['device_models'], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('messages.all')]);; ?>

	</div>
</div><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/pos1/Modules/Repair/Providers/../Resources/views/device_model/partials/list_product_filters.blade.php ENDPATH**/ ?>