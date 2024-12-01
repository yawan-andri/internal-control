<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" href="assets/css/login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap5.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    </head>
<body>
    <div class="container">
        <div class="box-login">
            <!-- <form 
                action="test4.php" 
                method="post"
                >  -->
            <form id="login">
                <center>
                    <h3>Login</h3>
                </center>
                <div class="box-form">
                    <label>Username</label>
                    <input type="text" name="username" id="username" placeholder="Masukkan username ..">
                </div>
                <div class="box-form">
                    <label>Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan password ..">
                </div>
                <input type="checkbox" onclick="showHide()" id="checkpass"> Tampilkan Password 
                <div id="alert" class="alert alert-danger" role="alert"></div>
                <input type="submit" value="Login" class="tombol-login" id="loginButton" name="loginButton">
            </form>
        </div>
    </div>

    <script>

        $(document).ready(function() {
            $("#username").val('');
            $("#password").val('');
            $("#checkpass").prop('checked', false);
            $("#alert").hide();
        });

        function showHide() {
            var inputan = document.getElementById("password");
            if (inputan.type === "password") {
                inputan.type = "text";
            } else {
                inputan.type = "password";
            }
        }

        $("form#login").on("submit", function (e) {
            e.preventDefault();
            
            var username = $("#username").val();
            var password = $("#password").val();

            if (!username || !password) {
                $("#alert").text("Username atau Password tidak boleh kosong");
                $("#alert").show();
                return;
            }

            $.post("data/get_data.php", {
                login: "login",
                username: username,
                password: password
            }, function (response) {
                if (response == "login") {
                    window.location.href = "index.php";
                } else if (response == "gagal")  {
                    $("#alert").text("Username atau Password salah");
                    $("#alert").show();
                } else {
                    alert("kambing");
                }
            });
        });
    </script>
</body>
</html>