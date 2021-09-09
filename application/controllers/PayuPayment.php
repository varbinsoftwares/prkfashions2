<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PayuPayment extends CI_Controller {


    function success(){

        $this->load->view('payu/success');

    }
    function failed(){
        $this->load->view('payu/failed');
    }

}