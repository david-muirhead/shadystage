<footer class="content-info">

<span class="vert"><a href="#top">SHADY NASTY</a></span>
<div id="mc_embed_signup" class="flex items-center text-sh80-green">

  <form action="https://online.us4.list-manage.com/subscribe/post?u=34d9da43d168e6d5e265613bf&amp;id=1e46bd8123" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <span class="pr-10"> Join the mailing list</span>
  
    <input type="text" value="" name="CITY" class="px-2 py-1 border-b border-sh80-offwhite text-sm font-mono bg-transparent  text-sh80-green focus:outline-none" placeholder="CITY">

    <input type="text" value="" name="FNAME" class="px-2 py-1 border-b border-sh80-offwhite text-sm font-mono bg-transparent  text-sh80-green focus:outline-none" placeholder="NAME">

    <input type="email" value="" name="EMAIL" class="px-2 py-1 border-b border-sh80-offwhite text-sm font-mono bg-transparent  text-sh80-green focus:outline-none" placeholder="EMAIL">


    <div id="mce-responses" class="clear">
      <div class="response" id="mce-error-response" style="display:none"></div>
      <div class="response" id="mce-success-response" style="display:none"></div>
    </div>

    <div style="position: absolute; left: -5000px;" aria-hidden="true">
      <input type="text" name="b_34d9da43d168e6d5e265613bf_1e46bd8123" tabindex="-1" value="">
    </div>

  </form>
  <footer class="footer-container">
	<div class="footer-grid">
		<section>
      <?php while( have_rows('emails_booking', 'options') ): the_row(); ?>
      <span style="padding-top:20px;">
        <h5>Booking</h5>
				<a href="<?php the_sub_field('email_adress'); ?>"><?php the_sub_field('name'); ?></a>
        </span>
      <?php endwhile; ?>
      <?php while( have_rows('emails_band', 'options') ): the_row(); ?>
      <span style="padding-top:20px;">
        <h5>Band</h5>
				<a href="<?php the_sub_field('email_adress'); ?>"><?php the_sub_field('name'); ?></a>
        </span>
      <?php endwhile; ?>
      <?php while( have_rows('other_contacts', 'options') ): the_row(); ?>
        <span style="padding-top:20px;">
        <h5><?php the_sub_field('label_for_contact'); ?></h5>
				<a href="<?php the_sub_field('email_adress'); ?>"><?php the_sub_field('email_title'); ?></a>
        </span>
      <?php endwhile; ?>
		</section>
		<?php dynamic_sidebar( 'footer-widgets' ); ?>
		<div id="logos">
			<!-- <span>
				<a href="http://inertiamusic.com/">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/IR.png" alt="Inertia Music" target="_blank">
				</a>
			</span>
			<span>
				<a href="https://royalmountainrecords.com/">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/RMR.png" alt="Royal M" target="_blank">
				</a>
			</span> -->
		</div>
	</div>
</footer>
</footer>
