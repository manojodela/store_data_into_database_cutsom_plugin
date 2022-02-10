<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php

global $wpdb;

$tablename = $wpdb->prefix . 'registerplugin';

if (isset($_GET['delid'])) {
    $delid = $_GET['delid'];
    $wpdb->query("DELETE FROM " . $tablename . " WHERE id=" . $delid);
}

?>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">operation</th>
        </tr>
    </thead>
    <tbody>

        <?php

        $entrylist = $wpdb->get_results("SELECT * FROM " . $tablename);
        if (count($entrylist) > 0) {
            $count = 1;
            foreach ($entrylist as $entry) {
                $id = $entry->id;
                $fname = $entry->firstname;
                $lname = $entry->lastname;
                $email = $entry->email;
                $phone = $entry->phone;

                echo " <tr>
                        <th scope='row'>" . $count . "</th>
                        <td class='text-center'>" . $fname . "</td>
                        <td class='text-center'>" . $lname . "</td>
                        <td class='text-center'>" . $email . "</td>
                        <td class='text-center'>" . $phone . "</td>
                        <td class='text-center'>
                            <button type='button' class= 'btn btn-danger ' > 
                            <a class= 'text-white' href='?page=regentries&delid=" . $id . "'>Delete</a>
                            </button>
                            <button type='button' class='btn btn-primary'> 
                            <a class= 'text-white' href='?page=regupdateentry&updid=" . $id . "'>Update</a>
                            </button>
                        </td>
                    </tr>";
                $counnt++;
            }
        } else {
            echo "<tr><td colspan='5'>No record found</td></tr>";
        }

        ?>

    </tbody>
</table>