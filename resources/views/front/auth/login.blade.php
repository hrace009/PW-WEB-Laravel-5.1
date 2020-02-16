@extends('front.auth.master')
@section('content')
    <form class="login-form" action="{{ url( 'auth/login' ) }}" method="post">
        <h3 class="form-title font-green">{{ trans( 'main.signin.title' ) }}</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> {{ trans( 'main.signin.error' ) }} </span>
        </div>
        @if ( $errors->any() )
            <div class="alert alert-danger">
                @foreach( $errors->all() as $e )
                    <span>{{ $e }}</span><br>
                @endforeach
            </div>
        @endif
        {!! csrf_field() !!}
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signin.username' ) }}</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text"
                   placeholder="{{ trans( 'main.signin.username' ) }}" name="username"/></div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signin.password' ) }}</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password"
                   placeholder="{{ trans( 'main.signin.password' ) }}" name="password"/></div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signin.pin' ) }}</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password"
                   placeholder="{{ trans( 'main.signin.pin' ) }}" name="pin"/></div>
        <div class="form-actions text-center">
            <button type="submit" class="btn green uppercase">{{ trans( 'main.signin.button' ) }}</button>
            <a href="javascript:" id="forget-password" class="forget-password">Forgot Password?</a>
        </div>
        <div class="create-account">
            <p>
                <a href="{{ url('auth/register') }}" id="register-btn"
                   class="uppercase">{{ trans( 'main.signin.create' ) }}</a>
            </p>
        </div>
    </form>
@endsection