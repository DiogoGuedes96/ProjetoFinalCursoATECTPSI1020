@extends('layouts.bo-student')

@section('content')
@php
$count = 0;
@endphp
@foreach ($group->group_users as $user)
@if ($user->user_id != auth()->user()->user_id)
@php
$count += 1;
@endphp
@if ($count == count($group->group_users)-1)
<div class="container-fluid animate__animated" style="display:none" id="comment_{{ $count }}">
    <div class="page-header py-3">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0 mx-0">
                    <h3>Justifique a sua avaliação</h3>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger" id="emptyText_{{$count}}" style="display:none">
                <p>É obrigatório o preenchimento da justificação.</p>
            </div>
            <div class="row">
                <div class="col-12">
                    <h6>{{ $user->user_name }}</h6>
                    <input type="text" name="user_id" value="{{$user->user_id}}" id="user_id_{{$count}}" hidden>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12 px-4 py-3">
                    <textarea rows="5" class="form-control" name="evaluation_comment_text" id="comment_text_area_{{$count}}" type="text" placeholder="Escreva um comentário..."></textarea>
                </div>
            </div>
            <div class="my-5 d-flex">
                <button type="button" class="btn btn-new" id="conclude_btn" data-id="{{$count}}">
                    Concluir
                </button>
            </div>
        </div>
    </div>
</div>
@else
<div class="container-fluid animate__animated" style="display:none" id="comment_{{ $count }}">
    <div class="page-header py-3">
        <div class="col-md-12 project-list">
            <div class="row">
                <div class="col-6 p-0 mx-0">
                    <h3>Justifique a sua avaliação</h3>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger" id="emptyText_{{$count}}" style="display:none">
                <p>É obrigatório o preenchimento da justificação.</p>
            </div>
            <div class="row">
                <div class="col-12">
                    <h6>{{ $user->user_name }}</h6>
                    <input type="text" name="user_id" value="{{$user->user_id}}" id="user_id_{{$count}}" hidden>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12 px-4 py-3">
                    <textarea rows="5" class="form-control" name="evaluation_comment_text" id="comment_text_area_{{$count}}" type="text" placeholder="Escreva um comentário..."></textarea>
                </div>
            </div>
            <div class="my-5 d-flex">
                <button type="button" class="btn btn-new" id="continue_btn" data-id="{{$count}}">
                    Continuar
                </button>
            </div>
        </div>
    </div>
</div>
@endif
@endif
@endforeach
<input type="text" id="taskid" value="{{ $task->task_id }}" hidden>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var comments = [];
    $(document).ready(function() {
        $("#comment_1").show();
    });

    $("#continue_btn").click(function (e) {
        e.preventDefault();

        var count = $(this).data("id");

        if ($("#comment_text_area_"+count).val().length > 0) {
            var comment = {
                user_comment: $("#comment_text_area_"+count).val(),
                user_id: $("#user_id_"+count).val(),
            }
            comments.push(comment);

            $("#comment_"+count).addClass("animate__slideOutLeft");
            setTimeout(function (){
                $("#comment_"+count).hide();
                $("#comment_"+(count+1)).show();
                $("#comment_"+(count+1)).addClass("animate__slideInRight");
            }, 1000);
        }else{
            $("#emptyText_"+count).show();
        }
    });

    $("#conclude_btn").click(function (e) {
        e.preventDefault();

        var count = $(this).data("id");
        var task = $("#taskid").val();

        if ($("#comment_text_area_"+count).val().length > 0) {
            var comment = {
                user_comment: $("#comment_text_area_"+count).val(),
                user_id: $("#user_id_"+count).val(),
            }
            comments.push(comment);

            comments = JSON.stringify({'comments':comments});

            $.ajax({
                type: "POST",
                url: "{{ route('studentsEvaluationsCommentsSave', $task->task_id) }}",
                data: comments,
                success: function(data){
                    window.location.replace("{{ route('studentsEvaluations') }}");
                },
                dataType: "json",
                contentType : "application/json"
            });
        }else{
            $("#emptyText_"+count).show();
        }
        
    });
</script>
@endsection