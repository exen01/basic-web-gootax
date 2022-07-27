<?php
include __DIR__ . '/util.php';

if (!check_auth()) {
    header('location: login.php');
    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <form class="row justify-content-center" action="feedback-controller.php" method="post">
        <h2 class="col-3 mb-3">Feedback</h2>
        <div class="w-100"></div>
        <?php
        showError();
        showMessage();
        ?>
        <div class="w-100"></div>
        <div class="col-3 mb-3">
            <label for="inputText1" class="form-label">Subject</label>
            <input name="subject" type="text" class="form-control" id="inputText1" required>
        </div>
        <div class="w-100"></div>
        <div class="col-3 mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Comments</label>
            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="w-100"></div>
        <div class="col-3 mb-3">
            <span>Were you able to find what you needed?</span>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="find" value="1" id="flexRadioDefault1" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    Yes
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="find" value="0" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    No
                </label>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col-3 mb-3">
            <span>Where did you hear about us?</span>
            <div class="form-check">
                <input name="hearFrom[]" class="form-check-input" type="checkbox" value="search" id="checkBox1">
                <label class="form-check-label" for="checkBox1">
                    Search Engine
                </label>
            </div>
            <div class="form-check">
                <input name="hearFrom[]" class="form-check-input" type="checkbox" value="referral" id="checkBox2">
                <label class="form-check-label" for="checkBox2">
                    Referral
                </label>
            </div>
            <div class="form-check">
                <input name="hearFrom[]" class="form-check-input" type="checkbox" value="ads" id="checkBox3">
                <label class="form-check-label" for="checkBox3">
                    Online Ads
                </label>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col-3 mb-3">
            <label for="ratingSelect" class="form-label">How would you rate our service?</label>
            <select name="rating" class="form-select" id="ratingSelect">
                <option selected>Choose...</option>
                <option value="1">Terrible</option>
                <option value="2">Not bad</option>
                <option value="3">Neutral</option>
                <option value="4">Good</option>
                <option value="5">Great</option>
            </select>
        </div>
        <div class="w-100"></div>
        <div class="col-3 mb-3">
            <button name="fb-button" type="submit" class="btn btn-primary">Send</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>
</body>
</html>