
# Setup Docker com Autenticação Laravel Sanctum Para Projetos Laravel (11)
[Inspirado em EspecializaTI](https://academy.especializati.com.br)

### Passo a passo

Clone o repositório

Crie o Arquivo .env
```sh
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME="Laravel 11 com Autenticação"
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root

Suba os containers do projeto
```sh
docker-compose up -d
```


Acessar o container
```sh
docker-compose exec app bash
```


Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

Rodar as migrations
```sh
php artisan migrate
```

Acessar o projeto
[http://localhost:8989](http://localhost:8989)

Importar a collection de rotas que est�o na raiz do projeto em: 

```json
Auth.postman_collection.json
```
