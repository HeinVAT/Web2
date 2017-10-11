<?php 

// Hàm thiết lập là đã đăng nhập
function set_logged($username, $level){
    session_set('ss_user_token', array(
        'HoTen' => $username,
        'idGroup' => $level
    ));
}

function set_logged2($email, $name){
    session_set('ss_customer_token', array(
        'email' => $email,
        'name' => $name
    ));
}
 
// Hàm thiết lập đăng xuất
function set_logout(){
    session_delete('ss_user_token');
}

function set_logout2(){
    session_delete('ss_customer_token');
}
 
// Hàm kiểm tra trạng thái người dùng đã đăng nhập chưa
function is_logged(){
    $user = session_get('ss_user_token');
    return $user;
}

function is_logged2(){
    $user = session_get('ss_customer_token');
    return $user;
}
 
// Hàm kiểm tra có phải là admin hay không
function is_admin(){
    
    $user  = is_logged();

    
    if (isset($user['idGroup']) && ($user['idGroup'] == '0' || $user['idGroup'] == '1')){
        
        return true;
    }
    return false;
}
// Hàm kiểm tra là supper admin
function is_supper_admin(){
    $user = is_logged();
    
    
    if (isset($user['idGroup']) && $user['idGroup'] == '1' && $user['HoTen'] == 'Nguyen Hien'){
        return true;
    }
    false;
}
// Lấy username người dùng hiện tại
function get_current_username(){
    $user  = is_logged();
    return isset($user['HoTen']) ? $user['HoTen'] : '';
}

function get_current_customer(){
    $customer  = is_logged2();
    return isset($customer['name']) ? $customer['name'] : '';
}

function get_current_customer_email(){
    $customer  = is_logged2();
    return isset($customer['email']) ? $customer['email'] : '';
}
 
// Lấy level người dùng hiện tại
function get_current_level(){
    $user  = is_logged();
    return isset($user['idGroup']) ? $user['idGroup'] : '';
}