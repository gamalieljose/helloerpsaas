<?php $__currentLoopData = $project_task->timeLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeLog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($loop->iteration, false); ?></td>
    <td>
        <?php echo e(\Carbon::createFromTimestamp(strtotime($timeLog->start_datetime))->format(session('business.date_format') . ' ' . 'H:i'), false); ?>

    </td>
    <td>
        <?php echo e(\Carbon::createFromTimestamp(strtotime($timeLog->end_datetime))->format(session('business.date_format') . ' ' . 'H:i'), false); ?>

    </td>
    <td>
        <?php
            $start_datetime = \Carbon::parse($timeLog->start_datetime);
            $end_datetime = \Carbon::parse($timeLog->end_datetime);
        ?>
        <?php echo e($start_datetime->diffForHumans($end_datetime, true), false); ?>

    </td>
    <td>
       <?php echo e($timeLog->user->user_full_name, false); ?>

    </td>
    <td>
       <?php echo $timeLog->note; ?>

    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Project/Providers/../Resources/views/task/partials/time_log_table_body.blade.php ENDPATH**/ ?>