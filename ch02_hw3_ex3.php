<?php
// Joshua Deel
// Ch2 Hw 3 Ex 3

$dollarQuarters= 0;
$quarters = 0;
$dimes = 0;
$nickels = 0;
$pennies = 0;
$change = 0;
$continue = true;


while($continue == true) {

    $amount = readline("Please enter your amount or \"exit\" to quit: $");

    if(strtolower($amount) == "exit") {
        print("Quitting!");
        break;
    }

    elseif(!is_numeric($amount) || empty($amount) || $amount < 0){
        print("\nPlease enter an amount greater than $0.00\n");
        continue;
    }

    $amount += 0.001; //make math more precise, gives wrong amount otherwise

    if($amount >= 1.00) {
        $dollarQuarters = ($amount % 100) * 4; // find quarters making up dollar amount
    }

    $change = ($amount * 100) % 100; // converts decimal amount to interger and removes dollar amount

    // finds the amount of quarters
    if($change / 25 > 0){  
        $quarters = ($change / 25) % 10;
        $change = $change - $quarters * 25;
    }

    // finds the amount of dimes
    if($change / 10 > 0){
        $dimes = ($change / 10) % 10;
        $change = $change - ($dimes * 10); 
    }

    // finds the amount of nickels 
    if($change / 5 > 0){
        $nickels = ($change / 5) % 10;
        $change = $change - ($nickels * 5); 
    }

    // any leftover change is pennies
    $pennies = $change;

    print("\nChange Calculated");
    print("\nQuarters: ".$quarters + $dollarQuarters.
        "\nDimes   : ".$dimes.
        "\nNickels : ".$nickels.
        "\nPennies : ".$pennies."\n");
}
?>