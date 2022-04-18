<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Cadastro</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body class="text-center">
        <div class="row justify-content-center">
            <div class="jumbotron col-md-6 bg-warning border mt-5">
                <div class="container">
                    <h1>Pesquisar Orçamento</h1>
                    <p> Selecione abaixo os filtros desejados. Deixe em branco para mostrar todos os orçamentos cadastrados no sistema. </p>
                    <hr class="my-4">
                    <form action="\resultados" method="POST">
                        <div class="form-group">
                            <input class="form-control" name="_token" id="token" type="hidden" value="{{ csrf_token() }}"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="cliente" id="cliente-pesquisa" placeholder="Nome do Cliente">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="vendedor" id="vendedor-pesquisa" placeholder="Nome do Vendedor">
                        </div>
                        <label> Intervalo de Datas: </label>
                        <div class="form-row">
                            <div class="col">
                                <input class="form-control" name="data-inicial" id="data-inicial-pesquisa" type="date">
                            </div>
                            <div class="col">
                                <input class="form-control" name="data-final" id="data-final-pesquisa" type="date">
                            </div>
                        </div>
                        <br/>
                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Pesquisar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
