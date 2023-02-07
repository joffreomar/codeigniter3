<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once dirname(__FILE__) . '/dompdf/autoload.inc.php';
require_once __DIR__.'/simplexlsx/src/SimpleXLSX.php';
//require_once("./vendor/dompdf/dompdf/autoload.inc.php");
//use Dompdf\Dompdf;

class Simplexlsx1 {

  public function generate($file="")
  {
    try {
        if ( $xlsx = SimpleXLSX::parse( $file ) ) {
            $xlsx = SimpleXLSX::parse( $file );
            return $xlsx ;
            /*echo '<h2>Parsing Result</h2>';
            echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';

            list( $cols, ) = $xlsx->dimension();

            foreach ( $xlsx->rows() as $k => $r ) {
                //      if ($k == 0) continue; // skip first row
                echo '<tr>';
                for ( $i = 0; $i < $cols; $i ++ ) {
                    echo '<td>' . ( isset( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' ) . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';*/
        } else {
            echo SimpleXLSX::parseError();
        }
    } catch (Exception $e) {
        echo "error al ingresar el archivo";
    }
  }
}