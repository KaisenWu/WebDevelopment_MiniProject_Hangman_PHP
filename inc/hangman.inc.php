<?php

//This function prints out the hangman in its masked form.
function printMasked(& $hangman)  {
    //Make $result glabal to make it available to access outside this block.
    global $result;

    //Store the length of the $hangman array.
    $numberOfLetters = sizeof($hangman);

    //Store the fully masked string according to the number of elements in $hangman.
    $MaskedLetters = str_repeat("*",$numberOfLetters);

    //Store and display the string.
    $result = $MaskedLetters;
    echo "Guess the letters for the following word:\n$result\n";
}

//This function handles the user guessing a character
function guessChar(& $hangman, $userChar)   { 
    //Make the variables global.
    global $word,$result,$tries;

    //Store the length of the target word.
    $lengthOfWord = strlen($word);

    //Use a loop to check if the inputed character exists in the $hangman.
    //If yes, replace the "*" by the inputed character in $result.
    for($i=0;$i<$lengthOfWord;$i++)
    {        
        if($userChar == $hangman[$i])
        {
            $result[$i]=$userChar;
        }
    }

    //Count how many times are remaining and retuen the counter.
    $tries--;    
    return $result;
}

//This function checks to see if the user has entered all the correct characters, if true it contratulates the user and exists.
function checkStatus(& $hangman)    {
    //Make the variables global.
    global $ifWin,$result;

    //Store the status in a boolean variable.
    $ifWin = false;

    //Check if $result doesn't contain "*" anymore, 
    //the user guess all the characters successfully.
    if(str_contains($result,"*")==false)
    {
        echo "Congratulations, you win!\n";
        $ifWin = true;
    }
}

//This function prompts the user for input and then creatds the datastructure for the game;
function getWord()  {

    //Here are the random pizza types, you may not use this array or modify it in the program, you may only pick a value from it!.
    $pizzaTypes = ['Marinara', 
        'Margherita', 
        'Chicago', 
        'Tomato', 
        'Sicilian', 
        'Greek', 
        'California'];
    
    //Shuffle the array, pull one from the top or find the length of the array and select a random number.
    shuffle($pizzaTypes);
    $selectedType = $pizzaTypes[0];
    return $selectedType;
}

function getArray($word)    {

    //Get the datastructure we are going to use 
    //for the rest of the program based on the word that was randomly selected.

    //Make the gotten word upper case and split, store it in an array.
    $hangman = str_split(strtoupper($word));

    //Return the array.
    return $hangman;
}

//This function returns the number of tries that the user should get based on the word that was selected.
function getTries(& $word)    {
    //Remember you want 2x the number of letters in the word

    //Get the tries by times the length of the gotten word.
    return strlen($word) * 2;
}

//This function prompt the user to input a character and returns it.
function promptInput()  {
    echo "Please enter a guess: ";

    //Convert all the input to upper case and store it.
    $userChar = strtoupper(stream_get_line(STDIN, 1024, PHP_EOL));
    return $userChar;
}

//This function telling the user how many tries remaining.
function tellTries()    {
    //Make $tries globle.
    global $tries;

    //Display the remaining tries.
    if($tries == 0)
    {
        echo "Sorry, out of tries!\n";
    }
    else
    {
        echo "You have $tries left!\n";
    }    
}

?>