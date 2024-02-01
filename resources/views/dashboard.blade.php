@extends('layout')

@section('main')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!

                    <div class="dashboard">
                        <ul>
                            <li><a href="{{route('blog.create')}}">Create  a research post</a></li>
                            <li><a href="{{route('categories.create')}}">Create Category</a></li>
                            <li><a href="{{route('categories.index')}}">Categories List</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
.button {
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #04AA6D;
}

.button1:hover {
  background-color: yellow;
  color: white;
}

.button2 {
  background-color: red; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

</style>
</head>
<body>



<button class="button button1">upload a pdf</button>
<button class="button button2">upload a vedio</button>
</x-app-layout>


@endsection
