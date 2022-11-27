<div class="table-responsive">
<table class="table table-bordered table-striped" id="sr_sales_report" style="width: 100%;">
    <thead>
        <tr>
            <th><?php echo app('translator')->getFromJson('messages.date'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.invoice_no'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.customer_name'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.location'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.payment_status'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.total_amount'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.total_paid'); ?></th>
            <th><?php echo app('translator')->getFromJson('sale.total_remaining'); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr class="bg-gray font-17 footer-total text-center">
            <td colspan="4"><strong><?php echo app('translator')->getFromJson('sale.total'); ?>:</strong></td>
            <td id="sr_footer_payment_status_count"></td>
            <td><span class="display_currency" id="sr_footer_sale_total" data-currency_symbol ="true"></span></td>
            <td><span class="display_currency" id="sr_footer_total_paid" data-currency_symbol ="true"></span></td>
            <td class="text-left"><small><?php echo app('translator')->getFromJson('lang_v1.sell_due'); ?> - <span class="display_currency" id="sr_footer_total_remaining" data-currency_symbol ="true"></span><br><?php echo app('translator')->getFromJson('lang_v1.sell_return_due'); ?> - <span class="display_currency" id="sr_footer_total_sell_return_due" data-currency_symbol ="true"></span></small></td>
        </tr>
    </tfoot>
</table>
</div><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/resources/views/report/partials/sales_representative_sales.blade.php ENDPATH**/ ?>