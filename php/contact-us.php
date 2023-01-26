<?php 
    include 'dataconnection.inc.php'; 
    include 'session.inc.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <title>IWP | Contact Us</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/cc2ad1b11c.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&family=Raleway:wght@600&family=Roboto:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/text.css">
        <link rel="stylesheet" href="../css/color.css">
        <link rel="stylesheet" href="../css/others.css">
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/buttonLikeAnchor.css">
        <link rel="stylesheet" href="../css/contact-us.css">
    </head>
    <body>
        <?php include 'navbar.inc.php'; ?>

        <h3 class="heading-contact-us heading">Contact Us</h3>
        <main>
            <section class="label-text" style="font-size: 24px">
                <form method="POST" action="">
                    <div class="each-row">
                        <div class="each-input">
                            <label>Name</label>
                            <input class="select" type="text" placeholder="Name" name="feedName"/>
                        </div>
                        <div class="each-input">
                            <label>Email</label>
                            <input class="select" type="email" placeholder="Email" name="feedEmail"/>
                        </div>
                    </div>
                    <div class="each-row">
                        <div class="each-input">
                            <label>Mobile No</label>
                            <input class="select" type="tel" pattern="[0-9]{3}-[0-9]{7}" placeholder="Mobile No" name="feedMobile"/>
                        </div>
                        <div class="each-input">
                            <label>Type of Feedback</label>
                            <select class="input" name="feedType">
                                <option value="" disabled selected hidden>Select Feedback</option>
                                <option value="Inquiry/Request">Inquiry/Request</option>
                                <option value="Compliment">Compliment</option>
                                <option value="Complaint">Complaint</option>
                                <option value="Refund">Refund</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="each-input-2">
                        <label>Subject</label>
                        <input type="text" placeholder="Subject" name="feedSubject">
                    </div>
                    <div class="each-input-2">
                        <label>Messenge</label>
                        <textarea placeholder="Messenge" name="feedMessenge"></textarea>
                    </div>
                    <input class="buttonLike-MyAccount footer-heading" type="submit" name="submitBtn">
                </form>
            </section>
            <section class="sec2 label-text">
                <div class="text-right">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.6213961306653!2d101.64327551470411!3d2.9247005978698217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdb6e5ea5c4e1d%3A0xd990a3ae55a1e768!2sMMU%20Hostel%20HB1!5e0!3m2!1sen!2smy!4v1670508675586!5m2!1sen!2smy" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div style="font-size: 24px;">
                        <h1 style="margin-top: 30px;"><span>I.W.P</span></h1>
                        <h4>Persiaran Multimedia, 63100 <br>Cyberjaya, Selangor</h4>
                        <h4>
                            Phone : <span>1-300-80-0668</span>
                            <br/>
                            Email : <span>nice.support@mmu.edu.my</span>
                        </h4>
                    </div>
                </div>
            </section>
        </main>

        <?php include 'footer.inc.php'; ?>
    </body>
</html>


<!-- After Action -->
<?php
    if (isset($_POST["submitBtn"])) 	
    {
        $feedName = $_POST["feedName"];
        $feedEmail = $_POST["feedEmail"];
        $feedMobile = $_POST["feedMobile"];
        $feedType = $_POST["feedType"];
        $feedSubject = $_POST["feedSubject"];
        $feedMessenge = $_POST["feedMessenge"];

        $pdo->query("INSERT INTO feedback (Feed_Name, Feed_Email, Feed_Mobile, Feed_Type, Feed_Subject, Feed_Messenge) 
		VALUES('$feedName', '$feedEmail', '$feedMobile', '$feedType', '$feedSubject', '$feedMessenge')");
			
        $pdo=null;
?>
        <script>
			alert("Record Saved.");
		</script>
<?php
    }
?>