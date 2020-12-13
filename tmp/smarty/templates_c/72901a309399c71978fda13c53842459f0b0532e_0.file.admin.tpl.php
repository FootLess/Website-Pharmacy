<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-04 04:21:03
  from 'F:\OpenServer\OpenServer\domains\Lesson\views\admin\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc98eff0a26f5_33168264',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72901a309399c71978fda13c53842459f0b0532e' => 
    array (
      0 => 'F:\\OpenServer\\OpenServer\\domains\\Lesson\\views\\admin\\admin.tpl',
      1 => 1607044830,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc98eff0a26f5_33168264 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-sm">
    <div id="blockNewCategory">
        Новая категория:
        <input type="text" name="newCategoryName" id="newCategoryName" value="">
        <br>

        Является подкатегория для
        <select name="generalCatId" class="form-control form-control-sm">
            <option value="0">Главная категория
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
        <br>
        <input type="button" onclick="newCategory()" value="Добавить категорию">
    </div>
</div>
<?php }
}
