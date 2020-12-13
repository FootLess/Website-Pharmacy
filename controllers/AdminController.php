<?php

/**
 * AdminController.php
 * 
 * Контроллер бэкэнда сайта (/admin/)
 * 
 */

//подключаем модели
include_once 'models/CategoriesModel.php';
include_once 'models/ProductsModel.php';
include_once 'models/OrdersModel.php';
include_once 'models/PurchaseModel.php';
include_once 'models/UsersModel.php';

$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('TemplateWebPath', TemplateAdminWebPath);

function indexAction($smarty)
{
    
    if (!$_SESSION['Admin']) {
        redirect('?controller=admin&action=loginindex');
    }

    $rsCategories = getAllMainCategories();

    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('pageTitle', 'Управление сайтом');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'admin');
    loadTemplate($smarty, 'adminFooter');
}



function addnewcatAction()
{
    $catName = $_GET['newCategoryName'];
    $catParentId = $_GET['generalCatId'];

    $res = insertCat($catName, $catParentId);
    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Категория добавлена';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка добавления категории';
    }

    echo json_encode($resData);
    return;
}


/**
 * Страница управления категориями
 * 
 * @param type $smarty
 */
function categoryAction($smarty)
{
    if (!$_SESSION['Admin']) {
        redirect('?controller=admin&action=loginindex');
    }

    $rsCategories = getAllCategories();
    $rsMainCategories = getAllMainCategories();

    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsMainCategories', $rsMainCategories);
    $smarty->assign('pageTitle', 'Управление сайтом');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminCategory');
    loadTemplate($smarty, 'adminFooter');
}

function updatecategoryAction()
{
    $itemId = $_GET['itemId'];
    $parentId = $_GET['parentId'];
    $newName = $_GET['newName'];

    $res = updateCategoryData($itemId, $parentId, $newName);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Категория обновлена';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка изменения данных категории';
    }

    echo json_encode($resData);
    return;
}

/**
 * Страница управления товарами
 * 
 * @param type $smarty
 */
function productsAction($smarty)
{
    if (!$_SESSION['Admin']) {
        redirect('?controller=admin&action=loginindex');
    }

    $rsCategories = getAllCategories();
    $rsProducts = getProducts();

    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    $smarty->assign('pageTitle', 'Управление сайтом');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminProducts');
    loadTemplate($smarty, 'adminFooter');
}

/**
 * Добавление нового продукта
 * 
 */
function addproductAction()
{
    $itemName = $_GET['itemName'];
    $itemPrice = $_GET['itemPrice'];
    $itemDesc = $_GET['itemDesc'];
    $itemCat = $_GET['itemCatId'];

    $res = insertProduct($itemName, $itemPrice, $itemDesc, $itemCat);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Изменения успешно внесены';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка изменения данных';
    }

    echo json_encode($resData);
    return;
}

/**
 * Обновление существующего продукта
 * 
 */
function updateproductAction()
{
    $itemId = $_GET['itemId'];
    $itemName = $_GET['itemName'];
    $itemPrice = $_GET['itemPrice'];
    $itemStatus = $_GET['itemStatus'];
    $itemDesc = $_GET['itemDesc'];
    $itemDesc = trim($itemDesc);
    $itemCat = $_GET['itemCatId'];

    $res = updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Изменения успешно внесены';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка изменения данных';
    }

    echo json_encode($resData);
    return;
}

/**
 * Загрузка картинки продукта
 * 
 */
function uploadAction()
{
    $maxSize = 2 * 1024 * 1024;

    $itemId = $_POST['itemId'];
    //получаем расширение загружаемого файла
    $ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
    //создаем имя файла
    $newFileName = $itemId . '.' . $ext;

    if ($_FILES["filename"]["size"] > $maxSize) {
        echo ("Размер файла превышает два мегабайта");
        return;
    }

    //Загружен ли файл
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {

        //Если файл загружен то перемещаем его из временной директории в конечную
        $res = move_uploaded_file($_FILES['filename']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/www/images/products/' . $newFileName);
        if ($res) {
            $res = updateProductImage($itemId, $newFileName);
            if ($res) {
                redirect('?controller=admin&action=products');
            }
        }
    } else {
        echo ("Ошибка загрузки файла");
    }
}

/**
 * Загрузка страницы заказов
 * 
 */
function ordersAction($smarty)
{
    if (!$_SESSION['Admin']) {
        redirect('?controller=admin&action=loginindex');
    }

    $rsOrders = getOrders();

    $smarty->assign('rsOrders', $rsOrders);
    $smarty->assign('pageTitle', 'Управление сайтом');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminOrders');
    loadTemplate($smarty, 'adminFooter');
}

/**
 * Установка статуса заказа
 * 
 */
function setorderstatusAction()
{
    $itemId = $_GET['itemId'];
    $status = $_GET['status'];

    $res = updateOrderStatus($itemId, $status);

    if ($res) {
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка установки статуса';
    }

    echo json_encode($resData);
    return;
}

/**
 * Установка даты заказа
 * 
 */
function setorderdatepaymentAction()
{
    $itemId = $_GET['itemId'];
    $datePayment = $_GET['datePayment'];

    $res = updateOrderDatePayment($itemId, $datePayment);

    if ($res) {
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка установки даты';
    }

    echo json_encode($resData);
    return;
}

/**
 * Выовд страницы авторизцаии для входа в админку
 * 
 */
function loginindexAction($smarty)
{
    loadTemplate($smarty, 'adminLogin');
}

/**
 * Инициализация входа в админку
 * 
 */
function loginadminAction()
{
    $password = $_REQUEST['password'];
    $login = $_REQUEST['login'];

    $res = loginAdmin($login, $password);

    if ($res) {
        $resData = $res[0];
        $_SESSION['Admin'] = $resData;
        
        $resData['success'] = 1;
        $resData['message'] = 'Вход успешно призведен';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка входа в систему';
    }

    echo json_encode($resData);
    return;
}

/**
 * Выход из админки
 * 
 */
function logoutadminAction(){
    unset($_SESSION['Admin']);
    redirect('?controller=admin');
}
