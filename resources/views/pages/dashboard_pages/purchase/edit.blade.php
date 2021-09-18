@extends('layout.dashboard_layout')

@section('title')
Edit Purchase
@endsection

@section('content')
<div class="card card-custom">
  <div class="card-header flex-wrap border-0 pt-6 pb-0">
      <div class="card-title">
          <h3 class="card-label">Edit a purchase
              <div class="text-muted pt-2 font-size-sm">You can edit a purchase here.</div>
          </h3>
      </div>
  </div>
  <div class="card-body">
    <form action="{{route('purchases.update',$purchase->slug)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="category">Product Category * :</label>
                     <select name="productcategory_id" id="productcategory_id" id="type" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" <?php if($purchase->product->productCategory->id==$category->id) echo 'selected'?>>{{$category->name}}</option>
                        @endforeach
                    </select>
                   
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Product Name * :</label>
                    <select name="product_id" id="product_select" class="form-control" required>
                        @foreach($products as $product)
                            <option value="{{$product->id}}" <?php if($purchase->product_id==$product->id) echo 'selected'?>>{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="category">Purchase Date * :</label>
                    <input type="date" name="purchase_date" id="purchase_date" class="form-control" value="{{$purchase->purchase_date_nepali}}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="unti">Product Quantity(Unit) * :</label>
                    <input type="text" id="unit" class="form-control @error('unit') is-invalid @enderror" placeholder="e.g. 4 k.g."  value="{{ $purchase->unit }}" name="unit" required>
                    @error('unit')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="unit_cost">Product Per Unit Cost * :</label>
                    <input type="text" id="unit_cost" class="form-control @error('unit_cost') is-invalid @enderror" placeholder="Enter per unit cost"  value="{{ $purchase->unit_cost }}" name="unit_cost" required>
                    @error('unit_cost')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="total_cost">Total Cost * :</label>
                    <input type="number" step="any" id="total_cost" class="form-control @error('total_cost') is-invalid @enderror" placeholder="Enter total cost"  value="{{ $purchase->total_cost}}" name="total_cost" required>
                    @error('total_cost')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="total_cost">Remarks :</label>
            <textarea name="remarks" cols="30" rows="5" class="form-control" placeholder="Any Remarks">{{$purchase->remarks}}</textarea>
        </div>
        <div class='float-right'>
            <button type="submit" class="btn btn-primary font-weight-bold">Update Purchase</button>
        </div>
    </form>
  </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(()=>{
        document.querySelector("#purchase_date").nepaliDatePicker();
        const category = document.querySelector('#productcategory_id');
        category.addEventListener('change',()=>{
            populateProducts(category.value);
        })
    });

    const populateProducts = (id)=>{
        let products = document.querySelector('#product_select');
        $('#product_select').empty();
        $.get('/get-products/'+id,(data)=>{
            $.each(data,(index,product)=>{
                let op = `<option value='${product.id}'>${product.name}</option>`
                $('#product_select').append(op);
            })
        })
        $('#product_select').attr('disabled',false);
    }

</script>
@endsection