@extends('layouts.fo-app')

@section('content')
    <div class="background_image d-flex align-items-center justify-content-center login-vh">
        <div class="container">
            <div class="row">
                <div class=""> <!-- col-lg-5 col-mg-5 col-sm-5 col-sm-8 m-auto -->
                    <div class="row starter-main">
                        <div class="col-sm-12">
                            <div class="card p-5">
                                <div class="card-header pt-4">
                                    <h1>PEER EVALUATION ATEC</h1>
                                </div>
                                <div class="card-body pt-4">
                                    <p>
                                        Plataforma de avaliação em pares online, no âmbito educacional, como projeto final da turma TPSI1020 - ATEC.
                                    </p>
                                    <p>
                                        Este projeto tem em mente assegurar o dinamismo entre formandos/formador, proporcionar uma maior interação entre ambos na entrega e avaliação de projetos, de uma maneira imparcial.
                                    </p>
                                    <a href="{{ route('login') }}"><button class="btn btn-primary" type="button">Entrar <i data-feather="chevrons-right"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
