<?php
session_start();
$_POST['link'] = $_POST['name'].'?'.$_POST['email'].'?'.$_POST['phone'].'?'.$_POST['date'].'?'.$_POST['amount'].'?'.$_POST['people'].'?'.$_POST['purpose'].'?'.$_POST['check_1'].'?'.$_POST['plan'].'?'.$_POST['time_slot'].'?'.$_POST['coupon'].'?'.$_POST['comment'].'?'.date('d-m-y');
$_SESSION['post_data'] = $_POST;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">

    <title> TSC - Event Confirm </title>

    <!-- icon -->
    <link rel="icon" type="image/png" href="">

    <!-- main css -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/customize.css" rel="stylesheet">
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
                <h2 style="margin-top:30px;"> 予約内容確認 </h2>
            </div>
        </div>
    </nav>

    <!-- form for the customers -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                        <h4 class="text-center">お客さまに送信する前に下記詳細をご確認ください。</h4>
                        <div class="info">
                            <table class="table table-hover">
                                 <tr>
                                    <th>名前 :</th>
                                    <td><?= $_POST['name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Eメール :</th>
                                    <td><?= $_POST['email']; ?></td>
                                </tr>
                                <tr>
                                    <th>電話番号 :</th>
                                    <td><?= $_POST['phone']; ?></td>
                                </tr>
                                <tr>
                                    <th>利用日 :</th>
                                    <td><?= $_POST['date']; ?></td>
                                </tr>
                                <tr>
                                    <th>値段 :</th>
                                    <td><?= $_POST['amount']; ?></td>
                                </tr>
                                <tr>
                                    <th>人数 :</th>
                                    <td><?= $_POST['people']; ?></td>
                                </tr>
                                <tr>
                                    <th>利用目的 :</th>
                                    <td><?= $_POST['purpose']; ?></td>
                                </tr>
                                <tr>
                                    <th>利用スペース :</th>
                                    <td><?= $_POST['check_1']; ?></td>
                                </tr>
                                <tr>
                                    <th>オプションプラン :</th>
                                    <td><?= $_POST['plan']; ?></td>
                                </tr>
                                <tr>
                                    <th>利用時間帯 :</th>
                                    <td><?= $_POST['time_slot']; ?></td>
                                </tr>
                                <tr>
                                    <th>クーポンコード :</th>
                                    <td><?= $_POST['coupon']; ?></td>
                                </tr>
                                <tr>
                                    <th>備考欄 :</th>
                                    <td><?= $_POST['comment']; ?></td>
                                </tr>
                            </table>
                            <div class="text-center">
                                <button name="back" class="btn btn-lg btn-submit" onclick="history.go(-1);"> 戻る </button>
                                <button name="btnConfirm" class="btn btn-lg btn-success"> <a href="thank.php"> 確定・送信 </a> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- main JS-->
    <script src='js/jquery.js'></script>
    <script src='js/bootstrap.js'></script>

</body>
</html>
