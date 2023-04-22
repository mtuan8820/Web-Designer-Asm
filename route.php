<?php
    //list of controllers and action
    $controllers = array('guest' => ['home_page', 'login', 'signup', 'login_manager', 'dish_list', 'dish_detail', 'menu','news'],
                         'user' => ['home_page_user', 'signup', 'login', 'logout', 'profile_user', 'dish_list', 'dish_detail', 'rate',
                                    'menu', 'change_info', 'profile_user_tab', 'cart_dropdown', "addToCart", 'view_cart', 'cart_tab', 'comment'],
                         'manager' => ['home_page_manager', 'manage_employee', 'login', 'logout', 'add_employee',
                                       'delete_employee', 'update_employee'],
                         'employee' => ['home_page_employee']);
    //if controller or action not in above list, go to error page
    if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
        header('Location: /error');
    }
    //execute action
    include_once('control/' . $controller . '_controller.php');
    $klass = $controller . 'Controller';
    $controller = new $klass;
    $controller->$action();
?>