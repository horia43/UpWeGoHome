<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login to UpWeGo</title>
    <link rel="shortcut icon" href="http://findicons.com/files/icons/990/vistaico_toolbar/128/arrow_up.png">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/web/bootstrap-3.3.7-dist/css/mystyle.css">
    <script type="text/javascript" src="<?php echo base_url();?>/web/bootstrap-3.3.7-dist/js/ajax.js" ></script>

</head>
<body>
<div id="myForm">
    <form id="form3" action="<?php echo site_url('login/index') ?>">
        <div class="data">
            <p>Current password:</p>
            <p>New password:</p>
            <p>Retype password:</p>
        </div>
        <div class="inputs">
            <p><input class="userpass" id="current_pass" type="password" name="current_pass" placeholder="Insert password given by email"></p>
            <p><input class="userpass" id="new_pass" type="password" name="new_pass" placeholder="Insert your new password here"></p>
            <p><input class="userpass" id="new_pass2" type="password" name="new_pass2" placeholder="Retype your password here"></p>
        </div>
        <!--<div class="select"><select>
                <option disabled selected>-- Select an option --</option>
                <option>USER</option>
                <option>ADMIN</option>
            </select>
        </div>-->
        <div id="activate"><button id="btn_activate" type="button">Activate account</button></div>
    </form>
</div>

</body>
</html>
