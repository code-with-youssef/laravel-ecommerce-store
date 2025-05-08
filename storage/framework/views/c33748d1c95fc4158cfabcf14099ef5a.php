

<?php $__env->startSection('title', 'products'); ?>

<?php $__env->startSection('breadcrumb'); ?>


<?php $__env->startSection('content'); ?>
    
    <div class="card mb-4">
        <form class="d-flex align-items-center mb-4" action="<?php echo e(route('searchProducts')); ?>" method="GET" autocomplete="off" dir="rtl">
            <div class="input-group">
                <input type="search" 
                    name="query" 
                    placeholder="البحث" 
                    class="form-control border-end-0"
                    aria-label="Search products">
                <input type="hidden" name="category" value="<?php echo e($category->id); ?>">
                <button type="submit" class="btn btn-outline-secondary border-end-0 bg-white">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </div>
        </form>



        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0"> قائمة المنتجات قسم (<?php echo e($category->name); ?>)</h3>
            <a href="<?php echo e(route('createProduct',$category)); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-2"></i>اضافة منتج للقسم
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
                            <th>السعر</th>
                            <th>الوصف</th>
                            <th>الكمية</th>
                            <th>تاريخ الانشاء</th>
                            <th>التعديلات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><img src="<?php echo e(url($product->imagepath)); ?>" style="max-width: 150px; max-height:150px"></td>
                                <td><?php echo e($product->name); ?></td>
                                <td><?php echo e($product->price); ?></td>
                                <td><?php echo e($product->description); ?></td>
                                <td>
                                    <span class="badge bg-" style="color: black">
                                      <?php echo e($product->quantity); ?>

                                    </span>
                                </td>
                                <td><?php echo e($product->created_at->format('d M Y')); ?></td>
                                <td class="action-btns">
                                    <a href="<?php echo e(route('adminProducts.edit',$product)); ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> تعديل
                                    </a>
                                    <form action="<?php echo e(route('adminProducts.destroy',$product)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i> مسح 
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="8" class="text-center">No products found
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\E-commerce app\E-commerce-app\resources\views/admin/products/index.blade.php ENDPATH**/ ?>