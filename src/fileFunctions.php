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

function groupData($data) {
    $stats = array();
    foreach ($data as $line) {
        if ($line[2] !== 'EUR') {
            continue;
        }
        if (array_key_exists($line[3], $stats)) {
            $stats[$line[3]] += $line[1];
        } else {
            $stats[$line[3]] = $line[1];
        }
    }
    return $stats;
}
