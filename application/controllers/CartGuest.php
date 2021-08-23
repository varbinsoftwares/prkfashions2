<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CartGuest extends CI_Controller {

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
        $this->user_id = $this->checklogin ? $this->checklogin['login_id'] : "";
    }

    function redirectCart() {
        if ($this->checklogin) {
            $session_cart = $this->Product_model->cartData($this->user_id);
        } else {
            $session_cart = $this->Product_model->cartData();
        }
        if (count($session_cart['products'])) {
            
        } else {
            redirect('Cart/details');
        }
    }

    public function index() {
        $this->redirectCart();
        redirect('Cart/details');
    }

    function details() {
        $this->load->view('CartGuest/details');
    }

    function checkoutInit() {
        $this->redirectCart();
        redirect('CartGuest/checkoutShipping');
    }

    function checkoutShipping() {
        $this->redirectCart();
        $measurement_style = $this->session->userdata('measurement_style');
        $data['measurement_style_type'] = $measurement_style ? $measurement_style['measurement_style'] : "Please Select Size";

        $data['checkoutmode'] = 'Guest';


        $address = $this->session->userdata('shipping_address');
        $data['user_address_details'] = $address ? [$this->session->userdata('shipping_address')] : [];

        $user_info = $this->session->userdata('customer_inforamtion');
        $data['user_details'] = $user_info ? $this->session->userdata('customer_inforamtion') : array();

        $delivery_details = $this->session->userdata('delivery_details');
        $data['delivery_details'] = $delivery_details ? $this->session->userdata('delivery_details') : array();


//Get Address
        if (isset($_GET['removeAddress'])) {
            $addressdata = $this->session->userdata('shipping_address');
            $this->session->unset_userdata('shipping_address');
            $this->session->unset_userdata('customer_inforamtion');
            redirect('CartGuest/checkoutShipping');
        }

        if (isset($_POST['processtopayment'])) {
            $delivery_details = array(
                'delivery_date' => $this->input->post('delivery_date'),
                'delivery_time' => $this->input->post('delivery_time'),
            );

            $this->session->set_userdata('delivery_details', $delivery_details);
            redirect('CartGuest/checkoutPayment');
        }


        if (isset($_POST['processtopaymentpickup'])) {
            $category_array = array(
                'address1' => "Pickup At Woodlands",
                'address2' => "",
                'city' => "",
                'state' => "",
                'zipcode' => "Pickup",
                'country' => "",
                'user_id' => $this->user_id,
                'status' => 'default',
            );
            $this->session->set_userdata('shipping_address', $category_array);
            $customer = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'contact_no' => $this->input->post('contact_no'),
            );
            $this->session->set_userdata('customer_inforamtion', $customer);


            $delivery_details = array(
                'delivery_date' => $this->input->post('delivery_date'),
                'delivery_time' => $this->input->post('delivery_time'),
            );
            $this->session->set_userdata('delivery_details', $delivery_details);

            redirect('CartGuest/checkoutPayment');
        }

//add New address
        if (isset($_POST['add_address'])) {
            $category_array = array(
                'address1' => $this->input->post('address1'),
                'address2' => $this->input->post('address2'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
                'country' => $this->input->post('country'),
                'user_id' => $this->user_id,
                'status' => 'default',
            );
            $this->session->set_userdata('shipping_address', $category_array);
            $customer = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'contact_no' => $this->input->post('contact_no'),
            );
            $this->session->set_userdata('customer_inforamtion', $customer);


            $delivery_details = array(
                'delivery_date' => $this->input->post('delivery_date'),
                'delivery_time' => $this->input->post('delivery_time'),
            );
            $this->session->set_userdata('delivery_details', $delivery_details);

            redirect('CartGuest/checkoutShipping');
        }
        $data["isguest"] = "true";
        $this->load->view('Cart/checkoutShipping', $data);
    }

    function checkoutPayment() {
        $this->redirectCart();

        $user_address_details = $this->session->userdata('shipping_address');
        $data['user_address_details'] = $user_address_details ? [$this->session->userdata('shipping_address')] : [];

        $user_details = $this->session->userdata('customer_inforamtion');
        $data['user_details'] = $user_details ? $this->session->userdata('customer_inforamtion') : array();

        $data['checkoutmode'] = 'Guest';
        $data["isguest"] = "true";

        $delivery_details = $this->session->userdata('delivery_details');
        $data['delivery_details'] = $delivery_details ? $this->session->userdata('delivery_details') : array();

        $genstatus = "Confirmation Pending";


//place order
        if (isset($_POST['place_order'])) {
            $address = $user_address_details;

            if ($this->checklogin) {
                $session_cart = $this->Product_model->cartData($this->user_id);
            } else {
                $session_cart = $this->Product_model->cartData();
            }

            $session_cart['shipping_price'] = 40;
            if ($session_cart['total_price'] > 399) {
                $session_cart['shipping_price'] = 0;
            }
            if ($address['zipcode'] == 'Tsim Sha Tsui') {
                $session_cart['shipping_price'] = 0;
            }
            if ($address['zipcode'] == 'Pickup') {
                $session_cart['shipping_price'] = 0;
            }

            $session_cart['sub_total_price'] = $session_cart['total_price'];

            $session_cart['total_price'] = $session_cart['total_price'] + $session_cart['shipping_price'];


            $sub_total_price = $session_cart['sub_total_price'];
            $total_quantity = $session_cart['total_quantity'];
            $total_price = $session_cart['total_price'];
            $shipping_price = $session_cart['shipping_price'];

//place order

            $address = $user_address_details;
            $paymentmathod = $this->input->post('place_order');
            $order_array = array(
                'name' => $user_details['name'],
                'email' => $user_details['email'],
                'user_id' => 'guest',
                'contact_no' => $user_details['contact_no'],
                'zipcode' => $address['zipcode'],
                'address1' => $address['address1'],
                'address2' => $address['address2'],
                'city' => $address['city'],
                'state' => $address['state'],
                'country' => $address['country'],
                'order_date' => date('Y-m-d'),
                'order_time' => date('H:i:s'),
                'amount_in_word' => $this->Product_model->convert_num_word($total_price),
                'sub_total_price' => $sub_total_price,
                'total_price' => $total_price,
                'shipping_price' => $shipping_price,
                'total_quantity' => $total_quantity,
                'status' => $genstatus,
                'payment_mode' => $paymentmathod,
                'measurement_style' => "",
         
            );

            $this->db->insert('user_order', $order_array);
             $last_id = $this->db->insert_id();
            $orderno = "PRK" . date('Ymd') . "" . $last_id;
            $orderkey = md5($orderno);
            $this->db->set('order_no', $orderno);
            $this->db->set('order_key', $orderkey);
            $this->db->where('id', $last_id);
            $this->db->update('user_order');
            
            $this->Product_model->cartOperationCustomCopyOrder($last_id);

            $order_status_data = array(
                'c_date' => date('Y-m-d'),
                'c_time' => date('H:i:s'),
                'order_id' => $last_id,
                'status' => $genstatus,
                'user_id' => 'guest',
                'remark' => "$genstatus By Using " . $paymentmathod . ",  Waiting For Payment",
            );
            $this->db->insert('user_order_status', $order_status_data);

            $newdata = array(
                'username' => '',
                'password' => '',
                'logged_in' => FALSE,
            );

            $this->session->unset_userdata($newdata);
            $this->session->sess_destroy();
            switch ($paymentmathod) {
                case 'Alipay':
                    redirect('Order/orderPayment/' . $orderkey . "/ALIPAY");
                    break;
                case 'WeChat':
                    redirect('Order/orderPayment/' . $orderkey . "/WECHAT");
                    break;
                default:
                    redirect('Order/orderdetails/' . $orderkey);
            }
        }
        $this->load->view('Cart/checkoutPayment', $data);
    }

}

?>
