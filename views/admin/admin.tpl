<div class="col-sm">
    <div id="blockNewCategory">
        Новая категория:
        <input type="text" name="newCategoryName" id="newCategoryName" value="">
        <br>

        Является подкатегория для
        <select name="generalCatId" class="form-control form-control-sm">
            <option value="0">Главная категория
                {foreach $rsCategories as $item}
                <option value="{$item['id']}">{$item['name']}
                {/foreach}
        </select>
        <br>
        <input type="button" onclick="newCategory()" value="Добавить категорию">
    </div>
</div>
