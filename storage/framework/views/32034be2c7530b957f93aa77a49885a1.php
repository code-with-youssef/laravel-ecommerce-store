

<?php $__env->startSection("content"); ?>
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <h2 class="text-center mb-5">مراجعة الطلب وإكمال عملية الشراء</h2>
        <div class="row">
            <!-- Products Table-->
            <div class="col-lg-8 col-md-12 mb-5">
                <div class="order-summary">
                    <h4 class="mb-4">محتويات السلة</h4>
                    <table class="table table-bordered text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>اسم المنتج</th>
                                <th>السعر</th>
                                <th>الكمية</th>
                                <th>الإجمالي</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $userCart->cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($cartItem->product->name); ?></td>
                                    <td><?php echo e(number_format($cartItem->product->price, 2)); ?> LE</td>
                                    <td><?php echo e($cartItem->quantity); ?></td>
                                    <td><?php echo e(number_format($cartItem->product->price * $cartItem->quantity, 2)); ?> LE</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">السعر الكلي بدون شحن</th>
                                <th><?php echo e(number_format($total, 2)); ?> LE</th>
                            </tr>
                            <tr>
                                <th colspan="3">سعر الشحن</th>
                                <th>45.00 LE</th>
                            </tr>
                            <tr>
                                <th colspan="3">السعر الكلي شامل الشحن</th>
                                <th><?php echo e(number_format($total + 45, 2)); ?> LE</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Information Form  -->

            <div class="col-lg-4 col-md-12">
                <div class="checkout-form">
                    <h4 class="mb-4">معلومات الشحن والدفع</h4>
                    
                    <form 
                    action="<?php echo e(route('payment.process')); ?>" 
                    method="POST" 
                    id="checkoutForm" 
                    data-cod-action="<?php echo e(route('order.add')); ?>" 
                    data-credit-action="<?php echo e(route('payment.process')); ?>"
                    >
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="amount" name="amount" value='<?php echo e($total); ?>'>
                        <input type="hidden" id="user_id" name="user_id" value='<?php echo e($currentUser->id); ?>'>
                    
                        <div class="form-group mb-3">
                            <label for="name">الاسم الاول</label>
                            <input type="text" class="form-control" id="name" name="first_name" placeholder="ادخل اسمك" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">الاسم الثاني</label>
                            <input type="text" class="form-control" id="name" name="last_name" placeholder="ادخل اسمك" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="phone">رقم الهاتف</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="ادخل رقم الهاتف" required>
                        </div>
                        
                    
                        <div class="form-group mb-3">
                            <label for="city">المدينة</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="ادخل اسم المدينة" required>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label for="address">العنوان الكامل</label>
                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="ادخل عنوانك بالتفصيل" required></textarea>
                        </div>
                        
                        
                        <div class="form-group mb-4">
                            <label>طريقة الدفع</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cash_on_delivery" checked>
                                <label class="form-check-label" for="cod">
                                    الدفع عند الاستلام
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="credit_card" value="credit_card">
                                <label class="form-check-label" for="credit_card">
                                    بطاقة ائتمانية
                                </label>
                            </div>
                        </div>
                        
                
                        
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">
                                أوافق على <a href="#">الشروط والأحكام</a>
                            </label>
                        </div>
                        
                        <input type="submit" value="تأكيد الطلب"></input>
                    </form>
                </div>
            </div>






            
            
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkoutForm = document.getElementById('checkoutForm');

        checkoutForm.addEventListener('submit', function(e) {
            const selectedMethod = document.querySelector('input[name="payment_method"]:checked').value;

            if (selectedMethod === 'cash_on_delivery') {
                checkoutForm.action = checkoutForm.dataset.codAction;
                
            } else {
                checkoutForm.action = checkoutForm.dataset.creditAction;
                
            }
        });
    });
</script>
<?php echo $__env->make('Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\E-commerce app\E-commerce-app\resources\views/checkout.blade.php ENDPATH**/ ?>