<?php
/**
 * The template for displaying the front page
 *
 * Template file used to render the Site Front Page,
 * whether the front page displays the Blog Posts Index
 * or a static page.
 *
 * @package Flint/Trinity
 * @since 0.1
 *
 */

get_header(); ?>
<?php flint_get_widgets('header'); ?>

  <div id="primary" class="content-area">

    <?php
    $show = get_page_by_title( 'splash', OBJECT, 'steel_slides' );
    $output = steel_slideshow( $show->ID, 'front-slides' );
    echo $output;
    ?>

    <div class="container">

      <div id="content" class="<?php echo $content_class; ?>" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

          <?php get_template_part( 'templates/' . flint_get_template(), 'content' ); ?>

          <?php if ( comments_open() || '0' != get_comments_number() ) { comments_template(); } ?>

        <?php endwhile; ?>

      </div><!-- #content -->

    </div><!-- .container -->

    <div id="mission">
      <div class="container text-center">
        <h5>Our Mission</h5>
        <h1>To make gospel-centered disciples of Jesus Christ</h1>
        <h5>who</h5>
        <div class="row">
          <div class="col-xs-4">
            <h3>Glorify God</h3>
            <p class="hidden-xs">for who He is and what He has done</p>
          </div>
          <div class="col-xs-4">
            <h3>Grow together</h3>
            <p class="hidden-xs">in God's Word</p>
          </div>
          <div class="col-xs-4">
            <h3>Go to all people</h3>
            <p class="hidden-xs">near and far declaring the gospel of God's grace</p>
          </div>
        </div>
      </div>
    </div>

    <div id="next-steps">
      <div class="container">
        <div class="col-sm-4">
          <a class="ns" href="http://sharethelife.org/know-god/" title=""><img src="http://sharethelife.org/wp-content/uploads/Bible-with-Pen-S.jpg" alt="Become a Christian"><div class="ns-caption">Become a Christian</div></a>
        </div>
        <div class="col-sm-4">
          <a class="ns" href="http://sharethelife.org/get-connected/lifegroups/" title=""><img src="http://sharethelife.org/wp-content/uploads/lifegroups.png" alt="Join a LifeGroup"><div class="ns-caption">Join a LifeGroup</div></a>
        </div>
        <div class="col-sm-4">
          <a class="ns" href="http://sharethelife.org/get-connected/serve/" title=""><img src="http://sharethelife.org/wp-content/uploads/serve.png" alt="Baptism2"><div class="ns-caption">Serve</div></a>
        </div>
      </div>
    </div>

  </div><!-- #primary -->

<?php flint_get_widgets('footer'); ?>
<?php get_footer(); ?>