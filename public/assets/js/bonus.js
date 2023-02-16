// let docTitle = document.title;
// window.addEventListener('blur',() => {
// 	document.title = "Come back!";
// });

let oyna = false;

// window.addEventListener('fokus',() => {
// 	oyna = true;
// })


let canGoBack = true;

console.log('cascsa');
$('#bonus-ads').click(() => {
  // Send a new form
  window.open("http://localhost", "_blank");

  $(window).on('focus', () => {
	  oyna = true;
	});




  let counter = 0;

const intervalId = setInterval(() => {
  counter++;
  document.title = `Please wait ${counter} second`;
  // console.log(counter);

  if (oyna === true){
    counter = 0;
    oyna = false;
  	clearInterval(intervalId);
  	alert('Пожалуйста, подождите 10 секунд, чтобы получить бонус');
    window.location.reload();
  }

  if (counter === 10) {
    clearInterval(intervalId);
    document.title = `All complite bonus is active!`;
    var element = document.getElementById("number_b");
    element.parentNode.removeChild(element);
    var elementd = document.getElementById("number_a");
    elementd.parentNode.removeChild(elementd);
    document.getElementById('activebonus').classList.remove('active__bonus');
    document.getElementById('activebonus').classList.add('active__bonus_s');
  }
}, 1000);

});







 // $(document).ready(function() {
 //    $('#countdown').flipcountdown({
 //      size: 'lg',
 //      showHour: false,
 //      tick: function() {
 //        var duration = this.getDuration().hours * 60 + this.getDuration().minutes;
 //        if (duration <= 30) {
 //          this.stop();
 //          alert('Countdown complete!');
 //        }
 //      },
 //      beforeDateTime: moment().add(30, 'minutes').format()
 //    });
 //  });





