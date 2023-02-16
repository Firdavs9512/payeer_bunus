$.getJSON("/api/statistika", function(data) {

  $('#workday').text(`Мы работаем:  ${data['workday']} дней`);
  $('#users').text(`Пользователей:  ${data['users']}`);
  $('#newusers').text(`Новых сегодня:  ${data['newusers']}`);
  $('#payment').text(`Выплачено: ${data['payments']} руб.`);
  $('#allbonus').text(`Выдано бонусов:  ${data['allbonus']}`);
  // console.log(data);
});


$('#withdraw').click( () => {
  $.ajax({
    url: "/withdraw",
    type: "POST",
     dataType: 'JSON',
    data:{
        '_token': $('#withdraw').attr('data-token'),
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
});

