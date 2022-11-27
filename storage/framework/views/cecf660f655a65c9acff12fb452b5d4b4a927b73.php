var data = [{
  id: "",
  text: '<?php echo app('translator')->getFromJson("messages.please_select"); ?>',
  html: '<?php echo app('translator')->getFromJson("messages.please_select"); ?>',
}, 
<?php $__currentLoopData = $view_data['repair_statuses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repair_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	{
	id: <?php echo e($repair_status->id, false); ?>,
	<?php if(!empty($repair_status->color)): ?>
		text: '<i class="fa fa-circle" aria-hidden="true" style="color: <?php echo e($repair_status->color, false); ?>;"></i> <?php echo e($repair_status->name, false); ?>',
		title: '<?php echo e($repair_status->name, false); ?>'
	<?php else: ?>
		text: "<?php echo e($repair_status->name, false); ?>"
	<?php endif; ?>
	},
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
];

$("select#repair_status_id").select2({
  data: data,
  escapeMarkup: function(markup) {
    return markup;
  }
});<?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Repair/Providers/../Resources/views/repair/partials/repair_status.blade.php ENDPATH**/ ?>