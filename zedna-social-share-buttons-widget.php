<?php
/**
 * Print social share buttons.
 *
 */

/* SOCIAL SHARE */
$zssi_facebook = get_option('zedna_social_share_buttons_show_facebook');
$zssi_twitter = get_option('zedna_social_share_buttons_show_twitter');
$zssi_googleplus = get_option('zedna_social_share_buttons_show_googleplus');
$zssi_linkedin = get_option('zedna_social_share_buttons_show_linkedin');
$zssi_rss = get_option('zedna_social_share_buttons_show_rss');

/* position */
$zssi_position = get_option('zedna_social_share_buttons_position');
$zssi_width = get_option('zedna_social_share_buttons_width');

if($zssi_position == "left"){
    $share_align = "left: 0; top: 50%;transform: translate(0, -50%);";
    $share_float = "float: none;";
    $share_pos = "position: fixed; z-index: 9999;";
}else if($zssi_position == "right"){
    $share_align = "right: 0; top: 50%;transform: translate(0, -50%);";
    $share_float = "float: none;";
    $share_pos = "position: fixed; z-index: 9999;";
}else if($zssi_position == "top"){
    $share_align = "top:0; left: 50%;transform: translate(-50%, 0);";
    $share_float = "float: left;";
    $share_pos = "position: fixed; z-index: 9999;";
}else if($zssi_position == "bottom"){
    $share_align = "bottom:0; left: 50%;transform: translate(-50%, 0);";
    $share_float = "float: left;";
    $share_pos = "position: fixed; z-index: 9999;";
}
 ?>
<style>
.zedna-floating-social-share{
    <?php echo $share_pos;?>
    <?php echo $share_align;?>
}
/* Icon scale effect */
.zedna-floating-share-icon a img{
    transition: all .2s ease-in-out;
}

.zedna-floating-share-icon a img:hover{
    transform: scale(1.1);
}

.zedna-floating-share-icon{
    <?php echo $share_float;?>
}
</style>

 <!-- LET´S SHARE-->
<div id="zedna-floating-social-share-icons" class="zedna-floating-social-share">

    <div class="zedna-floating-share-icon">
        <?php if ($zssi_facebook == "yes"){ ?>
            <a onclick="window.open(this.href,'','width=320,height=320');return false;" href="http://www.facebook.com/share.php?u=<?php print the_permalink();?>&title=<?php print get_the_title();?>"><img src="<?php echo plugins_url('/social-icons/'.$zssi_width.'-facebook.png', __FILE__); ?>"></a>
        <?php } ?>
    </div>

    <div class="zedna-floating-share-icon">
        <?php if ($zssi_twitter == "yes"){ ?>
            <a onclick="window.open(this.href,'','width=320,height=320');return false;" href="http://twitter.com/intent/tweet?status=<?php print get_the_title();?>+<?php echo the_permalink();?>"><img src="<?php echo plugins_url('/social-icons/'.$zssi_width.'-twitter.png', __FILE__); ?>"</a>
        <?php } ?>
        </div>

    <div class="zedna-floating-share-icon">
        <?php if ($zssi_googleplus == "yes"){ ?>
            <a onclick="window.open(this.href,'','width=320,height=320');return false;" href="https://plus.google.com/share?url=<?php echo the_permalink();?>"><img src="<?php echo plugins_url('/social-icons/'.$zssi_width.'-googleplus.png', __FILE__); ?>"></a>
        <?php } ?>
    </div>

    <div class="zedna-floating-share-icon">
        <?php if ($zssi_linkedin == "yes"){ ?>
            <a onclick="window.open(this.href,'','width=320,height=320');return false;" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo the_permalink();?>&title=<?php print get_the_title();?>&source=<?php echo the_permalink();?>"><img src="<?php echo plugins_url('/social-icons/'.$zssi_width.'-linkedin.png', __FILE__); ?>"></a>
        <?php } ?>
    </div>

    <div class="zedna-floating-share-icon">
        <?php if ($zssi_rss == "yes"){ ?>
            <a onclick="window.open(this.href,'','width=320,height=320');return false;" href="<?php bloginfo('rss2_url'); ?>"><img src="<?php echo plugins_url('/social-icons/'.$zssi_width.'-rss.png', __FILE__); ?>"></a>
        <?php } ?>
    </div>

</div>
<!-- #LET´S SHARE-->
