<?php
/*
Template Name: blog
Template Post Type: Page
*/
get_header()?>

        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8">
          <div class="container">
            <div class="row">
              <!-- post -->

              <?php
              $query = new AirpressQuery();
              $query->setConfig("Default");
              $query->table("book");
              $events = new AirpressCollection($query);
              foreach($events as $e){
                echo "<div class='post col-xl-6'>"
                  ."<div class='post-thumbnail'><a href='http://dev-lorraine123.pantheonsite.io/post/'><img src='".$e["imageurl"]."' alt='...' class='img-fluid'></a></div>"
                  ."<div class='post-details'>"
                  ."<div class='post-meta d-flex justify-content-between'>"
                  ."<div class='date meta-last'>".$e["time"]."</div>"
                  ."<div class='category'><a href='#'>".$e["type"]
                  ."</a></div>"
                  ."</div><a href='post.html'>"
                  ."<h3 class='h4'>".$e["Name"]."</h3></a>"
                  ."<p class='text-muted'>".$e["content"]."</p>"
                  ."<footer class='post-footer d-flex align-items-center'><a href='#' class='author d-flex align-items-center flex-wrap'>"
                  ."<div class='avatar'><img src='".$e["avatarurl"]."' alt='...' class='img-fluid'>"."</div>"
                  ."<div class='title'><span>"."Lorraine"."</span></div></a>"

                  ."<div class='date'><i class='icon-clock'>"."</i>"."this week"."</div>"
                  ."<div class='comments meta-last'><i class='icon-comment'>"."</i>"."12"."</div>"
                  ."</footer>"
                  ."</div>"
                  ."</div>";
              }
              ?>


              </div>
            </div>
            <!-- Pagination -->
            <nav aria-label="Page navigation example">
              <ul class="pagination pagination-template d-flex justify-content-center">
                <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-left"></i></a></li>
                <li class="page-item"><a href="#" class="page-link active">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-right"></i></a></li>
              </ul>
            </nav>
          </div>
        </main>
        <aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <div class="widget search">
            <header>
              <h3 class="h6">Search the blog</h3>
            </header>
            <form action="#" class="search-form">
              <div class="form-group">
                <input type="search" placeholder="What are you looking for?">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
          <!-- Widget [Latest Posts Widget]        -->
          <div class="widget latest-posts">
            <header>
              <h3 class="h6">最新发布</h3>
            </header>
            <div class="blog-posts">

              <?php
                      $paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
                      $args = array(
                          'post_type' => 'post',
                          'post_status' => 'publish',
                          'category_name' => 'blog',
                          'posts_per_page' => 4,
                          'paged' => $paged,
                      );
                      $arr_posts = new WP_Query( $args );

                      if ( $arr_posts->have_posts() ) :

                          while ( $arr_posts->have_posts() ) :
                              $arr_posts->the_post();
                              ?>

              <a href="#">
                <div class="item d-flex align-items-center">
                  <div class="image"><img src="<?php bloginfo("template_url")?>/img/small-thumbnail-1.jpg" alt="..." class="img-fluid"></div>
                  <div class="title"><strong><?php the_title(); ?></strong>
                    <div class="d-flex align-items-center">
                      <div class="views"><i class="icon-eye"></i> 500</div>
                      <div class="comments"><i class="icon-comment"></i>12</div>
                    </div>
                  </div>
                </div></a>

              <?php endwhile;
             endif; ?>

            </div>
          </div>
          <!-- Widget [Categories Widget]-->
          <div class="widget categories">
            <header>
              <h3 class="h6">Categories</h3>
            </header>
            <div class="item d-flex justify-content-between"><a href="#">Book</a><span>12</span></div>
            <div class="item d-flex justify-content-between"><a href="#">Meeting</a><span>25</span></div>
            <div class="item d-flex justify-content-between"><a href="#">Comment</a><span>8</span></div>
            <div class="item d-flex justify-content-between"><a href="#">Report</a><span>17</span></div>
            <div class="item d-flex justify-content-between"><a href="#">Community</a><span>25</span></div>
          </div>
          <!-- Widget [Tags Cloud Widget]-->
          <div class="widget tags">
            <header>
              <h3 class="h6">Tags</h3>
            </header>
            <ul class="list-inline">
              <li class="list-inline-item"><a href="#" class="tag">#Novel</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Biography</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Movie&TV</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Non-fiction</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#History</a></li>
            </ul>
          </div>
        </aside>
      </div>
    </div>

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
