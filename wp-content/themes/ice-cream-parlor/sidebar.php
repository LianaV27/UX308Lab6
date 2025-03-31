<?php
/**
 * The sidebar containing the main widget area
 * @package Ice Cream Parlor
 * @subpackage ice_cream_parlor
 */
?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'ice-cream-parlor' ); ?>">
    <?php if (!dynamic_sidebar('sidebar-1')) : ?>
        <section id="search" class="widget widget_search">
            <h3 class="widget-title"><?php esc_html_e('Search', 'ice-cream-parlor'); ?></h3>
            <?php get_search_form(); ?>
        </section>

        <section id="meta" class="widget widget_meta">
            <h3 class="widget-title"><?php esc_html_e('Meta', 'ice-cream-parlor'); ?></h3>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </section>

        <section id="archives" class="widget widget_archive">
            <h3 class="widget-title"><?php esc_html_e('Archives', 'ice-cream-parlor'); ?></h3>
            <ul>
                <?php wp_get_archives(); ?>
            </ul>
        </section>

        <section id="tag-cloud" class="widget widget_tag_cloud">
            <h3 class="widget-title"><?php esc_html_e('Tag Cloud', 'ice-cream-parlor'); ?></h3>
            <?php wp_tag_cloud(); ?>
        </section>
    <?php endif; ?>
</aside>