



<?php $__env->startSection('content'); ?>

    <?php if($currentUser->orders->count() == 0): ?>
        <div style="text-align: center; padding: 60px 20px;">

            <h2 style="margin-top: 20px; color: #000000;">لا يوجد طلبات لديك</h2>
            <a href="<?php echo e(route('products.index')); ?>" class="boxed-btn">تسوق الان</a>
        </div>
    <?php else: ?>{


        <h3 class="text-center mb-5">مراجعة الطلبات</h3>
        <table>
            <thead>
                <tr>
                    <th class="order-id">الرقم التعريفي</th>
                    <th >حالة الطلب</th>
                    <th class="order-price">المبلغ المطلوب</th>
                    <th class="order-payment-method">طريقة الدفع</th>
                    <th class="email">البريد الالكتروني</th>
                    <th class="phone-number">رقم التليفون</th>
                    <th class="order-content">محتوي الطلب</th>
                </tr>
            </thead>
            <?php $__currentLoopData = $currentUser->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tbody>
                    <tr class="table-body-row">
                        <td class="order-id"><?php echo e($order->order_id); ?></td>
                        <td class="order-status"><?php echo e($order->status); ?></td>
                        <td class="order-price"><?php echo e(number_format($order->total_amount)); ?></td>
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

        }
    <?php endif; ?>


<?php $__env->stopSection(); ?>

<style>
    
    
    /* General table styling */
    table {
        width: 100%;
        max-width: 1200px;
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
        background-color: #051922;
        /* Dark blue header */
        color: #ffffff;
        text-align: right;
    }

    thead th {
        padding: 15px;
        font-size: 16px;
        font-weight: 600;
        border-bottom: 2px solid #34495e;
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
        padding: 12px 15px;
        font-size: 14px;
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
        color: #000000;
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
        font-size: 13px;
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

<?php echo $__env->make('Layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\E-commerce app\E-commerce-app\resources\views/orders.blade.php ENDPATH**/ ?>