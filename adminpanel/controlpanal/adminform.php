<?php
session_start();
if(isset($_SESSION['eml'])){
header('location:admin.php');
}
?>
    <!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <style>
            form {
                margin: auto
            }
        </style>
        <title>Admin LogIn</title>
    </head>

    <body>
        <div class="container">
            <div class="frms">
                <h4 class='errtxt' style='display: none;'></h4>
                <form class="login" method="POST">
                    <h2 class="lgin hsln">Log In</h2> <a href="#" class="rmmbr hsln">Don't Remember password ?</a>
                    <input type="email" name="logeml" placeholder="Your e-mail" class="hsln">
                    <input type="password" name="logpsrd" placeholder="Your password" class="hsln">
                    <button type="submit" class="hsln">Log-In</button>
                </form>
            </div>
        </div>
        <script>
            let formlgn = document.querySelector('form.login')
                , sbmtlgn = formlgn.querySelector('button');
            formlgn.onsubmit = function (e) {
                e.preventDefault();
            }
            sbmtlgn.onclick = function () {
                let xhrlgn = new XMLHttpRequest();
                xhrlgn.open('POST', 'loginandlogout/login.php', true);
                xhrlgn.onload = function () {
                    if (xhrlgn.readyState == XMLHttpRequest.DONE && xhrlgn.status == 200) {
                        let data = xhrlgn.response;
                        document.querySelector('.errtxt').style.display = "none";
                        sbmtlgn.innerHTML = '<span class="ldbtn"></span>';
                        setTimeout(() => {
                            if (data == 'success') {
                                location.href = 'admin.php';
                                document.querySelector('.errtxt').style.display = "none";
                            }
                            else {
                                document.querySelector('.errtxt').style.display = "flex";
                                document.querySelector('.errtxt').innerHTML = data;
                                sbmtlgn.innerHTML = 'Log-In';
                            }
                        }, 700);
                    }
                }
                let frmlgdt = new FormData(formlgn);
                xhrlgn.send(frmlgdt);
            }
        </script>
    </body>

    </html>