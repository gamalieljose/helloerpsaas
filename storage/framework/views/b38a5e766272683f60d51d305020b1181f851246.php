<?php if($can_crud_timelog || $is_lead_or_admin): ?>
    <button type="button" class="btn btn-sm btn-primary time_log_btn pull-right" data-href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectTimeLogController@create', ['project_id' => $project->id]), false); ?>">
        <?php echo app('translator')->getFromJson('messages.add'); ?>&nbsp;
        <i class="fa fa-plus"></i>
    </button> <br><br>
<?php endif; ?>
<div class="table-responsive">
    <table class="table table-bordered table-striped" id="time_logs_table">
        <thead>
            <tr>
                <th> <?php echo app('translator')->getFromJson('messages.action'); ?></th>
                <th> <?php echo app('translator')->getFromJson('project::lang.task'); ?></th>
                <th> <?php echo app('translator')->getFromJson('project::lang.start_date_time'); ?></th>
                <th><?php echo app('translator')->getFromJson('project::lang.end_date_time'); ?></th>
                <th><?php echo app('translator')->getFromJson('project::lang.work_hour'); ?></th>
                <th><?php echo app('translator')->getFromJson('role.user'); ?></th>
                <th><?php echo app('translator')->getFromJson('brand.note'); ?></th>
            </tr>
        </thead>
    </table>
</div><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Project/Providers/../Resources/views/time_logs/index.blade.php ENDPATH**/ ?>