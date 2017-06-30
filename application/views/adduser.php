<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link rel="shortcut icon" href="http://downloadicons.net/sites/default/files/plus-icon-76436.png">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/web/bootstrap-3.3.7-dist/css/mystyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/web/bootstrap-3.3.7-dist/js/adduser.js"></script>

    <script>
        var base_url = "<?php echo base_url();?>";
    </script>
</head>
<body>
<div style="height:80px; min-width: 1270px;">
    <button class="button button1 to_home" type="button">
        <span class="glyphicon glyphicon-home"></span> Acasa
    </button>
    <button type="button" class="button button1 log_out">
        <span class="glyphicon glyphicon-log-out"></span> Delogare
    </button>
</div>
<div style="border:3px solid #2E4209; border-radius:5px; margin:0 auto; width:700px; height:550px; margin-top:120px;">

    <form method="post" enctype="multipart/form-data">
        <div style="height:0px;overflow:hidden">
            <input type="file" id="fileInput" name="fileInput" accept="image/*"/>
            <input type="text" name="fileInputName" id="fileInputName" value=""></input>
        </div>

        <div style="float:left; width:150px; height:150px; margin-left:25px; margin-top:50px; margin-right:5px; border-radius:50%; background-color:white;">
            <!--<img id="addPhoto" src="https://cdn1.iconfinder.com/data/icons/ui-5/502/user-512.png" alt="Add photo of user" width="110px" height="110px">-->

            <img id="addPhoto" onclick="chooseFile();"
                 src="https://cdn1.iconfinder.com/data/icons/ui-5/502/user-512.png" alt="Add photo of user"
                 style="border-radius:50%; width: 100%; height: 100%; border: 1px; object-fit:cover;">

        </div>


        <div style="float:left; width:440px; margin-top:50px; border:1px solid red; color:#ffffff; !important; ">
            <div class="group2">
                <label class="label">Nume</label>
                <input id="lastname" type="text" class="input" name="lastname" placeholder="Numele utilizatorului">
            </div>

            <div class="group2">
                <label class="label">Prenume</label>
                <input id="firstname" type="text" class="input" name="firstname" placeholder="Prenumele utilizatorului">
            </div>

            <div class="group2">
                <label class="label">Email</label>
                <input id="email" type="text" class="input" name="email" placeholder="Email-ul utilizatorului">
            </div>

            <div class="group2">
                <label class="label">Utilizator</label>
                <input id="username" type="text" class="input" name="username" placeholder="Numele contului">
            </div>

            <div class="group2">
                <label class="label">Departament</label>
                <select name="departament" id="parent_selection">
                    <option value="">- - Selecteaza - -</option>
                    <option value="SisTem">SisTem</option>
                    <option value="PriorDana">PriorDana</option>
                    <option value="iT Tech">iT Tech</option>
                </select>
            </div>

            <div class="group2">
                <label class="label">Functie</label>
                <select name="functie" id="child_selection"></select>
            </div>

        </div>
        <div style="width:100%; height:80px; clear:left; text-align:center;">
            <button type="submit"
                    style="width:100px; height:30px; background-color:#ECFFC7; border-color:white; outline:none; margin-top:50px;">
                Adaugare utilizator
            </button>
        </div>
    </form>
</div>

</body>
</html>
