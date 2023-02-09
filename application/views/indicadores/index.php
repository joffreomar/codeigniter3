<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" ></script>
<?php
//aplicar
$ci=&get_instance();//instancia
$ci->load->model("usuario");
$ci->load->model("cliente");
$ci->load->model("cuenta");
$ci->load->model("lectura");

$totalUsuariosActivos=0;
$totalUsuariosInactivos=0;
$totalUsuarios=0;

$totalClientesActivos=0;
$totalClientesInactivos=0;
$totalClientes=0;

$totalCuentasActivos=0;
$totalCuentasInactivos=0;
$totalCuentas=0;

$totalLecturasActivos=0;
$totalLecturasInactivos=0;
$totalLecturas=0;

$lecturasActivos=$ci->lectura->obtenerLecturasPorEstado("COMPLETADO");
$lecturasInactivos=$ci->lectura->obtenerLecturasPorEstado("PENDIENTE");
if ($lecturasActivos) {
  $totalLecturasActivos=sizeof($lecturasActivos->result());
}
if ($lecturasInactivos) {
  $totalLecturasInactivos=sizeof($lecturasInactivos->result());
}
$totalLecturas=$totalLecturasActivos+$totalLecturasInactivos;


$clientesActivos=$ci->cliente->obtenerClientesPorEstado("ACTIVO");
$clientesInactivos=$ci->cliente->obtenerClientesPorEstado("INACTIVO");
if ($clientesActivos) {
  $totalClientesActivos=sizeof($clientesActivos->result());
}
if ($clientesInactivos) {
  $totalClientesInactivos=sizeof($clientesInactivos->result());
}
$totalClientes=$totalClientesActivos+$totalClientesInactivos;


$cuentasActivos=$ci->cuenta->obtenerCuentasPorEstado("ACTIVA");
$cuentasInactivos=$ci->cuenta->obtenerCuentasPorEstado("INACTIVA");
if ($cuentasActivos) {
  $totalCuentasActivos=sizeof($cuentasActivos->result());
}
if ($cuentasInactivos) {
  $totalCuentasInactivos=sizeof($cuentasInactivos->result());
}
$totalCuentas=$totalCuentasActivos+$totalCuentasInactivos;


$usuariosActivos=$ci->usuario->obtenerUsuariosPorEstado("1");
$usuariosInactivos=$ci->usuario->obtenerUsuariosPorEstado("0");
if ($usuariosActivos) {
  $totalUsuariosActivos=sizeof($usuariosActivos->result());
}
if ($usuariosInactivos) {
  $totalUsuariosInactivos=sizeof($usuariosInactivos->result());
}
$totalUsuarios=$totalUsuariosActivos+$totalUsuariosInactivos;

?>



 <!-- Sale & Revenue Start -->
            <div class="modal fade" id="modal_usuarios" tabindex="-1" aria-labelledby="modal_usuariosLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modal_usuariosLabel">Usuarios</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="carga_usuarios">
                            
                        </div>
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                </div>
            </div>

             <div class="container-fluid pt-4 px-4">
               <div class="d-flex align-items-center justify-content-between mb-4">
                   <h5 class="mb-0">Bienvenido a nuestro Sistema</h5>
               </div>
                 <div class="row g-3">
                     <div class="col-sm-6 col-xl-3">
                         <div class="bg-light rounded d-flex align-items-center justify-content-between p-4" type="button" onclick="javascript:abrir_modal()">
                             <i class="fa fa-users fa-3x text-primary"></i>
                             <div class="ms-3">
                                 <p class="mb-2">Usuarios</p>
                                 <h6 class="mb-0"><?php echo $totalUsuarios ?></h6>
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-6 col-xl-3">
                         <div class="bg-light rounded d-flex align-items-center justify-content-between p-4" >
                             <i class="fa fa-users fa-3x text-primary"></i>
                             <div class="ms-3">
                                 <p class="mb-2">Clientes</p>
                                 <h6 class="mb-0"><?php echo $totalClientes ?></h6>
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-6 col-xl-3">
                         <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                             <i class="fa fa-users fa-3x text-primary"></i>
                             <div class="ms-3">
                                 <p class="mb-2">Medidores</p>
                                 <h6 class="mb-0"><?php echo $totalCuentas ?></h6>
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-6 col-xl-3">
                         <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                             <i class="fa fa-users fa-3x text-primary"></i>
                             <div class="ms-3">
                                 <p class="mb-2">Lecturas</p>
                                 <h6 class="mb-0"><?php echo $totalLecturas ?></h6>
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-6 col-xl-3">
                         <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                             <i class="fa fa-users fa-3x text-primary"></i>
                             <div class="ms-3">
                                 <p class="mb-2">Lecturas Normal</p>
                                 <h6 class="mb-0"><?php echo $totalLecturasActivos ?></h6>
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-6 col-xl-3">
                         <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                             <i class="fa fa-users fa-3x text-primary"></i>
                             <div class="ms-3">
                                 <p class="mb-2">Lecturas Pendientes</p>
                                 <h6 class="mb-0"><?php echo $totalLecturasInactivos ?></h6>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <?php
             $con = new mysqli("localhost","root","","epapap"); // Conectar a la BD
             $sql = "SELECT COUNT(id_usuario) AS total, estado_usuario FROM usuario
                     GROUP BY estado_usuario HAVING COUNT(id_usuario)"; // Consulta SQL
             $query = $con->query($sql); // Ejecutar la consulta SQL
             $data1 = array(); // Array donde vamos a guardar los datos
             while($r = $query->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
                 $data1[]=$r; // Guardar los resultados en la variable $data
             }
             ?>

             <?php
             $con = new mysqli("localhost","root","","epapap"); // Conectar a la BD
             //$id = $_POST["Cotopaxi(Tanicuchi)"];
             $sql1 = "SELECT COUNT(id_cliente) AS total, estado_cliente FROM cliente
                     GROUP BY estado_cliente HAVING COUNT(id_cliente)"; // Consulta SQL
             $query1 = $con->query($sql1); // Ejecutar la consulta SQL
             $data = array(); // Array donde vamos a guardar los datos
             while($r1 = $query1->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
                 $data2[]=$r1; // Guardar los resultados en la variable $data
             }
             ?>

             <?php
             $con = new mysqli("localhost","root","","epapap"); // Conectar a la BD
             //$id = $_POST["Cotopaxi(Tanicuchi)"];
             $sql2 = "SELECT COUNT(id_cuenta) AS total, estado_cuenta FROM cuenta
                     GROUP BY estado_cuenta HAVING COUNT(id_cuenta)"; // Consulta SQL
             $query2 = $con->query($sql2); // Ejecutar la consulta SQL
             $data = array(); // Array donde vamos a guardar los datos
             while($r2 = $query2->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
                 $data3[]=$r2; // Guardar los resultados en la variable $data
             }
             ?>

             <?php
             $con = new mysqli("localhost","root","","epapap"); // Conectar a la BD
             //$id = $_POST["Cotopaxi(Tanicuchi)"];
             $sql3 = "SELECT COUNT(id_lectura) AS total, estado_lectura FROM lectura
                     GROUP BY estado_lectura HAVING COUNT(id_lectura)"; // Consulta SQL
             $query3 = $con->query($sql3); // Ejecutar la consulta SQL
             $data = array(); // Array donde vamos a guardar los datos
             while($r3 = $query3->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
                 $data4[]=$r3; // Guardar los resultados en la variable $data
             }
             ?>
             <?php
              $con = new mysqli("localhost","root","","epapap"); // Conectar a la BD
              //$id = $_POST["Cotopaxi(Tanicuchi)"];
              $sql4 = "SELECT count(encargado_lectura) as total ,encargado_lectura from lectura
              group by encargado_lectura HAVING count(encargado_lectura)"; // Consulta SQL
              $query4 = $con->query($sql4); // Ejecutar la consulta SQL
              $data = array(); // Array donde vamos a guardar los datos
              while($r4 = $query4->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
              $data5[]=$r4; // Guardar los resultados en la variable $data
              }
              ?>




             <!-- Sale & Revenue End -->
             <!-- Chart Start -->
             <div class="container-fluid pt-4 px-4">
                 <div class="row g-4">
                     <div class="col-sm-12 col-xl-6">
                         <div class="bg-light rounded h-100 p-4">
                             <h6 class="mb-4">Usuario por estado</h6>
                             <canvas id="chart1"></canvas>
                             <script>
                             var ctx1 = document.getElementById("chart1");
                             var data1 = {
                                     labels: [
                                     <?php foreach($data1 as $d):?>
                                     "<?php echo $d->estado_usuario?>",
                                     <?php endforeach; ?>
                                     ],
                                     datasets: [{
                                         label: 'Usuarios',
                                         data: [
                                         <?php foreach($data1 as $d):?>
                                         <?php echo $d->total;?>,
                                         <?php endforeach; ?>
                                         ],
                                         backgroundColor:[
                                           'rgb(255, 99, 132)',
                                           'rgb(54, 162, 235)',
                                           'rgb(255, 205, 86)'
                                         ],
                                         hoverOffset: 1
                                     }]
                                 };
                             var chart1 = new Chart(ctx1, {
                                 type: 'doughnut', /* valores: line, bar*/
                                 data: data1
                             });
                             </script>
                         </div>
                     </div>
                     <div class="col-sm-12 col-xl-6">
                         <div class="bg-light rounded h-100 p-4">
                             <h6 class="mb-4">Clientes por estado</h6>
                             <canvas id="chart2"></canvas>
                             <script>
                             var ctx2 = document.getElementById("chart2");
                             var data2 = {
                                     labels: [
                                     <?php foreach($data2 as $d):?>
                                     "<?php echo $d->estado_cliente?>",
                                     <?php endforeach; ?>
                                     ],
                                     datasets: [{
                                         label: 'CLIENTES',
                                         data: [
                                     <?php foreach($data2 as $d):?>
                                     <?php echo $d->total;?>,
                                     <?php endforeach; ?>
                                         ],
                                         backgroundColor:[
                                           'rgb(54, 162, 235)',
                                           'rgb(255, 99, 132)',
                                           'rgb(255, 205, 86)'
                                         ],
                                         hoverOffset: 1
                                     }]
                                 };
                             var chart2 = new Chart(ctx2, {
                                 type: 'doughnut', /* valores: line, bar*/
                                 data: data2
                             });
                             </script>
                         </div>
                     </div>
                     <div class="col-sm-12 col-xl-6">
                         <div class="bg-light rounded h-100 p-4">
                             <h6 class="mb-4">Cuentas por estado</h6>
                             <canvas id="chart3"></canvas>
                             <script>
                             var ctx3 = document.getElementById("chart3");
                             var data3 = {
                                     labels: [
                                     <?php foreach($data3 as $d):?>
                                     "<?php echo $d->estado_cuenta?>",
                                     <?php endforeach; ?>
                                     ],
                                     datasets: [{
                                         label: 'CUENTAS',
                                         data: [
                                     <?php foreach($data3 as $d):?>
                                     <?php echo $d->total;?>,
                                     <?php endforeach; ?>
                                         ],
                                         backgroundColor:[
                                           'rgb(255, 205, 86)',
                                           'rgb(54, 162, 235)',
                                           'rgb(255, 99, 132)'
                                         ],
                                         hoverOffset: 1
                                     }]
                                 };
                             var chart3 = new Chart(ctx3, {
                                 type: 'doughnut', /* valores: line, bar*/
                                 data: data3
                             });
                             </script>
                         </div>
                     </div>
                     <div class="col-sm-12 col-xl-6">
                         <div class="bg-light rounded h-100 p-4">
                             <h6 class="mb-4">Lecturas por estado</h6>
                             <canvas id="chart4"></canvas>
                             <script>
                             var ctx4 = document.getElementById("chart4");
                             var data4 = {
                                     labels: [
                                     <?php foreach($data4 as $d):?>
                                     "<?php echo $d->estado_lectura?>",
                                     <?php endforeach; ?>
                                     ],
                                     datasets: [{
                                         label: 'LECTURAS',
                                         data: [
                                     <?php foreach($data4 as $d):?>
                                     <?php echo $d->total;?>,
                                     <?php endforeach; ?>
                                         ],
                                         backgroundColor:[
                                           'rgb(255, 99, 132)',
                                           'rgb(54, 162, 235)',
                                           'rgb(255, 205, 86)'
                                         ],
                                         hoverOffset: 1
                                     }]
                                 };
                             var chart3 = new Chart(ctx4, {
                                 type: 'doughnut', /* valores: line, bar*/
                                 data: data4
                             });
                             </script>
                         </div>
                     </div>
                     <div class="col-sm-12 col-xl-6">
                         <div class="bg-light rounded h-100 p-4">
                             <h6 class="mb-4">Lecturas por fechas</h6>
                             <canvas id="chart5"></canvas>
                                                          <script>
                             var ctx5 = document.getElementById("chart5");
                             var data5 = {
                                     labels: [
                                     <?php foreach($data5 as $d):?>
                                     "<?php echo $d->encargado_lectura?>",
                                     <?php endforeach; ?>
                                     ],
                                     datasets: [{
                                         label: 'LECTURAS',
                                         data: [
                                     <?php foreach($data5 as $d):?>
                                     <?php echo $d->total;?>,
                                     <?php endforeach; ?>
                                         ],
                                         backgroundColor:[
                                           'rgb(255, 99, 132)',
                                           'rgb(54, 162, 235)',
                                           'rgb(255, 205, 86)'
                                         ],
                                         hoverOffset: 1
                                     }]
                                 };
                             var chart4 = new Chart(ctx5, {
                                 type: 'doughnut', /* valores: line, bar*/
                                 data: data5
                             });
                             </script>
                         </div>
                     </div>
                     <div class="col-sm-12 col-xl-6">
                         <div class="bg-light rounded h-100 p-4">
                             <h6 class="mb-4">Tipo de cuentas</h6>
                             <canvas id="doughnut-chart"></canvas>
                         </div>
                     </div>
                 </div>
             </div>

             <script>
                function abrir_modal() {
                    $("#modal_usuarios").modal("show");
                    $.ajax({
                        url:"<?= base_url("index.php/indicadores/usuarios") ?>",
                        success:function(data){
                            $("#carga_usuarios").html(data)
                        }
                    });
                }
             </script>
            <!--  Chart End -->
