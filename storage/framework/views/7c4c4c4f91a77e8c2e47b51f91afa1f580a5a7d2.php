<strong><i class="fa fa-info margin-r-5"></i> <?php echo app('translator')->getFromJson('contact.tax_no'); ?></strong>
<p class="text-muted">
    <?php echo e($contact->tax_number, false); ?>

</p>
<?php if($contact->pay_term_type): ?>
    <strong><i class="fa fa-calendar margin-r-5"></i> <?php echo app('translator')->getFromJson('contact.pay_term_period'); ?></strong>
    <p class="text-muted">
        <?php echo e(__('lang_v1.' . $contact->pay_term_type), false); ?>

    </p>
<?php endif; ?>
<?php if($contact->pay_term_number): ?>
    <strong><i class="fas fa fa-handshake margin-r-5"></i> <?php echo app('translator')->getFromJson('contact.pay_term'); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->pay_term_number, false); ?>

    </p>
<?php endif; ?><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/resources/views/contact/contact_tax_info.blade.php ENDPATH**/ ?>