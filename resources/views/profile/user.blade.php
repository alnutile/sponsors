@extends('main')
@include('errors')

<div class="row clearfix">
    <div class="col-md-10 col-lg-offset-1 column">
        <div class="tabbable" id="tabs-704627">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#panel-468360" data-toggle="tab">
                        <i class="glyphicon glyphicon-heart"></i> Subscription Info</a>
                </li>
                <li>
                    <a href="#panel-603341" data-toggle="tab">
                        <i class="glyphicon glyphicon-user"></i> Email/Password</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="panel-468360">
                        <br>
                        <br>
                       @include('stripe.status')
                       @include('stripe.history')

                </div>
                <div class="tab-pane fade" id="panel-603341">
                    <div class="row">
                        <br>
                        <br>
                        @include('profile.edit')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
