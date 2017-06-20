<?php
    session_start();
    if ($_SESSION['login'] !== 1){
        echo "<script language='javascript' type='text/javascript'> location.href='login.php' </script>";
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

    <title> TSC - Event Form </title>

    <!-- icon -->
    <link rel="icon" type="image/png" href="">

    <!-- main css -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/customize.css" rel="stylesheet">

    <!-- plugins -->
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="css/plugins/icheck/custom.css" rel="stylesheet">
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
                <h2 style="margin-top:30px;"> 予約内容 </h2>
            </div>
        </div>
    </nav>
    
    <!-- form for the customers -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form id="form" class="form-horizontal" action="confirm.php" method="POST" style="max-width: 750px; border: 1px solid #000; padding: 20px; margin: 0 auto">
                        <h4>予約内容</h4>
                        <div class="form-group"><label class="col-xs-12 control-label">名前</label>
                            <div class="col-sm-12"><input placeholder="名前" type="text" name="name" class="form-control" required></div>
                        </div>
                        <div class="form-group"><label class="col-xs-12 control-label">Eメール</label>
                            <div class="col-sm-12"><input placeholder="Eメール" type="text" name="email" class="form-control" required></div>
                        </div>
                        <div class="form-group"><label class="col-xs-12 control-label">電話番号</label>
                            <div class="col-sm-12"><input placeholder="電話番号" type="text" name="phone" class="form-control" required></div>
                        </div>
                        <div class="form-group" id="data_1"><label class="col-xs-12 control-label">利用日</label>
                            <div class="input-group date" style="padding: 0 15px;">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="date" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-xs-12 control-label">値段</label>
                            <div class="col-sm-12"><input placeholder="お値段" type="number" name="amount" class="form-control" required></div>
                        </div>
                        <div class="form-group"><label class="col-xs-12 control-label">人数</label>
                            <div class="col-sm-12"><input placeholder="人数" type="number" min="10" name="people" class="form-control" required></div>
                        </div>
                        <div class="form-group"><label class="col-xs-12 control-label">利用目的</label>
                            <div class="col-sm-12"><input placeholder="ご利用目的" type="text" name="purpose" class="form-control" required></div>
                        </div>
                        <div class="form-group"><label class="col-xs-12 control-label">利用スペース</label>
                             <div style="margin-bottom:10px" class="checkbox i-checks col-xs-6">
                                <label><input type="radio" name="check_1" value="東京シェアカフェ(日本橋)"> <i></i> 東京シェアカフェ（日本橋）</label>
                            </div>
                            <div style="margin-bottom:10px" class="checkbox i-checks col-xs-6">
                                <label><input type="radio" name="check_1" value="秋葉原貸切Cafe and Bar"> <i></i> 秋葉原貸切Cafe and Bar </label>
                            </div>
                            <div style="margin-bottom:10px" class="checkbox i-checks col-xs-6">
                                <label><input type="radio" name="check_1" value="屋上スペース(神田・秋葉原)"> <i></i>屋上スペース(神田・秋葉原) </label>
                            </div>
                            <div style="margin-bottom:10px" class="checkbox i-checks col-xs-6">
                                <label><input type="radio" name="check_1" value="代々木上原スペース(代々木・渋谷)" > <i></i>代々木上原スペース(代々木・渋谷) </label>
                            </div>
                            <div style="margin-bottom:10px" class="checkbox i-checks col-xs-6">
                                <label><input type="radio" name="check_1" value="古民家スペース(神田・秋葉原)"> <i></i>古民家スペース(神田・秋葉原) </label>
                            </div>
                            <div style="margin-bottom:10px" class="checkbox i-checks col-xs-6">
                                <label><input type="radio" name="check_1" value="新宿ハウス(新宿・四ツ谷)"> <i></i>新宿ハウス(新宿・四ツ谷) </label>
                            </div>
                            <div style="margin-bottom:10px" class="checkbox i-checks col-xs-6">
                                <label><input type="radio" name="check_1" value="撮影スタジオⅠ(神田・秋葉原)"> <i></i>撮影スタジオⅠ(神田・秋葉原)  </label>
                            </div>
                            <div style="margin-bottom:10px" class="checkbox i-checks col-xs-6">
                                <label><input type="radio" name="check_1" value="撮影スタジオⅡ(神田・秋葉原)"> <i></i>撮影スタジオⅡ(神田・秋葉原) </label>
                            </div>
                            <div style="margin-bottom:10px" class="checkbox i-checks col-xs-6">
                                <label><input type="radio" name="check_1" value="撮影スタジオⅢ(神田・秋葉原)"> <i></i>撮影スタジオⅢ(神田・秋葉原) </label>
                            </div>
                            <div style="margin-bottom:10px" class="checkbox i-checks col-xs-6">
                                <label><input type="radio" name="check_1" value="日本橋撮影スタジオ"> <i></i>日本橋撮影スタジオ  </label>
                            </div>
                            <div style="margin-bottom:10px" class="checkbox i-checks col-xs-6">
                                <label><input type="radio" name="check_1" value="池袋古民家スペース" required> <i></i>池袋古民家スペース </label>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-xs-12 control-label">オプションプラン（秋葉原エリア限定）</label>
                            <div class="col-xs-12">
                                <select name="plan" class="form-control chosen-select" style="width:100%;">
                                    <option value="-">下記からお選びください</option>
                                    <option value="クラフトビール…15,000円/30本">クラフトビール…15,000円/30本</option>
                                    <option value="【ケータリングパーティーセットプラン】コース料理７品…3000円/1人">[ケータリングパーティーセットプラン] コース料理７品…3000円/1人</option>
                                    <option value="ビールサーバー1樽…15,000円/1樽">ビールサーバー1樽…15,000円/1樽</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-xs-12 control-label">利用時間</label>
                            <div class="col-sm-12"><input placeholder="ご利用時間" type="text" name="time_slot" class="form-control" required></div>
                        </div>
                        <div class="form-group"><label class="col-xs-12 control-label">クーポンコード</label>
                            <div class="col-sm-12"><input placeholder="クーポンコード" type="text" name="coupon" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-xs-12 control-label">備考欄</label>
                            <div class="col-sm-12"><input placeholder="備考欄" type="text" name="comment" class="form-control"></div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-lg btn-success" name="submit" value="予約内容確認" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- main JS-->
    <script src='js/jquery.js'></script>
    <script src='js/bootstrap.js'></script>

    <!-- Plugin JS-->
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/plugins/chosen/chosen.jquery.js"></script>
    <script src="js/plugins/icheck/icheck.min.js"></script>
    <script src="js/plugins/validate/jquery.validate.min.js"></script>

   <script>
    $.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" }) //for all select having class .chosen-select
    $(document).ready(function(){
            $("#form").validate({
                rules: {
                    time_slot:{
                        required: true
                    },
                    check_1:{
                        required: true
                    }
                }
            });
        });
       $(document).ready(function(){
        $('#data_1 .input-group.date').datepicker({
                minDate: 0,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
        $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
       });
       var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"100%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
   </script>

</body>
</html>


