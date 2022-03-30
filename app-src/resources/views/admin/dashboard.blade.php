@extends('layouts.bo-admin')

@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Administração</h3>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<!-- Container-fluid ends-->
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="mb-0">
                                        Cursos
                                    </h5>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0 px-4 pb-3">
                            <div class="row justify-content-between">
                                <div class="col-10">
                                    <h6 class="pt-2">Criar novo curso</h6>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('adminCoursesCreate') }}"><button class="btn btn-new p-1 d-flex align-items-center justify-content-center">
                                        <i data-feather="plus"></i>
                                    </button></a>
                                </div>
                            </div>
                            <div class="row justify-content-between py-2">
                                <div class="col-10">
                                    <h6 class="pt-2">Ver cursos</h6>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('adminCoursesAll') }}"><button class="btn btn btn-edit p-1 d-flex align-items-center justify-content-center p-1 d-flex align-items-center justify-content-center">
                                        <i data-feather="eye"></i>
                                    </button></a>
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
                                        Turmas
                                    </h5>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0 px-4 pb-3">
                            <div class="row justify-content-between">
                                <div class="col-10">
                                    <h6 class="pt-2">Criar nova turma</h6>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('adminClassesCreate') }}"><button class="btn btn-new p-1 d-flex align-items-center justify-content-center d-flex align-items-center justify-content-center">
                                        <i data-feather="plus"></i>
                                    </button></a>
                                </div>
                            </div>
                            <div class="row justify-content-between py-2">
                                <div class="col-10">
                                    <h6 class="pt-2">Ver turmas</h6>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('adminClassesAll') }}"><button class="btn btn btn-edit p-1 d-flex align-items-center justify-content-center p-1">
                                        <i data-feather="eye"></i>
                                    </button></a>
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
                                        Utilizadores
                                    </h5>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0 px-4 pb-3">
                            <div class="row justify-content-between">
                                <div class="col-10">
                                    <h6 class="pt-2">Criar novo utilizador</h6>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('adminUsersCreate') }}"><button class="btn btn-new p-1 d-flex align-items-center justify-content-center d-flex align-items-center justify-content-center">
                                        <i data-feather="plus"></i>
                                    </button></a>
                                </div>
                            </div>
                            <div class="row justify-content-between py-2">
                                <div class="col-10">
                                    <h6 class="pt-2">Ver utilizador</h6>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('adminUsersAll') }}"><button class="btn btn btn-edit p-1 d-flex align-items-center justify-content-center p-1">
                                        <i data-feather="eye"></i>
                                    </button></a>
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
                                        UFCD
                                    </h5>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0 px-4 pb-3">
                            <div class="row justify-content-between">
                                <div class="col-10">
                                    <h6 class="pt-2">Criar nova UFCD</h6>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('adminUfcdNew') }}"><button class="btn btn-new p-1 d-flex align-items-center justify-content-center d-flex align-items-center justify-content-center">
                                        <i data-feather="plus"></i>
                                    </button></a>
                                </div>
                            </div>
                            <div class="row justify-content-between py-2">
                                <div class="col-10">
                                    <h6 class="pt-2">Ver UFCDs</h6>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('adminUfcdAll') }}"><button class="btn btn btn-edit p-1 d-flex align-items-center justify-content-center p-1">
                                        <i data-feather="eye"></i>
                                    </button></a>
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
                                        Curriculos
                                    </h5>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0 px-4 pb-3">
                            <div class="row justify-content-between">
                                <div class="col-10">
                                    <h6 class="pt-2">Criar novo curriculo</h6>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('adminCurriculumNew') }}"><button class="btn btn-new p-1 d-flex align-items-center justify-content-center d-flex align-items-center justify-content-center">
                                        <i data-feather="plus"></i>
                                    </button></a>
                                </div>
                            </div>
                            <div class="row justify-content-between py-2">
                                <div class="col-10">
                                    <h6 class="pt-2">Ver curriculos</h6>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('adminCurriculumAll') }}"><button class="btn btn btn-edit p-1 d-flex align-items-center justify-content-center p-1">
                                        <i data-feather="eye"></i>
                                    </button></a>
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
                                        Critérios
                                    </h5>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0 px-4">
                            <div class="row justify-content-between">
                                <div class="col-10">
                                    <h6 class="pt-2">Criar novos critérios gerais</h6>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('adminGeneralCriteriaNew') }}"><button class="btn btn-new p-1 d-flex align-items-center justify-content-center d-flex align-items-center justify-content-center">
                                        <i data-feather="plus"></i>
                                    </button></a>
                                </div>
                            </div>
                            <div class="row justify-content-between py-2">
                                <div class="col-10">
                                    <h6 class="pt-2">Ver critérios gerais</h6>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('adminGeneralCriteriaAll') }}"><button class="btn btn btn-edit p-1 d-flex align-items-center justify-content-center p-1">
                                        <i data-feather="eye"></i>
                                    </button></a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body p-0 px-4 pb-3">
                            <div class="row justify-content-between">
                                <div class="col-10">
                                    <h6 class="pt-2">Criar novos critérios de curso</h6>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('adminCourseCriteriaNew') }}"><button class="btn btn-new p-1 d-flex align-items-center justify-content-center d-flex align-items-center justify-content-center">
                                        <i data-feather="plus"></i>
                                    </button></a>
                                </div>
                            </div>
                            <div class="row justify-content-between py-2">
                                <div class="col-10">
                                    <h6 class="pt-2">Ver critérios de curso</h6>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('adminCourseCriteriaAll') }}"><button class="btn btn btn-edit p-1 d-flex align-items-center justify-content-center p-1">
                                        <i data-feather="eye"></i>
                                    </button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid ends-->
@endsection