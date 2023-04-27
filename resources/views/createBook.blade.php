@extends('home');

@section('title', 'Input Book')

@section('body')
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <form class="m-5" action="/storeBook" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Book Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="Name">
            @error('Name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Book Price</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="Price" placeholder="Rp.">
            @error('Price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Book Quantity</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="Quantity">
            @error('Quantity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Book Image</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="Image">
            @error('Image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" name="CategoryName">
                @foreach ($category as $i)
                    <option value="{{ $i->id }}">{{ $i->CategoryName }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection
