<?php

function loadFileData($filePath) {
    $file = fopen($filePath, 'r');
    $data = array();
    $firstLine = null;
    while (($line = fgetcsv($file)) !== FALSE) {
        if ($firstLine === null) {
            $firstLine = $line;
            continue;
        }
        foreach ($line as $key => $column) {
            $line[$firstLine[$key]] = $column;
            if ($firstLine[$key] === 'Betrag') {
                $line[$firstLine[$key]] = doubleval($column);
                $line[$key] = doubleval($column);
            }
        }

        if ($line['Betrag'] === 0.0) {
            continue;
        }
        $data[] = $line;
    }
    fclose($file);
    return $data;
}
