<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>アンケート ｜ エルカミノ</title>
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="content-script-type" content="text/javascript">
<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<!-- common -->
<link rel="stylesheet" href="css/template.css">

<!--[if lt IE 9]>
<script src="https://www.okhotskmagic.jp/common/js/jquery-1.11.1.min.js"></script>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<!-- / common -->

<!-- form -->

<link rel="stylesheet" href="mfp.statics/mailformpro.css">
<link rel="stylesheet" href="mfp.statics/form.css">
<!-- /form -->
</head>

<body>


<div id="container">
<header id="header" role="banner">
	<div class="inner">
      <h2 class="img_link_on"><img src="http://elcamino.jp/mypage/img/logo.gif"></h2>
	</div><!-- / .inner -->
</header>
	<section id="form" class="img_link_on">
	<div class="contents">
		<div class="contact-intro">
		<h2>応募フォーム</h2>
		<p>以下の項目をご記入のうえ、ご応募ください。</p>
		<div id="form_area">
			<form id="mailformpro" action="mailformpro/mailformpro.cgi" method="POST">
				<div class="mfp_phase" summary="名前入力">
				<dl class="mailform"><!-- / .mfp_phase -->
					<dt class="mfp"><span class="must">必須</span>お名前</dt>
					<dd class="mfp">
						<input type="text" name="お名前" class="inputBox size_name" data-kana="フリガナ" required />
					</dd>
					<dt class="mfp"><span class="must">必須</span>フリガナ</dt>
					<dd class="mfp">
						<input type="text" name="フリガナ" class="inputBox size_name" data-charcheck="kana" required />
					</dd>
				</dl>
				</div><!-- / .mfp_phase -->
				<div class="mfp_phase" summary="住所入力">
				<dl class="mailform"><!-- / .mfp_phase -->
					<dt class="mfp"><span class="must">必須</span>性別</dt>
					<dd class="mfp"><input checked="checked" name="性別" type="radio" value="男" /> 男 <input name="性別" type="radio" value="女" required/> 女
					</dd>
					<dt class="mfp"><span class="must">必須</span>生年月日</dt>
					<dd class="mfp"><input type="date" data-type="date" name="生年月日" class="inputBox size_name" required/><br>※生年月日の書式はYYYY-MM-DD形式で入力してください。
					</dd>
					<dt class="mfp"><span class="must">必須</span>郵便番号</dt>
					<dd class="mfp"><input autocomplete="off" name="郵便番号" required  class="inputBox size_name" type="tel" data-address="都道府県,市区町村,市区町村" /> <br /> ※ハイフン無し（半角数字7桁）<br /> ※郵便番号か住所を入力すると郵便番号が検索できます
					</dd>
					<dt class="mfp"><span class="must">必須</span>ご住所</dt>
					<dd class="mfp">
					<ol>
						<li>都道府県<select name="都道府県" required="required"><option selected="selected" value="">【選択して下さい】</option><optgroup label="北海道・東北地方"><option value="北海道">北海道</option><option value="青森県">青森県</option><option value="岩手県">岩手県</option><option value="秋田県">秋田県</option><option value="宮城県">宮城県</option><option value="山形県">山形県</option><option value="福島県">福島県</option></optgroup><optgroup label="関東地方"><option value="栃木県">栃木県</option><option value="群馬県">群馬県</option><option value="茨城県">茨城県</option><option value="埼玉県">埼玉県</option><option value="東京都">東京都</option><option value="千葉県">千葉県</option><option value="神奈川県">神奈川県</option></optgroup><optgroup label="中部地方"><option value="山梨県">山梨県</option><option value="長野県">長野県</option><option value="新潟県">新潟県</option><option value="富山県">富山県</option><option value="石川県">石川県</option><option value="福井県">福井県</option><option value="静岡県">静岡県</option><option value="岐阜県">岐阜県</option><option value="愛知県">愛知県</option></optgroup><optgroup label="近畿地方"><option value="三重県">三重県</option><option value="滋賀県">滋賀県</option><option value="京都府">京都府</option><option value="大阪府">大阪府</option><option value="兵庫県">兵庫県</option><option value="奈良県">奈良県</option><option value="和歌山県">和歌山県</option></optgroup><optgroup label="四国地方"><option value="徳島県">徳島県</option><option value="香川県">香川県</option><option value="愛媛県">愛媛県</option><option value="高知県">高知県</option></optgroup><optgroup label="中国地方"><option value="鳥取県">鳥取県</option><option value="島根県">島根県</option><option value="岡山県">岡山県</option><option value="広島県">広島県</option><option value="山口県">山口県</option></optgroup><optgroup label="九州・沖縄地方"><option value="福岡県">福岡県</option><option value="佐賀県">佐賀県</option><option value="長崎県">長崎県</option><option value="大分県">大分県</option><option value="熊本県">熊本県</option><option value="宮崎県">宮崎県</option><option value="鹿児島県">鹿児島県</option><option value="沖縄県">沖縄県</option></optgroup></select></li>
						<li>市区町村 <input name="市区町村" required class="inputBox size_name" type="text" /></li>
						<li>丁目番地 <input name="丁目番地" class="inputBox size_name" type="text" required /></li>
					</ol>
					</dd>
				</dl>
				</div><!-- / .mfp_phase -->
				<div class="mfp_phase" summary="同伴者入力欄">
				<dl class="mailform"><!-- / .mfp_phase -->
					<dt class="mfp"><span class="must">必須</span>同伴者のお名前</dt>
					<dd class="mfp">
						<input type="text" name="同伴者のお名前" class="inputBox size_name" required />
					</dd>
					<dt class="mfp">同伴者との続柄</dt>
					<dd class="mfp">
						<input type="text" name="同伴者との続柄" class="inputBox size_name" />
					</dd>
				</dl><!-- / .mailform -->
				</div><!-- / .mfp_phase -->
				<div class="mfp_phase" summary="その他">
				<dl class="mailform"><!-- / .mfp_phase -->
					<dt class="mfp"><span class="must">必須</span>連絡先電話番号&nbsp;第1希望</dt>
					<dd class="mfp">
						<input checked="checked" name="連絡先1" type="radio" value="自宅" /> 自宅 <input name="連絡先1" type="radio" value="携帯" required/> 携帯 <input name="連絡先1" type="radio" value="勤務先" required/> 勤務先 <input name="連絡先1" type="radio" value="その他" required/> その他<br>
						<input type="tel" data-type="tel" name="tel1" class="inputBox size_name"  required />
					</dd>
					<dt class="mfp"><span class="must">必須</span>連絡先電話番号&nbsp;第2希望</dt>
					<dd class="mfp">
						<input checked="checked" name="連絡先2" type="radio" value="自宅" /> 自宅 <input name="連絡先2" type="radio" value="携帯" required/> 携帯 <input name="連絡先2" type="radio" value="勤務先" required/> 勤務先 <input name="連絡先2" type="radio" value="その他" required/> その他<br>
						<input type="tel" data-type="tel" name="tel2" class="inputBox size_name"  required />
					</dd>
					<dt class="mfp"><span class="must">必須</span>メールアドレス</dt>
					<dd class="mfp">
						<input type="email" data-type="email" name="email" class="inputBox size_name"  required />
					</dd>
					<dt class="mfp"><span class="must">必須</span>確認のためもう一度</dt>
					<dd class="mfp">
						<input type="email" data-type="email" name="confirm_email" data-post-disable="1" class="inputBox size_name" required />
					</dd>					

					<dt class="mfp"><span class="must">必須</span>ご出発希望日&nbsp;<small>※抽選及び通知の日程の関係上、出発日を調整させていただく場合があります。</small>
					</dt>
					<dd class="mfp">
						<select name="ご出発希望日" required>
							<option value="">選択をしてください</option>
							<option value="2016年11月15日（火）">2016年11月15日（火）</option>
							<option value="2016年11月16日（水）">2016年11月16日（水）</option>
							<option value="2016年11月17日（木）">2016年11月17日（木）</option>
							<option value="2016年11月18日（金）">2016年11月18日（金）</option>
							<option value="2016年11月19日（土）">2016年11月19日（土）</option>
							<option value="2016年11月20日（日）">2016年11月20日（日）</option>
							<option value="2016年11月21日（月）">2016年11月21日（月）</option>
							<option value="2016年11月22日（火）">2016年11月22日（火）</option>
							<option value="2016年11月23日（水）">2016年11月23日（水）</option>
							<option value="2016年11月24日（木）">2016年11月24日（木）</option>
							<option value="2016年11月25日（金）">2016年11月25日（金）</option>
							<option value="2016年11月26日（土）">2016年11月26日（土）</option>
							<option value="2016年11月27日（日）">2016年11月27日（日）</option>
							<option value="2016年11月28日（月）">2016年11月28日（月）</option>
							<option value="2016年11月29日（火）">2016年11月29日（火）</option>
							<option value="2016年11月30日（水）">2016年11月30日（水）</option>
							<option value="2016年12月01日（木）">2016年12月01日（木）</option>
							<option value="2016年12月02日（金）">2016年12月02日（金）</option>
							<option value="2016年12月03日（土）">2016年12月03日（土）</option>
							<option value="2016年12月04日（日）">2016年12月04日（日）</option>
							<option value="2016年12月05日（月）">2016年12月05日（月）</option>
							<option value="2016年12月06日（火）">2016年12月06日（火）</option>
							<option value="2016年12月07日（水）">2016年12月07日（水）</option>
							<option value="2016年12月08日（木）">2016年12月08日（木）</option>
							<option value="2016年12月09日（金）">2016年12月09日（金）</option>
							<option value="2016年12月10日（土）">2016年12月10日（土）</option>
							<option value="2016年12月11日（日）">2016年12月11日（日）</option>
							<option value="2016年12月12日（月）">2016年12月12日（月）</option>
							<option value="2016年12月13日（火）">2016年12月13日（火）</option>
							<option value="2016年12月14日（水）">2016年12月14日（水）</option>
							<option value="2016年12月15日（木）">2016年12月15日（木）</option>
							<option value="2016年12月16日（金）">2016年12月16日（金）</option>
							<option value="2016年12月17日（土）">2016年12月17日（土）</option>
							<option value="2016年12月18日（日）">2016年12月18日（日）</option>
							<option value="2016年12月19日（月）">2016年12月19日（月）</option>
							<option value="2016年12月20日（火）">2016年12月20日（火）</option>
							<option value="2016年12月21日（水）">2016年12月21日（水）</option>
						</select>
					</dd>					
					<dt class="mfp"><span class="must">必須</span>利用しているブログ、Twitter、Facebook 等のURL</dt>
					<dd class="mfp">
						<input type="url" name="利用しているブログURL" class="inputBox size_name" required />
					</dd>					
					<dt class="mfp">当モニターツアーに当選したら、どんな旅がしたいか、自由にご記入ください。</dt>
					<dd class="mfp">
						<textarea name="自由内容" rows="10" class="inputBox"></textarea>
					</dd>
				</dl>
				<div class="mfp_buttons mb_m">
					<input type="submit" value="入力内容を確認する" id="submit_bt" />
				</div><!-- / .mfp_buttons mb_m -->
				</div><!-- / .mfp_phase -->
			</form>
			<!-- / #mailformpro --> 
			<script type="text/javascript" id="mfpjs" src="mailformpro/mailformpro.cgi" charset="UTF-8"></script> 
		</div>
		<!-- / #form_area -->
		</div><!-- / .contact-intro -->
		</div><!-- / .contents -->
	</section><!-- / #form .img_link_on -->
		
	<footer id="footer">
		<p class="copyright"><span>copyright&copy;</span>elcamino</p>
	</footer>

<!-- / #container --></div>

</body>
</html>
