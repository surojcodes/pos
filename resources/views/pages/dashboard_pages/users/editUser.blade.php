@extends('layout.dashboard_layout')

@section('title')
User Account Update
@endsection
@section('content')
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Update User
                <div class="text-muted pt-2 font-size-sm">You can update user information and update user password here.</div>
            </h3>
        </div>
    </div>
    <div class="card-body">
    <form method="POST" action="{{route('users.update',$user->id)}}">
            @csrf
            @method('PUT')
             <div class="row">
                <div class="col-md-4"> 
                    <div class="form-group">
                    <label for="name">Full Name * :</label>
                    <input type="text" id="name" class="form-control" placeholder="Enter Name"  value="{{ $user->name }}" name="name"  autofocus required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="email">User ID * :</label>
                    <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ $user->username }}" placeholder="Enter User ID " autocomplete="false" required>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="type">Batch Name * :</label>
                    <select name="batch_id" id="type" class="form-control" required>
                        @foreach($batches as $batch)
                        <option value="{{$batch->id}}" <?php if($user->batch_id==$batch->id) echo 'selected'?>>{{$batch->name}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
           
           <div class="row">
               <div class="col-md-4">
                    <div class="form-group">
                    <label for="type">Account Type * :</label>
                     @if(Auth::user()->role=='admin')
                        <input type="text" name="role" value="student" class="form-control" readonly>
                    @else
                        <select name="role" id="type" class="form-control" required>
                            <option value="student" <?php if($user->role=='student') echo 'selected'?>>Student</option>
                            <option value="admin" <?php if($user->role=='admin') echo 'selected'?>>Admin</option>
                        </select>
                    @endif
                    </div>
                </div>
                <div class="col-md-4"> 
                    <div class="form-group">
                    <label for="name">Student Mobile * :</label>
                    <input type="text" id="name" class="form-control" placeholder="Enter Student Mobile"  value="{{ $user->student_mobile }}" name="student_mobile" required>
                    </div>
                </div>
                <div class="col-md-4"> 
                    <div class="form-group">
                    <label for="name">Parent Mobile * :</label>
                    <input type="text" id="name" class="form-control" placeholder="Enter Parent Mobile"  value="{{ $user->parent_mobile  }}" name="parent_mobile" required>
                    </div>
                </div>
           </div>
            <div class="form-group">
              <label class="checkbox checkbox-primary">
              <input type="checkbox" id="showPassword" class='mr-2'/>
              <span></span>
              &nbsp; Update Password
              </label>
          </div>
           <div class="row">
           <div class="col-md-4">
                <div class="form-group">
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" disabled>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <small> <em>Minimum 8 characters</em> </small>

                </div>
           </div>
           <div class="col-md-4">
                <div class="form-group">
                    <label for="password-confirm">Confirm Password :</label>
                    <input type="password" id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password" disabled>
                </div>
           </div>
           </div>
            <div class='float-right'>
                <button type="submit" class="btn btn-primary font-weight-bold">Update User</button>
            </div>
        </form>
    
    
    </div>
</div>     
       
@endsection
@section('scripts')
    <script>
        $('#showPassword').change(()=>{
            $('#password').attr('disabled',(index,attr)=>{
                return !attr;
            })
            $('#password-confirm').attr('disabled',(index,attr)=>{
                return !attr;
            })
        })
       
    </script>
@endsection