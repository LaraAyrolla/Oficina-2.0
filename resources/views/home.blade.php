<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Oficina 2.0</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body class="text-center">
        @if(!empty($success))
            @if($success=='true')
                <br>
                <div class="row justify-content-center">
                    <div class="jumbotron col-md-6 alert alert-success" role="alert">
                        <strong>Sucesso!</strong> O orçamento foi atualizado.
                    </div>
                </div>
            @endif
            @if($success=='false')
                <br>
                <div class="row justify-content-center">
                    <div class="jumbotron col-md-6 alert alert-danger" role="alert">
                        <strong>Erro!</strong> Algo deu errado. Por favor, tente novamente.
                    </div>
                </div>
            @endif
        @endif
        @if(!empty($successdel))
            @if($successdel=='true')
                <br>
                <div class="row justify-content-center">
                    <div class="jumbotron col-md-6 alert alert-success" role="alert">
                        <strong>Sucesso!</strong> O orçamento foi apagado.
                    </div>
                </div>
            @endif
            @if($successdel=='false')
                <br>
                <div class="row justify-content-center">
                    <div class="jumbotron col-md-6 alert alert-danger" role="alert">
                        <strong>Erro!</strong> Algo deu errado. Por favor, tente novamente.
                    </div>
                </div>
            @endif
        @endif
        <div class="row justify-content-center">
            <div class="jumbotron col-md-6 bg-warning border mt-5">
                <h1 class="display-4">Oficina 2.0</h1>
                <p class="lead">Sistema de gerenciamento de orçamentos</p>
                <hr class="my-4">
                <p>Para cadastrar novos orçamentos ou consultar orçamentos existentes, selecione uma das opções abaixo:</p>
                <p class="lead">
                    <a class="btn btn-dark btn-lg" href="\cadastro" role="button">Novo Orçamento</a>
                    <a class="btn btn-dark btn-lg" href="\pesquisa" role="button">Pesquisar Orçamento</a>
                </p>
            </div>
        </div>
    </body>
</html>
