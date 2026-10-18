<?php include('./partials/header.php');?>
<main class="container">
    <div class="col-4 align-self-start border-bottom border-3">
        <h1>Contact Skye</h1>
    </div>
    <div class="col-md-7 col-lg-8 my-3">
        <form action="https://api.web3forms.com/submit" method="POST">
            <!-- Replace with your Access Key -->
            <input type="hidden" name="access_key" value="d285ca87-eab7-4638-9ecf-4c8ba802898a">

            <!-- Form Inputs. Each input must have a name="" attribute -->
            <h4>Name:</h4>
            <input type="text" name="name" required>
            <h4>Contact Email:</h4>
            <input type="email" name="email" required>
            <h4>Message:</h4>
            <textarea name="message" placeholder="Your message here: " required></textarea>
            <p>
            <span style="font-style: italic;">CONFIDENTIALITY NOTICE:</span> Please keep in mind that this messaging portal is not secure. Although it is unlikely, there is a possibility that the information you include may be intercepted and read by other parties besides the person to whom it is intended. Please keep the information you provide minimal and I will be in touch with you soon to connect further.
            </p>

            <!-- Honeypot Spam Protection -->
            <input type="checkbox" name="botcheck" class="hidden" style="display: none;">

            <!-- Custom Confirmation / Success Page -->
            <!-- <input type="hidden" name="redirect" value="./confirmation.php"> -->

            <button type="submit">Submit Message</button>
        </form>
    </div>
</main>
<?php include('./partials/footer.php');?>