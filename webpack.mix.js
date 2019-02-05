let mix = require('laravel-mix')

mix.setPublicPath('dist')
  .js('resources/js/nova-echo.js', 'js')
