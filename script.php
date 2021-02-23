<?php

//displayed value in the main page
$total = '';

//gets the counter value
$get = fopen("counter.txt", "r");
$counter = fgets($get);
fclose($get);

//checkbox that is being added
$checkbox_1  = '<input type="checkbox" checked>';

//keeps the list displayed when the page is loaded anew
$create_5 = fopen("List/all.txt", "r");
$total = fgets($create_5);
fclose($create_5);



//block of code to create a new todo list
if (isset($_POST['create'])) {

    //retrieves the new todo
    $todo = $_POST['mytodo'];

    //creates a new file
    $create = fopen("List/list$counter.txt", "w");
    fwrite($create, "<div class='list-span'><span class='new_list'>" . $counter . ' ' . $todo . '</span></div><br>');
    fclose($create);

    //resets the all txt file
    $open = '';

    $create_1 = fopen("List/all.txt", "w");
    fwrite($create_1, $open);
    fclose($create_1);
    for ($h = $counter; $h >= 1; $h--) {
        if (file_exists("List/list$h.txt") == true) {
            $create_2 = fopen("List/list$h.txt", "r");
            $open_1 = fgets($create_2);
            fclose($create_2);

            $create_3 = fopen("List/all.txt", "a");
            fwrite($create_3, $open_1);
            fclose($create_3);
        }
    }
    $create_4 = fopen("List/all.txt", "r");
    $total = fgets($create_4);
    fclose($create_4);
    $counter++;
    $get = fopen("counter.txt", "w");
    fwrite($get, $counter);
    fclose($get);
}



//block of code that deletes all items and resets the counter
if (isset($_POST['delete'])) {
    $open = '';

    $create = fopen("List/all.txt", "w");
    fwrite($create, $open);
    fclose($create);
    if ($counter > 0) {
        for ($h = 1; $h < $counter; $h++) {
            if (file_exists("List/list$h.txt") == true) {
                unlink("List/list$h.txt");
            }
        }
        $create_5 = fopen("List/all.txt", "r");
        $total = fgets($create_5);
        fclose($create_5);
    }
    $get = fopen("counter.txt", "w");
    fwrite($get, 1);
    fclose($get);
}



//block of code to delete a particular task when complete a task is clicked
if (isset($_POST['specific_delete'])) {

    $specifier = $_POST['specifier'];
    if (file_exists("List/list$specifier.txt")) {
        unlink("List/list$specifier.txt");
    }

    $open = '';

    $create = fopen("List/all.txt", "w");
    fwrite($create, $open);
    fclose($create);
    for ($h = $counter; $h >= 1; $h--) {

        if (file_exists("List/list$h.txt") == true) {

            $create_1 = fopen("List/list$h.txt", "r");
            $open_1 = fgets($create_1);
            fclose($create_1);

            $create_2 = fopen("List/all.txt", "a");
            fwrite($create_2, $open_1);
            fclose($create_2);
        }
    }
    $create_3 = fopen("List/all.txt", "r");
    $total = fgets($create_3);
    fclose($create_3);
}




//block of code to add a checked checkbox when complete a task is clicked
if (isset($_POST['completer'])) {

    $complete = $_POST['complete'];

    $open = '';

    $create = fopen("List/all.txt", "w");
    fwrite($create, $open);
    fclose($create);
    if (file_exists("List/list$complete.txt")) {
        $create_1 = fopen("List/list$complete.txt", "r");
        $editor = fgets($create_1);
        fclose($create_1);

        $create_2 = fopen("List/list$complete.txt", "w");
        fwrite($create_2, $checkbox_1 . $editor);
        fclose($create_2);
    }
    for ($h = $counter; $h >= 1; $h--) {
        if (file_exists("List/list$h.txt") == true) {

            $create_3 = fopen("List/list$h.txt", "r");
            $open_1 = fgets($create_3);
            fclose($create_3);

            $create_4 = fopen("List/all.txt", "a");
            fwrite($create_4, $open_1);
            fclose($create_4);
        }
    }
    $create_5 = fopen("List/all.txt", "r");
    $total = fgets($create_5);
    fclose($create_5);
}
