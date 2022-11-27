<div class="modal-dialog modal-xl" role="document">
	<div class="modal-content">
		<div class="modal-header">
		    <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    <h4 class="modal-title" id="modalTitle"> <?php echo app('translator')->getFromJson('lang_v1.stock_adjustment_details'); ?> (<b><?php echo app('translator')->getFromJson('purchase.ref_no'); ?>:</b> #<?php echo e($stock_adjustment->ref_no, false); ?>)
		    </h4>
		</div>
		<div class="modal-body">
		  	<div class="row">
			    <div class="col-sm-12">
			      <p class="pull-right"><b><?php echo app('translator')->getFromJson('messages.date'); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($stock_adjustment->transaction_date))->format(session('business.date_format')), false); ?></p>
			    </div>
			</div>
			<div class="row invoice-info">
				<div class="col-sm-4 invoice-col">
    				<?php echo app('translator')->getFromJson('business.business'); ?>:
			     	 <address>
			        <strong><?php echo e($stock_adjustment->business->name, false); ?></strong>
			        <?php echo e($stock_adjustment->location->name, false); ?>

			        <?php if(!empty($stock_adjustment->location->landmark)): ?>
			          <br><?php echo e($stock_adjustment->location->landmark, false); ?>

			        <?php endif; ?>
			        <?php if(!empty($stock_adjustment->location->city) || !empty($stock_adjustment->location->state) || !empty($stock_adjustment->location->country)): ?>
			          <br><?php echo e(implode(',', array_filter([$stock_adjustment->location->city, $stock_adjustment->location->state, $stock_adjustment->location->country])), false); ?>

			        <?php endif; ?>
			        <?php if(!empty($stock_adjustment->location->mobile)): ?>
			          <br><?php echo app('translator')->getFromJson('contact.mobile'); ?>: <?php echo e($stock_adjustment->location->mobile, false); ?>

			        <?php endif; ?>
			        <?php if(!empty($stock_adjustment->location->email)): ?>
			          <br><?php echo app('translator')->getFromJson('business.email'); ?>: <?php echo e($stock_adjustment->location->email, false); ?>

			        <?php endif; ?>
			      </address>
			    </div>

			    <div class="col-sm-4 invoice-col">
			      	<b><?php echo app('translator')->getFromJson('purchase.ref_no'); ?>:</b> #<?php echo e($stock_adjustment->ref_no, false); ?><br/>
			      	<b><?php echo app('translator')->getFromJson('messages.date'); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($stock_adjustment->transaction_date))->format(session('business.date_format')), false); ?><br/>
			      	<b><?php echo app('translator')->getFromJson('stock_adjustment.adjustment_type'); ?>:</b> <?php echo e(__('stock_adjustment.' . $stock_adjustment->adjustment_type), false); ?><br>
			      	<b><?php echo app('translator')->getFromJson('stock_adjustment.reason_for_stock_adjustment'); ?>:</b> <?php echo e($stock_adjustment->additional_notes, false); ?><br>
			    </div>
    		</div>

    		<div class="row">
    			<div class="col-sm-12 col-xs-12">
      				<div class="table-responsive">
      					<table class="table table-condensed bg-gray">
							<tr class="bg-green">
								<th><?php echo app('translator')->getFromJson('sale.product'); ?></th>
								<?php if(!empty($lot_n_exp_enabled)): ?>
			                		<th><?php echo e(__('lang_v1.lot_n_expiry'), false); ?></th>
			              		<?php endif; ?>
								<th><?php echo app('translator')->getFromJson('sale.qty'); ?></th>
								<th><?php echo app('translator')->getFromJson('sale.unit_price'); ?></th>
								<th><?php echo app('translator')->getFromJson('sale.subtotal'); ?></th>
							</tr>
							<?php $__currentLoopData = $stock_adjustment->stock_adjustment_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock_adjustment_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td>
										<?php echo e($stock_adjustment_line->variation->full_name, false); ?>

									</td>
									<?php if(!empty($lot_n_exp_enabled)): ?>
			                			<td><?php echo e($stock_adjustment_line->lot_number ?? '--', false); ?>

						                  <?php if( session()->get('business.enable_product_expiry') == 1 && !empty($stock_adjustment_line->exp_date)): ?>
						                    (<?php echo e(\Carbon::createFromTimestamp(strtotime($stock_adjustment_line->exp_date))->format(session('business.date_format')), false); ?>)
						                  <?php endif; ?>
						                </td>
			              			<?php endif; ?>
									<td>
										<?php echo e(number_format($stock_adjustment_line->quantity, config('constants.quantity_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>

									</td>
									<td>
										<?php echo e(number_format($stock_adjustment_line->unit_price, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>

									</td>
									<td>
										<?php echo e(number_format($stock_adjustment_line->unit_price * $stock_adjustment_line->quantity, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>

									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</table>
      				</div>
     			</div>
     			<div class="col-md-6 col-md-offset-6 col-sm-12 col-xs-12">
				    <div class="table-responsive">
				        <table class="table no-border">
				          	<tr>
				            	<th><?php echo app('translator')->getFromJson('stock_adjustment.total_amount'); ?>: </th>
				            	<td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($stock_adjustment->final_total, false); ?></span></td>
				          	</tr>
				          	<tr>
				            	<th><?php echo app('translator')->getFromJson('stock_adjustment.total_amount_recovered'); ?>: </th>
				            	<td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($stock_adjustment->total_amount_recovered, false); ?></span></td>
				          	</tr>
				      	</table>
				  	</div>
				</div>
    		</div>
    		<div class="row">
		      <div class="col-md-12">
		            <strong><?php echo e(__('lang_v1.activities'), false); ?>:</strong><br>
		            <?php if ($__env->exists('activity_log.activities')) echo $__env->make('activity_log.activities', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		        </div>
		    </div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary no-print" aria-label="Print" 
			onclick="$(this).closest('div.modal-content').printThis();"><i class="fa fa-print"></i> <?php echo app('translator')->getFromJson( 'messages.print' ); ?>
			</button>
			<button type="button" class="btn btn-default no-print" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
		</div>
	</div>
</div><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/resources/views/stock_adjustment/show.blade.php ENDPATH**/ ?>