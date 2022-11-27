<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><?php echo app('translator')->getFromJson( 'manufacturing::lang.production_details' ); ?> (<b><?php echo app('translator')->getFromJson('purchase.ref_no'); ?>:</b> #<?php echo e($production_purchase->ref_no, false); ?>)</h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <p class="pull-right"><b><?php echo app('translator')->getFromJson('messages.date'); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($production_purchase->transaction_date))->format(session('business.date_format')), false); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 invoice-col">
                    <?php echo app('translator')->getFromJson('business.business'); ?>:
                    <address>
                        <strong><?php echo e($production_purchase->business->name, false); ?></strong>
                        <?php echo e($production_purchase->location->name, false); ?>

                        <?php if(!empty($production_purchase->location->landmark)): ?>
                          <br><?php echo e($production_purchase->location->landmark, false); ?>

                        <?php endif; ?>
                        <?php if(!empty($production_purchase->location->city) || !empty($production_purchase->location->state) || !empty($production_purchase->location->country)): ?>
                          <br><?php echo e(implode(',', array_filter([$production_purchase->location->city, $production_purchase->location->state, $production_purchase->location->country])), false); ?>

                        <?php endif; ?>
                        
                        <?php if(!empty($production_purchase->business->tax_number_1)): ?>
                          <br><?php echo e($production_purchase->business->tax_label_1, false); ?>: <?php echo e($production_purchase->business->tax_number_1, false); ?>

                        <?php endif; ?>

                        <?php if(!empty($production_purchase->business->tax_number_2)): ?>
                          <br><?php echo e($production_purchase->business->tax_label_2, false); ?>: <?php echo e($production_purchase->business->tax_number_2, false); ?>

                        <?php endif; ?>

                        <?php if(!empty($production_purchase->location->mobile)): ?>
                          <br><?php echo app('translator')->getFromJson('contact.mobile'); ?>: <?php echo e($production_purchase->location->mobile, false); ?>

                        <?php endif; ?>
                        <?php if(!empty($production_purchase->location->email)): ?>
                          <br><?php echo app('translator')->getFromJson('business.email'); ?>: <?php echo e($production_purchase->location->email, false); ?>

                        <?php endif; ?>
                    </address>
                </div>
                <div class="col-sm-6 invoice-col">
                    <b><?php echo app('translator')->getFromJson('purchase.ref_no'); ?>:</b> #<?php echo e($production_purchase->ref_no, false); ?><br/>
                    <b><?php echo app('translator')->getFromJson('messages.date'); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($production_purchase->transaction_date))->format(session('business.date_format')), false); ?><br/>
                    <b><?php echo app('translator')->getFromJson('purchase.purchase_status'); ?>:</b> <?php echo e(ucfirst( $production_purchase->status ), false); ?><br>
                    <b><?php echo app('translator')->getFromJson('purchase.payment_status'); ?>:</b> <?php echo e(ucfirst( $production_purchase->payment_status ), false); ?><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4><?php echo app('translator')->getFromJson('manufacturing::lang.product_details'); ?></h4>
                </div>
                <div class="col-md-6">
                    <strong><?php echo app('translator')->getFromJson('sale.product'); ?>:</strong>
                    <?php echo e($purchase_line->variations->full_name, false); ?>

                    <?php if(request()->session()->get('business.enable_lot_number') == 1): ?>
                        <br><strong><?php echo app('translator')->getFromJson('lang_v1.lot_number'); ?>:</strong>
                        <?php echo e($purchase_line->lot_number, false); ?>

                    <?php endif; ?>
                    <?php if(session('business.enable_product_expiry')): ?>
                        <br><strong><?php echo app('translator')->getFromJson('product.exp_date'); ?>:</strong>
                        <?php if(!empty($purchase_line->exp_date)): ?>       
                            <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase_line->exp_date))->format(session('business.date_format')), false); ?> 
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <strong><?php echo app('translator')->getFromJson('lang_v1.quantity'); ?>:</strong>
                    <?php echo e(number_format($quantity, config('constants.quantity_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php echo e($unit_name, false); ?><br>
                    <strong><?php echo app('translator')->getFromJson('manufacturing::lang.waste_units'); ?>:</strong>
                    <?php echo e(number_format($quantity_wasted, config('constants.quantity_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php echo e($unit_name, false); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4><?php echo app('translator')->getFromJson('manufacturing::lang.ingredients'); ?></h4>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('manufacturing::lang.ingredient'); ?></th>
                                <th><?php echo app('translator')->getFromJson('manufacturing::lang.input_quantity'); ?></th>
                                <th><?php echo app('translator')->getFromJson('manufacturing::lang.waste_percent'); ?></th>
                                <th><?php echo app('translator')->getFromJson('manufacturing::lang.final_quantity'); ?></th>
                                <th><?php echo app('translator')->getFromJson('manufacturing::lang.total_price'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $total_ingredient_unit_price = 0;
                                $total_ingredient_price = 0;
                            ?>
                            <?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($ingredient['full_name'], false); ?></td>
                                    <td><?php echo e(number_format($ingredient['quantity'], config('constants.quantity_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php echo e($ingredient['unit'], false); ?></td>
                                    <td><?php echo e(number_format($ingredient['waste_percent'], config('constants.quantity_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> %</td>
                                    <td><?php echo e(number_format($ingredient['final_quantity'], config('constants.quantity_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php echo e($ingredient['unit'], false); ?></td>
                                    <?php
                                        $price = $ingredient['total_price'];

                                        $total_ingredient_price += $price;
                                    ?>
                                    <td>
                                         <span class="display_currency" data-currency_symbol="true"><?php echo e($price, false); ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right"><strong><?php echo app('translator')->getFromJson('manufacturing::lang.ingredients_cost'); ?></strong></td>
                                <td><span class="display_currency" data-currency_symbol="true"><?php echo e($total_ingredient_price, false); ?></span></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"><strong><?php echo e(__('manufacturing::lang.production_cost'), false); ?>:</strong></td>
                                <td><span class="display_currency" data-currency_symbol="true"><?php echo e($total_production_cost, false); ?></span> </td>
                            </tr>
                            <tr><td colspan="4" class="text-right"><strong><?php echo e(__('manufacturing::lang.total_cost'), false); ?>:</strong></td>
                                <td><span class="display_currency" data-currency_symbol="true"><?php echo e($production_purchase->final_total, false); ?></span></td></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary no-print" aria-label="Print" 
      onclick="$(this).closest('div.modal-content').printThis();"><i class="fa fa-print"></i> <?php echo app('translator')->getFromJson( 'messages.print' ); ?>
      </button>
            <button type="button" class="btn btn-default no-print" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Manufacturing/Providers/../Resources/views/production/show.blade.php ENDPATH**/ ?>