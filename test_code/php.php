<form action="php.php" onsubmit="return validateForm();" method="post">
    <div class="row collapse">
        <div class="large-2 columns">
            <label class="inline">First Name</label>
        </div>
        <div class="large-10 columns">
            <input type="text" id="firstName" name="firstName" placeholder="Jane" required>
        </div>
    </div>

    <div class="row collapse">
        <div class="large-2 columns">
            <label class="inline">Last Name</label>
        </div>
        <div class="large-10 columns">
            <input type="text" id="lastName" name="lastName" placeholder="Smith" required>
        </div>
    </div>

    <div class="row collapse">
        <div class="large-2 columns">
            <label class="inline"> Your Email</label>
        </div>
        <div class="large-10 columns">
            <input type="text" name="email" id="yourEmail" placeholder="jane@smithco.com" required>
        </div>
    </div>
    <label>Your Message</label>
    <textarea rows="8" name="message" required></textarea>
    <br><br>
    <button type="submit" class="radius button">Submit</button>
</form>



<?php
$ToEmail = 'salahakrim23@gmail.com';
$EmailSubject = 'BGM Contact Form';
$mailheader = "From: " . $_POST["email"] . "\r\n";
$mailheader = "Reply-To: " . $_POST["email"] . "\r\n Content-type: text/html; charset=iso-8859-1 \r\n";

$MESSAGE_BODY = "First Name: " . $_POST["firstName"] . "";
$MESSAGE_BODY .= "Last Name: " . $_POST["lastName"] . "";
$MESSAGE_BODY .= "Email: " . $_POST["email"] . "";
$MESSAGE_BODY .= "Comment: " . nl2br($_POST["message"]) . "";
mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die("Failure");
header("location: php.php?mailsend");
?>