@extends('layouts.bo-default')

@section('content')
<!-- Container-fluid starts-->
<div class="modal fade" id="modalFirstLogin" role="dialog" aria-labelledby="modalFirstLogin" aria-hidden="true">
    <form action="{{ route('firstLogin') }}" method="post">
        @csrf
        <input type="text" name="user_id" hidden value="{{ $user->user_id }}">
        <input type="text" name="user_id365" hidden value="{{ $user365_id }}">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5>Primeiro login</h5>
                    <hr>
                    <p>O seu nome, imagem de perfil e tipo de perfil foram atualizados através da ligação com o 365.</p>
                    <p>Defina uma nova password para ter a opção de login sem ligação ao 365.</p>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="input" for="textBoxPassword">Nova Password</label>
                                <input class="form-control" id="textBoxPassword" name="user_password" type="password">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="input" for="textBoxConfirm_Password">Confirmar Password</label>
                                <input class="form-control" id="textBoxConfirm_Password" type="password">
                                <p class="text-danger" id="text-validate-error" style="display:none">Ambos os campos têm de corresponder.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button class="btn btn-no" type="button" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-yes" id="confirm_btn" disabled type="submit">Confirmar password</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $(window).on('load', function() {
        $('#modalFirstLogin').modal('show');
    });
    $('#modalFirstLogin').on('hide.bs.modal', function (e) {
        window.location.replace('{{ route('home') }}');
    });
    $("#textBoxPassword").keyup(function () {
        var password = $("#textBoxPassword").val();
        var password1 = $("#textBoxConfirm_Password").val();
        if (password == password1) {
            $("#confirm_btn").attr('disabled' , false);
            $("#text-validate-error").hide();
        }
        else {
            $("#confirm_btn").attr('disabled' , true);
            $("#text-validate-error").show();
        }
    });
    $("#textBoxConfirm_Password").keyup(function () {
        var password = $("#textBoxPassword").val();
        var password1 = $("#textBoxConfirm_Password").val();
        if (password == password1) {
            $("#confirm_btn").attr('disabled' , false);
            $("#text-validate-error").hide();
        }
        else {
            $("#confirm_btn").attr('disabled' , true);
            $("#text-validate-error").show();
        }
    });
</script>
@endsection