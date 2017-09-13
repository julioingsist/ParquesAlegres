<?php 
  if(of_get_option('box-1')!='' && of_get_option('b1_title')!='')
  {
  ?>
    <div class="front-panel">
      <div class="panel panel-default sub-panel">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo of_get_option('b1_title');?></h3>
        </div>
        <div class="front-widget">  
         <?php 
            if(of_get_option('b1_editor')!=''){
                echo of_get_option('b1_editor');
            }
            else{
               $admin_url = esc_url(admin_url());
               echo "<strong class='right'>Please Add the Box Content <a href='".$admin_url."themes.php?page=options-framework'>here</a></strong>";
           }
         ?>            
        </div>
        <div class="clearfix"></div>
      </div>
    </div>    
<?php  
  }
  elseif(of_get_option('d-box-1')!=''){
?>

<?php 

} ?>
