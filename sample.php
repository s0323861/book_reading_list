<?php

if ($_GET['year']){
    $year = $_GET['year'];
} else {
    // 今年の西暦を取得
    $year = date("Y");
}

// 取得先のアドレス
$url = "https://script.google.com/macros/s/xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx/exec?year=" . $year;

$json = file_get_contents($url);

// 文字化け防止
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

// jsonを連想配列に入れる
$arr = json_decode($json, true);

$html = "";
$book_total = 0;

if ($arr === NULL) {

}else{

        $json_count = count($arr);

        for($i = 0; $i <= $json_count - 1; $i++){

            if($arr[$i]["Title"] != ""){
                $html .= "<tr>";
                $html .= "<th scope='row'>" . $arr[$i]["No"] . "</th>";
                $html .= "<td>" . $arr[$i]["Title"] . "</td>";
                $html .= "<td>" . $arr[$i]["Author"] . "</td>";
                $html .= "<tr>";
                $book_total = $book_total  + 1;
            }

        }

}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>読んだ本のリスト</title>
<link rel="shortcut icon" href="favicon.ico">

        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <body id="page-top">

        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">

                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">読書リスト</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0"><?php echo $year; ?>年に読んだ本を表示しています</p>

            </div>
        </header>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h5 class="page-section-heading text-center text-uppercase text-secondary "><?php echo $book_total  ; ?>冊読みました！</h5>

                <!-- Portfolio Grid Items-->
                <div class="row">

                    <div class="col-lg-12">
                        <table class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">タイトル</th>
                            <th scope="col">著者</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php echo $html; ?>

                            </tbody>
                        </table>

                        <div class="dropdown">
                          <button class="btn btn-xl btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-check"></i> 西暦を選択
                        </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="./?year=2021">2021年</a>
                                <a class="dropdown-item" href="./?year=2020">2020年</a>
                                <a class="dropdown-item" href="./?year=2019">2019年</a>
                                <a class="dropdown-item" href="./?year=2018">2018年</a>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>

        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">

              </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © Akira Mukai 2021</small></div>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    </body>
</html>
