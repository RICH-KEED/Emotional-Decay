<?php
// WA4E Rock Paper Scissors Assignment - Index
// Student: Riyana
// Required ID: e9605c3c

// This index page redirects to the login page
// The game requires authentication before playing
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riyana Rock Paper Scissors e9605c3c</title>
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
        h1 {
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 15px;
            margin-bottom: 30px;
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
            background-color: #e7f3ff;
            padding: 20px;
            border-left: 4px solid #007bff;
            margin: 25px 0;
            text-align: left;
        }
        .game-rules {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
            text-align: left;
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
        <h1>🎮 Rock Paper Scissors Game</h1>
        <p><strong>Student:</strong> Riyana</p>
        <p><strong>Assignment:</strong> WA4E Rock Paper Scissors</p>
        
        <div class="instructions">
            <h3>Welcome to Rock Paper Scissors!</h3>
            <p>This is a secure Rock Paper Scissors game that requires authentication.</p>
            <ul>
                <li>You must log in before playing</li>
                <li>Click the "Please Log In" link below to access the game</li>
                <li>Use any email address (must contain @) and password: <strong>php123</strong></li>
                <li>Once logged in, you can play Rock Paper Scissors against the computer</li>
            </ul>
        </div>

        <div class="game-area">
            <h3>Access the Game:</h3>
            <a href="login.php" class="choice-btn" style="text-decoration: none; display: inline-block;">
                🔐 Please Log In
            </a>
        </div>

        <div class="game-rules">
            <h4>Game Rules (after login):</h4>
            <ul>
                <li>🪨 <strong>Rock</strong> crushes ✂️ <strong>Scissors</strong></li>
                <li>✂️ <strong>Scissors</strong> cuts 📄 <strong>Paper</strong></li>
                <li>📄 <strong>Paper</strong> covers 🪨 <strong>Rock</strong></li>
                <li>Same choices result in a tie</li>
            </ul>
        </div>

        <div class="footer">
            <p>WA4E Assignment - Building Web Applications in PHP</p>
            <p>Required ID: e9605c3c</p>
            <p><em>Created by Riyana</em></p>
        </div>
    </div>
</body>
</html> 