<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riyana - Building Web Applications in PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .section {
            margin-bottom: 30px;
            padding: 20px;
            border-left: 4px solid #007bff;
            background-color: #f8f9fa;
        }
        pre {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            overflow-x: auto;
        }
        .php-output {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Getting Started with PHP</h1>
            <h2>Web Applications for Everybody (WA4E)</h2>
            <p><strong>Student:</strong> Riyana</p>
            <?php
            // Demonstrating PHP within HTML
            echo "<p><strong>Current Date & Time:</strong> " . date('Y-m-d H:i:s') . "</p>";
            ?>
        </div>

        <div class="section">
            <h3>1. Basic PHP Variables and Output</h3>
            <p>This section demonstrates basic PHP variable usage and output:</p>
            
            <?php
            // PHP variables
            $student_name = "Riyana";
            $course = "Building Web Applications in PHP";
            $university = "University of Michigan";
            $semester = "Winter 2025";
            ?>
            
            <div class="php-output">
                <strong>Student Information:</strong><br>
                Name: <?php echo $student_name; ?><br>
                Course: <?php echo $course; ?><br>
                University: <?php echo $university; ?><br>
                Semester: <?php echo $semester; ?>
            </div>
        </div>

        <div class="section">
            <h3>2. Using the &lt;pre&gt; Tag for Formatted Output</h3>
            <p>The &lt;pre&gt; tag preserves whitespace and formatting:</p>
            
            <pre>
This is inside a pre tag.
    It preserves    spacing
        and line breaks.
            Perfect for code or formatted text!
            
<?php
// PHP code within pre tag
echo "Current PHP version: " . phpversion() . "\n";
echo "Server software: " . $_SERVER['SERVER_SOFTWARE'] . "\n";
echo "Document root: " . $_SERVER['DOCUMENT_ROOT'] . "\n";
?>
            </pre>
        </div>

        <div class="section">
            <h3>3. PHP Arrays and Loops</h3>
            <p>Demonstrating arrays and different types of loops:</p>
            
            <?php
            // Indexed array
            $programming_languages = array("PHP", "JavaScript", "Python", "Java", "C++");
            
            // Associative array
            $student_grades = array(
                "PHP Programming" => 95,
                "Database Design" => 88,
                "Web Development" => 92,
                "JavaScript" => 90
            );
            ?>
            
            <h4>Programming Languages (using for loop):</h4>
            <pre>
<?php
for ($i = 0; $i < count($programming_languages); $i++) {
    echo ($i + 1) . ". " . $programming_languages[$i] . "\n";
}
?>
            </pre>
            
            <h4>Student Grades (using foreach loop):</h4>
            <div class="php-output">
                <?php
                foreach ($student_grades as $subject => $grade) {
                    echo "<strong>" . $subject . ":</strong> " . $grade . "%<br>";
                }
                ?>
            </div>
        </div>

        <div class="section">
            <h3>4. PHP Functions</h3>
            <p>Custom PHP function demonstration:</p>
            
            <?php
            // Custom function
            function calculateGPA($grades) {
                $total = 0;
                $count = count($grades);
                
                foreach ($grades as $grade) {
                    $total += $grade;
                }
                
                return round($total / $count, 2);
            }
            
            function getLetterGrade($numeric_grade) {
                if ($numeric_grade >= 90) return "A";
                elseif ($numeric_grade >= 80) return "B";
                elseif ($numeric_grade >= 70) return "C";
                elseif ($numeric_grade >= 60) return "D";
                else return "F";
            }
            
            $gpa = calculateGPA($student_grades);
            ?>
            
            <div class="php-output">
                <strong>Calculated GPA:</strong> <?php echo $gpa; ?><br>
                <strong>Letter Grade:</strong> <?php echo getLetterGrade($gpa); ?>
            </div>
        </div>

        <div class="section">
            <h3>5. Conditional Statements and Server Information</h3>
            <p>Using PHP conditionals and accessing server variables:</p>
            
            <pre>
Server Information:
<?php
echo "Host: " . $_SERVER['HTTP_HOST'] . "\n";
echo "Request URI: " . $_SERVER['REQUEST_URI'] . "\n";
echo "User Agent: " . $_SERVER['HTTP_USER_AGENT'] . "\n";

// Conditional example
$current_hour = date('H');
if ($current_hour < 12) {
    $greeting = "Good Morning!";
} elseif ($current_hour < 17) {
    $greeting = "Good Afternoon!";
} else {
    $greeting = "Good Evening!";
}

echo "\nTime-based greeting: " . $greeting . "\n";
echo "Current hour: " . $current_hour . "\n";
?>
            </pre>
        </div>

        <div class="section">
            <h3>6. Math Operations and String Functions</h3>
            
            <?php
            $num1 = 15;
            $num2 = 8;
            $text = "Building Web Applications in PHP";
            ?>
            
            <h4>Mathematical Operations:</h4>
            <div class="php-output">
                <?php echo $num1; ?> + <?php echo $num2; ?> = <?php echo $num1 + $num2; ?><br>
                <?php echo $num1; ?> - <?php echo $num2; ?> = <?php echo $num1 - $num2; ?><br>
                <?php echo $num1; ?> × <?php echo $num2; ?> = <?php echo $num1 * $num2; ?><br>
                <?php echo $num1; ?> ÷ <?php echo $num2; ?> = <?php echo round($num1 / $num2, 2); ?><br>
                Square root of <?php echo $num1; ?> = <?php echo round(sqrt($num1), 2); ?>
            </div>
            
            <h4>String Operations:</h4>
            <pre>
Original text: <?php echo $text; ?>

Length: <?php echo strlen($text); ?> characters
Uppercase: <?php echo strtoupper($text); ?>

Lowercase: <?php echo strtolower($text); ?>

Reversed: <?php echo strrev($text); ?>

First 10 characters: <?php echo substr($text, 0, 10); ?>
            </pre>
        </div>

        <div class="section">
            <h3>7. HTML and PHP Integration Example</h3>
            <p>This section shows seamless switching between HTML and PHP:</p>
            
            <?php $colors = array("red", "blue", "green", "orange", "purple"); ?>
            
            <p>Dynamic list creation with PHP:</p>
            <ul>
                <?php foreach ($colors as $color): ?>
                    <li style="color: <?php echo $color; ?>;">
                        This text is <?php echo $color; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="section">
            <h3>8. PHP and HTML Form Processing Concept</h3>
            <p>Basic form structure (demonstration only):</p>
            
            <pre>
&lt;form method="POST" action="index.php"&gt;
    &lt;input type="text" name="username" placeholder="Enter username"&gt;
    &lt;input type="email" name="email" placeholder="Enter email"&gt;
    &lt;input type="submit" value="Submit"&gt;
&lt;/form&gt;
            </pre>
            
            <?php
            // Check if form was submitted (this is just for demonstration)
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo "<div class='php-output'>";
                echo "<strong>Form was submitted!</strong><br>";
                if (isset($_POST['username'])) {
                    echo "Username: " . htmlspecialchars($_POST['username']) . "<br>";
                }
                if (isset($_POST['email'])) {
                    echo "Email: " . htmlspecialchars($_POST['email']) . "<br>";
                }
                echo "</div>";
            }
            ?>
        </div>

        <footer style="text-align: center; margin-top: 40px; padding-top: 20px; border-top: 1px solid #ddd;">
            <p><em>Created by Riyana for WA4E Assignment</em></p>
            <p>This page demonstrates HTML and PHP integration, use of the &lt;pre&gt; tag, and basic PHP programming concepts.</p>
            <?php
            echo "<p><small>Page generated on: " . date('F j, Y \a\t g:i A') . "</small></p>";
            ?>
        </footer>
    </div>
</body>
</html> 