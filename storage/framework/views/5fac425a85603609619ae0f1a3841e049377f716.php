<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="modal-title">
                <i class="fa fa-tasks"></i>
                <?php echo e($project_task->subject, false); ?>

                <code>(<?php echo e($project_task->task_id, false); ?>)</code>
                <button data-href="<?php echo e(action('\Modules\Project\Http\Controllers\TaskController@edit', ['id' => $project_task->id, 'project_id' => $project_task->project_id]), false); ?>" class="cursor-pointer edit_a_task_from_view_task mr-16 btn btn-sm btn-primary pull-right">
                    <i class="fa fa-edit"></i>
                    <?php echo e(__("messages.edit"), false); ?>

                </button>
            </h3>
            <span class="label label-primary mb-2" data-toggle="tooltip" title="<?php echo app('translator')->getFromJson('project::lang.project'); ?>">
                <i class="fa fa-tag"></i>
                <?php echo e($project_task->project->name, false); ?>

            </span>
            <?php if(isset($project_task->due_date)): ?>
                <span class="label label-default mb-2" data-toggle="tooltip" title="<?php echo app('translator')->getFromJson('project::lang.due_date'); ?>">
                    <i class="fa fa-calendar-times-o"></i>
                    <?php echo e(\Carbon::createFromTimestamp(strtotime($project_task->due_date))->format(session('business.date_format')), false); ?>

                </span>
            <?php endif; ?>
            <span class="label mb-2
                <?php if($project_task->priority == 'low'): ?>
                    bg-green
                <?php elseif($project_task->priority == 'medium'): ?>
                    bg-yellow
                <?php elseif($project_task->priority == 'high'): ?>
                    bg-orange
                <?php elseif($project_task->priority == 'urgent'): ?>
                    bg-red
                <?php endif; ?>
                " data-toggle="tooltip" title="<?php echo app('translator')->getFromJson('project::lang.priority'); ?>">
                <?php echo e(__('project::lang.'.$project_task->priority), false); ?>

            </span>
            <span class="label mb-2
                <?php if($project_task->status == 'completed'): ?>
                    bg-green
                <?php elseif($project_task->status == 'cancelled'): ?>
                    bg-red
                <?php elseif($project_task->status == 'on_hold'): ?>
                    bg-yellow
                <?php elseif($project_task->status == 'in_progress'): ?>
                    bg-info
                <?php elseif($project_task->status == 'not_started'): ?>
                    bg-red
                <?php endif; ?>
                " data-toggle="tooltip" title="<?php echo app('translator')->getFromJson('sale.status'); ?>">
                <?php echo e(__('project::lang.'.$project_task->status), false); ?>

            </span>
            <?php if ($__env->exists('project::avatar.create', ['max_count' => '10', 'members' => $project_task->members])) echo $__env->make('project::avatar.create', ['max_count' => '10', 'members' => $project_task->members], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <h5>
                        <i class="fa fa-bars"></i>&nbsp;
                        <b><?php echo e(__('lang_v1.description'), false); ?></b>
                        <i class="fa fa-edit cursor-pointer edit_task_description toggle_description_fields" data-toggle="tooltip" title="<?php echo app('translator')->getFromJson('messages.edit'); ?>"></i>
                    </h5>
                    <div class="form_n_description">
                        <?php if ($__env->exists('project::task.partials.edit_description')) echo $__env->make('project::task.partials.edit_description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
            <hr>
            <!-- time log for task -->
            <?php if(isset($project_task->project->settings['enable_timelog']) && $project_task->project->settings['enable_timelog']): ?>
                <?php if ($__env->exists('project::task.partials.time_log')) echo $__env->make('project::task.partials.time_log', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?> <!-- /time log for task -->
            <!-- form open -->
            <?php echo Form::open(['url' => action('\Modules\Project\Http\Controllers\TaskCommentController@store'), 'id' => 'add_comment_form', 'method' => 'post']); ?>

                <div class="row">
                    <div class="col-md-12">
                        <h5>
                            <i class="fas fa-comments"></i>
                            <b><?php echo e(__('project::lang.add_comment'), false); ?></b>
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo Form::label('comment', __('project::lang.comment') . ':*'); ?>

                            <?php echo Form::textarea('comment', null, ['class' => 'form-control ', 'rows' => '3', 'required']);; ?>

                        </div>
                        <input type="hidden" name="project_task_id" value="<?php echo e($project_task->id, false); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group toggleMedia">
                            <label for="fileupload">
                                <?php echo app('translator')->getFromJson('project::lang.file_upload'); ?>:
                            </label>
                            <div class="dropzone" id="fileupload"></div>
                        </div>
                        <input type="hidden" id="comment_media" name="file_name[]" value="">
                    </div>
                </div>
                <button type="button" class="btn btn-info btn-sm upload_doc">
                    <?php echo app('translator')->getFromJson('project::lang.upload_doc'); ?>
                </button>
                <button type="submit" class="btn btn-primary btn-sm ladda-button comment_btn" data-style="expand-right">
                   <span class="ladda-label"><?php echo app('translator')->getFromJson('project::lang.save_comment'); ?></span>
                </button>
                <button type="button" class="btn btn-default btn-sm hide_upload_btn toggleMedia">
                    <?php echo app('translator')->getFromJson('messages.close'); ?>
                </button>
            <?php echo Form::close(); ?>

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h5>
                        <i class="fas fa-comment-dots"></i>
                        <b><?php echo e(__('project::lang.activity'), false); ?></b>
                    </h5>
                    <div class="direct-chat-messages" style="max-height: 500px;height: auto;">
                        <?php if ($__env->exists('project::task.partials.comment', ['comments' => $project_task->comments])) echo $__env->make('project::task.partials.comment', ['comments' => $project_task->comments], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <span class="pull-left">
                <i class="fas fa-pencil-alt"></i>
                <?php echo app('translator')->getFromJson('project::lang.added_this_task_on', [
                    'name' => $project_task->createdBy->user_full_name
                ]); ?>
                <?php echo e(\Carbon::createFromTimestamp(strtotime($project_task->created_at))->format(session('business.date_format')), false); ?>

            </span>
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                <?php echo app('translator')->getFromJson('messages.close'); ?>
            </button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Project/Providers/../Resources/views/task/show.blade.php ENDPATH**/ ?>