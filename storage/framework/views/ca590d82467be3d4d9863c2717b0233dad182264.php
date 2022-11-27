```bash
curl -X <?php echo e($route['methods'][0], false); ?> \
    <?php echo e($route['methods'][0] == 'GET' ? '-G ' : '', false); ?>"<?php echo e(rtrim($baseUrl, '/'), false); ?>/<?php echo e(ltrim($route['boundUri'], '/'), false); ?><?php if(count($route['cleanQueryParameters'])): ?>?<?php echo \Mpociot\ApiDoc\Tools\Utils::printQueryParamsAsString($route['cleanQueryParameters']); ?><?php endif; ?>" <?php if(count($route['headers'])): ?>\
<?php $__currentLoopData = $route['headers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    -H "<?php echo e($header, false); ?>: <?php echo e(addslashes($value), false); ?>"<?php if(! ($loop->last) || ($loop->last && count($route['bodyParameters']))): ?> \
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if(count($route['cleanBodyParameters'])): ?>
    -d '<?php echo json_encode($route['cleanBodyParameters']); ?>'
<?php endif; ?>

```
<?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/vendor/mpociot/laravel-apidoc-generator/src/../resources/views//partials/example-requests/bash.blade.php ENDPATH**/ ?>