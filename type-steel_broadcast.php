<?php
/**
 * The template used for displaying custom post type content
 *
 * @package Flint
 * @since 1.0.1
 */

$media = steel_broadcast_media();
$img_id = get_post_thumbnail_id();
$img = wp_get_attachment_image_src( $img_id, 'steel-broadcast' );
?>

  <div class="row">
    <?php echo flint_post_margin( true ); ?>
    <article id="post-<?php the_ID(); ?>" <?php flint_post_class(); ?>>
      <header class="entry-header">
        <?php $type = get_post_type(); ?>
        <?php do_action( 'flint_open_entry_header_'.$type ); ?>

        <h1 class="entry-title"><?php if ( is_singular() ) { echo the_title();
} else { echo '<a href="' . get_permalink() .'" rel="bookmark">' . get_the_title() . '</a>'; } ?></h1>
        <?php if ( current_user_can( 'edit_posts' ) ) { ?><a class="btn btn-default btn-sm btn-edit hidden-xs" href="<?php echo get_edit_post_link(); ?>">Edit</a><?php } ?>

        <div class="entry-meta">
          <?php do_action( 'flint_entry_meta_above_'.$type ); ?>
        </div><!-- .entry-meta -->

        <?php do_action( 'flint_close_entry_header_'.$type ); ?>

      </header><!-- .entry-header -->

      <?php if ( is_search() ) : ?>
      <div class="entry-summary">
        <?php the_excerpt(); ?>
      </div><!-- .entry-summary -->
      <?php else : ?>
      <div class="entry-content">
        <?php
        flint_the_content();
        foreach ( $media as $medium ) {
        ?>
          <div id="item_<?php echo $medium->ID; ?>" class="item row">
            <h3 class="item-title col-xs-12"><?php echo $medium->post_title; ?></h3>
            <p class="item-details col-xs-12">
              <span class="item-date"><i class="glyphicon glyphicon-calendar"></i> <?php echo $medium->date_published; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="item-artist"><i class="glyphicon glyphicon-user"></i> <?php echo $medium->artist; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
              <a class="item-download" href="<?php echo $medium->guid; ?>" download><i class="glyphicon glyphicon-download hidden-xs"></i> Download</a>
            </p>
            <audio class="media-audio col-xs-12" controls>
              <source src="<?php echo $medium->guid; ?>" type="<?php echo $medium->mime_type; ?>">
            </audio>
            <p></p>
            <p class="item-content col-xs-12">
              <?php echo $medium->post_content; ?>
            </p>
          </div><!-- .item -->
          <hr>
        <?php
        }
        flint_link_pages( array(
          'before' => '<ul class="pagination">',
          'after'  => '</ul>',
        ) ); ?>
      </div><!-- .entry-content -->
      <?php endif; ?>

      <footer class="entry-meta clearfix">
      <?php do_action( 'flint_entry_meta_below_'.$type ); ?>
      </footer><!-- .entry-meta -->

    </article><!-- #post-<?php the_ID(); ?> -->
    <?php echo flint_post_margin(); ?>
  </div><!-- .row -->
