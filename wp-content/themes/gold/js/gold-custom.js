      jQuery(document).ready(function($) {

        $('div.nav ul').addClass('nav navbar-nav');
         $('#my-sidebar ul').children('li').children('span').addClass('badge pull-right');
         $('.footer-widget .footer-box ul li span').addClass('badge pull-right');
         $('.copyright').find('a').addClass('copyright-a');
         $('.footer-box .footer-menu ul').children('li').addClass('badge top5');
         $('.footer-box .footer-menu ').children('li').addClass('badge top5');
         $('.footer-widget .footer-box .menu').children('li').addClass('badge top5'); 
         $('.footer-widget .footer-box .tagcloud').find('a').addClass('badge');  
         $('.post-content img').addClass('img-responsive img-thumbnail');
         $('.service-logo').find('img').addClass('img-responsive');
         $('#non_active').on('click',function(){
            $('#active_on_click').click();
         });

         $('a.more-link').addClass('btn btn-primary');

         $('.paginate-page a').addClass('label');

         $('#comments').addClass("hidden");

         $('.post-content table').addClass('table table-striped');

         $('#commentform table').addClass('table table-striped');

         $('.tags a').addClass('label tag-label');

         

        $('#myTab a').click(function (e) {
              e.preventDefault();
              $(this).tab('show');
        });

        $('.form-submit #submit').addClass('btn btn-primary'); 

        /******************slide drop down*****************/          

            if($('.navbar-toggle').css('display')=='none'){

              $('.nav > li').click(function(e) {

                  e.stopPropagation();

                  var $el = $('> ul',this);

                  $('.nav > li > ul').not($el).slideUp();

                  $el.stop(true, true).slideToggle(500);

              });

                  $('html').click(function() {

                  $('.nav > li > ul').slideUp();  

              });            
            }

        /******************END slide drop down****************/

        $('.carousel').carousel();

      
        var fl= $('.pagination li:first-child a').text();
        if(fl=='« Previous Page'){
          $('.pagination li:first-child a').text('');
          $('.pagination li:first-child a').text('«');
        }
        var fl1= $('.pagination li:last-child a').text();
        if(fl1=='Next Page »'){
          $('.pagination li:last-child a').text('');
          $('.pagination li:last-child a').text('»');
        }
    
    //**********************  Login form ********************
      
      
        $('#loginform-custom').addClass('overflow');
        $('#loginform-custom').find('.input').addClass('form-control');
        $('#loginform-custom #wp-submit').addClass('btn btn-primary');
        $('#loginform-custom #wp-submit').val('Login');
        $('#loginform-custom .login-submit').addClass('left');
        console.log('login ready');

        $('button').addClass('btn btn-primary');
        $('table').addClass('table');
        $('a[type="button"]').addClass('btn btn-primary');
        $('textarea').addClass('form-control');
        $('input[type="text"],input[type="email"],input[type="number"],input[type="url"],input[type="tel"],input[type="search"]').addClass('form-control');


                jQuery.ajaxSetup({
                    cache: false  
                });
                jQuery('#submit').click(function(){
                  var name = jQuery('#yname').val();
                  var email=jQuery('#email').val();
                  var uemail=jQuery('#uemail').val();
                  var number=jQuery('#number').val();
                  var subject=jQuery('#subject').val();
                  var website=jQuery('#website').val();
                  var msg=jQuery('#msg').val();
                  var search_handler=jQuery('#search_handler').val();
                  //var url="<?php echo $search_handler;?>?find="+name;
                  var dataString = '?name='+ name + '&email=' + email + '&uemail=' + uemail + '&number=' + number + '&subject=' + subject + '&website=' + website + '&msg=' + msg;
                  //var url1=url+'='+email;
                    if(name == ""){
                      $('#yname').css('outline','0');
                      $('#yname').css('border-color','#b94a48');
                      $('#yname').css('box-shadow','inset 0 1px 1px rgba(0, 0, 0, 0.075)');
                    }
                    else{
                      $('#yname').css('outline','none');
                      $('#yname').css('border-color','#cccccc');
                      $('#yname').css('box-shadow','none');
                    }
                    if(uemail == ""){
                      $('#uemail').css('outline','0');
                      $('#uemail').css('border-color','#b94a48');
                      $('#uemail').css('box-shadow','inset 0 1px 1px rgba(0, 0, 0, 0.075)');
                    }
                    else{
                      $('#uemail').css('outline','0');
                      $('#uemail').css('border-color','#cccccc');
                      $('#uemail').css('box-shadow','none');
                    }
                     if(number == ""){
                      $('#number').css('outline','0');
                      $('#number').css('border-color','#b94a48');
                      $('#number').css('box-shadow','inset 0 1px 1px rgba(0, 0, 0, 0.075)');
                    }
                    else{
                      $('#number').css('outline','none');
                      $('#number').css('border-color','#cccccc');
                      $('#number').css('box-shadow','none');
                    }
                     if(subject == ""){
                      $('#subject').css('outline','0');
                      $('#subject').css('border-color','#b94a48');
                      $('#subject').css('box-shadow','inset 0 1px 1px rgba(0, 0, 0, 0.075)');
                    }
                    else{
                      $('#subject').css('outline','none');
                      $('#subject').css('border-color','#cccccc');
                      $('#subject').css('box-shadow','none');
                    }
                     if(msg == ""){
                      $('#msg').css('outline','0');
                      $('#msg').css('border-color','#b94a48');
                      $('#msg').css('box-shadow','inset 0 1px 1px rgba(0, 0, 0, 0.075)');
                    }
                    else{
                      $('#msg').css('outline','none');
                      $('#msg').css('border-color','#cccccc');
                      $('#msg').css('box-shadow','none');
                    }
                  if(name != "" && uemail != "" && number != "" && subject != "" && msg != "" ) {
                     var regex = /^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i;
                    if(regex.test(uemail)){
                      $('#loader').removeClass('hidden');
                      //jQuery.get("<?php print $search_handler; ?>", {find:name,email}, write_results_to_page);
                      $.ajax({
                        type: "GET",
                        url: search_handler + dataString,
                        //data: datastring,
                        success: function(data){
                          $('#result').html(data);
                          console.log('Sucess');
                          $('#loader').addClass('hidden');
                          $('form input,textarea').val(null);
                        return false;
                        }
                      });
                      //$('#result').load(url1); 
                    }
                    else{
                      $('#result').html('Please Fill a Valid Email Address.');
                      $('#uemail').css('outline','0');
                      $('#uemail').css('border-color','#b94a48');
                      $('#uemail').css('box-shadow','inset 0 1px 1px rgba(0, 0, 0, 0.075)');
                    }   
                }
                else{
                  $('#result').html('Please Fill All The Required Field.');
                  console.log('Search term empty or too short.');
                }
                    function write_results_to_page(data,status, xhr){
                      if (status == "error") {
                        var msg = "Sorry but there was an error: ";
                        console.error(msg + xhr.status + " " + xhr.statusText);
                      }
                      else
                      {
                      console.log('Search Ready');
                      jQuery('#result').html(data);
                      $('form input,textarea').val(null);
                      return false;
                      //console.log('Search Ready');
                      }
                    } 
            });

      });
    

