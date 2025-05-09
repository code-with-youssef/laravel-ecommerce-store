

<?php $__env->startSection('title', 'orders'); ?>

<?php $__env->startSection('breadcrumb'); ?>


<?php $__env->startSection('content'); ?>
    
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0"> قائمة الطلبات</h3>
        </div>
        <div class="card-body">
            <?php if(session('message')): ?>
                <div class="alert alert-info animate-fade" id="myAlert">
                    <?php echo e(session('message')); ?>

                    <button onclick="document.getElementById('myAlert').style.display='none'" style="background:none; border:none; float:right; font-size:20px;">&times;</button>
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th class="order-id">الرقم التعريفي</th>
                            <th>حالة الطلب</th>
                            <th>تعديل الطلب</th>
                            <th class="order-price">المبلغ المطلوب</th>
                            <th class="order-payment-method">طريقة الدفع</th>
                            <th class="email">البريد الالكتروني</th>
                            <th class="phone-number">رقم التليفون</th>
                            <th class="order-content">محتوي الطلب</th>
                        </tr>
                    </thead>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tbody>
                            <tr class="table-body-row">
                                <td class="order-id"><?php echo e($order->order_id); ?></td>
                                <td>
                                    <span class="
                                        <?php if($order->status == 'جاري التوصيل'): ?> text-warning
                                        <?php elseif($order->status == 'تم التوصيل'): ?> text-success
                                        <?php elseif($order->status == 'ملغي'): ?> text-danger
                                        <?php endif; ?>
                                    ">
                                        <?php echo e($order->status); ?>

                                    </span>
                                </td>
                                <?php if($order->status === 'تم التوصيل'): ?>
                                    <td>لا توجد تعديلات</td>
                                <?php elseif($order->status === 'ملغي'): ?>
                                    <td>
                                        <form action="<?php echo e(route('adminOrders.update',$order)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <input type="hidden" name="status" value="جاري التوصيل">
                                            <button class="btn btn-sm btn-success" style="width: 100px;">اعادة الطلب</button>
                                        </form>
                                    </td>
                                <?php else: ?>
                                    <td>
                                        <form action="<?php echo e(route('adminOrders.update',$order)); ?>" method="POST" class="d-outline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <input type="hidden" name="status" value="تم التوصيل">
                                            <button class="btn btn-sm btn-success" style="width: 100px;">تم التوصيل</button>
                                        </form>
                    
                                        <form action="<?php echo e(route('adminOrders.update',$order)); ?>" method="POST" class="d-outline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <input type="hidden" name="status" value="ملغي">
                                            <button class="btn btn-sm btn-danger" style="width: 100px">إلغاء</button>
                                        </form>
                                    </td>
                                <?php endif; ?>
                                <td class="order-price"><?php echo e($order->total_amount); ?></td>
                                <td class="order-payment-method"><?php echo e($order->payment_method); ?></td>
                                <td class="email"><?php echo e($order->email); ?></td>
                                <td class="phone-number"><?php echo e($order->phone); ?></td>
                                <td class="order-content">
                                    <ul>
                                        <?php $__currentLoopData = $order->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($item['product_name']); ?> × <?php echo e($item['quantity']); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<style>
    
    
    /* General table styling */
    table {
        width: 100%;
      
        /* Optional: Limits table width for better control */
        border-collapse: collapse;
        font-family: 'Arial', sans-serif;
        direction: rtl;
        /* Right-to-left for Arabic */
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        margin: 50px auto;
       
        /* Centers the table horizontally */
        display: table;
        /* Ensures table behaves correctly */
    }

    /* Table header styling */
    thead tr {
        background-color: #050505;
        /* Dark blue header */
        color: #ffffff;
        text-align:right;
    }

    thead th {
        padding: 15px;
        font-size: 25px;
        font-weight: 600;
        border-bottom: 2px solid #fbfdff;
    }

    /* Table body styling */
    tbody tr {
        border-bottom: 1px solid #e0e0e0;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
        /* Light gray for alternating rows */
    }

    tbody tr:hover {
        background-color: #ecf0f1;
        /* Light hover effect */
        transition: background-color 0.3s ease;
    }

    tbody td {
        padding: 20px 15px;
        font-size: 18px;
        color: #333;
        text-align: right;
        
    }


    /* Specific column styling */
    .order-id,
    .order-price,
    .order-payment-method,
    .phone-number {
        font-weight: 500;
    }

    .order-status {
        color: #f5b60b;
        /* Orange for status */
    }

    .email {
        color: #2980b9;
        /* Blue for email */
    }

    /* Styling for order content list */
    .order-content ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .order-content li {
        padding: 5px 0;
        font-size: 18px;
        font-weight: 600;
        color: #555;
    }

    /* Responsive design for smaller screens */
    @media (max-width: 768px) {
        table {
            font-size: 14px;
        }

        thead th,
        tbody td {
            padding: 10px;
            font-size: 12px;
        }

        .order-content li {
            font-size: 11px;
        }
    }

    /* Ensure table is scrollable on very small screens */
    @media (max-width: 576px) {
        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    }
</style>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\E-commerce app\E-commerce-app\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>