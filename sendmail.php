<?php
$email = $_POST['email'];
$name = $_POST['name'];
$message = wordwrap($_POST['message'], 70, "\r\n");
$to = "matthew.stevens@mediadesignschool.com";
$headers = array(
    'From' => $email,
    'Reply-To' => $email,
    'X-Mailer' => 'PHP/'.phpversion()
);

$mailSent = mail($to, $subject, $message, $headers);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Scrolling Demo</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <div class="wrapper">
            <h1>Page Scrolling Demo</h1>
            <nav>
                <ul>
                    <li><a href="index.html#home">Home</a></li>
                    <li><a href="index.html#work">Work</a></li>
                    <li><a href="index.html#about">About</a></li>
                    <li><a href="index.html#contact">Contact</a></li>
                </ul>
            </nav>
            <div class="hamburger">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
    </header>

    <main>
        <section id="contact">
            <div class="wrapper">
                <h2>Contact</h2>
                <form class="contact-form" action="index.html#contact" method="post">
                    <p>
                        <?php
                            if($mailSent){
                                echo "Thanks $name, your message was successfully sent and I'll reply as soon as I can";
                            }else{
                                echo "Oops, sorry $name, but there was an error sending your message. Your message is important to me, though, so please try again later";
                            }
                        ?>
                    </p>
                    <p>
                        <button type="submit">OK</button>
                    </p>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="wrapper">
            <p>&copy; Media Design School 2021</p>
        </div>
    </footer>
    <script src="js/noframework.waypoints.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>