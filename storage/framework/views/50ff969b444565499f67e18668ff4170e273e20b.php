
<?php $__env->startSection('title', __('project::lang.project_report')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('project::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="content-header">
	<h1>
    	<?php echo app('translator')->getFromJson('project::lang.project_report'); ?>
    </h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-4">
			<div class="box box-solid">
				<div class="box-body text-center">
					<i class="fas fa-hourglass-half fs-20"></i> <br>
					<span class="fs-20">
						<?php echo app('translator')->getFromJson('project::lang.time_log_report'); ?> <br>
						<small><?php echo app('translator')->getFromJson('project::lang.by_employees'); ?></small>
					</span>
				</div>
				<div class="box-footer text-center">
					<a href="<?php echo e(action('\Modules\Project\Http\Controllers\ReportController@getEmployeeTimeLogReport'), false); ?>" class="btn btn-block bg-navy btn-flat">
						<i class="fa fa-eye"></i>
						<?php echo app('translator')->getFromJson("messages.view"); ?>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-solid">
				<div class="box-body text-center">
					<i class="fas fa-hourglass-half fs-20"></i> <br>
					<span class="fs-20">
						<?php echo app('translator')->getFromJson('project::lang.time_log_report'); ?> <br>
						<small><?php echo app('translator')->getFromJson('project::lang.by_projects'); ?></small>
					</span>
				</div>
				<div class="box-footer text-center">
					<a href="<?php echo e(action('\Modules\Project\Http\Controllers\ReportController@getProjectTimeLogReport'), false); ?>" class="btn btn-block bg-navy btn-flat">
						<i class="fa fa-eye"></i>
						<?php echo app('translator')->getFromJson("messages.view"); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
<link rel="stylesheet" href="<?php echo e(asset('modules/project/sass/project.css?v=' . $asset_v), false); ?>">
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Project/Providers/../Resources/views/reports/index.blade.php ENDPATH**/ ?>