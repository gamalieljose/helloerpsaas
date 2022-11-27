<?php
    $is_cat_code_enabled = isset($module_category_data['enable_taxonomy_code']) && !$module_category_data['enable_taxonomy_code'] ? false : true;
?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category.create')): ?>
	<button type="button" class="btn btn-sm pull-right btn-primary btn-modal" data-href="<?php echo e(action('TaxonomyController@create'), false); ?>?type=<?php echo e($category_type, false); ?>" data-container=".category_modal">
		<i class="fa fa-plus"></i>
		<?php echo app('translator')->getFromJson( 'messages.add' ); ?>
	</button>
	<br><br>
<?php endif; ?>

 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category.view')): ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="category_table" style="width: 100%;">
            <thead>
                <tr>
                    <th><?php if(!empty($module_category_data['taxonomy_label'])): ?> <?php echo e($module_category_data['taxonomy_label'], false); ?> <?php else: ?> <?php echo app('translator')->getFromJson( 'category.category' ); ?> <?php endif; ?></th>
                    <?php if($is_cat_code_enabled): ?>
                        <th><?php echo e($module_category_data['taxonomy_code_label'] ?? __( 'category.code' ), false); ?></th>
                    <?php endif; ?>
                    <th><?php echo app('translator')->getFromJson( 'lang_v1.description' ); ?></th>
                    <th><?php echo app('translator')->getFromJson( 'messages.action' ); ?></th>
                </tr>
            </thead>
        </table>
    </div>
<?php endif; ?>

<div class="modal fade category_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
</div><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/resources/views/taxonomy/ajax_index.blade.php ENDPATH**/ ?>