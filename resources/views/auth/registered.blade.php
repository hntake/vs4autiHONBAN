@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">仮会員登録完了</div>

                <div class="card-body" style="text-align:start;">
                    <p>この度は、ご登録いただき、誠にありがとうございます。</p>
                    <p>
                        ご本人様確認のため、ご登録いただいたメールアドレスに、
                        本登録のご案内のメールが届きます。
                    </p>
                    <p>
                        そちらに記載されているURLにアクセスし、
                        アカウントの本登録を完了させてください。
                    </p>
                    <p>
                    Thank you for registering.
                    </p>
                    <p>
                    To confirm your identity, a confirmation email with registration details will be sent to the email address you provided.
                    </p>
                    <p>
                    Please access the URL specified in the email and complete the account registration process.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
