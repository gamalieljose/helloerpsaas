<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->getFromJson('lang_v1.system_notification'); ?></h4>
    </div>
    <div class="modal-body">
      <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $notification_data = $notification->data;
        ?>
        <div class="row">
          <div class="col-md-12 mb-10"><h4 class="modal-title"><?php echo $notification_data['subject']; ?></h4> <p class="text-muted"><?php echo e($notification->created_at->diffForHumans(), false); ?></p></div>
          <div class="col-md-12">
            <?php echo $notification_data['msg']; ?>

          </div>
        </div>
        <?php if($loop->index > 0): ?>
          <hr>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/resources/views/home/notification_modal.blade.php ENDPATH**/ ?>