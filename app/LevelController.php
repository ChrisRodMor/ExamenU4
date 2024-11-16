<?php 

    include_once "config.php";

    class LevelController{

        function getLevels() {

            if (!isset($_SESSION['token'])) {
                echo 'No se encontró el token de autorización.';
                return [];
            }
            
            $curl = curl_init();
        
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/levels/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $_SESSION['token']
                ),
            ));
        
            $response = curl_exec($curl);
            curl_close($curl);
            
            $result = json_decode($response, true);
            
            return $result['data'];
        }

        function getLevelById($id) {

            if (!isset($_SESSION['token'])) {
                echo 'No se encontró el token de autorización.';
                return null;
            }
        

            $curl = curl_init();
        
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/levels/' . $id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $_SESSION['token']
                ),
            ));
        

            $response = curl_exec($curl);
            curl_close($curl);
        
            $result = json_decode($response, true);
        
            return $result['data'];
        }
        
        
    }



?>