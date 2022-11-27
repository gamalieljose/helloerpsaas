<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="direct-chat-msg">
        <div class="direct-chat-info clearfix">
            <span class="direct-chat-name pull-left">
                <?php echo e($comment->commentedBy->user_full_name, false); ?>

            </span>
            <span class="direct-chat-timestamp pull-right">
                <?php echo e(\Carbon::createFromTimestamp(strtotime($comment->created_at))->format(session('business.date_format') . ' ' . 'H:i'), false); ?>

            </span>
        </div>
        <!-- /.direct-chat-info -->
        <img class="direct-chat-img" src="https://ui-avatars.com/api/?name=<?php echo e($comment->commentedBy->first_name, false); ?>">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
            <?php echo $comment->comment; ?>

            <?php if(Auth::user()->id == $comment->commented_by): ?>
                <i class="delete-task-comment fa fa-trash pull-right text-danger cursor-pointer mt-5" data-comment_id="<?php echo e($comment->id, false); ?>" data-task_id="<?php echo e($comment->project_task_id, false); ?>"></i>
            <?php endif; ?>
            <?php if($comment->media->count() > 0): ?>
                <br><br>
                <?php $__currentLoopData = $comment->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($media->display_url, false); ?>" download="<?php echo e($media->display_name, false); ?>">
                        <i class="fa fa-download"></i>
                        <?php echo e($media->display_name, false); ?>

                    </a> &nbsp;&nbsp;
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    <!-- /.direct-chat-text -->
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/Modules/Project/Providers/../Resources/views/task/partials/comment.blade.php ENDPATH**/ ?>