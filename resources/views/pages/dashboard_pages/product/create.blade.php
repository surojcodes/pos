@extends('layout.dashboard_layout')

@section('title')
Add Product
@endsection

@section('content')
<div class="card card-custom">
  <div class="card-header flex-wrap border-0 pt-6 pb-0">
      <div class="card-title">
          <h3 class="card-label">Add Product
              <div class="text-muted pt-2 font-size-sm">You can add product here.</div>
          </h3>
      </div>
  </div>
  <div class="card-body">
    <form action="{{route('products.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Product Name * :</label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Product Name"  value="{{ old('name') }}" name="name"  autofocus required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="category">Product Category * :</label>
                     <select name="productcategory_id" id="type" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" <?php if(old('productcategory_id')==$category->id) echo 'selected'?>>{{$category->name}}</option>
                        @endforeach
                    </select>
                   
                </div>
            </div>
        </div>
        <div class='float-right'>
            <button type="submit" class="btn btn-primary font-weight-bold">Add Product</button>
        </div>
    </form>
  </div>
</div>
@endsection