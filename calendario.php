<?php include_once 'includes/templates/header.php'; ?>

<!--Seccion1-->

<section class="seccion contenedor">
    <h2>Calendario de Eventos</h2>


    <?php
    try {
        require_once('includes/funciones/bd_conexion.php');
        $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
        $sql .= " FROM eventos ";
        $sql .= " INNER JOIN categoria_evento ";
        $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
        $sql .= " INNER JOIN invitados ";
        $sql .= " ON eventos.id_inv = invitados.invitado_id ";
        $sql .= " ORDER BY evento_id";
        $resultados = $conn->query($sql);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }


    ?>
    <div class="calendario">
        <?php
        $calendario = array();
        while ($eventos = $resultados->fetch_assoc()) {
            // agrupar eventos
            $fecha = $eventos['fecha_evento'];
            $categoria = $eventos['cat_evento'];


            $evento = array(
                'titulo' => $eventos['nombre_evento'],
                'fecha' => $eventos['fecha_evento'],
                'hora' => $eventos['hora_evento'],
                'categoria' => $eventos['cat_evento'],
                'icono' => 'fas' . ' ' . $eventos['icono'],
                'invitado' => $eventos['nombre_invitado'] . ' ' . $eventos['apellido_invitado']
            );

            $calendario[$fecha][] = $evento;
        ?>

        <?php } // While de fetch assoc 
        ?>

        <?php
        foreach ($calendario as $dia => $lista_eventos) { ?>

            <h3>
                <i class="fas fa-calendar-alt">
                    <?php

                    //Unix
                    setlocale(LC_TIME, 'es_ES.UTF-8');
                    //Windows
                    setlocale(LC_TIME, 'spanish');

                    echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($dia))); ?>
                </i>
            </h3>
            <div class="calendario-grid">
                <?php
                foreach ($lista_eventos as $evento) { ?>

                    <div class="dia">
                        <p class="titulo">
                            <?php echo $evento['titulo'] ?>
                        </p>
                        <p class="hora">
                            <i class="far fa-clock" aria-hidden="true"></i>
                            <?php echo $evento['fecha'] . ' ' . $evento['hora']; ?>
                        </p>
                        <p>
                            <i class="<?php echo $evento['icono'] ?>" aria-hidden="true"></i>
                            <?php echo $evento['categoria'] ?>
                        </p>

                        <p>
                            <i class="fas fa-user" aria-hidden="true"></i>
                            <?php echo $evento['fecha'] . ' ' . $evento['invitado']; ?>
                        </p>
                    </div>

                <?php } //Fin foreach eventos
                ?>
            </div>


        <?php } //fin foreach de dias 
        ?>


    </div>

    <?php $conn->close(); ?>
</section>

<?php include_once 'includes/templates/footer.php'; ?>