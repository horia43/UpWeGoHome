<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Salary flyer</title>
    <style>
        .h2 {
            font-size: 30px;
            padding-top: 5px;
            text-align: center;
            font-weight: bolder;
        }
        #logo{
            position:relative;
            bottom:110px;
            right:70px;
            width:179px;
            height:200px;
            background: url(<?php echo base_url();?>upload/UpWeGo_Logo.png);
            float:right;
            clear:left;
        }
        #qr_code{
            width:200px;
            height:200px;
            background: url(<?php echo base_url();?>upload/qr_code_pdf.jpg);
            background-size:cover;
            float:right;
            display:inline-block;
            margin-bottom:45px;
            margin-right:100px;
        }
        .details{
            padding-top: 15px;
        }
        .details p {
            font-size: 13px;
            margin-top: 1px;
            margin-bottom: 1px;
            padding-top: 1px;
            padding-bottom: 1px;
        }
        .details p span,td span{
            font-weight: bold;
        }
        .details2 p{
            font-weight: bold;
            margin-top:10px;
            margin-bottom:0px;
        }
        table{
            width:80%;
            margin:40px auto;
        }
        table, th, td {
            border: 1px solid black;
        }
        .darker{
            background-color: #BEBEBE;
        }
    </style>

</head>
<body>
<div id="container-parent" style="font-family: 'Muli', sans-serif; background-color: #7f7f7f; padding: 5% 0;">
    <div id="container" style="width: 90%; /*90%*/ top:150px; border:1px solid #000000; background-color:#D8D8D8; padding-left:25px; overflow:hidden;">
        <div style="width:100%; height:auto; overflow: hidden; ">
            <div class="h1" style="width:190px; font-size: 35px; padding-top: 50px; text-align: center; font-weight: bolder;">UpWeGo</div>
            <table style=" width:100%;">
                <tr>
                    <td style="width:32%;"></td>
                    <td style="width:33%; border-top:5px solid black;"></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="width:34%;"></td>
                    <td style="width:29%; border-top:3px solid #5f5f5f;"></td>
                    <td></td>
                </tr>
            </table>
            <div class="h2" style="clear:both; font-size: 25px; padding-top: 5px; text-align: center; font-weight: bolder;">Pay Slip</div>
            <img src="<?php echo base_url();?>upload/UpWeGo_Logo.png"/>
            <div class="details">
                <p><span>Adress:</span> Calea Septembrie 13 , nr. 113	, Bucuresti	sector 5</p>
                <p><span>Phone:</span> 021 224 75 21</p>
                <p><span>Fax:</span> 021 224 75 20</p>
                <p><a href="www.upwego.com">www.upwego.com</a></p>
            </div>
        </div>
        <div class="details2">
            <p>Nume si Prenume:</p>
            <p>Anul si luna:</p>
        </div>
        <table>
            <thead colspan="3">Salariu de plata</thead>
            <tr class="darker">
                <td><span>Salariu de baza</span></td>
                <td> </td>
                <td>10000 (+)</td>
            </tr>
            <tr>
                <td>Nr. tichete de masa</td>
                <td> </td>
                <td>20</td>
            </tr>
            <tr>
                <td>Val. tichete de masa</td>
                <td> </td>
                <td>200</td>
            </tr>
            <tr>
                <td>Decontare transport</td>
                <td> </td>
                <td>100(+)</td>
            </tr>
            <tr>
                <td>Contributie C.A.S. </td>
                <td>10.5%</td>
                <td> (-)</td>
            </tr>
            <tr>
                <td>Contributie ajutor somaj </td>
                <td>0.5%</td>
                <td> (-)</td>
            </tr>
            <tr>
                <td>Contributie C.A.S.S. </td>
                <td>5.5%</td>
                <td> (-)</td>
            </tr>
            <tr class="darker">
                <td><span>Venit baza calc. impoz.</span></td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
                <td>Impozit</td>
                <td>16%</td>
                <td> (-)</td>
            </tr>
            <tr class="darker">
                <td><span>Salariu net</span></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <div id="qr_code"></div>

    </div>
</div>
</body>
</html>
