@extends('layouts.app')

@section('contents')
    
    <br><br>
    <main class="mt-6 max-w-[1000px] min-h-[80vh] mx-auto flex justify-center items-center">

        <form action="{{ route('verifyLogin') }}" method="POST" class="w-[350px] mx-auto flex flex-col gap-2 shadow-md px-4 py-3 rounded-md">
            @csrf
            
            <h2 class="text-xl font-medium text-gray-700 mb-2">Sing in to account</h2> 
            <div class="flex flex-col gap-[3px] ">
                <label for="email" class="label">Email address</label>
                <input type="email" name="email" class="input" value="{{ old('email') }}" placeholder="Enter email address">
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-[3px]">
                <label for="password" class="label">Password</label>
                <input type="password" name="password" class="input" value="{{ old('password') }}"  placeholder="Enter password">
                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-[6px]">
                <input type="checkbox" name="checkbox" id="checkbox" class="mt-[3px] checked:bg-blue-500">
                <label for="checkbox" class="label">Remember login</label>
            </div>
            @if(Session::has('wrongInfo'))
                    <p class="text-red-500 text-sm">{{ Session::get('wrongInfo') }}</p>
            @enderror
            <button class="btn mt-1" type="submit">Sign In</button>

            <div class="flex justify-between items-center mt-3">
            <hr class="w-[27%] h-[1px] bg-slate-700"> 
            <span class="label !font-normal">Apply for author</span>
            <hr class="w-[27%] h-[1px] bg-slate-700"> 
            </div>

            <a href="{{ route('register') }}" class="mx-auto btn !bg-yellow-600">Apply here</a>
        </form>
    </main>

@endsection

@section('customJs')
    
@endsection