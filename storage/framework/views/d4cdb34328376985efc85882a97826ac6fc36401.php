<section class="no-print">
    <nav class="navbar navbar-default bg-white m-4">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo e(action('\Modules\Essentials\Http\Controllers\ToDoController@index'), false); ?>"><i class="fas fa-check-circle"></i> <?php echo e(__('essentials::lang.essentials'), false); ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php if(request()->segment(2) == 'todo'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\ToDoController@index'), false); ?>"><?php echo app('translator')->getFromJson('essentials::lang.todo'); ?></a></li>

                    <li <?php if(request()->segment(2) == 'document' && request()->get('type') != 'memos'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\DocumentController@index'), false); ?>"><?php echo app('translator')->getFromJson('essentials::lang.document'); ?></a></li>

                    <li <?php if(request()->segment(2) == 'document' && request()->get('type') == 'memos'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\DocumentController@index') .'?type=memos', false); ?>"><?php echo app('translator')->getFromJson('essentials::lang.memos'); ?></a></li>

                    <li <?php if(request()->segment(2) == 'reminder'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\ReminderController@index'), false); ?>"><?php echo app('translator')->getFromJson('essentials::lang.reminders'); ?></a></li>
                    <?php if(auth()->user()->can('essentials.view_message') || auth()->user()->can('essentials.create_message')): ?>
                        <li <?php if(request()->segment(2) == 'messages'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\EssentialsMessageController@index'), false); ?>"><?php echo app('translator')->getFromJson('essentials::lang.messages'); ?></a></li>
                    <?php endif; ?>
                    <li <?php if(request()->segment(2) == 'knowledge-base'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\KnowledgeBaseController@index'), false); ?>"><?php echo app('translator')->getFromJson('essentials::lang.knowledge_base'); ?></a></li>
                    <?php if(auth()->user()->can('edit_essentials_settings')): ?>
                        <li <?php if(request()->segment(2) == 'hrm' && request()->segment(2) == 'settings'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\EssentialsSettingsController@edit'), false); ?>"><?php echo app('translator')->getFromJson('business.settings'); ?></a></li>
                    <?php endif; ?>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Essentials/Providers/../Resources/views/layouts/nav_essentials.blade.php ENDPATH**/ ?>