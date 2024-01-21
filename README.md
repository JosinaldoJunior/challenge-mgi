<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About Project
Projeto desafio MGI.

**Tecnologias utilizadas:**
- **PHP 8**
- **Laravel 10**
- **PostgresSQL**
- **Docker**
- **PHPUnit**
- **Composer**

## Rodar aplicação local (DOCKER)

**1º rode o comando:**

```
make up
```

Deve subir os containers da aplicação e banco de dados.

**2º rode o comando:**

```
make install
```

Deve instalar as dependências da aplicação.

**3º rode o comando:**

```
make migrate
```

Deve rodar as migrations para criar a base de dados e as seeders para popular as tabelas.


## Rodar testes
Para executar os testes basta executar o comando abaixo:


```
make tests
```
