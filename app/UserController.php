<?php 

    include_once "config.php";

    class UserController{

        public function getUsers(){

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;

        }

        public function getUserByID($id) {
            $curl = curl_init();
        
            if (!isset($_SESSION['token'])) {
                echo 'No se encontró el token de autorización.';
                return [];
            }
        
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/' . $id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $_SESSION['token'],
                ),
            ));
        
            $response = curl_exec($curl);
            curl_close($curl);
            
            $result = json_decode($response, true);
        
            return $result['data'];
        }

        public function addUser($name, $lastname, $email, $phone_number, $password, $profile_photo_file){

            $curl = curl_init();

            if (!isset($_SESSION['token'])) {
                echo 'No se encontró el token de autorización.';
                return [];
            }

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'name' => $name,
                    'lastname' => $lastname,
                    'email' => $email,
                    'phone_number' => $phone_number,
                    'created_by' => $_SESSION['name'] . " " . $_SESSION['lastname'],
                    'role' => 'Administrador',
                    'password' => $password,
                    'profile_photo_file'=> new CURLFILE($profile_photo_file)),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $_SESSION['token'],
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;

            header('Location: ' . BASE_PATH . 'users');

        }

        public function editUser($name, $lastname, $email, $phone_number, $password, $profile_photo_file){

        }

        public function deleteUser($id){
            if (!isset($_SESSION['token'])) {
                echo 'No se encontró el token de autorización.';
                return [];
            }

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;

            header('Location: ' . BASE_PATH . 'users');

        }
    }
?>