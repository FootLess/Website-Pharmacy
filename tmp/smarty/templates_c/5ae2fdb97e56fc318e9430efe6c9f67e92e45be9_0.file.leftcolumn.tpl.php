<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-08 17:56:29
  from 'F:\OpenServer\OpenServer\domains\Lesson\views\default\leftcolumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fcf941d645a89_53851416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ae2fdb97e56fc318e9430efe6c9f67e92e45be9' => 
    array (
      0 => 'F:\\OpenServer\\OpenServer\\domains\\Lesson\\views\\default\\leftcolumn.tpl',
      1 => 1607439387,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fcf941d645a89_53851416 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="leftColumn" class="border-top-0 border-bottom-0 border border-success">

    <div id="leftMenu" class="nav flex-column">
        <div class="menuCaption text-center">Меню</div>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <div class="dropright nav-item p-2 border border-bottom-0 border-left-0 border-right-0">
                <a href="?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="text-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
    
                <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['children']))) {?>
                    <div class="dropdown-menu">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild');
$_smarty_tpl->tpl_vars['itemChild']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->do_else = false;
?>
                            <a href="?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
" class="dropdown-item"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                <?php }?>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>

    <hr>

    <div class="row flex-column text-center">
        <?php if ((isset($_smarty_tpl->tpl_vars['arUser']->value))) {?>
            <div id="userBox" class="col">
                <a href="?controller=user" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br>
                <a href="?controller=user&action=logout" onclick="logout();">Выход</a>
            </div>
    
        <?php } else { ?>
    
            <div id="userBox" class="hideme col">
                <a href="#" id="userLink"></a><br>
                <a href="?controller=user&action=logout">Выход</a>
            </div>
    
            <?php if (!(isset($_smarty_tpl->tpl_vars['hideLoginBox']->value))) {?>
                <div id="loginBox" class="col">
                    <div class="menuCaption">Авторизация</div>
                    <input type="text" id="loginEmail" name="loginEmail" value=""><br>
                    <input type="password" id="loginPwd" name="loginPwd" value=""><br>
                    <input type="button" onclick="login()" value="Войти" class="btn btn-dark">
                </div>
        
        
        
                <div id="registerBox" class="col">
                    <div class="menuCaption showHidden"><a href="#" onclick="showRegisterBox(); return false;">Регистрация</a>
                    </div>
                    <div id="registerBoxHidden" style="display: none;">
                        email: <br />
                        <input type="text" id="email" name="email" value="" /><br />
                        пароль: <br />
                        <input type="password" id="pwd1" name="pwd1" value="" /><br />
                        повторить пароль: <br />
                        <input type="password" id="pwd2" name="pwd2" value="" /><br />
                        <input type="button" onclick="registerNewUser();" value="Зарегистрироваться" class="btn btn-dark" />
                    </div>
                </div>
            <?php }?>
        <?php }?>
    </div>
    <hr>

    <div class="menuCaption text-center">Корзина</div>
    <div class="text-center pb-4">
        <a href="?controller=cart&action=index" title="Перейти в корзину">В корзине</a>
        <span id="cartCntItems">
            <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {
echo $_smarty_tpl->tpl_vars['cartCntItems']->value;
} else { ?>пусто<?php }?>
        </span>
    </div>
</div><?php }
}
