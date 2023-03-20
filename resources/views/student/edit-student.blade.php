
@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Add Students</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('student/add/page') }}">Student</a></li>
                                <li class="breadcrumb-item active">Add Students</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <form action="{{ route('student/update') }}e" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title student-info">Student Information
                                            <span>
                                                <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>First Name <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $studentEdit->firstname }}">
                                            @error('firstname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Middle Name <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ $studentEdit->middlename }}">
                                            @error('middlename')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Last Name <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $studentEdit->lastname }}">
                                            @error('lastname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>ID Number <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('idnumber') is-invalid @enderror" name="idnumber" value="{{ $studentEdit->idnumber }}">
                                            @error('idnumber')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Address <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $studentEdit->address }}">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Contact <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ $studentEdit->contact }}">
                                            @error('contact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Sex <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="sex">
                                                <option disabled>Select Sexual Orientation </option>
                                                <option>-- Select --</option>

                                                <option value="Female" {{ $studentEdit->sex == 'Female' ? 'selected' : '' }}>Female</option>
                                                <option value="Male" {{ $studentEdit->sex == 'Male' ? 'selected' : '' }}>Male</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Year Level <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="yearlevel">
                                                <option disabled>Select Year Level </option>
                                                <option >-- Select --</option>
                                                <option value="1" {{ $studentEdit->yearlevel == '1' ? 'selected' : '' }}>1st Year</option>
                                                <option value="2" {{ $studentEdit->yearlevel == '2' ? 'selected' : '' }}>2nd Year</option>
                                                <option value="3" {{ $studentEdit->yearlevel == '3' ? 'selected' : '' }} >3rd Year</option>
                                                <option value="4" {{ $studentEdit->yearlevel == '4' ? 'selected' : '' }}>4th Year</option>
                                                <option value="5" {{ $studentEdit->yearlevel == '5' ? 'selected' : '' }}>5th Year</option>
                                                <option value="6" {{ $studentEdit->yearlevel == '6' ? 'selected' : '' }}>6th Year</option>
                                                <option value="7" {{ $studentEdit->yearlevel == '7' ? 'selected' : '' }}>Graduate School</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Date Of Birth <span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker @error('birthday') is-invalid @enderror" name="birthday" type="text" value="{{ $studentEdit->birthday }}">
                                            @error('birthday')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="student-submit">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
