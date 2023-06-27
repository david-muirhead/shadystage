<div class="tunes">
  <?php

  // Load value.
  $iframe = get_field('song');

  // Use preg_match to find iframe src.
  preg_match('/src="(.+?)"/', $iframe, $matches);
  $src = $matches[1];

  // Add extra parameters to src and replcae HTML.
  $params = array(
      'controls'  => 0,
      'hd'        => 1,
      'autohide'  => 1
  );
  $new_src = add_query_arg($params, $src);
  $iframe = str_replace($src, $new_src, $iframe);

  // Add extra attributes to iframe HTML.
  $attributes = 'frameborder="0"';
  $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

  // Display customized HTML.
  echo $iframe;
  ?>
</div>
