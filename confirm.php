<!DOCTYPE html>
<!--
    Name: Naquan McNeil
    Date: October 24, 2026
    File: confirm.php
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Confirmation</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <main>
        <h1>Building a Dynamic Form with PHP</h1>
        <p>Naquan McNeil</p>
        <p>October 24, 2026</p>

        <?php
        // Check whether the form was submitted using POST.
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Store the submitted values and remove extra whitespace.
            $name = trim($_POST["name"] ?? "");
            $email = trim($_POST["email"] ?? "");
            $message = trim($_POST["message"] ?? "");

            // Remove unwanted characters from the email address.
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            // Check for missing fields and an invalid email address.
            if ($name === "" || $email === "" || $message === "") {
                $confirmation = "Please complete all fields.";
                $class = "error";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $confirmation = "Please enter a valid email address.";
                $class = "error";
            } else {
                // Escape submitted text before displaying it as HTML.
                $safeName = htmlspecialchars($name, ENT_QUOTES, "UTF-8");
                $safeEmail = htmlspecialchars($email, ENT_QUOTES, "UTF-8");
                $safeMessage = htmlspecialchars($message, ENT_QUOTES, "UTF-8");

                $confirmation = "Thank you, $safeName! Your form was submitted successfully.";
                $class = "success";
            }

            // Display the appropriate confirmation or error message.
            echo "<div class=\"confirmation $class\">";
            echo "<p>$confirmation</p>";

            // Display the submitted details only after validation succeeds.
            if ($class === "success") {
                echo "<p><strong>Name:</strong> $safeName</p>";
                echo "<p><strong>Email:</strong> $safeEmail</p>";
                echo "<p><strong>Message:</strong><br>"
                    . nl2br($safeMessage) . "</p>";
            }

            echo "</div>";
        } else {
            // Explain what to do if this page is opened without submitting.
            echo '<div class="confirmation error">';
            echo "<p>Please submit the form first.</p>";
            echo "</div>";
        }
        ?>

        <p><a href="index.php">Return to the form</a></p>
    </main>
</body>
</html>
