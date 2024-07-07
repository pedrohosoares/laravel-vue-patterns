<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layout.header')
    <body class="antialiased">
        <main id="app">
            <main-menu></main-menu>
            <post slug="{{ $slug }}"></post>
            <footer-page></footer-page>
        </main>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
