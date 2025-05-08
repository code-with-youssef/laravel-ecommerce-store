

<?php $__env->startSection('content'); ?>
    <div class="card mb-4">
        <div class="card-header">
            <h3>(<?php echo e($product->name); ?>) تعديل المنتج</h3>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('adminProducts.update', $product)); ?>" method="POST" enctype="multipart/form-data"
                id="fileForm">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">
                    <label for="category" class="form-label">التصنيف <span class="text-danger">*</span></label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="<?php echo e($product->category->id); ?>"><?php echo e($product->category->name); ?></option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($category->name != $product->category->name): ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>



                <div class="mb-3">
                    <label for="name" class="form-label">الاسم <span class="text-danger">*</span></label>
                    <input type="text" class="form-control allow-select" id="name" name="name"
                        value="<?php echo e(old('name', $product->name ?? '')); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">الوصف<span class="text-danger">*</span></label>
                    <input type="text" class="form-control allow-select" id="description" name="description"
                    value="<?php echo e(old('name', $product->name ?? '')); ?>"   required>
                </div>


                <div class="mb-3">
                    <label for="name" class="form-label">سعر المنتج<span class="text-danger">*</span></label>
                    <input type="text" class="form-control allow-select" id="price" name="price"
                    value="<?php echo e(old('price', $product->price ?? '')); ?>"  required>
                </div>


                <div class="mb-3">
                    <label for="name" class="form-label">الكمية<span class="text-danger">*</span></label>
                    <input type="text" class="form-control allow-select" id="quantity" name="quantity"
                    value="<?php echo e(old('quantity', $product->quantity ?? '')); ?>"  required>
                </div>

                <label for="name" class="form-label">تعديل الصورة<span class="text-danger">*</span></label>
                <div class="mb-2">
                    <img src="<?php echo e(url($product->imagepath)); ?>" id="currentImage"
                        style="max-width: 150px; max-height:150px;">
                    <input type="file" name="image" id="fileInput">
                </div>


                <div class="d-flex justify-content-end">
                    <a href="<?php echo e(route('adminProductsIndex',$product->category)); ?>" class="btn btn-secondary me-2">الغاء</a>
                    <button type="submit" class="btn btn-primary">
                        تحديث
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0]; 
            if (file) {
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('currentImage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>

<?php echo $__env->make('Layouts.Admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\E-commerce app\E-commerce-app\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>