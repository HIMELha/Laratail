@extends('layouts.app')

@section('contents')
    
    <br><br>
    <main class="mt-6 max-w-[1000px] min-h-[80vh] mx-auto flex justify-center items-center">

        <form action="" class="w-[350px] mx-auto flex flex-col gap-2 shadow-md px-4 py-3 rounded-md">
            <h2 class="text-xl font-medium text-gray-700 mb-2">Create an account</h2> 

            <div class="flex flex-col gap-[3px] ">
                <label for="usernmae" class="label">Username</label>
                <input type="usernmae" name="usernmae" class="input" placeholder="Enter username">
            </div>

            <div class="flex flex-col gap-[3px] ">
                <label for="email" class="label">Email Address</label>
                <input type="email" name="email" class="input" placeholder="Enter email address">
            </div>

            <div class="flex flex-col gap-[3px]">
                <label for="password" class="label">Password</label>
                <input type="password" name="password" class="input" placeholder="Enter password">
            </div>

            <div class="flex flex-col gap-[3px]">
                <label for="email" class="label">Confrim Password</label>
                <input type="email" name="email" class="input" placeholder="Confirm password">
            </div>

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