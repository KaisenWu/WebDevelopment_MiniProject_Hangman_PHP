<?php

//Reference the inc script.
require('inc/hangman.inc.php');

//Store the user's input.
$userChar = "";

//Store the result.
$result = "";

//Return the word for the user, return the only array we are going ot use!
$word = getWord();

//Get the number of tries we should allow the user (2x the number of characters from the returned pizza type.)
$tries = getTries($word);

//Construct the array we are going to use for the rest of the program based on the Word.
$hangman = getArray($word);

//Display the masked version to the user on first instance.
printMasked($hangman);

//While the user has tries...
do
{
     //Prompt the user for a letter.
     $userChar = promptInput();
 
     //Process the guess.  
     guessChar($hangman, $userChar);

     //Display a masked version of the name according to the attributes in the array.
     echo $result. "\n";

     //Check the game status.
     checkStatus($hangman);
     if($ifWin == true)
     {
         break;
     }

     //Tell the user how many tries they have left.
     //If the counter is at zero then prompt the user that their number of tries is over and exit the program.
     tellTries();     
}
while($tries > 0);

?>