<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 4/7/16
 * Time: 7:34 PM
 */
$username=$_POST['name'];
//$template=file_get_contents('email_templates/user-normall.php',null, stream_context_create(['username'=>$_POST['name']]));
//print_r($template);
//print_r($template);
//die;
?>
<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 4/7/16
 * Time: 5:29 PM
 */
include_once 'vendor/autoload.php';
unset($mail);
$mail= makeMailObject();
//this will set the subject and the body
checkWhichMail($mail);
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->addAddress($_POST['email']);     // Add a recipient
if(!$mail->send()) {
//    echo 'Message could not be sent.';
//    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    /**
     * email send to the admin
     */
    unset($mail);
    $mail=makeMailObject();
    checkWhichMaiSendToAdmin($mail);
    $mail->addAddress('sales@imzolo.com');
    $mail->addBCC('aashima@imzolo.com');
    $mail->addBCC('lakhani@imzolo.com');
    $mail->addAddress('sales@imzolo.com');
    $mail->send()?'success mail send to the admin':'error in sending mail to the admin';
    header('Location:thankyou.php');
}

function makeMailObject(){
    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'email-smtp.us-west-2.amazonaws.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'AKIAJHQ3XNEXXHP27ZSA';                 // SMTP username
    $mail->Password = 'AoeE41tcpicmrBVhhdVtiA9pUIvKCD7rndYhnsUalQCj';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom('hi@imzolo.com', 'zolo');
//$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('hi@imzolo.com', 'noreply');
//$mail->addCC('tushar@scaledesk.com');
//$mail->addBCC('tushar@scaledesk.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
return $mail;
}
function checkWhichMail(PHPMailer $mail){
    if($_POST['whichform']=='normalform'){
        //normal form
        $template='<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<title>Batch1 Template 13</title>

<style type="text/css">

div, p, a, li, td { -webkit-text-size-adjust:none; }

*{
-webkit-font-smoothing: antialiased;
-moz-osx-font-smoothing: grayscale;
}

.ReadMsgBody
{width: 100%; background-color: #ffffff;}
.ExternalClass
{width: 100%; background-color: #ffffff;}
body{width: 100%; height: 100%; margin:0; padding:0; -webkit-font-smoothing: antialiased;}
html{ background-color: #e6e4db;width: 100%; }

@font-face {font-family: \'proxima_novalight\';src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-light-webfont.eot\');src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-light-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-light-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-light-webfont.ttf\') format(\'truetype\');font-weight: normal;font-style: normal;}

@font-face {font-family: \'proxima_nova_rgregular\'; src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-regular-webfont.eot\');src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-regular-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-regular-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-regular-webfont.ttf\') format(\'truetype\');font-weight: normal;font-style: normal;}

@font-face {font-family: \'proxima_novasemibold\';src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-semibold-webfont.eot\');src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-semibold-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-semibold-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-semibold-webfont.ttf\') format(\'truetype\');font-weight: normal;font-style: normal;}

@font-face {font-family: \'proxima_nova_rgbold\';src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-bold-webfont.eot\');src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-bold-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-bold-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-bold-webfont.ttf\') format(\'truetype\');font-weight: normal;font-style: normal;}

@font-face {font-family: \'proxima_novathin\';src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-thin-webfont.eot\');src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-thin-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-thin-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-thin-webfont.ttf\') format(\'truetype\');font-weight: normal;font-style: normal;}

@font-face {font-family: \'proxima_novablack\';src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-black-webfont.eot\');src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-black-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-black-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-black-webfont.ttf\') format(\'truetype\');font-weight: normal;font-style: normal;}

@font-face {font-family: \'proxima_novaextrabold\';src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-extrabold-webfont.eot\');src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-extrabold-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-extrabold-webfont.woff2\') format(\'woff2\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-extrabold-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-extrabold-webfont.ttf\') format(\'truetype\');font-weight: normal;font-style: normal;}


p {padding: 0!important; margin-top: 0!important; margin-right: 0!important; margin-bottom: 0!important; margin-left: 0!important; }

.hover:hover {opacity:0.85;filter:alpha(opacity=85); }


.jump:hover {
    opacity:0.75;
    filter:alpha(opacity=75);
    padding-top: 10px!important;}

.image475 img {width: 475px; height: auto;}
.image250 img {width: 250px; height: auto;}
.logo img {width: 125px; height: auto;}


</style>

<!-- @media only screen and (max-width: 640px)
           {*/
           -->
<style type="text/css"> @media only screen and (max-width: 640px){
        body{width:auto!important;}
        table[class=full] {width: 100%!important; clear: both; }
        table[class=mobile] {width: 100%!important; padding-left: 20px; padding-right: 20px; clear: both; }
        table[class=fullCenter] {width: 100%!important; text-align: center!important; clear: both; }
        td[class=image475] img {width: 100%!important; text-align: center!important; clear: both; }
        td[class=fullCenter] {width: 100%!important; text-align: center!important; clear: both; }
        *[class=buttonScale] {float: none!important; text-align: center!important; display: inline-block!important; clear: both;}
        *[class=erase] {display: none;}
} </style>
<!--

@media only screen and (max-width: 479px)
           {
           -->
<style type="text/css"> @media only screen and (max-width: 479px){
        body{width:auto!important;}
        table[class=full] {width: 100%!important; clear: both; }
        table[class=mobile] {width: 100%!important; padding-left: 20px; padding-right: 20px; clear: both; }
        table[class=fullCenter] {width: 100%!important; text-align: center!important; clear: both; }
        td[class=fullCenter] {width: 100%!important; text-align: center!important; clear: both; }
        td[class=image475] img {width: 100%!important; text-align: center!important; clear: both; }
        *[class=buttonScale] {float: none!important; text-align: center!important; display: inline-block!important; clear: both;}
        *[class=erase] {display: none;}

        }
} </style>

</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" yahoo="fix">

<div class="ui-sortable" id="sort_them">
<!-- Wrapper 1 -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
    <tbody><tr>
        <td width="100%" valign="top" align="center">


            <!-- Wrapper -->
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile">
                <tbody><tr>
                    <td align="center">

                        <!-- Space -->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                            <tbody><tr>
                                <td width="100%" height="60"></td>
                            </tr>
                        </tbody></table><!-- End Space -->

                    </td>
                </tr>
            </tbody></table><!-- End Wrapper -->


        </td>
    </tr>
</tbody></table><!-- Wrapper 1 -->

<!-- Wrapper 3  -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
    <tbody><tr>
        <td bgcolor="#e6e4db" align="center" style="background-color: rgb(230, 228, 219);">


            <!-- Mobile Wrapper -->
            <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile">
                <tbody><tr style="border-color: #ff0072;">
                    <td width="475" align="center" style="border-color: #ff0072;">

                        <!-- Start Nav -->
                        <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="full" bgcolor="#71a42e" style="border-top-left-radius: 4px; border-top-right-radius: 4px; border-color: #ff0072; background-color: #ff0072;">
                            <tbody><tr>
                                <td width="100%" height="10"></td>
                            </tr>
                            <tr>
                                <td width="475" valign="middle" class="logo" align="center">

                                    <!-- Space -->
                                    <table width="30" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="full">
                                        <tbody><tr>
                                            <td width="100%" height="1" style="font-size: 1px; line-height: 1px;">&nbsp;</td>
                                        </tr>
                                    </tbody></table><!-- End Space -->

                                    <!-- Logo -->
                                    <table width="125" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                        <tbody><tr>
                                            <td height="50" valign="middle" width="100%" style="text-align: left;" class="fullCenter">
                                                <a href="http://www.imzolo.com/#/home" cu-identify="element_05265700270881215"><img width="125" src="http://www.imzolo.com/global/images/Zolo-Logo-c.png" alt="" border="0" class="hover" cu-identify="element_011756044608994021"></a>
                                            </td>
                                        </tr>
                                    </tbody></table>

                                    <!-- Space -->
                                    <table width="40" border="0" cellpadding="0" cellspacing="0" align="right" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="full">
                                        <tbody><tr>
                                            <td width="100%" height="1"></td>
                                        </tr>
                                    </tbody></table><!-- End Space -->

                                    <!-- Nav -->


                                    <!-- Space -->
                                    <table width="1" border="0" cellpadding="0" cellspacing="0" align="right" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="full">
                                        <tbody><tr>
                                            <td width="100%" height="10" class="erase"></td>
                                        </tr>
                                    </tbody></table><!-- End Space -->

                                </td>
                            </tr>
                            <tr>
                                <td width="100%" height="10"></td>
                            </tr>
                        </tbody></table><!-- End Nav -->

                    </td>
                </tr>
            </tbody></table>


        </td>
    </tr>
</tbody></table><!-- End 3 -->

<!-- Wrapper 4  -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
    <tbody><tr>
        <td bgcolor="#e6e4db" align="center" style="background-color: rgb(230, 228, 219);">


            <!-- Mobile Wrapper -->
            <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" style="background-image: url(\'https://s3-ap-southeast-1.amazonaws.com/zolo/zolo_category_images/weddingbanners/wedding-mail-banner.jpg\');background-color: rgba(211,211,211,1);background-size: cover;background-position: center center;background-repeat: no-repeat;" id="BGheaderChange">
                <tbody><tr>
                    <td width="475" align="center">

                     <!--[if gte mso 9]>
                      <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px;height:300px;">
                        <v:fill type="tile" src="https://s3-ap-southeast-1.amazonaws.com/zolo/zolo_category_images/weddingbanners/wedding-mail-banner.jpg" id="BGheaderChange_outlook" class="stay" />
                        <v:textbox style="mso-fit-shape-to-text:true" inset="0,0,0,0">
                      <![endif]-->
                      <div>

                        <!-- Start Background Image -->
                        <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                            <tbody><tr>
                                <td width="475" valign="middle" class="image250" align="center">

                                    <!-- Header Image -->
                                    <table width="280" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                        <tbody><tr>
                                            <td width="280" height="80"></td>
                                        </tr>
                                        <tr>
                                            <td width="280" height="109" valign="middle" style="text-align: center;" class="fullCenter">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="280" height="80"></td>
                                        </tr>
                                    </tbody></table><!-- End Header Image -->

                                </td>
                            </tr>
                        </tbody></table><!-- End Background Image -->

                        </div><!--[if gte mso 9.]>
                        </v:textbox>
                       </v:fill></v:rect>
                       <![endif]-->

                    </td>
                </tr>
            </tbody></table>


        </td>
    </tr>
</tbody></table><!-- End Wrapper 4 -->

<!-- Wrapper 6  -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
    <tbody><tr>
        <td bgcolor="#e6e4db" align="center" style="background-color: rgb(230, 228, 219);">


            <!-- Mobile Wrapper -->
            <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#ffffff" style="background-color: rgb(255, 255, 255);">
                <tbody><tr>
                    <td width="475" align="center">

                        <!-- Space -->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                            <tbody><tr>
                                <td width="100%" height="15"></td>
                            </tr>
                        </tbody></table><!-- End Space -->

                        <!-- Headline -->
                        <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                            <tbody><tr>
                                <td width="475" valign="middle" align="center">

                                    <!-- Header Text -->
                                    <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                        <tbody><tr>
                                            <td width="40"></td>
                                            <td valign="middle" width="395" style="text-align: left;font-family: Helvetica, Arial, sans-serif;font-size: 18px;color: #232323;line-height: 18px;font-weight: bold;" class="fullCenter">
                                                <!--[if !mso]><!--><span style="font-family: \'proxima_nova_rgbold\', Helvetica; font-weight: normal;"><!--<![endif]--><p cu-identify="element_08212225270751117">Hi '.$_POST["name"].',<!--[if !mso]><!--><!--<![endif]-->
                                            </p></span></td>
                                            <td width="40"></td>
                                        </tr>
                                    </tbody></table>
                                </td>
                            </tr>
                        </tbody></table><!-- End Headline -->

                    </td>
                </tr>
            </tbody></table>


        </td>
    </tr>
</tbody></table><!-- End Wrapper 6 -->

<!-- Wrapper 6  -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
    <tbody><tr>
        <td bgcolor="#e6e4db" align="center" style="background-color: rgb(230, 228, 219);">


            <!-- Mobile Wrapper -->
            <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#ffffff" style="background-color: rgb(255, 255, 255);">
                <tbody><tr>
                    <td width="475" align="center">

                        <!-- Space -->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                            <tbody><tr>
                                <td width="100%" height="10"></td>
                            </tr>
                        </tbody></table><!-- End Space -->

                        <!-- Text -->
                        <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                            <tbody><tr>
                                <td width="475" valign="middle" align="center">

                                    <!-- Header Text -->
                                    <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                        <tbody><tr>
                                            <td width="40"></td>
                                            <td valign="middle" width="395" style="text-align: left; font-family: Helvetica, Arial, sans-serif;
           font-size: 15px; color: rgb(151, 151, 151); line-height: 24px;" class="fullCenter">
                                                <!--[if !mso]><!--><span style="font-family: \'proxima_novasemibold\', Helvetica; font-weight: normal;"><!--<![endif]--><p cu-identify="element_09201169670319083">Thanks for stopping by on Zolo Weddings and we hope to help you the best way we can :)<!--[if !mso]><!--><!--<![endif]-->
                                            </p></span></td>
                                            <td width="40"></td>
                                        </tr>
                                    </tbody></table>
                                </td>
                            </tr>
                        </tbody></table><!-- End Text -->

                        <!-- Space -->
                        <!-- End Space -->

                    </td>
                </tr>
            </tbody></table>


        </td>
    </tr>
</tbody></table>

<!-- Wrapper 6  -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
    <tbody><tr>
        <td bgcolor="#e6e4db" align="center" style="background-color: rgb(230, 228, 219);">


            <!-- Mobile Wrapper -->
            <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#ffffff" style="background-color: rgb(255, 255, 255);">
                <tbody><tr>
                    <td width="475" align="center">

                        <!-- Space -->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                            <tbody><tr>
                                <td width="100%" height="10"></td>
                            </tr>
                        </tbody></table><!-- End Space -->

                        <!-- Text -->
                        <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                            <tbody><tr>
                                <td width="475" valign="middle" align="center">

                                    <!-- Header Text -->
                                    <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                        <tbody><tr>
                                            <td width="40"></td>
                                            <td valign="middle" width="395" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #979797; line-height: 24px; font-weight: normal;" class="fullCenter">
                                                <!--[if !mso]><!--><span style="font-family: \'proxima_nova_rgregular\', Helvetica; font-weight: normal;"><!--<![endif]--><p cu-identify="element_0949466731107284">Your query is important to us, one of our #ZoloWedExpert will get back to you shortly. If you\'re in a rush you can connect with us on <strong style="text-decoration: none"><a href="tel:+91 88820-91091">+91 88820-91091. </a></strong></p><p><!--[if !mso]><!--><!--<![endif]-->
                                            </p></span></td>
                                            <td width="40"></td>
                                        </tr>
                                    </tbody></table>
                                    <!-- Space -->
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                        <tbody><tr>
                                            <td width="100%" height="17"></td>
                                        </tr>
                                        </tbody></table><!-- End Space -->
                                    <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                        <tbody><tr>
                                            <td width="40"></td>
                                            <td valign="middle" width="395" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #979797; line-height: 24px; font-weight: normal;" class="fullCenter">
                                                <!--[if !mso]><!--><span style="font-family: \'proxima_nova_rgregular\', Helvetica; font-weight: normal;"><!--<![endif]--><p cu-identify="element_0949466731107284"><strong style="color: #232323">Just to remind you...! Zolo is a commission free wedding planning service. </strong></p><!--[if !mso]><!--><!--<![endif]-->
                                            </p></span></td>
                                            <td width="40"></td>
                                        </tr>
                                        </tbody></table>
                                    <!-- Space -->
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                        <tbody><tr>
                                            <td width="100%" height="17"></td>
                                        </tr>
                                        </tbody></table><!-- End Space -->
                                    <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                        <tbody><tr>
                                            <td width="40"></td>
                                            <td valign="middle" width="395" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #979797; line-height: 24px; font-weight: normal;" class="fullCenter">
                                                <!--[if !mso]><!--><span style="font-family: \'proxima_nova_rgregular\', Helvetica; font-weight: normal;"><!--<![endif]--><p cu-identify="element_0949466731107284">If you are a Bride or Groom you can take advantage of a free counseling session from our expert Nidhi Jagtiani. This is a special 1 hour Telephonic one-on-one Pre-Marriage counseling session covering various topics. Don\'t forget to ask for this session from our wedding experts.
 </p><!--[if !mso]><!--><!--<![endif]-->
                                                </p></span></td>
                                            <td width="40"></td>
                                        </tr>
                                        </tbody></table>
                                    <!-- Space -->
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                        <tbody><tr>
                                            <td width="100%" height="17"></td>
                                        </tr>
                                        </tbody></table><!-- End Space -->
                                    <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                        <tbody><tr>
                                            <td width="40"></td>
                                            <td valign="middle" width="395" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #979797; line-height: 24px; font-weight: normal;" class="fullCenter">
                                                <!--[if !mso]><!--><span style="font-family: \'proxima_nova_rgregular\', Helvetica; font-weight: normal;"><!--<![endif]--><p cu-identify="element_0949466731107284"><strong style="color: #ff0072"> About Nidhi Jagtiani</strong><br>
Nidhi is the Founder and Owner of Image Redefined based out of Gurgaon. A Personal Stylist and Image Coach & a Visiting Guest Faculty at Pearl Academy for Personal Style and Grooming. Nidhi Jagtiani provides workshops, seminars for both individuals and corporates in Bridal Shopping, Power Dressing, Personal Branding, Power Wardrobe, Personal Style Evaluation & More.
 </p><!--[if !mso]><!--><!--<![endif]-->
                                                </p></span></td>
                                            <td width="40"></td>
                                        </tr>
                                        </tbody></table>
                                    <!-- Space -->
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                        <tbody><tr>
                                            <td width="100%" height="17"></td>
                                        </tr>
                                        </tbody></table><!-- End Space -->
                                    <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                        <tbody><tr>
                                            <td width="40"></td>
                                            <td valign="middle" width="395" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #979797; line-height: 24px; font-weight: normal;" class="fullCenter">
                                                <!--[if !mso]><!--><span style="font-family: \'proxima_nova_rgregular\', Helvetica; font-weight: normal;"><!--<![endif]--><p cu-identify="element_0949466731107284"><strong style="color: #ff0072"> About Zolo Weddings</strong><br>
Zolo Weddings is the coolest one stop online destination to discover, plan and shop for your wedding! We work with handpicked vendors to ensure you get best execution for your wedding. Our wedding experts will work with you to arrange everything from Venue Booking to Vintage Car Rentals and ensure a hassle free experience on your big day. </p><!--[if !mso]><!--><!--<![endif]-->
                                                </p></span></td>
                                            <td width="40"></td>
                                        </tr>
                                        </tbody></table>
                                    <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                        <tbody><tr>
                                            <td width="40"></td>
                                            <td valign="middle" width="395" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #979797; line-height: 24px; font-weight: normal;" class="fullCenter">
                                                <!--[if !mso]><!--><span style="font-family: \'proxima_nova_rgregular\', Helvetica; font-weight: normal;"><!--<![endif]--><div><br></div><div style="font-weight: 600">Wish you a Happy Wedding :)</div><div style="font-weight: 600">Team Zolo</div><p><!--[if !mso]><!--><!--<![endif]-->
                                            </p></span></td>
                                            <td width="40"></td>
                                        </tr>
                                        </tbody></table>
                                    <!-- Space -->
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                        <tbody><tr>
                                            <td width="100%" height="17"></td>
                                        </tr>
                                        </tbody></table><!-- End Space -->
                                    <!-- Header Text -->
                                    <table width="395" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                        <!----------------- Button Left, Scale Center ----------------->
                                        <tbody><tr>
                                            <td class="buttonScale" width="auto" align="left">

                                                <table border="0" cellpadding="0" cellspacing="0" align="left" class="buttonScale">
                                                    <tbody style="border-color: #ff0072;"><tr style="border-color: #ff0072;">
                                                        <td width="auto" align="center" height="40" bgcolor="#71a42e" style="border-radius: 4px; padding-left: 20px; padding-right: 20px; font-weight: 600; font-family: Helvetica, Arial, sans-serif; color: rgb(255, 255, 255); border-color: #ff0072; background-color: #ff0072;">
                                                            <!--[if !mso]><!--><span style="font-family: \'proxima_novasemibold\', Helvetica; font-weight: normal;"><!--<![endif]-->
                                                                <a href="http://imzolo.com/wedding-specials" style="color: #ffffff; font-size: 15px; text-decoration: none; line-height: 40px; width: 100%;" cu-identify="element_05848554069063554">Explore our Wedding Packages</a>
                                                            <!--[if !mso]><!--></span><!--<![endif]-->
                                                        </td>
                                                    </tr>
                                                    </tbody></table>
                                            </td>
                                        </tr>
                                        <!----------------- End Button Left, Scale Center ----------------->
                                        </tbody></table>
                                </td>
                            </tr>
                        </tbody></table><!-- End Text -->

                        <!-- Space -->
                        <!-- End Space -->

                    </td>
                </tr>
            </tbody></table>


        </td>
    </tr>
</tbody></table><!-- End Wrapper 6 -->

<!-- Wrapper 6  -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
    <tbody><tr>
        <td bgcolor="#e6e4db" align="center" style="background-color: rgb(230, 228, 219);">


            <!-- Mobile Wrapper -->
            <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#ffffff" style="background-color: rgb(255, 255, 255);">
                <tbody><tr>
                    <td width="475" align="center">

                        <!-- Space -->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                            <tbody><tr>
                                <td width="100%" height="17"></td>
                            </tr>
                        </tbody></table><!-- End Space -->

                        <!-- Headline -->
                        <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                            <tbody><tr>
                                <td width="40" class="erase"></td>
                                <td width="395" valign="middle" align="center">

                                    <!-- Header Text -->


                                </td>
                                <td width="40" class="erase"></td>
                            </tr>
                        </tbody></table><!-- End Headline -->

                    </td>
                </tr>
            </tbody></table>


        </td>
    </tr>
</tbody></table><!-- End Wrapper 6 -->

<!-- Wrapper 6  -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
    <tbody><tr>
        <td bgcolor="#e6e4db" align="center" style="background-color: rgb(230, 228, 219);">


            <!-- Mobile Wrapper -->
            <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#ffffff" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; background-color: rgb(255, 255, 255);">
                <tbody><tr>
                    <td width="475" align="center">

                        <!-- Space -->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                            <tbody><tr>
                                <td width="100%" height="35"></td>
                            </tr>
                        </tbody></table><!-- End Space -->

                    </td>
                </tr>
            </tbody></table>


        </td>
    </tr>
</tbody></table><!-- End Wrapper 6 -->

<!-- Wrapper 6  -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#f3f3f3" object="drag-module-small" style="background-color: rgb(211, 211, 211);">

                            <tbody><tr>
                                <td width="475" height="25"></td>
                            </tr>
                        </tbody></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#f3f3f3" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; background-color: rgb(211, 211, 211);" object="drag-module-small" cu-identifier="element_008109183163040079">
                            <tbody><tr>
                                <td width="475" height="40" align="center">

                                    <table width="320" border="0" cellpadding="0" cellspacing="0" align="center" class="full" bgcolor="#f3f3f3" style="background-color: rgb(211, 211, 211);">
                                        <tbody><tr>
                                            <td width="320" align="center" class="icons">

                                                <!-- Icons -->
                                                <table width="160" border="0" cellpadding="0" cellspacing="0" align="left" class="buttonScale">
                                                    <tbody><tr>
                                                        <td width="22" valign="middle" style="text-align: left;" class="center">
                                                            <a href="https://www.facebook.com/zoloweddings/" cu-identify="element_049655673175345605"><img src="http://res.cloudinary.com/scaledesk/image/upload/v1459774522/zolo_email_template/facebook-icon.png" alt="" width="25" height="25" border="0" cu-identify="element_08992302928963758"></a>
                                                        </td>
                                                        <td width="10"></td>
                                                        <td width="22" valign="middle" style="text-align: left;" class="center">
                                                            <a href="http://www.twitter.com/zolo_official" cu-identify="element_032300923754103605"><img src="http://res.cloudinary.com/scaledesk/image/upload/v1459774524/zolo_email_template/twitter.png" alt="" width="25" height="25" border="0" cu-identify="element_09574616415178274"></a>
                                                        </td>
                                                        <td width="10"></td>
                                                        <td width="22" valign="middle" style="text-align: left;" class="center">
                                                            <a href="https://www.linkedin.com/company/zolo-technologies-private-limited" cu-identify="element_07461104918034887"><img src="http://res.cloudinary.com/scaledesk/image/upload/v1459939720/zolo_email_template/linkedin.png" alt="" width="25" height="25" border="0" cu-identify="element_08672549120791022"></a>
                                                        </td>
                                                        <td width="10"></td>
                                                        <td width="22" valign="middle" style="text-align: left;" class="center">
                                                            <a href="#"><img src="http://rocketway.net/themebuilder/products/batch1/templates/template_7/images/icon4.png" alt="" width="16" border="0" id="element_022434489142656355" test="test" style="display: none; width: 0px; height: 0px;"></a>
                                                        </td>
                                                    </tr>
                                                </tbody></table>

                                                <!-- Space -->
                                                <table width="1" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                                    <tbody><tr>
                                                        <td width="100%" height="10"></td>
                                                    </tr>
                                                </tbody></table><!-- End Space -->

                                                <!-- Unsubscribe -->
                                                <table width="110" border="0" cellpadding="0" cellspacing="0" align="right" class="full" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
                                                    <tbody><tr>
                                                        <td valign="middle" width="110" height="18" style="text-align: right; font-family: Helvetica, Arial, sans-serif; font-size: 13px; color: #ff0072; line-height: 24px;" class="fullCenter">

                                                                <!--[if !mso]><!--><span style="font-family: \'proxima_nova_rgregular\', Helvetica; font-weight: normal;"><!--<![endif]-->
                                                                <!--subscribe--><a href="http://www.imzolo.com/#/home" style="color: #ff0072; text-decoration: none;" cu-identify="element_039047018264485267">About Us</a><!--unsub-->
                                                                <!--[if !mso]><!--></span><!--<![endif]-->

                                                        </td>
                                                    </tr>
                                                </tbody></table><!-- End Icons -->

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="320" height="25"></td>
                                        </tr>
                                    </tbody></table>

                                </td>
                            </tr>
                        </tbody></table><!-- End Wrapper 6 -->

<!-- Wrapper 1 -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
    <tbody><tr>
        <td width="100%" valign="top" align="center">


            <!-- Wrapper -->
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile">
                <tbody><tr>
                    <td align="center">

                        <!-- Space -->
                        <!-- End Space -->

                    </td>
                </tr>
            </tbody></table><!-- End Wrapper -->


        </td>
    </tr>
</tbody></table><!-- Wrapper 1 -->
</div>
    <style>body{ background: none !important; } </style></body></html>';
        $mail->Body=$template;
        $mail->Subject=$mail->Subject = 'Zolo Weddings- Thankyou, we will get back shortly.';
        return;
    }
    if($_POST['whichform']=='consultform'){
        //consult form
        //subject='Thankyou for signing-up for the Free Counseling Session'
        $template='<html><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <title>Batch1 Template 13</title>

    <style type="text/css">

        div, p, a, li, td { -webkit-text-size-adjust:none; }

        *{
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .ReadMsgBody
        {width: 100%; background-color: #ffffff;}
        .ExternalClass
        {width: 100%; background-color: #ffffff;}
        body{width: 100%; height: 100%; margin:0; padding:0; -webkit-font-smoothing: antialiased;}
        html{ background-color: #e6e4db;width: 100%; }

        @font-face {font-family: \'proxima_novalight\';src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-light-webfont.eot\');src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-light-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-light-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-light-webfont.ttf\') format(\'truetype\');font-weight: normal;font-style: normal;}

        @font-face {font-family: \'proxima_nova_rgregular\'; src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-regular-webfont.eot\');src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-regular-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-regular-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-regular-webfont.ttf\') format(\'truetype\');font-weight: normal;font-style: normal;}

        @font-face {font-family: \'proxima_novasemibold\';src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-semibold-webfont.eot\');src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-semibold-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-semibold-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-semibold-webfont.ttf\') format(\'truetype\');font-weight: normal;font-style: normal;}

        @font-face {font-family: \'proxima_nova_rgbold\';src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-bold-webfont.eot\');src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-bold-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-bold-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-bold-webfont.ttf\') format(\'truetype\');font-weight: normal;font-style: normal;}

        @font-face {font-family: \'proxima_novathin\';src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-thin-webfont.eot\');src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-thin-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-thin-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-thin-webfont.ttf\') format(\'truetype\');font-weight: normal;font-style: normal;}

        @font-face {font-family: \'proxima_novablack\';src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-black-webfont.eot\');src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-black-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-black-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-black-webfont.ttf\') format(\'truetype\');font-weight: normal;font-style: normal;}

        @font-face {font-family: \'proxima_novaextrabold\';src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-extrabold-webfont.eot\');src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-extrabold-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-extrabold-webfont.woff2\') format(\'woff2\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-extrabold-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-extrabold-webfont.ttf\') format(\'truetype\');font-weight: normal;font-style: normal;}


        p {padding: 0!important; margin-top: 0!important; margin-right: 0!important; margin-bottom: 0!important; margin-left: 0!important; }

        .hover:hover {opacity:0.85;filter:alpha(opacity=85); }


        .jump:hover {
            opacity:0.75;
            filter:alpha(opacity=75);
            padding-top: 10px!important;}

        .image475 img {width: 475px; height: auto;}
        .image250 img {width: 250px; height: auto;}
        .logo img {width: 125px; height: auto;}


    </style>

    <!-- @media only screen and (max-width: 640px)
               {*/
               -->
    <style type="text/css"> @media only screen and (max-width: 640px){
        body{width:auto!important;}
        table[class=full] {width: 100%!important; clear: both; }
        table[class=mobile] {width: 100%!important; padding-left: 20px; padding-right: 20px; clear: both; }
        table[class=fullCenter] {width: 100%!important; text-align: center!important; clear: both; }
        td[class=image475] img {width: 100%!important; text-align: center!important; clear: both; }
        td[class=fullCenter] {width: 100%!important; text-align: center!important; clear: both; }
        *[class=buttonScale] {float: none!important; text-align: center!important; display: inline-block!important; clear: both;}
        *[class=erase] {display: none;}
    } </style>
    <!--

    @media only screen and (max-width: 479px)
               {
               -->
    <style type="text/css"> @media only screen and (max-width: 479px){
        body{width:auto!important;}
        table[class=full] {width: 100%!important; clear: both; }
        table[class=mobile] {width: 100%!important; padding-left: 20px; padding-right: 20px; clear: both; }
        table[class=fullCenter] {width: 100%!important; text-align: center!important; clear: both; }
        td[class=fullCenter] {width: 100%!important; text-align: center!important; clear: both; }
        td[class=image475] img {width: 100%!important; text-align: center!important; clear: both; }
        *[class=buttonScale] {float: none!important; text-align: center!important; display: inline-block!important; clear: both;}
        *[class=erase] {display: none;}

    }
    } </style>

</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" yahoo="fix">

<div class="ui-sortable" id="sort_them">
    <!-- Wrapper 1 -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
        <tbody><tr>
            <td width="100%" valign="top" align="center">


                <!-- Wrapper -->
                <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile">
                    <tbody><tr>
                        <td align="center">

                            <!-- Space -->
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                <tbody><tr>
                                    <td width="100%" height="60"></td>
                                </tr>
                                </tbody></table><!-- End Space -->

                        </td>
                    </tr>
                    </tbody></table><!-- End Wrapper -->


            </td>
        </tr>
        </tbody></table><!-- Wrapper 1 -->

    <!-- Wrapper 3  -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
        <tbody><tr>
            <td bgcolor="#e6e4db" align="center" style="background-color: rgb(230, 228, 219);">


                <!-- Mobile Wrapper -->
                <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile">
                    <tbody><tr style="border-color: #ff0072;">
                        <td width="475" align="center" style="border-color: #ff0072;">

                            <!-- Start Nav -->
                            <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="full" bgcolor="#71a42e" style="border-top-left-radius: 4px; border-top-right-radius: 4px; border-color: #ff0072; background-color: #ff0072;">
                                <tbody><tr>
                                    <td width="100%" height="10"></td>
                                </tr>
                                <tr>
                                    <td width="475" valign="middle" class="logo" align="center">

                                        <!-- Space -->
                                        <table width="30" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="full">
                                            <tbody><tr>
                                                <td width="100%" height="1" style="font-size: 1px; line-height: 1px;">&nbsp;</td>
                                            </tr>
                                            </tbody></table><!-- End Space -->

                                        <!-- Logo -->
                                        <table width="125" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                            <tbody><tr>
                                                <td height="50" valign="middle" width="100%" style="text-align: left;" class="fullCenter">
                                                    <a href="http://www.imzolo.com/#/home" cu-identify="element_05265700270881215"><img width="125" src="http://www.imzolo.com/global/images/Zolo-Logo-c.png" alt="" border="0" class="hover" cu-identify="element_011756044608994021"></a>
                                                </td>
                                            </tr>
                                            </tbody></table>

                                        <!-- Space -->
                                        <table width="40" border="0" cellpadding="0" cellspacing="0" align="right" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="full">
                                            <tbody><tr>
                                                <td width="100%" height="1"></td>
                                            </tr>
                                            </tbody></table><!-- End Space -->

                                        <!-- Nav -->


                                        <!-- Space -->
                                        <table width="1" border="0" cellpadding="0" cellspacing="0" align="right" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="full">
                                            <tbody><tr>
                                                <td width="100%" height="10" class="erase"></td>
                                            </tr>
                                            </tbody></table><!-- End Space -->

                                    </td>
                                </tr>
                                <tr>
                                    <td width="100%" height="10"></td>
                                </tr>
                                </tbody></table><!-- End Nav -->

                        </td>
                    </tr>
                    </tbody></table>


            </td>
        </tr>
        </tbody></table><!-- End 3 -->

    <!-- Wrapper 4  -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
        <tbody><tr>
            <td bgcolor="#e6e4db" align="center" style="background-color: rgb(230, 228, 219);">


                <!-- Mobile Wrapper -->
                <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" style="background-image: url(\'https://s3-ap-southeast-1.amazonaws.com/zolo/zolo_category_images/weddingbanners/wedding-mail-banner.jpg\');background-color: rgba(211,211,211,1);background-size: cover;background-position: center center;background-repeat: no-repeat;" id="BGheaderChange">
                    <tbody><tr>
                        <td width="475" align="center">

                            <!--[if gte mso 9]>
                            <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px;height:300px;">
                                <v:fill type="tile" src="https://s3-ap-southeast-1.amazonaws.com/zolo/zolo_category_images/weddingbanners/wedding-mail-banner.jpg" id="BGheaderChange_outlook" class="stay" />
                                <v:textbox style="mso-fit-shape-to-text:true" inset="0,0,0,0">
                            <![endif]-->
                            <div>

                                <!-- Start Background Image -->
                                <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                    <tbody><tr>
                                        <td width="475" valign="middle" class="image250" align="center">

                                            <!-- Header Image -->
                                            <table width="280" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                                <tbody><tr>
                                                    <td width="280" height="80"></td>
                                                </tr>
                                                <tr>
                                                    <td width="280" height="109" valign="middle" style="text-align: center;" class="fullCenter">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="280" height="80"></td>
                                                </tr>
                                                </tbody></table><!-- End Header Image -->

                                        </td>
                                    </tr>
                                    </tbody></table><!-- End Background Image -->

                            </div><!--[if gte mso 9.]>
                            </v:textbox>
                            </v:fill></v:rect>
                            <![endif]-->

                        </td>
                    </tr>
                    </tbody></table>


            </td>
        </tr>
        </tbody></table><!-- End Wrapper 4 -->

    <!-- Wrapper 6  -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
        <tbody><tr>
            <td bgcolor="#e6e4db" align="center" style="background-color: rgb(230, 228, 219);">


                <!-- Mobile Wrapper -->
                <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#ffffff" style="background-color: rgb(255, 255, 255);">
                    <tbody><tr>
                        <td width="475" align="center">

                            <!-- Space -->
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                <tbody><tr>
                                    <td width="100%" height="15"></td>
                                </tr>
                                </tbody></table><!-- End Space -->

                            <!-- Headline -->
                            <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                <tbody><tr>
                                    <td width="475" valign="middle" align="center">

                                        <!-- Header Text -->
                                        <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                            <tbody><tr>
                                                <td width="40"></td>
                                                <td valign="middle" width="395" style="text-align: left;font-family: Helvetica, Arial, sans-serif;font-size: 18px;color: #232323;line-height: 18px;font-weight: bold;" class="fullCenter">
                                                    <!--[if !mso]><!--><span style="font-family: \'proxima_nova_rgbold\', Helvetica; font-weight: normal;"><!--<![endif]--><p cu-identify="element_08212225270751117">Hi '.$_POST["name"].',<!--[if !mso]><!--><!--<![endif]-->
                                            </p></span></td>
                                                <td width="40"></td>
                                            </tr>
                                            </tbody></table>
                                    </td>
                                </tr>
                                </tbody></table><!-- End Headline -->

                        </td>
                    </tr>
                    </tbody></table>


            </td>
        </tr>
        </tbody></table><!-- End Wrapper 6 -->

    <!-- Wrapper 6  -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
        <tbody><tr>
            <td bgcolor="#e6e4db" align="center" style="background-color: rgb(230, 228, 219);">


                <!-- Mobile Wrapper -->
                <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#ffffff" style="background-color: rgb(255, 255, 255);">
                    <tbody><tr>
                        <td width="475" align="center">

                            <!-- Space -->
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                <tbody><tr>
                                    <td width="100%" height="10"></td>
                                </tr>
                                </tbody></table><!-- End Space -->

                            <!-- Text -->
                            <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                <tbody><tr>
                                    <td width="475" valign="middle" align="center">

                                        <!-- Header Text -->
                                        <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                            <tbody><tr>
                                                <td width="40"></td>
                                                <td valign="middle" width="395" style="text-align: left; font-family: Helvetica, Arial, sans-serif;
           font-size: 15px; color: rgb(151, 151, 151); line-height: 24px;" class="fullCenter">
                                                    <!--[if !mso]><!--><span style="font-family: \'proxima_novasemibold\', Helvetica; font-weight: normal;"><!--<![endif]--><p cu-identify="element_09201169670319083">Thankyou for choosing our special Telephonic one-on-one Pre-Marriage counseling session. The session will covering various topics like Wedding Trends, Outfit shopping & much more. The session will be held by an industry expert Nidhi Jagtiani.<!--[if !mso]><!--><!--<![endif]-->
                                            </p></span></td>
                                                <td width="40"></td>
                                            </tr>
                                            </tbody></table>
                                    </td>
                                </tr>
                                </tbody></table><!-- End Text -->

                            <!-- Space -->
                            <!-- End Space -->

                        </td>
                    </tr>
                    </tbody></table>


            </td>
        </tr>
        </tbody></table>

    <!-- Wrapper 6  -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
        <tbody><tr>
            <td bgcolor="#e6e4db" align="center" style="background-color: rgb(230, 228, 219);">


                <!-- Mobile Wrapper -->
                <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#ffffff" style="background-color: rgb(255, 255, 255);">
                    <tbody><tr>
                        <td width="475" align="center">

                            <!-- Space -->
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                <tbody><tr>
                                    <td width="100%" height="10"></td>
                                </tr>
                                </tbody></table><!-- End Space -->

                            <!-- Text -->
                            <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                <tbody><tr>
                                    <td width="475" valign="middle" align="center">

                                        <!-- Header Text -->


                                        <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                            <tbody><tr>
                                                <td width="40"></td>
                                                <td valign="middle" width="395" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #979797; line-height: 24px; font-weight: normal;" class="fullCenter">
                                                    <!--[if !mso]><!--><span style="font-family: \'proxima_nova_rgregular\', Helvetica; font-weight: normal;"><!--<![endif]--><p cu-identify="element_0949466731107284"><strong style="color: #ff0072"> About Nidhi Jagtiani</strong><br>
Nidhi is the Founder and Owner of Image Redefined based out of Gurgaon. A Personal Stylist and Image Coach & a Visiting Guest Faculty at Pearl Academy for Personal Style and Grooming. Nidhi Jagtiani provides workshops, seminars for both individuals and corporates in Bridal Shopping, Power Dressing, Personal Branding, Power Wardrobe, Personal Style Evaluation & More.
 </p><!--[if !mso]><!--><!--<![endif]-->
                                                    </p></span></td>
                                                <td width="40"></td>
                                            </tr>
                                            </tbody></table>
                                        <!-- Space -->
                                        <table width="1" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                            <tbody><tr>
                                                <td width="100%" height="10"></td>
                                            </tr>
                                            </tbody></table><!-- End Space -->
                                        <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                            <tbody><tr>
                                                <td width="40"></td>
                                                <td valign="middle" width="395" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #979797; line-height: 24px; font-weight: normal;" class="fullCenter">
                                                    <!--[if !mso]><!--><span style="font-family: \'proxima_nova_rgregular\', Helvetica; font-weight: normal;"><!--<![endif]--><p cu-identify="element_0949466731107284"><strong style="color: #ff0072"> About Zolo Weddings</strong><br>
Zolo Weddings is the coolest one stop online destination to discover, plan and shop for your wedding! We work with handpicked vendors to ensure you get best execution for your wedding. Our wedding experts will work with you to arrange everything from Venue Booking to Vintage Car Rentals and ensure a hassle free experience on your big day. </p><!--[if !mso]><!--><!--<![endif]-->
                                                    </p></span></td>
                                                <td width="40"></td>
                                            </tr>
                                            </tbody></table>
                                        <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                            <tbody><tr>
                                                <td width="40"></td>
                                                <td valign="middle" width="395" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #979797; line-height: 24px; font-weight: normal;" class="fullCenter">
                                                    <!--[if !mso]><!--><span style="font-family: \'proxima_nova_rgregular\', Helvetica; font-weight: normal;"><!--<![endif]--><p cu-identify="element_0949466731107284">Just to remind you, Zolo Weddings is a <strong>commission free</strong> wedding planing service. Get in touch with our #ZoloWedExpert at <strong style="text-decoration: none"><a href="tel:+91 88820-91091">+91 88820-91091</a></strong>
 </p><!--[if !mso]><!--><!--<![endif]-->
                                                    </p></span></td>
                                                <td width="40"></td>
                                            </tr>
                                            </tbody></table>
                                        <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                            <tbody><tr>
                                                <td width="40"></td>
                                                <td valign="middle" width="395" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #979797; line-height: 24px; font-weight: normal;" class="fullCenter">
                                                    <!--[if !mso]><!--><span style="font-family: \'proxima_nova_rgregular\', Helvetica; font-weight: normal;"><!--<![endif]--><div><br></div><div style="font-weight: 600">Wish you a Happy Wedding :)</div><div style="font-weight: 600">Team Zolo</div><p><!--[if !mso]><!--><!--<![endif]-->
                                            </p></span></td>
                                                <td width="40"></td>
                                            </tr>
                                            </tbody></table>
                                    </td>
                                </tr>
                                </tbody></table><!-- End Text -->

                            <!-- Space -->
                            <!-- End Space -->

                        </td>
                    </tr>
                    </tbody></table>


            </td>
        </tr>
        </tbody></table><!-- End Wrapper 6 -->

    <!-- Wrapper 6  -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
        <tbody><tr>
            <td bgcolor="#e6e4db" align="center" style="background-color: rgb(230, 228, 219);">


                <!-- Mobile Wrapper -->
                <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#ffffff" style="background-color: rgb(255, 255, 255);">
                    <tbody><tr>
                        <td width="475" align="center">

                            <!-- Space -->
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                <tbody><tr>
                                    <td width="100%" height="17"></td>
                                </tr>
                                </tbody></table><!-- End Space -->

                            <!-- Headline -->
                            <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                <tbody><tr>
                                    <td width="40" class="erase"></td>
                                    <td width="395" valign="middle" align="center">



                                    </td>
                                    <td width="40" class="erase"></td>
                                </tr>
                                </tbody></table><!-- End Headline -->

                        </td>
                    </tr>
                    </tbody></table>


            </td>
        </tr>
        </tbody></table><!-- End Wrapper 6 -->

    <!-- Wrapper 6  -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
        <tbody><tr>
            <td bgcolor="#e6e4db" align="center" style="background-color: rgb(230, 228, 219);">


                <!-- Mobile Wrapper -->
                <table width="475" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#ffffff" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; background-color: rgb(255, 255, 255);">
                    <tbody><tr>
                        <td width="475" align="center">

                            <!-- Space -->
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                                <tbody><tr>
                                    <td width="100%" height="35"></td>
                                </tr>
                                </tbody></table><!-- End Space -->

                        </td>
                    </tr>
                    </tbody></table>


            </td>
        </tr>
        </tbody></table><!-- End Wrapper 6 -->

    <!-- Wrapper 6  -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#f3f3f3" object="drag-module-small" style="background-color: rgb(211, 211, 211);">

        <tbody><tr>
            <td width="475" height="25"></td>
        </tr>
        </tbody></table>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile" bgcolor="#f3f3f3" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; background-color: rgb(211, 211, 211);" object="drag-module-small" cu-identifier="element_008109183163040079">
        <tbody><tr>
            <td width="475" height="40" align="center">

                <table width="320" border="0" cellpadding="0" cellspacing="0" align="center" class="full" bgcolor="#f3f3f3" style="background-color: rgb(211, 211, 211);">
                    <tbody><tr>
                        <td width="320" align="center" class="icons">

                            <!-- Icons -->
                            <table width="160" border="0" cellpadding="0" cellspacing="0" align="left" class="buttonScale">
                                <tbody><tr>
                                    <td width="22" valign="middle" style="text-align: left;" class="center">
                                        <a href="https://www.facebook.com/zoloweddings/" cu-identify="element_049655673175345605"><img src="http://res.cloudinary.com/scaledesk/image/upload/v1459774522/zolo_email_template/facebook-icon.png" alt="" width="25" height="25" border="0" cu-identify="element_08992302928963758"></a>
                                    </td>
                                    <td width="10"></td>
                                    <td width="22" valign="middle" style="text-align: left;" class="center">
                                        <a href="http://www.twitter.com/zolo_official" cu-identify="element_032300923754103605"><img src="http://res.cloudinary.com/scaledesk/image/upload/v1459774524/zolo_email_template/twitter.png" alt="" width="25" height="25" border="0" cu-identify="element_09574616415178274"></a>
                                    </td>
                                    <td width="10"></td>
                                    <td width="22" valign="middle" style="text-align: left;" class="center">
                                        <a href="https://www.linkedin.com/company/zolo-technologies-private-limited" cu-identify="element_07461104918034887"><img src="http://res.cloudinary.com/scaledesk/image/upload/v1459939720/zolo_email_template/linkedin.png" alt="" width="25" height="25" border="0" cu-identify="element_08672549120791022"></a>
                                    </td>
                                    <td width="10"></td>
                                    <td width="22" valign="middle" style="text-align: left;" class="center">
                                        <a href="#"><img src="http://rocketway.net/themebuilder/products/batch1/templates/template_7/images/icon4.png" alt="" width="16" border="0" id="element_022434489142656355" test="test" style="display: none; width: 0px; height: 0px;"></a>
                                    </td>
                                </tr>
                                </tbody></table>

                            <!-- Space -->
                            <table width="1" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter">
                                <tbody><tr>
                                    <td width="100%" height="10"></td>
                                </tr>
                                </tbody></table><!-- End Space -->

                            <!-- Unsubscribe -->
                            <table width="110" border="0" cellpadding="0" cellspacing="0" align="right" class="full" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
                                <tbody><tr>
                                    <td valign="middle" width="110" height="18" style="text-align: right; font-family: Helvetica, Arial, sans-serif; font-size: 13px; color: #ff0072; line-height: 24px;" class="fullCenter">

                                        <!--[if !mso]><!--><span style="font-family: \'proxima_nova_rgregular\', Helvetica; font-weight: normal;"><!--<![endif]-->
                                        <!--subscribe--><a href="http://www.imzolo.com/#/home" style="color: #ff0072; text-decoration: none;" cu-identify="element_039047018264485267">About Us</a><!--unsub-->
                                        <!--[if !mso]><!--></span><!--<![endif]-->

                                    </td>
                                </tr>
                                </tbody></table><!-- End Icons -->

                        </td>
                    </tr>
                    <tr>
                        <td width="320" height="25"></td>
                    </tr>
                    </tbody></table>

            </td>
        </tr>
        </tbody></table><!-- End Wrapper 6 -->

    <!-- Wrapper 1 -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full" bgcolor="#e6e4db" style="background-color: rgb(230, 228, 219);">
        <tbody><tr>
            <td width="100%" valign="top" align="center">


                <!-- Wrapper -->
                <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile">
                    <tbody><tr>
                        <td align="center">

                            <!-- Space -->
                            <!-- End Space -->

                        </td>
                    </tr>
                    </tbody></table><!-- End Wrapper -->


            </td>
        </tr>
        </tbody></table><!-- Wrapper 1 -->
</div>
<style>body{ background: none !important; } </style></body></html>';
        $mail->Body=$template;
        $mail->Subject=$mail->Subject = 'Thankyou for signing-up for the Free Counseling Session.';
        return;
    }
}
function checkWhichMaiSendToAdmin(PHPMailer $mail){
    if($_POST['whichform']=='normalform'){
        //normal form
        $admin_template='<html><head><title>User Details</title></head><body>
<strong>Name</strong>: '.$_POST['name'].'<br/>
<strong>Contact Number</strong>: '.$_POST['phonenumber'].'<br/>
<strong>services</strong>: <pre/><br/>'.implode("<br/>",$_POST["services"]).'<br/>
<strong>Email</strong>: '.$_POST['email'].'<br/>
</body></html>';
        $mail->Body=$admin_template;
        $mail->Subject=$mail->Subject = 'Contact from zolo weddings landing page';
        return;
    }
    if($_POST['whichform']=='consultform'){
        $admin_template='<html><head><title>User Details</title></head><body>
<strong>Name</strong>: '.$_POST['name'].'<br/>
<strong>Contact Number</strong>: '.$_POST['phonenumber'].'<br/>
<strong>Groom or Bride</strong>: '.$_POST['GroomorBride'].'<br/>
<strong>Email</strong>: '.$_POST['email'].'<br/>
</body></html>';
        $mail->Body=$admin_template;
        $mail->Subject=$mail->Subject = 'Free Consultation- Contact from zolo weddings landing page';
    }
}
?>
