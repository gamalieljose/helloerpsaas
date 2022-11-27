

<?php $__env->startSection('title', __('repair::lang.view_job_sheet')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('repair::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1>
    	<?php echo app('translator')->getFromJson('repair::lang.job_sheet'); ?>
    	(<code><?php echo e($job_sheet->job_sheet_no, false); ?></code>)
    </h1>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-solid">
				<div class="box-header no-print">
					<div class="box-tools">
						<?php if(auth()->user()->can("job_sheet.edit")): ?>
							<a href="<?php echo e(action('\Modules\Repair\Http\Controllers\JobSheetController@edit', ['id' => $job_sheet->id]), false); ?>" class="btn btn-info cursor-pointer">
			                    <i class="fa fa-edit"></i>
			                    <?php echo app('translator')->getFromJson("messages.edit"); ?>
			                </a>
			            <?php endif; ?>
						<button type="button" class="btn btn-primary" aria-label="Print" id="print_jobsheet">
							<i class="fa fa-print"></i>
							<?php echo app('translator')->getFromJson( 'repair::lang.print_format_1' ); ?>
				      	</button>

				      	<a class="btn btn-success" href="<?php echo e(action('\Modules\Repair\Http\Controllers\JobSheetController@print', ['id' => $job_sheet->id]), false); ?>" target="_blank">
							<i class="fas fa-file-pdf"></i>
							<?php echo app('translator')->getFromJson( 'repair::lang.print_format_2' ); ?>
				      	</a>
			      </div>
			    </div>
				<div class="box-body" id="job_sheet">
					
					<div class="width-100">
						<div class="width-50 f-left" style="padding-top: 40px;">
							<?php if(!empty(Session::get('business.logo'))): ?>
			                  <img src="<?php echo e(asset( 'uploads/business_logos/' . Session::get('business.logo') ), false); ?>" alt="Logo" style="width: auto; max-height: 90px; margin: auto;">
			                <?php endif; ?>
						</div>
						<div class="width-50 f-left" >
							<p style="text-align: center;padding-top: 40px;padding-left: 110px;">
								<strong class="font-23">
									<?php echo e($job_sheet->customer->business->name, false); ?>

								</strong>
								<br>
								<?php if(!empty($job_sheet->businessLocation)): ?>
									<?php echo e($job_sheet->businessLocation->name, false); ?><br>
								<?php endif; ?>
								<span>
									<?php echo $job_sheet->businessLocation->location_address; ?>

								</span>
							</p>
						</div>	
					</div>
					
					<table class="table table-bordered" style="margin-top: 15px;">
						<tr>
							<th rowspan="3">
								<?php echo app('translator')->getFromJson('receipt.date'); ?>:
								<span style="font-weight: 100">
									<?php echo e(\Carbon::createFromTimestamp(strtotime($job_sheet->created_at))->format(session('business.date_format') . ' ' . 'H:i'), false); ?>

								</span>
							</th>
						</tr>
						<tr>
							<td>
								<b><?php echo app('translator')->getFromJson('repair::lang.service_type'); ?>:</b>
								<?php echo app('translator')->getFromJson('repair::lang.'.$job_sheet->service_type); ?>
							</td>
							<th rowspan="2">
								<b>
									<?php echo app('translator')->getFromJson('repair::lang.expected_delivery_date'); ?>:
								</b>
								<?php if(!empty($job_sheet->delivery_date)): ?>
									<span style="font-weight: 100">
										<?php echo e(\Carbon::createFromTimestamp(strtotime($job_sheet->delivery_date))->format(session('business.date_format') . ' ' . 'H:i'), false); ?>

									</span>
								<?php endif; ?>
							</th>
						</tr>
						<tr>
							<td>
								<b><?php echo app('translator')->getFromJson('repair::lang.job_sheet_no'); ?>:</b>
								<?php echo e($job_sheet->job_sheet_no, false); ?>

							</td>
						</tr>
						<tr>
							<td colspan="2">
								<strong><?php echo app('translator')->getFromJson('role.customer'); ?>:</strong><br>
								<p>
									<?php echo e($job_sheet->customer->name, false); ?> <br>
									<?php echo $job_sheet->customer->contact_address; ?>

									<?php if(!empty($contact->email)): ?>
										<br><?php echo app('translator')->getFromJson('business.email'); ?>:
										<?php echo e($job_sheet->customer->email, false); ?>

									<?php endif; ?>
									<br><?php echo app('translator')->getFromJson('contact.mobile'); ?>:
									<?php echo e($job_sheet->customer->mobile, false); ?>

									<?php if(!empty($contact->tax_number)): ?>
										<br><?php echo app('translator')->getFromJson('contact.tax_no'); ?>:
										<?php echo e($job_sheet->customer->tax_number, false); ?>

									<?php endif; ?>
								</p>
							</td>
							<td>
								<b><?php echo app('translator')->getFromJson('product.brand'); ?>:</b>
								<?php echo e(optional($job_sheet->brand)->name, false); ?>

								<br>
								<b><?php echo app('translator')->getFromJson('repair::lang.device'); ?>:</b>
								<?php echo e(optional($job_sheet->device)->name, false); ?>

								<br>
								<b><?php echo app('translator')->getFromJson('repair::lang.device_model'); ?>:</b>
								<?php echo e(optional($job_sheet->deviceModel)->name, false); ?>

								<br>
								<b><?php echo app('translator')->getFromJson('repair::lang.serial_no'); ?>:</b>
								<?php echo e($job_sheet->serial_no, false); ?>

								<br>
								<b><?php echo app('translator')->getFromJson('lang_v1.password'); ?>:</b>
								<?php echo e($job_sheet->security_pwd, false); ?>

								<br>
								<b>
									<?php echo app('translator')->getFromJson('repair::lang.security_pattern_code'); ?>:
								</b>
								<?php echo e($job_sheet->security_pattern, false); ?>

							</td>
						</tr>
						<tr>
							<td colspan="2">
								<b>
									<?php echo app('translator')->getFromJson('sale.invoice_no'); ?>:
								</b>
							</td>
							<td>
								<?php if($job_sheet->invoices->count() > 0): ?>
									<?php $__currentLoopData = $job_sheet->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php echo e($invoice->invoice_no, false); ?>

										<?php if(!$loop->last): ?>
									        <?php echo e(', ', false); ?>

									    <?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<b>
									<?php echo app('translator')->getFromJson('repair::lang.estimated_cost'); ?>:
								</b>
							</td>
							<td>
								<span class="display_currency" data-currency_symbol="true">
									<?php echo e($job_sheet->estimated_cost, false); ?>

								</span>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<b>
									<?php echo app('translator')->getFromJson('sale.status'); ?>:
								</b>
							</td>
							<td>
								<?php echo e(optional($job_sheet->status)->name, false); ?>

							</td>
						</tr>
						<tr>
							<td colspan="2">
								<b>
									<?php echo app('translator')->getFromJson('business.location'); ?>:
								</b>
							</td>
							<td>
								<?php echo e(optional($job_sheet->businessLocation)->name, false); ?>

							</td>
						</tr>
						<tr>
							<td colspan="2">
								<b>
									<?php echo app('translator')->getFromJson('repair::lang.technician'); ?>:
								</b>
							</td>
							<td>
								<?php echo e(optional($job_sheet->technician)->user_full_name, false); ?>

							</td>
						</tr>
						<tr>
							<td colspan="2">
								<b>
									<?php echo app('translator')->getFromJson('repair::lang.pre_repair_checklist'); ?>:
								</b>
							</td>
							<td>
								<?php
									$checklists = [];
									if (!empty($job_sheet->deviceModel) && !empty($job_sheet->deviceModel->repair_checklist)) {
										$checklists = explode('|', $job_sheet->deviceModel->repair_checklist);
									}
								?>
								<?php if(!empty($job_sheet->checklist)): ?>
									<?php $__currentLoopData = $checklists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $check): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                            <div class="col-xs-4">
			                                <?php if($job_sheet->checklist[$check] == 'yes'): ?>
			                                    <i class="fas fa-check-square text-success fa-lg"></i>
			                                <?php elseif($job_sheet->checklist[$check] == 'no'): ?>
			                                  <i class="fas fa-window-close text-danger fa-lg"></i>
			                                <?php elseif($job_sheet->checklist[$check] == 'not_applicable'): ?>
			                                  <i class="fas fa-square fa-lg"></i>
			                                <?php endif; ?>
			                                <?php echo e($check, false); ?>

			                                <br>
			                            </div>
			                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                    <?php endif; ?>
							</td>
						</tr>
						<?php if($job_sheet->service_type == 'pick_up' || $job_sheet->service_type == 'on_site'): ?>
							<tr>
								<td colspan="3">
									<b>
										<?php echo app('translator')->getFromJson('repair::lang.pick_up_on_site_addr'); ?>:
									</b> <br>
									<?php echo $job_sheet->pick_up_on_site_addr; ?>

								</td>
							</tr>
						<?php endif; ?>
						<tr>
							<td colspan="3">
								<b>
									<?php echo app('translator')->getFromJson('repair::lang.product_configuration'); ?>:
								</b> <br>
								<?php
									$product_configuration = json_decode($job_sheet->product_configuration, true);
								?>
								<?php if(!empty($product_configuration)): ?>
									<?php $__currentLoopData = $product_configuration; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_conf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php echo e($product_conf['value'], false); ?>

										<?php if(!$loop->last): ?>
											<?php echo e(',', false); ?>

										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</td>
						</tr>
						<tr>
							<td colspan="3">
								<b>
									<?php echo app('translator')->getFromJson('repair::lang.condition_of_product'); ?>:
								</b> <br>
								<?php
									$product_condition = json_decode($job_sheet->product_condition, true);
								?>
								<?php if(!empty($product_condition)): ?>
									<?php $__currentLoopData = $product_condition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_cond): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php echo e($product_cond['value'], false); ?>

										<?php if(!$loop->last): ?>
											<?php echo e(',', false); ?>

										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</td>
						</tr>
						<?php if(!empty($job_sheet->custom_field_1)): ?>
							<tr>
								<td colspan="2">
									<b>
										<?php echo e($repair_settings['job_sheet_custom_field_1'] ?? __('lang_v1.custom_field', ['number' => 1]), false); ?>:
									</b>
								</td>
								<td>
									<?php echo e($job_sheet->custom_field_1, false); ?>

								</td>
							</tr>
						<?php endif; ?>
					</td>
				</tr>
				<tr>
					<th colspan="2"><?php echo app('translator')->getFromJson('repair::lang.parts_used'); ?>:</th>
					<td>
						<?php if(!empty($parts)): ?>
						<table>
							<?php $__currentLoopData = $parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($part['variation_name'], false); ?>: &nbsp;</td>
									<td><?php echo e($part['quantity'], false); ?> <?php echo e($part['unit'], false); ?></td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</table>
						<?php endif; ?>
					</td>
				</tr>
				<?php if(!empty($job_sheet->custom_field_2)): ?>
					<tr>
						<td colspan="2">
							<b>
								<?php echo e($repair_settings['job_sheet_custom_field_2'] ?? __('lang_v1.custom_field', ['number' => 2]), false); ?>:
							</b>
						</td>
						<td>
							<?php echo e($job_sheet->custom_field_2, false); ?>

						</td>
					</tr>
				<?php endif; ?>
				<?php if(!empty($job_sheet->custom_field_3)): ?>
					<tr>
						<td colspan="2">
							<b>
								<?php echo e($repair_settings['job_sheet_custom_field_3'] ?? __('lang_v1.custom_field', ['number' => 3]), false); ?>:
							</b>
						</td>
						<td>
							<?php echo e($job_sheet->custom_field_3, false); ?>

						</td>
					</tr>
				<?php endif; ?>
				<?php if(!empty($job_sheet->custom_field_4)): ?>
					<tr>
						<td colspan="2">
							<b>
								<?php echo e($repair_settings['job_sheet_custom_field_4'] ?? __('lang_v1.custom_field', ['number' => 4]), false); ?>:
							</b>
						</td>
						<td>
							<?php echo e($job_sheet->custom_field_4, false); ?>

						</td>
					</tr>
				<?php endif; ?>
				<?php if(!empty($job_sheet->custom_field_5)): ?>
					<tr>
						<td colspan="2">
							<b>
								<?php echo e($repair_settings['job_sheet_custom_field_5'] ?? __('lang_v1.custom_field', ['number' => 5]), false); ?>:
							</b>
						</td>
						<td>
							<?php echo e($job_sheet->custom_field_5, false); ?>

						</td>
					</tr>
				<?php endif; ?>
				<tr>
							<td colspan="3">
								<b>
									<?php echo app('translator')->getFromJson('repair::lang.problem_reported_by_customer'); ?>:
								</b> <br>
								<?php
									$defects = json_decode($job_sheet->defects, true);
								?>
								<?php if(!empty($defects)): ?>
									<?php $__currentLoopData = $defects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_defect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php echo e($product_defect['value'], false); ?>

										<?php if(!$loop->last): ?>
											<?php echo e(',', false); ?>

										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</td>
						</tr>
						<tr>
							<td colspan="3">
								<strong>
									<?php echo app('translator')->getFromJson("lang_v1.terms_conditions"); ?>:
								</strong>
								<?php if(!empty($repair_settings['repair_tc_condition'])): ?>
									<?php echo $repair_settings['repair_tc_condition']; ?>

								<?php endif; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<b>
									<?php echo app('translator')->getFromJson('repair::lang.customer_signature'); ?>:
								</b>
							</td>
							<td>
								<b>
									<?php echo app('translator')->getFromJson('repair::lang.authorized_signature'); ?>:
								</b>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<?php if($job_sheet->media->count() > 0): ?>
			<div class="col-md-6">
				<div class="box box-solid no-print">
					<div class="box-header with-border">
						<h4 class="box-title">
							<?php echo app('translator')->getFromJson('repair::lang.uploaded_image_for', ['job_sheet_no' => $job_sheet->job_sheet_no]); ?>
						</h4>
				    </div>
					<div class="box-body">
						<?php if ($__env->exists('repair::job_sheet.partials.document_table_view', ['medias' => $job_sheet->media])) echo $__env->make('repair::job_sheet.partials.document_table_view', ['medias' => $job_sheet->media], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-6">
			<div class="box box-solid box-solid no-print">
		        <div class="box-header with-border">
		            <h3 class="box-title"><?php echo e(__('repair::lang.activities'), false); ?>:</h3>
		        </div>
		        <!-- /.box-header -->
		        <?php echo $__env->make('repair::repair.partials.activities', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		    </div>
		</div>
	</div>
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<style type="text/css">
	.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
	.table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
	.table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
		border: 1px solid #1d1a1a;
	}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$('#print_jobsheet').click( function(){
			$('#job_sheet').printThis();
		});
		$(document).on('click', '.delete_media', function (e) {
            e.preventDefault();
            var url = $(this).data('href');
            var this_btn = $(this);
            swal({
                title: LANG.sure,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((confirmed) => {
                if (confirmed) {
                    $.ajax({
                        method: 'GET',
                        url: url,
                        dataType: 'json',
                        success: function(result) {
                            if(result.success == true){
			                    this_btn.closest('tr').remove();
			                    toastr.success(result.msg);
			                } else {
			                    toastr.error(result.msg);
			                }
                        }
                    });
                }
            });
        });
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Repair/Providers/../Resources/views/job_sheet/show.blade.php ENDPATH**/ ?>