@extends('layouts.app')
<link rel="icon" href="{{ asset('favicon2.ico') }}" id="favicon">
<title>警察専用画面 </title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font:bold; color:darkgray;">{{ __('支援者に連絡する') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('verify',['id'=>$id,'to_call'=>$to_call]) }}">
                        @csrf

                      

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('警察専用番号') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <div class="error">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4 " style="margin-top:30px">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('支援者に連絡する') }}
                                </button>
                            </div>
                        </div>

                    </form>
                    <div class="submit_button">
                        <a href="{{ url('lost/ask') }}" target="_blank">警察専用番号が分からない警察関係者様</a>

                    </div>
                </div>
            </div>
       
        </div>
    </div>

</div>
@endsection
