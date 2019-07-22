@php
$isCreate = !$product->exists;
$actionUrl = $isCreate ? route('products.store') : route('products.update', ['product' => $product->id]);
$hasImage = $images->exists;
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
        <div class="col-md-6">
            <div class="form-group">
                <label class="d-block">商品圖</label>
                @if ($hasImage)
                <img width="100%" src="{{ $images->path }}" alt="product_image">
                @endif
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="product_images" multiple>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>分類</label>
                <select class="form-control" name="category_id">
                    <option selected value>Please select a category</option>
                    {{-- @foreach ($categories as $key => $category)
                    <option value="{{ $category->id }}" @if($post->category_id==$category->id) selected @endif>
                    {{ $category->name }}
                    </option>
                    @endforeach --}}
                </select>
            </div>
            <div class="form-group">
                <label>商品名</label>
                <input type="text" class="form-control" name="name" value="{{ $product->name }}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>網路價</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>原價</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control" name="price_origin"
                            value="{{ $product->price_origin }}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>上架量</label>
                    <input type="number" class="form-control" name="qty" value="{{ $product->qty }}">
                </div>
                <div class="form-group col-md-6">
                    <label>商品單位</label>
                    <input type="text" class="form-control" name="unit" value="{{ $product->unit }}">
                </div>
            </div>
            <div class="form-group">
                <label class="mr-3">商品狀態</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_active" id="active" value="true"
                        {{ ($product->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">啟用</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_active" id="inactive" value="false"
                        {{ ($product->is_active) ? '' : 'checked' }}>
                    <label class="form-check-label" for="inactive">停用</label>
                </div>
            </div>
            <div class="form-group">
                <label>商品描述</label>
                <input type="text" class="form-control" name="description" value="{{ $product->description }}">
            </div>
            <div class="form-group">
                <label>商品特色</label>
                <textarea class="form-control" name="content" rows="8" cols="80">{{ $product->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back()">Cancel</button>
        </div>
    </div>
</form>
