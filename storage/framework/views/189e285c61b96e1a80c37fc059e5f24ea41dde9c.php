<!-- Page level currency setting -->
<?php if(!empty($__system_currency)): ?>
	<input type="hidden" id="p_code" value="<?php echo e($__system_currency->code, false); ?>">
	<input type="hidden" id="p_symbol" value="<?php echo e($__system_currency->symbol, false); ?>">
	<input type="hidden" id="p_thousand" value="<?php echo e($__system_currency->thousand_separator, false); ?>">
	<input type="hidden" id="p_decimal" value="<?php echo e($__system_currency->decimal_separator, false); ?>">
<?php endif; ?><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/pos1/Modules/Superadmin/Providers/../Resources/views/layouts/partials/currency.blade.php ENDPATH**/ ?>