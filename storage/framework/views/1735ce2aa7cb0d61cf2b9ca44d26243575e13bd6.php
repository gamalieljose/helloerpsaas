<div class="row">
	<div class="col-md-4">
	    <div class="form-group">
	        <?php echo Form::label('sr_location_id',  __('purchase.business_location') . ':'); ?>


	        <?php echo Form::select('sr_location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']);; ?>

	    </div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
            <table class="table table-bordered table-striped" 
            id="supplier_stock_report_table" width="100%">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('sale.product'); ?></th>
                        <th><?php echo app('translator')->getFromJson('product.sku'); ?></th>
                        <th><?php echo app('translator')->getFromJson('purchase.purchase_quantity'); ?></th>
                        <th><?php echo app('translator')->getFromJson('lang_v1.total_sold'); ?></th>
                        <th><?php echo app('translator')->getFromJson('lang_v1.total_returned'); ?></th>
                        <th><?php echo app('translator')->getFromJson('report.current_stock'); ?></th>
                        <th><?php echo app('translator')->getFromJson('lang_v1.total_stock_price'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
	</div>
</div><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/resources/views/contact/partials/stock_report_tab.blade.php ENDPATH**/ ?>