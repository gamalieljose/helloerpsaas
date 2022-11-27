<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('CustomerController@update', [$customer->id]), 'method' => 'PUT', 'id' => 'customer_edit_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->getFromJson( 'lang_v1.customer_group_name' ); ?></h4>
    </div>

    <div class="modal-body">
    <h6 class="sub-title"><?php echo e(__('Basic Info'), false); ?></h6>


    <div class="row">


        <div class="form-group">
        <?php echo Form::label('name', __( 'lang_v1.customer_group_name' ) . ':*'); ?>

        <?php echo Form::text('name', $customer->name, ['class' => 'form-control', 'required', 'placeholder' => __( 'lang_v1.customer_group_name' )]);; ?>

        </div>


        <div class="form-group">
        <?php echo Form::label('name', __( 'lang_v1.customer_group_name' ) . ':*'); ?>

        <?php echo Form::text('contact', $customer->contact, ['class' => 'form-control', 'required', 'placeholder' => __( 'lang_v1.customer_group_name' )]);; ?>

        </div>

        <div class="form-group">
        <?php echo Form::label('name', __( 'lang_v1.customer_group_name' ) . ':*'); ?>

        <?php echo Form::text('email', $customer->email, ['class' => 'form-control', 'required', 'placeholder' => __( 'lang_v1.customer_group_name' )]);; ?>

        </div>
        
        <div class="form-group">
        <?php echo Form::label('balance', __( 'lang_v1.customer_group_name' ) . ':*'); ?>

        <?php echo Form::text('balance', $customer->balance, ['class' => 'form-control', 'required', 'placeholder' => __( 'lang_v1.customer_group_name' )]);; ?>

        </div>
    </div>




 
      
    </div>









    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson( 'messages.update' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH C:\laragon\www\helloerp\resources\views/customer/edit.blade.php ENDPATH**/ ?>