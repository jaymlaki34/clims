@extends('layouts.admin')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <h4 class="fw-bold"> {{ $title }}</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                </ol>
            </nav>
        </div>
    </nav>
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif
    <div class="container my-3">
        <div class="d-flext justify-content-end">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add New user
            </button>
        </div>
        @if (count($users) <= 0)
            <div class="my-4 d-flex justify-content-center text-uppercase wow fadeInUp">
                <img src="{{ asset('images/no_photo.png') }}" class="img-fluid" />
            </div>
            <div class="my-4 text-center wow fadeInRight">
                <h5>Unfortunately there is no Picture in this EVENT!
                    <br>Add new Photos by Clicking the <b>ADD PHOTO</b> button Above.
                </h5>
            </div>
        @else
            <div class="my-4 d-flex justify-content-center text-uppercase wow fadeInUp">
                <table class="table table-hover table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Phone No.</th>
                            <th scope="col">Address</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user['first_name'] }}</td>
                                <td>{{ $user['last_name'] }}</td>
                                <td>{{ $user['role'] }}</td>
                                <td>{{ $user['phone_no'] }}</td>
                                <td>{{ $user['address'] }}</td>
                                <td>{{ $user['gender'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center modal-title" id="exampleModalLabel">Add new User</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('RegisterUser') }}">
                        @csrf
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="first_name">{{ __('First Name') }}</label>
                                    <input id="first_name" type="text" class="form-control " name="first_name"
                                        placeholder="First name" placeholder="First Name" value="{{ old('first_name') }}"
                                        required>
                                    @error('first_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="last_name">{{ __('Last Name') }}</label>
                                    <input id="last_name" type="text" class="form-control " name="last_name"
                                        placeholder="Last name" placeholder="First Name" value="{{ old('last_name') }}"
                                        required>
                                    @error('last_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-floating">
                            <label for="address">{{ __('Address') }}</label>
                            <input id="address" type="text" class="form-control" name="address" placeholder="Address"
                                value="{{ old('address') }}" required>
                            @error('address')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-floating">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control" name="email" placeholder="Email Address"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-floating">
                            <label for="phone_no">{{ __('Phone number') }}</label>
                            <input id="phone_no" type="phone" class="form-control" name="phone_no"
                                placeholder="Phone number" value="{{ old('phone_no') }}" required>
                            @error('phone_no')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6 form-group">
                                <label for="gender">{{ __('Gender') }}</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">-- select Gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 form-group">
                                    <label for="role">{{ __('Role') }}</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="">-- Select Role --</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}">{{ $role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
