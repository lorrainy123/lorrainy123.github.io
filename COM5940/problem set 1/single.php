<?php
/*
Template Name: index
Template Post Type: Page
*/
get_header()?>

    <!-- Hero Section-->
    <section style="background: url(<?php bloginfo("template_url")?>/img/hero.jpg); background-size: cover; background-position: center center" class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h1>这 里 是 Lorraine 的 漂 流 书 店， 要 不 要 一 起 坐 下 来 看 一 本 书 </h1><a href="#" class="hero-link">了解更多</a>
          </div>
        </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> 往下</a>
      </div>
    </section>
    <!-- Intro Section-->
    <section class="intro">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="h3">关于漂流书店</h2>
            <p class="text-big">漂流书店”是以“分享、交流”为目的，通过交流读书心得，分享对自
              己影响最深的一本书，或者拿自己无用的书换取其他有用的书籍，将“无用”换成“有用”。
              我们每周都会发布新书的介绍，欢迎有兴趣的书友进行分享和交换，并从中收获快乐</p>
          </div>
        </div>
      </div>
    </section>

    <section class="featured-posts no-padding-top">
      <div class="container">
        <!-- Post-->
        <?php
                $paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'category_name' => 'index',
                    'posts_per_page' => 4,
                    'paged' => $paged,
                );
                $arr_posts = new WP_Query( $args );

                if ( $arr_posts->have_posts() ) :

                    while ( $arr_posts->have_posts() ) :
                        $arr_posts->the_post();

                if ( has_post_thumbnail() ) {
                $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
                echo '<section id="services" class="service-item" style="background-image:url('.$feat_image_url.');">';
                    }

                        ?>


        <div class="row d-flex align-items-stretch">
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category"><a href="#">Literature</a><a href="#">Novel</a></div><a href="post.html">
                    <h2 class="h4"><?php the_title(); ?></h2></a>
                </header>
                <p><?php the_content(); ?></p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="<?php bloginfo("template_url")?>/img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><span><?php the_author() ?></span></div></a>
                  <div class="date"><i class="icon-clock"></i><?php the_time('F jS, Y') ?></div>
                  <div class="comments"><i class="icon-comment"></i>12</div>
                </footer>
              </div>
            </div>
          </div>
          <div class="image col-lg-5"><img src="<?php bloginfo("template_url")?>/img/featured-pic-1.jpeg" alt="..."></div>
        </div>
      <?php endwhile;
     endif; ?>
      </div>
    </section>

    <!-- Divider Section-->
    <section style="background: url(<?php bloginfo("template_url")?>/img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h2>我们将不定期举办线下的读书分享交流会，分为特定书目线下交流会和自由分享会， 希望书友们可以到场来结交新朋友</h2><a href="#" class="hero-link">了解更多</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Latest Posts -->
    <section class="latest-posts">
      <div class="container">
        <header>
          <h2>最新博文</h2>
          <p class="text-big">这里是本周最新的图书信息</p>
        </header>
        <div class="row">

          <?php
                  $paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
                  $args = array(
                      'post_type' => 'post',
                      'post_status' => 'publish',
                      'category_name' => 'index',
                      'posts_per_page' => 4,
                      'paged' => $paged,
                  );
                  $arr_posts = new WP_Query( $args );

                  if ( $arr_posts->have_posts() ) :

                      while ( $arr_posts->have_posts() ) :
                          $arr_posts->the_post();
                          ?>

          <div class="post col-md-4">
            <div class="post-thumbnail"><a href="post.html"><img src="<?php bloginfo("template_url")?>/img/blog-1.jpg" alt="..." class="img-fluid"></a></div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="date"><?php the_time('F jS, Y') ?></div>
                <div class="category"><a href="#">小说</a></div>
              </div><a href="post.html">
                <h3 class="h4"><?php the_title(); ?></h3></a>
              <p class="text-muted"><?php the_content(); ?></p>
            </div>
          </div>
        <?php endwhile;
       endif; ?>

        </div>
      </div>
    </section>
    <!-- Newsletter Section-->
    <section class="newsletter no-padding-top">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>订阅</h2>
            <p class="text-big">获取每周最新信息</p>
          </div>
          <div class="col-md-8">
            <div class="form-holder">
              <form action="#">
                <div class="form-group">
                  <input type="email" name="email" id="email" placeholder="Type your email address">
                  <button type="submit" class="submit">订阅</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Gallery Section-->
    <section class="gallery no-padding">
      <div class="row">
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="<?php bloginfo("template_url")?>/img/gallery-1.jpg" data-fancybox="gallery" class="image"><img src="<?php bloginfo("template_url")?>/img/gallery-1.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="<?php bloginfo("template_url")?>/img/gallery-2.jpg" data-fancybox="gallery" class="image"><img src="<?php bloginfo("template_url")?>/img/gallery-2.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="<?php bloginfo("template_url")?>/img/gallery-3.jpg" data-fancybox="gallery" class="image"><img src="<?php bloginfo("template_url")?>/img/gallery-3.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="<?php bloginfo("template_url")?>/img/gallery-4.jpg" data-fancybox="gallery" class="image"><img src="<?php bloginfo("template_url")?>/img/gallery-4.jpg" alt="..." class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
      </div>
    </section>

    <?php
    get_footer()?>

    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"> </script>
    <script src="<?php bloginfo("template_url")?>/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo("template_url")?>/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php bloginfo("template_url")?>/vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
    <script src="<?php bloginfo("template_url")?>/js/front.js"></script>
  </body>
</html>
