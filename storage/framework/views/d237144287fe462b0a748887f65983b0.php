<?php $__env->startSection('content'); ?>


	<?php if($categories->isEmpty()): ?>
	<div class="full-height-section error-section">
		<div class="full-height-tablecell">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="error-text">
							<i class="fas fa-search" aria-hidden="true"></i>
							<h1>لا توجد اقسام بعد</h1>
							<a href="<?php echo e(route('home.index')); ?>" class="boxed-btn">العودة للصفحة الرئيسية</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php else: ?>
	<!-- category section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">اقسام </span> الموقع</h3>
						<p>كل ما تحتاجه باقل الاسعار</p>
					</div>
				</div>
			</div>


			<div class="row">
				     
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="<?php echo e(route('products.index', $item -> id)); ?>">
									<img src= "<?php echo e(url($item -> imagepath)); ?>",
										height="300",
									></a>
                            </div>
                            <h3><?php echo e($item -> name); ?></h3>
                        </div>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!-- end category section -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\E-commerce app\E-commerce-app\resources\views/categories.blade.php ENDPATH**/ ?>