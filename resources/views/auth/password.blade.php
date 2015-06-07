@extends('main')

@include('errors')

<div class="row clearfix">
    <div class="col-md-4 column">
    </div>
    <div class="col-md-4 column">

        <form method="POST" action="/password/email">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-primary">
                Send Password Reset Link
            </button>
        </form>
    </div>
    <div class="col-md-4 column">
    </div>
</div>
