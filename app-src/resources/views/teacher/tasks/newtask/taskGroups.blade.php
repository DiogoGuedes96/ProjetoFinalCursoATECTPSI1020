@extends('layouts.bo-teacher')

@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="col-md-12 project-list">
                <div class="row">
                    <div class="col-6 p-0">
                        <h3 id="xpto" data-xpto="">Grupos de trabalho</h3>
                    </div>
                    <div class="col-6 p-0">
                        <div class="bookmark">
                            <ul>
                                <button disabled class="btn btn-action mx-2"><i data-feather="refresh-cw"></i></button>
                                <a href="{{ route('teacherDashboard') }}">
                                    <button class="btn btn-action mx-1">
                                        Voltar <i data-feather="chevron-left"></i>
                                    </button>
                                </a>
                                <a href="{{ route('teacherDashboard') }}">
                                    <button
                                        class="btn btn-action btn-action-mobile mx-1">
                                        <i data-feather="chevron-left"></i>
                                    </button>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <form action="{{ route('teacherNewTaskGroupSave', [$turma->class_id, $task->task_id]) }}" method="post">
        @csrf
    <div class="container-fluid py-3">
        <div class="row py-3">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-8 d-flex align-items-center justify-content-end">
                        <div class="form-check">
                            <button disabled class="btn btn-action mx-1">Atribuir Aleatoriamente</button>
                        </div>
                    </div>
                    <div class="col-sm-1 d-flex align-items-center justify-content-end">
                        <label class="form-label input">Nº Grupos</label>
                    </div>
                    <div class="col-sm-1 d-flex align-items-center justify-content-end">
                        <button id="minusCounter" class="btn btn-trash"><i class="bi bi-dash"></i></button>
                    </div>
                    <div class="col-sm-1">
                        <input id="counter" class="form-control text-center" name="num_groups" type="text" value="2">
                    </div>
                    <div class="col-sm-1">
                        <button id="plusCounter" class="btn btn-new"><i class="bi bi-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr class="table-head">
                                    <th colspan="6">Students</th>
                                </tr>
                                </thead>
                                <thead>
                                <tr>
                                    <th class="col-3">Name</th>
                                    <th class="col-3">Email</th>
                                    <th class="col-3 text-center">Rating</th>
                                    <th class="col-2 text-start">Grupo</th>
                                    <th class="col-1 text-center">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($turma->class_students as $student)
                                    <tr class="">
                                        <td>{{$student->user_name}}</td>
                                        <td class="email">{{$student->email}}</td>
                                        <td class="text-center">
                                            @for($c=0;$c<5;$c++)
                                                @if($student->user_rating > $c)
                                                    <i class="filled" data-feather="star"></i>
                                                @else
                                                    <i data-feather="star"></i>
                                                @endif
                                            @endfor
                                        </td>
                                        <td>
                                            <select class="form-select form-control" id="group" name="groups[]">
                                                <option value="1">Grupo 1</option>
                                                <option value="2">Grupo 2</option>
                                            </select>
                                        </td>
                                        <td class="text-center"><a id="removeUser"><i
                                                    class="icon-delete bi bi-trash"></i></a></td>
                                        <input type="text" name="users[]" hidden value="{{ $student->user_id }}">
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 py-5">
                        <button type="submit" class="btn btn-new">Avançar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $("#removeUser").click(function (e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        })
        $("#minusCounter").click(function (e) {
            e.preventDefault();
            var maxValue = parseInt($("#counter").val());
            $("#group option[value='" + maxValue + "']").each(function () {
                $(this).remove();
            });
            $("#counter").val($("#counter").val() - 1);
        })
        $("#plusCounter").click(function (e) {
            e.preventDefault();
            $("#counter").val(parseInt($("#counter").val()) + 1);
            $("select[id='group']").each(function () {
                $(this).append($('<option>', {
                    value: parseInt($("#counter").val()),
                    text: 'Group ' + parseInt($("#counter").val())
                }));
            })
        })
    </script>
@endsection
