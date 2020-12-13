<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-08 17:36:46
  from 'F:\OpenServer\OpenServer\domains\Lesson\views\default\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fcf8f7eaddf78_93509188',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83423510df0fca4bc6549ce59340ef083a0bf072' => 
    array (
      0 => 'F:\\OpenServer\\OpenServer\\domains\\Lesson\\views\\default\\header.tpl',
      1 => 1607438178,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_5fcf8f7eaddf78_93509188 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['TemplateWebPath']->value;?>
css/main.css" type="text/css">
    <?php echo '<script'; ?>
 src="/www/js/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/www/js/main.js"><?php echo '</script'; ?>
>
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
                <?php $_smarty_tpl->_subTemplateRender('file:leftcolumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>

            <div class="col-lg-9">
                <div id="centerColumn"><?php }
}
