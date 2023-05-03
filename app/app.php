<?php

/*
* 1. Process files in the directory.
*/

// 1.1 Extract all items in directory to an array.
$files_dir = scandir(FILES_PATH);

// 1.2 Create a custom array of only files to process.
$files_arr = [];
foreach($files_dir as $item) {
  if(is_file(FILES_PATH . $item)) {
    $files_arr[] = FILES_PATH . $item;
  }
}

/*
* 2. Create a function that opens files and extracts information.
*/

function getDataFromFile($file_path) {

  //2.0 Trigger error if file does not exist.
  if (! file_exists($file_path)) {
    trigger_error('File "' . $file_path . '" does not exist.', E_USER_ERROR);
  }

  // 2.1 Open file for reading.
  $file = fopen($file_path, 'r');

  // 2.2. Put each line of the file into an array.
  while (($line = fgets($file)) !== false) {
      $arr_data[] = explode(',', $line, 4);
  }

  // 2.3 Remove the header of the table (first sub-array) into separate array.
  $header_arr = array_shift($arr_data);

  // 2.4 Trim the items of the header_arr.
  $header_arr = array_map(fn($item) => trim($item), $header_arr);

  // 2.5. Convert data to associative array and trim quotes.
  foreach($arr_data as $entry) {
    $entry = array_map(fn($item) => trim($item, " \n\r\t\v\x00\""), $entry);
    $entry[0] = date('M j, o', strtotime($entry[0]));
    $file_data_array[] = array_combine($header_arr, $entry);
  }

  // 2.6 Close file
  fclose($file);

  // 2.7 return the data of the file in an array
  return $file_data_array;
}

/*
* 3. Extract all the files data into one array.
*/

$data = [];
foreach($files_arr as $file) {
  $data = array_merge($data, getDataFromFile($file));
}

/*
* 4. Calculate total income, total expense & net total.
*/

$total_income = 0;
$total_expense = 0;

foreach($data as $item) {
  $val = (float) str_replace('$', '', $item['Amount']);
  $val > 0 ? $total_income += $val : $total_expense += $val;
}

$net_total = $total_income + $total_expense;
