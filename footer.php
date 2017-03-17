
<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1 col-sm-6 col-xs-12">
                <div class="copyright">
                    <p><?php echo __('Copyright', 'momino');?> &copy; 2017 | <a href="">boma</a></p>
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12">
                <div class="center">
                    <ul class="follow">
                        <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><p><?php echo __('Follow', 'momino');?></p></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

</div>

<?php wp_footer();?>

<script type="text/javascript">

    var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
    var page = 2;
    jQuery(function($) {
        $('body').on('click', '.load-more', function() {
            var data = {
                'action': 'load_posts_by_ajax',
                'page': page,
                'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
            };

            $.post(ajaxurl, data, function(response) {
                $('.my-posts').append(response);
                page++;
            });
        });
    });
</script>

</body>

</html>