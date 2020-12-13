{* страница продукта *}
<h3>{$rsProduct['name']}</h3>

<img src="/www/images/products/{$rsProduct['image']}" alt="" width="575">
<div>
Стоимость : {$rsProduct['price']}

<a id="removeCart_{$rsProduct['id']}" {if !$itemInCart}class="hideme" {/if} onclick="removeFromCart({$rsProduct['id']}); return false;" href="#" alt="Удалить из корзины">Удалить из корзины</a>
<a id="addCart_{$rsProduct['id']}" {if $itemInCart}class="hideme" {/if} onclick="addToCart({$rsProduct['id']}); return false;" href="#" alt="Добавить в корзину">Добавить в корзину</a>
<p>Описание<br />{$rsProduct['description']}</p>
</div>