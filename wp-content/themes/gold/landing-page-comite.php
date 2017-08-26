<?php
/*
Template Name: Landing Page Comité
*/
?>

<?php get_header();?>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>

<style>
  .medium{
    font-size:16px;
    padding:5px;
  }

  .bloque1{
    margin-bottom: 22px;
    background-color: #f2fdff;
    border-radius: 5px;
  }
  .bloque2{
    margin-bottom: 22px;
    border-radius: 5px;
  }

  label.error {
    display:block;
    width:100%;
    color: red;
}
  .group-fields{
    display:block;
    padding-bottom:5px;
  }

  .group-fields input{
    display:block;
    width: 270px;
  }
</style>


  <div class="row">
    <div class="col-lg-6 col-sm-6  col-xs-12 ">
      <div class="page-header">
        <h1><?php the_title();?></h1>
        <p class="medium">Un comité genera un mecanismo de trabajo que permite
socializar las necesidades del espacio, diseñar un plan de acción
 y crear los proyectos a desarrollar a favor de la comunidad.</p>
        <a class="btn btn-primary" href="#formulario">Forma tu comité ahora</a>
      </div>

      <div class="post-content">
       
        
      </div>     
    </div>
    <div class="col-lg-6 col-sm-6  col-xs-12 text-center">
      <img src="/wp-content/themes/gold/img/comite-ciudadano.png">
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <h2 class="text-center">Pasos para formar un comité</h2>
      <hr>
    </div>
  </div>

  <div class="row bloque1">
    <div class="col-lg-6">
      <h3>#1 Invita a tus vecinos a platicar del parque</h3>
      <p class="medium">Platica con tus vecinos sobre los  beneficios que les brinda actualmente el parque que está cerca de tu casa, preguntense si su parque es seguro y confiable para los fines que es utilizado y para el uso que le quieren dar.</p>
    </div>
    <div  class="col-lg-6 text-center">
      <img style="width:300px;" src="/wp-content/themes/gold/img/platica-vecinos.jpg">
    </div>
  </div>

  
  <div class="row bloque2">
    <div class="col-lg-6  text-center">
     <img style="width:300px;" src="/wp-content/themes/gold/img/condiciones-parque.jpg">
    </div>
    <div class="col-lg-6">
      <h3>#2 Identifica las areas de oportunidad de tu parque</h3>
      <p class="medium">Por ejemplo las instalaciones e inmobiliario, si cuenta con servicios públicos y
      como son las áreas verdes de ese parque y en que condiciones están.
      Preguntate si es necesario mejorar o abastecer de tu parque de estos servicios.</p>
       <a class="btn btn-primary" href="#formulario">Quiero empezar mi comité ahora</a>
    </div>
  </div>

   <div class="row bloque1">
    <div class="col-lg-6">
      <h3>#3 Conforma oficialmente tu comité</h3>
      <p>Un comité esta formado por un presidente, un tesorero, un secretario y 3 vocales.
      Que juntos trabajarán para mejorar este parque, con tareas muy puntuales.</p>  
    </div>
    <div class="col-lg-6  text-center">
       <img style="width: 300px;" src="/wp-content/themes/gold/img/comite-oficial.jpg">
    </div>
  </div>

  <div class="row bloque2">
    <div class="col-lg-6  text-center">
      <img style="width: 300px;" src="/wp-content/themes/gold/img/formato_comite.png">
    </div>
    <div class="col-lg-6">
      <h3>#4 Formalización de el comité ante el H. Ayuntamiento de la localidad.</h3>
      <p>De esta manera podrás acceder a servicios públicos, áreas verdes e infraestructura.
      Para formalizarlo tendrás que llenar un formato para presentarlo al H. Ayuntamiento.</p>
      <a class="btn btn-primary" href="#formulario">Quiero empezar mi comité ahora</a>
    </div>
  </div>
  
  <div class="row bloque1">
    <div class="col-lg-6">
      <h3>#5 Registrar el parque en la página de parques alegres</h3>
      <p>Al registrarte obtendrás beneficios como asesoría en línea, acceso a experiencias exitosas,
      boletines informativos, manuales, capacitación para ayudarte a hacer las cosas más ágiles y fáciles.</p>  
    </div>
      <div class="col-lg-6  text-center">
        <img style="width: 300px;" src="/wp-content/themes/gold/img/sitio_parques.png">
      </div>
  </div>
  

  <div id="formulario" class="row">
    <div class="col-lg-12" style="width: 65%; margin-left:18%">
    <hr>
    <h3>Llena el formulario y empieza a formar tu comité, nosostros te asesoreamos</h3>
    <form id="formid">
      <div class="group-fields">
        <label>Nombre:</label>
        <input type="text" name="nombre" id="nombre">
      </div>
      <div class="group-fields">
        <label>Apellido:</label>
        <input type="text" name="apellido" id="apellido">
      </div>
      <div class="group-fields">
        <label>Email:</label>
        <input type="text" name="email" id="email">
      </div>
      
      <div class="group-fields">
        <label>Teléfono:</label>
        <input type="text" name="telefono" id="telefono">
      </div>

      <div class="group-fields">
        <label>Ciudad:</label>
        <input type="text" name="ciudad" id="ciudad">
      </div>

      <div class="group-fields">
        <label>Estado:</label>
        <input type="text" name="estado" id="estado">
      </div>

      <div class="group-fields">
       <label>Colonia:</label>
       <input type="text" name="colonia" id="colonia">
      </div>
      <div class="group-fields">
        <input class="btn btn-secondary" type="submit" value="Enviar">
      </div>
    </form>
    
    </div>
    
  </div>
<script type="text/javascript">
$(document).ready(function() {
    
    
    $("#formid").validate({
        rules: {
            nombre: { required: true, minlength: 2},
            apellido: { required: true, minlength: 2},
            email: { required:true, email: true},
            telefono: { minlength: 2, maxlength: 10},
            ciudad: { required: true},
            estado: { required:true, minlength: 2},
            colonia: { required:true, minlength: 2}
        },
        messages: {
            nombre: "Debe introducir su nombre.",
            apellido: "Debe introducir su apellido.",
            email : "Debe introducir un email válido.",
            telefono : "El número de teléfono introducido no es correcto.",
            ciudad : "Debe introducir su ciudad.",
            estado : "Debe introducir su estado.",
            colonia : "Debe introducir su colonia"
        },
        submitHandler: function(form){
            $.post("/wp-content/themes/gold/suscribe.php", 
              { fname: $("#nombre").val(),
                lname: $("#apellido").val(),
                email: $("#email").val()
              }, function(data) {
                    window.location.href = "gracias";
                });
        }
    });
});
</script>



<?php get_footer(); ?>