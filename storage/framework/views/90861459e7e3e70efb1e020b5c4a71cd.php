

<?php $__env->startSection('content'); ?>

    <div class="list-section pt-80 pb-80"> 
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="content">
                            <h3>شحن لجميع المحافظات</h3>
                            <p>سعر الشحن علي حسب المحافظة</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>دعم طوال الاسبوع</h3>
                            <p>خدمة دعم طوال اليوم</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="content">
                            <h3>سياسة الاسترجاع</h3>
                            <p>يمكن الاسترجاع خلال اسبوع من الشراء</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php if($products->isempty()): ?>
    <div class="full-height-section error-section">
        <div class="full-height-tablecell">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="error-text">
                            <i class="fas fa-search" aria-hidden="true"></i>
                            <h1>لم تم اضافة منتجات لهذا القسم بعد</h1>
                            <a href="<?php echo e(route('home.index')); ?>" class="boxed-btn">العودة للصفحة الرئيسية</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php else: ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3>منتجاتنا</h3>
                    <p>كل ما تبحث عنه وأكثر، تجده هنا بأفضل الأسعار وأحسن العروض</p>
                </div>
            </div>
        </div>
       

        <div class="row">
             
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="<?php echo e(route("singleProduct.index",$product)); ?>"><img src= "<?php echo e(url($product -> imagepath)); ?>",
                                height="300",
                            ></a>
                        </div>
                        <h3><?php echo e($product -> name); ?></h3>
                        <p class="product-price"> <?php echo e(number_format($product -> price)); ?>LE </p>
                        <a href="<?php echo e(route("singleProduct.index",$product)); ?>" class="boxed-btn">شراء المنتج</a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
        </div>
    </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>



<style>
    .animate-fade {
        opacity: 1;
        transition: opacity 0.5s ease-in-out;
    }

    .animate-fade.fade-out {
        opacity: 0;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.getElementById('success-alert');
        if(alert){
            setTimeout(() => {
                alert.classList.add('fade-out');
            }, 3000); // تبدأ تختفي بعد 3 ثواني

            setTimeout(() => {
                alert.remove(); // تشيل العنصر خالص بعد كده
            }, 4000); // بعد ثانية من بدا الاختفاء
        }
    });
</script>
<?php echo $__env->make('Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\E-commerce app\E-commerce-app\resources\views/products.blade.php ENDPATH**/ ?>