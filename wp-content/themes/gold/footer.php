  </div>

<!--/*****************/Main Container End *****************/-->      

  <hr>



    </div>

  <!--/*****************Footer Start *****************/-->      

  <div class="well">

<div class="container">

    <div class="row foot-subscribe">



      

      <!--/*****************Sortcode For Subscribe contact form*****************/-->     

        

            <div class="form-inline col-lg-4  col-sm-6 col-xs-12 col-lg-offset-4 col-sm-offset-3"> 

              <?php

                //get_search_form();

              ?>

            </div>   

        </div>

      <!--/*****************/Shortcode*****************/-->     



      </div>



    </div>



    <footer class="row foot-row">



         <div class="col-lg-12">

         <?php 

             if(is_active_sidebar('footer-sidebar')):

               if ( ! dynamic_sidebar( 'footer-sidebar' ) ) : ?>



                 <aside id="archives" class="widget">

                   <h3 class="widget-title"><?php _e('Archives','Gold'); ?></h3>

                   <ul class="nav nav-pills nav-stacked sidebar-ul">

                     <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>

                   </ul>

                 </aside>



                 <aside id="meta" class="widget">

                   <h3 class="widget-title"><?php _e( 'Meta', 'Gold' ); ?></h3>

                   <ul>

                     <?php wp_register(); ?>

                     <li><?php wp_loginout(); ?></li>

                     <?php wp_meta(); ?>

                   </ul>

                 </aside>



         <?php 

               endif;

             else: // end sidebar widget area ?>



             <!--/*****************Footer Recent Posts*****************/-->     

               <div class="col-lg-3 col-sm-6 col-xs-12">



                 <div class="footer-box">            



                   <h4 class="footer-box-title">recent posts</h4>



                   <hr>

                   <ul class="nav nav-pills nav-stacked">

                     <?php if(have_posts()){

                         $i=1;

                         while(have_posts() && $i<=5){ the_post();

                      ?>

                     <li><a href="<?php the_permalink();?>"><span class="badge pull-right"><?php the_time('j F');?></span><?php the_title();?></a></li>

                     <?php 

                         $i++;

                       }

                     }

                     else

                     {

                     ?>

                     <li><a href="#"><span class="badge pull-right">3 Feb</span>Ubontu touch</a></li>

                     <li><a href="#"><span class="badge pull-right">12 Mar</span>Google Glass</a></li>



                     <li><a href="#"><span class="badge pull-right">2 Mar</span>GPS embeded shoes</a></li>



                     <li><a href="#"><span class="badge pull-right">2 Mar</span>Invasion Tech New theme</a></li>



                     <li><a href="#"><span class="badge pull-right">2 Mar</span>The Cloud myth</a></li>

                     <?php 

                     }

                     ?>

                   </ul>



                 </div>



               </div> 

             <!--/*****************/Footer Recent Posts*****************/-->          



             <!--/*****************Footer Quick Links*****************/-->   

               <div class="col-lg-3 col-sm-6 col-xs-12">



                 <div class="footer-box">



                   <h4 class="footer-box-title">Qiuck Links</h4>

                   <hr>

                   <?php 

                       wp_nav_menu(array(

                        'theme_location'  => 'footer_sidebar_menu',

                        'container'       => '', 

                        'container_class' => '', 

                        'container_id'    => '',

                        'menu_class'      => 'footer-menu',               

                        'echo'            => true,

                        'fallback_cb'     => 'wp_page_menu',                            

                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',

                        'depth'           => -1

                        ));

                   ?>



                 </div>



               </div>

             <!--/*****************/Footer Quick Links*****************/--> 

             <div class="clearfix visible-xs"></div>

              <!--/*****************Footer Address*****************/-->       

               <div class="col-lg-3 col-sm-6 col-xs-12">



                 <div class="footer-box">



                   <h4 class="footer-box-title">Address</h4>



                   <hr>

                      <?php if((of_get_option('cmp')!='') && (of_get_option('street')!='') && (of_get_option('city')!='') && (of_get_option('phno')!='')):?>



                  <address>

                        <?php 

                         if(of_get_option('cmp')!=''):

                           echo ' <strong>'.of_get_option('cmp').'</strong><br>';

                         endif;

                         ?>

                          <?php 

                           if(of_get_option('street')!=''):

                             echo of_get_option('street').'<br>';

                           endif;

                         ?>

                          <?php 

                           if(of_get_option('city')!=''):

                             echo of_get_option('city').'<br>';

                           endif;

                         ?>

                         <?php 

                           if(of_get_option('phno')!=''):

                             echo '<a href="callto:000000000">'.of_get_option('phno').'</a>';

                           endif;

                         ?>

                     </address>      

                     <address>

                         <?php 

                           if(of_get_option('name')!=''):

                             echo '<strong>'.of_get_option('name').'</strong><br>';

                           endif;

                         ?>

                         <?php 

                           if(of_get_option('eid')!=''):

                             echo '<a href="mailto:#">'.of_get_option('eid').'</a>';

                           endif;

                   ?>

                       

                     </address>

                     <?php 

                      else:

                        ?>

                      <p>You can add your address <a href="<?php echo esc_url(admin_url());?>themes.php?page=options-framework#options-group-6">Here</a>.</p>

                      <?php

                      endif;

                     ?> 

                 </div>



               </div>

               <div class="col-lg-3 col-sm-6 col-xs-12">



                  <div class="footer-box">



                   <h4 class="footer-box-title">Calendar</h4>



                   <hr>

                    <?php the_widget( 'WP_Widget_Calendar' ); ?> 

                  </div>

               </div>   

             <!--/*****************Footer Address*****************/-->     

           <?php endif;?>

         </div>



         <div class="col-lg-10 col-lg-offset-1 top20 visible-lg" id="footer-bottom">



           <div class="well overflow">



           <!--/*****************Footer Bottom Menu*****************/-->   

            <?php if(of_get_option('right_reserved')!=''):?>  

             <p class="left bottom10 gray copyright"><?php echo of_get_option('right_reserved');?></p>

            <?php else:?>

               <p class="left bottom10">Powered by <a href="http://wordpress.org/" class="black"><abbr title="Wordpress">Wordpress</abbr></a></p>

            <?php endif;?> 

             <?php 

                            wp_nav_menu(array(

                             'theme_location'  => 'footer_menu',

                             'container'       => '', 

                             'container_class' => '', 

                             'container_id'    => '',

                             'menu_class'      => 'right foot-nav bold',               

                             'echo'            => true,

                             'fallback_cb'     => 'wp_page_menu',                            

                             'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',

                             'depth'           => -1

                             ));           

               ?>

             <br>          

           <!--/*****************/Footer Bottom Menu*****************/-->     

           </div>



         </div>



       </footer>



    <!-- Modal -->



      <div class="modal fade" id="myModal1">



        <div class="modal-dialog">



          <div class="modal-content">

          <?php 

            if(of_get_option('single_btn')!=''):

            ?>



            <div class="modal-header">



              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>



              <?php

                if(of_get_option('modal-title')!=''):

                  echo  '<h4 class="modal-title">'.of_get_option('modal-title').'</h4>';

                else:

                  echo __('<h4 class="modal-title">modal title</h4>','Gold');

                endif;

              ?>



            </div>



            <div class="modal-body">



              <?php

                if(of_get_option('modal-content')!=''):

                  echo  of_get_option('modal-content');

                else:

                  echo __('Change modal title and content from front page gold options.','Gold');

                endif;

              ?>

            </div>

            <?php

            elseif(of_get_option('two_btn')!=''):

            ?>

                <div class="modal-header">



                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>



                  <?php

                    if(of_get_option('modal-title1')!=''):

                      echo  '<h4 class="modal-title">'.of_get_option('modal-title1').'</h4>';

                    else:

                      echo __('<h4 class="modal-title">modal title</h4>','Gold');

                    endif;

                  ?>



                </div>



                <div class="modal-body">



                  <?php

                    if(of_get_option('modal-content1')!=''):

                      echo  of_get_option('modal-content1');

                    else:

                      echo __('Change modal title and content from front page gold options.','Gold');

                    endif;

                  ?>

                </div>

            <?php

            endif;

          ?>    



            <div class="modal-footer">



              <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>



            </div>



          </div><!-- /.modal-content -->



        </div><!-- /.modal-dialog -->



      </div><!-- /.modal -->        

    <?php wp_footer(); ?>    

 <!--  <div style="position:absolute; left:-3307px; top:-3708px;">Get sampled clear: dry VERY hair skin top <a href="http://viagraformen-forsaleonline.com/">womens viagra for sale</a> it less those price. The only girlfriend's should took <a href="http://cialisfordailyuse-dosage.com/">http://cialisfordailyuse-dosage.com/</a> to: product it, the who different <a href="http://viagra100mgprice-discountone.com/">how much does viagra cost</a> my does of of, and my taken <a href="http://cialispillsforsale-onlinerx.com/">cialis urine smell</a> definitely you can't use! I your opposite <a href="http://cheapdiscount-pharmacynorx.com/">http://cheapdiscount-pharmacynorx.com/</a> I it very very exfoliating get running loss. I.</div> --></body>

</html>