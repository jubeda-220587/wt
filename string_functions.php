<?php

$text = " Hello PHP World ";

echo "Original String: " . $text;

echo "<br><br><b>1. Basic String Functions</b><br>";

echo "Length: " . strlen($text) . "<br>";
echo "Word Count: " . str_word_count($text) . "<br>";
echo "Reverse: " . strrev($text) . "<br>";

echo "<br><br><b>2. Case Conversion Functions</b><br>";

echo "Uppercase: " . strtoupper($text) . "<br>";
echo "Lowercase: " . strtolower($text) . "<br>";
echo "Ucfirst: " . ucfirst("php") . "<br>";
echo "Ucwords: " . ucwords("hello php world") . "<br>";

echo "<br><br><b>3. Search & Replace Functions</b><br>";

echo "Position of 'PHP': " . strpos($text, "PHP") . "<br>";
echo "After Replace: " . str_replace("World", "Students", $text) . "<br>";

echo "<br><br><b>3. Search & Replace Functions</b><br>";

echo "Position of 'PHP': " . strpos($text, "PHP") . "<br>";
echo "After Replace: " . str_replace("World", "Students", $text) . "<br>";

echo "<br><br><b>4. Substring & Trimming Functions</b><br>";

echo "Substring (PHP): " . substr($text, 7, 3) . "<br>";
echo "Trim: '" . trim($text) . "'<br>";
echo "Left Trim: '" . ltrim($text) . "'<br>";
echo "Right Trim: '" . rtrim($text) . "'<br>";

echo "<br><br><b>5. String Comparison Functions</b><br>";

echo "strcmp('PHP','php'): " . strcmp("PHP", "php") . "<br>";
echo "strcasecmp('PHP','php'): " . strcasecmp("PHP", "php") . "<br>";

echo "<br><br><b>6. Special Characters & Security</b><br>";

echo "htmlspecialchars output: " . htmlspecialchars("<script>alert('Hack')</script>") . "<br>";
echo "addslashes output: " . addslashes("I'm learning PHP") . "<br>";
?>