<?php

class baseDatos {

    private $server;
    private $bd;
    private $userBD;
    private $claveBD;


    function __construct() {
        $this->server = "localhost";
        $this->bd = "redormus_db";
        $this->userBD = "wordpri";
        $this->claveBD = "wordpri";
    }

    public function conBD() {
        $s = $this->server;
        $bd = $this->bd;
        $u = $this->userBD;
        $c = $this->claveBD;

        // Conectando, seleccionando la base de datos
        $conn = new mysqli($s, $u, $c, $bd);
        mysqli_set_charset($conn, "utf8");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else {
            var_dump('truuuuturuuruure');
            return $conn;
        }
    }
}