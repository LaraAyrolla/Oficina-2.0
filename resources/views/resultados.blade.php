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
            <div class="jumbotron col-md-10 bg-warning border mt-5">
                <div class="container">
                    <input class="form-control" name="_token" id="token" type="hidden" value="{{ csrf_token() }}"/>
                    <h1>Pesquisar Orçamento</h1>
                    <p> Resultados da pesquisa: </p>
                    @if(empty($orcamentos))
                        <div class="jumbotron alert-warning border mt-5" role="alert">
                            Nenhum orçamento encontrado! Digite novos filtros e tente novamente.
                        </div>
                    @else
                        <table class="table table-striped table-light">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Data</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Vendedor</th>
                                <th scope="col">Valor Orçado (R$)</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i=0; $i<(count($orcamentos)); $i++)
                                    <tr>
                                        <th scope="row">{{ $orcamentos[$i]->id }}</th>
                                        <td>{{ $orcamentos[$i]->data }}</td>
                                        <td>{{ $orcamentos[$i]->hora }}</td>
                                        <td>{{ $orcamentos[$i]->cliente }}</td>
                                        <td>{{ $orcamentos[$i]->vendedor }}</td>
                                        <td>{{ $orcamentos[$i]->valor_orcado }}</td>
                                        <td>{{ $orcamentos[$i]->descricao }}</td>
                                        <td><a href="{{url('/editar', $orcamentos[$i]->chave)}}" role= "button" class="btn btn-outline-primary">&#8811;</a></td>
                                        <td><a href="{{url('/resultados', $orcamentos[$i]->chave)}}" role= "button" class="btn btn-outline-primary">X</a></td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
