<?php
// 1. Extract all items in directory.
$files_dir = scandir(FILES_PATH);
// 2. Create a custom array of only files to process.
$files_arr = [];
foreach($files_dir as $item) {
  if(is_file(FILES_PATH . $item)) {
    $files_arr[] = FILES_PATH . $item;
  }
}

// 3. Open file for reading
$file = fopen($files_arr[0], 'r');

// 4. Put each line into an array.
$arr_data =[];
while (($line = fgets($file)) !== false) {
    $arr_data[] = explode(',', $line, 4);
}

// 4.1 Remove the header of the table (first array) into separate array.
$header_arr = array_shift($arr_data);
//$header_arr = array_map(trim($item)); // FIX THIS LINE

// 5. Convert data to associative array
$final_array = [];
foreach($arr_data as $entry) {
  $a_arr = array_combine($header_arr, $entry);
  $final_array[] = $a_arr;
}
print_r($final_array);

// 4. Close file
fclose($file);