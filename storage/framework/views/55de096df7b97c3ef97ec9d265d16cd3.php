

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-center" style="margin-top: 80px; margin-bottom: 200px;">
    <div class="col-lg-5"> 
        <div class="form-title text-center mb-4">
            <h2>Login</h2>
        </div>
        <div id="form_status"></div>
        <div class="contact-form">
            <form action="<?php echo e(route('login')); ?>" method="POST" id="fruitkha-contact" onsubmit="return valid_datas(this);">
                <?php echo csrf_field(); ?>
                <?php if(!empty($product)): ?>
                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                <?php endif; ?>
                <div class="form-group mb-3">
                    <input type="email" class="form-control allow-select custom-input" placeholder="Email" name="email" id="email" value="<?php echo e(old('email')); ?>" required >
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group mb-3">
                    <input type="password" class="form-control allow-select custom-input" placeholder="Password" name="password" id="password" required >
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <p>doesn't have an account? <a href="<?php echo e(route('register.index')); ?>" style="color:#3180a5">Register now</a></p>

                <div class="text-center">
                    <input type="submit" class="btn btn-primary px-4" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .custom-input {
        height: 50px; 
        font-size: 16px;
    }

    .col-lg-5 {
        max-width: 500px; 
    }

    .text-danger {
        font-size: 12px;
        margin-top: 5px;
    }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\E-commerce app\E-commerce-app\resources\views/auth/login.blade.php ENDPATH**/ ?>