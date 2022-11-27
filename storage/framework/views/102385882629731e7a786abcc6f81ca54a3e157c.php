<?php echo app('translator')->getFromJson('purchase.supplier'); ?>:
<address>
    <strong><?php echo e($transaction->contact->supplier_business_name, false); ?></strong>
    <?php echo e($transaction->contact->name, false); ?>

    <?php echo $transaction->contact->contact_address; ?>

    <?php if(!empty($transaction->contact->tax_number)): ?>
        <br><?php echo app('translator')->getFromJson('contact.tax_no'); ?>: <?php echo e($transaction->contact->tax_number, false); ?>

    <?php endif; ?>
    <?php if(!empty($transaction->contact->mobile)): ?>
        <br><?php echo app('translator')->getFromJson('contact.mobile'); ?>: <?php echo e($transaction->contact->mobile, false); ?>

    <?php endif; ?>
    <?php if(!empty($transaction->contact->email)): ?>
        <br>Email: <?php echo e($transaction->contact->email, false); ?>

    <?php endif; ?>
</address><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/resources/views/transaction_payment/transaction_supplier_details.blade.php ENDPATH**/ ?>