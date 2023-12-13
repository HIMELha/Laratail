<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo $__env->yieldContent('header'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <link rel="shortcut icon" href="https://w7.pngwing.com/pngs/751/810/png-transparent-white-and-red-l-logo-symbol-font-league-video-game-symbol-summoner-thumbnail.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container max-w-[1200px] mx-auto ">
        
    <header class="w-full z-20  flex justify-between items-center px-4 py-2 shadow-md bg-white shadow-sky-100 rounded-b-sm fixed top-0 left-0 right-0">
        <a href="<?php echo e(route('index')); ?>" class="text-[17px] font-medium p-1 text-blue-600">LaraTail</a>

        <ul class="flex gap-2">
            <li><a href="" class="text-[13px] font-medium text-gray-700 p-1 hover:text-slate-800">Home</a></li>
            <li><a href="" class="text-[13px] font-medium text-gray-700 p-1 hover:text-slate-800">Blogs</a></li>
            <li><a href="" class="text-[13px] font-medium text-gray-700 p-1 hover:text-slate-800">Writers</a></li>
            <li><a href="" class="text-[13px] font-medium text-gray-700 p-1 hover:text-slate-800">Readers</a></li>
            <li class="relative group"><a href="" class="text-[13px] font-medium text-gray-700 p-1 hover:text-slate-800 ">Account</a>
            
                <div class="flex-col px-2 py-1 shadow-md shadow-blue-100 absolute top-[26px] right-[1px] bg-slate-800 rounded-md hidden group-hover:flex transition-all duration-200 min-w-[100px] text-center">
                    <?php if(auth()->guard()->guest()): ?>
                        <a href="<?php echo e(route('login')); ?>" class="text-[13px] font-medium text-gray-100 p-1 hover:text-slate-300">Sign In</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('profile')); ?>" class="text-[13px] font-medium text-gray-100 p-1 hover:text-slate-300">My account</a>
                        <a href="<?php echo e(route('logout')); ?>" class="text-[13px] font-medium text-gray-100 p-1 hover:text-slate-300">Logout</a>
                    <?php endif; ?>
                    
                </div>

            </li>
        </ul>
    </header>


    <?php echo $__env->yieldContent('contents'); ?>


    <footer class="flex  justify-start md:justify-around flex-wrap gap-6 items-start px-5 py-4 bg-gray-100 rounded-t-md mt-12  border-t-2  border-slate-800">
        <div class="max-w-[300px]"> 
            <h2 class="text-[17px] font-medium text-sky-600">LaraTail</h2>
            <span class="text-gray-800 text-[13px]">Lara tail is an open source blog sharing platform. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos maxime expedita minus debitis perferendis at! Hic!</span>
            <br>
            <button class="btn mt-2">Support us</button>
        </div>

        <div>
            <h2 class="text-[17px] font-medium text-blue-800">Become a LaraTail member</h2>
            <div class="flex flex-col gap-[1px]">
                <a href="" class="text-[13px] font-medium text-gray-700 py-1 hover:text-slate-800"><i class="fa-solid fa-angle-right mr-[3px]"></i>Create an account</a>
                <a href="" class="text-[13px] font-medium text-gray-700 py-1 hover:text-slate-800"><i class="fa-solid fa-angle-right mr-[3px]"></i>Sing in</a>
                <a href="" class="text-[13px] font-medium text-gray-700 py-1 hover:text-slate-800"><i class="fa-solid fa-angle-right mr-[3px]"></i>Apply for writer</a>
                <a href="" class="text-[13px] font-medium text-gray-700 py-1 hover:text-slate-800"><i class="fa-solid fa-angle-right mr-[3px]"></i>Apply for free premium</a>
            </div>
        </div>

        <div>
            <h2 class="text-[17px] font-medium text-blue-800">Important links</h2>
            <div class="flex flex-col gap-[1px]">
                <a href="" class="text-[13px] font-medium text-gray-700 py-1 hover:text-slate-800"><i class="fa-solid fa-angle-right mr-[3px]"></i>About us</a>
                <a href="" class="text-[13px] font-medium text-gray-700 py-1 hover:text-slate-800"><i class="fa-solid fa-angle-right mr-[3px]"></i>Terms of use</a>
                <a href="" class="text-[13px] font-medium text-gray-700 py-1 hover:text-slate-800"><i class="fa-solid fa-angle-right mr-[3px]"></i>Privacy Policy</a>
                <a href="" class="text-[13px] font-medium text-gray-700 py-1 hover:text-slate-800"><i class="fa-solid fa-angle-right mr-[3px]"></i>Contact us</a>
            </div>
        </div>
    </footer>
    <div class="flex flex-wrap justify-between items-center bg-slate-900 px-6 py-[10px]">
        <span class="text-[13px] text-slate-100">&copy; All rights are reserved 2021 ~ 2023</span> 

        <a href="" class="text-[13px] font-medium p-1 text-blue-600">Developed by Webhimel</a>
    </div>
    </div>
    
    <?php echo $__env->yieldContent('customJs'); ?>

</body>
</html><?php /**PATH C:\Users\Ac\Desktop\Laravel is Awesome\LaraTail\resources\views/layouts/app.blade.php ENDPATH**/ ?>