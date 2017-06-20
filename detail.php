<?php
session_start();
require_once "config.php";

$data = explode('?', key($_GET));
$unique_link = $data[0].'?'.$data[1];
$_SESSION['unique_link'] = $unique_link;
$name = '';
$date_time = '';
$plan = '';
$number_of_people = '';
$purpose = '';
$optional_plan = '';
$coupon_code = '';
$amount = '';
$query = "select * from events WHERE unique_link = '$unique_link'";
mysqli_set_charset($db, "utf8");
$final = mysqli_query($db, $query);
$allData = mysqli_fetch_all($final);
$payment = $allData['payment'];
if ((strtotime($data[1]) < strtotime(date('Y-m-d'))) || $payment == 1)
{
    echo 'link expired, please register again !';
    die;
}
if (!empty($allData))
{
    $name = $allData[0][1];
    $date_time = $allData[0][4];
    $plan = $allData[0][8];
    $number_of_people = $allData[0][6];
    $purpose = $allData[0][7];
    $optional_plan = $allData[0][9];
    $coupon_code = $allData[0][11];
    $amount = $allData[0][5];
    $time_slot = $allData[0][10];
    
}
else{
    echo '404 - Not Found';
    die;
}
$_SESSION['name'] = $plan;
if ($plan == '東京シェアカフェ(日本橋)') {
    $_SESSION['address'] = '東京都中央区日本橋本町4-3-4';
    $_SESSION['off_add'] = '東京都中央区日本橋本町4-3-4';
    $_SESSION['off_add_val'] = '1';
} elseif ($plan == '秋葉原貸切Cafe and Bar'){
    $_SESSION['address'] = '東京都千代田区外神田4-6-10';
    $_SESSION['off_add'] = '東京都千代田区外神田4-6-10';
    $_SESSION['off_add_val'] = '2';
} elseif ($plan == '屋上スペース(神田・秋葉原)'){
    $_SESSION['address'] = '東京都千代田区外神田3-7-8';
    $_SESSION['off_add'] = '東京都千代田区外神田4-6-10';
    $_SESSION['off_add_val'] = '2';
} elseif ($plan == '代々木上原スペース(代々木・渋谷)') {
    $_SESSION['address'] = '東京都渋谷区大山町17-25';
    $_SESSION['off_add'] = '東京都渋谷区大山町17-25';
    $_SESSION['off_add_val'] = '3';
} elseif ($plan == '古民家スペース(神田・秋葉原)') {
    $_SESSION['address'] = '東京都千代田区外神田5-2-10';
    $_SESSION['off_add'] = '東京都千代田区外神田4-6-10';
    $_SESSION['off_add_val'] = '2';
} elseif ($plan == '新宿ハウス(新宿・四ツ谷)') {
    $_SESSION['address'] = '東京都新宿区愛住町9-9';
    $_SESSION['off_add'] = '東京都新宿区愛住町9-9';
    $_SESSION['off_add_val'] = '4';
} elseif ($plan == '撮影スタジオⅠ(神田・秋葉原)') {
    $_SESSION['address'] = '東京都千代田区外神田 3-16-13';
    $_SESSION['off_add'] = '東京都千代田区外神田4-6-10';
    $_SESSION['off_add_val'] = '2';
} elseif ($plan == '撮影スタジオⅡ(神田・秋葉原)') {
    $_SESSION['address'] = '東京都千代田区外神田 3-16-13';
    $_SESSION['off_add'] = '東京都千代田区外神田4-6-10';
    $_SESSION['off_add_val'] = '2';
} elseif ($plan == '撮影スタジオⅢ(神田・秋葉原)') {
    $_SESSION['address'] = '東京都千代田区外神田2-23-23';
    $_SESSION['off_add'] = '東京都千代田区外神田4-6-10';
    $_SESSION['off_add_val'] = '2';
} elseif ($plan == '日本橋撮影スタジオ') {
    $_SESSION['address'] = '東京都中央区日本橋1-1-2';
    $_SESSION['off_add'] = '東京都中央区日本橋本町4-3-4';
    $_SESSION['off_add_val'] = '1';
} elseif ($plan == '池袋古民家スペース') {
    $_SESSION['address'] = '東京都豊島区要町2-1-20';
    $_SESSION['off_add'] = '東京都豊島区要町2-1-20';
    $_SESSION['off_add_val'] = '5';
}

?>
<!DOCTYPE html>
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
                <h2 style="margin-top:30px;"> 決済ページ </h2>
            </div>
        </div>
    </nav>

    <!-- form for the customers -->
    <section>
        <div class="container">
            <h4 style="line-height: 1.6;">この度は、東京シェアカフェにご予約をいただきまして誠にありがとうございます。下記のご予約内容をお確かめの上、期日までのお支払いをお願いいたします。</h4>
            <hr>
            <div id="detail" class="row">
                <div class="col-md-6"> 
                    <img class="img-responsive" style="margin-top: 25px;" src="images/space/<?php echo $plan ?>.jpg"> 
                </div>
                <div class="col-md-6">
                    <h2> <?php echo $plan ?> </h2>
                    <table class="table table-hover">
                        <tr>
                            <th>名前 :</th>
                            <td><?php echo $name ?></td>
                        </tr>
                        <tr>
                            <th>ご利用日 :</th>
                            <td><?php echo $date_time ?></td>
                        </tr>
                        <tr>
                            <th>ご利用時間 :</th>
                            <td><?php echo $time_slot?></td>
                        </tr>
                        <tr>
                            <th>人数 :</th>
                            <td><?php echo $number_of_people ?></td>
                        </tr>
                        <tr>
                            <th>ご利用目的 :</th>
                            <td><?php echo $purpose ?></td>
                        </tr>
                        <tr>
                            <th>オプションプラン :</th>
                            <td><?php echo $optional_plan ?></td>
                        </tr>
                        <tr>
                            <th>クーポンコード :</th>
                            <td><?php echo $coupon_code ?></td>
                        </tr>
                    </table>
                    <h2> ご利用金額: <?php echo $amount ?> 円 ( 税込 ) <?php if($coupon_code) { echo '<span style="color:red; font-size:16px;"> クーポン適用後 </span>';} ?> </h2>
                </div>
            </div>
            <div id="terms">
                <h4> *お支払い前に必ずお読みください*</h4>
                <div class="list">
                    <h5 style="line-height: 1.7;">
                        * お支払いが完了するまで、お客様のご予約は「仮予約」となります。お客様のお支払いの確認が取れた時点で、予約確定となります。<br/>
                        * 決済案内メール送信後、２日以内にお支払いをお願い致します。<br/>
                        * お支払期日までに、支払い確認が取れない場合、自動的に「仮予約」をキャンセル致します。<br/>
                        * ご利用日の8日前まで無料キャンセルを承ります。ご利用日より 7 日以内のご予約のキャンセルは、キャンセル料金が全額発生いたしますので予めご了承くださいませ。 
                    </h5>
                    <input type="checkbox" name="Terms" value="Conditions"> "上記内容を確認、理解したうえで、同意します"</span>
                </div>
                <div style="margin: auto;" class="text-center">
                <!--<button style="text-center" type="submit" class="btn btn-lg btn-primary block">Proceed To Payment</button>-->
                <form action="final.php" method="POST">
                    <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_TGx5l27hcN1DyFInrEcr38FZ"
                        data-amount="<?php echo $amount ?>"
                        data-name="C.M.Phoenix Pty Ltd"
                        data-description="Widget"
                        data-locale="auto"
                        data-currency="jpy">
                    </script>
                </form>
                </div>
            </div>
        </div>
    </section>

    <!-- main JS-->
    <script src='js/jquery.js'></script>
    <script src='js/bootstrap.js'></script>

</body>
</html>
