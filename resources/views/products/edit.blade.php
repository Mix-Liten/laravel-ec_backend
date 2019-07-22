@extends('layouts.app')

@section('page-title')
<section class="container">
    <div class="row">
        <div class="col-md-12 p-0">
            <h4 class="text-uppercase">Edit Product</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('products.index') }}">Products List</a>
                </li>
                <li class="breadcrumb-item active">Edit Product</li>
            </ol>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="page-content">
    <div class="container">
        @include('products._form')
    </div>
</div>
@endsection
