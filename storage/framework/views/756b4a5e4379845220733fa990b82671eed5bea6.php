<div class="table-responsive">
    <table class="table table-bordered table-striped table-text-center" id="profit_by_day_table">
        <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('lang_v1.days'); ?></th>
                <th><?php echo app('translator')->getFromJson('lang_v1.gross_profit'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo app('translator')->getFromJson('lang_v1.' . $day); ?></td>
                    <td><span class="display_currency gross-profit" data-currency_symbol="true" data-orig-value="<?php echo e($profits[$day] ?? 0, false); ?>"><?php echo e($profits[$day] ?? 0, false); ?></span></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr class="bg-gray font-17 footer-total">
                <td><strong><?php echo app('translator')->getFromJson('sale.total'); ?>:</strong></td>
                <td><span class="display_currency footer_total" data-currency_symbol ="true"></span></td>
            </tr>
        </tfoot>
    </table>
</div><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/resources/views/report/partials/profit_by_day.blade.php ENDPATH**/ ?>