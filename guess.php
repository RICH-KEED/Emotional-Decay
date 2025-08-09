<?php
// WA4E Guessing Assignment (GET)
// Student: Riyana
// Correct answer: 52
// Required ID: e9605c3c

$correct_answer = 52;
$message = "";
$guess = "";

// Check if guess parameter is provided
if (isset($_GET['guess'])) {
    $guess = $_GET['guess'];
    
    // Validate input
    if (strlen($guess) < 1) {
        $message = "Your guess is too short";
    } elseif (!is_numeric($guess)) {
        $message = "Your guess is not a number";
    } else {
        $guess_number = (int) $guess;
        
        if ($guess_number < $correct_answer) {
            $message = "Your guess is too low";
        } elseif ($guess_number > $correct_answer) {
            $message = "Your guess is too high";
        } else {
            $message = "Congratulations - You are right";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riyana Guessing Game e9605c3c</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 15px;
        }
        .message {
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            font-weight: bold;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .warning {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        form {
            margin: 30px 0;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 5px;
            width: 200px;
            margin-right: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
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
        <h1>Welcome to the Guessing Game</h1>
        <p><strong>Student:</strong> Riyana</p>
        <p><strong>Assignment:</strong> WA4E Guessing Assignment (GET)</p>
        
        <div class="instructions">
            <h3>Instructions:</h3>
            <ul>
                <li>I'm thinking of a number between 1 and 100</li>
                <li>Enter your guess in the box below</li>
                <li>I'll tell you if your guess is too high, too low, or correct</li>
                <li>Good luck!</li>
            </ul>
        </div>

        <?php if ($message): ?>
            <div class="message <?php 
                if (strpos($message, 'Congratulations') !== false) {
                    echo 'success';
                } elseif (strpos($message, 'not a number') !== false || strpos($message, 'too short') !== false) {
                    echo 'error';
                } else {
                    echo 'warning';
                }
            ?>">
                <?php echo htmlentities($message); ?>
            </div>
        <?php endif; ?>

        <form method="GET" action="guess.php">
            <label for="guess">Your Guess:</label><br><br>
            <input type="text" name="guess" id="guess" value="<?php echo htmlentities($guess); ?>" placeholder="Enter a number">
            <input type="submit" value="Guess!">
        </form>

        <?php if ($message && strpos($message, 'Congratulations') === false): ?>
            <p><em>Try again! Enter another number.</em></p>
        <?php endif; ?>

        <div class="footer">
            <p>WA4E Assignment - Building Web Applications in PHP</p>
            <p>Required ID: e9605c3c | Correct Answer: Hidden</p>
            <p>Current guess: <?php echo $guess ? htmlentities($guess) : 'None'; ?></p>
        </div>
    </div>
</body>
</html> 