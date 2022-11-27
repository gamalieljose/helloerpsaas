<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Bank Balance Transfer'), false); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard'), false); ?>"><?php echo e(__('Dashboard'), false); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Bank Balance Transfer'), false); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        
        
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create bank transfer')): ?>
            <a href="#" data-url="<?php echo e(route('bank-transfer.create'), false); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create Bank-Transfer'), false); ?>" data-bs-toggle="tooltip" title="<?php echo e(__('Create'), false); ?>" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class=" mt-2 " id="multiCollapseExample1">
                <div class="card">
                    <div class="card-body">
                        <?php echo e(Form::open(array('route' => array('bank-transfer.index'),'method' => 'GET','id'=>'transfer_form')), false); ?>

                        <div class="row align-items-center justify-content-end">
                            <div class="col-xl-10">
                                <div class="row">

                                    <div class="col-3">
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 month">
                                        <div class="btn-box">
                                            <?php echo e(Form::label('date', __('Date'),['class'=>'form-label']), false); ?>

                                            <?php echo e(Form::text('date', isset($_GET['date'])?$_GET['date']:null, array('class' => 'form-control month-btn','id'=>'pc-daterangepicker-1','readonly')), false); ?>


                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 date">
                                        <div class="btn-box">
                                            <?php echo e(Form::label('f_account', __('From Account'),['class'=>'form-label']), false); ?>

                                            <?php echo e(Form::select('f_account',$account,isset($_GET['f_account'])?$_GET['f_account']:'', array('class' => 'form-control select')), false); ?>

                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            <?php echo e(Form::label('t_account', __('To Account'),['class'=>'form-label']), false); ?>

                                            <?php echo e(Form::select('t_account', $account,isset($_GET['t_account'])?$_GET['t_account']:'', array('class' => 'form-control select')), false); ?>

                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-auto mt-4">
                                <div class="row">
                                    <div class="col-auto">

                                        <a href="#" class="btn btn-sm btn-primary" onclick="document.getElementById('transfer_form').submit(); return false;" data-bs-toggle="tooltip" title="<?php echo e(__('Apply'), false); ?>" data-original-title="<?php echo e(__('apply'), false); ?>">
                                            <span class="btn-inner--icon"><i class="ti ti-search"></i></span>
                                        </a>

                                        <a href="<?php echo e(route('bank-transfer.index'), false); ?>" class="btn btn-sm btn-danger " data-bs-toggle="tooltip"  title="<?php echo e(__('Reset'), false); ?>" data-original-title="<?php echo e(__('Reset'), false); ?>">
                                            <span class="btn-inner--icon"><i class="ti ti-trash-off text-white-off "></i></span>
                                        </a>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::close(), false); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <h5></h5>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th> <?php echo e(__('Date'), false); ?></th>
                                <th> <?php echo e(__('From Account'), false); ?></th>
                                <th> <?php echo e(__('To Account'), false); ?></th>
                                <th> <?php echo e(__('Amount'), false); ?></th>
                                <th> <?php echo e(__('Reference'), false); ?></th>
                                <th> <?php echo e(__('Description'), false); ?></th>
                                <?php if(Gate::check('edit transfer') || Gate::check('delete transfer')): ?>
                                    <th width="10%"> <?php echo e(__('Action'), false); ?></th>
                                <?php endif; ?>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $__currentLoopData = $transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="font-style">
                                    <td><?php echo e(\Auth::user()->dateFormat( $transfer->date), false); ?></td>
                                    <td><?php echo e(!empty($transfer->fromBankAccount())? $transfer->fromBankAccount()->bank_name.' '.$transfer->fromBankAccount()->holder_name:'', false); ?></td>
                                    <td><?php echo e(!empty( $transfer->toBankAccount())? $transfer->toBankAccount()->bank_name.' '. $transfer->toBankAccount()->holder_name:'', false); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat( $transfer->amount), false); ?></td>
                                    <td><?php echo e($transfer->reference, false); ?></td>
                                    <td><?php echo e($transfer->description, false); ?></td>
                                    <?php if(Gate::check('edit transfer') || Gate::check('delete transfer')): ?>
                                        <td class="Action">
                                            <span>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit transfer')): ?>
                                                    <div class="action-btn bg-primary ms-2">
                                                        <a href="#" class="mx-3 btn btn-sm align-items-center" data-url="<?php echo e(route('bank-transfer.edit',$transfer->id), false); ?>" data-ajax-popup="true" title="<?php echo e(__('Edit'), false); ?>" data-title="<?php echo e(__('Edit Transfer'), false); ?>" data-bs-toggle="tooltip" data-original-title="<?php echo e(__('Edit'), false); ?>">
                                                            <i class="ti ti-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete transfer')): ?>
                                                    <div class="action-btn bg-danger ms-2">
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['bank-transfer.destroy', $transfer->id],'id'=>'delete-form-'.$transfer->id]); ?>


                                                        <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" data-original-title="<?php echo e(__('Delete'), false); ?>" title="<?php echo e(__('Delete'), false); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?'), false); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($transfer->id, false); ?>').submit();">
                                                            <i class="ti ti-trash text-white text-white text-white"></i>
                                                        </a>
                                                    <?php echo Form::close(); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </span>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\helloerpsaas\resources\views/bank-transfer/index.blade.php ENDPATH**/ ?>