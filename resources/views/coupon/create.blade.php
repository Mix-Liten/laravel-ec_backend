@extends('layouts.app')

@section('page-title')
<section class="container">
    <div class="row">
        <div class="col-md-12 p-0">
            <h4 class="text-uppercase">Create Coupon</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('coupon.index') }}">Coupon List</a>
                </li>
                <li class="breadcrumb-item active">Create Coupon</li>
            </ol>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="page-content">
    <div class="container">
        @include('coupon._form', ['coupon' => $coupon])
    </div>
</div>
@endsection
