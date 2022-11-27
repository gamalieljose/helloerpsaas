<!-- /.box-header -->
<div class="box-body">
    <table class="table table-condensed bg-gray">
        <tr>
            <th><?php echo app('translator')->getFromJson('lang_v1.date'); ?></th>
            <th><?php echo app('translator')->getFromJson('messages.action'); ?></th>
            <th><?php echo app('translator')->getFromJson('lang_v1.by'); ?></th>
            <th><?php echo app('translator')->getFromJson('brand.note'); ?></th>
        </tr>
        <?php $__empty_1 = true; $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if($activity->description != 'is_sent_notification'): ?>
                <tr>
                    <td><?php echo e(\Carbon::createFromTimestamp(strtotime($activity->created_at))->format(session('business.date_format') . ' ' . 'H:i'), false); ?></td>
                    <td>
                        <?php if($activity->description == 'status_changed'): ?>
                            <?php echo app('translator')->getFromJson('repair::lang.status_changed_to', ['status' => $activity->getExtraProperty('updated_status')]); ?>
                        <?php else: ?>
                            <?php echo e(__('lang_v1.' . $activity->description), false); ?>

                        <?php endif; ?>
                    </td>
                    <td><?php echo e($activity->causer->user_full_name, false); ?></td>
                    <td>
                        <?php if(!empty($activity->getExtraProperty('update_note'))): ?>
                            <?php echo e($activity->getExtraProperty('update_note'), false); ?>

                            <br>
                        <?php endif; ?>
                        <?php if(!empty($activity->getExtraProperty('completed_on_from'))): ?>
                            <?php echo app('translator')->getFromJson('repair::lang.completed_on_changed'); ?>
                            <?php echo app('translator')->getFromJson('account.from'); ?>: <?php echo e(\Carbon::createFromTimestamp(strtotime($activity->getExtraProperty('completed_on_from')))->format(session('business.date_format') . ' ' . 'H:i'), false); ?>

                            <?php echo app('translator')->getFromJson('account.to'); ?>: <?php echo e(\Carbon::createFromTimestamp(strtotime($activity->getExtraProperty('completed_on_to')))->format(session('business.date_format') . ' ' . 'H:i'), false); ?>

                        <?php endif; ?>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
              <td colspan="4" class="text-center">
                <?php echo app('translator')->getFromJson('purchase.no_records_found'); ?>
              </td>
            </tr>
        <?php endif; ?>
    </table>
</div>
<!-- /.box-body --><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Repair/Providers/../Resources/views/repair/partials/activities.blade.php ENDPATH**/ ?>