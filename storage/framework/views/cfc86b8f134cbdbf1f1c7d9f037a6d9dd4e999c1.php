<div class="modal-dialog" role="document">
    <?php echo Form::open(['url' => action('\Modules\Project\Http\Controllers\TaskController@postTaskStatus', $project_task->id), 'id' => 'change_status', 'method' => 'put']); ?>

    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">
                <?php echo app('translator')->getFromJson("project::lang.change_status"); ?>
            </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?php echo Form::label('status', __('sale.status') .':*'); ?>

                        <?php echo Form::select('status', $statuses, $project_task->status, ['class' => 'form-control select2', 'required', 'style' => 'width: 100%;']);; ?>

                    </div>
                </div>
            </div>
            <?php echo Form::hidden('project_id', $project_task->project_id, ['class' => 'form-control']); ?>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <?php echo app('translator')->getFromJson('messages.update'); ?>
            </button>
             <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                <?php echo app('translator')->getFromJson('messages.close'); ?>
            </button>
        </div>
    </div><!-- /.modal-content -->
     <?php echo Form::close(); ?>

</div><!-- /.modal-dialog --><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Project/Providers/../Resources/views/task/change_status.blade.php ENDPATH**/ ?>