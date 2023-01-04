<?php 
$req = $_POST; 
$email = $req['email'];
$conn = mysqli_connect('localhost', 'root', '', 'mchos');
session_start();
if($req['object'] == 'forgot'){ 
if($req['newpassword'] == $req['confirmpassword']) {
		$hash = sodium_crypto_pwhash_str(
			$password,
			SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE,
			SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE
		); 
        $update = "UPDATE `register` SET 'password' = '$hash' WHERE email = '$email' ";
        $result = mysqli_query($conn, $update);
        $_SESSION['msg'] = 'Your new password has reset successfully, you can now login.';
        header("Location: index.php");
    } else {
        $_SESSION['msg'] = 'Password does not match';
        header("Location: index.php");
    }
}
?>