var input1 = document.querySelector('#password')
var show = document.querySelector('#open_pass')
var hide = document.querySelector('#close_pass')


function ShowHidepass(){
    if(input1.type === 'password'){
        input1.type = 'text';
        show.style.display = 'block';
        hide.style.display = 'none';
    }
    else{
        input1.type = 'password';
        show.style.display = 'none';
        hide.style.display = 'block';
    }
};

$(document).ready(function() {
    $("td:contains('APPROVE')").css("background-color", "green").css("color", "White");
    $("td:contains('PENDING')").css("background-color", "yellow");
    $("td:contains('DECLINED')").css("background-color", "red").css("color", "White");
});








