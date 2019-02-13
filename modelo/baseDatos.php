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

    /**
     * Conexion con base de datos
     *
     * @return mysqli
     */
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
        } else {
            var_dump('truuuuturuuruure');
            return $conn;
        }
    }


    /**
     * Comprobar si usuario y contraseña coinciden
     *
     * @param $name
     * @param $pass
     * @return string
     */
    public function checkUser($name, $pass) {
        $conn = $this->conBD();

        //Realizar una consulta MySQL
        $query = "SELECT `Apodo`, `Contrasenia` FROM `usuario` 
          WHERE `Apodo`='" . $name . "' AND `Contrasenia`='" . $pass . "';";

        $result = $conn->query($query);

        if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }

        $count = mysqli_num_rows($result);

        if ($count > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($pass == $row['Contrasenia']) {

                //TODO: Guardado de sesion || cookie
                $_SESSION['username'] = $row['Apodo'];
                $_COOKIE['username'] = $row['Apodo'];
                echo "Login hecho";
                mysqli_close($conn);
                return "form_login.html";
            } else {
                echo "Eto no ta";
                mysqli_close($conn);
                return "home.html";
            }
        } else {
            echo "Error de user o pass";
            mysqli_close($conn);
            return "home.html";
        }
    }
}