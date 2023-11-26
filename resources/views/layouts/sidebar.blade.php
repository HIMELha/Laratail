    <div class="grid flex-col md:col-span-1 items-start  md:mr-2">
        <div class="shadow-md shadow-blue-100 border border-slate-300 rounded-[4px] px-4 py-3">
            <h2 class="text-[16px] text-purple-500 font-medium">Top Contents</h2>

            <ul class="mt-4 flex flex-col gap-2">
                @if ($topPosts->isNotEmpty())
                    @foreach ($topPosts as $post)
                        <li class="px-3 py-2 shadow-md rounded-sm shadow-sky-200 border border-blue-200">
                            <a href="{{ route('post.show', $post->slug) }}" class="text-[15px] font-medium text-cyan-600 hover:underline hover:text-blue-600">
                                @php
                                    $title = Str::limit($post->title, '40', '...');
                                @endphp
                                {{$title}}
                            </a>
                            <br>
                            <div class="flex items-center gap-2">
                                <a href="{{ route('userProfile', $post->user->id) }}" class="text-[13px] text-blue-600 font-medium py-1">{{$post->user->name}}</a>  
                                <a href="{{ route('post.show', $post->user->id) }}" class="text-slate-700 text-[13px]"><i class="fa-solid fa-comments"></i> {{$post->comment->count()}}</a>

                            <span class="text-slate-600 text-[13px]"><i class="fa-solid fa-eye"></i> {{$post->views ?? 0}}</span>
                            </div>
                        </li>
                    @endforeach
                @endif
                
            </ul>

            
            <h2 class="text-[16px] mt-5 py-2 shadow-sm shadow-blue-200 rounded-sm text-center text-teal-600 font-medium">Best writers</h2>
            <ul class="mt-4 flex flex-col gap-2">
                @if ($bestWriters)
                    @foreach ($bestWriters as $writer)
                        <li class="px-3 py-2 shadow-md rounded-sm shadow-sky-200 border border-blue-200">
                            <a href="{{ route('userProfile', $writer->id) }}" class="text-[15px] font-medium text-yellow-600 hover:underline hover:text-blue-600"> {{ $writer->name }} </a> <span class="text-[12px]  text-blue-500">{{ $writer->follower->count() }} followers</span>
                            <br>
                            <div class="flex items-center gap-2">
                                <a href="" class="text-slate-700 text-[13px]"><i class="fa-solid fa-newspaper"></i>
                                @php
                                    $postCount = \App\Models\Post::where('user_id', $writer->id)->get();
                                    $postViews = 0;
                                    foreach ($postCount as $post) {
                                        $postViews = $postViews + $post->views;
                                    }
                                @endphp
                                {{ $postCount->count() }}
                                </a> <a href="" class="text-slate-700 text-[13px]"><i class="fa-solid fa-comments"></i> 6</a>

                                <span class="text-slate-600 text-[13px]"><i class="fa-solid fa-eye"></i> {{$postViews}} </span>

                                {{-- <span class="text-[12px] text-green-500"><i class="fa-solid fa-arrow-up-wide-short"></i> 2.84%</span> --}}
                            </div>
                        </li>
                    @endforeach
                @endif
                
            </ul>
        </div>
    </div>