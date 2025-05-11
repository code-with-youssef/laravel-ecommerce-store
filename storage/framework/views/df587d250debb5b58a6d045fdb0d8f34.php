

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-center" style="margin-top: 80px; margin-bottom: 200px;">
    <div class="col-lg-5"> 
        <div class="form-title text-center mb-4">
            <h2>انشاء حساب</h2>
        </div>
        <div id="form_status"></div>
        <div class="contact-form">
            <form action="<?php echo e(route('register')); ?>" method="POST" id="fruitkha-contact" onsubmit="return valid_datas(this);">
                <?php echo csrf_field(); ?>

                <div class="form-group mb-3">
                    <input type="text" class="form-control allow-select custom-input" placeholder="الاسم" name="name" id="name" value="<?php echo e(old('name')); ?>" required>
                    <?php $__errorArgs = ['name'];
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
                    <input type="email" class="form-control allow-select custom-input" placeholder="البريد الالكتروني" name="email" id="email" value="<?php echo e(old('email')); ?>" required>
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
                    <input type="password" class="form-control allow-select custom-input" placeholder="كلمة المرور" name="password" id="password" required>
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

                <div class="form-group mb-4">
                    <input type="password" class="form-control allow-select custom-input" placeholder="تأكيد كلمة المرور" name="password_confirmation" id="password_confirmation" required>
                    <?php $__errorArgs = ['password_confirmation'];
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

                <p>لديك حساب بالفعل؟ <a href="<?php echo e(route('login.index')); ?>" style="color:#3180a5">تسجيل دخول</a></p>


                <div class="text-center">
                    <input type="submit" class="btn btn-primary px-4" value="انشاء حساب">
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

<?php echo $__env->make('Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\E-commerce app\E-commerce-app\resources\views/auth/signup.blade.php ENDPATH**/ ?>