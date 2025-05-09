

<?php $__env->startSection('content'); ?>


<?php if($userCart->cartItems->count() == 0): ?>
    <div style="text-align: center; padding: 60px 20px;">
        <img src="<?php echo e(asset('assets/img/cart.png')); ?>" alt="Empty Cart" style="max-width: 350px; opacity: 0.7;">
        <h2 style="margin-top: 20px; color: #000000;">عربة التسوق فارغة</h2>
        <a href="<?php echo e(route('products.index')); ?>" class="boxed-btn">تسوق الان</a>
    </div>
<?php else: ?>
    
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-minus"></th>
                                    <th class="product-remove"></th>
                                    <th class="product-image">صورة العنصر</th>
                                    <th class="product-name">اسم العنصر</th>
                                    <th class="product-price">السعر</th>
                                    <th class="product-total">الكمية</th>
                                </tr>
                            </thead>
                            
                            <?php $__currentLoopData = $userCart->cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                    <tr class="table-body-row">
                                        
                                        <td class="product-minus">
                                            <form action="<?php echo e(route('cart_item.update', $cartItem->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>
                                                <button type="submit" class="btn btn-light">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </form>
                                        </td>
                                        
                                        <td class="product-remove">
                                            <form action="<?php echo e(route('cart_item.destroy', $cartItem->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-light">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                        
                                        <td class="product-image">
                                            <img src="<?php echo e(url($cartItem->product->imagepath)); ?>" alt="">
                                        </td>
                                        
                                        <td class="product-name"><?php echo e($cartItem->product->name); ?></td>
                                        
                                        <td class="product-price"><?php echo e($cartItem->product->price); ?> LE</td>
                                        
                                        <td class="product-total"><?php echo e($cartItem->quantity); ?></td>
                                    </tr>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>

                
                <div class="cart-buttons" style="display: inline-block;"> 
                    <a href="<?php echo e(route('checkout.index', $userCart)); ?>" class="boxed-btn">
                        اكمال عملية الشراء
                    </a>
                </div>  
            </div>
        </div>
    </div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\E-commerce app\E-commerce-app\resources\views/cart.blade.php ENDPATH**/ ?>