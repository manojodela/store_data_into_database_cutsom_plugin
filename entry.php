<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<?php
global $wpdb;
if (isset($_POST['reg_submit'])) {

    $fname  = $_POST['fname'];
    $lname  =  $_POST['lname'];
    $email  =  $_POST['email'];
    $phone  =  $_POST['phone'];


    $tablename = $wpdb->prefix . 'registerplugin';

    if ($fname != '' &&  $lname != '' && $email != '' && $phone != '') {
        $data = $wpdb->get_results("SELECT * FROM " . $tablename . " WHERE firstname = '" . $fname . "' ");
        if (count($data) == 0) {
            $insert_sql = "INSERT INTO " . $tablename . "(firstname,lastname,email,phone) values('" . $fname . "','" . $lname . "', '" . $email . "','" . $phone . "')";
            $wpdb->query($insert_sql);
            echo 'entry saved';
        }
        header('location: http://localhost:8080/wordpress/wp-admin/admin.php?page=regentries');
    } else {
        echo "<br>";
        echo "<h3 class='text-danger text-center'>Please Enter All Fields.</h3> ";
        echo "<br>";
    }
}


?>

<div class="row">
    <div class="col-md-6">
        <h2 class="text-center m-3">Registration Form</h2>

        <form action="" id="register_form" method="post">
            <table class="table">
                <td class="row">
                    <div class="col">
                        <label for="fname" class="col-sm-3">First Name</label>
                        <input type="text" name="fname" class="col-sm-3">
                    </div>
                </td>
                <td class="row">
                    <div class="col">
                        <label for="lname" class="col-sm-3">Last Name</label>
                        <input type="text" name="lname" class="col-sm-3">
                    </div>
                </td>
                <td class="row">
                    <div class="col">
                        <label for="email" class="col-sm-3">Email</label>
                        <input type="text" name="email" class="col-sm-3">
                    </div>
                </td>
                <td class="row">
                    <div class="col">
                        <label for="phone" class="col-sm-3">Phone Number</label>
                        <input type="text" name="phone" class="col-sm-3">
                    </div>
                </td>


            </table>
            <td class="row">
                <div class="col">
                    <input type="submit" value="Submit" name="reg_submit" class="btn btn-primary">
                </div>
            </td>
        </form>
    </div>
</div>