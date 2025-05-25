<?php
// bd connection

include "lib/connection.php";

//tech news
$t_sql = "SELECT * FROM news WHERE c_id =46";
$t_query = $conn->query($t_sql);

?>

<?php include "header.php";?>
  <!-- banner start -->
  <section class="banner">
    <div class="container">
      <div class="row mh_custom align-items-center">
        <div class="col-lg-7">
          <div class="b_content">
            <h1>Lorem ipsum dolor sit amet.</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex alias repudiandae assumenda impedit voluptatem et repellat delectus reiciendis perspiciatis velit. impedit voluptatem et repellat delectus reiciendis perspiciatis velit.</p>
            <a href="#" class="btn btn-dark">Read More</a>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="b_icon text-center">
            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- banner end -->
  <!-- category start -->
  <section class="category">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="c_title text-center">
            <h1>Popular Categories</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. consectetur adipisicing elit. </p>
            <hr class="w-25 m-auto">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg">
          <div class="f_icon text-center">
            <a href="#" class="text-dark">
              <i class="fa fa-rocket" aria-hidden="true"></i>
            </a>
            <h3>tech</h3>
          </div>
        </div>
        <div class="col-lg">
          <div class="f_icon text-center">
            <a href="#" class="text-dark">
              <i class="fa fa-book" aria-hidden="true"></i>
            </a>
            <h3>education</h3>
          </div>
        </div>
        <div class="col-lg">
          <div class="f_icon text-center">
            <a href="#" class="text-dark">
              <i class="fa fa-thermometer-full" aria-hidden="true"></i>
            </a>
            <h3>weather</h3>
          </div>
        </div>
        <div class="col-lg">
          <div class="f_icon text-center">
            <a href="#" class="text-dark">
              <i class="fa fa-user-md" aria-hidden="true"></i>
            </a>
            <h3>health</h3>
          </div>
        </div>
        <div class="col-lg">
          <div class="f_icon text-center">
            <a href="#" class="text-dark">
              <i class="fa fa-university" aria-hidden="true"></i>
            </a>
            <h3>economy</h3>
          </div>
        </div>
        <div class="col-lg">
          <div class="f_icon text-center">
            <a href="#" class="text-dark">
              <i class="fa fa-bicycle" aria-hidden="true"></i>
            </a>
            <h3>sports</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- featcategory end -->

  <!-- tech news start -->
  <section class="tech">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="c_title text-center">
            <h1>Tech News</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. consectetur adipisicing elit. </p>
            <hr class="w-25 m-auto">
          </div>
        </div>
      </div>
      <div class="row">
        <?php if ($t_query-> num_rows > 0){ ?>
          <?php while ($final = $t_query->fetch_assoc()) { ?>
            <div class="col-lg-4">
              <div class="c_news text-center">
                <!-- <i class="fa fa-bug" aria-hidden="true"></i> -->
                 <i class="<?php echo $final['icon']; ?>" aria-hidden="true"></i>
                  
                <h2><?php echo $final['title']; ?></h2>
                 <p>
                  <?php 
                  $decs = $final['description'];
                  if(strlen($decs)>100){
                    echo substr($decs, 0, 150)." ". "..."."<br>";
                    echo "<a href='details.php?id=". $final['id']."' class='text-dark d-block pt-3'>read more</a>";

                  }else{
                    echo $decs;
                  }
                  

                  ?>
                </p>
                <!-- <a href="#" class="text-dark">read more</a> -->
              </div>
            </div>
          <?php } ?>
        <?php } else { ?>
          <div class="col-lg-12">
            <div class="c_news text-center">
              <h2>No data to Show</h2>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- tech news end -->
  <!-- health news start -->
  <section class="health">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="c_title text-center">
            <h1>Health News</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. consectetur adipisicing elit. </p>
            <hr class="w-25 m-auto">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="c_news text-center">
            <i class="fa fa-heartbeat" aria-hidden="true"></i>
            <h2>Lorem ipsum dolor.</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Cupiditate, nulla architecto doloremque neque ducimus at esse provident minus, itaque suscipit.</p>
            <a href="#" class="text-dark">read more</a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="c_news text-center">
            <i class="fa fa-heartbeat" aria-hidden="true"></i>
            <h2>Lorem ipsum dolor.</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Cupiditate, nulla architecto doloremque neque ducimus at esse provident minus, itaque suscipit.</p>
            <a href="#" class="text-dark">read more</a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="c_news text-center">
            <i class="fa fa-heartbeat" aria-hidden="true"></i>
            <h2>Lorem ipsum dolor.</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Cupiditate, nulla architecto doloremque neque ducimus at esse provident minus, itaque suscipit.</p>
            <a href="#" class="text-dark">read more</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- health news end -->
  <!-- education news start -->
  <section class="education">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="c_title text-center">
            <h1>Education News</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. consectetur adipisicing elit. </p>
            <hr class="w-25 m-auto">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="c_news text-center">
            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
            <h2>Lorem ipsum dolor.</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Cupiditate, nulla architecto doloremque neque ducimus at esse provident minus, itaque suscipit.</p>
            <a href="#" class="text-dark">read more</a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="c_news text-center">
            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
            <h2>Lorem ipsum dolor.</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Cupiditate, nulla architecto doloremque neque ducimus at esse provident minus, itaque suscipit.</p>
            <a href="#" class="text-dark">read more</a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="c_news text-center">
            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
            <h2>Lorem ipsum dolor.</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Cupiditate, nulla architecto doloremque neque ducimus at esse provident minus, itaque suscipit.</p>
            <a href="#" class="text-dark">read more</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- education news end -->
   <!-- footer start -->
  <?php include "footer.php";?>
     <!-- footer end -->