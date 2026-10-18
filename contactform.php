<?php
include('./partials/header-off-canvas.php');
?>
<main class="container pb-5 px-5">
    <div class="col-4 pt-4 align-self-start border-bottom border-3" style="border-bottom-color: #7fa180 !important;">
        <h1>Contact Me</h1>
    </div>
    <div class="col-md-7 col-lg-8 py-4">
        <h3 class="pb-3">Send a Message</h3>
        <form action="<?php echo DEMO_MODE ? HOMEPAGE . 'contact-demo.php' : 'https://api.web3forms.com/submit'; ?>" method="POST">
            <?php if (!DEMO_MODE): ?>
                <input type="hidden" name="access_key" value="<?php echo CONTACT_API_KEY; ?>">
            <?php endif; ?>
            <!-- Form Inputs. Each input must have a name="" attribute -->
            <p>Name:</p>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="name" required>
            </div>
            <p>Contact Email:</p>
            <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" required>
            </div>
            <p>Message:</p>
            <div class="input-group mb-3">
                <textarea class="form-control" name="message" rows="5" style="height:100%;" required></textarea>
            </div>
            <p>
                <span style="font-style: italic;">CONFIDENTIALITY NOTICE:</span> Please keep in mind that this messaging portal is not secure. Although it is unlikely, there is a possibility that the information you include may be intercepted and read by other parties besides the person to whom it is intended. Please keep the information you provide minimal and I will be in touch with you soon to connect further.
            </p>
            <!-- Honeypot Spam Protection -->
            <input type="checkbox" name="botcheck" class="hidden" style="display: none;">

            <!-- Custom Confirmation / Success Page -->
            <!-- <input type="hidden" name="redirect" value="./confirmation.php"> -->

            <button type="submit" name="submit" class="btn btn-light">Submit</button>
        </form>
    </div>
</main>
<?php include('./partials/footer.php'); ?>