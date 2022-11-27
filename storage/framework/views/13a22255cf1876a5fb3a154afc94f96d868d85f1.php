```javascript
const url = new URL(
    "<?php echo e(rtrim($baseUrl, '/'), false); ?>/<?php echo e(ltrim($route['boundUri'], '/'), false); ?>"
);
<?php if(count($route['cleanQueryParameters'])): ?>

let params = <?php echo \Mpociot\ApiDoc\Tools\Utils::printQueryParamsAsKeyValue($route['cleanQueryParameters'], "\"", ":", 4, "{}"); ?>;
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));
<?php endif; ?>

<?php if(!empty($route['headers'])): ?>
let headers = {
<?php $__currentLoopData = $route['headers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    "<?php echo e($header, false); ?>": "<?php echo e($value, false); ?>",
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(!array_key_exists('Accept', $route['headers'])): ?>
    "Accept": "application/json",
<?php endif; ?>
<?php if(!array_key_exists('Content-Type', $route['headers'])): ?>
    "Content-Type": "application/json",
<?php endif; ?>
};
<?php endif; ?>
<?php if(count($route['cleanBodyParameters'])): ?>

let body = <?php echo json_encode($route['cleanBodyParameters'], JSON_PRETTY_PRINT); ?>

<?php endif; ?>

fetch(url, {
    method: "<?php echo e($route['methods'][0], false); ?>",
<?php if(count($route['headers'])): ?>
    headers: headers,
<?php endif; ?>
<?php if(count($route['bodyParameters'])): ?>
    body: body
<?php endif; ?>
})
    .then(response => response.json())
    .then(json => console.log(json));
```
<?php /**PATH /home/u997099361/domains/nacionalcode.org/public_html/possaas/vendor/mpociot/laravel-apidoc-generator/src/../resources/views//partials/example-requests/javascript.blade.php ENDPATH**/ ?>