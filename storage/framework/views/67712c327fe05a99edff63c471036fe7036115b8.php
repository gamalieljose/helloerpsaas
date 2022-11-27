<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalCenterTitle">
            <?php echo app('translator')->getFromJson('essentials::lang.reminder_details'); ?>
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
                <strong> <?php echo app('translator')->getFromJson('essentials::lang.event_name'); ?> : </strong> <?php echo e($reminder->name, false); ?>

            </div>
            <div class="col-md-6">
                <strong> <?php echo app('translator')->getFromJson('essentials::lang.date'); ?> : </strong> <?php echo e(\Carbon::createFromTimestamp(strtotime($reminder->date))->format(session('business.date_format')), false); ?> <br>

                <strong> <?php echo app('translator')->getFromJson('restaurant.start_time'); ?> : </strong> <?php echo e($time, false); ?> <br>
                <strong> <?php echo app('translator')->getFromJson('restaurant.end_time'); ?> : </strong> <?php if(!empty($reminder->end_time)): ?><?php echo e(\Carbon::createFromTimestamp(strtotime($reminder->end_time))->format('H:i'), false); ?> <?php endif; ?>
            </div>
          </div>
          <br>
          <hr>
          <div class="row">
              <div class="col-md-9">
                  <?php echo Form::open(['url' => action('\Modules\Essentials\Http\Controllers\ReminderController@update', [$reminder->id]), 'method' => 'PUT', 'id' => 'update_reminder_repeat' ]); ?>

                    <div class="input-group">
                      <!-- /btn-group -->
                      <?php echo Form::select('repeat', $repeat, $reminder->repeat, ['class' => 'form-control', 'required']); ?>

                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary change_reminder_repeat"><?php echo app('translator')->getFromJson('messages.update'); ?></button>
                      </div>
                   </div>
                  <?php echo Form::close(); ?>

              </div>
              <div class="col-md-3">
                <button type="button" class="btn btn-danger" id="delete_reminder" data-href="<?php echo e(action('\Modules\Essentials\Http\Controllers\ReminderController@destroy', [$reminder->id]), false); ?>">
                  <?php echo app('translator')->getFromJson('essentials::lang.delete_reminder'); ?>
                </button>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          <?php echo app('translator')->getFromJson( 'messages.close' ); ?>
        </button>
      </div>
    </div>
</div><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Essentials/Providers/../Resources/views/reminder/show.blade.php ENDPATH**/ ?>