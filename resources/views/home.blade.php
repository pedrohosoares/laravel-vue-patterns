<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layout.header')
    <body>
        <main id="app">
            <main-menu home="{{ route('home') }}"></main-menu>
            <content-page cat_id="null" category="null"></content-page>
            <footer-page></footer-page>
        </main>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
