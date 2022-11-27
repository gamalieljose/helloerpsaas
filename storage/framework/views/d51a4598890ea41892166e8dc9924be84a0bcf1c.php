<div class="panel box box-info">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#project_task_time_log" class="collapsed" aria-expanded="false">
                <?php echo app('translator')->getFromJson('project::lang.time_logs'); ?>
            </a>
        </h4>
        <?php if($can_crud_timelog || $is_lead_or_admin): ?>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-sm btn-primary add_time_log pull-right" data-href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectTimeLogController@create', ['task_id' => $project_task->id, 'project_id' => $project_task->project_id]), false); ?>">
                    <?php echo app('translator')->getFromJson('messages.add'); ?>&nbsp;
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        <?php endif; ?>
    </div>
    <div id="project_task_time_log" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> <?php echo app('translator')->getFromJson('project::lang.start_date_time'); ?></th>
                        <th><?php echo app('translator')->getFromJson('project::lang.end_date_time'); ?></th>
                        <th><?php echo app('translator')->getFromJson('project::lang.work_hour'); ?></th>
                        <th><?php echo app('translator')->getFromJson('role.user'); ?></th>
                        <th><?php echo app('translator')->getFromJson('brand.note'); ?></th>
                    </tr>
                </thead>
                <tbody id="task-timelog">
                    <?php if ($__env->exists('project::task.partials.time_log_table_body')) echo $__env->make('project::task.partials.time_log_table_body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Project/Providers/../Resources/views/task/partials/time_log.blade.php ENDPATH**/ ?>