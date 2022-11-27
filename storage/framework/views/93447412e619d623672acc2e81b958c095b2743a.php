

<?php $__env->startSection('title', __( 'essentials::lang.edit_payroll' )); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('essentials::layouts.nav_hrm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><?php echo app('translator')->getFromJson( 'essentials::lang.edit_payroll' ); ?></h1>
</section>

<!-- Main content -->
<section class="content">
<?php echo Form::open(['url' => action('\Modules\Essentials\Http\Controllers\PayrollController@update', [$payroll->id]), 'method' => 'put', 'id' => 'add_payroll_form' ]); ?>

    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget'); ?>
                <div class="col-md-12">
                    <h4><?php echo __('essentials::lang.payroll_of_employee', ['employee' => $payroll->transaction_for->user_full_name, 'date' => $month_name . ' ' . $year]); ?> (<?php echo app('translator')->getFromJson('purchase.ref_no'); ?>: <?php echo e($payroll->ref_no, false); ?>)</h4>
                    <br>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('essentials_duration', __( 'essentials::lang.total_work_duration' ) . ':*'); ?>

                        <?php echo Form::text('essentials_duration', $payroll->essentials_duration, ['class' => 'form-control input_number', 'placeholder' => __( 'essentials::lang.total_work_duration' ), 'required' ]);; ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('essentials_duration_unit', __( 'essentials::lang.duration_unit' ) . ':'); ?>

                        <?php echo Form::text('essentials_duration_unit', $payroll->essentials_duration_unit, ['class' => 'form-control', 'placeholder' => __( 'essentials::lang.duration_unit' ) ]);; ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('essentials_amount_per_unit_duration', __( 'essentials::lang.amount_per_unit_duartion' ) . ':*'); ?>

                        <?php echo Form::text('essentials_amount_per_unit_duration', number_format($payroll->essentials_amount_per_unit_duration, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number', 'placeholder' => __( 'essentials::lang.amount_per_unit_duartion' ), 'required' ]);; ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('total', __( 'sale.total' ) . ':'); ?>

                        <?php echo Form::text('total', number_format($payroll->essentials_duration * $payroll->essentials_amount_per_unit_duration, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number', 'placeholder' => __( 'sale.total' ) ]);; ?>

                    </div>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget'); ?>   
                <h4><?php echo app('translator')->getFromJson('essentials::lang.allowances'); ?>:</h4>
                <table class="table table-condenced" id="allowance_table">
                    <thead>
                        <tr>
                            <th class="col-md-5"><?php echo app('translator')->getFromJson('essentials::lang.allowance'); ?></th>
                            <th class="col-md-3"><?php echo app('translator')->getFromJson('essentials::lang.amount_type'); ?></th>
                            <th class="col-md-3"><?php echo app('translator')->getFromJson('sale.amount'); ?></th>
                            <th class="col-md-1">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total_allowances = 0;
                        ?>
                        <?php $__empty_1 = true; $__currentLoopData = $allowances['allowance_names']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php echo $__env->make('essentials::payroll.allowance_and_deduction_row', ['add_button' => $loop->index == 0 ? true : false, 'type' => 'allowance', 'name' => $value, 'value' => $allowances['allowance_amounts'][$key], 'amount_type' => !empty($allowances['allowance_types'][$key]) ? $allowances['allowance_types'][$key] : 'fixed',
                            'percent' => !empty($allowances['allowance_percents'][$key]) ? $allowances['allowance_percents'][$key] : 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php
                                $total_allowances += !empty($allowances['allowance_amounts'][$key]) ? $allowances['allowance_amounts'][$key] : 0;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php echo $__env->make('essentials::payroll.allowance_and_deduction_row', ['add_button' => true, 'type' => 'allowance'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2"><?php echo app('translator')->getFromJson('sale.total'); ?></th>
                            <td><span id="total_allowances" class="display_currency" data-currency_symbol="true"><?php echo e($total_allowances, false); ?></span></td>
                            <td>&nbsp;</td>
                        </tr>
                    </tfoot>
                </table>
                <?php echo $__env->renderComponent(); ?>
            </div>
            <div class="col-md-12">
            <?php $__env->startComponent('components.widget'); ?>
                <h4><?php echo app('translator')->getFromJson('essentials::lang.deductions'); ?>:</h4>
                <table class="table table-condenced" id="deductions_table">
                    <thead>
                        <tr>
                            <th class="col-md-5"><?php echo app('translator')->getFromJson('essentials::lang.deduction'); ?></th>
                            <th class="col-md-3"><?php echo app('translator')->getFromJson('essentials::lang.amount_type'); ?></th>
                            <th class="col-md-3"><?php echo app('translator')->getFromJson('sale.amount'); ?></th>
                            <th class="col-md-1">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total_deductions = 0;
                        ?>
                        <?php $__empty_1 = true; $__currentLoopData = $deductions['deduction_names']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php echo $__env->make('essentials::payroll.allowance_and_deduction_row', ['add_button' => $loop->index == 0 ? true : false, 'type' => 'deduction', 'name' => $value, 'value' => $deductions['deduction_amounts'][$key], 
                            'amount_type' => !empty($deductions['deduction_types'][$key]) ? $deductions['deduction_types'][$key] : 'fixed', 'percent' => !empty($deductions['deduction_percents'][$key]) ? $deductions['deduction_percents'][$key] : 0 ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php
                                $total_deductions += !empty($deductions['deduction_amounts'][$key]) ? $deductions['deduction_amounts'][$key] : 0;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php echo $__env->make('essentials::payroll.allowance_and_deduction_row', ['add_button' => true, 'type' => 'deduction'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2"><?php echo app('translator')->getFromJson('sale.total'); ?></th>
                            <td><span id="total_deductions" class="display_currency" data-currency_symbol="true"><?php echo e($total_deductions, false); ?></span></td>
                            <td>&nbsp;</td>
                        </tr>
                    </tfoot>
                </table>
             <?php echo $__env->renderComponent(); ?>
            </div>
            <div class="col-md-12">
                <h4 class="pull-right"><?php echo app('translator')->getFromJson('essentials::lang.gross_amount'); ?>: <span id="gross_amount_text" class="display_currency" data-currency_symbol="true"><?php echo e($payroll->final_total, false); ?></span></h4>
                <?php echo Form::hidden('final_total', $payroll->final_total, ['id' => 'gross_amount']);; ?><br>
            </div>
       
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary pull-right" ><?php echo app('translator')->getFromJson( 'messages.update' ); ?></button>
        </div>
    </div>
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <?php if ($__env->exists('essentials::payroll.form_script')) echo $__env->make('essentials::payroll.form_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Essentials/Providers/../Resources/views/payroll/edit.blade.php ENDPATH**/ ?>