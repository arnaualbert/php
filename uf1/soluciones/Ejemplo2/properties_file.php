<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

/* function readPropertiesFile($filename, $delimiter) {
        $data = array();
        if (\file_exists($filename) && \is_readable($filename)) {
            $handle = \fopen($filename, 'r');  //returns false on error.
            if ($handle) {
                while (!\feof($handle)) {
                    $line = \fgets($handle);
                    if ($line) {
                        list($key, $value) = \explode($delimiter, $line);
                        $data["$key"] = (int) $value;
                    }
                }
                \fclose($handle);            
            }
        }
        return $data;
    }
 */

            include 'php-fn/file-fn.php';
            use proven\files as files;
            $filepath = 'files/data.txt';
            $delimiter = ':';
            $majorityAge = 18;
            $dataRead = files\readPropertiesFile($filepath, $delimiter);
            /*
            $adultList = array();
            foreach ($dataRead as $name => $age) {
                if ((int)$age < $majorityAge) {
                    $adultList[] = $name;
                }
            }
             */
            $adultList = \array_filter($dataRead, function($value) {return ((int)$value < 18);});
            echo "Adults: " . \json_encode($adultList);
        ?>
    </body>
</html>
