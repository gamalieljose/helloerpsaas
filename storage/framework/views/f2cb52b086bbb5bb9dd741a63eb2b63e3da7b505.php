<div class="task_description toggle_description_fields">
    <?php echo $project_task->description; ?>

</div>
<!-- form open -->
<?php echo Form::open(['url' => action('\Modules\Project\Http\Controllers\TaskController@postTaskDescription', ['id' => $project_task->id, 'project_id' => $project_task->project_id]), 'id' => 'update_task_description', 'method' => 'put']); ?>

    <div class="form-group">
        <?php echo Form::textarea('description', $project_task->description, ['class' => 'form-control ', 'id' => 'edit_description_of_task']);; ?>

    </div>
    <button type="submit" class="btn btn-primary btn-sm ladda-button save-description-btn" data-style="expand-right">
        <span class="ladda-label"><?php echo app('translator')->getFromJson('messages.update'); ?></span>
    </button>
     <button type="button" class="btn btn-default btn-sm close_update_task_description_form">
        <?php echo app('translator')->getFromJson('messages.close'); ?>
    </button>
<?php echo Form::close(); ?>

<!-- /form close --><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Project/Providers/../Resources/views/task/partials/edit_description.blade.php ENDPATH**/ ?>