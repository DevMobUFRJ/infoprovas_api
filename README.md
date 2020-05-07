# InfoProvas API
API/Backend do sistema do InfoProvas, consumida pelos apps e pelo site.

Feito com PHP 7.4 e Lumen, e banco de dados MySQL.

## Setup local
1. Instalar Apache, PHP, MariaDB e dependências: `sudo apt install apache2 mariadb-server php7.4 php7.4-common php7.4-cli php7.4-mbstring php7.4-mysql php7.4-zip php7.4-xml openssl curl`
2. Baixar o composer: `curl -sS https://getcomposer.org/installer -o composer-setup.php`
3. Instalar o composer: 'sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer'
4. Clonar o projeto para o seu computador (caso ainda não tenha feito).
5. Configurar usuário, senha e banco de dados do MySQL.
6. Configurar o arquivo `.env` com acesso do banco de dados.
7. Na pasta do projeto, executar: `composer install`


Run with: `php -S localhost:8000 -t public`
Access on `http://localhost:8000`