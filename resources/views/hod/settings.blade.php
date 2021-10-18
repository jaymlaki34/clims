@extends('layouts.hod')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                <ul>
                    <li>{{ Session::get('message') }}</li>
                </ul>
            </div>
        @endif
        <div class="card">
            <img class="card-img-top" src="holder.js/100px180/" alt="">
            <div class="card-body">
                <h4 class="card-title">account settings</h4>
                <p class="card-text">
                <form action="{{ route('saveSettings') }}" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="row">
                        <div class='col'>
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input required type="text" name="fname" value="{{ auth()->user()->first_name }}" id=""
                                    class="form-control" placeholder="" aria-describedby="helpId">
                            </div>

                        </div>

                        <div class='col'>
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input required type="text" name="lname" value="{{ auth()->user()->last_name }}" id=""
                                    class="form-control" placeholder="" aria-describedby="helpId">
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class='col'>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input required type="text" name="phone" value="{{ auth()->user()->phone_no }}" id=""
                                    class="form-control" placeholder="" aria-describedby="helpId">
                            </div>

                        </div>
                        <div class='col'>
                            <div class="form-group">
                                <label for="">ID Number</label>
                                <input required type="text" name="id" id="" value="{{ auth()->user()->id_number }}"
                                    class="form-control" placeholder="" aria-describedby="helpId">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class='col'>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input required disabled type="text" value="{{ auth()->user()->email }}" name="email"
                                    id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>

                        </div>
                        <div class='col'>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input required disabled  type="password" value="{{ auth()->user()->password }}" name="password"
                                    id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/home" class="btn btn-danger">Cancel</a>
                </form>
                </p>
            </div>
        </div>
    </div>
@endsection
