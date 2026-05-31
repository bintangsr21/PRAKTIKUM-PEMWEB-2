<?php
if(isset($_POST['login'])){

    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? md5($_POST['password']) : '';

    $query = mysqli_query($conn, "
    SELECT * FROM users 
    WHERE username='$username' 
    AND password='$password'
    ");

    $data = mysqli_fetch_assoc($query);

    if($data){

        $_SESSION['user'] = $data;

        header("Location: index.php");

    } else {

        echo "<div class='alert alert-danger'>Login gagal</div>";

    }
}
?>

<form method="POST">

  <div class="mb-3">
    <label>Username</label>

    <input type="text"
    name="username"
    class="form-control">
  </div>

  <div class="mb-3">
    <label>Password</label>

    <input type="password"
    name="password"
    class="form-control">
  </div>

  <button type="submit"
  name="login"
  class="btn btn-primary">

    Login

  </button>

</form>