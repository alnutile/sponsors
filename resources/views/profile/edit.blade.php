<div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
            Profile Settings
        </div>
        <div class="panel-body">
            <form method="POST" action="/profile/edit">
                {!! csrf_field() !!}
                <input type="hidden" name="token" value="<?php csrf_token(); ?>">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="new password">
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="confirm password">
                </div>
                <button type="submit" class="btn btn-warning">
                    Save new password
                </button>
            </form>
        </div>
    </div>
</div>