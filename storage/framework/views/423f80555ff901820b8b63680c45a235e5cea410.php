<div class="clearfix"></div>
<hr>
<div class="col-md-12">
	<h4><?php echo app('translator')->getFromJson('essentials::lang.hrm_details'); ?>:</h4>
</div>
<div class="col-md-4">
	<p><strong><?php echo app('translator')->getFromJson('essentials::lang.department'); ?>:</strong> <?php echo e($user_department->name ?? '', false); ?></p>
	<p><strong><?php echo app('translator')->getFromJson('essentials::lang.designation'); ?>:</strong> <?php echo e($user_designstion->name ?? '', false); ?></p>
</div><?php /**PATH C:\laragon\www\possaas\Modules\Essentials\Providers/../Resources/views/partials/user_details_part.blade.php ENDPATH**/ ?>