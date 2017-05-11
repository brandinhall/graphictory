<?php $path = get_template_directory_uri();
if(!isset($_REQUEST['error']))  $error_code = '404';
else  $error_code = $_REQUEST['error'];
?>
<?php ob_start(); ?>

<?php get_header(); ?>

    <!-- Start of page wrap -->
    <div class="page_wrap">

        <!-- Start of main content -->
        <div class="main_content">

            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('error_page')) : ?>
            <?php endif; ?>

        </div>
        <!-- End of main content -->

        <div class="clearfix"></div>

    </div>
    <!-- End of page wrap -->

    <?php get_footer(); ?>