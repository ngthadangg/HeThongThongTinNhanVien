<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login form</title>
        
        <style>
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                height:  100vh;
                margin: 0;
                background-color: rgba(0, 255, 255, 0.425) ;
            }
            form{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                
            }
            .notifi{
                color:  red;
                font-weight: bolder;
            }
        </style>
    </head>
    <body>
        <form action="" method="POST" >

            <h1>Login</h1>
            <div>
                <label for="name">Username:</label><br>
                <input name="name" type="text" value=""><br><br>
            </div>
            
            <div>
                <label>Password:</label><br>
                <input name="pass" type="password" value=""><br><br>
            </div>

            <div>
                <button name = "submit" >Login</button>
                <!-- <input type="submit" name = "submit" value="Login" /> -->
                <button type="reset" name = "reset" >Reset</button>
            </div>

            <?php
                include 'db_connect.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                {
                    $username = $_POST['name'];
                    $password = $_POST['pass'];

                    $sql = "SELECT * FROM amin WHERE username = '$username' && password = '$password'";

                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0)
                    {
                        
                        header("refresh:0 ; url=homeadmin.php");
                    }
                    else{
                        echo "Tài khoản  hoặc mật khẩu không chính xác!!!";
                    }
                }
                mysqli_close($conn);

                
            ?>
        </form>

    </body>

    

</html>