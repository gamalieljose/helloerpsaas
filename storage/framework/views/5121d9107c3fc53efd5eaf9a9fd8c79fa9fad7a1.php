<div class="modal-dialog" role="document">
  	<div class="modal-content">
  		<div class="modal-header no-print">
	      	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      	<h4 class="modal-title no-print"><?php echo __('essentials::lang.payroll_of_employee', ['employee' => $payroll->transaction_for->user_full_name, 'date' => $month_name . ' ' . $year]); ?></h4>
	    </div>
	    <div class="modal-body">
	      	<div class="row">
	      		<div class="col-md-12 print_section">
	      			<h2 class="text-center">
	      				<?php echo e(session()->get('business.name'), false); ?><br>
	      			</h2>
	      			<h4 class="text-center"><?php echo __('essentials::lang.payroll_of_employee', ['employee' => $payroll->transaction_for->user_full_name, 'date' => $month_name . ' ' . $year]); ?></h4>
	      		</div>
	      		<div class="col-md-12">
	      			<strong><?php echo app('translator')->getFromJson('purchase.ref_no'); ?>: </strong><?php echo e($payroll->ref_no, false); ?>

	      			<br><br>
	      			<table class="table table-condensed">
	      				<tr>
	      					<th width="50%"><?php echo app('translator')->getFromJson( 'essentials::lang.total_work_duration' ); ?>:</th>
	      					<td width="50%"><?php echo e(number_format($payroll->essentials_duration, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php echo e($payroll->essentials_duration_unit, false); ?></td>
	      				</tr>
	      				<tr>
	      					<th>
	      						<?php echo app('translator')->getFromJson( 'essentials::lang.amount_per_unit_duartion' ); ?>:
	      					</th>
	      					<td>
	      						<span class="display_currency" data-currency_symbol="true"><?php echo e($payroll->essentials_amount_per_unit_duration, false); ?> </span>
	      					</td>
	      				</tr>
	      				<tr class="bg-gray">
	      					<th><?php echo app('translator')->getFromJson('sale.total'); ?>: <small>(<?php echo e(number_format($payroll->essentials_duration, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> * <?php echo e(number_format($payroll->essentials_amount_per_unit_duration, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>) = </small></th>
	      					<td>
	      						<span class="display_currency" data-currency_symbol="true"><?php echo e($payroll->essentials_duration * $payroll->essentials_amount_per_unit_duration, false); ?> </span>
	      					</td>
	      				</tr>
	      			</table>
	      			<h4><?php echo app('translator')->getFromJson('essentials::lang.allowances'); ?>:</h4>
	      			<table class="table table-condensed">
	      				<?php
	                        $total_allowances = 0;
	                    ?>
	                    <?php $__empty_1 = true; $__currentLoopData = $allowances['allowance_names']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	                    	<tr>
		                    	<th width="50%"><?php echo e($value, false); ?>:</th>
		                    	<td width="50%"><span class="display_currency" data-currency_symbol="true"><?php echo e($allowances['allowance_amounts'][$key], false); ?></span>
		                    		<?php if(!empty($allowances['allowance_types'][$key]) 
		                    		&& $allowances['allowance_types'][$key] == 'percent'): ?>
		                    			(<?php echo e(number_format($allowances['allowance_percents'][$key], config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>%)
		                    		<?php endif; ?>
		                    	</td>

		                        <?php
		                            $total_allowances += !empty($allowances['allowance_amounts'][$key]) ? $allowances['allowance_amounts'][$key] : 0;
		                        ?>
	                        </tr>
	                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	                       <tr><td colspan="2" class="text-center"><?php echo app('translator')->getFromJson('lang_v1.none'); ?></td></tr>
	                    <?php endif; ?>
	                    <tr class="bg-gray">
	                    	<th><?php echo app('translator')->getFromJson('sale.total'); ?>:</th>
	                    	<td><span class="display_currency" data-currency_symbol="true"><?php echo e($total_allowances, false); ?></span></td>
	                    </tr>
	      			</table>
	      			<h4><?php echo app('translator')->getFromJson('essentials::lang.deductions'); ?>:</h4>
	      			<table class="table table-condensed">
	      				<?php
	                        $total_deduction = 0;
	                    ?>
	                    <?php $__empty_1 = true; $__currentLoopData = $deductions['deduction_names']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	                    	<tr>
		                    	<th width="50%"><?php echo e($value, false); ?>:</th>
		                    	<td width="50%"><span class="display_currency" data-currency_symbol="true"><?php echo e($deductions['deduction_amounts'][$key], false); ?></span>
		                    	<?php if(!empty($deductions['deduction_types'][$key]) 
		                    		&& $deductions['deduction_types'][$key] == 'percent'): ?>
	                    			(<?php echo e(number_format($deductions['deduction_percents'][$key], config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>%)
	                    		<?php endif; ?>
		                    	</td>

		                        <?php
		                            $total_deduction += !empty($deductions['deduction_amounts'][$key]) ? $deductions['deduction_amounts'][$key] : 0;
		                        ?>
	                        </tr>
	                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	                       <tr><td colspan="2" class="text-center"><?php echo app('translator')->getFromJson('lang_v1.none'); ?></td></tr>
	                    <?php endif; ?>
	                    <tr class="bg-gray">
	                    	<th><?php echo app('translator')->getFromJson('sale.total'); ?>:</th>
	                    	<td><span class="display_currency" data-currency_symbol="true"><?php echo e($total_deduction, false); ?></span></td>
	                    </tr>
	      			</table>
	      			<table class="table table-condensed">
	      				<tr class="bg-gray">
	      					<th width="50%"><?php echo app('translator')->getFromJson('essentials::lang.gross_amount'); ?>: <br><small>(<?php echo e(number_format($payroll->essentials_duration * $payroll->essentials_amount_per_unit_duration, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> + <?php echo e(number_format($total_allowances, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> -  <?php echo e(number_format($total_deduction, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>)</small> = </th>
	      					<td>&nbsp;<br><span class="display_currency" data-currency_symbol="true"><?php echo e($payroll->final_total, false); ?></span></td>
	      				</tr>
	      			</table>
	      		</div>
	      	</div>
	      	<div class="row">
	      		<div class="col-sm-12 col-xs-12">
			        <h4><?php echo e(__('sale.payment_info'), false); ?>:</h4>
			    </div>
				<div class="col-md-12">
					<table class="table bg-gray table-slim">
						<tr class="bg-green">
							<th>#</th>
							<th><?php echo e(__('messages.date'), false); ?></th>
							<th><?php echo e(__('purchase.ref_no'), false); ?></th>
							<th><?php echo e(__('sale.amount'), false); ?></th>
							<th><?php echo e(__('sale.payment_mode'), false); ?></th>
							<th><?php echo e(__('sale.payment_note'), false); ?></th>
						</tr>
						<?php
							$total_paid = 0;
						?>
						<?php $__empty_1 = true; $__currentLoopData = $payroll->payment_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<?php
								if($payment_line->is_return == 1){
								  $total_paid -= $payment_line->amount;
								} else {
								  $total_paid += $payment_line->amount;
								}
							?>
							<tr>
								<td><?php echo e($loop->iteration, false); ?></td>
								<td><?php echo e(\Carbon::createFromTimestamp(strtotime($payment_line->paid_on))->format(session('business.date_format')), false); ?></td>
								<td><?php echo e($payment_line->payment_ref_no, false); ?></td>
								<td><span class="display_currency" data-currency_symbol="true"><?php echo e($payment_line->amount, false); ?></span></td>
								<td>
								  	<?php echo e($payment_types[$payment_line->method], false); ?>

								</td>
								<td><?php if($payment_line->note): ?> 
								  <?php echo e(ucfirst($payment_line->note), false); ?>

								  <?php else: ?>
								  --
								  <?php endif; ?>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
							<tr><td colspan="6" class="text-center"><?php echo app('translator')->getFromJson('purchase.no_records_found'); ?></td></tr>
						<?php endif; ?>
					</table>
				</div>
	    </div>
	    <div class="modal-footer no-print">
	      	<button type="button" class="btn btn-primary" aria-label="Print" 
      onclick="$(this).closest('div.modal-content').find('.modal-body').printThis();"><i class="fa fa-print"></i> <?php echo app('translator')->getFromJson( 'messages.print' ); ?>
      </button>
	      	<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
	    </div>

  	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Essentials/Providers/../Resources/views/payroll/show.blade.php ENDPATH**/ ?>