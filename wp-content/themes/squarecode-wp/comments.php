<?php
 
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
 
if ( post_password_required() ) { ?>
<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'squarecode' ); ?></p>
<?php
return;
}
?>
 
<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>

<?php if ( get_post_type() == 'download' ) { ?>

<!-- Start of comment title -->
<div class="comment_title">
    <?php if (get_comments_number()==0) { ?>

    <?php } ?>

    <?php
    if (get_comments_number()==1) { ?>

    <?php comments_number('0', '1', '%' );?> <?php _e( 'Review', 'squarecode' ); ?>

    <?php } else { ?>

    <?php comments_number('0', '1', '%' );?> <?php _e( 'Reviews', 'squarecode' ); ?>

    <?php } ?>

</div><!-- End of comment title -->

<?php } else { ?>

<!-- Start of comment title -->
<div class="comment_title">
    <?php if (get_comments_number()==0) { ?>

    <?php } ?>

    <?php
    if (get_comments_number()==1) { ?>

    <?php comments_number('0', '1', '%' );?> <?php _e( 'Comment', 'squarecode' ); ?>

    <?php } else { ?>

    <?php comments_number('0', '1', '%' );?> <?php _e( 'Comments', 'squarecode' ); ?>

    <?php } ?>

</div><!-- End of comment title -->

<?php } ?>
 
<!-- Start of commentlist -->
<div class="commentlist">
    <?php wp_list_comments('type=comment&callback=cr3ativ_mytheme_comment'); ?>

</div><!-- End of commentlist -->

<!-- Start of pagination -->
<div id="pagination">

<!-- Start of pagination class -->
<div class="pagination">
<?php paginate_comments_links(); ?>

</div><!-- End of pagination class -->

</div><!-- End of pagination -->

<?php else : ?>
 
<?php if ('open' == $post->comment_status) : ?>
<!-- If comments are open, but there are no comments. -->
 
<?php else : // comments are closed ?>
<!-- If comments are closed. -->
 
<?php endif; ?>
 
<?php endif; // if you delete this the sky will fall on your head ?>