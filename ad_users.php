<?php
require './defines/db_conn.php';
require './defines/functions.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);

if (!isAdmin() && !isManager()) {
    header("Location:./index.php");
    // exit;
}

$conn = new mysqli($host, $user, $pass, $db);

$UserID = $_SESSION['ClientID'];

$CurrentUser = getUserById($UserID);
$MyAttorneyID = $CurrentUser['attorneyID'];

$info = '';

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Users - US PIPE Immigration Program</title>
        <link rel="shortcut icon" href="./assets/images/Favicon.webp" type="image/x-icon">
        <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="./assets/css/style.css?v=7">
    </head>

    <body class="main-form-page roboto lang-<?php echo getLanguage(); ?>">
        <main class="py-5">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <?php
                    if (getLanguage() == 'english') {
                        ?>
                        <a href="?lang=spanish"
                            class="btn bg-primary d-flex gap-2 text-black align-items-center fw-bold btn-change btn mx-auto"><img
                                src="./assets/images/change.svg" alt="Change"> <span>Espanol</span></a>
                        <?php
                    } else {
                        ?>
                        <a href="?lang=english"
                            class="btn bg-primary d-flex gap-2 text-black align-items-center fw-bold btn-change btn mx-auto"><img
                                src="./assets/images/change.svg" alt="Change"> <span>English</span></a>
                        <?php
                    }
                    ?>
                </div>
                <div class="btn-group mx-auto w-100 my-4" role="group" aria-label="Basic example">
                    <a href="index.php" class="btn py-2 btn-primary"><span class="en">HOME</span> <span
                            class="es">INICIO</span></a>
                    <a href="fillPdfG8.php" class="btn py-2 btn-primary"><span class="en">Dashboard</span> <span
                            class="es">Panel</span></a>
                    <a href="ad_users.php" class="btn py-2 btn-primary active"><span class="en">Users</span> <span
                            class="es">Usuarios</span></a>
                    <a href="logout.php" class="btn py-2 btn-outline-danger"><span class="en">LOGOUT</span> <span
                            class="es">CERRAR SESIÓN</span></a>
                </div>
                <h2 class="text-center form-title fw-bold inter mb-4">
                    Assigned Users
                </h2>
                <?php echo $info; ?>
                <div class="sec-2 mb-4">
                    <fieldset class="px-sm-5 px-4 py-4 table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Birthday</th>
                                    <th>Verified</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isAdmin()) {
                                    $sql1 = "SELECT 
                                        *
                                        FROM 
                                        `user`";
                                } else if (isManager()) {
                                    $CurrentUser = getUserById($_SESSION['ClientID']);
                                    $MyAttorneyID = $CurrentUser['attorneyID'];
                                    $sql1 = "SELECT 
                                                *
                                            FROM 
                                                `user` u
                                            WHERE 
                                                u.attorneyID = '$MyAttorneyID' AND u.status IS NULL
                                            ";
                                }

                                $result1 = $conn->query($sql1);
                                if ($result1->num_rows > 0) {
                                    while ($row1 = $result1->fetch_assoc()) {
                                        $birthday = ($row1['birthday'] != null) ? $row1['birthday'] : 'Null';
                                        $verified = ($row1['verified'] == 1) ? 'Yes' : 'No';
                                        echo '<tr><td>' . $row1['UserID'] . '</td><td>' . $row1['firstName'] . '</td><td>' . $row1['lastName'] . '</td><td>' . $row1['email'] . '</td><td>' . $row1['phone'] . '</td><td>' . $birthday . '</td><td>' . $verified . '</td><td>' . ucfirst($row1['status']) . '</td><td><div class="d-flex align-items-center gap-1"><a class="btn btn-primary btn-sm" href="user_payments.php?UserID='.$row1['UserID'].'">Payments</a><a class="btn btn-info ms-1 btn-sm" href="user_documents.php?UserID='.$row1['UserID'].'">Documents</a></div></td></tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
                </form>
            </div>
        </main>
        <script src="./assets/js/jquery-3.6.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script src="./assets/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
            integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBffT74mo5XglwbbcSJ08wZl5F1WkyQhVw&libraries=places"></script>
        <script src="./assets/js/script.js?v=7"></script>
    </body>

</html>