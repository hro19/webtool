<?php
$path = '../../include/';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
include_once 'config.php';
$page_id = 'thanks';
$title = 'グルメマジック・モニターツアー';
$description = 'オホーツク紋別の「旨い」を巡る旅に参加しませんか？';
$keywords = '北海道,モニター旅行,グルメ';
?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<?php include_once 'meta.php'; ?>

<!-- form -->
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="../mfp.statics/mailformpro.css">
<link rel="stylesheet" href="../mfp.statics/form.css">
<!-- /form -->
</head>

<body>
<?php include_once 'analytics.php'; ?>

<div id="container">
	
	<?php include_once 'header.php'; ?>
	
	<section id="form" class="img_link_on">
	<div class="contents">
		<div class="thx_box">
			<h2 class="shop-table-heading">送信完了しました</h2>
			<p>お問い合わせありがとうございました。<br>
				ご入力いただきましたメールアドレスに、入力内容のご確認メールを送信しました。<br>
				<br>
				尚、しばらくたってもメールが着かない場合は、メールアドレスが間違っていたか、何らかの不具合により入力が完了しなかった恐れがございますので、大変お手数ですが、再度ご入力いただくかメールにて直接お問い合わせください。<br>
				<a href="mailto:okhotskmagic2016tour@nks.co.jp">お問い合わせアドレス</a></p>
		</div>
		<!-- / .thx_box --> 
	</div><!-- / .contents -->
	</section><!-- / #form .img_link_on -->
		
	<p class="top_back"><a href="<?php echo $url_http; ?>"><img src="../../images/top_back.png" alt="トップページに戻る"></a></p>
	
	<?php include_once 'footer.php'; ?>

<!-- / #container --></div>

</body>
</html>

