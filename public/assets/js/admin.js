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
    $.ajax({
        url: "/admin/settings",
        type: "POST",
        data:{
            '_token': $('#token').attr('data-token'),
            'work_day' : val,
            'day_payments': day_payments,
            'new_users': new_users,
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


