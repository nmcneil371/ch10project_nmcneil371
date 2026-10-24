<!DOCTYPE html>
<!--
    Name: Naquan McNeil
    Date: October 24, 2026
    File: index.php
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Building a Dynamic Form with PHP</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <main>
        <h1>Building a Dynamic Form with PHP</h1>
        <p>Naquan McNeil</p>
        <p>October 24, 2026</p>

        <!-- Send the required fields to the confirmation page. -->
        <form action="confirm.php" method="post">
            <p>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </p>

            <p>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </p>

            <p>
                <label for="message">Message:</label>
                <textarea id="message" name="message"
                    rows="5" required></textarea>
            </p>

            <input type="submit" value="Submit">
        </form>
    </main>
</body>
</html>
