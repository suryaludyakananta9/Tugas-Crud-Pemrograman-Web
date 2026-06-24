<?php  
session_start();  
include '../config/koneksi.php';  

// Inisialisasi variabel untuk menampung pesan error jika ada
$error_message = "";

if (isset($_POST['login'])) {  
    $username = $_POST['username'];  
    $password = $_POST['password'];  
    
    // Mengambil data user berdasarkan username
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");  
    $user = mysqli_fetch_assoc($query);  
    
    // Verifikasi kecocokan username dan password
    if ($user && password_verify($password, $user['password'])) {  
        $_SESSION['login'] = true;  
        $_SESSION['username'] = $username;  
        
        header("Location: index.php"); 
        exit();  
    } else { 
        $error_message = "Username atau Password Salah"; 
    }  
} 
?>  

<?php if (!empty($error_message)): ?>
    <p style="color: red;"><?php echo $error_message; ?></p>
<?php endif; ?>

<form method="POST">  
    <label>Username</label> 
    <input type="text" name="username" required>  
    <br><br>
    
    <label>Password</label> 
    <input type="password" name="password" required>  
    <br><br>
    
    <button type="submit" name="login">Login</button>  
</form>