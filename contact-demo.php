<?php include 'partials/header-off-canvas.php'; ?>

<?php
$name = htmlspecialchars(trim($_POST['name'] ?? ''));
?>

<div class="container my-5">
    <h2>Thanks<?php echo $name ? ', ' . $name : ''; ?>!</h2>
    <p>This is a demo site, so your message was not sent.</p>
    <a href="<?php echo HOMEPAGE; ?>" class="btn btn-light">Back to the site</a>
</div>

<?php include('./partials/footer.php'); ?>