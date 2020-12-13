<?php

/**
 * Модель для таблицы категории (categories)
 * 
 */

include_once 'config/db.php'; // Инициализация базы данных

/**
 * Получить дочерние категории для категории $catId
 * 
 * @param integer $catId ID категории
 * @return array массив дочерних категорий
 */
function getChildrenForCat($catId)
{
    $sql = "SELECT * FROM categories WHERE parent_id='{$catId}'";

    global $db;

    $rs = mysqli_query($db, $sql);

    return createSmartyRsArray($rs);
}

/**
 * Получить главные категории с привязками дочерних
 * 
 * @return array массив категорий
 */
function getAllMainCatsWithChildren()
{
    $sql = 'SELECT * FROM categories WHERE parent_id=0';

    global $db;

    $rs = mysqli_query($db, $sql);

    $smartyRs = array();

    while ($row = mysqli_fetch_assoc($rs)) {

        $rsChildren = getChildrenForCat($row['id']);

        if ($rsChildren) {
            $row['children'] = $rsChildren;
        }

        $smartyRs[] = $row;
    }

    return $smartyRs;
}

/**Получить данные категории по id
 * 
 * @param integer $catId ID категории
 * @return array массив - строка категории
 */
function getCatById($catId)
{
    $catId = intval($catId);
    $sql = "SELECT * FROM categories WHERE id = '{$catId}'";

    global $db;

    $rs = mysqli_query($db, $sql);

    return mysqli_fetch_assoc($rs);
}

/**
 * Получить все главные категории (категории, которые не являются дочерними)
 * 
 * @return array массив категорий
 */
function getAllMainCategories()
{
    global $db;

    $sql = 'SELECT *
            FROM categories
            WHERE parent_id = 0';

    $rs = mysqli_query($db, $sql);

    return createSmartyRsArray($rs);
}

/**
 * 
 * Добавление новой категории
 * @param string $catName Название категории
 * @param integer $catParentId ID родительской категории
 * @return integer id новой категории
 */
function insertCat($catName, $catParentId = 0)
{
    global $db;

    //готовим запрос
    $sql = "INSERT INTO
            categories (`parent_id`, `name`)
          VALUES ('{$catParentId}', '{$catName}')";

    //выполняем запрос
    $rs = mysqli_query($db, $sql);

    //получаем id добавленной записи
    $id = mysqli_insert_id($db);

    return $id;
}

/**
 * Получить все категории
 * 
 * @return array массив категорий
 */
function getAllCategories()
{
    global $db;

    $sql = 'SELECT *
            FROM categories
            ORDER BY parent_id ASC';

    $rs = mysqli_query($db, $sql);

    return createSmartyRsArray($rs);
}


/**
 * Обновление категории
 * 
 * @param integer $itemId ID категории
 * @param integer $parentId ID главной категории
 * @param string $newName новое имя категории
 * @return type
 */
function updateCategoryData($itemId, $parentId = -1, $newName = '')
{
    global $db;

    $set = array();

    if ($newName) {
        $set[] = "`name` = '{$newName}'";
    }

    if ($parentId > -1) {
        $set[] = "`parent_id` = '{$parentId}'";
    }

    $setStr = implode(", ", $set);
    $sql = "UPDATE categories
        SET {$setStr}
        WHERE id = '{$itemId}'";


    $rs = mysqli_query($db, $sql);

    return $rs;
}
