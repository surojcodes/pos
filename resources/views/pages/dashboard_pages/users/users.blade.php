@extends('layout.dashboard_layout')
@section('title')
User Account Management
@endsection
@section('content')
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">User Accounts
                <div class="text-muted pt-2 font-size-sm">You can add, update and delete users here.</div>
            </h3>
        </div>
        <div class="card-toolbar">
            <a href="{{route('register')}}" class="btn btn-primary font-weight-bolder" target='_blank' >
                <span class="svg-icon svg-icon-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <circle fill="#000000" cx="9" cy="15" r="6"/>
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Add User</a>
                <button href="#" class="btn btn-success ml-4" data-toggle="modal" data-target="#sendSms"  title="Send SMS" id="smsBtn" onclick="setSmsIds()" disabled>
                    <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Chat6.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M14.4862 18L12.7975 21.0566C12.5304 21.54 11.922 21.7153 11.4386 21.4483C11.2977 21.3704 11.1777 21.2597 11.0887 21.1255L9.01653 18H5C3.34315 18 2 16.6569 2 15V6C2 4.34315 3.34315 3 5 3H19C20.6569 3 22 4.34315 22 6V15C22 16.6569 20.6569 18 19 18H14.4862Z" fill="black"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6 7H15C15.5523 7 16 7.44772 16 8C16 8.55228 15.5523 9 15 9H6C5.44772 9 5 8.55228 5 8C5 7.44772 5.44772 7 6 7ZM6 11H11C11.5523 11 12 11.4477 12 12C12 12.5523 11.5523 13 11 13H6C5.44772 13 5 12.5523 5 12C5 11.4477 5.44772 11 6 11Z" fill="black"/>
                        </g>
                    </svg><!--end::Svg Icon--></span>
                <span>Send SMS</span></button>
        </div>
    </div>
    <div class="card-body">
        <!--begin: Search Form-->
       
        <!--begin: Datatable-->
        <table class="table table-hover" id="dataTable">
            <thead>
            <tr>
                <tr>
                    {{-- @php $i=0;@endphp --}}
                    {{-- <th>S.N</th> --}}
                    <th>
                        <span style="width: 20px;"><label class="checkbox checkbox-single checkbox-all"><input type="checkbox" id="checkall">&nbsp;<span></span></label></span>
                    </th>
                    <th>ID</th>
                    <th>Options</th>
                    <th>Name</th>
                    <th>Batch</th>
                    <th>Account Type</th>
                </tr>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                @if(Auth::user()->role=='admin' && $user->role!='student')
                    @continue
                @else
                <tr>
                    {{-- <td>{{++$i}}</td> --}}
                    <td>
                        <span style="width: 20px;"><label class="checkbox checkbox-single"><input type="checkbox" id="checksingle" onchange="updateList({{$user->id}})" value="{{$user->id}}">&nbsp;<span></span></label></span>
                    </td>
                    <td>{{$user->username}}</td>
                    <td>
                    <a class="p-3" href="{{route('users.edit',$user->id)}}" title="Edit User" ><i class="fas fa-pencil-alt text-dark"></i></a>
                    <a onclick=setId(<?php echo $user->id ?>) class='p-3' data-toggle="modal" data-target="#deleteUser"  title="Delete User" style="cursor:pointer;"><i class="fas fa-trash text-danger"></i></a>
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->batch['name']}}</td>
                    <td>
                    {{$user->role}}
                    </td>
                </tr>
              @endif
          @empty
              <tr colspan='5' class='text-center'>
                <td>   
                  <strong><i class="flaticon-warning-sign"></i> No Users !</strong> 
                </td>
              </tr>
          @endforelse
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>

<!-- Delete User Modal Start-->
<div class="modal fade" id="deleteUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"  id="deleteUserLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
               <p>You are going to delete a user. Are you sure?</p>
               <small class='text-danger'>This process is irreversible</small> <br>
               <small class='text-danger'>Deleting user will delete all his/her results as well.</small>
            </div>
            <div class='modal-footer'>
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <form id='deleteUserForm' method='POST'>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger font-weight-bold">Delete User</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete User Modal End-->

{{-- sms modal start--}}
<div class="modal fade" id="sendSms" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"  id="sendSmsLabel">Send SMS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
               <p>You are going to send SMS. Are you sure?</p>
            </div>
            <div class='modal-footer'>
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <form action='{{route('sms.user')}}' id='sendSmsForm' method='POST'>
                    @csrf
                    <input type="text" name="smsIds" id="smsIds" hidden>
                    <button type="submit" class="btn btn-danger font-weight-bold">Send SMS</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- sms modal end--}}

@endsection
@section('scripts')
    <script>
    let checked=[];
    const setSmsIds=()=>{
        document.querySelector('#smsIds').value = checked.toString();
    }

    const checkSmsStatus = ()=>{
        const smsBtn = document.querySelector('#smsBtn');
        if(checked.length==0){
            smsBtn.disabled = true;
        }else{
            smsBtn.disabled = false;
        }
    }
    
    function setId(id){
        $('#deleteUserForm').attr('action','/users/'+id);
    }
   
    const checkall = document.querySelector('#checkall');
    checkall.addEventListener('change',()=>{
        if(checkall.checked){
            checked=[];
            document.querySelectorAll('#checksingle').forEach(single=>{
                checked.push(parseInt(single.value));
                single.checked=true;
            })

        }else{
           checked=[];
            document.querySelectorAll('#checksingle').forEach(single=>{
                single.checked=false;
            })
        }
         checkSmsStatus()
    })
     const updateList = (id)=>{
         let index = checked.indexOf(id);
            if(index==-1){
                checked.push(id);
            }else{
                checked.splice(index,1);
            }
            checkSmsStatus()
    }
    </script>
@endsection
