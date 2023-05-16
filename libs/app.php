<?php
    /*ARCHIVO PARA RUTEAR LAS SOLICITUDES DE LA BARRA DE URL'S*/
    require_once 'controllers/errores.php';
    
    
    
    class App {
    
        function __construct(){
            $url = isset($_GET['url']) ? $_GET['url']: null;
            $url = rtrim($url,'/');
            $url = explode('/',$url);

            //Si no hay controlador especificado en la url.
            if (empty($url[0])) {
                error_log('APP::construct->no hay controlador especifcado.');
                $archivoController = 'controllers/login.php';
                require_once $archivoController;
                $controller = new Login();
                $controller->loadModel('login');
                $controller->render();
                return false;
            }

            $archivoController = 'controllers/'.$url[0].'.php';
            if (file_exists($archivoController)) {
                require_once $archivoController;
                $controller = new $url[0];
                $controller->loadModel($url[0]);

                if (isset($url[1])) {
                    if (method_exists($controller,$url[1])) {
                        if (isset($url[2])) {
                            //número de parámetros
                            $nparam = count($url)-2;
                            //arreglo de parámetros
                            $params = [];
                            for ($i=0; $i <$params ; $i++) { 
                                array_push($params,$url[$i]+2);
                            }
                            $controller->{$url[1]}($params);
                        } else {
                            //El metodo no tiene parametros, se manada a llamar al metodo tal cual
                            $controller->{$url[1]}();
                        }
                    } else {
                        //no existe el metodo en 
                        $controller = new Errores();
                        $controller->render();
                    }
                    
                } else {
                   //no hay metodo, se carga el metodo por default
                   $controller->render();
                }
                
            }else{
                //si no existe el archivo manda error.
                $controller = new Errores();
                $controller->render();
            }
        }
    }
?>