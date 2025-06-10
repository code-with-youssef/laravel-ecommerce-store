<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - <?php echo $__env->yieldContent('title'); ?></title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        * {
            caret-color: transparent;
            /* يخفي مؤشر الكتابة */
            user-select: none;
            /* يمنع تحديد النص */
        }

        .allow-select {
            user-select: text !important;
            caret-color: auto !important;
        }

        :root {
            --sidebar-width: 250px;
            --header-height: 60px;
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fc;
        }

        /* Sidebar Overlay for mobile */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.show {
            display: block;
            opacity: 1;
        }

        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            background: linear-gradient(180deg, var(--primary-color) 10%, #224abe 100%);
            color: white;
            transition: transform 0.3s ease;
            z-index: 1000;
            top: 0;
            left: 0;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: rgba(0, 0, 0, 0.1);
        }

        #sidebar ul.components {
            padding: 20px 0;
        }

        #sidebar ul li a {
            padding: 10px 20px;
            color: rgba(255, 255, 255, 0.8);
            display: block;
            text-decoration: none;
            transition: all 0.3s;
        }

        #sidebar ul li a:hover {
            color: white;
            background: rgba(0, 0, 0, 0.1);
        }

        #sidebar ul li.active>a {
            color: white;
            background: rgba(0, 0, 0, 0.2);
        }

        #content {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            min-height: 100vh;
            transition: margin-left 0.3s ease, width 0.3s ease;
        }

        .navbar {
            height: var(--header-height);
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .card {
            border: none;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        }
        
        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            font-weight: 600;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .table th {
            border-top: none;
            font-weight: 600;
            color: #4e73df;
            text-align: center;
            vertical-align: middle;
        }

        .action-btns .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
      
        .table td {
            font-size: 20px;
            padding-bottom: 15px;
            padding-top: 15px;
            width: 150px;
            height: 150px;
            text-align: center;
            vertical-align: middle;
        }

        /* RTL Search Form Styles */
        .search-form .form-control {
            padding: 0.5rem 1rem;
            border-radius: 0 0.35rem 0.35rem 0;
            border-left: none;
            box-shadow: none;
            text-align: right;
        }

        .search-form .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.35rem 0 0 0.35rem;
            border-right: none;
            transition: all 0.3s;
        }

        .search-form .btn:hover {
            background-color: #f8f9fa;
            color: #4e73df;
        }

        .search-form .form-control:focus {
            border-color: #ced4da;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }

        /* RTL General Adjustments */
        body[dir="rtl"] {
            text-align: right;
        }

        body[dir="rtl"] .input-group>.form-control {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            border-top-right-radius: 0.35rem;
            border-bottom-right-radius: 0.35rem;
        }

        body[dir="rtl"] .input-group>.btn {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            border-top-left-radius: 0.35rem;
            border-bottom-left-radius: 0.35rem;
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            #sidebar {
                transform: translateX(-100%);
            }

            #sidebar.show {
                transform: translateX(0);
            }

            #content {
                margin-left: 0;
                width: 100%;
            }

            #sidebarToggle {
                display: inline-block !important;
            }
        }

        /* Desktop Styles */
        @media (min-width: 769px) {
            #sidebar {
                transform: translateX(0);
            }

            #sidebarToggle {
                display: none !important;
            }

            .sidebar-overlay {
                display: none !important;
            }
        }

        /* Prevent body scroll when sidebar is open on mobile */
        body.sidebar-open {
            overflow: hidden;
        }

        @media (max-width: 768px) {
            body.sidebar-open {
                overflow: hidden;
            }
        }
        
    </style>
</head>

<body>
    <!-- Sidebar Overlay for mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="d-flex">
        <!-- Sidebar -->
        <div id="sidebar">
            <div class="sidebar-header">
                <h3>لوحة التحكم</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-fw fa-tachometer-alt me-2"></i> الاحصائيات</a>
                </li>
                <li>
                    <a href="<?php echo e(route('adminCategories.index')); ?>"><i class="fas fa-fw fa-tags me-2"></i>جميع الاقسام </a>
                </li>
                <li>
                    <a href="<?php echo e(route('adminOrders.index')); ?>" ><i class="fas fa-fw fa-boxes me-2"></i> متابعة الطلبات</a>
                </li>
                <li>
                    <a href="<?php echo e(route('home.index')); ?>" target="_blank"><i class="fas fa-shopping-cart text-gray-300 me-2"></i> المتجر</a>
                </li>
            </ul>
        </div>

        <!-- Page Content -->
        <div id="content">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand navbar-light bg-white shadow-sm">
                <div class="container-fluid">
                    <button class="btn btn-link d-md-none" type="button" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-1"></i>
                                <?php echo e(Auth::user()->name); ?>

                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="container-fluid p-4">
                <?php echo $__env->yieldContent('breadcrumb'); ?>

                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Scripts -->
    <script>
        // Get elements
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const body = document.body;

        // Toggle sidebar function
        function toggleSidebar() {
            const isMobile = window.innerWidth <= 768;
            
            if (isMobile) {
                sidebar.classList.toggle('show');
                sidebarOverlay.classList.toggle('show');
                body.classList.toggle('sidebar-open');
            }
        }

        // Close sidebar function
        function closeSidebar() {
            const isMobile = window.innerWidth <= 768;
            
            if (isMobile) {
                sidebar.classList.remove('show');
                sidebarOverlay.classList.remove('show');
                body.classList.remove('sidebar-open');
            }
        }

        // Event listeners
        sidebarToggle.addEventListener('click', toggleSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar);

        // Handle window resize
        window.addEventListener('resize', function() {
            const isMobile = window.innerWidth <= 768;
            
            if (!isMobile) {
                // Desktop view - ensure sidebar is visible and overlay is hidden
                sidebar.classList.remove('show');
                sidebarOverlay.classList.remove('show');
                body.classList.remove('sidebar-open');
            }
        });

        // Close sidebar when clicking on sidebar links (mobile only)
        const sidebarLinks = sidebar.querySelectorAll('a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                const isMobile = window.innerWidth <= 768;
                if (isMobile) {
                    closeSidebar();
                }
            });
        });

        // Auto-close alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Prevent body scroll when sidebar is open on mobile
        function preventBodyScroll() {
            const isMobile = window.innerWidth <= 768;
            if (isMobile && sidebar.classList.contains('show')) {
                body.style.overflow = 'hidden';
            } else {
                body.style.overflow = '';
            }
        }

        // Handle escape key to close sidebar
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeSidebar();
            }
        });
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html><?php /**PATH F:\E-commerce app\E-commerce-app\resources\views/Layouts/Admin.blade.php ENDPATH**/ ?>