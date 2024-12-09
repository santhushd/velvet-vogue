<?php
class AuthModel
{
    private $conn;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    public function insert($data)
    {
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $role_id = $data['role_id'];
        $name = $data['name'];
        $address_line_1 = $data['address_line_1'];
        $address_line_2 = $data['address_line_2'];
        $address_line_3 = $data['address_line_3'];
        $city = $data['city'];
        $phone = $data['phone'];

        $sql = "INSERT INTO user (email, password, role_id,
            name, address_line_1, address_line_2,
            address_line_3, city, phone
        ) VALUES(?,?,?,?,?,?,?,?,?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "ssissssss",
            $email,
            $password,
            $role_id,
            $name,
            $address_line_1,
            $address_line_2,
            $address_line_3,
            $city,
            $phone
        );

        return $stmt->execute();
    }
    public function checkEmail($email)
    {
        $sql = "SELECT COUNT(*) as count FROM user WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row['count'] > 0;
    }

    public function checkEmailAndPassword($email, $password)
    {
        $sql = "SELECT password FROM user WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if (!$row) {
            return false;
        }

        $hashedPassword = $row['password'];

        return password_verify($password, $hashedPassword);
    }
}
?>