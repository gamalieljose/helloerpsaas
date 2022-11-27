<?php $__env->startSection('title', __( 'report.stock_adjustment_report' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->getFromJson( 'report.stock_adjustment_report' ); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3 col-md-offset-7 col-xs-6">
            <div class="input-group">
                <span class="input-group-addon bg-light-blue"><i class="fa fa-map-marker"></i></span>
                 <select class="form-control select2" id="stock_adjustment_location_filter">
                    <?php $__currentLoopData = $business_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key, false); ?>"><?php echo e($value, false); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-2 col-xs-6">
            <div class="form-group pull-right">
                <div class="input-group">
                  <button type="button" class="btn btn-primary" id="stock_adjustment_date_filter">
                    <span>
                      <i class="fa fa-calendar"></i> <?php echo e(__('messages.filter_by_date'), false); ?>

                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-6">
            <?php $__env->startComponent('components.widget'); ?>
                <table class="table no-border">
                    <tr>
                        <th><?php echo e(__('report.total_normal'), false); ?>:</th>
                        <td>
                            <span class="total_normal">
                                <i class="fas fa-sync fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('report.total_abnormal'), false); ?>:</th>
                        <td>
                             <span class="total_abnormal">
                                <i class="fas fa-sync fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('report.total_stock_adjustment'), false); ?>:</th>
                        <td>
                            <span class="total_amount">
                                <i class="fas fa-sync fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr>
                </table>
            <?php echo $__env->renderComponent(); ?>
        </div>

        <div class="col-sm-6">
            <?php $__env->startComponent('components.widget'); ?>
                <table class="table no-border">
                    <tr>
                        <th><?php echo e(__('report.total_recovered'), false); ?>:</th>
                        <td>
                             <span class="total_recovered">
                                <i class="fas fa-sync fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
                </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('stock_adjustment.stock_adjustments')]); ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="stock_adjustment_table">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('messages.action'); ?></th>
                                <th><?php echo app('translator')->getFromJson('messages.date'); ?></th>
                                <th><?php echo app('translator')->getFromJson('purchase.ref_no'); ?></th>
                                <th><?php echo app('translator')->getFromJson('business.location'); ?></th>
                                <th><?php echo app('translator')->getFromJson('stock_adjustment.adjustment_type'); ?></th>
                                <th><?php echo app('translator')->getFromJson('stock_adjustment.total_amount'); ?></th>
                                <th><?php echo app('translator')->getFromJson('stock_adjustment.total_amount_recovered'); ?></th>
                                <th><?php echo app('translator')->getFromJson('stock_adjustment.reason_for_stock_adjustment'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang_v1.added_by'); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
	

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('js/stock_adjustment.js?v=' . $asset_v), false); ?>"></script>
<script src="<?php echo e(asset('js/report.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/resources/views/report/stock_adjustment_report.blade.php ENDPATH**/ ?>