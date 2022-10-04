function register() {
    var send = 0

    var name = document.getElementById('name').value 
    if(name.length == 0) {
        document.getElementById('name_error').innerHTML = 'vui lòng nhập tên'
    } else {
            document.getElementById('name_error').innerHTML = ''
            send += 1
    }
    


    


    var address = document.getElementById('address').value
    if(address.length == 0) {
        document.getElementById('address_error').innerHTML = 'vui lòng nhập địa chỉ'
    } else {
        document.getElementById('address_error').innerHTML = ''
        send += 1
    }
    


    var email = document.getElementById('email').value
    if(email == 0) {
        document.getElementById('email_error').innerHTML = 'vui lòng nhập email'
    }
    else {
        document.getElementById('email_error').innerHTML = ''
        send += 1
    }

    var phone_number = document.getElementById('phone_number').value
    if(phone_number == 0) {
        document.getElementById('phone_number_error').innerHTML = 'vui lòng nhập số điện thoại'
    }
    else {
        document.getElementById('phone_number_error').innerHTML = ''
        send += 1
    }
    


    var password = document.getElementById('password').value
    if(password.length  == 0) {
        document.getElementById('password_error').innerHTML = 'vui lòng nhập mật khẩu'
    }
    else {
        document.getElementById('password_error').innerHTML = ''
            send += 1

    }

    var re_password = document.getElementById('re_password').value
    if(re_password != password) {
        document.getElementById('re_password_error').innerHTML = 'mật khẩu nhập lại không đúng'
    }
    else {
        document.getElementById('re_password_error').innerHTML = ''
            send += 1

    }

    if(send != 6) {
        return false
    }
    else {
        return true
    }
}

function login() {
    var send = 0
    
    var email = document.getElementById('email').value
    if(email == 0) {
        document.getElementById('email_error').innerHTML = 'vui lòng nhập email'
    }
    else {
        document.getElementById('email_error').innerHTML = ''
        send += 1
    }
    


    var password = document.getElementById('password').value
    if(password.length  == 0) {
        document.getElementById('password_error').innerHTML = 'vui lòng nhập mật khẩu'
    }
    else {
        document.getElementById('password_error').innerHTML = ''
            send += 1

    }

    if(send != 2) {
        return false
    }
    else {
        return true
    }
}

function resest_password() {
    var send = 0

    var email = document.getElementById('email').value
    if(email == 0) {
        document.getElementById('email_error').innerHTML = 'vui lòng nhập email'
    }
    else {
        document.getElementById('email_error').innerHTML = ''
        send += 1
    }

    var phone_number = document.getElementById('phone_number').value
    if(phone_number == 0) {
        document.getElementById('phone_number_error').innerHTML = 'vui lòng nhập số điện thoại'
    }
    else {
        document.getElementById('phone_number_error').innerHTML = ''
        send += 1
    }
    
    var password = document.getElementById('password').value
    if(password.length  == 0) {
        document.getElementById('password_error').innerHTML = 'vui lòng nhập mật khẩu'
    }
    else {
        document.getElementById('password_error').innerHTML = ''
            send += 1

    }

    var re_password = document.getElementById('re_password').value
    if(re_password != password) {
        document.getElementById('re_password_error').innerHTML = 'mật khẩu nhập lại không đúng'
    }
    else {
        document.getElementById('re_password_error').innerHTML = ''
            send += 1

    }

    if(send != 4) {
        return false
    }
    else {
        return true
    }
}