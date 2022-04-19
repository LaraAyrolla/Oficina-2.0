<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Cadastro</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    </head>
    <body class="text-center">
        @if(!empty($success))
            @if($success=='true')
                <br>
                <div class="row justify-content-center">
                    <div class="jumbotron col-md-6 alert alert-success" role="alert">
                        <strong>Sucesso!</strong> O orçamento foi cadastrado.
                    </div>
                </div>
            @endif
            @if($success=='false')
                <br>
                <div class="row justify-content-center">
                    <div class="jumbotron col-md-6 alert alert-danger" role="alert">
                        <strong>Erro!</strong> Algo deu errado no cadastro. Por favor, tente novamente.
                    </div>
                </div>
            @endif
        @endif
        <div class="row justify-content-center"> 
            <div class="jumbotron col-md-6 bg-warning border mt-5">
                <div class="container">
                    <h1>Cadastro de Orçamento</h1>
                    <form action="\criar" method="POST">
                        <div class="form-group">
                            <input class="form-control" name="_token" id="token" type="hidden" value="{{ csrf_token() }}"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="chave" id="chave" type="hidden"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="ID" id="ID" required="true" placeholder="ID">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="cliente" id="cliente" required="true" placeholder="Nome do Cliente">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="data" id="data" required="true" type="date">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="hora" id="hora" required="true" type="time">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="vendedor" id="vendedor" required="true" placeholder="Nome do Vendedor">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="valorOrcado" id="valorOrcado" required="true" type="number" step="0.01" min="0" placeholder="Valor Orçado (R$)">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="descricao" id="descricao" required="true" rows="4" placeholder="Descrição"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark" type="submit">Concluir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
