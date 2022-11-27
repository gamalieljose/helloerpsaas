<button type="button" class="btn btn-sm btn-primary btn-modal pull-right" 
    data-href="<?php echo e(action('\Modules\Repair\Http\Controllers\RepairStatusController@create'), false); ?>" 
    data-container=".view_modal">
    <i class="fa fa-plus"></i>
    <?php echo app('translator')->getFromJson( 'messages.add' ); ?>
</button>
<br><br>
<table class="table table-bordered table-striped" id="status_table" style="width: 100%">
    <thead>
    <tr>
        <th><?php echo app('translator')->getFromJson( 'repair::lang.status_name' ); ?></th>
        <th><?php echo app('translator')->getFromJson( 'repair::lang.color' ); ?></th>
        <th><?php echo app('translator')->getFromJson( 'repair::lang.sort_order' ); ?></th>
        <th><?php echo app('translator')->getFromJson( 'messages.action' ); ?></th>
    </tr>
    </thead>
</table>
<div class="modal fade brands_modal" tabindex="-1" role="dialog" 
aria-labelledby="gridSystemModalLabel">
</div><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Repair/Providers/../Resources/views/status/index.blade.php ENDPATH**/ ?>