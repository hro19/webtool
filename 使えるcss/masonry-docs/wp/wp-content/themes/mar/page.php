<?php
/* page.php *
	固定ページの出力用テンプレート。サイドバー無しの1カラム。
	WordPressを普通のサイトとして使う場合に相当お世話になるテンプレート。
 */
?>
<?php get_header(); ?>

<!-- 投稿ここから -->
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>
<!-- /投稿ここまで -->

<?php get_footer(); ?>
<!-- /page.php -->
