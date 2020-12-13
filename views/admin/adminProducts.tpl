<h2>Товар</h2>

<caption>Добавить продукт:</caption>
<table border="1" cellpadding="1" cellspacing="1" width="1">
    <tr>
        <th>Название</th>
        <th>Цена</th>
        <th>Категория</th>
        <th>Описание</th>
        <th>Сохранить</th>
    </tr>

    <tr>
        <td>
            <input type="edit" id="newItemName" value="">
        </td>
        <td>
            <input type="edit" id="newItemPrice" value="">
        </td>
        <td>
            <select id="newItemCatId">
                {foreach $rsCategories as $itemCat}
                    {if ($itemCat['parent_id']>0)}
                        <option value="{$itemCat['id']}">{$itemCat['name']}</option>
                    {/if}
                {/foreach}
            </select>
        </td>
        <td>
            <textarea id="newItemDesc"></textarea>
        </td>
        <td>
            <input type="button" value="Сохранить" onclick="addProduct();">
        </td>
    </tr>
</table>

<caption>Редактировать:</caption>
<table border="1" cellpadding="1" cellspacing="1">
    <tr>
        <th>№</th>
        <th>ID</th>
        <th>Название</th>
        <th>Цена</th>
        <th>Категория</th>
        <th>Описание</th>
        <th>Удалить</th>
        <th>Изображение</th>
        <th>Сохранить</th>
    </tr>
    {foreach $rsProducts as $item name=products}
        <tr>
            <td>{$smarty.foreach.products.iteration}</td>
            <td>{$item['id']}</td>
            <td>
                <input type="edit" id="itemName_{$item['id']}" value="{$item['name']}">
            </td>
            <td>
                <input type="edit" id="itemPrice_{$item['id']}" value="{$item['price']}">
            </td>
            <td>
                <select id="itemCatId_{$item['id']}">
                    {foreach $rsCategories as $itemCat}
                        {if ($itemCat['parent_id']>0)}
                            <option value="{$itemCat['id']}" {if $item['category_id']==$itemCat['id']}selected{/if}>
                                {$itemCat['name']}</option>
                        {/if}
                    {/foreach}
                </select>
            </td>
            <td>
                <textarea id="itemDesc_{$item['id']}">
                                {$item['description']}
                        </textarea>
            </td>
            <td>
                <input type="checkbox" id="itemStatus_{$item['id']}" {if $item['status']==0} checked="checked" {/if}>
            </td>
            <td>
                {if $item['image']}
                    <img src="/www/images/products/{$item['image']}" width="100">
                {/if}
                <form action="/?controller=admin&action=upload" method="POST" enctype="multipart/form-data">
                    <input type="file" name="filename"><br>
                    <input type="hidden" name="itemId" value="{$item['id']}">
                    <input type="submit" name="Загрузить" value="Загрузить"><br>
                </form>
            </td>
            <td>
                <input type="button" value="Сохранить" onclick="updateProduct('{$item['id']}');">
            </td>
        </tr>
    {/foreach}
</table>