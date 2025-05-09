

<?php $__env->startSection('content'); ?>
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">

                
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="<?php echo e(url($product->imagepath)); ?>" alt="">
                    </div>
                </div>


                <div class="col-md-7">
                    
                    <?php if(session('success')): ?>
                        <div class="alert alert-success animate-fade" id="myAlert">
                            <?php echo e(session('success')); ?> <a href="<?php echo e(route('cart.index', $currentUser)); ?>"><i
                                    class="fas fa-shopping-cart"></i>الذهاب للعربة</a>
                            <button onclick="document.getElementById('myAlert').style.display='none'"
                                style="background:none; border:none; float:right; font-size:20px;">&times;</button>
                        </div>
                    <?php endif; ?>

                    

                    <?php if(session('failed')): ?>
                        <div class="alert alert-info animate-fade" id="myAlert">
                            <?php echo e(session('failed')); ?>

                            <button onclick="document.getElementById('myAlert').style.display='none'"
                                style="background:none; border:none; float:right; font-size:20px;">&times;</button>
                        </div>
                    <?php endif; ?>

                    

                    <div class="single-product-content">
                        <h3><?php echo e($product->name); ?></h3>
                        <p class="single-product-pricing"> <?php echo e($product->price); ?> LE </p>
                        <p><?php echo e($product->description); ?></p>
                        
                        <div class="single-product-form">
                            
                            <?php if(Auth::check()): ?>
                                <form action="<?php echo e(route('cart_item.store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php if($currentUser->cart): ?>
                                        <input type="hidden" name="cart_id" value="<?php echo e($currentUser->cart->id); ?>">
                                    <?php endif; ?>
                                    <input type="hidden" name="user_id" value="<?php echo e($currentUser->id); ?>">
                                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                    <input type="number" name="quantity" id="quantity" max="<?php echo e($product->quantity); ?>"
                                        min="0" value="<?php echo e($product->quantity > 0 ? 1 : 0); ?>">
                                    <input type="hidden" name="product_quantity" id="quantity"
                                        value="<?php echo e($product->quantity); ?>">


                                    <p><?php echo e($product->quantity); ?> باقي في المخزن</p>
                                    <strong>التصنيف: <a
                                            href="<?php echo e(route('products.index', $product->category)); ?>"><?php echo e($product->category->name); ?></a></strong>

                                    
                                    <?php if($product->quantity >= 1): ?>
                                        <input type="submit" value="أضف الى عربة الشراء">
                                    <?php else: ?>
                                        <p style="color: #051922; font-size: 20px;">هذا المنتج سيتوفر قريبا</p>
                                        <input type="submit" value="أضف الي عربة الشراء" disabled>
                                    <?php endif; ?>
                                </form>





                                
                                
                                
                                
                                <div class="review-container">
                                    <form action="<?php echo e(route('review.store')); ?>" method="POST" id="reviewForm">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="user_id" value="<?php echo e($currentUser->id); ?>">
                                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                        
                                        <div class="form-group rating-container">
                                            <div class="star-rating">
                                                <input type="radio" id="5-stars" name="rating" value="5" />
                                                <label for="5-stars" class="star">&#9733;</label>
                                                <input type="radio" id="4-stars" name="rating" value="4" />
                                                <label for="4-stars" class="star">&#9733;</label>
                                                <input type="radio" id="3-stars" name="rating" value="3" />
                                                <label for="3-stars" class="star">&#9733;</label>
                                                <input type="radio" id="2-stars" name="rating" value="2" />
                                                <label for="2-stars" class="star">&#9733;</label>
                                                <input type="radio" id="1-star" name="rating" value="1" />
                                                <label for="1-star" class="star">&#9733;</label>
                                            </div>
                                            <span class="rating-label">:التقييم</span>
                                        </div>
                                        
                                        <div id="hiddenContent" class="hidden-content">
                                            <div class="form-group">
                                                <textarea name="comment" id="comment" placeholder="اكتب تعليقك هنا..." required class="allow-select"></textarea>
                                            </div>

                                            <input type="submit" value="إرسال التقييم">
                                        </div>
                                    </form>
                                </div>
                                
                                
                                

                                
                            <?php else: ?>
                                <p style="color: #051922; font-size: 20px;">لإتمام عملية الشراء يجب تسجيل الدخول</p>
                                <a href="<?php echo e(route('login.index')); ?>" class="boxed-btn"
                                    style="color:black; font-size:15px; font-weight:bold">سجل الان</a>
                            <?php endif; ?>
                        </div>

                        
                        <h4>:مشاركة المنتجات</h4>
                        <ul class="product-share">
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonail-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <h3>مراجعات العنصر</h3>
                    <?php if($product->reviews->isEmpty()): ?>
                        <h6>لا توجد مراجعات</h6>


                    <?php elseif($product->reviews->count() === 1): ?>
                        <?php $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="<?php echo e(url($review->user->imagepath)); ?>" alt="">
                                </div>
                                <div class="client-meta">
                                    <h3><?php echo e($review->user->name); ?></h3>
                                    <?php for($i = 0; $i < $review->stars; $i++): ?>
                                        <label for="5-stars" class="star">&#9733;</label>
                                    <?php endfor; ?>
                                    <p class="testimonial-body">
                                        <?php echo e("$review->comment"); ?>

                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <div class="testimonial-sliders owl-carousel">
                        <!-- Foreach loop will go here -->
                        <?php $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="<?php echo e(url($review->user->imagepath)); ?>" alt="">
                                </div>
                                <div class="client-meta">
                                    <h3><?php echo e($review->user->name); ?></h3>
                                    <?php for($i = 0; $i < $review->stars; $i++): ?>
                                        <label for="5-stars" class="star">&#9733;</label>
                                    <?php endfor; ?>
                                    <p class="testimonial-body">
                                        <?php echo e("$review->comment"); ?>

                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ratingInputs = document.querySelectorAll('input[name="rating"]');
        const hiddenContent = document.getElementById('hiddenContent');

        ratingInputs.forEach(input => {
            input.addEventListener('click', function() {
                hiddenContent.style.display = 'block';
            });
        });
    });
</script>

<?php echo $__env->make('Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\E-commerce app\E-commerce-app\resources\views/singleproduct.blade.php ENDPATH**/ ?>