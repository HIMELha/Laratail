@extends('layouts.app')

@section('contents')
    
    <br><br>
    <main class="mt-6 max-w-[1000px] mx-auto grid items-start grid-cols-1  md:grid-cols-3 gap-8 lg:gap-6 px-6">
        <div class="grid flex-col gap-3  md:ml-2 md:mx-0  md:col-span-3 ">
            
            <div class="blog flex justify-between items-center">
                <a href="" class="text-[15px] font-medium text-blue-600">Update profile</a>

                <a href="{{ route('profile') }}"><button class="btn">Back to profile</button></a>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" class="w-[350px] sm:w-[60%] mx-auto flex border flex-col gap-2 shadow-md px-4 py-3 mt-6 rounded-md">

            <h2 class="text-xl font-medium text-gray-700 mb-2">Update profile</h2> 
            @csrf
            <div class="flex flex-col gap-[3px] ">
                <label for="name" class="label">name</label>
                <input type="text" name="name" class="input" value="{{ Auth::user()->name }}"  placeholder="enter your name">
            </div>
            @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <div class="flex flex-col gap-[3px] ">
                <label for="email" class="label">email</label>
                <input type="text" name="email" class="input" value="{{ Auth::user()->email }}"  placeholder="enter your email">
            </div>
            @error('email')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <div class="flex flex-col gap-[3px] ">
                <label for="password" class="label">password</label>
                <input type="password" name="password" class="input"  placeholder="enter your password">
            </div>
            @error('password')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <div class="flex flex-col gap-[3px] ">
                <label for="bio" class="label">profile bio</label>
                <textarea name="bio" class="textarea !h-[100px]" value="{{ Auth::user()->bio }}" placeholder="enter profile bio">{{ Auth::user()->bio }}</textarea>
            </div>
            @error('bio')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <div class="flex flex-col gap-[3px] ">
                <label for="location" class="label">Live location</label>
                <input type="name" name="location" class="input" value="{{ Auth::user()->lives }}"  placeholder="enter your location">
            </div>
            @error('location')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <div class="flex flex-col gap-[3px] ">
                <label for="work" class="label">Your work</label>
                <input type="name" name="work" class="input" {{ Auth::user()->works }}  placeholder="enter your work">
            </div>
            @error('work')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <button class="btn mt-1" type="submit">Update profile</button>
        </form>


        </div>
    </main>

@endsection

@section('customJs')
    
@endsection