@extends('layouts.bo-teacher')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0">
                    <h3>Biblioteca de critérios</h3>
                </div>
                <div class="col-6 p-0">
                    <div class="bookmark">
                        <ul>
                            <a href="{{ route('teacherCriteriaNew') }}"><button class="btn btn-new btn-new-tarefa-mobile mx-1">
                                <i data-feather="plus"></i>
                            </button></a>
                            <a href="{{ route('teacherCriteriaNew') }}"><button class="btn btn-new btn-new-tarefa mx-1">
                                Novo Critério
                            </button></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="container-fluid">
    @if($msg=Session::get('sucesso'))
        <div class="alert alert-success" role="alert">
            {{ $msg }}
        </div>
    @endif
    <form method="POST">
        <div class="col-sm-12 py-3">
            <div class="default-according" id="accordion">
                @foreach ($courseCriteria as $criteria)
                <div class="card">
                    <div class="card-header card-header-tarefa collapsed" id="{{$criteria->teacher_criteria_id}}headingOne" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne{{ $criteria->teacher_criteria_id}}" aria-expanded="false" aria-controls="collapseOne">
                        <div class="row">
                            <div class="col-8 col-xl-6">
                                <h5 class="mb-0">
                                    {{ $criteria->teacher_criteria_name }}
                                </h5>
                                <hr class="validade-mobile">

                            </div>
                            <div class="col-4 col-xl-6">
                                <div class="row justify-content-end">
                                    <h6 class="validade mt-2 text-end col-xl-6">{{ $criteria->criteria_scale->scale_name}}</h6>
                                    <a href="{{ route('teacherCriteriaEdit', $criteria->teacher_criteria_id) }}" class="btn btn-edit p-0 mx-xl-3 my-2 my-sm-0 col-12 col-md-3 col-xl-1 d-flex align-items-center justify-content-center">
                                        <i data-feather="edit"></i>
                                    </a>
                                    <a href="{{ route('teacherCriteriaDelete', $criteria->teacher_criteria_id) }}" class="btn btn-trash p-0 col-12 col-md-3 col-xl-1 d-flex align-items-center justify-content-center">
                                        <i data-feather="trash-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collapseOne{{ $criteria->teacher_criteria_id}}" aria-labelledby="{{ $criteria->teacher_criteria_id}}headingOne" data-bs-parent="#accordion"
                    style="">
                        <div class="card-body">
                            <p>{{ $criteria->teacher_criteria_text }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </form>
</div>
@endsection
