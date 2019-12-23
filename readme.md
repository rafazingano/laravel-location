# CW Locations Laravel

Um pacote laravel de endereços

## Instalação
É necessário ter os pacotes JavaScripts do "DATATABLE" & "SELECT2" instalados. Incluir os pacotes JS e CSS abaixo.
```HTML
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<link type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js" type="text/javascript" charset="utf8"></script>
```

##Seeds
```php
php artisan db:seed --class="LocationsTableSeeder"
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
