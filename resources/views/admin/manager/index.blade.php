@extends('layouts.admin-app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Managers</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Managers</li>
            </ol>
        </section>

        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- Right column -->
                    <div class="col-md-8">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Manage Admin User
                                    <a class="pull-right" href="{{url('admin/manager/')}}"><div class="btn btn-light btn-sm">New</div></a>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Assign Role</th>
                                            <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php  $id = 0; @endphp
                                    @foreach($admin_user as $row)
                                        @php $id = $id+1; @endphp
                                        <tr>
                                            <td>{{$id}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>
                                                @foreach($row->roles as $role)
                                                    <span class="badge badge-info">{{$role->name}}</span>
                                                @endforeach
                                            </td>
                                                <td>
                                                    @if($row->id == 1)
                                                        <a href="{{url('admin/managers/'.$row->id.'/edit')}}"><div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div></a>
                                                    @endif
                                                    @if($row->id != 1)
                                                        <a href="{{url('admin/managers/'.$row->id.'/edit')}}"><div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div></a>
                                                    @endif
                                                    @if($row->id != 1)
                                                        <a href="{{url('admin/managers/'.$row->id.'/delete')}}"><div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div></a>
                                                    @endif
                                                </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <!-- Right column -->
                    <div class="col-md-4">
                        <!-- general form elements -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Create Admin User</h3>
                            </div>
                            <!-- /.card-header -->
                        @php
                            if(empty($admin->id)){ $url = '/admin/manager/add'; }
                            else { $url = '/admin/manager/'.$admin->id.'/edit'; }
                        @endphp
                        <!-- form start -->
                            {!! Form::model($admin, [ 'files' => true, 'url' => $url]) !!}
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group">
                                    {!! Form::Label('Name *') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::Label('Email Address *') !!}
                                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email', 'required']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::Label('Password *') !!}
                                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::Label('Admin Role') !!}
                                    <select name="role_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select admin role" style="width: 100%;">
                                        @foreach ($roles as $role)
                                            @php $checked = false; @endphp
                                            @if(!empty($role_admin))
                                                @if(in_array($role->id, $role_admin))
                                                    @php $checked = true; @endphp
                                                @endif
                                            @endif
                                            <option value="{{ $role->id }}" {!! $checked?' selected':'' !!}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary pull-right">{{ empty($admin->id)? 'Create' : 'Update'}}</button>
                                    <input type="reset" class="btn pull-right mr-2" value="Reset">
                                </div>
                                {{Form::close()}}
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
