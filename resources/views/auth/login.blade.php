@extends('main')
@include('errors')


<div class="row clearfix">
    <div class="col-md-4 column">
    </div>
    <div class="col-md-4 column">

        <form method="POST" action="/auth/login">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
            <button type="submit" class="btn btn-success">Login</button>
            <a type="button" class="btn btn-default" href="/password/email">Reset Password</a>
        </form>
    </div>
    <div class="col-md-4 column">
    </div>
</div>
