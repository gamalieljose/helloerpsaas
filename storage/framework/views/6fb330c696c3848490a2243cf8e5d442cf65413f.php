<?php $__env->startSection('template_title'); ?>
    Bank Account
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <?php echo e(__('Bank Account'), false); ?>

                            </span>

                             <div class="float-right">
                                <a href="<?php echo e(route('bank-accounts.create'), false); ?>" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  <?php echo e(__('Create New'), false); ?>

                                </a>
                              </div>
                        </div>
                    </div>
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success">
                            <p><?php echo e($message, false); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Business Id</th>
										<th>Holder Name</th>
										<th>Bank Name</th>
										<th>Account Number</th>
										<th>Opening Balance</th>
										<th>Contact Number</th>
										<th>Bank Address</th>
										<th>Created By</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $bankAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bankAccount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$i, false); ?></td>
                                            
											<td><?php echo e($bankAccount->business_id, false); ?></td>
											<td><?php echo e($bankAccount->holder_name, false); ?></td>
											<td><?php echo e($bankAccount->bank_name, false); ?></td>
											<td><?php echo e($bankAccount->account_number, false); ?></td>
											<td><?php echo e($bankAccount->opening_balance, false); ?></td>
											<td><?php echo e($bankAccount->contact_number, false); ?></td>
											<td><?php echo e($bankAccount->bank_address, false); ?></td>
											<td><?php echo e($bankAccount->created_by, false); ?></td>

                                            <td>
                                                <form action="<?php echo e(route('bank-accounts.destroy',$bankAccount->id), false); ?>" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="<?php echo e(route('bank-accounts.show',$bankAccount->id), false); ?>"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="<?php echo e(route('bank-accounts.edit',$bankAccount->id), false); ?>"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php echo $bankAccounts->links(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\helloerpsaas\resources\views/bank-account/index.blade.php ENDPATH**/ ?>