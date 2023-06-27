<div class="mt-36 rap w-full p-8 text-sh80-green z-10">
<?php
$member_group_terms = get_terms( 'tour' );
?>
<?php
foreach ( $member_group_terms as $member_group_term ) {
    $member_group_query = new WP_Query( array(
        'post_type' => 'tour_dates',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_type' => 'DATE',
        'meta_key' => 'date',
        'tax_query' => array(
            array(
                'taxonomy' => 'tour',
                'field' => 'slug',
                'terms' => array( $member_group_term->slug ),
                'operator' => 'IN'
            )
        )
    ) );
    ?>

      <?php
      echo '<h1 class="text-h1-m mb-8">';
      echo $member_group_term->name;
      echo '</h1>';
      if( $member_group_term->description ) {
          echo '<h2>';
          echo $member_group_term->description;
          echo '</h2>';
      } else {
      }
      ?>

      <?php
      if( get_field('tour_poster', 'category_'. $member_group_term->term_id .'')) {
        echo '<img src="';
        echo get_field('tour_poster', 'category_'. $member_group_term->term_id .'');
        echo '">';
      } else {
      }
      ?>

    <?php
    if ( $member_group_query->have_posts() ) : while ( $member_group_query->have_posts() ) : $member_group_query->the_post(); ?>
    <a class="text-sh80-green md:inline-block mr-8 mb-8" href="<?php the_field('link'); ?>" target="_blank">
      <p class="text-h3"><?php the_field('date'); ?></p>
      <p class="text-h1 inline-block"><?php the_field('city'); ?></p>
      <p class="text-h2 left"><?php the_field('venue_name'); ?></p>
    </a>
    <?php endwhile; endif; ?>

    <?php
    // Reset things, for good measure
    $member_group_query = null;
    wp_reset_postdata();
}
?>
</div>
