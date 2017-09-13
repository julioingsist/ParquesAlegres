<?php 
/*
	Template Name: Home
*/
if ( !defined('ABSPATH')) exit;
 get_header();
?>
    <div class="featured row">
	
	    <!--/*****************Fron Page Featured Second column*****************/-->     
	      <div class="featured-text center col-lg-6 col-sm-12 col-md-6 col-xs-12">
	        <div class="well">
	        <!--/*****************Featured column Heading*****************/-->     
	          <?php 
	            if(of_get_option('featured_heading')!=''):
	          ?>
	            <h1>
	              <?php 
	                echo of_get_option('featured_heading');
	              ?>
	            </h1>
	          <?php 
	            else: 
	          ?>
	            <h1>
	              <?php 
	                  $admin_url = esc_url(admin_url());
	                  echo "Create a featured heading  <a href='".$admin_url."themes.php?page=options-framework#option-group-8#section-featured_heading'>here</a>";
	              ?>
	            </h1>
	          <?php 
	            endif; 
	          ?> 
	        <!--/*****************/Featured column Heading*****************/-->       

	        <!--/*****************Featured column Sub Heading*****************/-->      
	          <?php 
	            if(of_get_option('featured_sub_heading')!=''):
	          ?>
	            <h3>
	              <?php 
	                echo of_get_option('featured_sub_heading');
	              ?>
	            </h3>
	          <?php 
	            else: 
	          ?>
	            <h3>
	              <?php 
	                $admin_url = esc_url(admin_url());
	                echo "Create a featured sub heading  <a href='".$admin_url."themes.php?page=options-framework#option-group-8#section-featured_sub_heading'>here</a>";
	              ?>
	            </h3>
	          <?php 
	            endif; 
	          ?> 
	        <!--/*****************/Featured column Sub Heading*****************/-->  
	        
	        <!--/*****************Featured column Text Area*****************/-->           
	          <?php 
	            if(of_get_option('featured_text')!=''):
	          ?>
	              <p class="justify box10"><?php echo of_get_option('featured_text');?></p>
	          <?php 
	            else: 
	          ?>
	            <p class="justify box10">
	          <?php 
	              $admin_url = esc_url(admin_url());
	              echo "Create a featured text <a href='".$admin_url."themes.php?page=options-framework#option-group-8#section-featured_text'>here</a>";
	          ?>
	            </p>
	          <?php 
	            endif; 
	          ?> 
	        <!--/*****************/Featured column Text area*****************/-->  

	        <!--/*****************Featured column buttons*****************/-->           
	          <?php  
	            if(of_get_option('single_btn')=='' && of_get_option('two_btn')=='')
	              {
	                $admin_url = esc_url(admin_url());
	                 echo "Add Button <a href='".$admin_url."themes.php?page=options-framework#option-group-8#section-single_btn'>here</a>";
	                
	          ?>
	          <?php
	              } 
	              elseif(of_get_option('single_btn')!='' )
	              {
	                if(of_get_option('btntxt')!=''):
	          ?>
	                <div data-toggle="modal" href="#myModal1" class="col-lg-10 col-lg-offset-1">
	                  <a class="btn btn-danger btn-block" href="<?php echo esc_url(of_get_option('btnlink'));?>"><?php echo of_get_option('btntxt');?></a>      
	                </div>    
	          <?php
	                else:
	                  $admin_url = esc_url(admin_url());
	                  echo "Add Button Text <a href='".$admin_url."themes.php?page=options-framework#option-group-8#section-single_btn'>here</a>";
	                endif;

	              }
	              elseif(of_get_option('two_btn')!='')
	              { 
	                if(of_get_option('btntxt1')!=''):
//data-toggle="modal" href="#myModal1"
	          ?>
	                <div class="col-lg-6 col-sm-6 ">
	                  <a class="btn btn-primary btn-block" href="/evaluacion/<?php //echo esc_url(of_get_option('btnlink1'));?>"><?php echo of_get_option('btntxt1');?></a>      
	                </div>    
	          <?php
	                else:
	                  $admin_url = esc_url(admin_url());
	                  echo "Add First Button Text <a href='".$admin_url."themes.php?page=options-framework#option-group-8#section-single_btn'>here</a>";
	                endif;

	                 
	                if(of_get_option('btntxt2')!=''):
	          ?>
	                 <div class="col-lg-6 col-sm-6">
	                   <a class="btn btn-danger btn-block btn-gold" href="<?php echo esc_url(of_get_option('btnlink2'));?>"><?php echo of_get_option('btntxt2');?></a>      
	                 </div>    
	          <?php
	                 else:
	                   $admin_url = esc_url(admin_url());
	                   echo "Add Second Button Text <a href='".$admin_url."themes.php?page=options-framework#option-group-8#section-single_btn'>here</a>";
	                 endif;

	               
	          
	              }
	          ?> 

	        <!--/*****************Featured column Buttons*****************/-->       
	          <div class="clearfix"></div>
	        </div>            
	      </div>
	    <!--/*****************/Fron Page Featured Second column*****************/--> 
	    <div class="modal-video col-lg-6 col-sm-12 col-md-6 col-xs-12">
	      <!--/*****************Fron Page Featured Video Or Image*****************/-->     
	        <div class="flex-video">
	          <?php 
	               if(of_get_option('video_hidden')!='')
	               {
	                 if(of_get_option('show_video_hidden')!='')
	                 {
	                  $video=of_get_option('show_video_hidden');
	                  $trans='?wmode=transparent';
	                 
	                 ?> 
	                 <iframe width="100%" height="480px" src="//www.youtube.com/embed/<?php echo $video.$trans;?>&rel=0" frameborder="0" allowfullscreen></iframe>
	  
	                 <?php
	               }
	                 else
	                 {
	                  ?>
	                <img src="<?php echo get_template_directory_uri();?>/img/featured-image.png" class="img-responsive img-thumbnail col-xs-12 col-lg-12 col-sm-12">  
	               <?php 
	                  }
	               }
	               elseif(of_get_option('image_hidden')!='')
	               {
	                if(of_get_option('show_image_hidden')!='')
	                  {
	                    $img=of_get_option('show_image_hidden');
	                ?>
	                  <img src="<?php echo esc_url($img);?>" class="col-xs-12 col-lg-12 col-sm-12 img-responsive img-thumbnail">
	                <?php 
	                  }
	                  else
	                  {
	                ?>
	                  <img src="<?php echo get_template_directory_uri();?>/img/featured-image.png" class="col-xs-12 col-lg-12 col-sm-12 img-responsive img-thumbnail">  
	                <?php 
	                  }
	               }
	               else
	               {
	              ?>
	                <img src="<?php echo get_template_directory_uri();?>/img/featured-image.png" class="col-xs-12 col-lg-12 col-sm-12">  
	              <?php 
	               }
	              ?>

	        </div>
	      <!--/*****************/Fron Page Featured Video Or Image*****************/-->       
	    </div>
 

    </div>
    <div class="row">
	    <div class="top10 overflow">
	      <!--/*****************Front Page Widget Above Footer*****************/-->     
	        <div class="col-lg-4 col-sm-12 col-md-4"><?php get_sidebar('front1');?></div>
	        <div class="col-lg-4 col-sm-12 col-md-4"><?php get_sidebar('front2');?></div>
	        <div class="col-lg-4 col-sm-12 col-md-4"><?php get_sidebar('front3');?></div>
	      <!--/*****************/Front Page Widget Above Footer*****************/-->  
	    </div>
  	</div>
  
<?php 
get_footer(); 
?>  