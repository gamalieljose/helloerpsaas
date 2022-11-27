<table class="table table-bordered" 
id="contact_payments_table">
    <thead>
        <tr>
            <th><?php echo app('translator')->getFromJson('lang_v1.paid_on'); ?></th>
            <th><?php echo app('translator')->getFromJson('purchase.ref_no'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.amount'); ?></th>
            <th><?php echo app('translator')->getFromJson('lang_v1.payment_method'); ?></th>
            <th><?php echo app('translator')->getFromJson('account.payment_for'); ?></th>
            <th><?php echo app('translator')->getFromJson('messages.action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $count_child_payments = count($payment->child_payments);
            ?>
            <?php echo $__env->make('contact.partials.payment_row', compact('payment', 'count_child_payments', 'payment_types'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if($count_child_payments > 0): ?>
                <?php $__currentLoopData = $payment->child_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('contact.partials.payment_row', ['payment' => $child_payment, 'count_child_payments' => 0, 'payment_types' => $payment_types, 'parent_payment_ref_no' => $payment->payment_ref_no], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" class="text-center"><?php echo app('translator')->getFromJson('purchase.no_records_found'); ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<div class="text-right" style="width: 100%;" id="contact_payments_pagination"><?php echo e($payments->links(), false); ?></div>

<?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/resources/views/contact/partials/contact_payments_tab.blade.php ENDPATH**/ ?>