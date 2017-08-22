<?php
/**
 *
 */

/*
 * validation file
 * create and write txt file
 * validation email
 * param string
 * return success|fail
 */

function validation($string)
{
    $validation = filter_var($string, FILTER_VALIDATE_EMAIL);
    if ($validation) {
//        $output = 'Proper email address';
//        echo '<div class="alert alert-success col-sm-4 offset-sm-4" role="alert">' . $output . '</div>';
        return createTxt($string, getFile());
    } else {
        $output = 'wrong email address';
        return '<div class="alert alert-danger col-sm-4 offset-sm-4" role="alert">' . $output . '</div>';
    }
}

/*
 * fail validation
 * return array for txt file
 */

function getFile()
{
    $arrPath = [];
    $path = "images/";
    if (isset($_FILES['input'])) {
        $arrFile[] = $_FILES['input'];
        foreach ($_FILES['input']['error'] as $k => $error) {
            switch ($error) {
                case 0:
                    $tmpName = $_FILES['input']['tmp_name'][$k];
                    $name = basename($_FILES['input']['name'][$k]);
                    $nameExtention = explode('.', $name);
                    if (is_int(strpos(strtolower($nameExtention[1]), 'exe'))) {
                        echo '<div class="alert alert-danger col-sm-4 offset-sm-4" role="alert"> You can`t download exe files</div>';
                    } else {
                        move_uploaded_file($tmpName, $path . $nameExtention[0] . '.' . $nameExtention[sizeof($nameExtention) - 1]);
                        echo '<div class="alert alert-success col-sm-4 offset-sm-4" role="alert">' . $name . ' downloaded</div>';
                        $arrPath[] = $path . $nameExtention[0] . '.' . $nameExtention[1];
                    }
                    break;
                case 1:
                    echo '<div class="alert alert-danger col-sm-4 offset-sm-4" role="alert">File is too big</div>';
                    break;
                case 2:
                    echo '<div class="alert alert-danger col-sm-4 offset-sm-4" role="alert">File is too big</div>';
                    break;
                case 3:
                    echo '<div class="alert alert-danger col-sm-4 offset-sm-4" role="alert">
        The uploaded file was only partially uploaded, try again</div>';
                    break;
                case 4:
                    echo '<div class="alert alert-danger col-sm-4 offset-sm-4" role="alert">No file was uploaded, try again</div>';
                    break;
                default:
                    echo 'Something went wrong, try again';
            }
        }
    }
    return $arrPath;
}

/*
 * param string
 * param array
 */

function createTxt($string, $fileName)
{

    foreach ($fileName as $key => $name) {
        if (!empty($fileName[$key])) {

            $file = fopen('1.txt', 'a+');
            $line = json_encode(['email' => $string, 'path' => $name]) . PHP_EOL;
            fputs($file, $line);
            fclose($file);
        }
    }
}

/*
 * return array
 */

function read()
{

    $arr = [];
    $file = fopen('1.txt', 'r');
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $arr[] = json_decode($line, true);
        }
    }
    fclose($file);
    return $arr;
}

$images = read();

$active = ['active' => 'active'];
$images[] = $images[0]+$active;
$delArr = array_shift($images);