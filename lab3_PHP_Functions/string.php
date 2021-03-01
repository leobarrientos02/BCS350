<?php
// Declare a simple function to return an 
// array from our object
function check_object($obj)
{
    if (!is_object($obj)) {
        return false;
    }

    return $obj->students;
}

// Declare a new class instance and fill up 
// some values
$obj = new stdClass();
$obj->students = array('Kalle', 'Ross', 'Felipe');

var_dump(check_object(null));
var_dump(check_object($obj));
var_dump(check_object("Leonel"));
echo "<br>";
echo strrev(" .dlrow olleH");    
echo "<br>";
echo str_repeat("Hip ", 2);    
echo "<br>";
echo strtoupper("hooray!"); 
echo "<br>";
echo strlen("intro"); 
echo "<br>";

// Function printing to screen
function greet() {
    print "Hello";
}

greet(); 
greet();

echo "<br>";
print greet() . " Glenn<br>";
print greet() . " Sally<br>";

function howdy($lang) {
    if ( $lang == 'es' ) return "Hola";
    if ( $lang == 'fr' ) return "Bonjour";
    return "Hello";
}

print howdy('es') . " Glenn<br>";
print howdy('fr') . " Sally<br>";

// Conditional statement
function howdy2($lang='es') {
    if ( $lang == 'es' ) return "Hola";
    if ( $lang == 'fr' ) return "Bonjour";
    return "Hello";
}

print howdy2("gr") . " Glenn<br>";
print howdy2('fr') . " Sally<br>";


// Call by value
function double($alias) {
    $alias = $alias * 2;
    return $alias;
}
$val = 10;
$dval = double($val);
echo "Value = $val Doubled = $dval<br>";

// Call by reference
function triple(&$realthing){
    $realthing = $realthing *3;
}
$val = 10;
triple($val);
echo "Triple = $val<br>";

// Global Scope
function tryZap(){
    global $val;
    $val = 100;
}

$val = 10;
tryZap();
echo "TryZap = $val<br>";

?>
<iframe src="https://www.farmingdale.edu" frameborder="0" title="W3Scchools" width="800" height=600></iframe>