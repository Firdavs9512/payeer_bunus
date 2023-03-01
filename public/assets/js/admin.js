$.fn.myfunction = function () {
    $.ajax({
        url: "/api/admin/statistika",
        type: "POST",
         dataType: 'JSON',
        data:{
            '_token': $('#token').attr('data-token'),
        },
        success: function(data){
            console.log(data);
            if (data['error']){
              $.notifyBar({ cssClass: "error", html: data['error'] });
              return
            }
            
            $('#work_day').val(data['workday']);
            $('#new_users').val(data['newusers']);
            $('#day_payments').val(data['daypayments']);


        },
        error: function(error){
             console.log("Error:");
             console.log(error);
        }
    });
};
$().myfunction();

$.fn.updatedata = function (kim) {
    val = $('#work_day').val();
    new_users = $('#new_users').val();
    day_payments = $('#day_payments').val();
    header_change = $('#header_change').val();
    site_name = $('#site_name').val();
    payeer_id = $('#payeer_id').val();
    payeer_address = $('#payeer_address').val();
    payeer_sicret = $('#payeer_sicret').val();
    payment_action = $('select option:selected').val();
    $.ajax({
        url: "/admin/settings",
        type: "POST",
        data:{
            '_token': $('#token').attr('data-token'),
            'work_day' : val,
            'day_payments': day_payments,
            'new_users': new_users,
            'header_change': header_change,
            'payment_action': payment_action,
            'site_name': site_name,
            'payeer_id': payeer_id,
            'payeer_sicret': payeer_sicret,
            'payeer_address': payeer_address,
            'how': kim,
        },
        success: function(data){
            console.log(data);
            if (data['error']){
              $.notifyBar({ cssClass: "error", html: data['error'] });
              return
            }
            $.notifyBar({ cssClass: "success", html: data['message'] });
        },
        error: function(error){
             console.log("Error:");
             console.log(error);
        }
    });
};


