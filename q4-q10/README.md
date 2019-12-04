## Informações

### Questão 4
A plataforma instalada:

- Laravel 6
- Mysql 5.7

### Questão 5
#### Cadastro de usuário
- ***method:*** POST
- ***endpoint:*** _/api/users_ 
- ***headers:*** Content-Type: application/json, X-Requested-With, XMLHttpRequest



### Questão 6

#### Listagem de usuários
- ***method:*** GET
- ***endpoint:*** _/api/users_ 
- ***headers:*** Accept: application/json

### Questão 7

#### Detalhes de um usuário
- ***method:*** GET
- ***endpoint:*** _/api/users/{id}_ 
- ***headers:*** Accept: application/json


### Questão 8

#### Atualizar um usuário
- ***method:*** PUT
- ***endpoint:*** _/api/users_/{id}
- ***params:*** { name: string, username: string, email: string, phone: string, address: object } 
- ***headers:*** Content-Type: application/json, X-Requested-With, XMLHttpRequest


### Questão 9
#### Deletar um usuário
- ***method:*** DELETE
- ***endpoint:*** _/api/users_/{id}
- ***headers:*** Content-Type: application/json, X-Requested-With, XMLHttpRequest


### Questão 10
- No cadastro do usuário agora é possível passar como parâmetro o **password: _string_**
- Rotas de listagem, atualização e deleção foram protegidas. Para 
ter acesso a esses recursos o usuário deve informar como 
parametro o ***api_token*** que é retornado no cadastro.

- Caso necessário o ***api_token*** pode ser requisitado em ***POST /api/auth/get_token***, 
passando como parâmetros {**email: _string_**, **passsword: _string_**}.

- Foi implementado um sistema de busca em ***GET /api/users***: o cliente pode filtrar os resultados passando 
como parametros **{username: _string_, name: _string_}**

### Melhorias Futuras
- Dependendo do problema em questão pode ser realizada a implementação de um sistema de autenticação mais
sofisticado como JWT

- Em muitas situações o banco de dados pode ter consultas pesadas, ou muito acesso dependendo do negócio. 
Nesta situação podemos implementar um sistema de cache com o Redis ou Memcached

- O cadastro de usuário pode ser uma parte crucial do negócio. Neste caso a implementação 
de um **log** caso haja algum problema no servidor ou alguma regra não coberta por testes. Sabendo que os 
existem níveis de **log**, em casos mais críticos é interessante fazer uma integração com 
Telegram ou qualquer outro aplicativo de mensageria.

