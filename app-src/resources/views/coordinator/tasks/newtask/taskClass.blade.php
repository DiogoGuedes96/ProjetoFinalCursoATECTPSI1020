@extends('layouts.bo-coordinator')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Grupos de trabalho</h3>
                </div>
                <div class="col-6 p-0">
                    <div class="bookmark">
                        <ul>
                            <button class="btn btn-action mx-2"><i data-feather="refresh-cw"></i></button>
                            <a href="{{ route('teacherDashboard') }}"><button class="btn btn-action mx-1">
                                    Voltar <i data-feather="chevron-left"></i>
                                </button></a>
                            <a href="{{ route('teacherDashboard') }}"><button
                                    class="btn btn-action btn-action-mobile mx-1">
                                    <i data-feather="chevron-left"></i>
                                </button></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="modal fade" id="select_turma_modal" tabindex="-1" role="dialog" aria-labelledby="select_turma_modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="alert alert-danger" id="alert-no-class-selected" style="display:none">
                    <ul>
                        <li>Selecione uma turma primeiro.</li>
                    </ul>
                </div>
                <label class="form-label input" for="select-turma">Escolha a turma a qual quer aplicar esta
                    tarefa:</label>
                <select class="form-select form-control" id="select-turma" name="class_id">
                    <option value="0" selected>Selecione uma Turma</option>
                    @foreach ($classes as $class)
                    <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                    @endforeach
                </select>
                <hr>
                <div id="ufcdsDiv">
                    <label class="form-label input" for="indexTurmas">Escolha a UFCD a qual deseja aplicar esta
                        tarefa:</label>
                </div>
            </div>
            <div class="modal-footer text-center">
                <a
                    onclick="coordinatorRedirect(document.getElementById('select-turma').options[document.getElementById('select-turma').selectedIndex].value)"><button
                        class="btn btn-new" type="button">Continuar</button></a>
            </div>
        </div>
    </div>
</div>
<script>
    $(window).on('load', function() {
        $('#select_turma_modal').modal('show');
    });
    $('#select_turma_modal').on('hide.bs.modal', function (e) {
        window.location.replace('{{ route('coordinatorDashboard') }}');
    });
    function coordinatorRedirect(turma) {
        if (turma == "0") {
            document.getElementById("alert-no-class-selected").style.display = "block";
        }else{
            var url = '{{ route("coordinatorNewTaskGroup", [":turma", ":task", ":ufcd"]) }}';
            var ufcd = $('input[name="ufcd"]:checked').val();

            url = url.replace(':turma', turma);

            url = url.replace(':task', {{ $task->task_id }});

            url = url.replace(':ufcd', ufcd);

            window.location.href=url;
        }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#select-turma").change(function(e){
  
        e.preventDefault();

        var turma = $(this).val();
        var teacher = {{ auth()->user()->user_id }};
        $.ajax({
            type:'POST',
            url:"{{ route('coordinatorGetUFCD') }}",
            data:{teacher:teacher, turma:turma},
            success:function(data){
                $("#ufcdsDiv").html('<label class="form-label input" for="indexTurmas">Escolha a UFCD a qual deseja aplicar esta tarefa:</label>');
                if (data.assigned != "") {
                    var assigned = JSON.parse(data.assigned)
                    $.each(assigned, function(i, item) {
                        $("#ufcdsDiv").append('<div class="form-check"><input class="form-check-input" type="radio" name="ufcd" id="checkbox_' + assigned[i].ufcd_number + '" value="' + assigned[i].ufcd_number + '"><label class="form-check-label" for="checkbox_' + assigned[i].ufcd_number + '">' + assigned[i].ufcd_number + ' - ' + assigned[i].ufcd_name + '</label></div>');
                    });
                }
            }
        });
    });
</script>
@endsection