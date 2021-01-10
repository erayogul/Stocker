@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div style="margin-top: 25px;" class="card">
                <div class="card-body">


                    <div class="card-tools" style="margin:10px;">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                            <i class="fas fa-user-plus"></i>
                            Creat Employee
                        </button>
                    </div>

                    <div class="row d-flex align-items-stretch">
                        @foreach ($users as $user)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                    <div> <b style="font-size:large;"> {{$user->name}} </b></div>
                                </div>
                                <div style="margin-top:5px;" class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">

                                        </div>
                                        <center>
                                            <div class="col-8 text-center">
                                                <img style="margin-top:25px;" src="{{ asset('/img/profile.png')}}" alt="" class="img-circle img-fluid">
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-center">
                                        <a href="{{ route('employeeView',$user->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> View Profile
                                        </a>
                                        <a href="{{ route('employeeEdit',$user->id) }}" class="btn btn-sm bg-teal">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="#"  class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Default Modal</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('createNewEmployee') }}">
                                    <div class="modal-body">
                                        <div class="form-group">

                                            <label>Name</label>
                                            <input type="text" name="name" placeholder="Name" class="form-control" :class="{ 'is-invalid': form.errors.has('username') }" />
                                            <has-error :form="form" field="name"></has-error>

                                            <label>Email</label>
                                            <input type="text" name="email" placeholder="Email" class="form-control" :class="{ 'is-invalid': form.errors.has('username') }" />
                                            <has-error :form="form" field="email"></has-error>

                                            <label>Password</label>
                                            <div class="form-group">
                                                <input type="text" name="password" id="password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" />
                                                <has-error :form="form" field="password"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            İptal
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            Oluştur
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection