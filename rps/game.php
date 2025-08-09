<?php
session_start();

// WA4E Rock Paper Scissors Game
// Student: Riyana
// Required ID: e9605c3c

// Check if user is logged in
if (!isset($_SESSION['name'])) {
    die('Not logged in');
}

$message = "";
$human_choice = "";
$computer_choice = "";
$result = "";

// Choices array
$choices = array("Rock", "Paper", "Scissors");

// Check if form is submitted
if (isset($_POST['human']) && isset($_POST['submit'])) {
    $human_choice = $_POST['human'];
    
    // Validate human choice
    if (in_array($human_choice, $choices)) {
        // Generate computer choice
        $computer_choice = $choices[array_rand($choices)];
        
        // Determine winner
        if ($human_choice == $computer_choice) {
            $result = "Tie";
        } elseif (
            ($human_choice == "Rock" && $computer_choice == "Scissors") ||
            ($human_choice == "Paper" && $computer_choice == "Rock") ||
            ($human_choice == "Scissors" && $computer_choice == "Paper")
        ) {
            $result = "You Win";
        } else {
            $result = "You Lose";
        }
        
        $message = "Your Play=" . htmlentities($human_choice) . 
                  " Computer Play=" . htmlentities($computer_choice) . 
                  " Result=" . htmlentities($result);
    } else {
        $message = "Invalid choice. Please select Rock, Paper, or Scissors.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riyana Rock Paper Scissors Game e9605c3c</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
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
        .header {
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        .user-info {
            background-color: #e7f3ff;
            padding: 15px;
            border-left: 4px solid #007bff;
            margin: 20px 0;
            text-align: left;
        }
        .game-area {
            background-color: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .choices {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 25px 0;
            flex-wrap: wrap;
        }
        .choice-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 15px 25px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            min-width: 100px;
        }
        .choice-btn:hover {
            background-color: #0056b3;
        }
        .choice-btn:active {
            transform: translateY(1px);
        }
        .message {
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            font-weight: bold;
        }
        .result-win {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .result-lose {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .result-tie {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        .result-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .instructions {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
            text-align: left;
        }
        .logout-link {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }
        .logout-link:hover {
            background-color: #c82333;
            color: white;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }
        .emoji {
            font-size: 24px;
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎮 Rock Paper Scissors Game</h1>
            <p><strong>Student:</strong> Riyana</p>
            <p><strong>Assignment:</strong> WA4E Rock Paper Scissors</p>
        </div>
        
        <div class="user-info">
            <h4>Welcome!</h4>
            <p><strong>Logged in as:</strong> <?php echo htmlentities($_SESSION['name']); ?></p>
            <p>You are now ready to play Rock Paper Scissors!</p>
        </div>

        <div class="instructions">
            <h4>Game Rules:</h4>
            <ul>
                <li>🪨 <strong>Rock</strong> crushes ✂️ <strong>Scissors</strong></li>
                <li>✂️ <strong>Scissors</strong> cuts 📄 <strong>Paper</strong></li>
                <li>📄 <strong>Paper</strong> covers 🪨 <strong>Rock</strong></li>
                <li>Same choices result in a tie</li>
            </ul>
        </div>

        <div class="game-area">
            <h3>Make Your Choice:</h3>
            
            <form method="POST" action="game.php">
                <div class="choices">
                    <button type="submit" name="human" value="Rock" class="choice-btn">
                        <span class="emoji">🪨</span><br>Rock
                    </button>
                    <button type="submit" name="human" value="Paper" class="choice-btn">
                        <span class="emoji">📄</span><br>Paper
                    </button>
                    <button type="submit" name="human" value="Scissors" class="choice-btn">
                        <span class="emoji">✂️</span><br>Scissors
                    </button>
                </div>
                <input type="hidden" name="submit" value="1">
            </form>
        </div>

        <?php if ($message): ?>
            <div class="message <?php 
                if (strpos($result, 'Win') !== false) {
                    echo 'result-win';
                } elseif (strpos($result, 'Lose') !== false) {
                    echo 'result-lose';
                } elseif (strpos($result, 'Tie') !== false) {
                    echo 'result-tie';
                } else {
                    echo 'result-error';
                }
            ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <?php if ($human_choice && $computer_choice): ?>
            <div class="game-area">
                <h4>Game Details:</h4>
                <p><strong>You chose:</strong> <?php echo htmlentities($human_choice); ?> 
                   <?php 
                   if ($human_choice == "Rock") echo "🪨";
                   elseif ($human_choice == "Paper") echo "📄";
                   elseif ($human_choice == "Scissors") echo "✂️";
                   ?>
                </p>
                <p><strong>Computer chose:</strong> <?php echo htmlentities($computer_choice); ?>
                   <?php 
                   if ($computer_choice == "Rock") echo "🪨";
                   elseif ($computer_choice == "Paper") echo "📄";
                   elseif ($computer_choice == "Scissors") echo "✂️";
                   ?>
                </p>
                <p><strong>Result:</strong> 
                   <span style="font-size: 18px; font-weight: bold;">
                   <?php echo htmlentities($result); ?>
                   <?php 
                   if ($result == "You Win") echo " 🎉";
                   elseif ($result == "You Lose") echo " 😔";
                   elseif ($result == "Tie") echo " 🤝";
                   ?>
                   </span>
                </p>
            </div>
        <?php endif; ?>

        <div style="text-align: center;">
            <a href="logout.php" class="logout-link">🚪 Logout</a>
        </div>

        <div class="footer">
            <p>WA4E Assignment - Building Web Applications in PHP</p>
            <p>Required ID: e9605c3c</p>
            <p><em>Created by Riyana</em></p>
            <p><strong>Logged in user:</strong> <?php echo htmlentities($_SESSION['name']); ?></p>
        </div>
    </div>
</body>
</html> 