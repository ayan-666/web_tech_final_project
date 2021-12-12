// Register Js validation & Ajax
function checkUsername(val){
    var check= /^[_a-z]+$/g;
    
    if(!check.test(val)){
        document.getElementById('checktext').innerHTML='only lower case latin letters and _ are allowed!';
        document.getElementById('checktext').style.color='red';
        document.getElementById('uname').value='';
    } else{
        document.getElementById('checktext').innerHTML='';

    }
}
function checkName(val){
    var check= /^[ a-zA-Z]+$/g;
    
    if(!check.test(val)){
        document.getElementById('checktext1').innerHTML='only lower and upper case lettersare allowed!';
        document.getElementById('checktext1').style.color='red';
        document.getElementById('name').value='';
    } else{
        document.getElementById('checktext1').innerHTML='';

    }
}
function checkEmail(val){
    var check= /^[<a-z0-9></a-z0-9>@.]+$/g;
    
    if(!check.test(val)){
        document.getElementById('checktext2').innerHTML='only lower , @ and numbers letters are allowed!';
        document.getElementById('checktext2').style.color='red';
        document.getElementById('email').value='';
    } else{
        document.getElementById('checktext2').innerHTML='';

    }
}

function checkUser(val){
    $.ajax({
        url: 'duplicateUsers.php',
        method: 'POST',
        data: {
            'username': val
        },
        async: false
    }).done(function (data){
        var check= JSON.parse(data);
        if(check.success==true){
            $('#checkuser').html('This username is already taken!');
            $('#checkuser').css('color', 'red');
            $('#uname').val('');
        } else{
            $('#checkuser').html('Username Available!');
            $('#checkuser').css('color', 'black');
        }
    });
}
function checkEmail(val){
    $.ajax({
        url: 'duplicateUsers1.php',
        method: 'POST',
        data: {
            'email': val
        },
        async: false
    }).done(function (data){
        var check= JSON.parse(data);
        if(check.success==true){
            $('#checkemail').html('This email is already taken!');
            $('#checkemail').css('color', 'red');
            $('#email').val('');
        } else{
            $('#checkemail').html('Email Available!');
            $('#checkemail').css('color', 'black');
        }
    });
}




// Login JS Validation & Ajax
function checkLoginusername(val){
    var check= /^[_a-z]+$/g;
    
    if(!check.test(val)){
        document.getElementById('checktext3').innerHTML='only lower case latin letters and _ are allowed!';
        document.getElementById('checktext3').style.color='red';
        document.getElementById('name').value='';
    } else{
        document.getElementById('checktext3').innerHTML='';

    }
}

