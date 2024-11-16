<?php 

    include_once "config.php";

    if (isset($_POST['action'])) {
    
        if (!isset($_POST['global_token'])) {
            echo json_encode(['error' => 'Token de autenticación no válido.']);
            header('Location: ' . BASE_PATH . 'login');
            exit;
        }

        $orderController = new OrderController();
    
        switch ($_POST['action']) {
    
            case 'addOrder':
                //aun nada
            break;
    

            case 'editOrder':
                //aun nada
            break;
    
            case 'deleteOrder':
                //aun nada
            break;

            case 'getOrderByID':
                $id = $_POST['id'];
    
                $orderController->getOrderByID($id);
            break;
    
            case 'getOrdersBetweenDates':
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
    
                
                $orderController->getOrdersBetweenDates($start_date, $end_date);
            break;
        }
    }
    


    class OrderController{

        function getOrders() {

            if (!isset($_SESSION['token'])) {
                echo 'No se encontró el token de autorización.';
                return [];
            }
        

            $curl = curl_init();
        
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
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

        function getOrderByID($id) {

            if (!isset($_SESSION['token'])) {
                echo 'No se encontró el token de autorización.';
                return null;
            }
        
            $curl = curl_init();
        
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/details/' . $id,
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

        function getOrderBetweenDates($startDate, $endDate) {

            if (!isset($_SESSION['token'])) {
                echo 'No se encontró el token de autorización.';
                return [];
            }

            $curl = curl_init();
        
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/' . $startDate . '/' . $endDate,
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