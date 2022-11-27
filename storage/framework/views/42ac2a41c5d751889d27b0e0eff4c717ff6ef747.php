<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('AccountController@update',$account->id), 'method' => 'PUT', 'id' => 'edit_payment_account_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->getFromJson( 'account.edit_account' ); ?></h4>
    </div>

    <div class="modal-body">
            <div class="form-group">
                <?php echo Form::label('name', __( 'lang_v1.name' ) .":*"); ?>

                <?php echo Form::text('name', $account->name, ['class' => 'form-control', 'required','placeholder' => __( 'lang_v1.name' ) ]);; ?>

            </div>

             <div class="form-group">
                <?php echo Form::label('account_number', __( 'account.account_number' ) .":*"); ?>

                <?php echo Form::text('account_number', $account->account_number, ['class' => 'form-control', 'required','placeholder' => __( 'account.account_number' ) ]);; ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('account_type_id', __( 'account.account_type' ) .":"); ?>

                <select name="account_type_id" class="form-control select2">
                    <option><?php echo app('translator')->getFromJson('messages.please_select'); ?></option>
                    <?php $__currentLoopData = $account_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <optgroup label="<?php echo e($account_type->name, false); ?>">
                            <option value="<?php echo e($account_type->id, false); ?>" <?php if($account->account_type_id == $account_type->id): ?> selected <?php endif; ?> ><?php echo e($account_type->name, false); ?></option>
                            <?php $__currentLoopData = $account_type->sub_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($sub_type->id, false); ?>" <?php if($account->account_type_id == $sub_type->id): ?> selected <?php endif; ?> ><?php echo e($sub_type->name, false); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </optgroup>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <label><?php echo app('translator')->getFromJson('lang_v1.account_details'); ?>:</label>
            <table class="table table-striped">
                <tr>
                    <th>
                        <?php echo app('translator')->getFromJson('lang_v1.label'); ?>
                    </th>
                    <th>
                        <?php echo app('translator')->getFromJson('product.value'); ?>
                    </th>
                </tr>
                <?php if(!empty($account->account_details)): ?>
                    <?php $__currentLoopData = $account->account_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $account_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo Form::text('account_details['.$key.'][label]', !empty($account->account_details[$key]['label'])? $account->account_details[$key]['label'] : null, ['class' => 'form-control']);; ?>

                            </td>
                            <td>
                                <?php echo Form::text('account_details['.$key.'][value]', !empty($account->account_details[$key]['value'])?$account->account_details[$key]['value']:null, ['class' => 'form-control']);; ?>      
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <?php for($i = 0; $i < 6; $i++): ?>
                        <tr>
                            <td>
                                <?php echo Form::text('account_details['.$i.'][label]', null, ['class' => 'form-control']);; ?>

                            </td>
                            <td>
                                <?php echo Form::text('account_details['.$i.'][value]', null, ['class' => 'form-control']);; ?>      
                            </td>
                        </tr>
                    <?php endfor; ?>
                <?php endif; ?>
            </table>
            
            <div class="form-group">
                <?php echo Form::label('note', __( 'brand.note' )); ?>

                <?php echo Form::textarea('note', $account->note, ['class' => 'form-control', 'placeholder' => __( 'brand.note' ), 'rows' => 4]);; ?>

            </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson( 'messages.update' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/resources/views/account/edit.blade.php ENDPATH**/ ?>