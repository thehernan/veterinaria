<?php

/**
 * Class login
 * handles the user's login and logout process
 */
class Login
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct()
    {
        // create/read session, absolutely necessary
        session_start();

        // check the possible login actions:
        // if user tried to log out (happen when user clicks logout button)
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        // login via post data (if user just submitted a login form)
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    /**
     * log in with post data
     */
    private function dologinWithPostData()
    {
        // check login form contents
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $user_name = $this->db_connection->real_escape_string($_POST['user_name']);

                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                
                
                $sql = "SELECT id_cliente,concat(nombre,' ',apellidos) as usuario, nivel, clave,activo
                        FROM cliente
                        WHERE email= '" . $user_name . "';";
              
                $result_of_login_check = $this->db_connection->query($sql);

                // if this user exists
//                echo '<script> console.log("'.$result_of_login_check->num_rows.'")</script>';
                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_check->fetch_object();

                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
                    //if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {
                  //  echo '<script> console.log('.base64_decode($result_row->clave).') </script>';
                   // echo $result_row->clave;
//                    echo 'clave '.base64_decode($result_row->clave);
//                    echo 'claveing'.$_POST['user_password'];
                    if ($_POST['user_password']== base64_decode($result_row->clave)) {
                        echo ' nivelbd '.$result_row->nivel;
                        $_SESSION['user_id'] = $result_row->id_cliente;
                        $_SESSION['user_name'] = $result_row->usuario; 
                        $_SESSION['user_login_status'] =$result_row->nivel;
                        $_SESSION['estado'] =$result_row->activo;
                      echo ' nivelsession '.$_SESSION['user_login_status'];
                        


                    } else {
                        $this->errors[] = "Usuario y/o contraseña no coinciden.";
                    }
                } else {
                    $this->errors[] = "Usuario y/o contraseña no coinciden.";
                }
            } else {
                $this->errors[] = "Problema de conexión de base de datos.";
            }
        }
    }

    /**
     * perform the logout
     */
    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->errors[] = "Has sido desconectado.";

    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
            
    {
//         echo ' nivelisuserlogg '.$_SESSION['user_login_status'];
        if (isset($_SESSION['user_login_status']) AND ($_SESSION['user_login_status'] == 2 )) {  //OR $_SESSION['user_login_status'] == 2 OR $_SESSION['user_login_status'] == 3 OR $_SESSION['user_login_status'] == 4 OR $_SESSION['user_login_status'] == 5 OR $_SESSION['user_login_status'] == 6 OR $_SESSION['user_login_status'] == 7)
            return true;
            
           
        }else {
            return false;
            
            
        }
        // default return
       
    }
}