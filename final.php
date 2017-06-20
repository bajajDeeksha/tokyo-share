<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">

    <title> Tokyo Share Cafe - Thank you </title>

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
                <h2 style="margin-top:30px;"> お支払いありがとうございます。 </h2>
                <h4>- ご予約が確定しました -</h4>
            </div>
        </div>
    </nav>

    <!-- Invoice -->
    <section>
        <div class="container">
            <div id="detail" class="row">
                <div class="col-md-6">
                    <h2> <?php echo $_SESSION['name'];?> </h2>
                    <table class="table table-hover">
                        <tr>
                            <th>住所 :</th>
                            <td><?php echo $_SESSION['address'];?></td>
                        </tr>
                        <tr>
                            <th>受付場所 :</th>
                            <td><?php echo $_SESSION['off_add'];?></td>
                        </tr>
                    </table>
                    <h2> ご利用日当日の流れ </h2>
                    <span style="color: #990000; font-size: 16px; background-color:#ffd1d1; padding:5px;">このページは、一度閉じたら再度アクセスすることはできません。同じ内容を確認するには、ご予約確定後に送信されるメールを確認するか、印刷ボタンからこのぺーじを印刷してください。</span>
                    <ol style="line-height:2;margin-top:10px;">
                        <li>ご利用日当日は、上記の受付場所までお越しください。</li>
                        <li>ご利用開始前に、受付場所にてスタッフとご利用規約の確認をいたします。<br/> *お手続き時に、身分証明書とクレジットカードのご提示をお願いいたします。</li>
                        <li>スタッフがスペースへご案内いたします。</li>
                        <li>終了時間までごゆっくりご利用ください。</li>
                        <li>ご利用終了時間になりましたら、スタッフがスペース内を確認いたします。スペース内の原状回復がとれましたら、ご利用終了です。</li>
                    </ol>
                </div>
                <div class="col-md-6"> 
                    <div id="map"></div> 
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-lg btn-submit" onClick="window.print()">このページを印刷する</button>
            </div>
        </div>
    </section>


     <!-- main JS-->
    <script src='js/jquery.js'></script>
    <script src='js/bootstrap.js'></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO0qGyWPhL6tQ4pkLlpUh2A-wF7mLNc5Q" type="text/javascript">
    </script>
    <script>
            var geocoder = new google.maps.Geocoder();
            var address = "<?php echo $_SESSION['address']; ?>";
            var latitude = "";
            var longitude = "";

            geocoder.geocode( { 'address': address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    }
                initialize (latitude, longitude)
            }); 

          function initialize(latitude, longitude){
            var userLng1 = latitude;
            var userLat1 = longitude;

            var off_add_val = "<?php echo $_SESSION['off_add_val']; ?>" ;
            if (off_add_val == "1") {
                var userLng2 = 35.6899427;
                var userLat2 = 139.7712081;
            } else if ( off_add_val == "2") {
                var userLng2 = 35.7019801;
                var userLat2 = 139.7698301;
            } else if ( off_add_val == "3" ) {
                var userLng2 = 35.6681951;
                var userLat2 = 139.6717005;
            } else if ( off_add_val == "4" ) {
                var userLng2 = 35.6891606;
                var userLat2 = 139.7165814;
            } else if ( off_add_val == "5" ) {
                var userLng2 = 35.7335353;
                var userLat2 = 139.6923708;
            } else {
                die();
            }


            var latlng = new google.maps.LatLng(userLng1, userLat1);
            var mapOptions = {
                zoom: 11,
                maxZoom: 15,
                minZoom: 3,
                center: latlng,
                navigationControlOptions: {
                    style: google.maps.NavigationControlStyle.SMALL
                },
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
                };
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);

            var stations = [
            ['住所', userLng1,userLat1,'http://maps.google.com/mapfiles/ms/icons/red-dot.png'],
            ['受付場所 ', userLng2,userLat2,'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png']
            ];
        
            jQuery.each(stations, function()
            {
                m_latlng = new google.maps.LatLng(this[1], this[2]);
                marker = new google.maps.Marker({
                    animation: google.maps.Animation.DROP,
                    position: m_latlng,
                    map: map,
                    title: this[0],
                    icon: this[3]
                });
            });
        };
        // function attachMessage(marker,msg){
        //     //クリックさた際に情報ウィンドウを表示させる
        //     google.maps.event.addListener(marker,'click',function(){
        //     info = new google.maps.InfoWindow({content: msg});
        //     info.open(marker.getMap(), marker);
        //     });
        // }
        google.maps.event.addDomListener(window, 'load', initialize(latitude, longitude));
    </script>
    
   

</body>
</html>
