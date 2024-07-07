<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layout.header')
    <body>
        <main id="app">
            <main-menu home="{{ route('home') }}"></main-menu>
            <content-page cat_id="{{ $id }}" category="{{ $id }}"></content-page>
            <a href="/" class="link">Voltar</a>
            <footer-page></footer-page>
        </main>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
