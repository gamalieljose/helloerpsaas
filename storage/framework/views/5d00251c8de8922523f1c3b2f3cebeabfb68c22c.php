<option value=""><?php echo app('translator')->getFromJson("messages.please_select"); ?></option>
<?php if(!empty($models)): ?>
	<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<option value="<?php echo e($key, false); ?>"><?php echo e($value, false); ?></option>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Repair/Providers/../Resources/views/device_model/partials/device_model_drodown.blade.php ENDPATH**/ ?>