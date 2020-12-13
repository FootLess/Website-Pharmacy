{* Шаблон главной страницы *}
<h1>{$pageTitle}</h1>
<div class="row">
    {foreach $rsProducts as $item name=products}
    {if $item['status'] == 1}
    <div class="col-lg-2 border border-secondary m-2 p-3" style="max-width: 15.5%;">
        <a href="?controller=product&id={$item['id']}/">
            <img src="../www/images/products/{$item['image']}">
        </a>
        <a href="?controller=product&id={$item['id']}/">{$item['name']}</a>
    </div>
    {/if}
    {/foreach}
</div>