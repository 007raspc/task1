<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HandheldFriendly" content="true"/>
    <meta name="MobileOptimized" content="width"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="yes" name="mobile-web-app-capable">
    <meta name="author" content="007raspc"/>
    <meta name="format-detection" content="telephone=no"/>
    <title>Page / QueryMarket</title>
    <!-- color theme -->
    <meta name="msapplication-navbutton-color" content="#292929">
    <meta name="apple-mobile-web-app-status-bar-style" content="#292929">
    <meta name="theme-color" content="#292929">
    <!-- Scripts -->
    @vite(['resources/css/app.css'])
</head>
<body>
<div id="app" class="wrapper"></div>
@vite(['resources/js/app.js'])
</body>
</html>
