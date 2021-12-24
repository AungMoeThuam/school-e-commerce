<?php

spl_autoload_register(function ($className) {
    $className = str_replace("\\", "/", $className);
    include("/xampp/htdocs/e-commerce/" . $className . ".php");
});
