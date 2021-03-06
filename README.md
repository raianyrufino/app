## Instalação 

Clonagem do diretório:
```
git clone https://github.com/raianyrufino/app
```

Acesse a raiz do projeto `cd app`;

Baixe as dependências do projeto via composer:
```
composer update
```

Configure o autoload
```
composer dump-autoload
```

## Configuração
Criação do arquivo de configuração local:
```
cp .env.example .env
```

Criação do `APP_KEY`:
```
php artisan key:generate
```

Dentro do arquivo gerado, o que deve ser alterado (O `APP_KEY` foi gerado automático no passo anterior):
```
APP_ENV=local
APP_DEBUG=true
APP_KEY=SomeRandomString
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

## Diagrama ER(Entidade Relacionamento)

![diagrama er](./diagrama.png)

Uma encomenda pertence a uma entrega.

## Executar Migrations
```
php artisan migrate
```

## Executar Aplicação
```
php artisan serve
```
