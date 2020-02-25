@extends('layouts.app')

@section('page-title')
<section class="container">
    <div class="row">
        <div class="col-md-12 p-0">
            <h4 class="text-uppercase">Coupon List</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Coupon List</li>
            </ol>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container">
    <div class="toolbox">
        <a href="{{ route('coupon.create') }}" class="btn btn-primary">Create Coupon</a>
    </div>
    <div class="row justify-content-center">
        <table class="table table-sm table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Coupon</th>
                    <th scope="col">Sort_No</th>
                    <th scope="col">Features</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupons as $key => $coupon)
                    <tr>
                    <th scope="row" class="align-middle">{{ $coupon->id }}</th>
                        <td scope="row" class="align-middle">{{ $coupon->name }}</td>
                        <td scope="row" class="align-middle">{{ $coupon->sort_no }}</td>
                        <td scope="row" class="align-middle">
                            <a href="{{ route('coupon.edit', ['coupon' => $coupon->id]) }}" class="btn btn-secondary">Edit</a>
                            <button type="button" class="btn btn-danger" onclick="deleteCoupon({{ $coupon->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            {{ $coupons->links() }}
        </nav>
    </div>
</div>
@endsection
