<?php

require_once "database.php";

class UserDetails{
	
     //User Login Form 
	public function userLogin($email,$password){

		try{

			$database = new Database();
			$connect = $database->getDB();
           //Password encryption 
			$hash_password= hash('sha256', $password);

			$stmt = $connect->prepare("SELECT user_id FROM user WHERE email=:email AND password=:hash_password"); 
			$stmt->bindParam(":email", $email,PDO::PARAM_STR) ;
			$stmt->bindParam(":hash_password", $hash_password,PDO::PARAM_STR) ;
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetch(PDO::FETCH_OBJ);

			if($count)
			{
             //$_SESSION['userid']=$data->user_id; // Storing user session value 
				return true;
			}else{
				return false;
			} 
			$connect = null;
		}catch(PDOException $e) {
			echo '{"Error:'. $e->getMessage();
		}

	}


//User Registration /SignUp Function in Secgtion Title.

	public function userRegistration($name,$username,$email,$password){

		try{
			$db = new Database();
			$connect = $db->getDB();

			$st = $connect->prepare("SELECT user_id FROM user WHERE username=:username OR email=:email");
			$st->bindParam(":username", $username,PDO::PARAM_STR);
			$st->bindParam(":email", $email,PDO::PARAM_STR);
			$st->execute();

			$count=$st->rowCount();

			if($count<1){
				$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $connect->prepare("INSERT INTO user(name,username,email,password) VALUES(:name,:username,:email,:hash_password)");
				$stmt->bindParam(":name", $name,PDO::PARAM_STR) ;
                $hash_password= hash('sha256', $password); //Password encryption
                $stmt->bindParam(":username", $username,PDO::PARAM_STR) ;
                $stmt->bindParam(":email", $email,PDO::PARAM_STR) ;
                $stmt->bindParam(":hash_password", $hash_password,PDO::PARAM_STR) ;
                $stmt->execute();
                $uid=$connect->lastInsertId(); // Last inserted row id
                $_SESSION['uid']=$uid;
                return $uid;
            }else{
            	return false;
            }

        }catch(PDOException $e){
        	echo  "Error:" . $e->getMessage();
        }
        $connect = null;
    }

           //End of Registraion Function


/* User Details 
public function userDetails($uid)
{
	try{
		$database = new Database();
		$db = $database->getDB();
		$stmt = $db->prepare("SELECT name, email FROM users WHERE uid=:uid"); 
		$stmt->bindParam("", $uid,PDO::PARAM_INT);
		$stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
        return $data;
      }catch(PDOException $e) {
	echo "Error":. $e->getMessage();
}
}
*/
}

?>
