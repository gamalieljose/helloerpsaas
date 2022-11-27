<div class="row">
	<div class="col-md-12">
		<h4><?php echo app('translator')->getFromJson('product.variations'); ?>:</h4>
	</div>
	<div class="col-md-12">
		<?php $__currentLoopData = $product->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-md-3 mb-12">
				<div class="attachment-block clearfix">
	                <?php if(!empty($variation->media->first())): ?>
						<img src="<?php echo e($variation->media->first()->display_url, false); ?>" class="attachment-img" alt="Product image">
					<?php else: ?>
						<img src="<?php echo e($product->image_url, false); ?>" alt="Product image" class="attachment-img">
					<?php endif; ?>
					<?php if(!empty($discounts[$variation->id])): ?>
      					<span class="label label-warning discount-badge-small">- <?php echo e(number_format($discounts[$variation->id]->discount_amount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>%</span>
      				<?php endif; ?>
	                <div class="attachment-pushed">
	                  <h4 class="attachment-heading"><?php echo e($variation->product_variation->name, false); ?> - <?php echo e($variation->name, false); ?></h4>

	                  <div class="attachment-text">
	                  	<br>
	                    <table class="table table-slim no-border">
							<tr>
								<th><?php echo app('translator')->getFromJson('product.sku'); ?>:</th>
			      				<td><?php echo e($variation->sub_sku, false); ?></td>
							</tr>
							<tr>
								<th><?php echo app('translator')->getFromJson('lang_v1.price'); ?>:</th>
			      				<td><span class="display_currency" data-currency_symbol="true"><?php echo e($variation->sell_price_inc_tax, false); ?></span></td>
							</tr>
						</table>
	                  </div>
	                </div>
	              </div>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/ProductCatalogue/Providers/../Resources/views/catalogue/partials/variable_product_details.blade.php ENDPATH**/ ?>