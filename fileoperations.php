

<?php
$file = "modes.txt";

$f = fopen($file, "w");
fwrite($f, "Write Mode\n");
fclose($f);

$f = fopen($file, "a");
fwrite($f, "Append Mode\n");
fclose($f);

if (file_exists($file)) {
    $f = fopen($file, "r");
    $size = filesize($file);
    if ($size > 0) {
        echo fread($f, $size) . "\n";
    }
    fclose($f);
}

$newFile = "sample.txt";
if (!file_exists($newFile)) {
    $f = fopen($newFile, "x");
    fwrite($f, "New File Content\n");
    fclose($f);
}

$f = fopen($file, "r+");
fwrite($f, "Read+Write");
fclose($f);

$f = fopen($file, "w+");
fwrite($f, "Erase + Write");
fclose($f);

$f = fopen($file, "a+");
fwrite($f, "Append+");
fclose($f);

$data_file = "data.txt";
if (file_exists($data_file)) { 
    unlink($data_file); 
}

$f = fopen($data_file, "x+");
if ($f !== false) {
    fwrite($f, "Hello PHP File Operations");
    rewind($f);
    echo fread($f, filesize($data_file));
    fclose($f);
}
?>