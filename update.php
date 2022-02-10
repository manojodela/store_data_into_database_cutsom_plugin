<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<?php
global $wpdb;

$tablename = $wpdb->prefix . "registerplugin";
$updid = $_GET['updid'];

$entriesList = $wpdb->get_results("SELECT * FROM " . $tablename . " where id =" . $updid);
if (count($entriesList) > 0) {
    $count = 1;
    foreach ($entriesList as $entry) {
        $id = $entry->id;
        $fname = $entry->firstname;
        $lname = $entry->lastname;
        $email = $entry->email;
        $phone = $entry->phone;
    }
}

if (isset($_POST['upd_submit'])) {
    $tablename = $wpdb->prefix . "registerplugin";

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // update record
    $updid = $_GET['updid'];
    $wpdb->query("UPDATE `wp_registerplugin` SET `firstname` = '$fname', `lastname` = '$lname', `email` = '$email', `phone` = '$phone' WHERE `id` = $updid ");
    header('location: http://localhost:8080/wordpress/wp-admin/admin.php?page=regentries');
}



?>

<div class="row">
    <div class="col-md-6 text-center">
        <h2>UpdateRegistration Form</h2>
        <form action="" id="register_form" method="post">
            <table class="table">
                <td class="row">
                    <div class="col">
                        <label for="fname" class="col-sm-3">First Name</label>
                        <input type="text" name="fname" class="col-sm-3" value='<?php echo $fname; ?>'>
                    </div>
                </td>
                <td class="row">
                    <div class="col">
                        <label for="lname" class="col-sm-3">Last Name</label>
                        <input type="text" name="lname" class="col-sm-3" value="<?php echo $lname; ?>">
                    </div>
                </td>
                <td class="row">
                    <div class="col">
                        <label for="email" class="col-sm-3">Email</label>
                        <input type="email" name="email" class="col-sm-3" value="<?php echo $email; ?>">
                    </div>
                </td>
                <td class="row">
                    <div class="col">
                        <label for="phone" class="col-sm-3">Phone Number</label>
                        <input type="number" name="phone" class="col-sm-3" value="<?php echo $phone; ?>">
                    </div>
                </td>


            </table>
            <td class="row">
                <div class="col">
                    <input type="submit" value="Submit" name="upd_submit" class="btn btn-primary">
                </div>
            </td>
        </form>
    </div>
</div>