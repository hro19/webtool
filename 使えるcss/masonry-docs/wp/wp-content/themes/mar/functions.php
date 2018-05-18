<?php
/* functions.php *
	テーマにさまざまな付加機能を設定するためのファイル。
*/
 
//アイキャッチ画像に対応
add_theme_support( 'post-thumbnails' );
add_image_size( 'x1', 226, 120, true );//.item 
add_image_size( 'x2', 464, 312, true );//.itemx2
add_image_size( 'x3', 464, 120, true );//.itemx3
add_image_size( 'x4', 226, 312, true );//.itemx4
add_image_size( 'x5', 702, 504, true );//.itemx5



//URLの取得
function my_url(){
	$str = str_replace("/wp/", "/", $_SERVER["REQUEST_URI"]); 
	$my_url['url'] = $str;
	$my_url['url'] = substr_replace($my_url['url'], "", 0,1);//一文字目の/を削除
	$my_url['path'] = explode("/", $my_url['url']);
	$my_url['url'] = "/".$my_url['url'];//一応/をいれておく。
	return $my_url;
}

//NEWマーク
function add_new($date,$days){
    $today = date_i18n('U');
    $elapsed = date('U',($today - $date)) / 86400;
    if( $days > $elapsed ){
        echo '<span>New!</span>';
    }
}


//タクソノミーのNAMEとスラグの抽出
function label_name($str,$id=0){
	$taxonomy_label = get_the_terms($id, $str);
	//print_r($taxonomy_label);
	$label = array();
	if($taxonomy_label){
		foreach( $taxonomy_label as $key ){
			$label['name'][] = $key->name ;
			$label['slug'][] = $key->slug ;
		}
	}
	
	return $label;
}

/**
 * 自動整形停止
 */
add_action('init', function() {
    remove_filter('the_title', 'wptexturize');
    remove_filter('the_content', 'wptexturize');
    remove_filter('the_excerpt', 'wptexturize');
    remove_filter('the_title', 'wpautop');
    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');
    remove_filter('the_editor_content', 'wp_richedit_pre');
});
 
add_filter('tiny_mce_before_init', function($init) {
    $init['wpautop'] = false;
    $init['apply_source_formatting'] = ture;
    return $init;
});



/**
 * 絵文字スクリプト削除
 */
function disable_emoji() {
     remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
     remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
     remove_action( 'wp_print_styles', 'print_emoji_styles' );
     remove_action( 'admin_print_styles', 'print_emoji_styles' );    
     remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
     remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );    
     remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emoji' );

/**
 * the_contentの文字数制限
 * $length 制限文字数
 * $str 省略も文字
 */
function my_excerpt( $length, $str ) {

}


/**
 * page-***.php の階層を持たせるフィルター
 * 例：page-xxx-yyy.php  （/xxx/yyyy/）
 */
function my_page_template ( $template ){
	global $post;
	$post_type = get_post_type_object($post->post_type);
	if ( $post_type->hierarchical ){
		$slug = get_page_uri($post->ID);
		$slug = str_replace( '/', '-', $slug );
		$buf_template = locate_template('page-' . $slug . '.php');
		$buf_page_template = get_page_template_slug();
		if ( !empty($buf_template) && empty($buf_page_template) ){
			$template = $buf_template;
		}
	}
	return $template;
}
add_filter( 'page_template', 'my_page_template' );


/*************************************
 Contact7
**************************************/
/*必要なページ以外は JS CSS を読み込まない*/
switch ($_SERVER['REQUEST_URI']) {
	case "/hoge/contact/": break;

    default:
    add_filter( 'wpcf7_load_js', '__return_false' );
	add_filter( 'wpcf7_load_css', '__return_false' );
}



//contact7　メール確認フォーム
//[email* your-email]　→　確認用 [email* your-email_confirm]
add_filter( 'wpcf7_validate_email', 'wpcf7_text_validation_filter_extend', 11, 2 );
add_filter( 'wpcf7_validate_email*', 'wpcf7_text_validation_filter_extend', 11, 2 );
function wpcf7_text_validation_filter_extend( $result, $tag ) {
	$type = $tag['type'];
	$name = $tag['name'];
	$_POST[$name] = trim( strtr( (string) $_POST[$name], "\n", " " ) );
	if ( 'email' == $type || 'email*' == $type ) {
		if (preg_match('/(.*)_confirm$/', $name, $matches)){
			$target_name = $matches[1];
			if ($_POST[$name] != $_POST[$target_name]) {
				$result['valid'] = false;
				$result['reason'][$name] = '確認用のメールアドレスが一致していません';
			}
		}
	}
return $result;
}




/*//////////////////////////////////////
■ACF画像の呼び出し v1.1
ACF_image('項目名','サイズ','種類');
種類：photo、url、alt、title、caption

■種類とサイズは省略可能。
サイズ　→　full
種類	→　imgタグが呼び出されます。

■CF画像の返り値は必ず「画像オブジェクト」にする。
*//////////////////////////////////////
function ACF_img($str,$size_name='full',$type='photo',$row=''){
	
	//空入力を有効に
	if($type ==''){$type = 'photo';}

	//rowを第2因数以降でも有効に
	if($size_name == 'row' || $type == 'row' ){
		$row = 'row';
		$type='photo';
		if($size_name == 'row'){
			$size_name='full';
		}
	}
	
	//rowの処理
	if($row != 'row'){
		$image = get_field($str);
	}else{
		//繰り返し（repeater）の画像呼び出し
		$image = get_sub_field($str);
	}
	
	//画像情報の読み込み
	if( !empty($image) ){ 
		// vars
		$url = $image['url'];
		$alt = $image['alt'];
		$title = $image['title'];
		$caption = $image['caption'];

		// Resize
		if(($size_name != '') && ($size_name != 'full')){		
			$thumb = $image['sizes'][$size_name];
		}else{
			$thumb = $url;
		}

		switch ($type){
			case 'photo': 	$photo = '<img src="'.$thumb.'" alt="'.$alt.'" />';break;
			case 'url': 	$photo = $thumb;break;
			case 'alt': 	$photo = $image['alt'];break;
			case 'title': 	$photo = $image['title'];break;
			case 'caption': $photo = $image['caption'];break;
		}

		echo $photo;
	
	}
	
}

//繰り返し（repeater）の画像呼び出し
function ACF_row_img($str,$size_name='',$type='photo'){

	$image = get_sub_field($str);
	
	if( !empty($image) ){ 
		// vars
		$url = $image['url'];
		$alt = $image['alt'];
		$title = $image['title'];
		$caption = $image['caption'];

		// Resize
		if($size_name){		
			$thumb = $image['sizes'][$size_name];
		}

		switch ($type){
			case 'photo': 	$photo = '<img src="'.$thumb.'" alt="'.$alt.'" />';break;
			case 'url': 	$photo = $thumb;break;
			case 'alt': 	$photo = $image['alt'];break;
			case 'title': 	$photo = $image['title'];break;
			case 'caption': $photo = $image['caption'];break;
		}

		echo $photo;
	
	}
	
}

/***************************
AFC リストとして表示する
****************************/
function ACF_list($str,$tag='li'){
	$str = get_field($str);
	$fieldData = explode("\n",$str);
	$i = 0;
	foreach ($fieldData as $value){
		if ( $value ){
			echo '<'.$tag.'>' . $value . '</'.$tag.'>';
		}
		$i++;
	}
}

/////////////////////////////////////////
// カスタム投稿タイプを作成する
/////////////////////////////////////////
//カスタムタクソノミーのリライトルール
/*
「http://mysite/wp/member/cat/gold/」にアクセスがあった場合、
「http://mysite/wp/?member_cat=gold」にリダイレクトする
add_rewrite_rule('member/cat/([^/]+)/?$', 'index.php?member_cat=$matches[1]', 'top');
*/



//社員紹介
add_action('init', 'add_member_post_type');
function add_member_post_type() {
    $params = array(
            'labels' => array(
                    'name' => '社員紹介',
                    'singular_name' => '社員紹介',
                    'add_new' => '新規追加',
                    'add_new_item' => '社員紹介を新規追加',
                    'edit_item' => '社員紹介を編集する',
                    'new_item' => '新規社員紹介',
                    'all_items' => '社員紹介一覧',
                    'view_item' => 'ページを確認',
                    'search_items' => '検索する',
                    'not_found' => '社員紹介が見つかりませんでした。',
                    'not_found_in_trash' => 'ゴミ箱内に社員紹介が見つかりませんでした。'
            ),
            'public' => true,
            'has_archive' => true,
			'menu_position' => 5,
            'supports' => array(
                    'title',
                    'editor',
                    'author',
                    'custom-fields',
                    'revisions',
            ),
            'taxonomies' => array('member_cat','member_tag')
    );
    register_post_type('member', $params);
	
	/* カスタムタクソノミーを定義 */
	register_taxonomy(
	    'member_cat',
	    'member',
	    array(
	    'label' => 'カテゴリー',
	    'hierarchical' => true,//カテゴリタイプ
	    'rewrite' => array('slug' => 'member/cat')
	    )
	);

	//カスタムタクソノミー、タグ
	register_taxonomy(
		'member_tag', 
		'member', 
		 array(
	    'label' => 'タグ',
	    'hierarchical' => true,//タグタイプ
	    'rewrite' => array('slug' => 'tag')
	    )
	);
}

/* 管理画面一覧にカテゴリを表示 */
function manage_member_columns($columns) {
	$columns['member_cat'] = "カテゴリー";
	return $columns;
}

function add_member_column($column_name, $post_id){
	if( $column_name == 'member_cat' ) {
		//カテゴリー名取得
		if( 'member_cat' == $column_name ) {
			$member_cat = get_the_term_list($post_id, 'member_cat', '', ', ', '' );
		}
		//該当カテゴリーがない場合「なし」を表示
		if ( isset($member_cat) && $member_cat ) {
				echo $member_cat;
			} else {
				echo __('None');
		}
	}
}
add_filter('manage_edit-member_columns', 'manage_member_columns');
add_action('manage_posts_custom_column',  'add_member_column', 10, 2);


?>