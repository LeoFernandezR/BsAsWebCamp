<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once 'includes/templates/header.php';
use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payment;

require 'includes/paypal.php';

?>
<section class="seccion contenedor">
    <h2>Resumen Registro</h2>
<?php
      
      $id_pago = (int) $_GET['id_pago'];
    if (isset($_GET['paymentId'])) {
        $paymentId = $_GET['paymentId'];
        // Peticion a REST API
        $pago = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);
        // Resultado tiene la informacion de la transaccion
        $resultado = $pago->execute($execution, $apiContext);
        $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;

        //echo var_dump($respuesta);
    }

    if ($respuesta === "completed") {
        echo "<div class='resultado correcto'>";
        echo "El pago se realizo correctamente <br>";
        echo "El ID es: " . $paymentId;
        echo "</div>";

        require_once('includes/funciones/bd_conexion.php');
        $stmt = $conn->prepare('UPDATE registrados SET pagado = ? WHERE ID_Registrado = ?');
        $pagado = 1;
        $stmt->bind_param('ii', $pagado, $id_pago);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    } else {
        echo "<div class='resultado error'>";
        echo "El pago no se realizó";
        echo "</div>";
    }
    ?>

</section>
<?php include_once 'includes/templates/footer.php'; ?>

