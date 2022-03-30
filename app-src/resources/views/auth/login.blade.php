@extends('layouts.fo-app')

@section('content')
<div class="background_image d-flex align-items-center justify-content-center login-vh">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-mg-5 col-sm-5 m-auto">
                <div class="login-form p-5">
                    <form method="POST" action="{{ route('login') }}" class="row g-4">
                        @csrf
                        <h4 class="text-center">Autenticação</h4>
                        <div class="col-12">
                            <label>Email</label>
                            <input type="email" class="form-control textbox @error('email') is-invalid @enderror" name="email" required >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label>Password</label>
                            <input type="password" class="form-control textbox @error('password') is-invalid @enderror" required name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary px-5">Login</button>
                        </div>
                        <div class="col-12 text-center" style="font-weight: bolder;">
                            <div class="strike">
                                <span>OR</span> 
                            </div>
                        </div>
                        @if ($msg=Session::get('error'))
                        <div class="col-12 text-center">
                            <h6 class="text-danger"><b>{{$msg}}</b></h6>
                            @if ($details=Session::get('errorDetail'))
                                <p><i>{{$details}}</i></p>
                            @endif
                        </div>
                        @endif
                        <div class="col-12 text-center">
                            <button type="button" onclick="window.location.replace('{{ route('connect365') }}')" class="btn btn-secondary">Login With ATEC 365</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection