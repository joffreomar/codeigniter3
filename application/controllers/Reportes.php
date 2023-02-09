<?php
class Reportes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("cliente");
        $this->load->model("cuenta");
        $this->load->model("lectura");
        $this->load->library("Pdf");
        $this->load->library('excel');
        $this->load->helper('url');
        //validando si alguien esta conectado
        if ($this->session->userdata("c0nectadoUTC")) {
            // si esta conectado
        } else {
            redirect("seguridades/formularioLogin");
        }
    }
    public function index()
    {
        $data["listadoCuentas"] = $this->cuenta->consultarTodos();
        $this->load->view("administrador/header");
        $this->load->view("reportes/reportes", $data);
        $this->load->view("administrador/footer");
    }
    public function reporteclientes($estado_cliente="", $posee_cuenta="", $tipo_reporte="")
    {
        if ($tipo_reporte=="excel") {
            redirect("/reportes/reporteclientesexcel/$estado_cliente/$posee_cuenta");
            exit(0);
        }
        $html= "<style>";
        $html.= "body {";
            $html .= "font-family: 'Heebo',sans-serif;";
            $html.= "font-weight: 400;";
            $html.= "color: #757575;";
        $html.= "}";
        $html.= "table {";
            $html.= "font-family: 'Heebo',sans-serif;";
            $html.= "font-size:9px;";
            $html.= "font-weight: 400;";
            $html.= "color: #757575;";
        $html.= "}";
        $html.= "table, th, td {";
            $html.= "border-bottom: 1px solid #757575;";
            $html.= "border-collapse: collapse;";
        $html.= "}";
        $html.= "</style>";
        $html.='<div>';
            $html.='<h4>';
                $html.='REPORTE DE CLIENTES';
            $html.='</h4>';
            $html.='<table width="100%" ';
                $html .= '<thead>';
                    $html.='<tr >';
                        $html.='<th>';
                            $html.='ID';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='NOMBRES';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='APELLIDOS';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='CEDULA';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='TELEFONO';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='CORREO';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='ESTADO';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='FECHA INGRESO';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='FECHA ACTUALIZACION';
                        $html.='</th>';
                    $html.='</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $data = $this->cliente->consultarTodosConCuentas($estado_cliente);
                if (is_countable($data) && count($data) > 0) {
                    if ($posee_cuenta != "todos") {
                        foreach ($data as $d) {
                            if ($posee_cuenta == "Si") {
                                if (isset($d->numero_cuenta)) {
                                    $html .= '<tr>';
                                        $html .= '<td>';
                                            $html .= $d->id_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->nombre_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->apellido_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->cedula_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->telefono_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->correo_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->estado_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->fecha_ingreso_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->fecha_actualizacion_cliente;
                                        $html .= '</td>';
                                    $html .= '</tr>';
                                }

                            } else {
                                if (!isset($d->numero_cuenta)) {
                                    $html .= '<tr>';
                                        $html .= '<td>';
                                            $html .= $d->id_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->nombre_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->apellido_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->cedula_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->telefono_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->correo_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->estado_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->fecha_ingreso_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->fecha_actualizacion_cliente;
                                        $html .= '</td>';
                                    $html .= '</tr>';
                                }
                            }

                        }
                    } else {
                        foreach ($data as $d) {
                            $html .= '<tr>';
                                        $html .= '<td>';
                                            $html .= $d->id_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->nombre_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->apellido_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->cedula_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->telefono_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->correo_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->estado_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->fecha_ingreso_cliente;
                                        $html .= '</td>';
                                        $html .= '<td>';
                                            $html .= $d->fecha_actualizacion_cliente;
                                        $html .= '</td>';
                                    $html .= '</tr>';
                        }
                    }
                }
                $html .= '</tbody>';
            $html.='</table>';
            
        $html.='</div>';
		$filename = "Reporte en PDF";
		$this->generarpdf($html,$filename);
    }
    public function generarpdf($html,$filename){
		$this->pdf->generate($html, $filename, true, 'A4', 'portrait');
	}
    public function reporteclientesexcel($estado_cliente="", $posee_cuenta=""){
        $data = $this->cliente->consultarTodosConCuentas($estado_cliente);
		if (is_countable($data) && count($data) > 0) {
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('facturas emititdas');
			$contador = 1;
			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
			$this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->setCellValue("A{$contador}", '');
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", '');
			$this->excel->getActiveSheet()->setCellValue("C{$contador}", 'REPORTE DE CLIENTES');
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", '');
			$this->excel->getActiveSheet()->setCellValue("E{$contador}", '');
			$this->excel->getActiveSheet()->setCellValue("F{$contador}", '');
			$contador++;
			$this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);

			$this->excel->getActiveSheet()->setCellValue("A{$contador}", 'ID');
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", 'NOMBRES');
			$this->excel->getActiveSheet()->setCellValue("C{$contador}", 'APELLIDOS');
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", 'CEDULA');
			$this->excel->getActiveSheet()->setCellValue("E{$contador}", 'TELEFONO');
			$this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CORREO');
			$this->excel->getActiveSheet()->setCellValue("G{$contador}", 'ESTADO');
			$this->excel->getActiveSheet()->setCellValue("H{$contador}", 'FECHA INGRESO');
			$this->excel->getActiveSheet()->setCellValue("I{$contador}", 'FECHA ACTUALIZACION');
			//Definimos la data del cuerpo. 
            $contador++;
            if($posee_cuenta!="todos"){
                foreach ($data as $d) {
                    if($posee_cuenta=="Si"){
                        if(isset($d->numero_cuenta)){
                            $this->excel->getActiveSheet()->getStyle("D{$contador}")->getNumberFormat()->setFormatCode('#0');
                            $this->excel->getActiveSheet()->setCellValue("A{$contador}", $d->id_cliente);
                            $this->excel->getActiveSheet()->setCellValue("B{$contador}", $d->nombre_cliente);
                            $this->excel->getActiveSheet()->setCellValue("C{$contador}", $d->apellido_cliente);
                            $this->excel->getActiveSheet()->setCellValue("D{$contador}", $d->cedula_cliente);
                            $this->excel->getActiveSheet()->setCellValue("E{$contador}", $d->telefono_cliente);
                            $this->excel->getActiveSheet()->setCellValue("F{$contador}", $d->correo_cliente);
                            $this->excel->getActiveSheet()->setCellValue("G{$contador}", $d->estado_cliente);
                            $this->excel->getActiveSheet()->setCellValue("H{$contador}", $d->fecha_ingreso_cliente);
                            $this->excel->getActiveSheet()->setCellValue("I{$contador}", $d->fecha_actualizacion_cliente);
                            $contador++;
                        }
                        
                    }else{
                        if (!isset($d->numero_cuenta)) {
                            $this->excel->getActiveSheet()->getStyle("D{$contador}")->getNumberFormat()->setFormatCode('#0');
                            $this->excel->getActiveSheet()->setCellValue("A{$contador}", $d->id_cliente);
                            $this->excel->getActiveSheet()->setCellValue("B{$contador}", $d->nombre_cliente);
                            $this->excel->getActiveSheet()->setCellValue("C{$contador}", $d->apellido_cliente);
                            $this->excel->getActiveSheet()->setCellValue("D{$contador}", $d->cedula_cliente);
                            $this->excel->getActiveSheet()->setCellValue("E{$contador}", $d->telefono_cliente);
                            $this->excel->getActiveSheet()->setCellValue("F{$contador}", $d->correo_cliente);
                            $this->excel->getActiveSheet()->setCellValue("G{$contador}", $d->estado_cliente);
                            $this->excel->getActiveSheet()->setCellValue("H{$contador}", $d->fecha_ingreso_cliente);
                            $this->excel->getActiveSheet()->setCellValue("I{$contador}", $d->fecha_actualizacion_cliente);
                            $contador++;
                        }
                    }
                    
                }
            }else{
                foreach ($data as $d) {
                    $this->excel->getActiveSheet()->getStyle("D{$contador}")->getNumberFormat()->setFormatCode('#0');
                    $this->excel->getActiveSheet()->setCellValue("A{$contador}", $d->id_cliente);
                    $this->excel->getActiveSheet()->setCellValue("B{$contador}", $d->nombre_cliente);
                    $this->excel->getActiveSheet()->setCellValue("C{$contador}", $d->apellido_cliente);
                    $this->excel->getActiveSheet()->setCellValue("D{$contador}", $d->cedula_cliente);
                    $this->excel->getActiveSheet()->setCellValue("E{$contador}", $d->telefono_cliente);
                    $this->excel->getActiveSheet()->setCellValue("F{$contador}", $d->correo_cliente);
                    $this->excel->getActiveSheet()->setCellValue("G{$contador}", $d->estado_cliente);
                    $this->excel->getActiveSheet()->setCellValue("H{$contador}", $d->fecha_ingreso_cliente);
                    $this->excel->getActiveSheet()->setCellValue("I{$contador}", $d->fecha_actualizacion_cliente);
                    $contador++;
                }
            }
			
			$fecha = date("H:i:s");
			$fecha = md5($fecha);
			$archivo = "REPORTE_DE_CLIENTES_{$fecha}.xls";
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
			$objWriter->save($_SERVER['DOCUMENT_ROOT'] ."/epapap/reportes/" . $archivo . "");
            redirect("../reportes/$archivo");
		} else {
			echo 'No se han encontrado registros';
			exit;
		}
    }
    public function reportecuentas($estado_cuenta="",  $tipo_reporte="")
    {
        if ($tipo_reporte=="excel") {
            redirect("/reportes/reportecuentasexcel/$estado_cuenta");
            exit(0);
        }
        $html= "<style>";
        $html.= "body {";
            $html .= "font-family: 'Heebo',sans-serif;";
            $html.= "font-weight: 400;";
            $html.= "color: #757575;";
        $html.= "}";
        $html.= "table {";
            $html.= "font-family: 'Heebo',sans-serif;";
            $html.= "font-size:9px;";
            $html.= "font-weight: 400;";
            $html.= "color: #757575;";
        $html.= "}";
        $html.= "table, th, td {";
            $html.= "border-bottom: 1px solid #757575;";
            $html.= "border-collapse: collapse;";
        $html.= "}";
        $html.= "</style>";
        $html.='<div>';
            $html.='<h4>';
                $html.='REPORTE DE CUENTAS';
            $html.='</h4>';
            $html.='<table width="100%" ';
                $html .= '<thead>';
                    $html.='<tr >';
                        $html.='<th>';
                            $html.='ID';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='CLIENTE';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='NUMERO DE MEDIDOR';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='NUMERO DE CUENTA';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='DIRECCION PRIMARIA';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='DIRECCION SECUNDARIA';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='PRECIO DEL AGUA';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='NOMBRE DEL SECTOR';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='TIPO DE CUENTA';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='ESTADO';
                        $html.='</th>';
                    $html.='</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $data = $this->cuenta->consultarTodosConClientes($estado_cuenta);
                if (is_countable($data) && count($data) > 0) {
                    foreach ($data as $d) {
                        $html .= '<tr>';
                            $html .= '<td>';
                                $html .= $d->id_cuenta;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->nombre_cliente. " ";
                                $html .= $d->apellido_cliente;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->numero_medidor_cuenta;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->numero_cuenta;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->direccion_primaria_cuenta;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->direccion_secundaria_cuenta;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= "1";
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->nombre_sector;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->nombre_tpcuenta;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->estado_cuenta;
                            $html .= '</td>';
                        $html .= '</tr>';
                    }
                }
                $html .= '</tbody>';
            $html.='</table>';
            
        $html.='</div>';
		$filename = "Reporte en PDF";
		$this->generarpdf($html,$filename);
    }
    public function reportecuentasexcel($estado_cuenta=""){
        $data = $this->cuenta->consultarTodosConClientes($estado_cuenta);
		if (is_countable($data) && count($data) > 0) {
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('facturas emititdas');
			$contador = 1;
			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
			$this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->setCellValue("A{$contador}", '');
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", '');
			$this->excel->getActiveSheet()->setCellValue("C{$contador}", 'REPORTE DE CUENTAS');
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", '');
			$this->excel->getActiveSheet()->setCellValue("E{$contador}", '');
			$this->excel->getActiveSheet()->setCellValue("F{$contador}", '');
			$contador++;
			$this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);

			$this->excel->getActiveSheet()->setCellValue("A{$contador}", 'ID');
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
			$this->excel->getActiveSheet()->setCellValue("C{$contador}", 'NUMERO DE MEDIDOR');
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", 'NUMERO DE CUENTA');
			$this->excel->getActiveSheet()->setCellValue("E{$contador}", 'DIRECCION PRIMARIA');
			$this->excel->getActiveSheet()->setCellValue("F{$contador}", 'DIRECCION SECUNDARIA');
			$this->excel->getActiveSheet()->setCellValue("G{$contador}", 'PRECIO DEL AGUA');
			$this->excel->getActiveSheet()->setCellValue("H{$contador}", 'NOMBRE DEL SECTOR');
			$this->excel->getActiveSheet()->setCellValue("I{$contador}", 'TIPO DE CUENTA');
            $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'ESTADO');
			//Definimos la data del cuerpo. 
            $contador++;
            foreach ($data as $d) {
                $this->excel->getActiveSheet()->getStyle("C{$contador}")->getNumberFormat()->setFormatCode('#0');
                $this->excel->getActiveSheet()->getStyle("D{$contador}")->getNumberFormat()->setFormatCode('#0');
                $this->excel->getActiveSheet()->setCellValue("A{$contador}", $d->id_cuenta);
                $this->excel->getActiveSheet()->setCellValue("B{$contador}", $d->nombre_cliente." ".$d->apellido_cliente);
                $this->excel->getActiveSheet()->setCellValue("C{$contador}", $d->numero_medidor_cuenta);
                $this->excel->getActiveSheet()->setCellValue("D{$contador}", $d->numero_cuenta);
                $this->excel->getActiveSheet()->setCellValue("E{$contador}", $d->direccion_primaria_cuenta);
                $this->excel->getActiveSheet()->setCellValue("F{$contador}", $d->direccion_secundaria_cuenta);
                $this->excel->getActiveSheet()->setCellValue("G{$contador}", "1");
                $this->excel->getActiveSheet()->setCellValue("H{$contador}", $d->nombre_sector);
                $this->excel->getActiveSheet()->setCellValue("I{$contador}", $d->nombre_tpcuenta);
                $this->excel->getActiveSheet()->setCellValue("J{$contador}", $d->estado_cuenta);
                $contador++;
            }
			$fecha = date("H:i:s");
			$fecha = md5($fecha);
			$archivo = "REPORTE_DE_CUENTAS_{$fecha}.xls";
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
			$objWriter->save($_SERVER['DOCUMENT_ROOT'] ."/epapap/reportes/" . $archivo . "");
            redirect("../reportes/$archivo");
		} else {
			echo 'No se han encontrado registros';
			exit;
		}
    }
    public function reportelecturas($estado_lectura="",  $tipo_reporte="", $id_cuenta="")
    {
        if ($tipo_reporte=="excel") {
            redirect("/reportes/reportelecturasexcel/$estado_lectura/$id_cuenta");
            exit(0);
        }
        $html= "<style>";
        $html.= "body {";
            $html .= "font-family: 'Heebo',sans-serif;";
            $html.= "font-weight: 400;";
            $html.= "color: #757575;";
        $html.= "}";
        $html.= "table {";
            $html.= "font-family: 'Heebo',sans-serif;";
            $html.= "font-size:9px;";
            $html.= "font-weight: 400;";
            $html.= "color: #757575;";
        $html.= "}";
        $html.= "table, th, td {";
            $html.= "border-bottom: 1px solid #757575;";
            $html.= "border-collapse: collapse;";
        $html.= "}";
        $html.= "</style>";
        $html.='<div>';
            $html.='<h4>';
                $html.='REPORTE DE LECTURAS';
            $html.='</h4>';
            $html.='<table width="100%" ';
                $html .= '<thead>';
                    $html.='<tr >';
                        $html.='<th>';
                            $html.='NÚMERO DE MEDIDOR';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='CLIENTE';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='LECTURA ANTERIOR';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='LECTURA ACTUAL';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='FECHA DE LECTURA';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='CONSUMO';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='PAGO';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='OBSERVACIÓN';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='ESTADO';
                        $html.='</th>';
                        $html.='<th>';
                            $html.='ENCARGADO LECTURA';
                        $html.='</th>';
                    $html.='</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $data = $this->lectura->consultarLecturasCuentaPorEstado($estado_lectura, $id_cuenta);
                if (is_countable($data) && count($data) > 0) {
                    foreach ($data as $d) {
                        $html .= '<tr>';
                            $html .= '<td>';
                                $html .= $d->numero_medidor_cuenta;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->nombre_cliente. " ";
                                $html .= $d->apellido_cliente;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->lectura_anterior_lectura;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->lectura_actual_lectura;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->fecha_lectura;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->consumo_lectura;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->pago_lectura;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->observacion_lectura;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->estado_lectura;
                            $html .= '</td>';
                            $html .= '<td>';
                                $html .= $d->encargado_lectura;
                            $html .= '</td>';
                        $html .= '</tr>';
                    }
                }
                $html .= '</tbody>';
            $html.='</table>';
            
        $html.='</div>';
		$filename = "Reporte en PDF";
		$this->generarpdf($html,$filename);
    }
    public function reportelecturasexcel($estado_lectura="", $id_cuenta=""){
        $data = $this->lectura->consultarLecturasCuentaPorEstado($estado_lectura, $id_cuenta);
		if (is_countable($data) && count($data) > 0) {
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('facturas emititdas');
			$contador = 1;
			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
			$this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->setCellValue("A{$contador}", '');
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", '');
			$this->excel->getActiveSheet()->setCellValue("C{$contador}", 'REPORTE DE LECTURAS');
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", '');
			$this->excel->getActiveSheet()->setCellValue("E{$contador}", '');
			$this->excel->getActiveSheet()->setCellValue("F{$contador}", '');
			$contador++;
			$this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);

			$this->excel->getActiveSheet()->setCellValue("A{$contador}", 'NÚMERO DE MEDIDOR');
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CLIENTE');
			$this->excel->getActiveSheet()->setCellValue("C{$contador}", 'LECTURA ANTERIOR');
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", 'LECTURA ACTUAL');
			$this->excel->getActiveSheet()->setCellValue("E{$contador}", 'FECHA DE LECTURA');
			$this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CONSUMO');
			$this->excel->getActiveSheet()->setCellValue("G{$contador}", 'PAGO');
			$this->excel->getActiveSheet()->setCellValue("H{$contador}", 'OBSERVACIÓN');
			$this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ESTADO');
            $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'ENCARGADO LECTURA');
			//Definimos la data del cuerpo. 
            $contador++;
            foreach ($data as $d) {
                $this->excel->getActiveSheet()->getStyle("A{$contador}")->getNumberFormat()->setFormatCode('#0');
                $this->excel->getActiveSheet()->setCellValue("A{$contador}", $d->numero_medidor_cuenta);
                $this->excel->getActiveSheet()->setCellValue("B{$contador}", $d->nombre_cliente." ".$d->apellido_cliente);
                $this->excel->getActiveSheet()->setCellValue("C{$contador}", $d->lectura_anterior_lectura);
                $this->excel->getActiveSheet()->setCellValue("D{$contador}", $d->lectura_actual_lectura);
                $this->excel->getActiveSheet()->setCellValue("E{$contador}", $d->fecha_lectura);
                $this->excel->getActiveSheet()->setCellValue("F{$contador}", $d->consumo_lectura);
                $this->excel->getActiveSheet()->setCellValue("G{$contador}", $d->pago_lectura);
                $this->excel->getActiveSheet()->setCellValue("H{$contador}", $d->observacion_lectura);
                $this->excel->getActiveSheet()->setCellValue("I{$contador}", $d->estado_lectura);
                $this->excel->getActiveSheet()->setCellValue("J{$contador}", $d->encargado_lectura);
                $contador++;
            }
			$fecha = date("H:i:s");
			$fecha = md5($fecha);
			$archivo = "REPORTE_DE_LECTURAS_{$fecha}.xls";
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
			$objWriter->save($_SERVER['DOCUMENT_ROOT'] ."/epapap/reportes/" . $archivo . "");
            redirect("../reportes/$archivo");
		} else {
			echo 'No se han encontrado registros';
			exit;
		}
    }
}
