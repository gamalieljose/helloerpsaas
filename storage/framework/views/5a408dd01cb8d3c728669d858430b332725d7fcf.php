<div class="pos-tab-content">
    <div class="row">
        <div class="col-xs-7">
        	<?php
        		$pos_sell_statuses = [
        			'final' => __('lang_v1.final'),
        			'draft' => __('sale.draft'),
        			'quotation' => __('lang_v1.quotation')
        		];

        		$woo_order_statuses = [
        			'pending' => __('woocommerce::lang.pending'),
        			'processing' => __('woocommerce::lang.processing'),
        			'on-hold' => __('woocommerce::lang.on-hold'),
        			'completed' => __('woocommerce::lang.completed'),
        			'cancelled' => __('woocommerce::lang.cancelled'),
        			'refunded' => __('woocommerce::lang.refunded'),
        			'failed' => __('woocommerce::lang.failed'),
        			'shipped' => __('woocommerce::lang.shipped')
        		];

        	?>
        	<table class="table">
        		<tr>
        			<th><?php echo app('translator')->getFromJson('woocommerce::lang.woocommerce_order_status'); ?></th>
        			<th><?php echo app('translator')->getFromJson('woocommerce::lang.equivalent_pos_sell_status'); ?></th>
        		</tr>
        		<?php $__currentLoopData = $woo_order_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        		<tr>
        			<td>
        				<?php echo e($value, false); ?>

        			</td>
        			<td>
        				<?php echo Form::select("order_statuses[$key]", $pos_sell_statuses, $default_settings['order_statuses'][$key] ?? null, ['class' => 'form-control select2', 'style' => 'width: 100%;', 'placeholder' => __('messages.please_select')]);; ?>

        			</td>
        		</tr>
        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        	</table>
        </div>
    </div>
</div><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Woocommerce/Providers/../Resources/views/woocommerce/partials/order_sync_settings.blade.php ENDPATH**/ ?>