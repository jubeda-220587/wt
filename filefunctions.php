<?php  
  
$file = "sample.txt";  
  
# Write file  
$f = fopen($file,"w");  
fwrite($f,"Hello PHP File Handling\n");  
fwrite($f,"This is Lab Program\n");  
fclose($f);  
  
# file_put_contents  
file_put_contents($file,"Added using file_put_contents()\n",FILE_APPEND);  
  
# Read file  
$f = fopen($file,"r");  
echo fread($f,filesize($file));  
fclose($f);  
  
echo "<br><br>";  
  
# file_get_contents  
echo "Using file_get_contents():<br>";  
echo nl2br(file_get_contents($file));  
echo "<br><br>";  
  
# file() function  
echo "Using file() function:<br>";  
print_r(file($file));  
echo "<br><br>";  
  
# Info  
echo "Exists: ".file_exists($file)."<br>";  
echo "Size: ".filesize($file)."<br>";  
echo "Type: ".filetype($file)."<br>";  
echo "Access Time: ".date("d-m-Y H:i:s",fileatime($file))."<br>";  
echo "Modified Time: ".date("d-m-Y H:i:s",filemtime($file))."<br>";  
echo "Creation Time: ".date("d-m-Y H:i:s",filectime($file))."<br>";  
echo "Permissions: ".fileperms($file)."<br>";  
echo "Owner: ".fileowner($file)."<br>";  
echo "Group: ".filegroup($file)."<br>";  
echo "Inode: ".fileinode($file)."<br>";  
  
echo "<br>";  
  
# Copy  
copy($file,"copy.txt");  
  
# Rename  
rename("copy.txt","newfile.txt");  
  
# Check file and directory  
echo "Is sample.txt a file? ".is_file($file)."<br>";  
  
# Directory  
mkdir("testfolder");  
echo "Is testfolder a directory? ".is_dir("testfolder")."<br>";  
  
echo "<br>Files in directory using scandir():<br>";  
print_r(scandir("."));  
  
echo "<br><br>";  
  
# Directory Handling using opendir()  
echo "Using opendir():<br>";  
$dir = opendir(".");  
while(($d = readdir($dir)) != false)  
{  
    echo $d."<br>";  
}  
closedir($dir);  
  
echo "<br>";  
  
# Current working directory  
echo "Current Directory: ".getcwd()."<br>";  
  
# Change directory  
chdir("testfolder");  
echo "After Changing Directory: ".getcwd()."<br>";  
chdir("..");  
  
echo "<br>";  
  
# File Locking  
$f = fopen($file,"a");  
if(flock($f,LOCK_EX))  
{  
    fwrite($f,"File locked and written safely\n");  
    flock($f,LOCK_UN);  
}  
fclose($f);  
  
# Delete  
unlink("newfile.txt");  
rmdir("testfolder");  
  
echo "<br>Program Completed";  
  
?>