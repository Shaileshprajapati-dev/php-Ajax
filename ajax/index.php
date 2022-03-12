<?php
require_once __DIR__.'/api/functions.php';

?>
<html>
    <head></head>
    <body>
        <h2>Welcome To Dataentry  </h2>
        <form >
           FName: <input type="text" id="fname"><br/><br/>
           LName: <input type="text" id="lname"><br/><br/>
           Email:<input type="text" id="email"><br/><br/>
           password:<input type="text" id="password" ><br/><br/>
           conformPassword:<input type="text" id="conformpassword"><br/><br/>
           File <input type="file" name="file">
            <input type ="button" value="submit" id="submit">
            <input type ="reset"  name="reset">
</form>
<table border="2" width="100%">
    <tr>
        <th>ID</th>
        <th>FNAME</th>
        <th>LNAME</th>
        <th>EMAIL</th>
        <th>PASSWORD</th>
        <th>conformpassword</th>
    </tr>
    <tbody id="records">
    </tbody>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>


$(document).ready(function(){
       load_emp1_data();

       $("#submit").click(function(){
         
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var conformpassword= $("#conformpassword").val();
            if(fname==""){
                window.alert("fName is required");
            }
            if(lname==""){
                window.alert("lName is required");
            }
            
            if(email==""){
                window.alert("Email is required");
            }

            if(password==""){
                window.alert("password is required");
            } 

            if(conformpassword==""){
                window.alert("conformpassword is required");
            }
            if(fname!="" && lname!="" && email!="" && password!="" && conformpassword!=""){
               // window.alert("all clear");
                insert_emp1_data(fname,lname,email,password,conformpassword);
            }
            
       })
});

function load_emp1_data(){

    $.ajax({
        url:"<?php echo url('api/getemp.php')?>",
        type:"GET",
        success:function(response){
            if(response.status==true && response.code ==200){
                let output = ``;
                response.data.forEach(function(emp1,index){
                    output = output +`                
            <tr>
                <td>${emp1.id}</td>
                <td>${emp1.fname}</td>
                <td>${emp1.lname}</td>
                <td>${emp1.email}</td>
                <td>${emp1.password}</td>
                <td>${emp1.conformpassword}</td>
            </tr>`;
                });

            $("#records").html(output);

            }else{
                console.log(response.message);
            }
        }
    });
    
}

function insert_emp1_data(fname,lname,email,password,conformpassword){
   // window.alert("data rescie");
    $.ajax({
        
        url:"<?php echo url('api/addemp.php'); ?>",
        type:"POST",
        data:{
            "fname":fname,
            "lname":lname,
            "email":email,
            "password":password,
            "conformpassword":conformpassword,
        },
        success:function(response){
            if(response.code == 200 && response.status == true){
                window.alert(response.message);
                $("#fname").val("");
                $("#lname").val("");
                $("#email").val("");
                $("#password").val("");
                $("#conformpassword").val("");
            }else{
                window.alert(response.message);
                $("#fname").val("");
                $("#lname").val("");
                $("#email").val("");
                $("#password").val("");
                $("#conformpassword").val("");
            }
            load_emp1_data();
        }
    })
}

</script>

</body>
</html>