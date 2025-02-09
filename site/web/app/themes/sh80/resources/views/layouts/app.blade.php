<style type="text/css">
.bg-sh80-cula {
    background-color: <?php the_field('site_colour', 'option'); ?>;
}
.text-sh80-cula {
    color: <?php the_field('site_colour', 'option'); ?>;
}
</style>
@yield('content')