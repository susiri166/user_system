@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('login-success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('login-success') }}
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <div class="row">
                                <div class="col-10"></div>
                                <div class="col-2 mb-3">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Add Admin User
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label class="form-label">Username</label>
                                                            <input type="text" class="form-control"
                                                                aria-describedby="emailHelp">

                                                            <div class="mb-3">
                                                                <label class="form-label">Name</label>
                                                                <input type="text" class="form-control" >
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Email</label>
                                                                <input type="email" class="form-control"
                                                                    aria-describedby="emailHelp">

                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label">Password</label>
                                                                <input type="password" class="form-control" >
                                                            </div>



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Add
                                                                Admin</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table id="myTable" class="display">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>name</th>
                                        <th>username</th>
                                        <th>email</th>
                                        <th>type</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->type }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a href="#" class="btn btn-primary userEditbtn" data-bs-toggle="modal"
                                                    data-bs-target="#activeModal" id="{{ $user->id }}">
                                                    @if ($user->status == 0)
                                                        Inactive
                                                    @else
                                                        Active
                                                    @endif

                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="activeModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal
                                                                    title</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="#" method="post" id="update_form" enctype="multipart/form-data">
                                                                    <div class="mb-3">
                                                                        <input type="hidden" class="form-control"
                                                                            id="user_id" name="user_id"
                                                                            >
                                                                        <label for="exampleInputEmail1"
                                                                            class="form-label">Name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="name"
                                                                            >
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1"
                                                                            class="form-label">Username</label>
                                                                        <input type="text" class="form-control"
                                                                            id="username"

                                                                            >
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1"
                                                                            class="form-label">Email address</label>
                                                                        <input type="email" class="form-control"
                                                                            id="email"
                                                                            aria-describedby="emailHelp"
                                                                            value="">
                                                                    </div>


                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1"
                                                                            class="form-label">UserType</label>
                                                                        <input type="text" class="form-control"
                                                                            id="type"
                                                                            aria-describedby="emailHelp">
                                                                    </div>

                                                                    <button type="submit"
                                                                        class="btn btn-primary" name="logornot" id="logornot">Submit</button>


                                                                </form>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @push('scripts')
                <script>
                    $(document).ready(function() {
                        $('#myTable').DataTable();
                        $(".userEditbtn").click(function(e) {
                            e.preventDefault();
                            var id=$(this).attr('id');

                            $.ajax({
                                url:'{{ route('superadmin.edit') }}',
                                method:'get',
                                data:{
                                    id:id,
                                    _token:'{{ csrf_token() }}'
                                },
                                success:function(response){

                                    $("#name").val(response.user.name);
                                    $("#username").val(response.user.username);
                                    $("#email").val(response.user.email);
                                    $("#type").val(response.user.type);
                                    $("#user_id").val(response.user.id);
                                    if(response.user.status==0){
                                        $("#logornot").html('Active');

                                    }
                                    else{
                                        $("#logornot").html('Inative');

                                    }
                                }
                            })
                        });


                        $('#update_form').submit(function(e){
                            e.preventDefault();
                            const ad=new FormData(this);

                            $.ajax({
                                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url:'{{ route('superadmin.update') }}',
                                method:'post',
                                data:ad,
                                cache:false,
                                processData: false,
                                contentType: false,
                                dataType:'json',
                                success:function(response){
                                    Swal.fire("SucessFully Changed!");

                                }
                            });
                        });

                    });
                </script>
            @endpush
        </div>
    @endsection
