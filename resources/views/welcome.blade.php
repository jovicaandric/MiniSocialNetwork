@extends('layouts.master')

@section('title')
    Welcome
@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('signup')}}" method="post">
                <h3>Sign Up</h3>
                <div class="form-group {{$errors->has('email')?'has-error':''}}">
                    <label for="email">E-Mail</label>
                    <input class="form-control " type="text" name="email" id="email" value="{{Request::old('email')}}">
                </div>
                <div class="form-group {{$errors->has('firstname')?'has-error':''}}">
                    <label for="firstname">Firstname</label>
                    <input class="form-control" type="text" name="firstname" id="firstname" value="{{Request::old('firstname')}}">
                </div>
                <div class="form-group {{$errors->has('password')?'has-error':''}}">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="{{route('signin')}}" method="post">
                <div class="form-group {{$errors->has('email')?'has-error':''}}">
                    <label for="email">E-Mail</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
                </div>
                <div class="form-group {{$errors->has('password')?'has-error':''}}">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
    </div>
@endsection