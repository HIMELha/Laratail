<?php $__env->startSection('header'); ?>
    <title>Laratails is an open sourc knowledge sharing Platform</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contents'); ?>
    <br><br>
    <main class="mt-6 max-w-[1000px] mx-auto grid grid-cols-1 items-start md:grid-cols-3 gap-8 lg:gap-6 px-6">
        <div class="grid flex-col gap-3 items-start  md:ml-2 md:mx-0  md:col-span-2 ">

            <?php if($posts->isNotEmpty()): ?>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="blog">
                        
                        <div class="max-w-[86%]">
                            <a href="<?php echo e(route('post.show', $post->slug)); ?>" class="text-[16px] font-medium uppercase text-sky-600 hover:text-blue-600">
                            <?php
                                $title = Str::limit(strip_tags($post->title), 60, '...');
                            ?>
                            <?php echo e($title); ?> ~</a> <a href="<?php echo e(route('userProfile', $post->user->id)); ?>" class="text-[13px] text-yellow-500"><?php echo e($post->user->name); ?></a>
                        </div>
                        <p class="mt-[6px] !text-[12px] text-gray-700">
                            <?php
                                $desc = Str::limit(strip_tags($post->description), 200, '...');
                            ?>

                            <?php echo $desc; ?>

                        </p>
                        <div class="flex justify-between items-end  gap-2">
                            <div class="flex items-center gap-4 mt-2">
                                <a href="<?php echo e(route('post.show', $post->slug)); ?>">
                                    <button class="btn">Read more</button>
                                </a>

                                <a href="<?php echo e(route('post.show', $post->slug)); ?>" class="text-slate-700 text-[13px]"><i class="fa-solid fa-comments"></i> <?php echo e($post->comment->count()); ?></a>

                                <span class="text-slate-600 text-[13px]"><i class="fa-solid fa-eye"></i> <?php echo e($post->views ? $post->views : 0); ?></span>
                            </div>
                            <div class=" flex items-center gap-1">
                                <i class="fa-regular fa-clock text-slate-800 text-[13px] !lowercase"></i><span class="text-[13px] text-gray-800"> <?php echo e($post->created_at->diffForHumans()); ?> </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <h2 class="text-center text-2xl my-6">No post avaiable</h2>
            <?php endif; ?>
            
            <?php if($posts->hasPages()): ?>
            <div class="blog">
                <?php echo e($posts->links()); ?>

            </div>
            <?php endif; ?>
        </div>

        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customJs'); ?>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ac\Desktop\Laravel is Awesome\LaraTail\resources\views/home.blade.php ENDPATH**/ ?>