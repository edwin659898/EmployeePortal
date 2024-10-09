<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Employee Template</title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    

    <link href="<?php echo e(asset('fontawesome/css/all.css')); ?>" rel="stylesheet">
    <script defer src="<?php echo e(asset('fontawesome/js/all.js')); ?>"></script>

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com/"></script>
    <script>
        window.user = <?php echo json_encode(auth()->user(), 15, 512) ?>;
        window.loggedIn = <?php echo json_encode(auth()->check(), 15, 512) ?>;
    </script>
</head>

<body class="font-sans antialiased bg-gray-100">
    <div id="app">
       <?php if(auth()->check()): ?>
        <main-component :user="<?php echo e(auth()->user()); ?>" />
       <?php endif; ?>
    </div>

</body>

</html><?php /**PATH D:\laravel projects\EmployeeTemplate-main\resources\views/welcome.blade.php ENDPATH**/ ?>