<?php
/*
 * Template Name: About
*/
if ( !defined('ABSPATH')) exit;
?>
<?php get_header();?>
  <div class="row">    
    <div class="page-header col-lg-12">
      <h1>
        <?php 
              if(of_get_option('about-title')!=''):
                echo esc_attr(of_get_option('about-title'));
              else:
                echo __("Add Page Title From theme options",'Gold');
              endif;                
        ?> 
        <br>
        <small>
         <?php 
              if(of_get_option('about-sub-title')!=''):
                echo esc_attr(of_get_option('about-sub-title'));
              else:
                echo __("Add Page sub Title From theme options",'Gold');
              endif;                
        ?> 
        </small>
        <span class="glyphicon glyphicon-heart right"></span>
      </h1>        
    </div>
    <div class="col-lg-12 col-sm-12">      
      <div id="carousel-about" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-about" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-about" data-slide-to="1"></li>
          <li data-target="#carousel-about" data-slide-to="2"></li>
          <li data-target="#carousel-about" data-slide-to="3"></li>
          <li data-target="#carousel-about" data-slide-to="4"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
          <?php 
              if(of_get_option('ci1')!=''):
                 ?>
                <img src="<?php echo esc_url(of_get_option('ci1'));?>">
              <?php
              else:
                echo "<img src='".get_template_directory_uri()."/img/1110.gif'>";
              endif;                
          ?>    
          </div>
          <div class="item">
             <?php 
              if(of_get_option('ci2')!=''):
                 ?>
                <img src="<?php echo esc_url(of_get_option('ci2'));?>">
              <?php
              else:
                echo "<img src='".get_template_directory_uri()."/img/1110.gif'>";
              endif;                
            ?>  
          </div>
         <div class="item">
            <?php 
              if(of_get_option('ci3')!=''):
                ?>
                <img src="<?php echo esc_url(of_get_option('ci3'));?>">
              <?php
              else:
                echo "<img src='".get_template_directory_uri()."/img/1110.gif'>";
              endif;                
            ?>  
          </div>
           <div class="item">
            <?php 
              if(of_get_option('ci4')!=''):
               ?>
                <img src="<?php echo esc_url(of_get_option('ci4'));?>">
              <?php
              else:
               echo "<img src='".get_template_directory_uri()."/img/1110.gif'>";
              endif;                
            ?>  
          </div>
           <div class="item">
            <?php 
              if(of_get_option('ci5')!=''):
              ?>
                <img src="<?php echo esc_url(of_get_option('ci5'));?>">
              <?php
              else:
               echo "<img src='".get_template_directory_uri()."/img/1110.gif'>";
              endif;                
            ?>  
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-about" data-slide="prev">
          <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#carousel-about" data-slide="next">
          <span class="icon-next"></span>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-sm-12 top20 justify">
        <?php 
          if(have_posts()):the_post();
            if(get_the_content()!=''):
              echo get_the_content();
            endif;
          endif;  
        ?>
      </div>
    </div>
    <div class="row">  
      <div class="about-tabs col-lg-12 col-sm-12 top20">
        <ul class="nav nav-tabs" id="myTab">
          <li class="active"><a href="#profile">What We do?</a></li>
          <li ><a href="#home">Who We Are?</a></li>
        </ul>
        <div class="tab-content">
         <div class="tab-pane active" id="profile">
            <div class="col-lg-12 top10">
              <div class="col-lg-2 col-sm-2 col-6">
                 <?php 
                    if(of_get_option('wwdi')!=''):
                    ?>  
                      <img src="<?php echo esc_url(of_get_option('wwdi'));?>" class="img-thumbnail">
                    <?php
                    else:
                    ?>
                     <img src="<?php echo get_template_directory_uri();?>/img/sample-140.png" class="img-thumbnail">
                    <?php
                    endif;                
                ?>   
              </div>
              <p class="col-lg-10 justify">
                 <?php 
                if(of_get_option('wwdt')!=''):
                  echo of_get_option('wwdt');
                else:
                  echo __("Add Tab Text From about page theme options",'Gold');
                endif;                
              ?>    
              </p>
            </div>
          </div>
          <div class="tab-pane " id="home">
            <div class="box10">
              <?php 
                if(of_get_option('wwrt')!=''):
                  echo of_get_option('wwrt');
                else:
                  echo __("Add Tab Text From about page theme options",'Gold');
                endif;                
              ?>     
            </div>
          </div>
         
        </div>
      </div> 
    </div>  
  </div>  
<?php get_footer(); ?>