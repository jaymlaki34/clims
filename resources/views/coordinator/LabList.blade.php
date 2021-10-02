@extends('layouts.coordinator')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <h4 class="fw-bold"> {{ $title }}</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Labs</li>
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
    <div class="my-3 container-fluid">
        <div class="d-flext justify-content-end">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add New Laboratory
            </button>
        </div>
        @if (count($labs) <= 0)
            <div class="my-4 d-flex justify-content-center text-uppercase wow fadeInUp">
                <img src="{{ asset('images/no_photo.png') }}" class="img-fluid" />
            </div>
            <div class="my-4 text-center wow fadeInRight">
                <h5>Unfortunately there is no Laboratory Added!
                    <br>Add new Photos by Clicking the <b>ADD LABORATORY</b> button Above.
                </h5>
            </div>
        @else
            <div class="my-4 d-flex justify-content-center text-uppercase wow fadeInUp">
                <table class="table table-hover table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Lab name</th>
                            <th scope="col">Date Added</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($labs as $lab)
                            <tr>
                                <td>{{ $lab['laboratory_name'] }}</td>
                                <td>{{ $lab['date_added'] }}</td>
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
                    <form method="POST" action="{{ route('RegisterLabs') }}">
                        @csrf
                        <div class="mb-3 row">
                            <div class="col-12">
                                <div class="form-floating">
                                    <label for="laboratory_name">{{ __('Laboratory Name') }}</label>
                                    <input id="laboratory_name" type="text" class="form-control " name="laboratory_name"
                                        placeholder="Laboratory name" value="{{ old('laboratory_name') }}" required>
                                    @error('laboratory_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
