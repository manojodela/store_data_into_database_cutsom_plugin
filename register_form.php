<?php

function register_form()
{

    ob_start();
?>
    <div class="row">
        <div class="col-md-6">
            <form action="" class="register_form" method="post">
                <div>
                    <label for="fname">First Name</label>
                    <input type="text" id="fname">
                </div>
                <div>
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email">
                </div>
                <div>
                    <label for="phone">Phone Number</label>
                    <input type="number" id="phone">
                </div>

                <div>
                    <input type="submit" value="Submit" name="reg_submit">
                </div>
            </form>
        </div>
    </div>

<?php
    return  ob_get_clean();
}
