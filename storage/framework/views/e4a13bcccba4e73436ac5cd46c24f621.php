

<?php $__env->startSection('content'); ?>
    <div class="card mb-4">
        <div class="card-header">
            <h3>تعديل القسم (<?php echo e($category->name); ?>)</h3>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('adminCategories.update', $category)); ?>" method="POST" enctype="multipart/form-data"
                id="fileForm">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="mb-3">
                    <label for="name" class="form-label">الاسم <span class="text-danger">*</span></label>
                    <input type="text" class="form-control allow-select" id="name" name="name"
                        value="<?php echo e(old('name', $category->name ?? '')); ?>" required>
                </div>
                <label for="name" class="form-label">تعديل الصورة<span class="text-danger">*</span></label>
                <div class="mb-2">
                    <img src="<?php echo e(url($category->imagepath)); ?>" id="currentImage"
                        style="max-width: 150px; max-height:150px;">
                    <input type="file" name="image" id="fileInput">
                </div>
                <div class="d-flex justify-content-end">
                    <a href="<?php echo e(route('adminCategories.index')); ?>" class="btn btn-secondary me-2">الغاء</a>
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

<?php echo $__env->make('Layouts.Admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\E-commerce app\E-commerce-app\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>