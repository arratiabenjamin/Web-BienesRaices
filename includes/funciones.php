<?php

require 'app.php';

function incluirTemplate( string $archivo, bool $inicio = false ) {

    include TEMPLATE_URL . "/${archivo}.php";

}