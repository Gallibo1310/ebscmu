@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">List Users</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">List Users</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Users List</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="{{ url('view/user/add') }}" class="btn btn-primary">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">

                                        <tr>
                                            <th>User ID</th>
                                            <th>Profile</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Date Join</th>
                                            <th>Role Name</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $key => $list)

                                            <tr>
                                                <td class="user_id">{{ $list->user_id }}</td>
                                                <td hidden class="avatar">{{ $list->avatar }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a class="avatar avatar-sm me-2">
                                                            <img
                                                                class="avatar-img rounded-circle"src="/images/{{ $list->avatar }}"alt="{{ $list->name }}">
                                                        </a>
                                                    </h2>
                                                </td>
                                                <td>{{ $list->username }}</td>
                                                <td>{{ $list->email }}</td>

                                                <td>{{ $list->join_date }}</td>
                                                <td>{{ $list->role_name }}</td>
                                                <td>
                                                    <div class="edit-delete-btn">
                                                        @if ($list->status === 'Cleared')
                                                            <a class="text-success">{{ $list->status }}</a>
                                                        @elseif ($list->status === 'With Accountability')
                                                            <a class="text-danger">{{ $list->status }}</a>
                                                        @elseif ($list->status === 'Disable')
                                                            <a class="text-warning">{{ $list->status }}</a>
                                                        @else
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <div class="actions">
                                                        <a
                                                            href="{{ url('view/user/edit/' . $list->user_id) }}"class="btn btn-sm bg-danger-light">
                                                            <i class="feather-edit"></i>
                                                        </a>
                                                        @if (Session::get('role_name') === 'Admin')
                                                            <a class="btn btn-sm bg-danger-light user_delete"
                                                                data-bs-toggle="modal" data-bs-target="#deleteUser">
                                                                <i class="feather-trash-2 me-1"></i>
                                                            </a>
                                                            @endif

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
            </div>
        </div>
    </div>

    {{-- model user delete --}}
    <div class="modal fade contentmodal" id="deleteUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content doctor-profile">
                <div class="modal-header pb-0 border-bottom-0  justify-content-end">
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="feather-x-circle"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user/delete') }}" method="POST">
                        @csrf
                        <div class="delete-wrap text-center">
                            <div class="del-icon">
                                <i class="feather-x-circle"></i>
                            </div>
                            <input type="hidden" name="user_id" class="e_user_id" value="">
                            <input type="hidden" name="avatar" class="e_avatar" value="">
                            <h2>Sure you want to delete</h2>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-success me-2">Yes</button>
                                <a class="btn btn-danger" data-bs-dismiss="modal">No</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!--User Add-->
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add User</h4>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="field-3" class="form-label">Username<span class="login-danger">*</span></label>
                                                        <input type="text" class="form-control" id="field-3" placeholder="Username" name="name">
                                                        <input type="hidden" class="form-control" name="user_id" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="field-3" class="form-label">Username<span class="login-danger">*</span></label>
                                                        <input type="text" class="form-control" id="field-3" placeholder="Username" name="name">
                                                        <input type="hidden" class="form-control" name="user_id" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="field-3" class="form-label">Username<span class="login-danger">*</span></label>
                                                        <input type="text" class="form-control" id="field-3" placeholder="Username" name="name">
                                                        <input type="hidden" class="form-control" name="user_id" >
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-12 col-sm-4">
                                                <div class="form-group local-forms">
                                                    <label>Email <span class="login-danger">*</span></label>
                                                    <input type="text" class="form-control" name="email" >
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group local-forms">
                                                    <label>Phone Number <span class="login-danger">*</span></label>
                                                    <input type="text" class="form-control" name="phone_number">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group local-forms">
                                                    <label>Status <span class="login-danger">*</span></label>
                                                    <select class="form-control select" name="status">
                                                        <option disabled>Select Status</option>
                                                        <option value="With Accountability">With Accountability</option>
                                                        <option value="Cleared">Cleared</option>
                                                        <option value="Inactive" >Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group local-forms">
                                                    <label>Role Name <span class="login-danger">*</span></label>
                                                    <select class="form-control select" name="role_name">
                                                        <option disabled>Select Role Name</option>
                                                        <option value="Admin" >Admin</option>
                                                        <option value="Super Admin" >Super Admin</option>
                                                        <option value="Normal User">Normal User</option>
                                                        <option value="Teachers">Teachers</option>
                                                        <option value="Student">Student</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-4">
                                                <div class="form-group local-forms">
                                                    <label>Profile <span class="login-danger">*</span></label>
                                                    <input type="file" class="form-control" name="avatar">
                                                    <div class="user-img" style="margin-top: -25px;">
                                                        <img class="rounded-circle">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="hidden_avatar">
                                            </div>

                                            <div class="col-12 col-sm-4">
                                                <div class="form-group local-forms">
                                                    <label>Position <span class="login-danger">*</span></label>
                                                    <input type="text" class="form-control" name="position">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group local-forms">
                                                    <label>Department <span class="login-danger">*</span></label>
                                                    <input type="text" class="form-control" name="department">
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('script')
    {{-- delete js --}}
    <script>
        $(document).on('click', '.user_delete', function() {
            var _this = $(this).parents('tr');
            $('.e_user_id').val(_this.find('.user_id').text());
            $('.e_avatar').val(_this.find('.avatar').text());
        });
    </script>
@endsection

@endsection
