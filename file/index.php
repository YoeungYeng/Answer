<?php
$filename = "myfile.txt";

// Open the file for writing (w mode overwrites if file exists)
$file = fopen($filename, "w");

if ($file) {
    for ($i = 0; $i < 1000; $i++) {
        fwrite($file, "Hello World!" . PHP_EOL);
    }
    fclose($file);
    echo "Successfully wrote 1000 lines to $filename";
} else {
    echo "Failed to open file for writing.";
}
?>
