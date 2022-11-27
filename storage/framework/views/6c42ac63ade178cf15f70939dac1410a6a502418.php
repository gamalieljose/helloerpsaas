<?php echo e(Form::model($payment, array('route' => array('payment.update', $payment->id), 'method' => 'PUT','enctype' => 'multipart/form-data'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group  col-md-6">
            <?php echo e(Form::label('date', __('Date'),['class'=>'form-label'])); ?>

            <?php echo e(Form::date('date',null,array('class'=>'form-control','required'=>'required'))); ?>

        </div>
        <div class="form-group  col-md-6">
            <?php echo e(Form::label('amount', __('Amount'),['class'=>'form-label'])); ?>

            <?php echo e(Form::number('amount', null, array('class' => 'form-control','required'=>'required','step'=>'0.01'))); ?>

        </div>
        <div class="form-group  col-md-6">
            <?php echo e(Form::label('account_id', __('Account'),['class'=>'form-label'])); ?>

            <?php echo e(Form::select('account_id',$accounts,null, array('class' => 'form-control select','required'=>'required'))); ?>

        </div>
        <div class="form-group  col-md-6">
            <?php echo e(Form::label('vender_id', __('Vendor'),['class'=>'form-label'])); ?>

            <?php echo e(Form::select('vender_id', $venders,null, array('class' => 'form-control select','required'=>'required'))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('description', __('Description'),['class'=>'form-label'])); ?>

            <?php echo e(Form::textarea('description', null, array('class' => 'form-control','rows'=>3))); ?>

        </div>
        <div class="form-group  col-md-6">
            <?php echo e(Form::label('category_id', __('Category'),['class'=>'form-label'])); ?>

            <?php echo e(Form::select('category_id', $categories,null, array('class' => 'form-control select','required'=>'required'))); ?>

        </div>
        <div class="form-group  col-md-6">
            <?php echo e(Form::label('reference', __('Reference'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('reference', null, array('class' => 'form-control'))); ?>

        </div>

        <div class="form-group col-md-6">
            <?php echo e(Form::label('add_receipt',__('Payment Receipt'),['class' => 'col-form-label'])); ?>

            <?php echo e(Form::file('add_receipt',array('class'=>'form-control','required'=>'required', 'id'=>'files'))); ?>

            <img id="image" class="mt-2" src="<?php echo e(asset(Storage::url('uploads/payment')).'/'.$payment->add_receipt); ?>" style="width:25%;"/>

        </div>

    </div>
</div>

<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn  btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn  btn-primary">
</div>
<?php echo e(Form::close()); ?>



<script>
    document.getElementById('files').onchange = function () {
        var src = URL.createObjectURL(this.files[0])
        document.getElementById('image').src = src
    }
</script>

<?php /**PATH C:\laragon\www\contafacil\resources\views/payment/edit.blade.php ENDPATH**/ ?>