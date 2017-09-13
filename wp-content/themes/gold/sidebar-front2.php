    <?php 
      if(of_get_option('box-2')!='' && of_get_option('b2_title')!='')
      {
      ?>
        <div class="front-panel">
          <div class="panel panel-default sub-panel">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo of_get_option('b2_title');?></h3>
            </div>
            <div class="front-widget">  
             <?php 
                if(of_get_option('b2_editor')!=''){
                    echo of_get_option('b2_editor');
                }
                else{
                   $admin_url = esc_url(admin_url());
                   echo "<strong class='right'>Please Add the Box  Content <a href='".$admin_url."themes.php?page=options-framework'>here</a></strong>";
               }
             ?>            
            </div>
            <div class="clearfix"></div>
          </div>
        </div>    
    <?php  
      }
   elseif(of_get_option('d-box-2')!=''){
    ?>    
    <?php
        $collapse1=null;
        if(of_get_option('collapse_title1')!='')
        {
            $collapse1= of_get_option('collapse_title1');
        }
        else
        {
            $collapse1= __('Collap Title1','Gold');
        }
        $content1=null;
        if(of_get_option('example_collapse1')!='')
        {
            $content1= of_get_option('example_collapse1');
        }
        else
        {
            $contet1=__("Replace with your contnet.",'Gold');
        }
    ?>
    <?php
        $collapse2=null;
        if(of_get_option('collapse_title2')!='')
        {
            $collapse2= of_get_option('collapse_title2');
        }
        else
        {
            $collapse2= __('Collap Title2','Gold');
        } 
        $content2=null;
        if(of_get_option('example_collapse2')!='')
        {
            $content2= of_get_option('example_collapse2');
        }
        else
        {
            $contet2= __("Replace with your contnet." ,'Gold');
        }
    ?>
    <?php
        $collaps3=null;
        if(of_get_option('collapse_title3')!='')
        {
            $collapse3= of_get_option('collapse_title3');
        }
        else
        {
            $collapse3= __("Collap Title3",'Gold');
        }
        $content3=null;
        if(of_get_option('example_collapse3')!='')
        {
            $content3= of_get_option('example_collapse3');
        }
        else
        {
            $contet3= __("Replace with your contnet.",'Gold');
        } 
    ?>
	<div class="front-panel">
        <div class="panel panel-default sub-panel">
          	<div class="panel-heading">
           		<h3 class="panel-title"><a href="http://parquesalegres.org/preguntas-frecuentes/">PREGUNTAS FRECUENTES</a></h3>
          	</div>   
            <div class="front-widget">
              <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                     <div class="collapse-heading">
                       <h4 class="collapse-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-1"><?php echo $collapse1;?></a></h4>
                     </div>
                     <div id="collapse-1" class="panel-collapse collapse" style="height: 0px;">
                         <div class="panel-body"><?php echo $content1;?></div>
                     </div>
                  </div>
                  <div class="panel panel-default">
                     <div class="collapse-heading">
                       <h4 class="collapse-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-2"><?php echo $collapse2;?></a></h4>
                     </div>
                     <div id="collapse-2" class="panel-collapse collapse">
                         <div class="panel-body"><?php echo $content2;?></div>
                     </div>
                  </div>  
                  <div class="panel panel-default">
                     <div class="collapse-heading">
                       <h4 class="collapse-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-3"><?php echo $collapse3;?></a></h4>
                     </div>
                     <div id="collapse-3" class="panel-collapse collapse">
                         <div class="panel-body"><?php echo $content3;?></div>
                     </div>
                  </div>
              </div>
            </div>        
        </div>          
    </div>      
<?php } ?>