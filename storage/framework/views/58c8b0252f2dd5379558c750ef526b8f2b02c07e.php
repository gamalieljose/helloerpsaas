<div class="modal-dialog" role="document">
  	<div class="modal-content">
  		<?php echo Form::open(['url' => action('\Modules\Essentials\Http\Controllers\ShiftController@postAssignUsers'), 'method' => 'post', 'id' => 'add_user_shift_form' ]); ?>

  		<div class="modal-header">
	      	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      	<h4 class="modal-title">
	      		<?php echo app('translator')->getFromJson( 'essentials::lang.assign_users' ); ?>
	      		(
	      			<?php echo e($shift->name, false); ?>

	      			<?php if($shift->type == 'fixed_shift'): ?>
	      			: <?php echo e(\Carbon::createFromTimestamp(strtotime($shift->start_time))->format('H:i'), false); ?> - <?php echo e(\Carbon::createFromTimestamp(strtotime($shift->end_time))->format('H:i'), false); ?>

	      			<?php endif; ?>
	      		)
	      	</h4>
	    </div>
	    <div class="modal-body">
	    	<?php echo Form::hidden('shift_id', $shift->id);; ?>

	    	<table class="table table-condensed">
	    		<thead>
	    			<tr>
	    				<th>&nbsp;</th>
	    				<th><?php echo app('translator')->getFromJson('report.user'); ?></th>
	    				<th><?php echo app('translator')->getFromJson('business.start_date'); ?></th>
	    				<th><?php echo app('translator')->getFromJson('essentials::lang.end_date'); ?></th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    				<tr>
	    					<td><?php echo Form::checkbox('user_shift[' . $key . '][is_added]', 1, array_key_exists($key, $user_shifts), ['id' => 'user_check_' . $key ]);; ?></td>
	    					<td><?php echo e($value, false); ?></td>
	    					<td>
					        	<div class="input-group date">
					        		<?php echo Form::text('user_shift[' . $key . '][start_date]', !empty($user_shifts[$key]['start_date']) ? $user_shifts[$key]['start_date'] : null, ['class' => 'form-control date_picker', 'placeholder' => __( 'business.start_date' ), 'readonly', 'id' => 'user_shift[' . $key . '][start_date]']);; ?>

					        		<span class="input-group-addon"><i class="fas fa-clock"></i></span>
					        	</div>
					        </td>
					        <td>
					        	<div class="input-group date">
					        		<?php echo Form::text('user_shift[' . $key . '][end_date]', !empty($user_shifts[$key]['end_date']) ? $user_shifts[$key]['end_date'] : null, ['class' => 'form-control date_picker', 'placeholder' => __( 'essentials::lang.end_date' ), 'readonly' ]);; ?>

					        		<span class="input-group-addon"><i class="fas fa-clock"></i></span>
					        	</div>
					        </td>
	    				</tr>
	    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    		</tbody>
	    	</table>
	    </div>
	    <div class="modal-footer">
	      	<button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson( 'messages.submit' ); ?></button>
	      	<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
	    </div>
	    <?php echo Form::close(); ?>

  	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#add_user_shift_form').validate({
			rules: {
				<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				'user_shift[<?php echo e($key, false); ?>][start_date]': {
					required: function(element){
		            	return $('#user_check_<?php echo e($key, false); ?>').is(":checked");
		        	}
		    	},
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			}
		});
	});
</script><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Essentials/Providers/../Resources/views/attendance/add_shift_users.blade.php ENDPATH**/ ?>