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

$LoggedInUserID = $_SESSION['ClientID'];
$info = '';
// print_r($_REQUEST);
$payments = [];
if (isset($_REQUEST['UserID'])) {
    $UserID = $_REQUEST['UserID'];

    if (isset($_POST['createPayment'])) {
        // Retrieve form data
        $trxDate = $_POST['TrxDate'];
        $paymentGateway = $_POST['PaymentGateway'];
        $paymentCleared = isset($_POST['PaymentCleared']) ? 1 : 0; // Convert checkbox value to 1 or 0
        $amount = $_POST['Amount'];
        $currency = $_POST['Currency'];
        $type = $_POST['Type'];

        // Debugging output
        echo "TrxDate: $trxDate, PaymentGateway: $paymentGateway, PaymentCleared: $paymentCleared, Amount: $amount, Currency: $currency, Type: $type, ClientID: $UserID";

        // Prepare the SQL insert statement
        $sql = "INSERT INTO payment (
                    TrxDate,
                    PaymentGateway,
                    PaymentCleared,
                    Amount,
                    Currency,
                    `type`,
                    ClientID
                ) VALUES (
                    :trxDate,
                    :paymentGateway,
                    :paymentCleared,
                    :amount,
                    :currency,
                    :type,
                    :clientID
                )";

        try {
            // Prepare the statement
            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':trxDate', $trxDate);
            $stmt->bindParam(':paymentGateway', $paymentGateway);
            $stmt->bindParam(':paymentCleared', $paymentCleared, PDO::PARAM_INT);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':currency', $currency);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':clientID', $UserID);

            // Execute the statement
            if ($stmt->execute()) {
                header('location: user_payments.php?UserID=' . $UserID . '&create=1');
            } else {
                $info = "<div class='alert alert-danger'>Failed to create payment.</div>";
            }
        } catch (PDOException $e) {
            $info = "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
        }
    } else if (isset($_POST['updatePayment'])) {
        // Retrieve form data
        $paymentID = $_POST['PaymentID'];
        $trxDate = $_POST['TrxDate'];
        $paymentGateway = $_POST['PaymentGateway'];
        $paymentCleared = isset($_POST['PaymentCleared']) ? 1 : 0; // Convert checkbox value to 1 or 0
        $amount = $_POST['Amount'];
        $currency = $_POST['Currency'];
        $type = $_POST['Type'];

        // Prepare the SQL update statement
        $sql = "UPDATE payment SET 
                    TrxDate = :trxDate,
                    PaymentGateway = :paymentGateway,
                    PaymentCleared = :paymentCleared,
                    Amount = :amount,
                    Currency = :currency,
                    type = :type
                WHERE payment_id = :paymentID";

        try {

            // Prepare the statement
            $stmt = $pdo->prepare($sql);

            // echo "PaymentID: $paymentID, TrxDate: $trxDate, PaymentGateway: $paymentGateway, PaymentCleared: $paymentCleared, Amount: $amount, Currency: $currency, Type: $type";

            // Bind parameters
            $stmt->bindParam(':trxDate', $trxDate);
            $stmt->bindParam(':paymentGateway', $paymentGateway);
            $stmt->bindParam(':paymentCleared', $paymentCleared, PDO::PARAM_INT);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':currency', $currency);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':paymentID', $paymentID);

            // Execute the statement
            if ($stmt->execute()) {
                $info = "<div class='alert alert-success'>Payment updated successfully.</div>";
            } else {
                $info = "<div class='alert alert-danger'>Failed to update payment.</div>";
            }
        } catch (PDOException $e) {
            $info = "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
        }
    } elseif (isset($_GET['delete'])) {
        $paymentID = $_GET['delete'];
        $sql = "DELETE FROM payment WHERE payment_id = :paymentID";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':paymentID', $paymentID);
            if ($stmt->execute()) {
                header('location: user_payments.php?UserID=' . $UserID);
            } else {
                $info = "<div class='alert alert-danger'>Failed to delete payment.</div>";
            }
        } catch (PDOException $e) {
            $info = "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
        }
    } else if (isset($_GET['create']) && $_GET['create'] == 1) {
        $info = "<div class='alert alert-success'>Payment created successfully.</div>";
    }

    $payments = getUserPayments($UserID);
    $DesiredUser = getUserById($UserID);

} else {
    header('location:ad_users.php');
}
$CurrentUser = getUserById($LoggedInUserID);
$MyAttorneyID = $CurrentUser['attorneyID'];


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
        <link rel="stylesheet" href="./assets/css/style.css?v=6">
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
                    <?php echo $DesiredUser['firstName'] . ' ' . $DesiredUser['lastName'] . '\'s Payments'; ?>
                </h2>
                <?php echo $info; ?>
                <div class="sec-2 mb-4">
                    <fieldset class="px-sm-5 px-4 py-4 table-responsive">
                        <div class="text-end">
                            <button class="ms-auto btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addPaymentModal"> Add Payment </button>
                        </div>
                        <?php
                        if ($DesiredUser) {
                            ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Payment ID</th>
                                        <th>Trx Date</th>
                                        <th>Gateway</th>
                                        <th>Cleared?</th>
                                        <th>Amount</th>
                                        <th>Currency</th>
                                        <th>Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (!empty($payments)) {
                                        foreach ($payments as $payment) {
                                            ?>
                                            <tr>
                                                <td><?php echo $payment['payment_id']; ?></td>
                                                <td><?php echo date('m-d-Y', strtotime($payment['TrxDate'])); ?></td>
                                                <td><?php echo $payment['PaymentGateway']; ?></td>
                                                <td><?php echo $payment['PaymentCleared'] ? 'Yes' : 'No'; ?></td>
                                                <td><?php echo $payment['Amount']; ?></td>
                                                <td><?php echo $payment['Currency']; ?></td>
                                                <td><?php echo $payment['type']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary edit-payment-btn"
                                                        data-payment-id="<?php echo $payment['payment_id']; ?>"
                                                        data-trx-date="<?php echo $payment['TrxDate']; ?>"
                                                        data-payment-gateway="<?php echo $payment['PaymentGateway']; ?>"
                                                        data-payment-cleared="<?php echo $payment['PaymentCleared']; ?>"
                                                        data-amount="<?php echo $payment['Amount']; ?>"
                                                        data-currency="<?php echo $payment['Currency']; ?>"
                                                        data-type="<?php echo $payment['type']; ?>" data-bs-toggle="modal"
                                                        data-bs-target="#editPaymentModal">Edit</button>
                                                    <a href="?UserID=<?php echo $UserID; ?>&delete=<?php echo $payment['payment_id']; ?>"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('You really want to delete this payment?');">Delete</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="alert alert-warning">No payments found for the user!</div>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            ?>
                            <div class="alert alert-danger">User not found!</div>
                            <?php
                        }
                        ?>
                    </fieldset>
                </div>
                </form>
            </div>
        </main>
        <!-- Edit Payment Modal -->
        <div class="modal fade" id="editPaymentModal" tabindex="-1" aria-labelledby="editPaymentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPaymentModalLabel">Edit Payment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editPaymentForm" method="POST" action="?UserID=<?php echo $UserID; ?>">
                            <input type="hidden" id="editPaymentID" name="PaymentID">
                            <div class="mb-3">
                                <label for="editTrxDate" class="form-label">Transaction Date</label>
                                <div class="input-div">
                                    <input type="date" class="form-control" id="editTrxDate" name="TrxDate">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="editPaymentGateway" class="form-label">Payment Gateway</label>
                                <div class="input-div">
                                    <select class="form-select" id="editPaymentGateway" name="PaymentGateway">
                                        <option value="credit-card">Credit Card</option>
                                        <option value="zelle">Zelle</option>
                                        <option value="check-via-mail">Check via Mail</option>
                                        <option value="in-person">In-Person</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="editPaymentCleared" class="form-label">Payment Cleared</label>
                                <div class="input-div">
                                    <select class="form-select" id="editPaymentCleared" name="PaymentCleared">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="editAmount" class="form-label">Amount</label>
                                <div class="input-div">
                                    <input type="number" class="form-control" id="editAmount" name="Amount" step="0.01">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="editCurrency" class="form-label">Currency</label>
                                <div class="input-div">
                                    <input type="text" class="form-control" id="editCurrency" name="Currency">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="editType" class="form-label">Type</label>
                                <div class="input-div">
                                    <select class="form-select" id="editType" name="Type">
                                        <option value="Initial Fee">Initial Fee</option>
                                        <option value="Translation Fee">Translation Fee</option>
                                        <option value="Case Balance">Case Balance</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="updatePayment">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Payment Modal -->
        <div class="modal fade" id="addPaymentModal" tabindex="-1" aria-labelledby="addPaymentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPaymentModalLabel">Add New Payment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addPaymentForm" method="POST" action="?UserID=<?php echo $UserID; ?>">
                            <div class="mb-3">
                                <label for="addTrxDate" class="form-label">Transaction Date</label>
                                <div class="input-div">
                                    <input type="date" class="form-control" id="addTrxDate" name="TrxDate">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="addPaymentGateway" class="form-label">Payment Gateway</label>
                                <div class="input-div">
                                    <select class="form-select" id="addPaymentGateway" name="PaymentGateway">
                                        <option value="credit-card">Credit Card</option>
                                        <option value="zelle">Zelle</option>
                                        <option value="check-via-mail">Check via Mail</option>
                                        <option value="in-person">In-Person</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="addPaymentCleared" class="form-label">Payment Cleared</label>
                                <div class="input-div">
                                    <select class="form-select" id="addPaymentCleared" name="PaymentCleared">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="addAmount" class="form-label">Amount</label>
                                <div class="input-div">
                                    <input type="number" class="form-control" id="addAmount" name="Amount" step="0.01">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="addCurrency" class="form-label">Currency</label>
                                <div class="input-div">
                                    <input type="text" class="form-control" value="USD" id="addCurrency"
                                        name="Currency">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="addType" class="form-label">Type</label>
                                <div class="input-div">
                                    <select class="form-select" id="addType" name="Type">
                                        <option value="Initial Fee">Initial Fee</option>
                                        <option value="Translation Fee">Translation Fee</option>
                                        <option value="Case Balance">Case Balance</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="createPayment">Add Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="./assets/js/jquery-3.6.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script src="./assets/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
            integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBffT74mo5XglwbbcSJ08wZl5F1WkyQhVw&libraries=places"></script>
        <script src="./assets/js/script.js?v=6"></script>
        <script>
            $(document).ready(function () {
                // Handle Edit button click
                $('.edit-payment-btn').on('click', function () {
                    // Get data from button attributes
                    var paymentID = $(this).data('payment-id');
                    var trxDate = $(this).data('trx-date');
                    var paymentGateway = $(this).data('payment-gateway');
                    var paymentCleared = $(this).data('payment-cleared');
                    var amount = $(this).data('amount');
                    var currency = $(this).data('currency');
                    var type = $(this).data('type');

                    // Set data in the modal form
                    $('#editPaymentID').val(paymentID);
                    $('#editTrxDate').val(trxDate);
                    $('#editPaymentGateway').val(paymentGateway);
                    $('#editPaymentCleared').val(paymentCleared);
                    $('#editAmount').val(amount);
                    $('#editCurrency').val(currency);
                    $('#editType').val(type);
                });

                $("#editPaymentForm").validate({
                    errorClass: "msg-error",
                    errorElement: "span",
                    rules: {
                        TrxDate: {
                            required: true
                        },
                        PaymentGateway: {
                            required: true
                        },
                        PaymentCleared: {
                            required: true
                        },
                        Amount: {
                            required: true,
                            number: true
                        },
                        Currency: {
                            required: true
                        },
                        Type: {
                            required: true
                        }
                    },
                    messages: {
                        TrxDate: {
                            required: '<span class="en">Transaction date is required</span><span class="es">La fecha de transacción es requerida</span>'
                        },
                        PaymentGateway: {
                            required: '<span class="en">Payment gateway is required</span><span class="es">Se requiere un método de pago</span>'
                        },
                        PaymentCleared: {
                            required: '<span class="en">Please specify if payment is cleared</span><span class="es">Por favor, especifique si el pago está confirmado</span>'
                        },
                        Amount: {
                            required: '<span class="en">Amount is required</span><span class="es">El monto es requerido</span>',
                            number: '<span class="en">Please enter a valid amount</span><span class="es">Por favor, ingrese un monto válido</span>'
                        },
                        Currency: {
                            required: '<span class="en">Currency is required</span><span class="es">La moneda es requerida</span>'
                        },
                        Type: {
                            required: '<span class="en">Type is required</span><span class="es">El tipo es requerido</span>'
                        }
                    },
                    highlight: function (element) {
                        $(element).addClass('input-error');
                    },
                    unhighlight: function (element) {
                        $(element).removeClass('input-error');
                    },
                    errorPlacement: function (error, element) {
                        error.insertAfter(element);
                    }
                });


                $("#addPaymentForm").validate({
                    errorClass: "msg-error",
                    errorElement: "span",
                    rules: {
                        TrxDate: {
                            required: true
                        },
                        PaymentGateway: {
                            required: true
                        },
                        PaymentCleared: {
                            required: true
                        },
                        Amount: {
                            required: true,
                            number: true
                        },
                        Currency: {
                            required: true
                        },
                        Type: {
                            required: true
                        }
                    },
                    messages: {
                        TrxDate: {
                            required: '<span class="en">Transaction date is required</span><span class="es">La fecha de transacción es requerida</span>'
                        },
                        PaymentGateway: {
                            required: '<span class="en">Payment gateway is required</span><span class="es">Se requiere un método de pago</span>'
                        },
                        PaymentCleared: {
                            required: '<span class="en">Please specify if payment is cleared</span><span class="es">Por favor, especifique si el pago está confirmado</span>'
                        },
                        Amount: {
                            required: '<span class="en">Amount is required</span><span class="es">El monto es requerido</span>',
                            number: '<span class="en">Please enter a valid amount</span><span class="es">Por favor, ingrese un monto válido</span>'
                        },
                        Currency: {
                            required: '<span class="en">Currency is required</span><span class="es">La moneda es requerida</span>'
                        },
                        Type: {
                            required: '<span class="en">Type is required</span><span class="es">El tipo es requerido</span>'
                        }
                    },
                    highlight: function (element) {
                        $(element).addClass('input-error');
                    },
                    unhighlight: function (element) {
                        $(element).removeClass('input-error');
                    },
                    errorPlacement: function (error, element) {
                        error.insertAfter(element);
                    }
                });

            });        
        </script>
    </body>

</html>