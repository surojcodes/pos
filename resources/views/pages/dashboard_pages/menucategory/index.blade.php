@extends('layout.dashboard_layout')
@section('title')
Menu Category Management
@endsection
@section('content')
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Menu Categories
                <div class="text-muted pt-2 font-size-sm">You can add, update and delete menu categories here.</div>
            </h3>
        </div>
        <div class="card-toolbar">
            <a href="{{route('menucategories.create')}}" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <circle fill="#000000" cx="9" cy="15" r="6"/>
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
                        </g>
                    </svg>
                </span>Add Category</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover" id="dataTable">
            <thead>
            <tr>
                <tr>
                    @php $i=0;@endphp
                    <th>S.N</th>
                    <th>Category Name</th>
                    <th>Options</th>
                </tr>
            </tr>
            </thead>
            <tbody>
            @forelse($menuCategories as $category)
              <tr>
                  <td>{{++$i}}</td>
                  <td>
                    <a class="p-3" href="{{route('menucategories.edit',$category->slug)}}" title="Edit Category" ><i class="fas fa-pencil-alt text-dark"></i></a>
                    <a onclick="setId('{{ $category->slug}}')" class='p-3' data-toggle="modal" data-target="#deleteCategory"  title="Delete Category" style="cursor:pointer;"><i class="fas fa-trash text-danger"></i></a>
                  </td>
                  <td>{{$category->name}}</td>
              </tr>
          @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Delete Category Modal Start-->
<div class="modal fade" id="deleteCategory" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" >Delete Menu Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
               <p>You are going to delete a menu category. Are you sure?</p>
               <small class='text-danger'>This process is irreversible</small> <br>
               <small class='text-danger'>Deleting menu category will delete all menu items in it.</small>
            </div>
            <div class='modal-footer'>
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <form id='deleteMenuCategory' method='POST'>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger font-weight-bold">Delete Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete User Modal End-->

@endsection
@section('scripts')
    <script>
    function setId(slug){
        $('#deleteMenuCategory').attr('action','menucategories/'+slug);
    }
    </script>
@endsection
