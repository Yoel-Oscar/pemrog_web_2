<?php
if (isset($_POST["btnlogin"])) {
    $userDao = new UserDaoImpl();
    if ($_POST["txtUsername"] == "" or $_POST["txtPassword"] == "") {
        $errMsg = 'Username atau password tidak boleh kosong';
    } else {
        $username = filter_input(INPUT_POST, "txtUsername");
        $password = filter_input(INPUT_POST, "txtPassword");
        $md5password = md5($password);

        $userLogin = new User();
        $userLogin->setUsername($username);
        $userLogin->setPassword($md5password);
        $Result = $userDao->login($userLogin);
        echo var_dump($Result);
        if (isset($Result) && !empty($Result->getUsername())) {

            $_SESSION['user_login'] = TRUE;
            $_SESSION['username'] = $Result->getUsername();
            header('location:home_after_log.php');
        } else {
            $errMsg = "Username atau Password salah";
        }
    }
}
if (isset($errMsg)) {
    echo '<div class="error_msg">' . $errMsg . '</div>';
}
?>



<link rel="stylesheet" href="css/style.css">
<form method="POST">
    <table border="1" bgColor="black">
        <tr align="center">
            <legend></legend>
        <tr>
            <td>
                <label form="txtuserName">Username :</label>
                <input name="txtUsername" type="text" id="txtUserid" autofocus="" placeholder="Username" /><br>
            <td>
        </tr>
        <tr>
            <td>
                <label form="Pass">Password :</label>
                <input name="txtPassword" type="password" id="txtpassword" autofocus="" placeholder="Password" /><br>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="btnlogin" value="Login" />
            </td>
        </tr>
        </tr>
    </table>
</form>