<footer class="content-info py-30 bg-sh80-cula block border-4 border-double border-black">
  {{-- Header Text --}}
  <div class="stretch pt-20" data-scroll>
    <h1>SHADY</h1>
    <h1>NASTY</h1>
  </div>

  {{-- Navigation Link --}}
  <span class="vert">
    <a href="#app">SHADY NASTY</a>
  </span>

  {{-- Mailing List Signup --}}
  <div id="mc_embed_shell">
      <link href="//cdn-images.mailchimp.com/embedcode/classic-061523.css" rel="stylesheet" type="text/css">
  <style type="text/css">
    #mc_embed_signup {
      background: transparent !important;
      clear: left;
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
      padding: 2rem;
      color: black;
      position: relative;
    }
    #mc_embed_signup h2 {
      font-size: 2rem;
      text-align: center;
      margin-bottom: 1.5rem;
    }
    #mc_embed_signup .indicates-required {
      text-align: right;
      margin-bottom: 1rem;
    }
    #mc_embed_signup .mc-field-group {
      padding-bottom: 1.5rem;
    }
    #mc_embed_signup .mc-field-group label {
      font-weight: bold;
      margin-bottom: 0.5rem;
    }
    #mc_embed_signup .mc-field-group input {
      background-color: transparent;
      border: 2px solid black;
      padding: 0.5rem;
      width: 100%;
    }
    #mc_embed_signup .button {
      background-color: black !important;
      color: white !important;
      padding: 0.75rem 2rem !important;
      font-weight: bold !important;
      transition: all 0.3s ease;
    }
    #mc_embed_signup .button:hover {
      opacity: 0.9;
    }
    #mc_embed_signup .optionalParent {
      margin: 0 !important;
    }
    #mc_embed_signup .foot {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 1rem;
    }
    
    #mc_embed_signup #mce-success-response,
    #mc_embed_signup #mce-error-response {
      position: absolute !important;
      top: 50% !important;
      left: 50% !important;
      transform: translate(-50%, -50%) !important;
      background: rgba(255, 255, 255, 0.95) !important;
      padding: 1rem !important;
      border: 2px solid black !important;
      margin: 0 !important;
      width: auto !important;
      min-width: 200px !important;
      text-align: center !important;
      z-index: 100 !important;
    }
    
    #mc_embed_signup #mce-success-response {
      color: black !important;
    }
    
    #mc_embed_signup #mce-error-response {
      color: #ff0000 !important;
    }
    
    #mc_embed_signup .response {
      margin: 0 !important;
      padding: 0 !important;
      font-weight: bold !important;
    }
</style>
<div id="mc_embed_signup">
    <form action="https://online.us4.list-manage.com/subscribe/post?u=34d9da43d168e6d5e265613bf&amp;id=1e46bd8123&amp;f_id=009b6eeaf0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
        <div id="mc_embed_signup_scroll"><h2>MAILING LIST</h2>
            <div class="mc-field-group"><label for="mce-EMAIL">EMAIL <span class="asterisk">*</span></label><input type="email" name="EMAIL" class="required email" id="mce-EMAIL" required="" value=""></div><div class="mc-field-group"><label for="mce-FNAME">NAME </label><input type="text" name="FNAME" class=" text" id="mce-FNAME" value=""></div><div class="mc-field-group"><label for="mce-CITY">CITY </label><input type="text" name="CITY" class=" text" id="mce-CITY" value=""></div>
        <div id="mce-responses" class="clear foot">
            <div class="response" id="mce-error-response" style="display: none;"></div>
            <div class="response" id="mce-success-response" style="display: none;"></div>
        </div>
    <div aria-hidden="true" style="position: absolute; left: -5000px;">
        /* real people should not fill this in and expect good things - do not remove this or risk form bot signups */
        <input type="text" name="b_34d9da43d168e6d5e265613bf_1e46bd8123" tabindex="-1" value="">
    </div>
        <div class="optionalParent">
            <div class="clear foot">
                <input type="submit" name="subscribe" id="mc-embedded-subscribe"  value="Subscribe">
            </div>
        </div>
    </div>
</form>
</div>
<script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script><script type="text/javascript">(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='CITY';ftypes[2]='text';fnames[3]='MMERGE3';ftypes[3]='text';fnames[4]='MMERGE4';ftypes[4]='text';fnames[5]='MMERGE5';ftypes[5]='text';fnames[6]='MMERGE6';ftypes[6]='text';fnames[7]='MMERGE7';ftypes[7]='text';fnames[8]='MMERGE8';ftypes[8]='text';fnames[9]='MMERGE9';ftypes[9]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script></div>


  {{-- Footer Content --}}
  <div class="footer-container text-h3">
    <div class="footer-grid p-10 relative">
    <img class=" absolute right-0 w-1/3 bottom-20 mix-blend-darken" src="<?php the_field('xtra_image', 'option');?>" alt="Your Image">

      <h4 class="text-h1-m">Contact Info</h4>
      <section>
        {{-- Booking Contacts --}}
        <?php while(have_rows('emails_booking', 'options')): the_row(); ?>
          <span class="pt-10 block">
            <h5>Booking</h5>
            <a class="w-1/2 underline" href="mailto:<?php the_sub_field('email_addy'); ?>" target="_blank">
              <?php the_sub_field('name'); ?>
            </a>
          </span>
        <?php endwhile; ?>

        {{-- Band Contacts --}}
        <?php while(have_rows('emails_band', 'options')): the_row(); ?>
          <span class="pt-10 block">
            <h5>Band</h5>
            <a class="underline" href="mailto:<?php the_sub_field('email_adress'); ?>">
              <?php the_sub_field('name'); ?>
            </a>
          </span>
        <?php endwhile; ?>

        {{-- Band Contacts --}}
        <span class="py-10 block">
        <h5>Management</h5>
        <?php while(have_rows('mgmt_contacts', 'options')): the_row(); ?>
            <a class="underline block" href="mailto:<?php the_sub_field('email_adress'); ?>">
              <?php the_sub_field('email_title'); ?>
            </a>
         <?php endwhile; ?>
         </span>
      </section>

      {{-- Social Media Links --}}
      <div class="social grid grid-cols-2 md:grid-cols-7 md:gap-3 pb-10">
        <?php while(have_rows('social_links', 'options')): the_row(); ?>
          <span class="pt-5 text-center">
            <a href="<?php the_sub_field('social_url'); ?>">
              <?php the_sub_field('label_for_social'); ?>
            </a>
          </span>
        <?php endwhile; ?>
      </div>
  
      </section>

      </div>
    </div>
  </div>

</footer>
