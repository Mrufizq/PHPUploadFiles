<?php

// BasicFileManager.php, archivo se llama como la clase

// los archivos de php nunca se cierran al final, salvo que haya que cerrarlos, porque despuÃ©s hay algo

class BasicFileManager {

    
    function __construct() {
        
    }
    
    //orden alfabÃ©tico
    
    function createFolder(string $name) {
        $created = false;
        if (!is_dir($name)) {
            mkdir($name);
            $created = true;
            
        }
        return $created;
    }


    function deleteFile(string $name) {
        return unlink($name); //borrar archivos, ficheros
    }

    function get() {
        //?
    }

    function getAll() {
        
    }

    function move() {   
        
    }

    private function prefix() {
        //aaaammddhhMMss
        $date = new DateTime();
        $timezone = new DateTimeZone('Europe/Madrid');
        $date->setTimezone($timezone);
        return $date->format('YmdHis');
    }

    /**
     * ...
     * 
     * @return Integer It returns the number of uploaded files.
     * */
    function set($name, $target) {
        $number = 1;
        $created = $this->createFolder($target);
        $uploaded = $this->upload($name, $target);
        if(!$uploaded) {
            if($created) {
                rmdir($target); //borrar carpetas, directorios
            }
            $number = 0;
        }
        return $number;
    }

    function upload(string $name, string $target) {
        if(isset($_FILES[$name]) &&
            $_FILES[$name]['error'] == 0 &&
            str_contains(mime_content_type($_FILES[$name]['tmp_name']), 'image')) {
                $fileName = $this->prefix() . '_' . $_FILES[$name]['name'];
                return move_uploaded_file($_FILES[$name]['tmp_name'], $target . '/' . $fileName);
        }
        return false;
    }

}