@extends('layouts.bo-coordinator')
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Coordenação</h3>
                </div>
                <div class="col-6 p-0">
                    <select class="form-select form-control" id="indexTurmas" name="class">
                        <option selected>Selecione uma turma</option>
                        @foreach ($classes as $class)
                            <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger" id="alert-no-class-selected" style="display:none">
                <ul>
                    <li>Selecione uma turma primeiro.</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="mb-0">
                                        Formadores
                                    </h5>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0 px-4 pb-3">
                            <div class="row justify-content-between">
                                <div class="col-10">
                                    <h6 class="pt-2">Adicionar Formador</h6>
                                </div>
                                <div class="col-2">
                                    <button onclick="teacherRedirect(document.getElementById('indexTurmas').options[document.getElementById('indexTurmas').selectedIndex].value, 'create')" type="button" class="btn btn-new p-1 d-flex justify-content-center">
                                        <i data-feather="plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row justify-content-between py-2">
                                <div class="col-10">
                                    <h6 class="pt-2">Ver formadores</h6>
                                </div>
                                <div class="col-2">
                                    <button onclick="teacherRedirect(document.getElementById('indexTurmas').options[document.getElementById('indexTurmas').selectedIndex].value, 'view')" type="button" class="btn btn-edit p-1 d-flex justify-content-center">
                                        <i data-feather="eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="mb-0">
                                        Alunos
                                    </h5>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        
                        <div class="card-body p-0 px-4 pb-3">
                            <div class="row justify-content-between">
                                <div class="col-10">
                                    <h6 class="pt-2">Adicionar aluno</h6>
                                </div>
                                <div class="col-2">
                                    <button onclick="studentsRedirect(document.getElementById('indexTurmas').options[document.getElementById('indexTurmas').selectedIndex].value, 'create')" type="button" class="btn btn-new p-1 d-flex justify-content-center">
                                        <i data-feather="plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row justify-content-between py-2">
                                <div class="col-10">
                                    <h6 class="pt-2">Ver alunos</h6>
                                </div>
                                <div class="col-2">
                                    <button onclick="studentsRedirect(document.getElementById('indexTurmas').options[document.getElementById('indexTurmas').selectedIndex].value, 'view')" type="button" class="btn btn-edit p-1 d-flex justify-content-center">
                                        <i data-feather="eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="mb-0">
                                        Critérios de turma
                                    </h5>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        
                        <div class="card-body p-0 px-4 pb-3">
                            <div class="row justify-content-between">
                                <div class="col-10">
                                    <h6 class="pt-2">Criar critérios</h6>
                                </div>
                                <div class="col-2">
                                    <button onclick="criteriaRedirect(document.getElementById('indexTurmas').options[document.getElementById('indexTurmas').selectedIndex].value, 'create')" type="button" class="btn btn-new p-1 d-flex justify-content-center">
                                        <i data-feather="plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row justify-content-between py-2">
                                <div class="col-10">
                                    <h6 class="pt-2">Ver critérios</h6>
                                </div>
                                <div class="col-2">
                                    <button onclick="criteriaRedirect(document.getElementById('indexTurmas').options[document.getElementById('indexTurmas').selectedIndex].value, 'view')" type="button" class="btn btn-edit p-1 d-flex justify-content-center">
                                        <i data-feather="eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    function teacherRedirect(turma, type) {
        if (turma == "Selecione uma turma") {
            document.getElementById("alert-no-class-selected").style.display = "block";
        }else{
            if (type == "create") {
                var url = '{{ route("coordinatorTeachersAdd", ":turma") }}';
            }else{
                var url = '{{ route("coordinatorTeachers", ":turma") }}';
            }

            url = url.replace(':turma', turma);

            window.location.href=url;
        }
    }
    function studentsRedirect(turma, type) {
        if (turma == "Selecione uma turma") {
            document.getElementById("alert-no-class-selected").style.display = "block";
        }else{
            if (type == "create") {
                var url = '{{ route("coordinatorStudentsAdd", ":turma") }}';
            }else{
                var url = '{{ route("coordinatorStudents", ":turma") }}';
            }

            url = url.replace(':turma', turma);

            window.location.href=url;
        }
    }
    function criteriaRedirect(turma, type) {
        if (turma == "Selecione uma turma") {
            document.getElementById("alert-no-class-selected").style.display = "block";
        }else{
            if (type == "create") {
                var url = '{{ route("coordinatorCriteriaAdd", ":turma") }}';
            }else{
                var url = '{{ route("coordinatorCriteria", ":turma") }}';
            }

            url = url.replace(':turma', turma);

            window.location.href=url;
        }
    }
</script>
<!-- Container-fluid ends-->
@endsection