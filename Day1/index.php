<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>
    <h3>Contact Form</h3>
    <div id="after_submit"></div>
    <form id="contact_form" action="#" method="POST" enctype="multipart/form-data">
        <?php

        require_once("config.php");
        $errors = array();
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $message = isset($_POST["message"]) ? $_POST["message"] : "";
        $i = 0;
        if (!empty($_POST["submit"])) {
            if (empty($name)) {
                $errors[$i] = "Name is empty";
                $i++;
            } elseif (strlen($name) > $max_length_name) {
                $errors[$i] = "Name is more than 100 characters";
                $i++;
            }
            if (empty($email)) {
                $errors[$i] = "Email is empty";
                $i++;
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[$i] = "Email is not valid";
                $i++;
            }
            if (empty($message)) {
                $errors[$i] = "Message is empty";
                $i++;
            } elseif (strlen($message) > $max_length_message) {
                $errors[$i] = "Message is more than 255 characters";
                $i++;
            }

            if (empty($errors)) {
                echo "<center><b>Thank you for contacting us</b></center>";
                echo "<center><b>Name:</b>$name</center>";
                echo "<center><b>Email:</b>$email</center>";
                echo "<center><b>Message:</b>$message</center>";
            } else {
                foreach ($errors as $error) {
                    echo "<h5>$error</h5>";
                }
            }
        }

            var_dump($errors);
        ?>
        <div class="row">
            <label class="required" for="name">Your name:</label><br />
            <input id="name" class="input" name="name" type="text" value="<?php echo $name; ?>" size="30" /><br />
        </div>
        <div class="row">
            <label class="required" for="email">Your email:</label><br />
            <input id="email" class="input" name="email" type="text" value="<?php echo $email; ?>" size="30" /><br />
        </div>
        <div class="row">
            <label class="required" for="message">Your message:</label><br />
            <textarea id="message" class="input" name="message" rows="7" cols="30"><?php echo $message; ?></textarea><br />
        </div>
        <input id="clear" name="clear" type="reset" value="Clear form" />
        <input id="submit" name="submit" type="submit" value="Send email" />
    </form>
</body>
</html>