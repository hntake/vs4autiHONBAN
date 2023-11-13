@extends('layouts.app')
<title>メールアドレスをご確認ください</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('メールアドレスをご確認ください') }}</div>
                <div class="card-header">{{ __(' Please check your email address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('ご登録いただいたメールアドレスに確認用のリンクをお送りしました。') }}
                            {{ __('A confirmation link has been sent to the email address you registered.') }}
                        </div>
                    @endif

                    {{ __('必ずメールをご確認ください。') }}
                    {{ __('Please be sure to check your email.') }}

                    {{ __('もし確認用メールが送信されていない場合は、下記をクリックしてください。') }}
                    {{ __('If you have not received a confirmation email, please click below.') }}

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('確認メールを再送信する Resend confirmation email') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
