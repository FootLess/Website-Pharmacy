<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-06 15:41:02
  from 'F:\OpenServer\OpenServer\domains\Lesson\views\admin\adminLeftcolumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fccd15e135894_92199609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4cfd5c0bad1a6bc748f7762bf64e5173ae3077e' => 
    array (
      0 => 'F:\\OpenServer\\OpenServer\\domains\\Lesson\\views\\admin\\adminLeftcolumn.tpl',
      1 => 1607258460,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fccd15e135894_92199609 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-sm">
    <div id="leftColumn">
        <div id="leftMenu">
            <div class="menuCaption">Меню:</div>
            <a href="?controller=admin">Главная</a><br>
            <a href="?controller=admin&action=category">Категории</a><br>
            <a href="?controller=admin&action=products">Товар</a><br>
            <a href="?controller=admin&action=orders">Заказы</a><br>
        </div>
        <div>
            <a href="?controller=admin&action=logoutadmin" class="btn btn-primary">Выход из админки</a>
        </div>
    </div>
</div><?php }
}
