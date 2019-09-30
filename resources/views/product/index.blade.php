@extends('layouts.app')

@section('page-title')
<section class="container">
    <div class="row">
        <div class="col-md-12 p-0">
            <h4 class="text-uppercase">Product List</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Product List</li>
            </ol>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container">
    <div class="toolbox">
        <a href="{{ route('product.create') }}" class="btn btn-primary">create product</a>
    </div>
    <div class="row justify-content-center">
        <table class="table table-sm table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Price_origin</th>
                    <th scope="col">Qty(Unit)</th>
                    <th scope="col">Status</th>
                    <th scope="col">Features</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <th scope="row" class="align-middle">{{ $product->id }}</th>
                        <td scope="row" class="align-middle">{{ $product->category->name }}</td>
                        <td scope="row" class="align-middle">{{ $product->name }}</td>
                        <td scope="row" class="align-middle">$ {{ number_format($product->price) }}</td>
                        <td scope="row" class="align-middle">$ {{ number_format($product->price_origin) }}</td>
                        <td scope="row" class="align-middle">{{ $product->qty }} {{ $product->unit }}</td>
                        <td scope="row" class="align-middle">
                            @if ($product->is_active)
                                <span class="btn btn-success">啟用</span>
                            @else
                                <span class="btn btn-warning">停用</span>
                            @endif
                        </td>
                        <td scope="row" class="align-middle">
                            <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="btn btn-secondary">Edit</a>
                            <button type="button" class="btn btn-danger" onclick="deleteProduct({{ $product->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            {{ $products->links() }}
        </nav>
    </div>
</div>
@endsection
