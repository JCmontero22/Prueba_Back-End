<?php 

    class respuesta  
    {

        private $response = [
            'status' => 'ok',
            'result' => array()
        ];

        

        public function error_405()
        {
            $this->response['status'] = "error";
            $this->response['result'] = array(
                'error_id' => '405',
                'error_msg' => 'metodo no permitido'
            );

            return $this->response;
        }

        public function error_200($valor = 'Datos')
        {
            $this->response['status'] = "error";
            $this->response['result'] = array(
                'error_id' => '200',
                'error_msg' => $valor
            );

            return $this->response;
        }

        public function error_400($valor = 'Datos')
        {
            $this->response['status'] = "error";
            $this->response['result'] = array(
                'error_id' => '400',
                'error_msg' => 'Datos enviados icompletos o con formato incorrecto'
            );

            return $this->response;
        }

        public function error_500($valor = 'Datos')
        {
            $this->response['status'] = "error";
            $this->response['result'] = array(
                'error_id' => '500',
                'error_msg' => 'No pudo hacer el registro'
            );

            return $this->response;
        }
    }
    