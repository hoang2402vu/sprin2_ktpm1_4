function login() {
    var send = 0

    var name = document.getElementById('name').value 
    if(name.length == 0) {
        document.getElementById('name_error').innerHTML = 'vui lòng nhập tên'
    } else {
            document.getElementById('name_error').innerHTML = ''
            send += 1
    }
 
    var id_staff = document.getElementById('id_staff').value
    if(id_staff.length == 0) {
        document.getElementById('id_staff_error').innerHTML = 'vui lòng nhập địa chỉ'
    } else {
        document.getElementById('id_staff_error').innerHTML = ''
        send += 1
    }
    


    var id_admin = document.getElementById('id_admin').value
    if(id_admin == 0) {
        document.getElementById('id_admin_error').innerHTML = 'vui lòng nhập id kho'
    }
    else {
        document.getElementById('id_admin_error').innerHTML = ''
        send += 1
    }

   

    if(send != 3) {
        return false
    }
    else {
        return true
    }
}

function input_product() {
    var send = 0

    var product_name = document.getElementById('product_name').value 
    if(product_name.length == 0) {
        document.getElementById('product_name_error').innerHTML = '*'
    } else {
            document.getElementById('product_name_error').innerHTML = ''
            send += 1
    }

    var product_id = document.getElementById('product_id').value 
    if(product_id.length == 0) {
        document.getElementById('product_id_error').innerHTML = '*'
    } else {
            document.getElementById('product_id_error').innerHTML = ''
            send += 1
    }

    var amount = document.getElementById('amount').value 
    if(amount.length == 0) {
        document.getElementById('amount_error').innerHTML = '*'
    } else {
            document.getElementById('amount_error').innerHTML = ''
            send += 1
    }

    var price = document.getElementById('price').value 
    if(price.length == 0) {
        document.getElementById('price_error').innerHTML = '*'
    } else {
            document.getElementById('price_error').innerHTML = ''
            send += 1
    }

    var producer = document.getElementById('producer').value 
    if(producer.length == 0) {
        document.getElementById('producer_error').innerHTML = '*'
    } else {
            document.getElementById('producer_error').innerHTML = ''
            send += 1
    }

    var name = document.getElementById('name').value 
    if(name.length == 0) {
        document.getElementById('name_error').innerHTML = '*'
    } else {
            document.getElementById('name_error').innerHTML = ''
            send += 1
    }

    var id_staff = document.getElementById('id_staff').value 
    if(id_staff.length == 0) {
        document.getElementById('id_staff_error').innerHTML = '*'
    } else {
            document.getElementById('id_staff_error').innerHTML = ''
            send += 1
    }

    var time = document.getElementById('time').value 
    var date = document.getElementById('date').value   
    console.log(date);
    console.log(time); 
    if(date.length == 0 || time.length == 0) {
        document.getElementById('date_error').innerHTML = '*'
    } else {
            document.getElementById('date_error').innerHTML = ''
            send += 1
    }

    if(send != 8) {
        document.getElementById('note').innerHTML = '*vui lòng điền đủ thông tin';
        return false
    }
    else {
        document.getElementById('note').innerHTML = '';
        return true
    }
}