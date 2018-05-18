<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<link rel="stylesheet" href="/css/masonry-docs.css" media="screen">
<title>Masonry Sample 1</title>
<?php wp_head(); ?>
</head>

<body>
<div id="wrapper">
<div id="header">
  <h1>P-trust Sample</h1>
</div>
<div id="container">
<div class="grid_sizer"></div>
	<?php
	if( have_rows('トピックス') ):
		while ( have_rows('トピックス') ) : the_row();?>
		  <?php $size = get_sub_field('画像サイズ'); ?>
		  <div class="item <?php echo $size ?>"><a href="<?php the_sub_field('url'); ?>">		
		  		<?php
				$new = get_sub_field('new');
				 if( $new ){
					echo '<img class="new" src="/images/new.png" alt="new" >'; 
				 }?>  
		  		<?php
				$tag = get_sub_field('タグ');
				 if( $tag ){
					echo '<span class="tag">'.$tag.'</span>'; 
				 }?>  
				<?php ACF_img('画像',$size,'row'); ?>
				<h3><?php the_sub_field('記事タイトル'); ?></h3>
				<p><?php the_sub_field('記事テキスト'); ?></p>
		  </a></div>
		 <?php
		endwhile;
	else :
	endif;
	?>
</div><!-- / #container -->
<hr style="margin-bottom:40px;">

</div><!-- / #wrapper -->
<!-- end of #wrapper -->
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script> 
<script src="/js/masonry.pkgd.js"></script> 
<script src="/js/imagesloaded.pkgd.min.js"></script> 
<script>
jQuery(function($) {
    $(window).on('load resize', function() {
        var flag;
        var min_width = 625; // 微調整が必要
        function check() {
            if ($('html').width() < min_width) {
                if (flag) {
                    $('#container').masonry('destroy');
                    flag = 0;
                }
            } else {
                $('#container').masonry({
                    itemSelector: '.item',
                    columnWidth: '.grid_sizer', // 整列用基本カラム幅をCSSセレクタで指定
                    isFitWidth: true,
                });
                flag = 1;
            }
        }
        $(function() {
            check();
        });
        $(window).resize(function() {
            check();
        });
        $('#ww span').text($(window).width());
        $(window).resize(function() {
            $('#ww span').text($(window).width());
        });
    });
});
</script>
<?php wp_footer(); ?>
</body>
</html>
