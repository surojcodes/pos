@extends('layout.dashboard_layout')

@section('title')
Edit Menu Item
@endsection

@section('content')
<div class="card card-custom">
  <div class="card-header flex-wrap border-0 pt-6 pb-0">
      <div class="card-title">
          <h3 class="card-label">Edit Menu Item
              <div class="text-muted pt-2 font-size-sm">You can edit menu item here.</div>
          </h3>
      </div>
  </div>
  <div class="card-body">
    <form action="{{route('menus.update',$menu->slug)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Menu Utem Name * :</label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Menu Item Name"  value="{{ $menu->name }}" name="name"  autofocus required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="category">Menu Category * :</label>
                     <select name="menucategory_id" id="type" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" <?php if($menu->menucategory_id==$category->id) echo 'selected'?>>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="price">Menu Item Price * :</label>
                    <input type="number" id="price" step="any" class="form-control @error('price') is-invalid @enderror" placeholder="Enter Menu Item Price"  value="{{ $menu->price }}" name="price" required>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class='float-right'>
            <button type="submit" class="btn btn-primary font-weight-bold">Update Menu Item</button>
        </div>
    </form>
  </div>
</div>
@endsection