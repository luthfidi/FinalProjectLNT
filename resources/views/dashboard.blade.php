<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- @extends('home');

@section('title', 'See Book')

@section('body')
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse bg-warning " id="navbarNav">
                <ul class="navbar-nav bg-danger ">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/createCategory">Create Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/createBook">Create Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/createFaktur">Create Faktur</a>
                    </li>
                </ul>
            </div>
            {{-- <x-app-layout ></x-app-layout> --}}
        {{-- </div>
    </nav>
    <div style="display:grid; grid-template-columns: repeat(3, 1fr); padding: 2em">
        @if ($book->isEmpty())
            <h1>Please input inventory first</h1>
        @else
            @foreach ($book as $item)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('/storage/article/images/' . $item->Image) }}" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title">Name : {{ $item->Name }}</h5>
                        <p class="card-text">Price : Rp.{{ $item->Price }}</p>
                        <p class="card-text">Quantity : {{ $item->Quantity }}</p>
                        @foreach ($category as $c)
                            @if ($item->category_id == $c->id)
                                <p class="card-text">Category : {{ $c->CategoryName }}</p>
                            @endif
                        @endforeach
                        <a href="/editBook/{{ $item->id }}" class="btn btn-primary">Edit</a>
                        <form action="/deleteBook/{{ $item->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection  --}}
