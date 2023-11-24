@extends('layouts.app')

@section('contents')
    
    <br><br>
    <main class="mt-6 max-w-[1000px] min-h-[80vh] mx-auto flex justify-center items-center">

        <form action="{{ route('store.post') }}" method="POST" class="w-[350px] sm:w-[60%] mx-auto flex border flex-col gap-2 shadow-md px-4 py-3 rounded-md">
            <h2 class="text-xl font-medium text-gray-700 mb-2">Create new post</h2> 
            @csrf
            <div class="flex flex-col gap-[3px] ">
                <label for="title" class="label">post title</label>
                <input type="text" name="title" class="input" value="{{ old('title') }}"  placeholder="enter post title">
            </div>
            @error('title')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            <div class="flex flex-col gap-[3px] ">
                <label for="description" class="label">post description</label>
                <textarea name="description" class="textarea !h-[100px]" value="{{ old('description') }}" placeholder="enter post description"></textarea>
            </div>
            @error('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            <div class="flex flex-col gap-[3px]">
                <label for="tags" class="label">Enter tags</label>
                <input type="text" name="tags" class="input" value="{{ old('tags') }}" placeholder="tags: laravel, nodejs, pythong">
            </div>
            @error('tags')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            {{-- <div class="flex flex-col gap-[3px]">
                <label for="tags" class="label">Add images</label>
                <input type="file" name="image" class="input" value="{{ old('') }}">
            </div> --}}

            <div class="flex gap-[6px]">
                <input type="checkbox" name="checkbox" id="checkbox" class="mt-[3px] checked:bg-blue-500">
                <label for="checkbox" class="label">Show in feature</label>
            </div>
            <button class="btn mt-1" type="submit">Save post</button>

        </form>
    </main>

@endsection

@section('customJs')
    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/h2axwpnzfh7k1agff20oqbrdvqd0hpov0jv1oc3q8gb14mqi/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo blocks  fontsize bold italic underline | strikethrough fontfamily | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>

@endsection