<div class="linx">

<?php while( have_rows('links') ): the_row();

  // vars
  $link = get_sub_field('link');

    if( $link ):
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
    <?php endif; ?>

<?php endwhile; ?>

</div>
