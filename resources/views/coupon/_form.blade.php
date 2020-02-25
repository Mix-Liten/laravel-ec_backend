@php
if(!empty($coupon)){
    $isCreate = !$coupon->exists;
    $actionUrl = $isCreate ? route('coupon.store') : route('coupon.update', ['coupon' => $coupon->id]);
}
@endphp

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $key => $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post" action="{{ $actionUrl }}" enctype="multipart/form-data">
    @csrf
    @if (!$isCreate)
    <input type="hidden" name="_method" value="put">
    @endif
    <div class="form-group row">
        <div class="col-md-12">
            <div class="form-group">
                <label>分類名</label>
                <input type="text" class="form-control" name="name" value="{{ $coupon->name }}" required>
            </div>
            <div class="form-group">
                <label>排序</label>
                <input type="number" class="form-control w-25 text-right" name="sort_no" value="{{ $coupon->sort_no }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back()">Cancel</button>
        </div>
    </div>
</form>
