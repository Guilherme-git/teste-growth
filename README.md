<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Requisitos
> **`PHP => 8.3`**
>
> **`LARAVEL => 11`**

# PRIMEIRO PASSO
> *`Crie um arquivo .env`*
>
> **`Copie todo o conteudo do arquivo .env.example para o arquivio .env recém-criado`**
---

# Executando o projeto com LARAVEL SAIL
> **`Caso estiver utilizando o windows, baixe o respositório no seu ambiente WSL`**
>
> **`Esteja com o Docker instalado e inicializado`**

### Instalação do projeto
> **`Execute os comandos abaixo no seu terminal na raiz do projeto`**
>
> > **`composer install`**
>
> > **`./vendor/bin/sail php artisan key:generate`**
>
> > **`./vendor/bin/sail php artisan migrate`**
>
> > **`./vendor/bin/sail php artisan db:seed`**
>
> > **`./vendor/bin/sail up -d`**

### Incialização do projeto
> **`Execute o container criado pelo Laravel Sail`**
>
> > **`Acesse o painel do filament: localhost/admin`**

---
# Executando o projeto com XAMPP
> **`Baixe o repositório no seu ambiente xampp`**
>
> **`Inicialize o apache e mysql do seu xampp`**

### Instalação do projeto
> **`Execute os comandos abaixo no seu terminal na raiz do projeto`**
>
> > **`composer install`**
>
> > **`php artisan key:generate`**
>
> > **`php artisan migrate`**
>
> > **`php artisan db:seed`**

### Incialização do projeto
> **`Execute o comando abaixo`**
>
> > **`php artisan serve`**
>
> > **`Acesse o painel do filament: http://127.0.0.1:8000/admin`**
