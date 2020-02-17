@extends('front.auth.master')
@section('content')
    <form class="login-form" action="{{ url( 'password/email' ) }}" method="post">
        <h3 class="form-title font-green">{{ trans( 'main.forgot.title' ) }}</h3>
        <p> {{ trans('main.forgot.info') }} </p>
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="email" class="control-label visible-ie8 visible-ie9">{{ trans( 'main.forgot.email' ) }}</label>
            <input id="email" class="form-control placeholder-no-fix" type="text"
                   placeholder="{{ trans( 'main.forgot.email' ) }}"
                   name="email"/>
        </div>
        <div class="form-actions text-center">
            <button type="submit" class="btn green uppercase">{{ trans( 'main.forgot.sendlink' ) }}</button>
        </div>
        <div class="create-account">
            <p>
                <a href="{{ url('/') }}" id="register-btn"
                   class="uppercase">{{ trans( 'main.back' ) }}</a>
            </p>
        </div>
    </form>
@endsection