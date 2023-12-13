    <div class="grid flex-col md:col-span-1 items-start  md:mr-2">
        <div class="shadow-md shadow-blue-100 border border-slate-300 rounded-[4px] px-4 py-3">
            <h2 class="text-[16px] text-purple-500 font-medium">Top Contents</h2>

            <ul class="mt-4 flex flex-col gap-2">
                <?php if($topPosts->isNotEmpty()): ?>
                    <?php $__currentLoopData = $topPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="px-3 py-2 shadow-md rounded-sm shadow-sky-200 border border-blue-200">
                            <a href="<?php echo e(route('post.show', $post->slug)); ?>" class="text-[15px] font-medium text-cyan-600 hover:underline hover:text-blue-600">
                                <?php
                                    $title = Str::limit($post->title, '40', '...');
                                ?>
                                <?php echo e($title); ?>

                            </a>
                            <br>
                            <div class="flex items-center gap-2">
                                <a href="<?php echo e(route('userProfile', $post->user->id)); ?>" class="text-[13px] text-blue-600 font-medium py-1"><?php echo e($post->user->name); ?></a>  
                                <a href="<?php echo e(route('post.show', $post->user->id)); ?>" class="text-slate-700 text-[13px]"><i class="fa-solid fa-comments"></i> <?php echo e($post->comment->count()); ?></a>

                            <span class="text-slate-600 text-[13px]"><i class="fa-solid fa-eye"></i> <?php echo e($post->views ?? 0); ?></span>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                
            </ul>

            
            <h2 class="text-[16px] mt-5 py-2 shadow-sm shadow-blue-200 rounded-sm text-center text-teal-600 font-medium">Best writers</h2>
            <ul class="mt-4 flex flex-col gap-2">
                <?php if($bestWriters): ?>
                    <?php $__currentLoopData = $bestWriters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $writer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="px-3 py-2 shadow-md rounded-sm shadow-sky-200 border border-blue-200">
                            <a href="<?php echo e(route('userProfile', $writer->id)); ?>" class="text-[15px] font-medium text-yellow-600 hover:underline hover:text-blue-600"> <?php echo e($writer->name); ?> </a> <span class="text-[12px]  text-blue-500"><?php echo e($writer->follower->count()); ?> followers</span>
                            <br>
                            <div class="flex items-center gap-2">
                                <a href="" class="text-slate-700 text-[13px]"><i class="fa-solid fa-newspaper"></i>
                                <?php
                                    $postCount = \App\Models\Post::where('user_id', $writer->id)->get();
                                    $postViews = 0;
                                    foreach ($postCount as $post) {
                                        $postViews = $postViews + $post->views;
                                    }
                                ?>
                                <?php echo e($postCount->count()); ?>

                                </a> <a href="" class="text-slate-700 text-[13px]"><i class="fa-solid fa-comments"></i> 6</a>

                                <span class="text-slate-600 text-[13px]"><i class="fa-solid fa-eye"></i> <?php echo e($postViews); ?> </span>

                                
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                
            </ul>
        </div>
    </div><?php /**PATH C:\Users\Ac\Desktop\Laravel is Awesome\LaraTail\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>