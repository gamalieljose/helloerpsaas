<link rel="stylesheet" href="<?php echo e(asset('css/app.css?v='.$asset_v), false); ?>">
<style type="text/css">
	.box {
		border: 1px solid;
	}
	.table-pdf {
		width: 100%;
	}

	.table-pdf td, .table-pdf th {
		padding: 6px;
		text-align: left;
	}
	.w-20 {
		width: 20%;
		float: left;
	}
	.checklist {
		padding: 5px 15px;
		width: 100%;
	}
	.checkbox {
		width: 20%;
		float: left;
	}
	.checkbox-text {
		width: 80%;
		float: left;
	} 
	.content-div {
		padding: 6px;
	}
	.table-slim{
		width: 100%;
	}

	.table-slim td, .table-slim th {
		padding: 1px !important;
		font-size: 12px;
	}
	.font-14 {
		font-size: 14px;
	}
	.font-12 {
		font-size: 12px;
	}
	body {
		font-size: 11px;
	}
</style>
<div class="width-100 box mb-10">
	<div class="width-50 f-left" align="center">
		<?php if(!empty(Session::get('business.logo'))): ?>
          <img src="<?php echo e(asset( 'uploads/business_logos/' . Session::get('business.logo') ), false); ?>" alt="Logo" style="width: auto; max-height: 90px; margin: auto;">
        <?php endif; ?>
	</div>
	<div class="width-50 f-left" align="center">
		<p style="text-align: center;">
			<strong class="font-14">
				<?php echo e($job_sheet->customer->business->name, false); ?>

			</strong>
			<br>
			<span class="font-12">
				<?php echo $job_sheet->businessLocation->name; ?> <br>
				<?php echo $job_sheet->businessLocation->location_address; ?>

			</span>
		</p>
	</div>
</div>
<div class="width-100 box mb-10">
	<table class="no-border table-pdf">
		<tr>
			<th><?php echo app('translator')->getFromJson('receipt.date'); ?>:</th>
			<th><?php echo app('translator')->getFromJson('repair::lang.service_type'); ?>:</th>
			<th><?php echo app('translator')->getFromJson('repair::lang.job_sheet_no'); ?>:</th>
			<th rowspan="2">
				<img src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($job_sheet->job_sheet_no, 'C128', 1,50,array(39, 48, 10), true), false); ?>">
			</th>
			<th><?php echo app('translator')->getFromJson('repair::lang.expected_delivery_date'); ?>:</th>
		</tr>
		<tr>
			<td style="padding-top: -8"><?php echo e(\Carbon::createFromTimestamp(strtotime($job_sheet->created_at))->format(session('business.date_format') . ' ' . 'H:i'), false); ?></td>
			<td style="padding-top: -8"><?php echo app('translator')->getFromJson('repair::lang.'.$job_sheet->service_type); ?></td>
			<td style="padding-top: -8"><?php echo e($job_sheet->job_sheet_no, false); ?></td>
			<td style="padding-top: -8"><?php echo e(\Carbon::createFromTimestamp(strtotime($job_sheet->delivery_date))->format(session('business.date_format') . ' ' . 'H:i'), false); ?></td>
		</tr>
	</table>
</div>
<div class="box mb-10">
<table class="table-pdf">
	<tr>
		<td style="vertical-align: top;">
			<table class="width-100">
				<tr>
					<th style="padding-left: 0;"><?php echo app('translator')->getFromJson('role.customer'); ?>:</th>
				</tr>
				<tr>
					<td style="padding-left: 0; padding-top: -5">
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
				</tr>
			</table>
		</td>
		<td colspan="2" style="vertical-align: top;">
			<table class="width-100">
				<tr>
					<th><?php echo app('translator')->getFromJson('product.brand'); ?>:</th>
					<td><?php echo e(optional($job_sheet->brand)->name, false); ?></td>
					<th><?php echo app('translator')->getFromJson('repair::lang.device'); ?>:</th>
					<td><?php echo e(optional($job_sheet->device)->name, false); ?></td>
				</tr>
				<tr>
					<th><?php echo app('translator')->getFromJson('repair::lang.device_model'); ?>:</th>
					<td><?php echo e(optional($job_sheet->deviceModel)->name, false); ?></td>
					<th><?php echo app('translator')->getFromJson('lang_v1.password'); ?>:</th>
					<td><?php echo e($job_sheet->security_pwd, false); ?></td>
				</tr>
				<tr>
					<th><?php echo app('translator')->getFromJson('repair::lang.serial_no'); ?>:</th>
					<td colspan="2"><?php echo e($job_sheet->serial_no, false); ?></td>
				</tr>
				<tr>
					<th><?php echo app('translator')->getFromJson('repair::lang.security_pattern_code'); ?>:</th>
					<td colspan="2"><?php echo e($job_sheet->security_pattern, false); ?></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="padding-top: 0">
			<strong><?php echo app('translator')->getFromJson('sale.invoice_no'); ?>:</strong>
			<?php if($job_sheet->invoices->count() > 0): ?>
				<?php $__currentLoopData = $job_sheet->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php echo e($invoice->invoice_no, false); ?>

					<?php if(!$loop->last): ?>
				        <?php echo e(', ', false); ?>

				    <?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
		</td>
		<td style="padding-top: 0">
			<strong><?php echo app('translator')->getFromJson('repair::lang.estimated_cost'); ?>:</strong>
			<span class="display_currency" data-currency_symbol="true">
				<?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $job_sheet->estimated_cost, config("constants.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?>
			</span>
		</td>
		<td style="padding-top: 0">
			<strong>
				<?php echo app('translator')->getFromJson('sale.status'); ?>:
			</strong>
			<?php echo e(optional($job_sheet->status)->name, false); ?>

		</td>
	</tr>
</table>
</div>
<div class="box mb-10">
<div class="width-100 content-div">
	<div class="width-100">
		<strong><?php echo app('translator')->getFromJson('repair::lang.pre_repair_checklist'); ?>:</strong>
	</div>
	<?php
		$checklists = [];
		if (!empty($job_sheet->deviceModel) && !empty($job_sheet->deviceModel->repair_checklist)) {
			$checklists = explode('|', $job_sheet->deviceModel->repair_checklist);
		}
	?>
	<?php if(!empty($job_sheet->checklist)): ?>
		<div class="width-100">
		<?php $__currentLoopData = $checklists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $check): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="w-20">
            <div class="checklist">
                <?php if($job_sheet->checklist[$check] == 'yes'): ?>
                	<div class="checkbox">&#10004;</div>
                <?php elseif($job_sheet->checklist[$check] == 'no'): ?>
                  	<div class="checkbox">&#10006;</div>
                <?php elseif($job_sheet->checklist[$check] == 'not_applicable'): ?>
                 	<div class="checkbox">&nbsp;</div>
                <?php endif; ?>
                <div class="checkbox-text"><?php echo e($check, false); ?></div>
            </div>
           	</div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	</div>
    <?php endif; ?>
</div>
<div class="width-100 content-div">
	<strong><?php echo app('translator')->getFromJson('repair::lang.product_configuration'); ?>:</strong>
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
</div>
<div class="width-100 content-div">
	<strong><?php echo app('translator')->getFromJson('repair::lang.condition_of_product'); ?>:</strong>
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
</div>
<div class="width-100 content-div">
	<strong><?php echo app('translator')->getFromJson('repair::lang.problem_reported_by_customer'); ?>:</strong>
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
</div>

<div class="width-100 content-div">
	<?php if(!empty($job_sheet->custom_field_1)): ?>
	<div class="width-50 f-left mb-5">
		<strong><?php echo e($repair_settings['job_sheet_custom_field_1'] ?? __('lang_v1.custom_field', ['number' => 1]), false); ?>:</strong> 
	<?php echo e($job_sheet->custom_field_1, false); ?>

	</div>
	<?php endif; ?>
	<?php if(!empty($job_sheet->custom_field_2)): ?>
	<div class="width-50 f-left mb-5">
			<strong><?php echo e($repair_settings['job_sheet_custom_field_2'] ?? __('lang_v1.custom_field', ['number' => 2]), false); ?>:</strong> 
			<?php echo e($job_sheet->custom_field_2, false); ?>

	</div>
	<?php endif; ?>
	<?php if(!empty($job_sheet->custom_field_3)): ?>
	<div class="width-50 f-left">
		<strong><?php echo e($repair_settings['job_sheet_custom_field_3'] ?? __('lang_v1.custom_field', ['number' => 3]), false); ?>:</strong> 
		<?php echo e($job_sheet->custom_field_3, false); ?>

	</div>
	<?php endif; ?>
	<?php if(!empty($job_sheet->custom_field_4)): ?>
	<div class="width-50 f-left mb-5">
		<strong><?php echo e($repair_settings['job_sheet_custom_field_4'] ?? __('lang_v1.custom_field', ['number' => 4]), false); ?>:</strong> 
		<?php echo e($job_sheet->custom_field_4, false); ?>

	</div>
	<?php endif; ?>
	<?php if(!empty($job_sheet->custom_field_5)): ?>
	<div class="width-50 f-left mb-5">
		<strong><?php echo e($repair_settings['job_sheet_custom_field_5'] ?? __('lang_v1.custom_field', ['number' => 5]), false); ?>:</strong> 
		<?php echo e($job_sheet->custom_field_5, false); ?>

	</div>
	<?php endif; ?>
</div>
</div>
<div class="box">
<table class="table-pdf">
	<tr>
		<th><?php echo app('translator')->getFromJson('repair::lang.parts_used'); ?>:</th>
		<td>
			<?php if(!empty($parts)): ?>
				<table class="table-slim">
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
</table>
</div>
<div class="width-100 content-div">
	<strong><?php echo app('translator')->getFromJson("lang_v1.terms_conditions"); ?>:</strong>
	<?php if(!empty($repair_settings['repair_tc_condition'])): ?>
		<?php echo $repair_settings['repair_tc_condition']; ?>

	<?php endif; ?>
</div>
<table class="table-pdf">
	<tr>
		<th>
			<?php echo app('translator')->getFromJson('repair::lang.customer_signature'); ?>:
		</th>
		<th><?php echo app('translator')->getFromJson('repair::lang.authorized_signature'); ?>:</th>
		<td><strong><?php echo app('translator')->getFromJson('repair::lang.technician'); ?>:</strong> <?php echo e(optional($job_sheet->technician)->user_full_name, false); ?></td>
	</tr>
</table>
<span style='font-size:20px;'>&#9986; ------------------------------------------------------------------------------------------------------</span>

<table class="table-pdf">
	<tr>
		<td><strong><?php echo app('translator')->getFromJson('repair::lang.job_sheet_no'); ?>:</strong><br>
			<?php echo e($job_sheet->job_sheet_no, false); ?>

		</td>
		<td><img src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($job_sheet->job_sheet_no, 'C128', 1,50,array(39, 48, 10), true), false); ?>"></td>
		<td>
			<strong><?php echo app('translator')->getFromJson('repair::lang.device_model'); ?>:</strong>  <?php echo e(optional($job_sheet->deviceModel)->name, false); ?> &nbsp;
			<strong><?php echo app('translator')->getFromJson('lang_v1.password'); ?>:</strong> <?php echo e($job_sheet->security_pwd, false); ?><br>
			<strong><?php echo app('translator')->getFromJson('repair::lang.serial_no'); ?>: </strong><?php echo e($job_sheet->serial_no, false); ?> <br>
			<strong><?php echo app('translator')->getFromJson('repair::lang.security_pattern_code'); ?>:</strong>
			<?php echo e($job_sheet->security_pattern, false); ?>

		</td>
	</tr>
	<tr>
		<td><strong><?php echo app('translator')->getFromJson('repair::lang.expected_delivery_date'); ?>:</strong><br><?php echo e(\Carbon::createFromTimestamp(strtotime($job_sheet->delivery_date))->format(session('business.date_format') . ' ' . 'H:i'), false); ?></td>
		<td colspan="2">
			<strong><?php echo app('translator')->getFromJson('repair::lang.problem_reported_by_customer'); ?>:</strong> <br>
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
</table><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Repair/Providers/../Resources/views/job_sheet/print_pdf.blade.php ENDPATH**/ ?>