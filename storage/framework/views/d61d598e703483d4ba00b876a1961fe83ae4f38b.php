<!-- Post -->
<div class="post msg-box" style="margin-left: 15px; margin-right: 15px;" data-delivered-at="<?php echo e($message->created_at, false); ?>">
  	<div class="user-block">
        <span class="username" style="margin-left: 0;">
          <span class="text-primary"><?php echo e($message->sender->user_full_name, false); ?></span>
          <?php if($message->user_id == auth()->user()->id): ?>
          	<a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\EssentialsMessageController@destroy', [$message->id]), false); ?>" class="pull-right btn-box-tool chat-delete" title="<?php echo app('translator')->getFromJson('messages.delete'); ?>"><i class="fa fa-times text-danger"></i></a>
          <?php endif; ?>
        </span>
    	<span class="description" style="margin-left: 0;"><small><i class="fas fa-clock"></i> <?php echo e($message->created_at->diffForHumans(), false); ?></small></span>
  	</div>
  	<!-- /.user-block -->
  	<p>
    	<?php echo strip_tags($message->message, '<br>'); ?>

  	</p>
</div>
<!-- /.post --><?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/pos1/Modules/Essentials/Providers/../Resources/views/messages/message_div.blade.php ENDPATH**/ ?>