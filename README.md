<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o Projeto (SUPRIR EPI API)

API em PHP (Laravel 12) para gestão de EPIs com controle de retirada por credenciais, regras por perfil/contrato, estoque por obra, relatórios e integração Power BI.

### Endpoints principais
- Autenticação: `POST /api/v1/auth/login`, `POST /api/v1/auth/logout`, `GET /api/v1/me`
- Funcionários: `GET/POST/PUT/DELETE /api/v1/employees`
- Estoque: `GET /api/v1/inventory?obra_id=...`
- Retiradas/Devoluções: `POST /api/v1/issues`, `POST /api/v1/returns`
- Relatórios: `GET /api/v1/reports/summary`, `GET /api/v1/reports/consumption`
- Power BI: `GET /api/v1/powerbi/embed-config`

### Setup rápido
1. Requisitos: PHP 8.2+, SQLite (padrão) ou MySQL/Postgres, Composer, Node (para front opcional).
2. Instalar deps: `composer install && npm install`
3. Copiar `.env`: `cp .env.example .env` e ajustar `APP_KEY`, DB e variáveis `PBI_*` se usar Power BI.
4. Banco: `php artisan migrate --seed`
5. Rodar: `php artisan serve` e acessar `http://localhost:8000`.

### Autenticação por token
1. Login: `POST /api/v1/auth/login` com `{ email, password }`.
2. Use o token Bearer nas chamadas seguintes: `Authorization: Bearer <token>`.

### Semeadura inicial
O seeder `DatabaseSeeder` cria usuário admin e dados de exemplo (obras, itens, estoques, consumos, contratos). Ajuste em `database/seeders` conforme necessidade.

---
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

