<?php
get_header();

while (have_posts()) {
  the_post(); ?>

  <div class="page-banner">
    <!-- Banner -->
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/blueberry1.jpg'); ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title">Our History</h1>
      <div class="page-banner__intro">
        <p>Be Yourself</p>
      </div>
    </div>
  </div>

  <div class="container container--narrow page-section">

    <?php
    $theParent= wp_get_post_parent_id(get_the_ID())
      if ($theParent) { ?>
        <div class="metabox metabox--position-up metabox--with-home-link">
          <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>"><i class="fa fa-home"
            aria-hidden="true"></i>Back to <?php echo get_the_title($theParent); ?></a> <span class="metabox__main"><?php the_title(); ?></span></p>
        </div>
      <?php }
     ?>

    <?php
    $testArray = get_pages(array(
      'child_of' => get_the_ID()
    ));
    if ($theParent or $testArray) { ?> <!--wrapping in php {} all div-->
    <!--Sidebar menu-->
    <div class="page-links">
      <h2 class="page-links__title"><a href="<?php get_permalink($theParent); ?>"><?php echo get_the_title($theParent)?></a></h2>
      <ul class="min-list"><!--shows all parent and children pages with wp_list_pages and than we configure them-->
        <?php
        if ($theParent) {
          $theChildren = $theParent;
        }else {
          $theChildren = get_the_ID();
        }
          wp_list_pages(array(
            'title_li'=> NULL, //removing pages text in begining of all pages
            'child_of'=> $theChildren,
            'sort_column' => 'menu_order' //you can add in wordpress site in page section order number
          ));
        ?>
        <li class="current_page_item"><a href="#">Our History</a></li>
        <li><a href="#">Our Goals</a></li>
      </ul>
    </div>
    <?php }?>

    <div class="generic-content">
      <?php the_content(); ?>
    </div>

  </div>

<?php }
get_footer();
?>
