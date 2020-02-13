<!DOCTYPE HTML>
<html>  
<body>
<?php
$name = $email = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $gender = test_input($_POST["gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Fillup This Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<b>Name: <input type="text" name="name"></b><br>
<br><b>E-mail: <input type="text" name="email"></b><br>
<br><b>Gender:</b>
<br><input type="radio" name="gender" value="male">Male<br>
<input type="radio" name="gender" value="female">Female<br>
<input type="radio" name="gender" value="other">Other<br>

<br><b><input type="submit"></b>
</form>
<?php
class Information {
  public $name;
  public $email;
   public $gender;

  function __construct($name,$email,$gender) {
    $this->name = $name;
    $this->email = $email;
    $this->gender = $gender;
  }
  function get_name() {
    return $this->name;
  }
   function get_email() {
    return $this->email;
  }
    function get_gender() {
    return $this->gender;
  }
}

$Info = new Information($name,$email,$gender);
$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
$txt = "Name: ".$Info->get_name()." "."E-mail: ".$Info->get_email()." "."Gender: ".$Info->get_gender()."\n";
fwrite($myfile, $txt);
fclose($myfile);
?>

</body>
</html>