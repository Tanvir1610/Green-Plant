<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = filter_var(trim($_POST["name"]),FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]),FILTER_SANITIZE_EMAIL);
    $message = filter_var(trim($_POST["message"]),FILTER_SANITIZE_STRING);

    if (empty($name) || empty($email) || empty($message) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
        http_response_code(400);
        echo "Please complete the form and try again.";
        exit;
    }

    $recipient = "vhoratanvir1610@gmail.com";

    $subject = "New contact form submission form $name";

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $email_headers = "Form: $name <$email>";

    if (mail($recipient, $subject, $email_content, $email_headers)){
        http_response_code(200);
        echo "Thank you! Your message has been sent.";
    }
    else{
        http_response_code(500);
        echo "OOPS! Something went wrong and we couldn't send you message.";
    }
}
else {
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}

?>