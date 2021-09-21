<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PayuPayment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('User_model');
        $this->load->library('session');
        $session_user = $this->session->userdata('logged_in');
        if ($session_user) {
            $this->user_id = $session_user['login_id'];
        } else {
            $this->user_id = 0;
        }
        $this->checklogin = $this->session->userdata('logged_in');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];

        $this->db->where_in('attr_key', ["payu_merchant_key", "payu_salt_key",]);
        $query = $this->db->get('configuration_attr');
        $paymentattr = $query->result_array();
        $paymentconf = array();
        foreach ($paymentattr as $key => $value) {
            $paymentconf[$value['attr_key']] = $value['attr_val'];
        }
        $this->mid = "";
        $this->secret_code = "";
        $this->salesLink = "";
        $this->queryLink = "";
    }

    function process($order_key) {

        $order_details = $this->Product_model->getOrderDetails($order_key, 'key');

        $orderobj = ($order_details["order_data"]);
        $success = site_url('PayuPayment/success');
        $fail = site_url('PayuPayment/failure');

    
        $data['key'] =  $paymentconf["payu_merchant_key"];
        $productinfo = "Order No. ".$orderobj->order_no.", total ".$orderobj->total_quantity." products in order";
        $payu_array = array(
            "key" => "JpWlQ1",
            "email" => $orderobj->email, "amount" => $orderobj->total_price, "firstname" => $orderobj->name, "phone" => $orderobj->contact_no, "productinfo" => $productinfo, "surl" => $success, "furl" => $fail, "service_provider" => "payu_paisa");


        $MERCHANT_KEY =  $paymentconf["payu_merchant_key"];
        $SALT =  $paymentconf["payu_salt_key"];
// Merchant Key and Salt as provided by Payu.
//$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
        $PAYU_BASE_URL = "https://secure.payu.in";     // For Production Mode
        $action = '';
        $posted = array();
        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        $payu_array['txnid'] = $txnid;
        foreach ($payu_array as $key => $value) {
            $posted[$key] = $value;
        }
        $formError = 0;
        $hash = '';
// Hash Sequence
        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
        if (empty($posted['hash']) && sizeof($posted) > 0) {
            if (
                    empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount']) || empty($posted['firstname']) || empty($posted['email']) || empty($posted['phone']) || empty($posted['productinfo']) || empty($posted['surl']) || empty($posted['furl']) || empty($posted['service_provider'])
            ) {
                $formError = 1;
            } else {
                //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
                $hashVarsSeq = explode('|', $hashSequence);
                $hash_string = '';
                foreach ($hashVarsSeq as $hash_var) {
                    $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                    $hash_string .= '|';
                }

                $hash_string .= $SALT;

                $hash = strtolower(hash('sha512', $hash_string));
                $action = $PAYU_BASE_URL . '/_payment';
            
            }
        } elseif (!empty($posted['hash'])) {
            $hash = $posted['hash'];
            
            $action = $PAYU_BASE_URL . '/_payment';
        }
            $exportarray = array("action"=>$action, "hash"=>$hash, "payu_array"=>$payu_array);
            
        $this->load->view('payu/paymentoption', $exportarray);
    }

    function success() {

      $postarray = $this->input->post();

      $data['successdata']= $postarray;
      print_r($data);
        $this->load->view('payu/success',$data);
    }

    function failure() {
      $postarray = $this->input->post();
     print_r($postarray);
      $data['faildata']= $postarray;
        $this->load->view('payu/failure', $data );
    }

}
