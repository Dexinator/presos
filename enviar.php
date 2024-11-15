<?php
class Reservation
{
    // (A) CONSTRUCTOR - CONNECT TO DATABASE
    private $pdo; // PDO object
    private $stmt; // SQL statement
    public $error; // Error message
    function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
                DB_USER,
                DB_PASSWORD,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NAMED
                ]
            );
        } catch (Exception $ex) {
            exit ($ex->getMessage());
        }
    }

    // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
    function __destruct()
    {
        $this->pdo = null;
        $this->stmt = null;
    }



    function save($cellmate, $reg_name, $res_tel, $IGname, $Bday, $mkt)
    {
        // (C2) DATABASE ENTRY


        try {

            $this->stmt = $this->pdo->prepare(
                "INSERT INTO `presos` (`cellmate`, `reg_name`, `res_tel`,`IGname`,`Bday`,`mkt`)
           VALUES (?,?,?,?,?,?)"
            );
            $this->stmt->execute([$cellmate, $reg_name, $res_tel, $IGname, $Bday, $mkt]);
            return true;
        } catch (Exception $ex) {
            $this->error = $ex->getMessage();
            return false;
        }


    }

    function captor($cellmate)
    {
        // (C2) DATABASE ENTRY


        try {

            $this->stmt = $this->pdo->prepare(
                "UPDATE `presos` SET `referidos` = `referidos` + 1 WHERE `id` =
            ?;"
            );
			$this->stmt->bindValue(1,$cellmate, PDO::PARAM_INT);
            $this->stmt->execute();
            return true;
        } catch (Exception $ex) {
            $this->error = $ex->getMessage();
			echo $this->error;
            return false;
        }


    }
    
        function consulta($con_name)
    {
        // (C2) DATABASE ENTRY


        try {
            $this->stmt = $this->pdo->prepare(
                "SELECT `reg_name`, `id` FROM `presos` WHERE `reg_name` LIKE ?"
            );
            $this->stmt->execute(['%' . $con_name . '%']);
            $this->resultados = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            return true;
        } catch (Exception $ex) {
            $this->error = $ex->getMessage();
			echo $this->error;
            return false;
        }


    }
    

}


// (E) DATABASE SETTINGS - CHANGE THESE TO YOUR OWN!
/*
define("DB_HOST", "localhost");
define("DB_NAME", "convoy");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");
*/

define("DB_HOST", "localhost");
define("DB_NAME", "dbn6gh2wq1ksqg");
define("DB_CHARSET", "utf8");
define("DB_USER", "u7k9gwgramrrl");
define("DB_PASSWORD", "968*d0aJ");







// (F) NEW RESERVATION OBJECT
$_RSV = new Reservation();