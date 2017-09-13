<?php
/*
Template Name: Autoevaluación
*/
?>

<?php get_header(); ?>

    <!-- MAIN CONTENT -->
    <div class="main" role="main">
        <div class="top bg-improve"></div>
        <h1 class="title-section">
            <span>Cuestionario de autoevaluación</span>
        </h1>
        <div class="park-registration">
            <div class="section section--box">
                <form class="park-test" action="" method="post" name="forma" id="forma">
                    <ul class="form-fields">
                        <li>
                            <label for="park-name">Nombre del Parque <span>*</span></label>
                            <input id="park-name" type="text" class="text-input" />
                        </li>
                        <li>
                            <label for="contact">Contacto</label>
                            <input id="contact" type="text" class="text-input" />
                        </li>
                        <li>
                            <label for="email">Correo Electrónico</label>
                            <input id="email" type="text" class="text-input" />
                        </li>
                    </ul>
                    <fieldset>
                        <legend>Comité</legend>
                        <ul class="form-fields">
                            <li>
                                <label class="feature">¿Con cuántas personas opera tu comité?</label>
                                <ul class="multi-list four-cols">
                                    <li><label><input type="radio" name="radio-group-1" /> No hay comité</label></li>
                                    <li><label><input type="radio" name="radio-group-1" /> 1</label></li>
                                    <li><label><input type="radio" name="radio-group-1" /> 2</label></li>
                                    <li><label><input type="radio" name="radio-group-1" /> 3 o más personas</label></li>
                                </ul>
                            </li>
                            <li>
                                <label class="feature">¿Tu comité está formalizado con el Ayuntamiento?</label>
                                <ul class="multi-list four-cols">
                                    <li><label><input type="radio" name="radio-group-2" /> Tenemos contrato</label></li>
                                    <li><label><input type="radio" name="radio-group-2" /> Tenemos escrito</label></li>
                                    <li><label><input type="radio" name="radio-group-2" /> Están enterados</label></li>
                                    <li><label><input type="radio" name="radio-group-2" /> No</label></li>
                                </ul>
                            </li>
                            <li>
                                <label class="feature">¿En tu comité hay buena organización?</label>
                                <ul class="multi-list three-cols">
                                    <li><label><input type="radio" name="radio-group-3" /> Sí</label></li>
                                    <li><label><input type="radio" name="radio-group-3" /> Más o menos</label></li>
                                    <li><label><input type="radio" name="radio-group-3" /> No</label></li>
                                </ul>
                            </li>
                            <li>
                                <label class="feature">¿En tu comité hacen reuniones con regularidad?</label>
                                <ul class="multi-list three-cols">
                                    <li><label><input type="radio" name="radio-group-4" /> Sí</label></li>
                                    <li><label><input type="radio" name="radio-group-4" /> Suficientes</label></li>
                                    <li><label><input type="radio" name="radio-group-4" /> Muy pocas</label></li>
                                    <li><label><input type="radio" name="radio-group-4" /> Casi nunca</label></li>
                                    <li><label><input type="radio" name="radio-group-4" /> Nunca</label></li>
                                </ul>
                            </li>
                            <li>
                                <label class="feature">¿Tienen algún proyecto en marcha para su parque?</label>
                                <ul class="multi-list four-cols">
                                    <li><label><input type="radio" name="radio-group-5" /> Sí</label></li>
                                    <li><label><input type="radio" name="radio-group-5" /> Solo planes</label></li>
                                    <li><label><input type="radio" name="radio-group-5" /> Solo ideas</label></li>
                                    <li><label><input type="radio" name="radio-group-5" /> No</label></li>
                                </ul>
                            </li>
                        </ul>
                    </fieldset>
                    <fieldset>
                        <legend>Instalaciones</legend>
                        <ul class="form-fields">
                            <li>
                                <label class="feature">¿Cuentan con instalaciones en tu parque? (bancas, canchas, áreas verdes, etc.)</label>
                                <ul class="multi-list four-cols">
                                    <li><label><input type="radio" name="radio-group-6" /> Suficientes</label></li>
                                    <li><label><input type="radio" name="radio-group-6" /> Varias</label></li>
                                    <li><label><input type="radio" name="radio-group-6" /> Pocas</label></li>
                                    <li><label><input type="radio" name="radio-group-6" /> Nada</label></li>
                                </ul>
                            </li>
                            <li>
                                <label class="feature">¿Lo que existe está en buen estado?</label>
                                <ul class="multi-list three-cols">
                                    <li><label><input type="radio" name="radio-group-7" /> Sí</label></li>
                                    <li><label><input type="radio" name="radio-group-7" /> Más o menos</label></li>
                                    <li><label><input type="radio" name="radio-group-7" /> No</label></li>
                                </ul>
                            </li>
                        </ul>
                    </fieldset>
                    <fieldset>
                        <legend>Ingresos</legend>
                        <ul class="form-fields">
                            <li>
                                <label class="feature">¿Cuenta con ingresos regulares para su parque?</label>
                                <ul class="multi-list three-cols">
                                    <li><label><input type="radio" name="radio-group-8" /> Suficientes</label></li>
                                    <li><label><input type="radio" name="radio-group-8" /> Más o menos</label></li>
                                    <li><label><input type="radio" name="radio-group-8" /> Pocos</label></li>
                                    <li><label><input type="radio" name="radio-group-8" /> Muy pocos</label></li>
                                    <li><label><input type="radio" name="radio-group-8" /> Nada</label></li>
                                </ul>
                            </li>
                            <li>
                                <label class="feature">¿Es suficiente lo ingresado para operar bien?</label>
                                <ul class="multi-list three-cols">
                                    <li><label><input type="radio" name="radio-group-9" /> Sí</label></li>
                                    <li><label><input type="radio" name="radio-group-9" /> Más o menos</label></li>
                                    <li><label><input type="radio" name="radio-group-9" /> No</label></li>
                                </ul>
                            </li>
                        </ul>
                    </fieldset>
                    <fieldset>
                        <legend>Eventos</legend>
                        <ul class="form-fields">
                            <li>
                                <label class="feature">¿Realizan eventos con regularidad en el año?</label>
                                <ul class="multi-list four-cols">
                                    <li><label><input type="radio" name="radio-group-10" /> Suficientes</label></li>
                                    <li><label><input type="radio" name="radio-group-10" /> Varios</label></li>
                                    <li><label><input type="radio" name="radio-group-10" /> Pocos</label></li>
                                    <li><label><input type="radio" name="radio-group-10" /> Muy pocos</label></li>
                                    <li><label><input type="radio" name="radio-group-10" /> Casi ninguno</label></li>
                                    <li><label><input type="radio" name="radio-group-10" /> Ninguno</label></li>
                                </ul>
                            </li>
                            <li>
                                <label class="feature">¿Qué tipo de eventos han realizado? (puede elegir dos o más)</label>
                                <ul class="multi-list four-cols">
                                    <li><label><input type="checkbox" /> Culturales</label></li>
                                    <li><label><input type="checkbox" /> Recreativos</label></li>
                                    <li><label><input type="checkbox" /> Deportivos</label></li>
                                    <li><label><input type="checkbox" /> Ecológicos</label></li>
                                </ul>
                            </li>
                        </ul>
                    </fieldset>
                    <fieldset>
                        <legend>Áreas Verdes</legend>
                        <ul class="form-fields">
                            <li>
                                <label class="feature">¿Su parque cuenta con vegetación? (puede elegir dos o más)</label>
                                <ul class="multi-list four-cols">
                                    <li><label><input type="checkbox" /> Árboles grandes</label></li>
                                    <li><label><input type="checkbox" /> Árboles chicos</label></li>
                                    <li><label><input type="checkbox" /> Matas y arbustos</label></li>
                                    <li><label><input type="checkbox" /> Flores</label></li>
                                    <li><label><input type="checkbox" /> Frutos</label></li>
                                    <li><label><input type="checkbox" /> Pasto</label></li>
                                </ul>
                            </li>
                            <li>
                                <label class="feature">¿El área verde y vegetación son suficientes?</label>
                                <ul class="multi-list three-cols">
                                    <li><label><input type="radio" name="radio-group-11" /> Sí</label></li>
                                    <li><label><input type="radio" name="radio-group-11" /> Falta un poco más</label></li>
                                    <li><label><input type="radio" name="radio-group-11" /> Hay muy poco</label></li>
                                    <li><label><input type="radio" name="radio-group-11" /> Casi no hay nada</label></li>
                                    <li><label><input type="radio" name="radio-group-11" /> No hay nada</label></li>
                                </ul>
                            </li>
                            <li>
                                <label class="feature">¿Lo que existe está en buen estado?</label>
                                <ul class="multi-list four-cols">
                                    <li><label><input type="radio" name="radio-group-12" /> Sí</label></li>
                                    <li><label><input type="radio" name="radio-group-12" /> Más o menos</label></li>
                                    <li><label><input type="radio" name="radio-group-12" /> Mal</label></li>
                                    <li><label><input type="radio" name="radio-group-12" /> Pésimo</label></li>
                                </ul>
                            </li>
                            <li>
                                <label class="feature">¿Con qué frecuencia riega su vegetación?</label>
                                <ul class="multi-list three-cols">
                                    <li><label><input type="radio" name="radio-group-13" /> Constante</label></li>
                                    <li><label><input type="radio" name="radio-group-13" /> Ocasional</label></li>
                                    <li><label><input type="radio" name="radio-group-13" /> No se riega</label></li>
                                </ul>
                            </li>
                        </ul>
                    </fieldset>
                    <fieldset>
                        <legend>Afluencia</legend>
                        <ul class="form-fields">
                            <li>
                                <label class="feature">¿Va suficiente gente a su parque?</label>
                                <ul class="multi-list three-cols">
                                    <li><label><input type="radio" name="radio-group-14" /> Sí, mucha</label></li>
                                    <li><label><input type="radio" name="radio-group-14" /> Más o menos</label></li>
                                    <li><label><input type="radio" name="radio-group-14" /> Poca</label></li>
                                    <li><label><input type="radio" name="radio-group-14" /> Casi nada</label></li>
                                    <li><label><input type="radio" name="radio-group-14" /> Nada</label></li>
                                </ul>
                            </li>
                            <li>
                                <label class="feature">¿Va gente a su parque diario?</label>
                                <ul class="multi-list three-cols">
                                    <li><label><input type="radio" name="radio-group-15" /> Sí, bastante</label></li>
                                    <li><label><input type="radio" name="radio-group-15" /> Regular</label></li>
                                    <li><label><input type="radio" name="radio-group-15" /> Casi nadie</label></li>
                                </ul>
                            </li>
                            <li>
                                <label class="feature">¿Qué días va más gente?</label>
                                <ul class="multi-list three-cols">
                                    <li><label><input type="radio" name="radio-group-16" /> De lunes a viernes</label></li>
                                    <li><label><input type="radio" name="radio-group-16" /> Sábado</label></li>
                                    <li><label><input type="radio" name="radio-group-16" /> Domingo</label></li>
                                </ul>
                            </li>
                            <li>
                                <label class="feature">¿Se usa su parque de noche?</label>
                                <ul class="multi-list four-cols">
                                    <li><label><input type="radio" name="radio-group-17" /> Sí</label></li>
                                    <li><label><input type="radio" name="radio-group-17" /> A veces</label></li>
                                    <li><label><input type="radio" name="radio-group-17" /> Casi nada</label></li>
                                    <li><label><input type="radio" name="radio-group-17" /> Nada</label></li>
                                </ul>
                            </li>
                        </ul>
                    </fieldset>
                    <fieldset>
                        <legend>Orden</legend>
                        <ul class="form-fields">
                            <li>
                                <label class="feature">¿Su parque se mantiene limpio?</label>
                                <ul class="multi-list four-cols">
                                    <li><label><input type="radio" name="radio-group-18" /> Sí</label></li>
                                    <li><label><input type="radio" name="radio-group-18" /> Regularmente</label></li>
                                    <li><label><input type="radio" name="radio-group-18" /> Casi nada</label></li>
                                    <li><label><input type="radio" name="radio-group-18" /> No</label></li>
                                </ul>
                            </li>
                            <li>
                                <label class="feature">¿Se respetan y cuidan las instalaciones de su parque?</label>
                                <ul class="multi-list four-cols">
                                    <li><label><input type="radio" name="radio-group-19" /> Sí</label></li>
                                    <li><label><input type="radio" name="radio-group-19" /> Regularmente</label></li>
                                    <li><label><input type="radio" name="radio-group-19" /> Poco</label></li>
                                    <li><label><input type="radio" name="radio-group-19" /> No</label></li>
                                </ul>
                            </li>
                        </ul>
                    </fieldset>
                    <input type="submit" name="submit" value="Enviar">
                    <label>
                        <span>*</span>
                        Campos Obligatorios
                    </label>
                </form>
            </div>
        </div>
    </div>
    <!-- //MAIN CONTENT// -->


<?php get_footer(); ?>
