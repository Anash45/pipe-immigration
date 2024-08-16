<?php
require './defines/db_conn.php';
require './defines/functions.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// error_reporting(0);

if (!isAdmin() && !isManager()) {
    header("Location:./index.php");
    // exit;
}

$conn = new mysqli($host, $user, $pass, $db);

$LoggedInUserID = $_SESSION['ClientID'];
$info = '';
// print_r($_REQUEST);
$documents = [];
if (isset($_REQUEST['UserID'])) {
    $UserID = $_GET['UserID'];
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve and sanitize form data
        $documentID = isset($_POST['editDocumentID']) ? intval($_POST['editDocumentID']) : 0;
        $documentStatus = $_POST['editDocumentStatus'] ?? null;
        $translationNeeded = $_POST['editTranslationNeeded'] ?? null;
        $quality = $_POST['editDocumentQuality'] ?? null;
        $dateToTranslator = ($_POST['editDateToTranslator'] != '' && $_POST['editDateToTranslator'] != null) ? date('Y-m-d', strtotime($_POST['editDateToTranslator'])) : null;
        $dateFromTranslator = ($_POST['editDateFromTranslator'] != '' && $_POST['editDateFromTranslator'] != null) ? date('Y-m-d', strtotime($_POST['editDateFromTranslator'])) : null;
        $documentType = $_POST['DocumentType'] ?? 'default'; // Default prefix if DocumentType is not set

        // Update user_document table
        $updateQuery = "UPDATE user_document 
                    SET DocumentStatus = :documentStatus, 
                        Quality = :quality, 
                        TranslationNeeded = :TranslationNeeded,
                        DateToTranslator = :dateToTranslator, 
                        DateFromTranslator = :dateFromTranslator 
                    WHERE UserID = :userID AND DocumentID = :documentID";

        $stmt = $pdo->prepare($updateQuery);
        $stmt->execute([
            ':documentStatus' => $documentStatus,
            ':quality' => $quality,
            ':TranslationNeeded' => $translationNeeded,
            ':dateToTranslator' => $dateToTranslator,
            ':dateFromTranslator' => $dateFromTranslator,
            ':userID' => $UserID,
            ':documentID' => $documentID,
        ]);

        // print_r($_FILES['editFilesInput']);
        // Handle file uploads
        if (isset($_FILES['editFilesInput']) && !empty($_FILES['editFilesInput']['name'][0])) {
            $files = $_FILES['editFilesInput'];
            $allowedExtensions = ['png', 'pdf', 'docx', 'jpeg', 'jpg'];
            $maxSize = 5 * 1024 * 1024; // 5 MB

            $uploadDirectory = 'output/'; // Directory to save uploaded files
            $responseMessages = [];

            // Check each file
            foreach ($files['name'] as $key => $name) {
                $tmpName = $files['tmp_name'][$key];
                $error = $files['error'][$key];
                $size = $files['size'][$key];

                if ($error === UPLOAD_ERR_OK) {
                    $fileExtension = pathinfo($name, PATHINFO_EXTENSION);
                    $fileName = $documentType . '_' . uniqid() . '.' . $fileExtension;
                    $filePath = $uploadDirectory . $fileName;

                    if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                        if ($size <= $maxSize) {
                            // Check if file already exists
                            if (!file_exists($filePath)) {
                                // Move file to the output directory
                                if (move_uploaded_file($tmpName, $filePath)) {
                                    // Insert file record into document_files table
                                    $insertFileQuery = "INSERT INTO document_files (documentID, documentPath) VALUES (:documentID, :documentPath)";
                                    $fileStmt = $pdo->prepare($insertFileQuery);
                                    $fileStmt->execute([
                                        ':documentID' => $documentID,
                                        ':documentPath' => $fileName,
                                    ]);
                                } else {
                                    $responseMessages[] = "Failed to move file: $name.";
                                }
                            } else {
                                $responseMessages[] = "File already exists: $fileName.";
                            }
                        } else {
                            $responseMessages[] = "File is too large: $name. Maximum size is 5 MB.";
                        }
                    } else {
                        $responseMessages[] = "Invalid file type: $name. Only PNG, PDF, DOCX, JPEG, and JPG files are allowed.";
                    }
                } else {
                    $responseMessages[] = "Error uploading file: $name.";
                }
            }

            // Output response messages
            if (!empty($responseMessages)) {
                $info = '<div class="alert alert-danger">' . implode('<br>', $responseMessages) . '</div>';
            } else {
                header('location: user_documents.php?UserID=' . $UserID . '&updated=1');
            }
        }
    } else if (isset($_GET['updated'])) {
        $info = '<div class="alert alert-success">Document updated and Files uploaded successfully.</div>';
    } else if (isset($_GET['remove_file'])) {
        $fileID = $_GET['remove_file'];
        if (deleteFilesByFileId($fileID)) {
            header('location: user_documents.php?UserID=' . $UserID);
        }
    }

    $documents = getUserDocumentByUserId($UserID);
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
                    <?php echo $DesiredUser['firstName'] . ' ' . trim($DesiredUser['lastName']) . '\'s Documents'; ?>
                </h2>
                <?php echo $info; ?>
                <div class="sec-2 mb-4">
                    <fieldset class="px-sm-5 px-4 py-4 table-responsive">
                        <?php
                        if ($DesiredUser) {
                            ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Document ID</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Quality</th>
                                        <th>Date to translator</th>
                                        <th>Date from translator</th>
                                        <th>Files</th>
                                        <th>Translation Needed?</th>
                                        <th>Last Updated</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (!empty($documents)) {
                                        foreach ($documents as $document) {
                                            $documentID = $document['DocumentID'];
                                            $files = getFilesByDocumentId($documentID);
                                            $file_output = '';
                                            if (is_array($files)) {
                                                foreach ($files as $file) {
                                                    $extension = explode('.', $file['documentPath']);
                                                    $extension = end($extension);
                                                    $file_output .= '<div class="file-cont"><a class="file-link" target="_blank" href="./output/' . $file['documentPath'] . '"><img src="./assets/images/' . $extension . '.png" height="50" class="file-icon"></a><a href="?UserID=' . $UserID . '&remove_file=' . $file['fileID'] . '" class="delete-file-link"><img src="assets/images/remove.png" class="remove-file" ></i></a></div>';
                                                }
                                            } else {
                                                $file_output = 'No files!';
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $document['DocumentID']; ?></td>
                                                <td><?php echo $document['DocumentType']; ?></td>
                                                <td><?php echo $document['DocumentDescription']; ?></td>
                                                <td><?php echo $document['DocumentStatus']; ?></td>
                                                <td><?php echo $document['Quality']; ?></td>
                                                <td><?php echo $date = ($document['DateToTranslator']) ? date('m/d/Y', strtotime($document['DateToTranslator'])) : ''; ?>
                                                </td>
                                                <td><?php echo $date = ($document['DateFromTranslator']) ? date('m/d/Y', strtotime($document['DateFromTranslator'])) : ''; ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2 align-items-center flex-wrap files-container">
                                                        <?php echo $file_output; ?>
                                                    </div>
                                                </td>
                                                <td><?php echo $translation = ($document['TranslationNeeded'] == 1) ? 'Yes' : 'No'; ?></td>
                                                <td><?php echo date('h:i a, m-d-Y', strtotime($document['updatedAt'])); ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <button type="button" class="btn btn-primary edit-document-btn"
                                                            data-document-id="<?php echo $document['DocumentID']; ?>"
                                                            data-document-type="<?php echo $document['DocumentType']; ?>"
                                                            data-document-quality="<?php echo $document['Quality']; ?>"
                                                            data-document-ToTranslator="<?php echo $document['DateToTranslator']; ?>"
                                                            data-document-FromTranslator="<?php echo $document['DateFromTranslator']; ?>"
                                                            data-document-status="<?php echo $document['DocumentStatus']; ?>"
                                                            data-document-translation="<?php echo $document['TranslationNeeded']; ?>"
                                                            data-bs-toggle="modal" data-bs-target="#editDocumentModal">Edit</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="alert alert-warning">No documents found for the user!</div>
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
        <!-- Edit Document Modal -->
        <div class="modal fade" id="editDocumentModal" tabindex="-1" aria-labelledby="editDocumentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editDocumentModalLabel">Edit Document</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editDocumentForm" method="POST" action="?UserID=<?php echo $UserID; ?>"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="editDocumentID" name="editDocumentID">
                                <input type="hidden" class="form-control" id="DocumentType" name="DocumentType">
                                <div id="edit_response" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="editDocumentStatus" class="form-label">Document Status</label>
                                <div class="input-div">
                                    <select class="form-select" id="editDocumentStatus" name="editDocumentStatus">
                                        <option value="">Select status</option>
                                        <option value="Pending">Pending</option>
                                        <option value="To Translator">To Translator</option>
                                        <option value="Back From Translator">Back From Translator</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="editDocumentQuality" class="form-label">Quality</label>
                                <div class="input-div">
                                    <select class="form-select" id="editDocumentQuality" name="editDocumentQuality">
                                        <option value="">Select quality</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="editTranslationNeeded" class="form-label">Translation Needed</label>
                                <div class="input-div">
                                    <select class="form-select" id="editTranslationNeeded" name="editTranslationNeeded">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="editDateToTranslator" class="form-label">Date to Translator</label>
                                <div class="input-div">
                                    <input type="date" class="form-control" id="editDateToTranslator"
                                        name="editDateToTranslator">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="editDateFromTranslator" class="form-label">Date from Translator</label>
                                <div class="input-div">
                                    <input type="date" class="form-control" id="editDateFromTranslator"
                                        name="editDateFromTranslator">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="editFilesInput" class="form-label">Files</label>
                                <div class="input-div">
                                    <input type="file" class="form-control" id="editFilesInput" name="editFilesInput[]"
                                        multiple>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="saveChangesBtn">Save changes</button>
                        </div>
                    </form>
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
        <script src="./assets/js/script.js?v=7"></script>
        <script>
            $(document).ready(function () {
                $('.edit-document-btn').on('click', function () {
                    // Get data from button attributes
                    var documentID = $(this).data('document-id');
                    var documentType = $(this).data('document-type');
                    var documentStatus = $(this).data('document-status');
                    var quality = $(this).data('document-quality');
                    var dateToTranslator = $(this).data('document-totranslator');
                    var translationNeeded = $(this).data('document-translation');
                    var dateFromTranslator = $(this).data('document-fromtranslator');

                    // Populate the modal form fields
                    $('#editDocumentID').val(documentID);
                    $('#DocumentType').val(documentType);

                    // Set the Document Status select field
                    $('#editDocumentStatus').val(documentStatus);

                    // Set the Quality select field
                    $('#editDocumentQuality').val(quality);
                    $('#editTranslationNeeded').val(translationNeeded);

                    // Set the dates
                    $('#editDateToTranslator').val(dateToTranslator);
                    $('#editDateFromTranslator').val(dateFromTranslator);

                    // Optional: handle file input if needed (e.g., pre-populate files)
                    // Note: File inputs cannot be pre-filled with file paths due to security reasons

                    // Open the modal
                    $('#editDocumentModal').modal('show');
                });
                $('#editDocumentForm').on('submit', function (event) {

                    // Initialize a flag for validation
                    var isValid = true;
                    var errorMsg = '';

                    // Clear previous error messages
                    $('#edit_response').text('');

                    // Get the files from the input
                    var files = $('#editFilesInput')[0].files;

                    // Define allowed file types and max size
                    var allowedExtensions = ['png', 'pdf', 'docx', 'jpeg', 'jpg'];
                    var maxSize = 5 * 1024 * 1024; // 5 MB in bytes

                    // Validate each file
                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];
                        var fileExtension = file.name.split('.').pop().toLowerCase();

                        if ($.inArray(fileExtension, allowedExtensions) === -1) {
                            errorMsg += 'Invalid file type: ' + file.name + '. Only PNG, PDF, DOCX, JPEG, and JPG files are allowed.<br>';
                            isValid = false;
                        }

                        if (file.size > maxSize) {
                            errorMsg += 'File is too large: ' + file.name + '. Maximum size is 5 MB.<br>';
                            isValid = false;
                        }
                    }

                    if (isValid) {

                    } else {
                        event.preventDefault(); // Prevent default form submission
                        // Display validation errors
                        $('#edit_response').html(errorMsg);
                    }
                });
            });

        </script>
    </body>

</html>