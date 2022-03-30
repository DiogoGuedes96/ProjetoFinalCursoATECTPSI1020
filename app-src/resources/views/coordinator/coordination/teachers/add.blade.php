@extends('layouts.bo-coordinator')
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Adicionar formadores a uma turma</h3>
                </div>
                <div class="col-6 p-0">
                    <div class="bookmark">
                        <ul>
                            <a href="{{ route('coordinatorDashboard') }}"><button class="btn btn-action mx-1">
                              Voltar <i data-feather="chevron-left"></i>
                            </button></a>
                            <a href="{{ route('coordinatorDashboard') }}"><button class="btn btn-action btn-action-mobile mx-1">
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
<!-- Container-fluid ends-->
<!-- Container-fluid starts-->
<div class="container-fluid">
    @if ($errors->any()) <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <br><br>
        <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
    </div>@endif
    <div id="alert-success" class="alert alert-success" role="alert" style="display:none"></div>
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                <label class="form-label input" for="indexTurmas">Turmas
                </label>
                <select class="form-select form-control" id="indexTurmas" readonly name="turma">
                    <option selected value="{{$class->class_id}}">{{$class->class_name}}</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                <label class="form-label input" for="select-Formador">Formador
                </label>
                <select class="form-select form-control" id="select-formador" name="teacher">
                    <option value="0" selected>Selecione uma formador</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{$teacher->user_id}}">{{$teacher->user_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row" id="ufcdsDiv">
        <div class="col-sm-6">
            <div class="mb-3" id="ufcdNotAssigned">
                <label class="form-label input" for="indexAluno">UFCDS por atribuir
                </label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3" id="ufcdAssigned">
                <label class="form-label input" for="indexAluno">UFCDS atribuídas
                </label>
            </div>
        </div>
    </div>
    <div class="col-sm-12 pt-5">
        <a href="{{ route('coordinatorDashboard') }}"><button class="btn btn-new" type="submit">Concluir</button></a>
    </div>
</div>
<script type="text/javascript">
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $("#select-formador").change(function(e){
  
        e.preventDefault();
   
        var teacher = $(this,':selected').val();
        var turma = $("#indexTurmas option:selected").val();

        if (teacher == "0") {
            $('input[type=checkbox]').attr('disabled', 'true');
            $("#ufcdAssigned").html('<label class="form-label input" for="indexAluno">UFCDS atribuídas</label>');
            $("#ufcdNotAssigned").html('<label class="form-label input" for="indexAluno">UFCDS por atribuir</label>');
        }else{
            $('input[type=checkbox]').removeAttr('disabled');
            $.ajax({
                type:'POST',
                url:"{{ route('coordinatorGetUFCD') }}",
                data:{teacher:teacher, turma:turma},
                success:function(data){
                    $("#ufcdAssigned").html('<label class="form-label input" for="indexAluno">UFCDS atribuídas</label>');
                    $("#ufcdNotAssigned").html('<label class="form-label input" for="indexAluno">UFCDS por atribuir</label>');
                    if (data.assigned != "[]") {
                        var assigned = JSON.parse(data.assigned)
                        $.each(assigned, function(i, item) {
                            $("#ufcdAssigned").append('<div class="checkbox checkbox-primary"><input checked class="assigned" id="checkbox_' + assigned[i].ufcd_number + '" value="' + assigned[i].ufcd_number + '" type="checkbox" name="assigned[]"><label for="checkbox_' + assigned[i].ufcd_number + '">' + assigned[i].ufcd_number + ' - ' + assigned[i].ufcd_name + '</label></div>');
                        });
                    }
                    if (data.notassigned != "[]") {
                        var notassigned = JSON.parse(data.notassigned)
                        $.each(notassigned, function(i, item) {
                            $("#ufcdNotAssigned").append('<div class="checkbox checkbox-primary"><input class="notassigned" id="checkbox_' + notassigned[i].ufcd_number + '" value="' + notassigned[i].ufcd_number + '" type="checkbox" name="notassigned[]"><label for="checkbox_' + notassigned[i].ufcd_number + '">' + notassigned[i].ufcd_number + ' - ' + notassigned[i].ufcd_name + '</label></div>');
                        })
                    }
                }
            });
        }
    });

    $( document ).on( "click", "input[type='checkbox']", function(e) {
        e.preventDefault();

        var teacher = $("#select-formador option:selected").val();
        var turma = $("#indexTurmas option:selected").val();
        var ufcd = $(this).val();

        if ($(this).hasClass("notassigned")) {
            $.ajax({
                type:'POST',
                url:"{{ route('coordinatorAddUFCD') }}",
                data:{teacher:teacher, turma:turma, ufcd:ufcd},
                success:function(data){
                    $("#ufcdAssigned").html('<label class="form-label input" for="indexAluno">UFCDS atribuídas</label>');
                    $("#ufcdNotAssigned").html('<label class="form-label input" for="indexAluno">UFCDS por atribuir</label>');
                    if (data.success != "[]") {
                        $('#alert-success').html(data.success);
                        $('#alert-success').fadeIn();
                    }
                    if (data.assigned != "[]") {
                        var assigned = JSON.parse(data.assigned)
                        $.each(assigned, function(i, item) {
                            $("#ufcdAssigned").append('<div class="checkbox checkbox-primary"><input checked class="assigned" id="checkbox_' + assigned[i].ufcd_number + '" value="' + assigned[i].ufcd_number + '" type="checkbox" name="assigned[]"><label for="checkbox_' + assigned[i].ufcd_number + '">' + assigned[i].ufcd_number + ' - ' + assigned[i].ufcd_name + '</label></div>');
                        });
                    }
                    if (data.notassigned != "[]") {
                        var notassigned = JSON.parse(data.notassigned)
                        $.each(notassigned, function(i, item) {
                            $("#ufcdNotAssigned").append('<div class="checkbox checkbox-primary"><input class="notassigned" id="checkbox_' + notassigned[i].ufcd_number + '" value="' + notassigned[i].ufcd_number + '" type="checkbox" name="notassigned[]"><label for="checkbox_' + notassigned[i].ufcd_number + '">' + notassigned[i].ufcd_number + ' - ' + notassigned[i].ufcd_name + '</label></div>');
                        })
                    }
                }
            });
        }else if($(this).hasClass("assigned")){
            $.ajax({
                type:'POST',
                url:"{{ route('coordinatorRemoveUFCD') }}",
                data:{teacher:teacher, turma:turma, ufcd:ufcd},
                success:function(data){
                    $("#ufcdAssigned").html('<label class="form-label input" for="indexAluno">UFCDS atribuídas</label>');
                    $("#ufcdNotAssigned").html('<label class="form-label input" for="indexAluno">UFCDS por atribuir</label>');
                    if (data.success != "[]") {
                        $('#alert-success').html(data.success);
                        $('#alert-success').show();
                    }
                    if (data.assigned != "[]") {
                        var assigned = JSON.parse(data.assigned)
                        $.each(assigned, function(i, item) {
                            $("#ufcdAssigned").append('<div class="checkbox checkbox-primary"><input checked class="assigned" id="checkbox_' + assigned[i].ufcd_number + '" value="' + assigned[i].ufcd_number + '" type="checkbox" name="assigned[]"><label for="checkbox_' + assigned[i].ufcd_number + '">' + assigned[i].ufcd_number + ' - ' + assigned[i].ufcd_name + '</label></div>');
                        });
                    }
                    if (data.notassigned != "[]") {
                        var notassigned = JSON.parse(data.notassigned)
                        $.each(notassigned, function(i, item) {
                            $("#ufcdNotAssigned").append('<div class="checkbox checkbox-primary"><input class="notassigned" id="checkbox_' + notassigned[i].ufcd_number + '" value="' + notassigned[i].ufcd_number + '" type="checkbox" name="notassigned[]"><label for="checkbox_' + notassigned[i].ufcd_number + '">' + notassigned[i].ufcd_number + ' - ' + notassigned[i].ufcd_name + '</label></div>');
                        })
                    }
                }
            });
        }
    })
</script>
@endsection