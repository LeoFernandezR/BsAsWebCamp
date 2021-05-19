<footer class="site-footer">
    <div class="contenedor footer-content">
        <div class="footer-informacion">
            <h3>Sobre <span>BsAsWebcamp</span></h3>
            <p>
                Dolorum ipsum voluptate inventore eveniet quisquam rerum nihil quo
                maxime odio aliquid hic, libero ipsam omnis error id similique!.
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis,
                    atque voluptas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente facilis harum autem fugit, aspernatur quae ducimus et corporis suscipit dolor? Rerum saepe dolore a deserunt assumenda, et nam neque provident.</p>
            </p>
        </div>
        <div class="ultimos-tweets">
            <h3>Ultimos <span>Tweets</span></h3>
            <ul>
                <li>
                    Officiis et, accusantium ducimus laborum dolorum tempore excepturi
                    eligendi hic beatae accusamus nostrum illum quas laboriosam odio
                    officia porro in cum eos?
                </li>
                <li>
                    Officiis et, accusantium ducimus laborum dolorum tempore excepturi
                    eligendi hic beatae accusamus nostrum illum quas laboriosam odio
                    officia porro in cum eos?
                </li>
                <li>
                    Officiis et, accusantium ducimus laborum dolorum tempore excepturi
                    eligendi hic beatae accusamus nostrum illum quas laboriosam odio
                    officia porro in cum eos?
                </li>
            </ul>
        </div>
        <div class="menu">
            <h3>Redes <span>Sociales</span></h3>
            <nav class="redes-sociales">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </nav>
        </div>
    </div>
    <p class="copyright">
        Todos los derechos Reservados BSASWEBCAMP 2020 &copy;
    </p>

    <!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div style="display:none;">
    <div id="mc_embed_signup">
    <form action="https://gmail.us19.list-manage.com/subscribe/post?u=54a35b3fbd79bb2618d8f108c&amp;id=b3207b914e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">
        <h2>Suscribete al Newsletter y no te pierdas nada de este evento</h2>
    <div class="indicates-required"><span class="asterisk">*</span> es obligatorio</div>
    <div class="mc-field-group">
        <label for="mce-EMAIL">Correo Electrónico  <span class="asterisk">*</span>
    </label>
        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
    </div>
        <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_54a35b3fbd79bb2618d8f108c_b3207b914e" tabindex="-1" value=""></div>
        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
        </div>
    </form>
    </div>
    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
    <!--End mc_embed_signup-->
</div>
</footer>

<!-- Acá termina el html que estas haciendo -->
<script src="js/vendor/modernizr-3.7.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
    window.jQuery ||
        document.write(
            '<script src="js/vendor/jquery-3.4.1.min.js"><\/script>'
        );
</script>
<script src="js/plugins.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us19.list-manage.com","uuid":"54a35b3fbd79bb2618d8f108c","lid":"b3207b914e","uniqueMethods":true}) })</script>
<?php
$archivo = basename($_SERVER['PHP_SELF']);
$pagina = str_replace(".php", "", $archivo);
if ($pagina == 'invitados' || $pagina == 'index') {
    echo '<script src="js/jquery.colorbox-min.js"></script>';
} elseif ($pagina == 'conferencia') {
    echo '<script src="js/lightbox.js"></script>';
}
?>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="js/cotizador.js"></script>
<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function() {
        ga.q.push(arguments);
    };
    ga.q = [];
    ga.l = +new Date();
    ga("create", "UA-XXXXX-Y", "auto");
    ga("set", "transport", "beacon");
    ga("send", "pageview");
</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>
<?php
    // Guarda todo el contenido a un archivo
    $fp = fopen($archivoCache, 'w');
    fwrite($fp, ob_get_contents());
    fclose($fp);
    // Enviar al navegador
    ob_end_flush();
?>
</body>

</html>