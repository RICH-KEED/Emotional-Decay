# WA4E PHP Assignment - Getting Started with PHP

**Student:** Riyana  
**Course:** Building Web Applications in PHP (WA4E)  
**Assignment:** Introduction to PHP - Single `index.php` file demonstration

## Project Description

This project demonstrates basic PHP programming skills as part of the Web Applications for Everybody (WA4E) course. The application consists of a single `index.php` file that showcases:

- HTML and PHP integration
- Proper use of the `<pre>` tag for formatted output
- Switching between PHP and HTML throughout the document
- Basic PHP programming concepts including variables, arrays, loops, functions, and conditionals

## Features Demonstrated

1. **HTML Structure** - Proper HTML5 document structure with CSS styling
2. **PHP Variables** - Basic variable declaration and usage
3. **Pre Tag Usage** - Formatted output preservation using `<pre>` tag
4. **Arrays and Loops** - Both indexed and associative arrays with for/foreach loops
5. **Functions** - Custom PHP functions for calculations
6. **Conditionals** - If/else statements and logical operations
7. **Server Information** - Accessing $_SERVER superglobal variables
8. **String/Math Operations** - Built-in PHP functions for text and number manipulation
9. **HTML/PHP Integration** - Seamless switching between HTML and PHP code

## File Structure

```
RIYANA-DI-PHP/
├── index.php          # Main application file
├── README.md          # This file
└── .htaccess          # Apache configuration (for deployment)
```

## Local Setup Instructions

### Prerequisites
- PHP 7.4 or higher
- Web server (Apache, Nginx, or PHP built-in server)
- Text editor or IDE

### Option 1: Using PHP Built-in Server (Easiest)

1. Clone or download this repository
2. Navigate to the project directory
3. Start the PHP built-in server:
   ```bash
   php -S localhost:8000
   ```
4. Open your browser and visit: `http://localhost:8000`

### Option 2: Using XAMPP/MAMP

1. Install XAMPP (Windows/Linux) or MAMP (Mac)
2. Copy the project folder to the htdocs directory:
   - XAMPP: `C:\xampp\htdocs\riyana-php\`
   - MAMP: `/Applications/MAMP/htdocs/riyana-php/`
3. Start Apache from the control panel
4. Visit: `http://localhost/riyana-php/`

### Option 3: Using Apache/Nginx

1. Configure your web server to serve the project directory
2. Ensure PHP is enabled and working
3. Access the application through your configured domain/port

## GitHub Deployment

### GitHub Pages (Recommended - No server required!)

Since GitHub Pages doesn't support PHP, I've created `index.html` that uses JavaScript to replicate all the PHP functionality:

1. **Create a GitHub repository:**
   ```bash
   git init
   git add .
   git commit -m "Initial commit - WA4E PHP Assignment"
   git branch -M main
   git remote add origin https://github.com/YOUR_USERNAME/RIYANA-DI-PHP.git
   git push -u origin main
   ```

2. **Enable GitHub Pages:**
   - Go to your repository on GitHub
   - Click Settings → Pages
   - Select "Deploy from a branch"
   - Choose "main" branch and "/ (root)" folder
   - Click Save

3. **Access your site:**
   - Your application will be available at: `https://YOUR_USERNAME.github.io/RIYANA-DI-PHP/`
   - The `index.html` file will load automatically

**Note:** The `index.html` version demonstrates the same concepts as the PHP version but runs entirely in the browser using JavaScript.

### For Platforms with PHP Support

#### Heroku Deployment

1. Create a `composer.json` file:
```json
{
    "require": {
        "php": "^7.4.0"
    }
}
```

2. Create a `Procfile`:
```
web: vendor/bin/heroku-php-apache2
```

3. Deploy to Heroku:
```bash
git init
git add .
git commit -m "Initial commit"
heroku create your-app-name
git push heroku main
```

#### InfinityFree / 000webhost Deployment

1. Create an account on a free PHP hosting service
2. Upload files via FTP or file manager
3. Access your application via the provided domain

#### Replit Deployment

1. Create a new PHP Repl on Replit.com
2. Upload or paste your code
3. Run the application
4. Share the generated URL

## Assignment Requirements Met

✅ **Single `index.php` file** - All code contained in one file  
✅ **HTML elements** - Proper HTML5 structure with CSS  
✅ **PHP elements** - Variables, functions, loops, conditionals  
✅ **Pre tag usage** - Multiple examples of `<pre>` tag for formatted output  
✅ **HTML/PHP switching** - Seamless integration throughout the document  
✅ **Basic PHP skills** - Arrays, functions, server variables, string manipulation  

## Screenshots Required for Submission

When submitting this assignment, ensure your screenshots include:

1. **URL bar visible** - Showing the application running on a PHP server
2. **Complete page view** - All sections of the index.php output
3. **Developer console** - If required by instructor
4. **Source code view** - Optional but helpful for grading

**Important:** The application must be running on a PHP server (localhost:8000, localhost/project, etc.) and NOT as a file:// URL.

## Technologies Used

- **PHP 7.4+** - Server-side scripting
- **HTML5** - Document structure
- **CSS3** - Styling and layout
- **JavaScript** - None (pure PHP/HTML demonstration)

## Learning Objectives Demonstrated

- Understanding of PHP syntax and basic programming concepts
- Ability to integrate PHP with HTML
- Knowledge of PHP superglobals ($_SERVER)
- Understanding of arrays, loops, and functions in PHP
- Proper use of HTML tags including `<pre>` for formatting
- Basic web development file structure

## Contact

**Student:** Riyana  
**Course:** WA4E - Building Web Applications in PHP  
**Institution:** University of Michigan (Coursera)

---

*This project is created as part of the Web Applications for Everybody (WA4E) course assignment requirements.* 