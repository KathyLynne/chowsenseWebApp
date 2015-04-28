<?php
/**
 * Created by IntelliJ IDEA.
 * User: thecr_000
 * Date: 2015-04-28
 * Time: 4:05 PM
 */
include '/includes/header.php';
use Parse\ParseUser;
?>

<div class="row">
    <div class="col-md-6 col-md-push-3 col-xs-12">
        <form method='post'>
            <div class='form-group'>
            <label for='passwordChange'>Where should we send the reset instructions?</label>
            <input type='text' placeholder='email' name='passwordChange' class='form-control'>
            </div>
            <button type='submit' class='btn btn-success' name="resetPassword">Change Name!</button>
    </div>
    </form>
    </div>
</div>

<?php

    if(isset($_POST['resetPassword']) && !empty($_POST['passwordChange'])) {
        try {
            ParseUser::requestPasswordReset($_POST['passwordChange']);
            // Password reset request was sent successfully
            echo '<script type="text/javascript">alert("Please Check Your email."); location ="/ChowSenseWebApp/search.php";</script>';
        } catch (ParseException $ex) {
            // Password reset failed, check the exception message
        }
    }
?>


<?php
include '/includes/footer.php';
?>
