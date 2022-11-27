
<?php $__env->startSection('title', __('repair::lang.upload_job_sheet_docs')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('repair::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->getFromJson('repair::lang.upload_job_sheet_docs'); ?></h1>
</section>
<!-- Main content -->
<section class="content">
	<?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
		<div class="row">
			<div class="<?php if($job_sheet->media->count() > 0): ?> col-md-6 <?php else: ?> col-md-12 <?php endif; ?>">
				<table class="table">
					<tr>
						<th><?php echo app('translator')->getFromJson('repair::lang.job_sheet_no'); ?>:</th>
						<td><?php echo e($job_sheet->job_sheet_no, false); ?></td>
					</tr>
					<tr>
						<th><?php echo app('translator')->getFromJson('receipt.date'); ?>:</th>
						<td><?php echo e(\Carbon::createFromTimestamp(strtotime($job_sheet->created_at))->format(session('business.date_format') . ' ' . 'h:i A'), false); ?></td>
					</tr>
					<tr>
						<th>
							<?php echo app('translator')->getFromJson('role.customer'); ?>:
						</th>
						<td><?php echo e($job_sheet->customer->name, false); ?></td>
					</tr>
					<tr>
						<th><?php echo app('translator')->getFromJson('business.location'); ?>:</th>
						<td>
							<?php echo e(optional($job_sheet->businessLocation)->name, false); ?>

						</td>
					</tr>
				</table>
			</div>
			<?php if($job_sheet->media->count() > 0): ?>
				<div class="col-md-6">
					<div class="row ">
						<div class="col-md-12">
							<h4>
							<?php echo app('translator')->getFromJson('repair::lang.uploaded_image_for', ['job_sheet_no' => $job_sheet->job_sheet_no]); ?>
							</h4>
						</div>
						<div class="col-md-12">
							<?php if ($__env->exists('repair::job_sheet.partials.document_table_view', ['medias' => $job_sheet->media])) echo $__env->make('repair::job_sheet.partials.document_table_view', ['medias' => $job_sheet->media], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
		<?php echo Form::open(['action' => '\Modules\Repair\Http\Controllers\JobSheetController@postUploadDocs', 'id' => 'job_sheet_doc_upload', 'method' => 'post']); ?>

			<input type="hidden" name="job_sheet_id" value="<?php echo e($job_sheet->id, false); ?>">
			<div class="row">
		        <div class="col-md-12">
		            <div class="form-group">
		                <label for="fileupload">
		                    <?php echo app('translator')->getFromJson('repair::lang.document'); ?>:
		                </label>
		                <div class="dropzone" id="imageUpload"></div>
		                <small>
                            <p class="help-block">
                                <?php echo app('translator')->getFromJson('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)]); ?>
                                <?php if ($__env->exists('components.document_help_text')) echo $__env->make('components.document_help_text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </p>
                        </small>
		            </div>
		            <input type="hidden" id="images" name="images" value="">
		        </div>
		    </div>
		    <button type="submit" class="btn btn-block btn-primary pull-right">
                <?php echo app('translator')->getFromJson('messages.save'); ?>
            </button>
	    <?php echo Form::close(); ?>

   	<?php echo $__env->renderComponent(); ?>
   	<?php
   		$accepted_files = implode(',', array_keys(config('constants.document_upload_mimes_types')));
   	?>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
	Dropzone.autoDiscover = false;
	$(function () {
		var file_names = [];
	    $("div#imageUpload").dropzone({
	        url: base_path+'/post-document-upload',
	        paramName: 'file',
	        uploadMultiple: true,
	        autoProcessQueue: true,
	        timeout:600000, //10 min
	        acceptedFiles: '<?php echo e($accepted_files, false); ?>',
	        maxFiles: 4,
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        success: function(file, response) {
	            if (response.success) {
	                toastr.success(response.msg);
	                file_names.push(response.file_name);
	                $('input#images').val(JSON.stringify(file_names));
	            } else {
	                toastr.error(response.msg);
	            }
	        },
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Repair/Providers/../Resources/views/job_sheet/upload_doc.blade.php ENDPATH**/ ?>