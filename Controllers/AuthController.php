<?php
require_once __DIR__ . '/../Configs/Database.php';



class AuthController
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }



    public function register()
    {
        if ($_POST) {
            if (empty($_POST["name"]) || empty($_POST["email"])  || empty($_POST["password"]) || strlen($_POST["password"]) < 4) {
                if (empty($_POST["name"])) {
                    $nameErr = "*Name can't be blank!";
                }
                if (empty($_POST["email"])) {
                    $emailErr = "*Email can't be blank!";
                }
                if (strlen($_POST["password"]) < 6) {
                    $passwordErr = "*password must be at least 4 characters";
                }
                if (empty($_POST["password"])) {
                    $passwordErr = "*password can't be blank!";
                }
            } else {

                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $role = 0;

                $stmt = $this->db->prepare("SELECT * FROM users WHERE email=:email");
                $stmt->bindValue(":email", $email);
                $stmt->execute();

                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // echo "<pre>";
                if ($user) {
                    $emailErr = "*Email already exists!";
                    
                } else {
                    $stmt = $this->db->prepare("INSERT INTO users(name, email, password, role) VALUES(:name, :email, :password, :role)");
                    $result = $stmt->execute(
                        array(
                            ":name" => $name,
                            ":email" => $email,
                            ":password" => $password,
                            ":role" => $role
                        )
                    );
                    if ($result) {
                        echo "<script>alert('Registered Successfully! Please Login');window.location.href='login'</script>";
                    }
                }
            }

            require __DIR__ . '/../views/auth/register.php';
        }
    }

    public function login()
    {
        if ($_POST) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            // echo $email. $password;

            $stmt = $this->db->prepare("SELECT * FROM users WHERE email=:email");
            $stmt->execute([':email' => $email]);   // return bool if query exist, otherwise false

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION["user_id"] = $user["id"];
                    $_SESSION["username"] = $user["name"];
                    $_SESSION["role"] = $user["role"];
                    
                    if ($user["role"] == 'admin') {
                        header("Location: /admin/dashboard");
                    } else {
                        header("Location: /user/home");
                    }
                }
            }
            echo "<script>alert('Incorrect credentials')</script>";
        }

        require __DIR__ . '/../views/auth/login.php';
    }

    public function loginPage()
    {

        
        require __DIR__ . '/../views/auth/login.php';
    }

    public function registerPage()
    {
        require __DIR__ . '/../views/auth/register.php';
    }


    public function logout()
    {
        session_destroy();
        header("Location: /login");
        exit;
    }
}
