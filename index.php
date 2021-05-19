<?php include_once 'includes/templates/header.php'; ?>
<section class="seccion contenedor">
  <h2>La mejor conferencia de diseño web</h2>
  <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam beatae
    doloribus necessitatibus eaque, consequatur voluptate vitae quisquam,
    numquam neque sit deleniti culpa veniam aut perspiciatis tenetur
    inventore quibusdam magnam! Quas!
  </p>
</section>
<!--Seccion1-->

<section class="programa">
  <div class="contenedor-video">
    <video autoplay muted loop poster="img/bg-talleres.jpg">
      <source src="video/video.mp4" type="video/mp4" />
      <source src="video/video.webm" type="video/webm" />
      <source src="video/video.ogv" type="video/ogv" />
    </video>
  </div>
  <!--Contenedor video-->
  <div class="contenido-programa">
    <div class="contenedor">
      <div class="programa-evento">
        <h2>Programa del Evento</h2>
        <?php
        try {
            require_once('includes/funciones/bd_conexion.php');
            $sql = "SELECT * FROM `categoria_evento`";
            $resultados = $conn->query($sql);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }


        ?>
        <nav class="menu-programa">
          <?php while ($cat = $resultados->fetch_assoc()) { ?>

            <a href="#<?php echo strtolower($cat['cat_evento']);?>"><i class="fas <?php echo $cat['icono']; ?>"></i> <?php echo $cat['cat_evento'];?></a>

          <?php } ?>
        </nav>

        <?php
        try {
            require_once('includes/funciones/bd_conexion.php');
            $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
            $sql .= " FROM `eventos` ";
            $sql .= " INNER JOIN `categoria_evento` ";
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
            $sql .= " INNER JOIN `invitados` ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
            $sql .= " AND eventos.id_cat_evento = 1 ";
            $sql .= " ORDER BY evento_id LIMIT 2;";
            $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
            $sql .= " FROM `eventos` ";
            $sql .= " INNER JOIN `categoria_evento` ";
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
            $sql .= " INNER JOIN `invitados` ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
            $sql .= " AND eventos.id_cat_evento = 2 ";
            $sql .= " ORDER BY evento_id LIMIT 2;";
            $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
            $sql .= " FROM `eventos` ";
            $sql .= " INNER JOIN `categoria_evento` ";
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
            $sql .= " INNER JOIN `invitados` ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
            $sql .= " AND eventos.id_cat_evento = 3 ";
            $sql .= " ORDER BY evento_id LIMIT 2;";
        } catch (\Exception $e) {
            echo $e->getMessage();
        } ?>

        <?php $conn->multi_query($sql); ?>

        <?php do {
            $resultado = $conn->store_result();
            $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

          <?php $i = 0; ?>
          <?php foreach ($row as $evento) { ?>
            <?php if ($i % 2 == 0) { ?>
              <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar">
              <?php } ?>
              <div class="detalle-evento">
                <h3><?php echo $evento['nombre_evento']; ?></h3>
                <p><i class="far fa-clock"></i><?php echo $evento['hora_evento']; ?></p>
                <p><i class="fas fa-calendar-alt"></i><?php echo $evento['fecha_evento']; ?></p>
                <p><i class="fas fa-user"></i> <?php echo $evento['nombre_invitado'] . ' ' . $evento['apellido_invitado']; ?></p>
              </div>

              <?php if ($i % 2 == 1) { ?>
                <div class="ver-todos">
                  <a href="calendario.php" class="button">Ver todos</a>
                </div>
              </div>
            <?php } ?>

            <?php $i++; ?>

          <?php } ?>

          <?php $resultado->free(); ?>

        <?php
        } while ($conn->more_results() && $conn->next_result()); ?>



      </div>
      <!--Programa evento-->
    </div>
    <!--.contenedor-->
  </div>
  <!--Contenido Programa-->
</section>
<!--Programa-->

<?php include_once 'includes/templates/invi.php' ?>
<!--Invitados-->

<div class="contador parallax">
  <div class="contenedor">
    <ul class="resumen-evento">
      <li>
        <p class="numero"></p>
        Invitados
      </li>
      <li>
        <p class="numero"></p>
        Talleres
      </li>
      <li>
        <p class="numero"></p>
        Días
      </li>
      <li>
        <p class="numero"></p>
        Conferencias
      </li>
    </ul>
  </div>
</div>

<section class="precios seccion">
  <h2>Precios</h2>
  <div class="contenedor">
    <ul class="lista-precios">
      <li>
        <div class="tabla-precio">
          <h3>Pase por día</h3>
          <p class="numero">$30</p>
          <ul>
            <li>Bocadillos Gratis</li>
            <li>Todas las Conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <div class="boton-comprar">
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </div>
      </li>
      <li>
        <div class="tabla-precio">
          <h3>Todos los días</h3>
          <p class="numero">$50</p>
          <ul>
            <li>Bocadillos Gratis</li>
            <li>Todas las Conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <div class="boton-comprar">
            <a href="#" class="button">Comprar</a>
          </div>
        </div>
      </li>
      <li>
        <div class="tabla-precio">
          <h3>Pase por 2 días</h3>
          <p class="numero">$45</p>
          <ul>
            <li>Bocadillos Gratis</li>
            <li>Todas las Conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <div class="boton-comprar">
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </div>
      </li>
    </ul>
  </div>
</section>

<div class="mapa" id="mapa">
</div>

<section class="seccion">
  <h2>Testimoniales</h2>
  <div class="testimoniales contenedor">
    <div class="testimonial">
      <blockquote>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat
          dolor amet expedita, ipsam eligendi rerum vel illo, totam natus
          nemo hic repellendus architecto officia facere ab ut maiores
          distinctio tempora?
        </p>
        <footer class="info-testimonial">
          <img src="img/testimonial.jpg" alt=" imagen testimonial" />
          <cite>Oswaldo Aponte Escobedo
            <span>Diseñador en @Prisma</span>
          </cite>
        </footer>
      </blockquote>
    </div>
    <!--Testimonial-->
    <div class="testimonial">
      <blockquote>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat
          dolor amet expedita, ipsam eligendi rerum vel illo, totam natus
          nemo hic repellendus architecto officia facere ab ut maiores
          distinctio tempora?
        </p>
        <footer class="info-testimonial">
          <img src="img/testimonial.jpg" alt=" imagen testimonial" />
          <cite>Oswaldo Aponte Escobedo
            <span>Diseñador en @Prisma</span>
          </cite>
        </footer>
      </blockquote>
    </div>
    <!--Testimonial-->
    <div class="testimonial">
      <blockquote>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat
          dolor amet expedita, ipsam eligendi rerum vel illo, totam natus
          nemo hic repellendus architecto officia facere ab ut maiores
          distinctio tempora?
        </p>
        <footer class="info-testimonial">
          <img src="img/testimonial.jpg" alt=" imagen testimonial" />
          <cite>Oswaldo Aponte Escobedo
            <span>Diseñador en @Prisma</span>
          </cite>
        </footer>
      </blockquote>
    </div>
    <!--Testimonial-->
  </div>
</section>

<div class="newsletter parallax">
  <div class="contenido contenedor">
    <p>registrate al newsletter</p>
    <h3>BsAsWebCamp</h3>
    <div class="boton-comprar">
      <a href="#mc_embed_signup" class="boton_newsletter button transparente">Registro</a>
    </div>
  </div>
  <!--Contenido-->
</div>
<!--Newsletter-->

<section class="seccion">
  <h2>Faltan</h2>
  <div class="cuenta-regresiva contenedor">
    <ul>
      <li>
        <p id="dias" class="numero"></p>
        Días
      </li>
      <li>
        <p id="horas" class="numero"></p>
        Horas
      </li>
      <li>
        <p id="minutos" class="numero"></p>
        Minutos
      </li>
      <li>
        <p id="segundos" class="numero"></p>
        Segundos
      </li>
    </ul>
  </div>
</section>

<?php include_once 'includes/templates/footer.php'; ?>