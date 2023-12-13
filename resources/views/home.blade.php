@extends('layouts.app')
@section('header')
    <title>Laratails is an open sourc knowledge sharing Platform</title>
@endsection
@section('contents')
    <br><br>
    <main class="mt-6 max-w-[1000px] mx-auto grid grid-cols-1 items-start md:grid-cols-3 gap-8 lg:gap-6 px-6">
        <div class="grid flex-col gap-3 items-start  md:ml-2 md:mx-0  md:col-span-2 ">

            @if($posts->isNotEmpty())
                @foreach ($posts as $post)
                    <div class="blog">
                        
                        <div class="max-w-[86%]">
                            <a href="{{ route('post.show', $post->slug) }}" class="text-[16px] font-medium uppercase text-sky-600 hover:text-blue-600">
                            @php
                                $title = Str::limit(strip_tags($post->title), 60, '...');
                            @endphp
                            {{ $title }} ~</a> <a href="{{ route('userProfile', $post->user->id) }}" class="text-[13px] text-yellow-500">{{ $post->user->name }}</a>
                        </div>
                        <p class="mt-[6px] !text-[12px] text-gray-700">
                            @php
                                $desc = Str::limit(strip_tags($post->description), 200, '...');
                            @endphp

                            {!! $desc !!}
                        </p>
                        <div class="flex justify-between items-end  gap-2">
                            <div class="flex items-center gap-4 mt-2">
                                <a href="{{ route('post.show', $post->slug) }}">
                                    <button class="btn">Read more</button>
                                </a>

                                <a href="{{ route('post.show', $post->slug) }}" class="text-slate-700 text-[13px]"><i class="fa-solid fa-comments"></i> {{ $post->comment->count() }}</a>

                                <span class="text-slate-600 text-[13px]"><i class="fa-solid fa-eye"></i> {{ $post->views ? $post->views : 0 }}</span>
                            </div>
                            <div class=" flex items-center gap-1">
                                <i class="fa-regular fa-clock text-slate-800 text-[13px] !lowercase"></i><span class="text-[13px] text-gray-800"> {{ $post->created_at->diffForHumans() }} </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <h2 class="text-center text-2xl my-6">No post avaiable</h2>
            @endif
            
            {{-- @if($posts->count() > 8) --}}
            <div class="blog">
                {{ $posts->links() }}
            </div>
            {{-- @endif --}}
        </div>

        @include('layouts.sidebar')
    </main>
@endsection

@section('customJs')
    
@endsection

