<?php
if (!array_key_exists('P', $_GET) || empty($_GET['P'])) {
    $_GET['P'] = 'home';
}

switch ($_GET['P']) {
    case 'home':
        require_once PROTECTED_DIR.'home/home.php';
    break;
    
    default:
        require_once PROTECTED_DIR.'normal/404.php';
    break;

    case 'register':
        require_once USER_DIR.'register.php';
    break;

    case 'login':
        require_once USER_DIR.'login.php';
    break;

    case 'logout':
        if(IsUserLoggedIn()) {
            userLogout();
        }
        header('Location: index.php');
    break;

    case 'listProducts':
        require_once PRODUCT_DIR.'listProducts.php';
    break;

    case 'product':
        if (!array_key_exists('ID', $_GET) || empty($_GET['ID'])) {
            header('Location: index.php');
        } 
        require_once PRODUCT_DIR.'product.php';
    break;

    case 'cart':
        require_once USER_DIR.'cart.php';
    break;

    case 'addProduct': 
        if (isUserLoggedIn()) {
            require_once PRODUCT_DIR.'addProduct.php';
        }
        else {
            header('Location: index.php');
        }
        
    break;

    case 'ordering':
        require_once ORDER_DIR.'ordering.php';
    break;

    case 'removeFromCart':
        if(!array_key_exists('ID', $_GET) || empty($_GET['ID'])) {
            header('Location: index.php?P=cart');
        }
        else {
            removeFromCart($_GET['ID']);
            header('Location: index.php?P=cart');
        }
    break;


}

?>