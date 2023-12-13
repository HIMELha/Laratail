@extends('layouts.app')
@section('header')
    <title>{{ $user->name }}'s Followers</title>
@endsection
@section('contents')
    
    <br><br>
    <main class="mt-6 max-w-[1000px] mx-auto grid items-start grid-cols-1  md:grid-cols-3 gap-8 lg:gap-6 px-6">
        
        
        <div class="grid flex-col md:col-span-1  md:mr-2">
            <div class="shadow-md shadow-blue-100 border border-slate-300 rounded-[4px] px-4 py-3">
                <div class="flex flex-col">
                    <div class="flex gap-2">
                        <h2 class="inline-block text-[17px] !text-orange-500 font-medium capitalize">{{ $user->name }}</h2> 
                        <form action="{{ route('follow', $user->id) }}" method="Post">
                            @csrf
                            @auth
                                @if ($user->id != Auth::user()->id)
                                    <button type="submit" class="btn 
                                    !py-[1px] !px-[5px] {{ $isFollow ? '!bg-red-500' : ''}}">{{ $isFollow ? 'unfollow' : 'follow'}}</button>
                                @endif 
                            @endauth
                                
                            
                            
                        </form>
                    </div>
                    
                    
                    <div class="flex gap-2">
                        <a href="{{ route('userProfile', $user->id) }}" class="text-[14px] text-slate-800 font-medium hover:underline">
                            <i class="fa-solid fa-square-rss mr-1 text-[15px]"></i>{{ $posts->count() }} posts
                        </a>
                        
                        <a href="{{ route('userFollowers', $user->id) }}" class="text-[14px] text-slate-800 font-medium hover:underline">
                            <i class="fa-solid fa-users mr-1 text-[14px]"></i>{{ $followers->count() }} followers
                        </a>
                    </div>


                    <span class="text-gray-700 text-sm mt-1">
                        {{ $user->bio }}
                    </span>
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

                <h3 class="text-[15px] font-medium text-blue-600 ">{{$user->name}} Followers</h3>

                <a href=""><button class="btn bg-red-500">Report Profile</button></a>
            </div>

            @if($followers->isNotEmpty())
                @foreach ($followers as $fUser)
                    <div class="blog flex justify-between items-center">
                        <div class="flex gap-2 items-center">
                            <a href="{{ route('userProfile', $fUser->id) }}" class="text-[15px] font-medium text-blue-600 hover:text-blue-700">{{$fUser->user->name}}</a>
                            <span class="text-zin-800 text-[13px] font-medium">{{$fUser->user->follower->count()}} followers</span>
                        </div>
                        <a href="{{ route('userProfile', $fUser->user->id) }}"><button class="btn !py-[3px] !bg-green-600">View Profile</button></a>
                    </div>
                @endforeach
            @else
                <h2 class="text-xl text-center text-gray-600 mt-4">No Followers available</h2>
            @endif

            @if($followers->count() > 8)
                <div class="blog">
                    {{ $followers->links() }}
                </div>
            @endif
        </div>
    </main>

@endsection

@section('customJs')
    
@endsection