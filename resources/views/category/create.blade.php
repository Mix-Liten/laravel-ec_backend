@extends('layouts.app')

@section('page-title')
<section class="container">
    <div class="row">
        <div class="col-md-12 p-0">
            <h4 class="text-uppercase">Create Category</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('category.index') }}">Category List</a>
                </li>
                <li class="breadcrumb-item active">Create Category</li>
            </ol>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="page-content">
    <div class="container">
        @include('category._form', ['category' => $category])
    </div>
</div>
@endsection
