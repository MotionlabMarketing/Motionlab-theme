</div>

<?php // TODO: REBUILD FOOTER LAYOUT // ?>

<?php if (get_field('footer_enable_cta', 'option')): ?>
    <section class="cta-basic cta-footer || clearfix || bg-brand-primary white">

        <div class="col-12 || text-center">

            <div class="wysiwyg || md-mx6 md-px6 white">

                <?= get_field('footer_cta_content', 'option') ?>

            </div>

        </div>

    </section>
<?php endif; ?>

<footer class="relative clearfix">

    <?php include_once(TEMPLATE_DIR . '/_footers.php'); ?>

</footer>

<?= get_field('footer_code', 'option'); ?>
<?php wp_footer(); ?>

</body>
</html>
