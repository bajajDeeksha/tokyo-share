<?php
session_start();
include 'config.php';
$allData = $_SESSION['post_data'];
$name = $_SESSION['post_data']['name'];
$email = $_SESSION['post_data']['email'];
$phone = $_SESSION['post_data']['phone'];
$date = $_SESSION['post_data']['date'];
$price = $_SESSION['post_data']['amount'];
$number_of_people = $_SESSION['post_data']['people'];
$purpose = $_SESSION['post_data']['purpose'];
$preference = $_SESSION['post_data']['check_1'];
$akib_plan = $_SESSION['post_data']['plan'];
$time = $_SESSION['post_data']['time_slot'];
$coupon = $_SESSION['post_data']['coupon'];
$comment = $_SESSION['post_data']['comment'];

function generateRandomString($length = 16) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$unique_link = generateRandomString().'?'.date('Y-m-d', strtotime($date));


$query = "INSERT into events (`name`, email, phone, `date`, price, number_of_people, purpose, preference, akib_plan, `time`, coupon, comment, unique_link) 
VALUES ('$name', '$email', '$phone', '$date', '$price', '$number_of_people', '$purpose', '$preference', '$akib_plan', '$time', '$coupon', '$comment', '$unique_link')";
mysqli_set_charset($db, "utf8");
mysqli_query($db,$query);

require ('PHPMailer-master/PHPMailerAutoload.php'); 

$mail = new PHPMailer;

 $mail->isSMTP();                                      // Set mailer to use SMTP
 $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
 $mail->SMTPDebug = 1;
 $mail->SMTPAuth = true;                               // Enable SMTP authentication
 $mail->Username = 'deekshaonethird@gmail.com';                 // SMTP username
 $mail->Password = 'pagalPrats14#';                           // SMTP password
 $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
 $mail->Port = 465;                                    // TCP port to connect to
$mail->IsHTML(true);
$mail->setFrom('deekshaonethird@gmail.com', 'ME');
$mail->addAddress('dishab16@gmail.com', 'YOOU');     // Add a recipient

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

// if(!$mail->send()) {
//     echo 'Message could not be sent.';
//     echo 'Mailer Error: ' . $mail->ErrorInfo;
// } else {
//     echo 'Message has been sent';
// }

?>

<html lang="en">
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">

    <title> 1-3rd Share Cafe and Studio </title>

    <!-- icon -->
    <link rel="icon" type="image/png" href="">

    <!-- main css -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/superslids.css" rel="stylesheet">   
    <link href="css/customize.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,500,600,700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Top Header -->
    <header class="site-header">
        <nav class="site-nav transparent">
                <a href=""><img class="logo" src="images/1-3rd-Share_Cafe_white.png"></a>
        </nav>
	</header>

   <!-- Second Header fizes on top -->
	<nav class="subnav-wrapper subnav">
        <div class="container">
            <div class="row text-center">
                <h2 style="margin-top:30px;"> 完了 </h2>
            </div>
        </div>
    </nav>


    <!-- Thank you Block -->
    <section>
        <div class="container">
            <div class="row">
                <div class="thank-box">
                    <h2>ありがとうございます</h2>
                    <p>予約内容と決済方法の案内をお客さまに送信しました。</p>
                <div>
                <div class="text-center">
                    <button class="btn btn-lg btn-submit"> <a href="login.php"> ログアウト </a> </button>
                </div>
                <p> Created link - </p>
                <a href="detail.php?<?php echo $unique_link; ?> ">detail.php?<?php echo $unique_link; ?> </a>
            </div>
        </div>
    </section>

    <!-- main JS-->
    <script src='js/jquery.js'></script>
    <script src='js/bootstrap.js'></script>
</body>

</html>