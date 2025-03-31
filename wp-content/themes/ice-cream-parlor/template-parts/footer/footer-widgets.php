<?php
/**
 * Displays footer widgets if assigned
 *
 * @package Ice Cream Parlor
 * @subpackage ice_cream_parlor
 */

?>
<?php

// Determine the number of columns dynamically for the footer (you can replace this with your logic).
$ice_cream_parlor_number_of_footer_columns = get_theme_mod('ice_cream_parlor_footer_columns', 4); // Change this value as needed.

// Calculate the Bootstrap class for large screens (col-lg-X) for footer.
$ice_cream_parlor_col_lg_footer_class = 'col-lg-' . (12 / $ice_cream_parlor_number_of_footer_columns);

// Calculate the Bootstrap class for medium screens (col-md-X) for footer.
$ice_cream_parlor_col_md_footer_class = 'col-md-' . (12 / $ice_cream_parlor_number_of_footer_columns);
?>
<div class="container">
    <aside class="widget-area row" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'ice-cream-parlor' ); ?>">
        <div class="<?php echo esc_attr($ice_cream_parlor_col_lg_footer_class); ?> <?php echo esc_attr($ice_cream_parlor_col_md_footer_class); ?>">
            <?php dynamic_sidebar('footer-1'); ?>
        </div>
        <?php
        // Footer boxes 2 and onwards.
        for ($ice_cream_parlor_i = 2; $ice_cream_parlor_i <= $ice_cream_parlor_number_of_footer_columns; $ice_cream_parlor_i++) :
            if ($ice_cream_parlor_i <= $ice_cream_parlor_number_of_footer_columns) :
                ?>
               <div class="col-12 <?php echo esc_attr($ice_cream_parlor_col_lg_footer_class); ?> <?php echo esc_attr($ice_cream_parlor_col_md_footer_class); ?>">
                    <?php dynamic_sidebar('footer-' . $ice_cream_parlor_i); ?>
                </div><!-- .footer-one-box -->
                <?php
            endif;
        endfor;
        ?>
    </aside>
</div>