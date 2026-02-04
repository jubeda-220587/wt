<?PHP
#strings
echo $name = "jubeda" ."<br>";
echo $place = "vizag" ."<br>";

#integers
echo $age = 19 ."<br>";

#float
echo $percentage = 86.75 ."<br>";

#boolean
echo $isLoggedIn = true ."<br>";

#array
$jobs=array("SSC","RAILWAY","BANK") ;
print_r($jobs)."<br>";
echo "<br> variable scope<br>";
function globalex(){
    global $name,$age;
    echo "Name: $name";
    echo "Age: $age<br>";

}
globalex();

function localex(){
    $name = "jubeda";
    $age = 19;
    echo "Name: $name<br>";
    echo "Age: $age<br>";
}
localex();

function staticex(){
    static $percentage = 90;
    $percentage += 10;
    echo "Percentage: $percentage<br>";

}

staticex();
staticex();
staticex();

?>