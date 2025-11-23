<?php $__env->startComponent('mail::message'); ?>
    # Order Notification

    Order ID : <?php echo e($orderId); ?>

    <?php echo e($message); ?>


    Thanks,
    <?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\paintshop\resources\views/emails/orderGot.blade.php ENDPATH**/ ?>