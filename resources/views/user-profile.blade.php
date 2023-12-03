@extends('layouts.app')

@section('contents')
    
    <br><br>
    <main class="mt-6 max-w-[1000px] mx-auto grid items-start grid-cols-1  md:grid-cols-3 gap-8 lg:gap-6 px-6">
        
        
        <div class="grid flex-col md:col-span-1  md:mr-2">
            <div class="shadow-md shadow-blue-100 border border-slate-300 rounded-[4px] px-4 py-3">
                <div class="flex flex-col">
                    <div class="flex gap-2">
                        <h2 class="inline-block text-[17px] !text-orange-500 font-medium capitalize">{{ $user->name }}</h2> 
                        @if (Auth::check())
                            <form action="{{ route('follow', $user->id) }}" method="Post">
                                @csrf
                                <button type="submit" class="btn 
                                !py-[1px] !px-[5px] {{ $isFollow ? '!bg-red-500' : ''}}">{{ $isFollow ? 'unfollow' : 'follow'}}</button>
                            </form>
                        @endif
                        
                    </div>
                    
                    <div class="flex gap-2">
                        <a href="{{ route('userProfile', $user->id) }}" class="text-[14px] text-slate-800 font-medium hover:underline">
                            <i class="fa-solid fa-square-rss mr-1 text-[15px]"></i>{{ $posts->count() }} posts
                        </a>
                        
                        <a href="{{ route('userFollowers', $user->id) }}" class="text-[14px] text-slate-800 font-medium hover:underline">
                            <i class="fa-solid fa-users mr-1 text-[14px]"></i>{{ $followers->count() }} followers
                        </a>
                    </div>

                    @if ($user->bio != '')
                        <span class="text-gray-700 text-sm mt-1">
                            {{ $user->bio }}
                            
                        </span>
                    @else
                        <span class="text-gray-700 text-sm mt-1">Hi, I'm laratail member</span>
                    @endif

                    <div class="mt-2">
                        <span class="text-[13px] font-medium">About me</span>

                        <p class="icon"><i class="fa-solid fa-briefcase icon"></i> {{ $user->works }}</p>
                        <p class="icon"><i class="fa-solid fa-location-dot icon"></i> Live in {{ $user->lives }}</p>
                    </div>


                    <div class="mt-4">
                        <span class="text-[13px] font-medium">Awards</span>

                        <p class="icon"><i class="fa-solid fa-award icon"></i> Article about genocide | 2023 </p>
                        <p class="icon"><i class="fa-solid fa-award icon"></i> Bangladesh in Hasina occupation | 2021 </p>
                        <p class="icon"><i class="fa-solid fa-award icon"></i> Life at sundorban | 2020 </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid flex-col gap-3  md:ml-2 md:mx-0  md:col-span-2 ">
            
            <div class="blog flex justify-between items-center">

                <a href="" class="text-[15px] font-medium text-blue-600 ">{{$user->name}} Contents</a>

                <a href=""><button class="btn bg-red-500">Report Profile</button></a>
            </div>

            @if($posts->isNotEmpty())
                @foreach ($posts as $post)
                    <div class="blog">
                        
                        <div class="max-w-[86%]">
                            <a href="{{ route('post.show', $post->slug) }}" class="text-[16px] font-medium uppercase text-sky-600 hover:text-blue-600">{{ $post->title }} ~</a> <span class="text-[13px] text-yellow-500">{{ $post->user->name }}</span>
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

                                <a href="{{ route('post.show', $post->slug) }}" class="text-slate-700 text-[13px]"><i class="fa-solid fa-comments"></i> {{ $post->comment->count() }} </a>

                                <span class="text-slate-600 text-[13px]"><i class="fa-solid fa-eye"></i> {{ $post->views ? $post->views : 0 }}</span>
                            </div>
                            <div class=" flex items-center gap-1">
                                <i class="fa-regular fa-clock text-slate-800 text-[13px] !lowercase"></i><span class="text-[13px] text-gray-800"> {{ $post->created_at->diffForHumans() }} </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else

                <h2 class="text-xl text-center text-gray-600 mt-4">No contents available</h2>
                <a href="{{ route('index') }}" class="text-center"><button class="btn">Explore more contents</button></a>
            @endif

            {{-- @if($posts->count() > 8) --}}
            <div class="blog">
                {{ $posts->links() }}
            </div>
            {{-- @endif --}}
        </div>
    </main>

@endsection

@section('customJs')
    
@endsection