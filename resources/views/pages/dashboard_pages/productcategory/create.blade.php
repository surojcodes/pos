@extends('layout.dashboard_layout')

@section('title')
Add Product Category
@endsection

@section('content')
<div class="card card-custom">
  <div class="card-header flex-wrap border-0 pt-6 pb-0">
      <div class="card-title">
          <h3 class="card-label">Add Product Category
              <div class="text-muted pt-2 font-size-sm">You can add product category here.</div>
          </h3>
      </div>
  </div>
  <div class="card-body">
    <form action="{{route('productcategories.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Product Category Name * :</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name" placeholder="Enter Batch Name" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class='float-right'>
            <button type="submit" class="btn btn-primary font-weight-bold">Add Category</button>
        </div>
    </form>
  </div>
</div>
@endsection