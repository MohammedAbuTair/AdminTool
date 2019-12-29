@extends('Admin.content')
@section('contentAdmin')
<!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Users</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('Admin.index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('Admin.users.index') }}">Users</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit/Add User</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="card container-Users">
                        <form action="{{route(!empty($user) ?'Admin.users.update':'Admin.users.store',$user)}}" method="post" class="form-horizontal">
                            @csrf
                            {{method_field(!empty($user)?'put':'post')}}
                            <div class="card-body">
                                <h4 class="card-title">Personal Info</h4>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" required="" value="{{!empty($user) ? $user->name:'' }}"name="name" class="form-control" id="fname" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" required="" name="email" value="{{!empty($user) ? $user->email:'' }}" class="form-control" id="email1" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" required="" value="{{!empty($user) ? $user->phone:'' }}" name="phone" class="form-control" id="phone" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Type User</label>
                                    <div class="col-sm-9">
                                        <select class="select2 form-control custom-select" name="userType" required="">                                            
                                            @foreach ($roles as $rolesList)
                                                <option value="{{$rolesList->id}}" {{!empty($user) ? (($rolesList->id == $user->roles->first()->id) ? "selected":'') :'' }}>{{$rolesList->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control" {{empty($user) ?"required=''":''}} id="password" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
@endsection