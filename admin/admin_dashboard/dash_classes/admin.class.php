<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include 'db_connect.class.php';

class Adminstrator
{
    private $pdo;

    public function __construct()
    {
        $dbconn = new DBConnection;
        $this->pdo = $dbconn->connectDB();
    }

    public function add_emplye ($name, $phone, $email, $password, $type_pers)
    {
        try {
            $sql = 'INSERT INTO employé (name,phno,email,password,type) VALUES(:param_name,:param_phone,:param_email,:param_password,:param_type)';
            $result = $this->pdo->prepare($sql);
            $result->bindParam(':param_name',$name);
            $result->bindParam(':param_phone',$phone);
            $result->bindParam(':param_email',$email);
            $result->bindParam(':param_password',$password);
            $result->bindParam(':param_type',$type_pers);
            $result->execute();
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
	}
	
	public function add_driver ($name, $phone, $email, $password, $type_pers)
    {
        try {
            $sql = 'INSERT INTO tbl_driver (name,phno,email,password,type) VALUES(:param_name,:param_phone,:param_email,:param_password,:param_type)';
            $result = $this->pdo->prepare($sql);
            $result->bindParam(':param_name',$name);
            $result->bindParam(':param_phone',$phone);
            $result->bindParam(':param_email',$email);
            $result->bindParam(':param_password',$password);
            $result->bindParam(':param_type',$type_pers);
            $result->execute();
            return $result;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
	}

	public function listemploys(){
		$req = 'SELECT * FROM employé ';
		$result = $this->pdo->prepare($req);
		$result->execute();
		return $result;
	}

	public function list_orders(){
    $req = '
    SELECT o.oid, o.qty, p.type, o.pid, o.cid 
    FROM ordre o 
    JOIN produits p ON o.pid = p.pid
';
    $result = $this->pdo->prepare($req);
    $result->execute();
    return $result;
}
  

	public function number_of_orders(){
		$req = 'SELECT count(*)  as orders FROM ordre ';
		$result = $this->pdo->prepare($req);
		$result->execute();
		return $result;
	}

	public function delete_employ($eid){
		$req = 'DELETE FROM employé WHERE eid = :eid';
		$result = $this->pdo->prepare($req);
		$result->bindParam(':eid',$eid);
		if($result->execute()){
			return $result;
		}
	}


	public function delete_user($cid){
		$req = 'DELETE FROM clients WHERE cid = :cid';
		$result = $this->pdo->prepare($req);
		$result->bindParam(':cid',$cid);
		if($result->execute()){
			return $result;
		}
	}
	
	public function listusers() {
    try {
        $req = 'SELECT * FROM clients';
        $result = $this->pdo->prepare($req);
        $result->execute();
        return $result;
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        return $result;
    }
}

public function get_total_sales() {
    $sql = $this->pdo->prepare("
        SELECT SUM(p.price * o.qty) AS total_sales
        FROM ordre o
        JOIN produits p ON o.pid = p.pid
    ");
    $sql->execute();
    return $sql;
}


public function get_monthly_sales() {
    $sql = $this->pdo->prepare("
        SELECT 
            DATE_FORMAT(o.order_date, '%M') AS month, 
            MONTH(o.order_date) AS month_num,
            SUM(p.price * o.qty) AS sales
        FROM ordre o
        LEFT JOIN produits p ON o.pid = p.pid
        WHERE o.order_date IS NOT NULL
        GROUP BY MONTH(o.order_date), DATE_FORMAT(o.order_date, '%M')
        ORDER BY MONTH(o.order_date)
    ");
    $sql->execute();
    return $sql;
}


public function get_order_by_id($oid) {
    try {
        $sql = 'SELECT * FROM ordre WHERE oid = :oid';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':oid', $oid, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Returns the order as an associative array
    } catch (PDOException $ex) {
        error_log("PDO Error: " . $ex->getMessage());
        return false;
    }
}

    public function send_email($name,$email,$password){

$mesg = '';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'bilelmerseni7016@gmail.com';                     // SMTP username
    $mail->Password   = 'crackerman02';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('bilelmerseni7016@gmail.com', 'Food Zone');
    $mail->addAddress($email, $name);     // Add a recipient


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'congratulations';
    $mail->Body    = $mesg;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
    return 'Message has been sent';
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    }

}
