$.getJSON("/api/statistika", function(data) {

  $('#workday').text(`Мы работаем:  ${data['workday']} дней`);
  $('#users').text(`Пользователей:  ${data['users']}`);
  $('#newusers').text(`Новых сегодня:  ${data['newusers']}`);
  $('#payment').text(`Выплачено: ${data['payments']} руб.`);
  $('#allbonus').text(`Выдано бонусов:  ${data['allbonus']}`);
  // console.log(data);
});

// $.getJSON("/api/ads/reklama/yuqori1",function(data){
//   // console.log(data.data);
//   let nav = '<div>';
//   $.each(data.data, function(i, item) {
//     nav += item.url;
//   });
//   nav += '</div>';
//   $.('#a_reklama1').html(nav);
//   console.log(nav);
// });


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

