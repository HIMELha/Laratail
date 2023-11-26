@extends('layouts.app')

@section('contents')
    
    <br><br>
    <main class="mt-6 max-w-[1000px] min-h-[80vh] mx-auto flex justify-center items-center">

        <form action="{{ route('SaveRegister') }}" method="POST" class="w-[350px] mx-auto flex flex-col gap-2 shadow-md px-4 py-3 rounded-md">
            <h2 class="text-xl font-medium text-gray-700 mb-2">Create an account</h2> 
            @csrf
            <div class="flex flex-col gap-[3px] ">
                <label for="name" class="label">Username</label>
                <input type="text" name="name" class="input" value="{{ old('name') }}" placeholder="Enter your name">
            </div>
            @error('name')
                <p class="text-[13px] text-red-600">{{$message}}</p>
            @enderror
            <div class="flex flex-col gap-[3px] ">
                <label for="email" class="label">Email Address</label>
                <input type="email" name="email" class="input" placeholder="Enter email address">
            </div>
            @error('email')
                <p class="text-[13px] text-red-600">{{$message}}</p>
            @enderror
            <div class="flex flex-col gap-[3px]">
                <label for="password" class="label">Password</label>
                <input type="password" name="password" class="input" placeholder="Enter password">
            </div>
            @error('password')
                <p class="text-[13px] text-red-600">{{$message}}</p>
            @enderror
            <div class="flex flex-col gap-[3px]">
                <label for="cpassword" class="label">Confrim Password</label>
                <input type="password" name="cpassword" class="input" placeholder="Confirm password">
            </div>
            @error('cpassword')
                <p class="text-[13px] text-red-600">{{$message}}</p>
            @enderror
            <div class="flex gap-[6px]">
                <input type="checkbox" name="checkbox" id="checkbox" class="mt-[3px] checked:bg-blue-500">
                <label for="checkbox" class="label">I agree with <a href="" class="text-blue-500 hover:underline">terms and conditons</a></label>
            </div>
            <button class="btn mt-1">Create</button>

            <div class="flex justify-between items-center mt-3">
            <hr class="w-[23%] h-[1px] bg-slate-700"> 
            <span class="label !font-normal">Already have an account?</span>
            <hr class="w-[23%] h-[1px] bg-slate-700"> 
            </div>

            <a href="" class="mx-auto btn !bg-teal-600">Sign in here</a>
        </form>
    </main>

@endsection

@section('customJs')
    
@endsection