    <div class="mt-12 max-w-[1000px] mx-auto grid col-span-3 px-6">
            <h2 class="text-xl font-medium text-slate-700">Related Articles</h2>

            <div class="flex flex-col md:flex-row gap-3 mt-3">


                @if ($related->isNotEmpty())
                    @foreach ($related as $post)
                        <div class="blog">
                            <div class="flex justify-between items-center">
                                <div>
                                    <a href="" class="text-[16px] font-medium uppercase text-sky-600 hover:text-blue-600">{{ Str::substr($post->title, 0, 40) }} ~</a> <span class="text-[13px] text-yellow-500">{{ $post->user->name }}</span>
                                </div>

                                <div>
                                    <i class="fa-regular fa-clock text-slate-800 text-[13px] !lowercase"></i><span class="text-[13px] text-gray-800">{{ $post->created_at->diffForHumans()}}</span>
                                </div>
                            </div>

                            <p class="mt-[6px] text-[12px] text-gray-700">{!!  strip_tags(Str::substr($post->description, 0, 140)) . '...' !!}</p>

                            <div class="flex items-center gap-4 mt-2">
                                <a href="{{ route('post.show' , $post->slug) }}"><button class="btn">Read more</button></a>

                                
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
    </div>