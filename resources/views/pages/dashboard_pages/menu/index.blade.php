@extends('layout.dashboard_layout')
@section('title')
Menu Management
@endsection
@section('content')
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">All Menu Items
                <div class="text-muted pt-2 font-size-sm">You can add, update and delete menu items here.</div>
            </h3>
        </div>
        <div class="card-toolbar">
            <a href="{{route('menus.create')}}" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <circle fill="#000000" cx="9" cy="15" r="6"/>
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
                        </g>
                    </svg>
                </span>Add Menu Item</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover" id="dataTable">
            <thead>
            <tr>
                <tr>
                    @php $i=0;@endphp
                    <th>S.N</th>
                    <th>Options</th>
                    <th>Menu Item Name</th>
                    <th>Price</th>
                    <th>Category</th>
                </tr>
            </tr>
            </thead>
            <tbody>
            @forelse($menus as $menu)
              <tr>
                  <td>{{++$i}}</td>
                  <td>
                    <a class="p-3" href="{{route('menus.edit',$menu->slug)}}" title="Edit Menu" ><i class="fas fa-pencil-alt text-dark"></i></a>
                    <a onclick="setId('{{ $menu->slug}}')" class='p-3' data-toggle="modal" data-target="#deleteMenu"  title="Delete Menu Item" style="cursor:pointer;"><i class="fas fa-trash text-danger"></i></a>
                  </td>
                  <td>{{$menu->name}}</td>
                  <td>{{$menu->price}}</td>
                  <td>{{$menu->menucategory->name}}</td>
              </tr>
          @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Delete Menu Modal Start-->
<div class="modal fade" id="deleteMenu" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" >Delete Menu Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
               <p>You are going to delete a menu item. Are you sure?</p>
               <small class='text-danger'>This process is irreversible</small> <br>
            </div>
            <div class='modal-footer'>
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <form id='deleteMenuForm' method='POST'>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger font-weight-bold">Delete Menu Item</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Menu Modal End-->

@endsection
@section('scripts')
    <script>
    function setId(slug){
        $('#deleteMenuForm').attr('action','/menus/'+slug);
    }
    </script>
@endsection
