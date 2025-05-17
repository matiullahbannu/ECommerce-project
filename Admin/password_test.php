<?php include("includes/navbar.php"); ?>
<?php
// Simulated database storage
$stored_hashed_password = '';
$message = '';

if (isset($_POST['signup'])) {
    // Simulate registration
    $password = trim($_POST['reg_password']);
    $stored_hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $message = "✅ Password hashed and saved.";
}

if (isset($_POST['login'])) {
    // Simulate login
    $input_password = trim($_POST['login_password']);
    $stored_hashed_password = $_POST['stored_hash']; // Get the simulated saved hash

    if (password_verify($input_password, $stored_hashed_password)) {
        $message = "✅ Login success: Password matched!";
    } else {
        $message = "❌ Login failed: Incorrect password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Hash Test</title>
</head>
<body>
    <h2>Password Hash & Verify Test</h2>

    <?php if ($message): ?>
        <p><strong><?php echo $message; ?></strong></p>
    <?php endif; ?>

    <form method="post">
        <h3>Step 1: Register (Hash Password)</h3>
        <input type="password" name="reg_password" placeholder="Enter password to hash">
        <button type="submit" name="signup">Hash Password</button>
    </form>

    <form method="post">
        <h3>Step 2: Login (Verify Password)</h3>
        <input type="password" name="login_password" placeholder="Enter password to check"><br><br>
        <input type="hidden" name="stored_hash" value="<?php echo htmlspecialchars($stored_hashed_password); ?>">
        <p>Hashed password (from "DB"):<br>
        <textarea rows="2" cols="70"><?php echo $stored_hashed_password; ?></textarea></p>
        <button type="submit" name="login">Verify Password</button>
    </form>
</body>
</html>
