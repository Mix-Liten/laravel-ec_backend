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
                    <input type="file" class="custom-file-input" id="fileInput" name="product_images" multiple accept="image/*">
                    <label class="custom-file-label" for="fileInput">Choose image files</label>
                </div>
                <pre id="fileDisplayArea">
                    <div class="wrapper"></div>
                </pre>
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

<style>
#fileDisplayArea {
  margin-top: 2rem;
  width: 100%;
  display: flex;
  justify-content: center;
}

#fileDisplayArea .wrapper {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  padding-right: 3px;
  padding-left: 3px;
}

#fileDisplayArea .wrapper .block {
  width: 33%;
  /* margin: 0px 1px 5px 0px; */
  display: flex;
  justify-content: center;
  /* border: 0.5px dashed #9561e2; */
  /* padding-top: 2px;
  padding-bottom: 2px; */
  position: relative;
}

#fileDisplayArea .wrapper .block img {
  height: 200px;
  max-width: 100%;
  z-index: 2;
}

#fileDisplayArea .wrapper span {
  position: relative;
}

#fileDisplayArea .wrapper span::before {
  content: '❌';
  position: absolute;
  top: -1rem;
  right: -0.5rem;
  font-size: 1.5rem;
  z-index: 10;
  cursor: pointer;
}

#fileDisplayArea .wrapper span:hover::before {
  transform: scale(1.3);
}
</style>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js"></script> --}}
<script>
var fileInput = document.querySelector('#fileInput');
var fileDisplayArea = document.querySelector('#fileDisplayArea .wrapper');
var imageId = 0;

fileInput.addEventListener('change', function(e) {
  var files = [...fileInput.files];
  var filesLenBefore = files.length;
  files = files.filter(file => validFileType(file));
  var filesLenAfter = files.length;
  if (filesLenBefore !== filesLenAfter) {
    alert('部分檔案為非預期格式，已從資料中剔除！');
  }
  fileDisplayArea.innerHTML = '';
  files.forEach(file => {
    var reader = new FileReader();
    reader.onload = function(e) {
      var areaBlock = document.createElement('div');
      var link = document.createElement('a');
      var img = document.createElement('img');
      var del = document.createElement('span');
      del.setAttribute('data-id', imageId++);
      areaBlock.classList.add('block');
      img.src = reader.result;
      link.setAttribute('href', reader.result);
      link.setAttribute('data-title', `${file.name}：${returnFileSize(file.size)}`);
    //   link.setAttribute('data-lightbox', 'imgUpload');
      link.appendChild(img);
      areaBlock.appendChild(link);
      areaBlock.appendChild(del);
      fileDisplayArea.append(areaBlock);

      del.addEventListener('click', function(evt) {
        evt.preventDefault();
        var id = this.getAttribute('data-id');
        var blocks = document.querySelectorAll('#fileDisplayArea .block span');
        var doubleCheck = confirm('Did you really want to delete this image?');
        if (doubleCheck) {
          blocks.forEach(block => {
            if (block.getAttribute('data-id') == id) {
              block.parentElement.remove();
            }
          })
        }
      })
    }
    reader.readAsDataURL(file);
  })
});

function returnFileSize(number) {
  if (number < 1024) {
    return `${number}bytes`;
  } if (number > 1024 && number < 1048576) {
    return `${(number / 1024).toFixed(1)}KB`;
  } if (number > 1048576) {
    return `${(number / 1048576).toFixed(1)}MB`;
  }
}

function validFileType(file) {
  const acceptFileTypes = /^image\//;
  const isValidFileType = acceptFileTypes.test(file.type);
  return isValidFileType;
}
</script>
