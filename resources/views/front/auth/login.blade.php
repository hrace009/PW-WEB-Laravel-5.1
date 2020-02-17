@extends('front.auth.master')
@section('content')
    <form class="login-form" action="{{ url( 'auth/login' ) }}" method="post">
        <h3 class="form-title font-green">{{ trans( 'main.signin.title' ) }}</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> {{ trans( 'main.signin.error' ) }} </span>
        </div>
        {!! csrf_field() !!}
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label for="username"
                   class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signin.username' ) }}</label>
            <input id="username" class="form-control form-control-solid placeholder-no-fix" type="text"
                   placeholder="{{ trans( 'main.signin.username' ) }}" name="username"/></div>
        <div class="form-group">
            <label for="password"
                   class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signin.password' ) }}</label>
            <input id="password" class="form-control form-control-solid placeholder-no-fix" type="password"
                   placeholder="{{ trans( 'main.signin.password' ) }}" name="password"/></div>
        <div class="form-group">
            <label for="pin" class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signin.pin' ) }}</label>
            <input id="pin" class="form-control form-control-solid placeholder-no-fix" type="password"
                   placeholder="{{ trans( 'main.signin.pin' ) }}" name="pin"/></div>
        <div class="form-actions text-center">
            <button type="submit" class="btn green uppercase">{{ trans( 'main.signin.button' ) }}</button>
        </div>
        <div class="create-account">
            <p>
                <a href="{{ url('auth/register') }}" id="register-btn"
                   class="uppercase">{{ trans( 'main.signin.create' ) }}</a>
            </p>
            <p>
                <a href="{{ url('auth/forgot') }}" id="register-btn"
                   class="uppercase">{{ trans( 'main.forgot.title' ) }}</a>
            </p>
            <p>
                <a href="{{ url('/') }}" id="register-btn"
                   class="uppercase">{{ trans( 'main.back' ) }}</a>
            </p>
        </div>
    </form>
@endsection