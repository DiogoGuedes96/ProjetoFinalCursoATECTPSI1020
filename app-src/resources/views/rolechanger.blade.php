@extends('layouts.fo-app')

@section('content')
<div class="background_image d-flex align-items-center justify-content-center login-vh">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-mg-5 col-sm-5 m-auto">
                <div class="login-form p-5">
                    <form method="POST" action="{{ route('rolechange') }}" class="row g-4">
                        @csrf
                        <div class="col-12">
                            <h4 class="text-center">Escolha a função desejada:</h4>
                        </div>
                        <div class="col-12 text-center">
                            <div class="form-group m-t-15 custom-radio-ml">
                                @foreach ($roles as $role)
                                 <div class="radio radio-primary">
                                    <input id="radio1" type="radio" name="radio1" value="{{$role->profile_id}}">
                                    <label for="radio1">{{$role->profile_type}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
