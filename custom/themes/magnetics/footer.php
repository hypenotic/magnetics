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

    <!-- Use Pagebuilder DEV project -->

    <script type="text/javascript">
        (function (d, t) {
        var pp = d.createElement(t), s = d.getElementsByTagName(t)[0];
        pp.src = '//app.pageproofer.com/embed/ee5ee5bc-4068-5403-9129-63d809318e80';
        pp.type = 'text/javascript';
        pp.async = true;
        s.parentNode.insertBefore(pp, s);
        })(document, 'script');
    </script>
						
</body>
</html>

<?php } ?>