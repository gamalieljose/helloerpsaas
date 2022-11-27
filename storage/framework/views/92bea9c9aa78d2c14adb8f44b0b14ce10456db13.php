<div class="row">
	<div class="col-md-12">
		<a type="button" class="btn btn-sm btn-primary task_btn pull-right" href="<?php echo e(action('\Modules\Project\Http\Controllers\InvoiceController@create', ['project_id' => $project->id]), false); ?>">
		    <?php echo app('translator')->getFromJson('messages.add'); ?>&nbsp;
		    <i class="fa fa-plus"></i>
		</a>
	</div> <br><br>
</div>
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="project_invoice_table">
		<thead>
			<tr>
				<th><?php echo app('translator')->getFromJson('messages.action'); ?></th>
				<th><?php echo app('translator')->getFromJson('sale.invoice_no'); ?></th>
				<th><?php echo app('translator')->getFromJson('receipt.date'); ?></th>
				<th><?php echo app('translator')->getFromJson('role.customer'); ?></th>
				<th><?php echo app('translator')->getFromJson('project::lang.title'); ?></th>
				<th><?php echo app('translator')->getFromJson('purchase.payment_status'); ?></th>
				<th><?php echo app('translator')->getFromJson('sale.total_amount'); ?></th>
				<th><?php echo app('translator')->getFromJson('sale.status'); ?></th>
			</tr>
		</thead>
	</table>
</div><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Project/Providers/../Resources/views/invoice/index.blade.php ENDPATH**/ ?>