<?php

/**
 * Модель для таблицы категории (products)
 * 
 */

include_once 'config/db.php'; // Инициализация базы данных

/**
 * Получаем последние добавленные товары
 *
 * @param integer $limit Лимит товаров
 * @return array Массив товаров
 */
function getLastProducts($limit = null)
{
    $sql = "SELECT * FROM `products` ORDER BY id DESC";

    if ($limit) {
        $sql .= " LIMIT {$limit}";
    }

    global $db;

    $rs = mysqli_query($db, $sql);

    return createSmartyRsArray($rs);
}

/**
 * Получить продукты для категории $itemId
 * 
 * @param integer $itemId ID категории
 * @return array массив продуктов
 */
function getProductsByCat($itemId)
{
    $itemId = intval($itemId);

    $sql = "SELECT * FROM products WHERE category_id = '{$itemId}'";

    global $db;
    $rs = mysqli_query($db, $sql);

    return createSmartyRsArray($rs);
}

/**
 * Получить данные продукта по ID
 * 
 * @param integer $itemId ID продукта
 * @return array массив данных продукта
 */
function getProductsById($itemId)
{
    $itemId = intval($itemId);
    $sql = "SELECT * FROM `products` WHERE id='{$itemId}'";

    global $db;

    $rs = mysqli_query($db, $sql);

    return mysqli_fetch_assoc($rs);
}

/**
 * Получить список продуктов из массива идентификаторов (ID's)
 * 
 * @param type $itemsIds массив идентификаторов продуктов
 * @return array массив данных продуктов
 */
function getProductsFromArray($itemsIds)
{
    $strIds = implode(', ', $itemsIds);

    $sql = "SELECT * FROM products WHERE id in ({$strIds})";

    global $db;

    $rs = mysqli_query($db, $sql);

    return createSmartyRsArray($rs);
}

/**
 * Получение всех продуктов
 * 
 */
function getProducts()
{
    $sql = "SELECT * FROM `products` ORDER BY category_id";

    global $db;

    $rs = mysqli_query($db, $sql);

    return createSmartyRsArray($rs);
}

/**
 * Добавление нового товара
 * 
 * @param string $itemName Название продукта
 * @param integer $itemPrice Цена
 * @param string $itemDesc Описание
 * @param integer $itemCat ID категории
 * @return type
 */
function insertProduct($itemName, $itemPrice, $itemDesc, $itemCat)
{
    global $db;

    $sql = "INSERT INTO products
            SET
                `name` = '{$itemName}',
                `price` = '{$itemPrice}',
                `description` = '{$itemDesc}',
                `category_id` = '{$itemCat}',
                `image` = '1.png'";

    $rs = mysqli_query($db, $sql);
    return $rs;
}

/**
 * Обновление данных о продуктах
 * 
 * @param string $itemName Название продукта
 * @param integer $itemPrice Цена
 * @param string $itemDesc Описание
 * @param integer $itemCat ID категории
 * @param integer $itemId ID продукта
 * @param integer $itemStatus статус продукта
 * @param string $newFileName имя картинки
 * @return type
 */
function updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat, $newFileName = null)
{
    global $db;

    $set = array();

    if ($itemName) {
        $set[] = "`name` = '{$itemName}'";
    }

    if ($itemPrice > 0) {
        $set[] = "`price` = '{$itemPrice}'";
    }

    if ($itemStatus !== null) {
        $set[] = "`status` = '{$itemStatus}'";
    }

    if ($itemDesc) {
        $set[] = "`description` = '{$itemDesc}'";
    }

    if ($itemCat) {
        $set[] = "`category_id` = '{$itemCat}'";
    }

    if ($newFileName) {
        $set[] = "`image` = '{$newFileName}'";
    }

    $setStr = implode(', ', $set);
    $sql = "UPDATE products SET {$setStr} WHERE id = '{$itemId}'";

    $rs = mysqli_query($db, $sql);
    return $rs;
}

/**
 * Обновление данных о картинке продукта
 * 
 * @param integer $itemId ID продукта
 * @param string $newFileName название картинки продукта
 * @return type
 */
function updateProductImage($itemId, $newFileName)
{
    $rs = updateProduct($itemId, null, null, null, null, null, $newFileName);

    return $rs;
}
