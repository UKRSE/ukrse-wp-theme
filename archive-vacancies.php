<?php 

function vacancies_title($title_parts) {
    $title_parts['title'] = "Vacancies - Research Software Engineers Association";
    return $title_parts;
}

add_filter( 'document_title_parts', 'vacancies_title' );

get_header();

?>

<div class="site-content">
    <div id="container" class="wrapper clear">
        <div class="primary">
            <article class="page">
                <div class="entry-content">
                    <div class="underline"></div>
                    <hr>
                    <p>There are regular opportunities for programming researchers in universities and labs across the UK. A great place to look is Jobs.ac.uk.</p>
                    <p>However, where we are made aware of great opportunities for research software engineers, we advertise these here where we can.</p>
                    <p>If you are applying for a job from this list, please do tell the recruiting institution that you saw it here if you have the opportunity to do so.</p>
                    <p>If you’d like your vacancy on this page, email <a href="mailto:info@rse.ac.uk">info@rse.ac.uk</a></p>
                    <?php $args = array( 'post_type' => 'vacancies', 'posts_per_page' => 500, 'order' => 'ASC', 'meta_key' => '_expiration-date', 'orderby' => 'meta_value' );
                    $eventloop = new WP_Query( $args );
                    if ( $eventloop->have_posts() ) : while ( $eventloop->have_posts() ) : $eventloop->the_post();

                    $expdate = get_post_meta($post->ID, '_expiration-date', true);

                    the_title(sprintf('<div class="job-title"><h3><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>');

                    echo '<small><b>Published Date</b>&nbsp;&nbsp;' . get_the_time( 'F j, Y' ) . '&nbsp;&nbsp;&nbsp;&nbsp;</small>';
                    
                    if($expdate < strtotime('1 year') ){
                        echo '<small><b>Closing Date</b>&nbsp;&nbsp;' . get_date_from_gmt( date( 'Y-m-d H:i:s', $expdate ), 'F j, Y' ) . '</small></div>';

                    }else{
                        echo '<small><b>Closing Date</b>&nbsp;&nbsp;None</small></div>';
                    }

                endwhile; // end of the loop.
            endif; ?>
        </div>
    </article>
</div>
<?php get_sidebar(); ?>
</div><!-- #container -->
</div><!-- .site-content -->

<?php get_footer(); ?>
