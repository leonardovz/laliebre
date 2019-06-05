<?php include_once ('administrador/templates/header.php');?>


<?php include_once ('administrador/templates/header.view.php');?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Configuración de mi perfil
            <!-- <small>Preview</small> -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Cuenta</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12"><br><br>
                <form id="formRegistroUser" class="form-horizontal" action="<?php echo $ruta;?>php/usuario.php" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="correo" class="col-sm-2 control-label">Correo</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="correo" id="correo" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono" class="col-sm-2 control-label">Telefono</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="telefono" id="telefono" data-inputmask='"mask": "(999) 999-9999"' placeholder="(___) ___-____" data-mask>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="inNombre" id="inNombre" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inApellidos" class="col-sm-2 control-label">Apellidos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="inApellidos" id="inApellidos" placeholder="Apellidos">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="errores"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Guardar Cambios</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <div class="col-md-12"><br><br>
            <h4 style="margin-left:7%; ">Mi dirección</h4>
                <form id="formRegistroUser" class="form-horizontal" action="<?php echo $ruta;?>php/usuario.php" method="POST">
                    <div class="box-body">
                    <div class="form-group">
                            <label for="inRangoUser" class="col-sm-2 control-label">Localidad</label>
                            <div class="col-md-10">
                                <select  name ="inRangoUser" id="inRangoUser" class="form-control select2" style="width:100%;">
                                    <option value="1">Alto del Mulato </option>
                                    <option value="2">Apozolco </option>
                                    <option value="3">Bajío de los Charcos </option>
                                    <option value="4">Barrio Bajo </option>
                                    <option value="5">Barrio de Reyes </option>
                                    <option value="6">Cañada de Gómez </option>
                                    <option value="7">Capellanía </option>
                                    <option value="8">Casas Pintas </option>
                                    <option value="9">Cerca Blanca (Los Camachos) </option>
                                    <option value="10">Cerro Blanco de Fátima </option>
                                    <option value="11">Cerro Blanco de las Casillas </option>
                                    <option value="12">Cerro Colorado </option>
                                    <option value="13">Cerro Colorado </option>
                                    <option value="14">Cerro de la Cruz </option>
                                    <option value="15">Cerro de Tamara </option>
                                    <option value="16">Chilarillos </option>
                                    <option value="17">Coca (La Asunción) </option>
                                    <option value="18">Contreras </option>
                                    <option value="19">El �?valo </option>
                                    <option value="20">El Alto de San Joaquín </option>
                                    <option value="21">El Alto de Tetillas </option>
                                    <option value="22">El Amargoso (Mayoral de Abajo) </option>
                                    <option value="23">El Amarradero </option>
                                    <option value="24">El Águila </option>
                                    <option value="25">El Bajío </option>
                                    <option value="26">El Bajío </option>
                                    <option value="27">El Bajío </option>
                                    <option value="28">El Bordo </option>
                                    <option value="29">El Bueyero </option>
                                    <option value="30">El Capiro </option>
                                    <option value="31">El Capulín </option>
                                    <option value="32">El Chubasco </option>
                                    <option value="33">El Collame </option>
                                    <option value="34">El Crucero </option>
                                    <option value="35">El Durazno </option>
                                    <option value="36">El Epazote de Abajo </option>
                                    <option value="37">El Gato </option>
                                    <option value="38">El Huizachal (El Crucero) </option>
                                    <option value="39">El Mayoral de Abajo </option>
                                    <option value="40">El Mayoral de Arriba </option>
                                    <option value="41">El Molino (Asunción) </option>
                                    <option value="42">El Pato </option>
                                    <option value="43">El Peñón </option>
                                    <option value="44">El Pedregal </option>
                                    <option value="45">El Pedregal (El Pedregoso) </option>
                                    <option value="46">El Pesebre </option>
                                    <option value="47">El Potrero </option>
                                    <option value="48">El Prieto </option>
                                    <option value="49">El Raicero </option>
                                    <option value="50">El Ranchito </option>
                                    <option value="51">El Rialengo </option>
                                    <option value="52">El Rincón de la Laja </option>
                                    <option value="53">El Ruanate </option>
                                    <option value="54">El Sabino </option>
                                    <option value="55">El Salto </option>
                                    <option value="56">El Salto Verde </option>
                                    <option value="57">El Santo </option>
                                    <option value="58">El Soyate </option>
                                    <option value="59">El Taciroque </option>
                                    <option value="60">El Tepozán </option>
                                    <option value="61">El Toreo </option>
                                    <option value="62">El Zermeño </option>
                                    <option value="63">Epazote </option>
                                    <option value="64">Fraccionamiento Solidaridad </option>
                                    <option value="65">Granja de Tierras Blancas </option>
                                    <option value="66">Granja Piloto </option>
                                    <option value="67">Granja Santa Isabel </option>
                                    <option value="68">Guzmán </option>
                                    <option value="69">Jabalí </option>
                                    <option value="70">Jalostotitlán </option>
                                    <option value="71">Jerusalén </option>
                                    <option value="72">Juntas de los Ríos </option>
                                    <option value="73">La Barranca </option>
                                    <option value="74">La Besana </option>
                                    <option value="75">La Campanita </option>
                                    <option value="76">La Cantera </option>
                                    <option value="77">La Ciénega </option>
                                    <option value="78">La Cofradía </option>
                                    <option value="79">La Cuerva </option>
                                    <option value="80">La Culebra </option>
                                    <option value="81">La Culebra (El Taray) </option>
                                    <option value="82">La Culebra Uno </option>
                                    <option value="83">La Curva del Muerto </option>
                                    <option value="84">La Estancia de Abajo </option>
                                    <option value="85">La Estancia de Arriba </option>
                                    <option value="86">La Estanzuela </option>
                                    <option value="87">La Granja (Agua Escondida) </option>
                                    <option value="88">La Huerta de Arriba </option>
                                    <option value="89">La Labor </option>
                                    <option value="90">La Labor de San Antonio </option>
                                    <option value="91">La Laguna </option>
                                    <option value="92">La Laja </option>
                                    <option value="93">La Loma (La Escondida) </option>
                                    <option value="94">La Loma de los Gabrieles </option>
                                    <option value="95">La Maleta (Loma del Caporal) </option>
                                    <option value="96">La Maroma </option>
                                    <option value="97">La Mesita </option>
                                    <option value="98">La Mora </option>
                                    <option value="99">La Mora de Arriba </option>
                                    <option value="100">La Noragua </option>
                                    <option value="101">La Noria </option>
                                    <option value="102">La Palma (Los Mapaches) </option>
                                    <option value="103">La Parada </option>
                                    <option value="104">La Presa </option>
                                    <option value="105">La Presa </option>
                                    <option value="106">La Presa </option>
                                    <option value="107">La Provi </option>
                                    <option value="108">La Providencia </option>
                                    <option value="109">La Puerta del Granjeno </option>
                                    <option value="110">La Rinconada </option>
                                    <option value="111">La Selva </option>
                                    <option value="112">La Soledad </option>
                                    <option value="113">La Troje </option>
                                    <option value="114">Labor de Abalsa </option>
                                    <option value="115">Labor de Jiménez </option>
                                    <option value="116">Laguna del Oriente </option>
                                    <option value="117">Laja de Arriba </option>
                                    <option value="118">Las Cañadas (Cañadas de Delgadillo) </option>
                                    <option value="119">Las Golondrinas </option>
                                    <option value="120">Las Huertas de Abajo </option>
                                    <option value="121">Las Irlas </option>
                                    <option value="122">Las Lomas de San Martín </option>
                                    <option value="123">Las Maravillas </option>
                                    <option value="124">Las Palmas </option>
                                    <option value="125">Las Palomas </option>
                                    <option value="126">Las Presitas </option>
                                    <option value="127">Las Tablas </option>
                                    <option value="128">Las Tinajas </option>
                                    <option value="129">Las Tortugas </option>
                                    <option value="130">Las Trojitas </option>
                                    <option value="131">Loma de Alba </option>
                                    <option value="132">Loma de Camarena </option>
                                    <option value="133">Loma de San Antonio </option>
                                    <option value="134">Loma del Caporal </option>
                                    <option value="135">Loma Linda (Lomas de Camarena) </option>
                                    <option value="136">Loma Quemada </option>
                                    <option value="137">Lomas Altas </option>
                                    <option value="138">Los Acahuales </option>
                                    <option value="139">Los Azúchiles </option>
                                    <option value="140">Los Caños </option>
                                    <option value="141">Los Camacho </option>
                                    <option value="142">Los Coyotes </option>
                                    <option value="143">Los Cuervitos </option>
                                    <option value="144">Los Filtros </option>
                                    <option value="145">Los Ladinos </option>
                                    <option value="146">Los Mezquitillos </option>
                                    <option value="147">Los Planes </option>
                                    <option value="148">Los Portales de Abajo </option>
                                    <option value="149">Los Portales de Arriba </option>
                                    <option value="150">Los Ranchos </option>
                                    <option value="151">Los Sauces </option>
                                    <option value="152">Los Sauces </option>
                                    <option value="153">Los Tepetates </option>
                                    <option value="154">Maíz Amarillo </option>
                                    <option value="155">Mesa de Golondrinas </option>
                                    <option value="156">Mesa de la Parada </option>
                                    <option value="157">Mesa de los Mercado </option>
                                    <option value="158">Mesa de Teocaltitán </option>
                                    <option value="159">Mitic (Miti) </option>
                                    <option value="160">Monte Largo (La Laguna) </option>
                                    <option value="161">Noragua </option>
                                    <option value="162">Ojo de Agua </option>
                                    <option value="163">Paso de Carretas </option>
                                    <option value="164">Paso de la Laja </option>
                                    <option value="165">Potrerillos </option>
                                    <option value="166">Pozo de la Asunción </option>
                                    <option value="167">Presa de Ramírez </option>
                                    <option value="168">Providencia del Norte (La Providencia) </option>
                                    <option value="169">Rancho el Compa </option>
                                    <option value="170">Rancho el Pedregal </option>
                                    <option value="171">Rancho Viejo </option>
                                    <option value="172">Sabino de Arriba </option>
                                    <option value="173">Salida a Tierras Blancas </option>
                                    <option value="174">San Francisco </option>
                                    <option value="175">San Gaspar de los Reyes (San Gaspar) </option>
                                    <option value="176">San Isidro </option>
                                    <option value="177">San Nicolás de las Flores (San Nicolás) </option>
                                    <option value="178">San Pablo </option>
                                    <option value="179">San Pedro </option>
                                    <option value="180">San Rafael </option>
                                    <option value="181">San Rafael </option>
                                    <option value="182">Santa Ana de Guadalupe </option>
                                    <option value="183">Santa Elena </option>
                                    <option value="184">Santa Isabel </option>
                                    <option value="185">Santa María de la O </option>
                                    <option value="186">Santa Martha (Los Caños) </option>
                                    <option value="187">Santa Rita de los Pozos (Santa Rita) </option>
                                    <option value="188">Santa Rosa </option>
                                    <option value="189">Santo Domingo (La Coma) </option>
                                    <option value="190">Teocaltitán de Guadalupe (Teocaltitán) </option>
                                    <option value="191">Tierras Blancas </option>
                                    <option value="192">Troje de Carrillo </option>
                                    <option value="193">Vallarta (El Halcón) </option>
                                    <option value="194">Ventanillas </option>
                                    <option value="195">Zacatecas </option>

                                </select>
                            </div>
                        
                        </div>
                        <div class="form-group">
                            <label for="inDireccion" class="col-sm-2 control-label">Direccion</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="inDireccion" id="inDireccion" placeholder="Dirección">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="errores"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Guardar Cambios</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <div class="col-md-12 ">
                <h4 style="margin-left:7%; ">Cambiar Contraseña</h4>
                <form id="formRegistroUser" class="form-horizontal" action="<?php echo $ruta;?>php/usuario.php" method="POST">
                    
                        <div class="form-group">
                            <label for="inPassword" class="col-sm-2 control-label">Contraseña</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="inPassword" id="inPassword" placeholder="Contraseña">
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <div id="pswd_info">
                                    <h4>La contraseña debería cumplir con los siguientes requerimientos:</h4>
                                    <ul>
                                        <li id="letter">Al menos debería tener <strong class="text-danger">una letra</strong></li>
                                        <li id="capital">Al menos debería tener <strong class="text-danger">una letra en mayúsculas</strong></li>
                                        <li id="number">Al menos debería tener <strong class="text-danger">un número</strong></li>
                                        <li id="length">Debería tener <strong class="text-danger">8 carácteres</strong>
                                            como mínimo</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inPasswordR" class="col-sm-3 control-label">Repite la contraseña</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="inPasswordR" id="inPasswordR" placeholder="Contraseña">
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <div id="pswdR_info" class="text-danger">
                                    <h4>Las Contraseñas no coinciden</h4>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div id=""></div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="errores"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn bg-green pull-right">Guardar Cambios</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            
            
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<!-- <footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
</footer> -->


</div>

<?php include_once('administrador/templates/footer.php');?>

<script src="<?php echo $ruta;?>/js/recursos/usuario.js"></script>
<script>
$(document).ready(function() {
    $('.select2').select2()
    //Money Euro
    $('[data-mask]').inputmask()
});
</script>
</body>

</html>