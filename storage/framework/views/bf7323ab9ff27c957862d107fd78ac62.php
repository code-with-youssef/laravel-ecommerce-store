

<?php $__env->startSection('title', 'Categories'); ?>

<?php $__env->startSection('breadcrumb'); ?>


<?php $__env->startSection('content'); ?>
    
    <div class="card mb-4">


        <form class="d-flex align-items-center mb-4" action="<?php echo e(route('searchCategories')); ?>" method="GET" autocomplete="off" dir="rtl">
            <div class="input-group">
                <input type="search" 
                    name="query" 
                    placeholder="البحث" 
                    class="form-control border-end-0"
                    aria-label="Search categories">
                <button type="submit" class="btn btn-outline-secondary border-end-0 bg-white">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </div>
        </form>



        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">قائمة الاقسام</h3>
            <a href="<?php echo e(route('adminCategories.create')); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-2"></i> اضافة قسم
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الصورة</th>
                            <th>الاسم</th>
                            <th>عدد المنتجات</th>
                            <th>تاريخ الانشاء</th>
                            <th>التعديلات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><img src="<?php echo e(url($category->imagepath)); ?>" style="max-width: 150px; max-height:150px"></td>
                                <td><?php echo e($category->name); ?></td>
                                <td>
                                    <span class="badge bg-" style="color: black">
                                      <?php echo e($category->products()->count()); ?>

                                    </span>
                                </td>
                                <td><?php echo e($category->created_at->format('d M Y')); ?></td>
                                <td class="action-btns">
                                    <a href="<?php echo e(route('adminCategories.edit',$category)); ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> تعديل
                                    </a>
                                    <form action="<?php echo e(route('adminCategories.destroy',$category)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i> مسح 
                                        </button>
                                    </form>
                                    <a href="<?php echo e(route('adminProductsIndex',$category)); ?>" class="btn btn-primary btn-sm" style="margin-top: 20px;">
                                        <i class="fas fa-box-open"></i> الذهاب لقائمة المنتجات
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center">No categories found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\E-commerce app\E-commerce-app\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>