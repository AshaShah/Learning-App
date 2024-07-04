//Ajax call for admin Login verification
function checkAdminLogin(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var regex = /^[A-Z0-9]+$/i;
    var adminemail = $("#adminemail").val();
    var adminpwd = $("#adminpwd").val();


    if(adminemail.trim() == ""){
        $("#statusAdminMsg").html(
            '<small style="color:red;">Please Enter Email</small>'
        );
        $("#adminemail").focus();
        return false;
    } else if(adminemail.trim() != "" && !reg.test(adminemail)){
        $("#statusAdminMsg").html(
            '<small style="color:red;">Please Enter correct email</small>'
        );
        $("#adminemail").focus();  
    }else if (adminpwd.trim()==""){
        $("#statusAdminMsg").html(
            '<small style="color:red;">Please Enter Password</small>'
        );
        $("#adminpwd").focus();
        return false;
    }else if (adminpwd.trim() != "" && !regex.test(adminpwd)){
        $("#statusAdminMsg").html(
            '<small style="color:red;">Please Enter Valid Password</small>'
        );
        $("#adminpwd").focus();  
    }
    $.ajax({
        url: "Admin/admin.php",
        method: "POST",
        data: {
            checkadminemail: "checkadminemail",
            adminemail: adminemail,
            adminpwd: adminpwd, 
        },
        success: function(data){
            if (data == 0){
                $("#statusAdminMsg").html('<small class="alert alert-danger">Invalid Email ID or Password</small>');
            } else if (data == 1){
                $("#statusAdminMsg").html('<small class="alert alert-success">Success Loading...</small>');
                setTimeout(() => {window.location.href="Admin/adminDashboard.php";}, 1000);
                clearadminField();
            }
        },
    });
}
//empty input field after submission or after attempts
function clearadminField(){
    $("#AdminLoginForm").trigger("reset");
    $("#statusAdminMsg").html(" ");
}