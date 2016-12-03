function validateAllRegister(){
    var Pass = document.getElementById("Pass").value;
    var PassConf = document.getElementById("PassConf").value;
    var Email = document.getElementById("Email").value;
    var Fname = document.getElementById("FName").value;
    var Lname = document.getElementById("LName").value;
    var text_fields = document.getElementsByTagName('input');
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    //Проверка всех полей на заполненность
    for (var i = 0; i < text_fields.length; i++) {
        if (text_fields[i].type != 'submit') {
            if (text_fields[i].value == '') {
                alert("Заполните все поля");
                return false;
            }
        }
    }

    //Проверка совпадения паролей
    if (Pass != PassConf) {
        alert("Вах-Вах-Вах");
        return false;
    }

    //Проверка правильности Email
    if (!re.test(Email)){
        alert("Неправильный Email");
        return false;
    }

    //Проверка правильности имени и фамилии
    if (Fname.length < 3){
        alert("Слишком короткое имя");
        return false;
    }
    if (Lname.length < 3){
        alert("Слишком короткая фамилия");
        return false;
    }

    return true;
}