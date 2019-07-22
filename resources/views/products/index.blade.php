@extends('layouts.app')

@section('page-title')
<section class="container">
    <div class="row">
        <div class="col-md-12 p-0">
            <h4 class="text-uppercase">Products List</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Products List</li>
            </ol>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container">
    <div class="toolbox">
        <a href="{{ route('products.create') }}" class="btn btn-primary">create product</a>
    </div>
    <div class="row justify-content-center">
        <table class="table table-sm table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty(Unit)</th>
                    <th scope="col">Status</th>
                    <th scope="col">Features</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <th scope="row">1</th>
                        <td>夏日冰品</td>
                        <td>Meji 明治牛奶冰淇淋</td>
                        <td>$ 1,299</td>
                        <td>20 份</td>
                        <td>
                            <span class="btn btn-success">正常</span>
                        </td>
                        <td>
                            <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-secondary">Edit</a>
                            <button type="button" class="btn btn-warning" onclick="ableProduct({{ $product->id }})">作廢</button>
                            <button type="button" class="btn btn-danger" onclick="deleteProduct({{ $product->id }})">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>夏日冰品</td>
                        <td>Meji 明治牛奶冰淇淋</td>
                        <td>$ 1,299</td>
                        <td>20 份</td>
                        <td>
                            <span class="btn btn-warning">作廢</span>
                        </td>
                        <td>
                                <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-secondary">Edit</a>
                                <button type="button" class="btn btn-success" onclick="ableProduct({{ $product->id }})">正常</button>
                                <button type="button" class="btn btn-danger" onclick="deleteProduct({{ $product->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection
