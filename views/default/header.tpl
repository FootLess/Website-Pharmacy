<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$pageTitle}</title>
    <link rel="stylesheet" href="{$TemplateWebPath}css/main.css" type="text/css">
    <script src="/www/js/jquery-3.5.1.min.js"></script>
    <script src="/www/js/main.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div id="header" class="p-2 bg-success text-dark">
        <a href="/" class="HeaderBrand d-flex justify-content-md-center">
            <img src="/www/images/products/Shop_Logo.png" class="Shop_Logo_Icon">
            <h1 class="p-1">МояАптека</h1>
        </a>
    </div>

    <div class="content container bg-light p-0">
        <div class="row">
            <div class="col-lg-3">
                {include file='leftcolumn.tpl'}
            </div>

            <div class="col-lg-9">
                <div id="centerColumn">