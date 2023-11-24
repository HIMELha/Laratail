 @extends('layouts.app')

@section('contents')
    <br><br>
    <main class="mt-6 max-w-[1000px] mx-auto grid  md:grid-cols-3 items-start gap-8 lg:gap-6 px-6">
        
        <div class="grid flex-col gap-3 md:ml-2 md:mx-0  md:col-span-2 ">
            <div class="flex flex-col ">
                <div class="flex w-full justify-between items-center">
                    <div>
                        <h1 class="text-[16px] font-medium uppercase text-sky-600 hover:text-blue-600">{{ $post->title }}</h1> 
                    </div>
                    
                </div>
            </div>
            <div class="border border-gray-200 mt-8 p-3 rounded-md">
                {!! $post->description !!}
            </div>


            <div class="mt-8">
                <div class="flex flex-col md:flex-row justify-self-center gap-4">

                    <div class="w-full flex flex-col gap-1 order-0 md:order-1">
                        <h2 class="text-xl">Post details</h2>
                        <div class="flex   flex-col gap-1 mb-4">
                            <a href="" class="text-[18px] text-blue-700">{{ $post->user->name }}</a>
                            <span class="text-[14px] text-gray-800"><i class="fa-regular fa-clock text-slate-800 text-[14px] !lowercase mr-1"></i>{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <a href="" class="text-slate-700 text-[13px]"><i class="fa-solid fa-comments"></i> Comments {{$comments->count()}}</a>
                        <span class="text-slate-600 text-[13px] mb-2"><i class="fa-solid fa-eye"></i> Post views {{ $post->views ? $post->views : 0 }} </span>
                        <span class="flex gap-2 mb-2 text-[15px] text-slate-800">
                            @if($post->tags != null)
                            Tags: 
                            <div class="flex gap-1 flex-wrap">
                                {{-- <a href="" class=" px-2 py-[4px] text-[11px] bg-red-600 text-white rounded-[2px] hover:bg-red-700 font-medium uppercase">Laravel news</a>
                                <a href="" class=" px-2 py-[4px] text-[11px] bg-slate-600 text-white rounded-[2px] hover:bg-slate-700 font-medium uppercase">Nextjs</a>
                                <a href="" class=" px-2 py-[4px] text-[11px] bg-purple-600 text-white rounded-[2px] hover:bg-purple-700 font-medium uppercase">Php</a>
                                <a href="" class=" px-2 py-[4px] text-[11px] bg-green-600 text-white rounded-[2px] hover:bg-green-700 font-medium uppercase">Nodejs</a>
                                <a href="" class=" px-2 py-[4px] text-[11px] bg-yellow-600 text-white rounded-[2px] hover:bg-yellow-700 font-medium uppercase">Python</a> --}}
                                    @php
                                    $tags = $post->tags;
                                    $tagsArray = explode(', ', $tags);
                                    $tagsArray = array_map('trim', $tagsArray);
                                    @endphp
                                    @foreach ($tagsArray as $tag)
                                            <a href="" class=" px-2 py-[4px] text-[11px] bg-gray-600 text-white rounded-[2px] hover:bg-sky-700 font-medium uppercase"><i class="fa-solid fa-tags mr-1"></i>{{ $tag }}</a>
                                    @endforeach
                            </div>
                            @endif
                        </span>

                    </div>
                    {{-- {{ dd($post->id) }} --}}
                    <form action="{{ route('store.comment', $post->id) }}" method="POST" class="w-full flex flex-col gap-1 ">
                        @csrf
                        @if (Session::has('success'))
                            <p class="text-[14px] text-blue-600">{{Session::get('success')}}</p>
                        @endif
                        <label for="comment" class="text-[15px] text-gray-700">Write a comment</label>
                        <textarea name="comment" id="" class="textarea h-[140px]" value="{{ old('name') }}" placeholder="Well explained..."></textarea>
                        @error('comment')
                            <p class="text-[14px] text-red-500">{{$message}}</p>
                        @enderror
                        <button class="btn" type="submit">Submit comment</button>
                    </form>
                </div>

                <div class="flex flex-col gap-2 mt-12">

                @if ($comments->isNotEmpty())
                    @foreach ($comments as $comment)
                        <div class="flex flex-col gap-1 shadow-inner rounded-md p-2 border border-gray-200">
                        <div class="flex justify-between items-center">
                            <h2 class="text-[14px] font-medium text-gray-800">{{ $comment->user->name }}
                                <span class="text"></span>
                            </h2>

                            <p class="text-[13px] font-medium text-gray-700">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                        <span class="text-[13px] text-slate-700">{{$comment->comments}}</span>
                    </div>
                    @endforeach
                @else
                <h2 class="text-center text-2xl text-gray-600">No comments available for this post</h2>
                @endif                    

                </div>
            </div>
        </div>
        
        @include('layouts.sidebar')
    </main>

    <div class="mt-12 max-w-[1000px] mx-auto grid col-span-3 px-6">
            <h2 class="text-xl font-medium text-slate-700">Related Articles</h2>

            <div class="flex flex-col md:flex-row gap-3 mt-3">
                <div class="blog">
                    <div class="flex justify-between items-center">
                        <div>
                            <a href="" class="text-[16px] font-medium uppercase text-sky-600 hover:text-blue-600">Laravel 10 has big 5 changes ~</a> <span class="text-[13px] text-yellow-500">Himel Hasan</span>
                        </div>

                        <div>
                            <i class="fa-regular fa-clock text-slate-800 text-[13px] !lowercase"></i><span class="text-[13px] text-gray-800"> 1 min ago</span>
                        </div>
                    </div>

                    <p class="mt-[6px] text-[12px] text-gray-700">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse fugiat consequatur voluptate, itaque, id facilis dolor ea laborum dolores ipsam est illo eaque obcaecati iusto, aliquam quia. Ad, minima recusandae...</p>

                    <div class="flex items-center gap-4 mt-2">
                        <button class="btn">Read more</button>

                        <a href="" class="text-slate-700 text-[13px]"><i class="fa-solid fa-comments"></i> 17</a>

                        <span class="text-slate-600 text-[13px]"><i class="fa-solid fa-eye"></i> 405</span>
                    </div>
                </div>

                <div class="blog">
                    <div class="flex justify-between items-center">
                        <div>
                            <a href="" class="text-[16px] font-medium uppercase text-sky-600 hover:text-blue-600">Laravel 10 has big 5 changes ~</a> <span class="text-[13px] text-yellow-500">Himel Hasan</span>
                        </div>

                        <div>
                            <i class="fa-regular fa-clock text-slate-800 text-[13px] !lowercase"></i><span class="text-[13px] text-gray-800"> 1 min ago</span>
                        </div>
                    </div>

                    <p class="mt-[6px] text-[12px] text-gray-700">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse fugiat consequatur voluptate, itaque, id facilis dolor ea laborum dolores ipsam est illo eaque obcaecati iusto, aliquam quia. Ad, minima recusandae...</p>

                    <div class="flex items-center gap-4 mt-2">
                        <button class="btn">Read more</button>

                        <a href="" class="text-slate-700 text-[13px]"><i class="fa-solid fa-comments"></i> 17</a>

                        <span class="text-slate-600 text-[13px]"><i class="fa-solid fa-eye"></i> 405</span>
                    </div>
                </div>

                <div class="blog">
                    <div class="flex justify-between items-center">
                        <div>
                            <a href="" class="text-[16px] font-medium uppercase text-sky-600 hover:text-blue-600">Laravel 10 has big 5 changes ~</a> <span class="text-[13px] text-yellow-500">Himel Hasan</span>
                        </div>

                        <div>
                            <i class="fa-regular fa-clock text-slate-800 text-[13px] !lowercase"></i><span class="text-[13px] text-gray-800"> 1 min ago</span>
                        </div>
                    </div>

                    <p class="mt-[6px] text-[12px] text-gray-700">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse fugiat consequatur voluptate, itaque, id facilis dolor ea laborum dolores ipsam est illo eaque obcaecati iusto, aliquam quia. Ad, minima recusandae...</p>

                    <div class="flex items-center gap-4 mt-2">
                        <button class="btn">Read more</button>

                        <a href="" class="text-slate-700 text-[13px]"><i class="fa-solid fa-comments"></i> 17</a>

                        <span class="text-slate-600 text-[13px]"><i class="fa-solid fa-eye"></i> 405</span>
                    </div>
                </div>
            </div>
    </div>
@endsection

@section('customJs')
    
@endsection
