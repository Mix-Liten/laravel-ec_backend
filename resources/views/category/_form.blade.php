@php
if(!empty($category)){
    $isCreate = !$category->exists;
    $actionUrl = $isCreate ? route('category.store') : route('category.update', ['category' => $category->id]);
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
                <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
            </div>
            <div class="form-group">
                <label>排序</label>
                <input type="number" class="form-control w-25 text-right" name="sort_no" value="{{ $category->sort_no }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back()">Cancel</button>
        </div>
    </div>
</form>
