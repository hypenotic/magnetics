<?php if(is_front_page()) { ?>

<?php wp_footer();?>
</body>
</html>
    
<?php } else { ?>

<section id="footer">
    <footer>
        <section>   
        <!-- Module: rmaformOverview -->
        <?php get_template_part( 'module', 'rmaformOverview' ); ?>

        </section>

        <section>
            <h3>Contact</h3>
                <h4 style="font-weight: 400;">Marine Magnetics Corp.</h4>
                <p>
                    135 SPY Court <br />
                    Markham, Ontario <br />
                    L3R 5H6  Canada<br />
                </p>
                <p><a href="mailto:info@marinemagnetics.com">info@marinemagnetics.com</a></p>
                <p style="margin-bottom: 0px">Tel. +1 (905) 479-9727</p>
                <p>Fax. +1 (905) 479-9484</p>
        </section>

        <div class="made-with-love">
            Made with <i class="fa fa-heart"></i> by <a href="https://hypenotic.com" target="_blank">Hypenotic
        </div>
    </footer>
</section>
<?php wp_footer();?>

<script>
    Userback = window.Userback || {};
    Userback.access_token = '9876|19384|3DzrkK1zYxu3vg5CZ25z5YrvNGSYG0sJ8O1lNERdn4pdNDhzW6';
    (function(id) {
        var s = document.createElement('script');
        s.async = 1;s.src = 'https://static.userback.io/widget/v1.js';
        var parent_node = document.head || document.body;parent_node.appendChild(s);
    })('userback-sdk');
</script>
						
</body>
</html>

<?php } ?>