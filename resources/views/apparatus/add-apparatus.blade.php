
@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Add Apparatus</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Apparatus</a></li>
                                <li class="breadcrumb-item active">Add Apparatus</li>
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
                            <form action="{{ route('apparatus/add/save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title student-info">Apparatus Information
                                            <span>
                                                <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Name <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('Name') is-invalid @enderror" name="name" placeholder="Enter the Name and Measurement" value="{{ old('name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Categories <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="categories_id">
                                                <option disabled>Select Category </option>
                                                <option>-- Select --</option>

                                                @foreach ($Categories as $category )
                                                    <option value="{{ $category->id }}"> {{ $category->type }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Location <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="location">
                                                <option disabled>Select Location </option>
                                                <option>-- Select --</option>
                                                    <option value="CAS-MAIN"> CAS-MAIN"</option>
                                                    <option value="CAS-ANNEX"> CAS-ANNEX"</option>


                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Quantity <span class="login-danger">*</span></label>
                                            <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" placeholder="Enter Quantity" value="{{ old('qty') }}">
                                            @error('qty')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Image <span class="login-danger">*</span></label>
                                            <input type="file" class="form-control" name="image" >

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-group local-forms">
                                            <label>Description <span class="login-danger">*</span></label>
                                            <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here"></textarea>
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
