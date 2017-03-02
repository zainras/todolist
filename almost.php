<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Begin - Professional</title>
    <link rel="icon" type="image/png" href="favicon/favicon.ico">
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- butuh koneksi internet
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        -->
    <!-- Theme CSS -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<section class="atas">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h1>Tes</h1>
                    <div id="getting-started"></div>
					<h3 class="hilang">hilang<a data-href="" class="fa fa-check" id="dell"></a></h3>
				</div>
			</div>
		</div>
	</section>
   <form action="insert.php" method="POST">
	<section class="tengah">
		<div class="container-fluid">
			<div class="row">
                <div class="container-fluid">
				    <div class="col-lg-12">
                        <div class="col-xs-6 col-xs-offset-3">
                            <div class="wrap-input">
                                <p class="judul-input text-center">my todo list</p>
        						<input type="text" name="addVal" id="addVal" maxlength="60">
        						<button class="btn btn-custom" id="tambah" type="button">ADD</button>
                            </div>
    						<div id="dinamis">
                                
                                   
<?php 
$isi =isi($conn);
$rombak = unserialize($isi);
$status = status($conn);
$rombak_status = unserialize($status);
foreach ($rombak as $key => $value) {
    $fa = '';
    if($rombak_status[$key] == 'active'){
        $fa = 'fa-check';
    }
    if($rombak_status[$key] == 'non-active'){
        $fa = 'fa-minus';
    }
    echo '<p class="candel">';
    	echo '<span class="fa '.$fa.' cek"></span>';
        echo '<input class="ubahdua" type="hidden" name="status[]" value="'.$rombak_status[$key].'">';
    	echo $rombak[$key].'<input class="ubah" type="hidden" name="isi[]" value="'.$value.'">';
    	echo '<span class="fa fa-times tutup" id="dell"></span>';
    echo '</p>';
}
?>
                                    
                               
                            </div>

                        <input type="submit" name="save" id="save">
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
    </form>
	<section class="bawah">

	</section>




    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>

    <!-- kinetict -->
    <script type="text/javascript" src="js/kinetic.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- online**
    Plugin JavaScript 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ 
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>
    
    **online -->


<script type="text/javascript">
  $("#getting-started").countdown("2018/01/01", function(event) {
    $(this).text(
      event.strftime('%D days %H:%M:%S')
    );
  });
</script>

<script>
	$(document).ready(function(){
	    $("#tambah").click(function(e) {
	    e.preventDefault();
        // jika fa fa-time beriakan value active => untuk status cek di to do list app
	    var one  = $('#addVal').val();
        var two  = '<input class="ubah" type="hidden" name="isi[]" value="'+one+'">';
        var tiga = '<input class="ubahdua" type="hidden" name="status[]" value="non-active">';
        if (one == ''){
            alert('input tidak boleh kosong');
            $("#tambah").die();
         }  
	   	$("#dinamis").append('<p class="candel"><span class="fa fa-minus cek"></span>' + tiga + one + two + '<span class="fa fa-times tutup" id="dell"></span></p>');
        //clear inout
        $('input[type="text"], textarea').val('');
	  });


	});
    
$(document).on('click', '#dell', function () {
    $(this).parentsUntil('#dinamis').slideUp("slow", function() { $(this).remove(); } );
  });
$(document).on('click', '.cek', function () {
    $(this).toggleClass("fa-minus fa-check ijo");
    $(this).next().attr('value','active');
 /* foo */ });
$(document).on('click', '.fa-check', function () {
    $(this).next().attr('value','non-active');
 /* foo */ });
$('#myform').submit(function(){
    return false;
});






$('#insert').click(function(){
    $.post(     
        $('#myform').attr('action'),
        $('#myform :input').serializeArray(),
        function(result){
           
        }
    );
});

// disable enter
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});


</script>
<style>

/* open-sans-regular - latin */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: url('../fonts/open-sans-v13-latin-regular.eot'); /* IE9 Compat Modes */
  src: local('Open Sans'), local('OpenSans'),
       url('../fonts/open-sans-v13-latin-regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
       url('../fonts/open-sans-v13-latin-regular.woff2') format('woff2'), /* Super Modern Browsers */
       url('../fonts/open-sans-v13-latin-regular.woff') format('woff'), /* Modern Browsers */
       url('../fonts/open-sans-v13-latin-regular.ttf') format('truetype'), /* Safari, Android, iOS */
       url('../fonts/open-sans-v13-latin-regular.svg#OpenSans') format('svg'); /* Legacy iOS */
}
/* open-sans-800 - latin */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 800;
  src: url('../fonts/open-sans-v13-latin-800.eot'); /* IE9 Compat Modes */
  src: local('Open Sans Extrabold'), local('OpenSans-Extrabold'),
       url('../fonts/open-sans-v13-latin-800.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
       url('../fonts/open-sans-v13-latin-800.woff2') format('woff2'), /* Super Modern Browsers */
       url('../fonts/open-sans-v13-latin-800.woff') format('woff'), /* Modern Browsers */
       url('../fonts/open-sans-v13-latin-800.ttf') format('truetype'), /* Safari, Android, iOS */
       url('../fonts/open-sans-v13-latin-800.svg#OpenSans') format('svg'); /* Legacy iOS */
}

    *{
        font-family: 'Open Sans';
    }

	.hilang{
		margin-left: 30px;
	}

    .wrap-input{
        padding: 30px 10px 5px 10px;
        background-color: #1dbfbd;
    }

    .judul-input {
        font-size: 28px;
        text-transform: uppercase;
        letter-spacing: 5px;
        font-weight: bolder;
    }

    #addVal{
        background-color: #fff;
        border: 1px solid #333;
        padding: 6px 0 8px 5px;
        width: 70%;
        margin: 0;
        border: none;
    }

    .btn-custom{
        margin-left: -4px;
        width: 30%;
        border-radius: 0;
    }

    .candel {
        font-weight: lighter;
        color: #fff;
        background-color: #333;
        font-size: 14px;
    }
    .red{
        color : red;
    }

    .tutup{
        padding: 13px;
        width: 10%;
    }

    #dell {
        float: right;
        display: block;
        cursor: pointer; 
    }

    .cek {
        margin-bottom: 0px;
        padding: 13px;
        background-color: #ccc;
        width: 10%;
        padding-right: 30px;
        margin-right: 10px; 
    }

    .cek.fa-check{
        background-color: green;
    }
</style>

</body>

</html>
