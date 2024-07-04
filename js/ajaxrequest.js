//For matching username and password
$(document).ready(function(){
    //Ajax Call for Already exists email and username verification
    $("#regemail").on("keypress blur", function(){
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var regemail = $("#regemail").val();
        $.ajax({
            url: "Users/adduser.php",
            method: "POST",
            data:{
                checkemail:"checkemail",
                regemail: regemail,
            },
            success: function(data){
                if(data != 0){
                    $("#statusMsg2").html('<small style="color:red;">Email Address already exist</small>');
                    $("#signup").attr("disabled, true");
                }else if (data == 0 && reg.test(regemail)){
                    $("#statusMsg2").html('<small style="color:green;">There you go</small>');
                    $("#signup").attr("disabled, false");  
                }else if (!reg.test(regemail)){
                    $("#statusMsg2").html(
                        '<small style="color:red;">Please Enter Valid Email e.g.example@mail.com</small>'
                    );
                    $("#signup").attr("disabled, false");
                }
                if(regemail == ""){
                    $("#statusMsg2").html(
                        '<small style="color:red;">Please Enter Email</small>'
                    );
                }
                    
            },
        });
    });
});

function adduser(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var regex = /^[A-Z0-9]+$/i;
    var reguname = $("#reguname").val();
    var regemail = $("#regemail").val();
    var regpwd = $("#regpwd").val();

   //checking form fields on form submission
   if(reguname.trim() == ""){
       $("#statusMsg1").html(
           '<small style="color:red;">Please Enter Name!</small>'
       );
       $("#reguname").focus();
       return false;
   }else if (reguname.trim() != "" && !regex.test(reguname)){
    $("#statusMsg1").html(
        '<small style="color:red;">Please Enter Alphanumeric Value</small>'
    );
    $("#reguname").focus();  
   }
   else if (regemail.trim()==""){
    $("#statusMsg2").html(
        '<small style="color:red;">Please Enter Email!</small>'
    );
    $("#regemail").focus();
    return false;
   }else if (regemail.trim() != "" && !reg.test(regemail)){
    $("#statusMsg2").html(
        '<small style="color:red;">Please Enter Valid Email e.g.example@mail.com</small>'
    );
    $("#regemail").focus();  
   }
   else if (regpwd.trim()==""){
    $("#statusMsg3").html(
        '<small style="color:red;">Please Enter Password!</small>'
    );
    $("#regpwd").focus();
    return false;
   }else if (regpwd.trim() != "" && !regex.test(regpwd)){
    $("#statusMsg3").html(
        '<small style="color:red;">Please Enter Alphanumeric Value</small>'
    );
    $("#regpwd").focus();  
   }
   else{
    $.ajax({
        url:'Users/adduser.php',
        method:'POST',
        dataType: "json",
        data:{
            regsignup: "usersignup",
            reguname: reguname,
            regemail: regemail,
            regpwd: regpwd,
        },
        success:function(data){
            if (data == "OK"){
                $("#successMsg").html("<span class='alert alert-success'> Registration Successful !</span>");
                clearRegField();
            } else if (data == "Failed"){
                $("#successMsg").html("<span class='alert alert-danger'> Registration Unsuccessful !</span>");
            }

        },
    });
   }
}

//empty input field after submission or after attempts
function clearRegField(){
    $("#RegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
}

//Ajax call for Login verification
function checkLogin(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var regex = /^[A-Z0-9]+$/i;
    var logemail = $("#logemail").val();
    var logpwd = $("#logpwd").val();


    if(logemail.trim() == ""){
        $("#statusLogMsg").html(
            '<small style="color:red;">Please Enter Email</small>'
        );
        $("#logemail").focus();
        return false;
    } else if(logemail.trim() != "" && !reg.test(logemail)){
        $("#statusLogMsg").html(
            '<small style="color:red;">Please Enter correct email</small>'
        );
        $("#logemail").focus();  
    }else if (logpwd.trim()==""){
        $("#statusLogMsg").html(
            '<small style="color:red;">Please Enter Password</small>'
        );
        $("#logpwd").focus();
        return false;
    }else if (logpwd.trim() != "" && !regex.test(logpwd)){
        $("#statusLogMsg").html(
            '<small style="color:red;">Please Enter Valid Password</small>'
        );
        $("#logpwd").focus();  
    }
    $.ajax({
        url: "Users/adduser.php",
        method: "POST",
        data: {
            checkLogemail: "checklogemail",
            logemail: logemail,
            logpwd: logpwd, 
        },
        success: function(data){
            if (data == 0){
                $("#statusLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password</small>');
            } else if (data == 1){
                $("#statusLogMsg").html('<div class="spinner-border text-success" role="status"></div>');
                setTimeout(() => {window.location.href="index.php";}, 1000);
                clearlogField();
            }
        },
    });
}
//empty input field after submission or after attempts
function clearlogField(){
    $("#LoginForm").trigger("reset");
    $("#statusLogMsg").html(" ");
}