@extends('front.auth.master')
@section('content')
    <form class="register-form" action="{{ url( 'auth/register' ) }}" method="post">
        <h3 class="font-green">{{ trans( 'main.signup.title' ) }}</h3>
        <p class="hint"> {{ trans( 'main.signup.info' ) }} </p>
        @if ( $errors->any() )
            <div class="alert alert-danger">
                @foreach( $errors->all() as $e )
                    <span>{{ $e }}</span><br>
                @endforeach
            </div>
        @endif
        {!! csrf_field() !!}
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signup.username' ) }}</label>
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off"
                   placeholder="{{ trans( 'main.signup.username' ) }}" name="name"/></div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signup.fullname' ) }}</label>
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off"
                   placeholder="{{ trans( 'main.signup.fullname' ) }}" name="fullname"/></div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signup.email' ) }}</label>
            <input class="form-control placeholder-no-fix" type="text" placeholder="{{ trans( 'main.signup.email' ) }}"
                   name="email"/>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signup.password' ) }}</label>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password"
                   placeholder="{{ trans( 'main.signup.password' ) }}" name="password"/></div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signup.confirm' ) }}</label>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                   placeholder="{{ trans( 'main.signup.confirm' ) }}" name="password_confirmation"/></div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">{{ trans( 'main.signup.pin' ) }}</label>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                   placeholder="{{ trans( 'main.signup.pin' ) }}" name="pin"/></div>
        <div class="form-group margin-top-20 margin-bottom-20">
            <div id="register_tnc_error"></div>
        </div>
        <div class="form-actions">
            <button type="button" id="register-back-btn"
                    class="btn btn-default">{{ trans( 'main.signup.back' ) }}</button>
            <button type="submit" id="register-submit-btn"
                    class="btn btn-success uppercase pull-right">{{ trans( 'main.signup.submit' ) }}</button>
        </div>
    </form>

@endsection