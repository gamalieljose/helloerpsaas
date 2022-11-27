<div class="modal-dialog" role="document">
  <div class="modal-content">
    <?php echo Form::open(['url' => action('\Modules\Essentials\Http\Controllers\ToDoController@update', $todo->id), 'id' => 'task_form', 'method' => 'put']); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->getFromJson( 'essentials::lang.edit_to_do' ); ?></h4>
    </div>

    <div class="modal-body">
    	<div class="row">
    		<div class="col-md-12">
		        <div class="form-group">
		            <?php echo Form::label('task', __('essentials::lang.task') . ":*"); ?>

		            <?php echo Form::text('task', $todo->task, ['class' => 'form-control', 'required']); ?>

		         </div>
		    </div>
		    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('essentials.assign_todos')): ?>
			<div class="col-md-12">
		        <div class="form-group">
					<?php echo Form::label('users', __('essentials::lang.assigned_to') . ':*'); ?>

					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-user"></i>
						</span>
						<?php echo Form::select('users[]', $users, $todo->users->pluck('id'), ['class' => 'form-control select2', 'multiple', 'required', 'style' => 'width: 100%;']);; ?>

					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="clearfix"></div>
			<div class="col-md-6">
		        <div class="form-group">
					<?php echo Form::label('priority', __('essentials::lang.priority') . ':'); ?>

					<?php echo Form::select('priority', $priorities, $todo->priority, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'style' => 'width: 100%;']);; ?>

				</div>
			</div>
			<div class="col-md-6">
		        <div class="form-group">
					<?php echo Form::label('status', __('sale.status') . ':'); ?>

					<?php echo Form::select('status', $task_statuses, $todo->status, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'style' => 'width: 100%;']);; ?>

				</div>
			</div>

		    <div class="clearfix"></div>
		    <div class="col-md-6">
		        <div class="form-group">
					<?php echo Form::label('date', __('business.start_date') . ':*'); ?>

					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</span>
						<?php echo Form::text('date', \Carbon::createFromTimestamp(strtotime($todo->date))->format(session('business.date_format') . ' ' . 'H:i'), ['class' => 'form-control datepicker text-center', 'required', 'readonly']);; ?>

					</div>
				</div>
			</div>
			<div class="col-md-6">
		        <div class="form-group">
					<?php echo Form::label('end_date', __('essentials::lang.end_date') . ':'); ?>

					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</span>
						<?php echo Form::text('end_date', !empty($todo->end_date) ? \Carbon::createFromTimestamp(strtotime($todo->end_date))->format(session('business.date_format') . ' ' . 'H:i') : '', ['class' => 'form-control datepicker text-center', 'readonly']);; ?>

					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			
			<div class="col-md-6">
		        <div class="form-group">
					<?php echo Form::label('estimated_hours', __('essentials::lang.estimated_hours') . ':'); ?>

					<div class="input-group">
						<span class="input-group-addon">
							<i class="fas fa-clock"></i>
						</span>
						<?php echo Form::text('estimated_hours', $todo->estimated_hours, ['class' => 'form-control']);; ?>

					</div>
				</div>
			</div>
		    <div class="clearfix"></div>
	    	<div class="col-md-12">
	    		<div class="form-group">
					<?php echo Form::label('to_do_description', __('lang_v1.description') . ':'); ?>

					<?php echo Form::textarea('description', $todo->description, ['id' => 'to_do_description']);; ?>

				</div>
	    	</div>
	    	<div class="col-md-12">
	        	<div class="form-group">
                    <label for="media_upload">
                        <?php echo app('translator')->getFromJson('lang_v1.upload_documents'); ?>:
                    </label>
                    <div class="dropzone" id="media_upload"></div>
                    
				    <input type="hidden" id="media_upload_url" value="<?php echo e(route('attach.medias.to.model'), false); ?>">
				    <input type="hidden" id="model_id" value="<?php echo e($todo->id, false); ?>">
				    <input type="hidden" id="model_type" value="Modules\Essentials\Entities\ToDo">
				    <input type="hidden" id="model_media_type" value="">
                </div>
	        </div>
    	</div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary ladda-button" data-style="expand-right">
      	<span class="ladda-label"><?php echo app('translator')->getFromJson( 'messages.save' ); ?></span>
      </button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Essentials/Providers/../Resources/views/todo/edit.blade.php ENDPATH**/ ?>