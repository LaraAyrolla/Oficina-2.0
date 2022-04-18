<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Editar</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body class="text-center">
        <div class="row justify-content-center">
            <div class="jumbotron col-md-6 bg-warning border mt-5">
                <div class="container">
                    <h1>Edição de Orçamento</h1>
                    <form action="\update" method="post">
                        <div class="form-group">
                            <input class="form-control" name="_token" id="token" type="hidden" value="{{ csrf_token() }}"/>
                        </div>
                        @foreach ($orcamentos as $orcamento)
                        <div class="form-group">
                            <input class="form-control" name="chave" id="chave" type="hidden" value="{{ $orcamento->chave }}"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="ID" id="ID" required="true" value="{{ $orcamento->id }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="cliente" id="cliente" required="true" value="{{ $orcamento->cliente }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="data" id="data" required="true" type="date" value="{{ $orcamento->data }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="hora" id="hora" required="true" type="time" value="{{ $orcamento->hora }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="vendedor" id="vendedor" required="true" value="{{ $orcamento->vendedor }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="valorOrcado" id="valorOrcado" required="true" type="number" value="{{ $orcamento->valor_orcado }}">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="descricao" id="descricao" required="true" rows="4">{{ $orcamento->descricao }}</textarea>
                        </div>
                        @endforeach
                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Concluir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
