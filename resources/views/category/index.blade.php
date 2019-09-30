@extends('layouts.app')

@section('page-title')
<section class="container">
    <div class="row">
        <div class="col-md-12 p-0">
            <h4 class="text-uppercase">Category List</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Category List</li>
            </ol>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container">
    <div class="toolbox">
        <a href="{{ route('category.create') }}" class="btn btn-primary">Create Category</a>
    </div>
    <div class="row justify-content-center">
        <table class="table table-sm table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Sort_No</th>
                    <th scope="col">Features</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                    <tr>
                    <th scope="row" class="align-middle">{{ $category->id }}</th>
                        <td scope="row" class="align-middle">{{ $category->name }}</td>
                        <td scope="row" class="align-middle">{{ $category->sort_no }}</td>
                        <td scope="row" class="align-middle">
                            <a href="{{ route('category.edit', ['category' => $category->id]) }}" class="btn btn-secondary">Edit</a>
                            <button type="button" class="btn btn-danger" onclick="deleteCategory({{ $category->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            {{ $categories->links() }}
        </nav>
    </div>
</div>
@endsection
