<?php $__env->startComponent('mail::message'); ?>
    # Order Notification

    Hello <?php echo e($name); ?>,

    Order ID : <?php echo e($orderId); ?>

    <?php echo e($message); ?>


    Thanks,
    <?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/rytwaydigital/public_html/resources/views/emails/order.blade.php ENDPATH**/ ?>