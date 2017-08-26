<?php 
  if(of_get_option('box-3')!='' && of_get_option('b3_title')!='')
  {
  ?>
    <div class="front-panel">
      <div class="panel panel-default sub-panel">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo of_get_option('b3_title');?></h3>
        </div>
        <div class="front-widget">  
         <?php 
            if(of_get_option('b3_editor')!=''){
                echo of_get_option('b3_editor');
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
 elseif(of_get_option('d-box-3')!=''){
?>    
	<div class="front-panel">
        <div class="panel panel-default sub-panel">
          <div class="panel-heading">
            <h3 class="panel-title">Sign Up / Login</h3>
          </div>   
          <div class="front-widget">       
	          <?php          
	              $args = array(
	                  'redirect' => admin_url(), 
	                  'form_id' => 'loginform-custom',
	                  'label_username' => __( '','Gold' ),
	                  'label_password' => __( '','Gold'),
	                  'label_remember' => __( 'Remember Me','Gold' ),
	                  'label_log_in' => __( 'Log In','Gold' ),
	                  'remember' => true
	              );
	              wp_login_form( $args );              
	              add_action('login_form','add_reg_to_login');
	              function add_reg_to_login(){
	                $reg_link = esc_url(home_url())."/wp-login.php?action=register";
	                echo "<button class='btn btn-default right' href='".$reg_link."'>Register</button>";
	              }
	          ?>
          </div>
          
        </div>
    </div>    
  <?php } ?>