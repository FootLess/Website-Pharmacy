{* левый столбец *}

<div id="leftColumn" class="border-top-0 border-bottom-0 border border-success">

    <div id="leftMenu" class="nav flex-column">
        <div class="menuCaption text-center">Меню</div>
        {foreach $rsCategories as $item}
            <div class="dropright nav-item p-2 border border-bottom-0 border-left-0 border-right-0">
                <a href="?controller=category&id={$item['id']}" class="text-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{$item['name']}</a>
    
                {if isset($item['children'])}
                    <div class="dropdown-menu">
                        {foreach $item['children'] as $itemChild}
                            <a href="?controller=category&id={$itemChild['id']}" class="dropdown-item">{$itemChild['name']}</a>
                        {/foreach}
                    </div>
                {/if}
            </div>
        {/foreach}
    </div>

    <hr>

    <div class="row flex-column text-center">
        {if isset($arUser)}
            <div id="userBox" class="col">
                <a href="?controller=user" id="userLink">{$arUser['displayName']}</a><br>
                <a href="?controller=user&action=logout" onclick="logout();">Выход</a>
            </div>
    
        {else}
    
            <div id="userBox" class="hideme col">
                <a href="#" id="userLink"></a><br>
                <a href="?controller=user&action=logout">Выход</a>
            </div>
    
            {if ! isset($hideLoginBox)}
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
            {/if}
        {/if}
    </div>
    <hr>

    <div class="menuCaption text-center">Корзина</div>
    <div class="text-center pb-4">
        <a href="?controller=cart&action=index" title="Перейти в корзину">В корзине</a>
        <span id="cartCntItems">
            {if $cartCntItems>0}{$cartCntItems}{else}пусто{/if}
        </span>
    </div>
</div>