<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src=" https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Assignment 2</title>
</head>
<body>
    <section>
            <div class="contain">
                <div class="heading">
                        <p>APPOINTMENT BOOKING SYSTEM</p>
                </div>
            </div>
		<div class="col-sm-12">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <section class="sec-button">
                        <!-- <div class="col-sm-12"> -->
                            <div class="col-sm-6">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <input type="submit" id="login-button" name="login" value="LOG IN" onclick="showlogin()">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <input type="submit" name="login" id="singup-button" value="SIGN UP" onclick="showsignup()">
                                </div>
                            </div>
                        <!-- </div> -->
                </section>
                <!-- <section > -->
                    <div class="col-sm-12">
                        <form class=" formContainer">
                            <div class="form" id="login">
                                <div>
                                    <label for="email">EMAIL : </label>
                                    <input type="email" id="login-email" name="login-email" placeholder="" class="form-control">
                                </div>
                                <div>
                                    <label for="password">PASSWORD : </label>
                                    <input type="password" id="login-password" name="login-password" placeholder="" class="form-control">
                                </div>
                                <div class="submit-button">
                                    <input type="submit" id="login-submit" name="submit" onclick="login()">
                                </div>
                            </div>
                            <div class="form hide" id="signup">
                                <div>
                                    <label for="name">NAME : </label>
                                    <input type="text" id="signup-name" name="signup-name" placeholder="" class="form-control">
                                </div>
                                <div>
                                    <label for="email">EMAIL : </label>
                                    <input type="email" id="signup-email" name="signup-email" placeholder="" class="form-control">
                                </div>
                                <div>
                                    <label for="password">PASSWORD : </label>
                                    <input type="password" id="signup-password" name="signup-password" placeholder="" class="form-control">
                                </div>
                                <div>
                                    <label for="cpassword">CONFIRM PASSWORD : </label>
                                    <input type="password" id="signup-confirmpassword" name="signup-confirmpassword" placeholder="" class="form-control">
                                </div>
                                <div class="submit-button">
                                    <input type="submit" id="signup-submit" name="submit" onclick="signup()">
                                </div>
                            </div>
                        </form>
                    </div>
                <!-- </section> -->

            </div>
            <div class="col-sm-4"></div>
        </div>
    </section>

    <script>
        $('form').submit(function(e) {
        e.preventDefault();
        });


        var loginform = document.getElementById('login');
        var signupform = document.getElementById('signup');
        function showlogin() {
            loginform.classList.remove('hide');
            signupform.classList.add('hide');
        }
        function showsignup() {
            loginform.classList.add('hide');
            signupform.classList.remove('hide');
        }
        
        
        // $.ajax({
		// 	type:'',
		// 	url:"",
		// 	data:{},
		// 	success:function(data){
						
		// 	}
		// });

        function login() {
            var loginEmail = $('#login-email').val();
            var loginPass = $('#login-password').val();
            var token = "<?php echo password_hash("logintoken", PASSWORD_DEFAULT);?>"
            if(loginEmail != "" && loginPass != ""){
                $.ajax({
                    type:'POST',
                    url:"ajax/login.php",
                    data:{email: loginEmail, password: loginPass, token: token},
                    success:function(data){
                        alert(data);
                    }
                });
            }
            else {
                alert("Fill all the fields");
            }
        }
        function signup() {
            var name = $('#signup-name').val();
            var signupEmail = $('#signup-email').val();
            var signupPass = $('#signup-password').val();
            var signupConfrmPass = $('#signup-confirmpassword').val();
            var token = "<?php echo password_hash("signuptoken", PASSWORD_DEFAULT);?>";
            if(signupEmail != "" && signupPass != "" && signupConfrmPass != "" && name !=""){
                if(signupPass == signupConfrmPass){
                    $.ajax({
                        type:'POST',
                        url:"ajax/signup.php",
                        data:{email: signupEmail, password: signupPass, confirmPass: signupConfrmPass, name: name, token:token},
                        success:function(data){
                            alert(data);
                        }
                    });
                }
                else {
                    alert("Password and Confirm Password should match")
                }
            }
            else {
                alert("Fill all the fields");
            }
        }
        
        </script>
    <!-- </script> -->
</body>
</html>