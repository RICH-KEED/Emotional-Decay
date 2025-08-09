<?php
session_start();

// WA4E Rock Paper Scissors Login
// Student: Riyana
// Required ID: e9605c3c

$message = "";

// Check if form is submitted
if (isset($_POST['who']) && isset($_POST['pass'])) {
    $who = $_POST['who'];
    $pass = $_POST['pass'];
    
    // Validate input
    if (strlen($who) < 1 || strlen($pass) < 1) {
        $_SESSION['error'] = "User name and password are required";
        header("Location: login.php");
        return;
    }
    
    // Check for @ sign in email
    if (strpos($who, '@') === false) {
        $_SESSION['error'] = "Email must have an at-sign (@)";
        header("Location: login.php");
        return;
    }
    
    // Check password - the correct password is php123
    if ($pass == 'php123') {
        // Successful login
        $_SESSION['name'] = $who;
        header("Location: game.php");
        return;
    } else {
        $_SESSION['error'] = "Incorrect password";
        header("Location: login.php");
        return;
    }
}

// Display error message if exists
if (isset($_SESSION['error'])) {
    $message = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riyana Rock Paper Scissors Login e9605c3c</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 100px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        .form-group {
            margin: 20px 0;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        input[type="email"]:focus, input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin: 15px 0;
            border: 1px solid #f5c6cb;
        }
        .instructions {
            background-color: #e7f3ff;
            padding: 15px;
            border-left: 4px solid #007bff;
            margin: 20px 0;
            text-align: left;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔐 Please Log In</h1>
        <p><strong>Student:</strong> Riyana</p>
        <p><strong>Assignment:</strong> WA4E Rock Paper Scissors</p>
        
        <div class="instructions">
            <h4>Login Instructions:</h4>
            <ul>
                <li>Enter your email address (must contain @)</li>
                <li>Use password: <strong>php123</strong></li>
                <li>Click "Log In" to access the game</li>
            </ul>
        </div>

        <?php if ($message): ?>
            <div class="error">
                <?php echo htmlentities($message); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="who">Email:</label>
                <input type="email" name="who" id="who" placeholder="Enter your email" required>
            </div>
            
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" name="pass" id="pass" placeholder="Enter password" required>
            </div>
            
            <input type="submit" value="Log In">
        </form>

        <div class="footer">
            <p>WA4E Assignment - Building Web Applications in PHP</p>
            <p>Required ID: e9605c3c</p>
            <p><em>Use any email with @ and password: php123</em></p>
        </div>
    </div>
</body>
</html> 