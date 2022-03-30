# Projeto Final - TPSI 1020


## Enquadramento

Desenvolvimento de uma plataforma de avaliação em pares online, no âmbito educacional, como projeto final da turma TPSI1020 - ATEC.

Este projeto tem em mente assegurar o dinamismo entre formandos/formador, proporcionar uma maior interação entre ambos na entrega e avaliação de projetos, de uma maneira imparcial.

## Descrição Genérica do Sistema

Uma plataforma com base em tecnologias web, que tem por objetivo a criação de um sistema que permite a estruturação e organização de projetos, bem como a sua avaliação.

Este ambiente proporciona uma avaliação de grupos e individual por parte do formador e formandos.


## Principais Funcionalidades

### Criação de grupos de trabalho

Possibilidade de criação de grupos de trabalho, atribuidos manualmente ou automaticamente, por escolha conjunta do formandos ou por parte do formador.

### Criação/Atribuição de projetos

O formador cria o projeto, tendo como opção a importação de um enunciado externo à aplicação ou a criação de um formulário interno.

Os projetos podem ser guardados num repositório exclusivo ao formador, sendo atribuidos e publicados posteriormente à turma e grupo selecionado.

### Entrega de projetos

Os alunos anexam o ficheiro na tarefa ou concluem o formulário publicado pelo formador, submetendo a versão final do projeto em grupo ou individualmente.

### Avaliação de projetos

O formador verifica e dá cotação de acordo com as diretrizes estabelecidas previamente e submete a avaliação do projeto.

### Avaliação individual/grupo

Os formandos atribuem a sua avaliação justificada ao grupo e aos intervenientes do mesmo.
A avaliação final será ponderada com base nas avaliações atribuidas por todos os intervenientes do processo de avaliação.

## Organização

O projeto é constituido por 3 equipas de trabalho, nas áreas de Base de Dados, Front-end e Back-end, cada um com representantes designados.


------------------------
## Road Map

- Início
- xxxx
- Fim: 12 Novembro 2021

## Planeamento Aulas
### Presenciais
- 19OUT, 16H00-23H00
- 28OUT, 16H00-23H00
- 05NOV, 16H00-23H00
- 12NOV, 16H00-23H00

### Não presenciais
- 21OUT, 16H00-23H00
- 25OUT, 16H00-23H00
- 02NOV, 16H00-23H00
- 08NOV, 16H00-23H00
- 09NOV, 21H00-23H00

## Documentos do Projeto

- [Software Requirments Specifications (SRS)](DocsProjeto/SRS.md)

## Material de Apoio
### Acerca da Avaliação entre Pares
#### Documentos
- [Documento - UNSW](https://www.teaching.unsw.edu.au/peer-assessment)
- [Documento - Peer Assessment in Online Courses](https://www.brown.edu/sheridan/teaching-learning-resources/teaching-resources/course-design/enhancing-student-learning-technology/peer-assessment-online-courses)
- [Documento - Ideas and Strategies for Peer Assessments](https://isit.arts.ubc.ca/ideas-and-strategies-for-peer-assessments/)
- [Documento - Implement peer assessment in online group projects (PDF)](https://www.getsmarter.com/blog/wp-content/uploads/2017/07/GS_WHITEPAPER_IMPLEMENTING-PEER-ASSESSMENT-IN-ONLINE-GROUP-PROJECTS-1.pdf)
- [Documento - Peer assessment of group work (PDF)](https://cpb-us-w2.wpmucdn.com/edblogs.columbia.edu/dist/8/1109/files/2017/10/2017.10.11.peerassessmentofgroupwork-15pz274.pdf)


#### Softwares similares
- [Peergrade.io](https://www.peergrade.io/)
- [TEAMMATES](https://teammatesv4.appspot.com/web/front/home)
- [CATME - Peer Evaluation](https://info.catme.org/features/peer-evaluation/)

### Normativos - Requisitos
- [Norma IEEE 830](./OutrosDocs/IEEE830.pdf)
- [Norma ISO 29148 - SRS](./OutrosDocs/iso-iec-ieee-29148-2011.pdf)

### Material de Consulta (Tutoriais)
#### Laravel
- [Laravel Cheat sheet](https://learninglaravel.net/cheatsheet/)
- [Laravel Docs](https://laravel.com/docs/8.x)
- [PlayList Laravel - João ribeiro](https://www.youtube.com/playlist?list=PLXik_5Br-zO9xlSwhhEDUGF81M5mgMUFQ)
- [Complete Laravel 8 Tutorial](https://www.youtube.com/watch?v=376vZ1wNYPA)
- [Laravel Blade Templates - Docs Oficiais](https://laravel.com/docs/8.x/blade)
- [Laravel Blade - Tutorial](https://www.cloudways.com/blog/create-laravel-blade-layout/)

#### Bootstrap
- [Bootstrap cheat sheet](https://bootstrap-cheatsheet.themeselection.com/)
- [Bootstrap 5 - Docs](https://getbootstrap.com/docs/5.0/getting-started/introduction/)

#### Markdown
- [Markdown cheat sheet](https://www.markdownguide.org/cheat-sheet/)
- [GitLab - MarkDown Guide](https://about.gitlab.com/handbook/markdown-guide/)
- [GitLab ToDo List](https://docs.gitlab.com/ee/user/todos.html)
- [GitLab Templates Markdown](https://docs.gitlab.com/ee/user/project/description_templates.html)

#### Git
- [Git Cheat sheet](https://education.github.com/git-cheat-sheet-education.pdf)
- [Git Book](https://git-scm.com/book/en/v2)

#### GitLab
- [GitLab docs](https://docs.gitlab.com/)
- [Agile com GitLab](https://about.gitlab.com/solutions/agile-delivery/)

### Instalação do ambiente
- **Composer** - [Instação](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04-pt)

- **Node JS e NPM**
    - https://nodejs.org/en/docs/
    - https://www.digitalocean.com/community/tutorials/how-to-install-node-js-on-ubuntu-20-04-pt
```bash
sudo apt update
sudo apt install nodejs
nodejs -v
```

```
# Output
v10.19.0
```

    - Instalar npm
```bash
sudo apt install npm
npm --version
```

```
#output
6.14.13
```
    - Criar um projeto laravel

`composer create-project --prefer-dist laravel/laravel nome_projeto`
