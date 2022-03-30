@extends('layouts.bo-teacher')

@section('content')

<div class="default-according" id="accordion">
    <div class="card">
      <div class="card-header card-header-tarefa collapsed" id="heading" data-bs-toggle="collapse"
        data-bs-target="#collapse" aria-expanded="false"
        aria-controls="collapse">
        <div class="row">
          <div class="col-8 col-xl-6">
            <h5 class="mb-0">
                Como faço login?
            </h5>
          </div>
          <div class="col-4 col-xl-6">
            <div class="row justify-content-end">
            </div>
          </div>
        </div>
      </div>
      <div class="collapse" id="collapse" aria-labelledby="heading"
        data-bs-parent="#accordion">
        <div class="card-body">
            <p>No ecrã principal, ao clicar em Entrar, somos dirigidos para uma área de autenticação onde temos a opção
                de fazer login na plataforma com o nosso username ou password, ou autenticar-mo-nos através do 365 da Microsoft.</p>
        </div>
      </div>
    </div>

    <div class="card">
        <div class="card-header card-header-tarefa collapsed" id="heading2" data-bs-toggle="collapse"
          data-bs-target="#collapse2" aria-expanded="false"
          aria-controls="collapse2">
          <div class="row">
            <div class="col-8 col-xl-6">
              <h5 class="mb-0">
                Este site funciona no meu telemóvel?
              </h5>
            </div>
            <div class="col-4 col-xl-6">
              <div class="row justify-content-end">
              </div>
            </div>
          </div>
        </div>
        <div class="collapse" id="collapse2" aria-labelledby="heading2"
          data-bs-parent="#accordion">
          <div class="card-body">
            <p>Sim, o site funciona em todas as plataformas.</p>
          </div>
        </div>
      </div>
    


  <div class="card">
    <div class="card-header card-header-tarefa collapsed" id="heading3" data-bs-toggle="collapse"
      data-bs-target="#collapse3" aria-expanded="false"
      aria-controls="collapse3">
      <div class="row">
        <div class="col-8 col-xl-6">
          <h5 class="mb-0">
            O que consigo fazer no site como formando?
          </h5>
        </div>
        <div class="col-4 col-xl-6">
          <div class="row justify-content-end">
          </div>
        </div>
      </div>
    </div>
    <div class="collapse" id="collapse3" aria-labelledby="heading3"
      data-bs-parent="#accordion">
      <div class="card-body">
        <p>Como formando tens acesso ao teu dashboard na plataforma onde podes visualizar as tuas tarefas que te foram atribuidas, fazer a entrega das tarefas, bem como avaliar os membros do teu grupo, numa escala de Likert, após a tarefa estar concluída.</p>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header card-header-tarefa collapsed" id="heading4" data-bs-toggle="collapse"
      data-bs-target="#collapse4" aria-expanded="false"
      aria-controls="collapse4">
      <div class="row">
        <div class="col-8 col-xl-6">
          <h5 class="mb-0">
            Como atribuo uma avaliação como formando?
          </h5>
        </div>
        <div class="col-4 col-xl-6">
          <div class="row justify-content-end">
          </div>
        </div>
      </div>
    </div>
    <div class="collapse" id="collapse4" aria-labelledby="heading4"
      data-bs-parent="#accordion">
      <div class="card-body">
        <p>No site encontra-se uma página dedicada à avaliação entre alunos, nessa página podes avaliar o/s teu/s colega/s de grupo numa escala de 0 a 4 (sendo 0 a pior nota possível e 4 a melhor) segundo os critérios gerais e também os critérios dados pelo formador.</p>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header card-header-tarefa collapsed" id="heading5" data-bs-toggle="collapse"
      data-bs-target="#collapse5" aria-expanded="false"
      aria-controls="collapse5">
      <div class="row">
        <div class="col-8 col-xl-6">
          <h5 class="mb-0">
            Posso escolher os elementos do meu grupo?
          </h5>
        </div>
        <div class="col-4 col-xl-6">
          <div class="row justify-content-end">
          </div>
        </div>
      </div>
    </div>
    <div class="collapse" id="collapse5" aria-labelledby="heading5"
      data-bs-parent="#accordion">
      <div class="card-body">
        <p>Não, só o formador pode criar grupos e os seus elementos.</p>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header card-header-tarefa collapsed" id="heading6" data-bs-toggle="collapse"
      data-bs-target="#collapse6" aria-expanded="false"
      aria-controls="collapse6">
      <div class="row">
        <div class="col-8 col-xl-6">
          <h5 class="mb-0">
            O que consigo fazer no site como Formador?
          </h5>
        </div>
        <div class="col-4 col-xl-6">
          <div class="row justify-content-end">
          </div>
        </div>
      </div>
    </div>
    <div class="collapse" id="collapse6" aria-labelledby="heading6"
      data-bs-parent="#accordion">
      <div class="card-body">
        <p>Na plataforma, o Formador terá a opção de criar novas tarefas e atribuí-las à turma, também poderá criar grupos de trabalho para os alunos no acto de criação de tarefas.</p>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header card-header-tarefa collapsed" id="heading7" data-bs-toggle="collapse"
      data-bs-target="#collapse7" aria-expanded="false"
      aria-controls="collapse7">
      <div class="row">
        <div class="col-8 col-xl-6">
          <h5 class="mb-0">
            Depois de criada a tarefa posso editá-la?
          </h5>
        </div>
        <div class="col-4 col-xl-6">
          <div class="row justify-content-end">
          </div>
        </div>
      </div>
    </div>
    <div class="collapse" id="collapse7" aria-labelledby="heading7"
      data-bs-parent="#accordion">
      <div class="card-body">
        <p>Sim, basta aceder à biblioteca de tarefas, escolher a tarefa, selecionar o botão Editar e a partir daí está tudo à sua escolha.</p>
      </div>
    </div>
  </div>
    
  <div class="card">
    <div class="card-header card-header-tarefa collapsed" id="heading8" data-bs-toggle="collapse"
      data-bs-target="#collapse8" aria-expanded="false"
      aria-controls="collapse8">
      <div class="row">
        <div class="col-8 col-xl-6">
          <h5 class="mb-0">
            Posso editar os grupos depois de criar e atribuir uma tarefa?
          </h5>
        </div>
        <div class="col-4 col-xl-6">
          <div class="row justify-content-end">
          </div>
        </div>
      </div>
    </div>
    <div class="collapse" id="collapse8" aria-labelledby="heading8"
      data-bs-parent="#accordion">
      <div class="card-body">
        <p>Sim.</p>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header card-header-tarefa collapsed" id="heading9" data-bs-toggle="collapse"
      data-bs-target="#collapse9" aria-expanded="false"
      aria-controls="collapse9">
      <div class="row">
        <div class="col-8 col-xl-6">
          <h5 class="mb-0">
            Qual a diferença entre ser formador e coordenador?
          </h5>
        </div>
        <div class="col-4 col-xl-6">
          <div class="row justify-content-end">
          </div>
        </div>
      </div>
    </div>
    <div class="collapse" id="collapse9" aria-labelledby="heading9"
      data-bs-parent="#accordion">
      <div class="card-body">
        <p>Não existem diferenças, um coordenador simplesmente é um formador com mais capacidades como por exemplo pode criar turmas, critérios, cursos adicionar alunos a uma turma, etc.</p>
      </div>
    </div>
  </div>

</div>   
    

@endsection