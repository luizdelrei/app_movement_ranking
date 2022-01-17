## Projeto Coding challenge Tecnofit

Desenvolvido por Luiz Del Rei Santos

### Instalando o projeto

#### Clonar o repositório

```
git clone https://github.com/luizdelrei/app_movement_ranking.git
```

#### Instalar as dependências

```
composer install
```

Ou em ambiente de desenvolvimento:

```
composer update
```

#### Criar arquivo de configuração de ambiente

Copiar o arquivo de exemplo `.env.example` para `.env` na raiz do projeto, configurar os detalhes da aplicação e conexão com o banco de dados.

#### Gerar Key arquivo .env

```
php artisan key:generate
```

#### Criar a estrutura no banco de dados

```
php artisan migrate
```

#### Populando o banco de dados

```
php artisan db:seed
```

#### Iniciar o servidor de desenvolvimento

```
php artisan serve
```

### Consumindo API

#### Rota da api de Ranking de movimento

```
/api/movement_ranking/{movement_id}
```
