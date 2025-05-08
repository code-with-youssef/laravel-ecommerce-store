
<?php $__env->startSection('content'); ?>

<div class="full-height-section error-section">
    <div class="full-height-tablecell">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="error-text">
                        <i class="far fa-sad-cry" aria-hidden="true"></i> 
                        <h1>لا توجد نتائج تطابق عملية البحث</h1>

                        <a href="<?php echo e(route('home.index')); ?>" class="boxed-btn">العودة للصفحة الرئيسية</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\E-commerce app\E-commerce-app\resources\views/not-Found.blade.php ENDPATH**/ ?>