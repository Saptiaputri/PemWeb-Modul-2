<DOCTYPE html>
<html>
    <?php
        $username = $password = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = test_input($_POST["username"]);
            $password = test_input($_POST["password"]);
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    <?php
        $usernameErr = $passwordErr = "";
        $username = $password = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        $username = test_input($_POST["username"]);
            if (strlen($username) >= 7) {
                $usernameErr = "Username tidak boleh lebih dari 7 karakter";
            }
            {if (empty($_POST["username"])) {
                $usernameErr = "Name is required";
            } else {
                $username = test_input($_POST["username"]);
            }

        $password = test_input($_POST["password"]);
            if (strlen($password) <=10 ) {
                $passwordErr = "Password minimal 10 digit";
            }
            if (!preg_match('@[a-zA-Z^\w]@', $password)){
                $passwordErr = "Password minimal memiliki satu Huruf Kapital, satu Huruf Kecil, satu angka dan satu karakter khusus";
            }
            if (empty($_POST["password"])) {
                $passwordErr = "password is required";
            } 
            else {
                $password = test_input($_POST["password"]);
            }
        }
    ?>

<form method="post" action="<?php echo 
htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    username: <input type="text" name="username">
    <span class="error">* <?php echo $usernameErr;?></span> <br><br>
    password:
    <input type="text" name="password">
    <span class="error">* <?php echo $passwordErr;?></span> <br><br> 
    <input type="submit" name="submit" value="Submit">
</form>
</html>