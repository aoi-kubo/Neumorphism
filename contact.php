<?php 
  session_start();
  $mode = 'input';
  $errormessage = array();
  if( isset($_POST['back']) && $_POST['back'] ){

  } else if( isset($_POST['confirm']) && $_POST['confirm'] ){
    $_SESSION['fullname'] = $_POST['fullname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['message'] = $_POST['message'];    
    $mode = 'confirm';
  } else if( isset($_POST['send']) && $_POST['send'] ){
    $message = "お問い合わせを受け付けました \r\n" . "名前" .  $_SESSION['fullname'] . "\r\n" . " email" .  $_SESSION['email'] . "\r\n" . "お問い合わせ内容 \r\n" . preg_replace( "/\r\n|\r|\n/", " \r\n", $_SESSION['message']);  
    mail( $_SESSION['email'], 'お問い合わせありがとうございます。', $message);
    mail( 'sakubo8440@gmail.com', 'お問い合わせありがとうございます。', $message);
    $_SESSION = array();
    $mode = 'send';
  } else {
    $_SESSION['fullname'] = "";
    $_SESSION['email'] = "";
    $_SESSION['message'] = "";
  }
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="aoi kubo" />
  <meta name="description" content="久保碧衣のポートフォリオ" />
  <meta name="viewport" content="width=device-width" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans&display=swap" rel="stylesheet">
  <title>King W Stone | neumorphism portfolio site</title>
  <link rel="shortcut icon" href="./img/favicon.ico"/>	
  <link rel="stylesheet" href="https://tomap.co/ZP_reset.css" />
  <link rel="stylesheet" href="./css/style.css" media="all" />
</head>
<body class="page">
  <header class="header flex">
    <p class="logo"><a href="index.html"><img src="./img/logo-main.gray.png" alt="ロゴの写真"></a></p>
    <nav class="header-nav">
      <ul class="flex">
        <li class="content"><a href="index.html">top</a></li>
        <li class="content"><a href="about.html">about</a></li>
        <li class="content"><a href="service.html">service</a></li>
        <li class="content"><a href="portfolio.html">portfolio</a></li>
        <li class="content"><a href="contact.html">contact</a></li>
      </ul>
    </nav>
    <div id="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </header>
  <div class="contact">
    <h1 class="title">CONTACT</h1>
    
    <?php if( $mode == 'input' ){ ?>
      <form action="./contact.php" method="post">
        <table class="contact-form">
          <tr>
            <th>名前：</th>
            <td><input name="fullname" type="text" value="<?php echo $_SESSION['fullname'] ?>" size="30" ></td>
          </tr>
          <tr>
            <th>Eメール：</th>
            <td><input name="email" type="text" value="<?php echo $_SESSION['email'] ?>" size="30"></td>
          </tr>
          <tr>
            <th>お問い合わせ内容：</th>
            <td><textarea name="message" type="text" cols="40" rows="10"><?php echo $_SESSION['message'] ?></textarea></td>
          </tr>
        </table>
        <input type="submit" name="confirm" class="content submit-btn" value="確認">
      </form>
      <?php } else if( $mode == 'confirm' ) { ?>
        <form action="./contact.php" method="post" class="check">
          名前： <?php echo $_SESSION ['fullname'] ?><br>
          Eメール： <?php echo $_SESSION['email'] ?><br>
          お問い合わせ内容：<br>
          <?php echo nl2br($_SESSION['message']) ?><br>
          <div class="flex check-box">
            <input type="submit" name="back" class="check-btn content" value="戻る" />
            <input type="submit" name="send" class="check-btn content" value="送信" />
          </div> 
        </form>
        
    <?php } else {?>

      <p class="complete">送信しました。お問い合わせありがとうございます。
      </p>

    <?php } ?>
  </div>

      <footer class="footer"><small>&copy; 2021 King W Stone</small></footer>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="./js/main.js"></script>
</body>
</html>