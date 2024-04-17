<!doctype html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        :root {
            --primary-color: rgb(50, 90, 50);
            --primary-color-darker: rgb(50, 70, 50);
        }

        * {
            box-sizing: border-box;
            outline: none;
        }

        body {
            min-height: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: var(--primary-color);
            font-size: 1.3em;
            line-height: 1.5em;
        }

        .container {
            max-width: 640px;
            margin: 50px auto;
            border-radius: 10px;
            padding: 20px;
            background-color: white;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .listAddresses {
            max-width: 90%;
            margin: 50px auto;
            border-radius: 10px;
            padding: 20px;
            background-color: white;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        form input, form label, form button {
            display: block;
            width: 100%;
            margin-bottom: 20px;
        }

        form input {
            font-size: 24px;
            height: 40px;
            border-radius: 10px;
        }

        form input:focus {
            outline: 1px solid var(--primary-color);
        }

        form button {
            border: none;
            background: var(--primary-color);
            color: white;
            font-size: 18px;
            height: 50px;
            cursor: pointer;
            margin-top: 30px;
        }

        form button:hover {
            background: var(--primary-color-darker);
        }

        .listAddresses table {
            overflow-x: auto;
            table-layout: auto;
            white-space: nowrap;
        }

        .listAddresses th, td {
            padding: 3px;
            text-align: left;

        }
        th {
            width: 100%;
            font-size: 13px;
            background-color: #f2f2f2;
        }

        .welcome-text {
            text-align: center;
        }
    </style>
    <title>Address Crud</title>
</head>
<body>
    <div class="container">
        <h2 class="welcome-text">Bem vindo</h2>
        <p class="welcome-text">Gerenciador de endereços integrado com google maps</p>
        <form action="/" class="form" method="POST">
            @csrf
            <div style="display: flex; gap: 20px;">
                <div>
                <label for="zipCode">CEP</label>
                <input id="zipCode" type="text" name="zipCode" required>
                </div>
                <div style="width: 14%">
                    <label for="number">Número</label>
                    <input id="number" type="number" name="number">
                </div>
            </div>

            <div style="display: flex; gap: 20px;">
                <div>
                    <label for="state">Estado</label>
                    <input id="state" type="text" name="state">
                </div>
                <div>
                    <label for="city">Cidade</label>
                    <input id="city" type="text" name="city">
                </div>
                <div>
                    <label for="neighborhood">Bairro</label>
                    <input id="neighborhood" type="text" name="neighborhood">
                </div>
            </div>
            <label for="street">Logradouro</label>
            <input id="street" type="text" name="street">


            <button>Cadastrar</button>
        </form>
    </div>

    <div class="listAddresses">
        <table>
            @if(count($addresses) > 0)
            <thead>
            <tr>
                <th style="width: 10px">CEP</th>
                <th style="width: 10px">NÚMERO</th>
                <th style="width: 10px">ESTADO</th>
                <th style="width: 60px">CIDADE</th>
                <th style="width: 120px">BAIRRO</th>
                <th style="width: 10px">LOG</th>
                <th colspan="2" style="width: 10px; text-align: center">AÇÕES</th>
            </tr>
            </thead>
            <tbody>
                @foreach( $addresses as $address)
                    <tr>
                        <td>{{ $address['zipCode'] }}</td>
                        <td>{{ $address['number'] }}</td>
                        <td>{{ $address['state'] }}</td>
                        <td>{{ $address['city'] }}</td>
                        <td>{{ $address['neighborhood'] }}</td>
                        <td>{{ $address['street'] }}</td>
                        <td><a href="/delete/{{ $address['id'] }}">Deletar</a></td>
                        <td><a href="/delete/{{ $address['id'] }}">Editar</a></td>
                    </tr>
                @endforeach
            @else
                <p>Sem Registros...</p>
            @endif
            </tbody>
        </table>

    </div>
<script>
    const form = document.querySelector('form');
    const cepInput = form.querySelector('#zipCode');
    cepInput.addEventListener('change', function (e){
        buscarEnderecoPorCEP(e.target.value);
    });

    function buscarEnderecoPorCEP(cep) {
        const form = document.querySelector('form');
        const stateInput = form.querySelector('#state');
        const cityInput = form.querySelector('#city');
        const streetInput = form.querySelector('#street');
        const neighborhoodInput = form.querySelector('#neighborhood');

        const url = `https://viacep.com.br/ws/${cep}/json/`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao buscar endereço');
                }
                return response.json();
            })
            .then(data => {
                stateInput.value = data.uf;
                cityInput.value = data.localidade;
                neighborhoodInput.value = data.bairro;
                streetInput.value = data.logradouro;
            })
            .catch(error => {
                console.error('Erro ao buscar endereço:', error);
            });
    }
</script>
</body>
</html>