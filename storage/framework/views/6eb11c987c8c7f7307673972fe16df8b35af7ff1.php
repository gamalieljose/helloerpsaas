<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title"><?php echo e($title, false); ?></h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		<div class="modal-body">
			<?php echo $__env->make('sell.partials.media_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
		<div class="modal-footer">
		    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('messages.close'); ?></button>
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/resources/views/sell/view_media.blade.php ENDPATH**/ ?>