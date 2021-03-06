<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('session');
        $this->currentuser = $this->session->userdata('logged_in');
       $sessionuser =  $this->session->userdata('logged_in');
        $this->user_id = $sessionuser ? $sessionuser['login_id'] : 0;
    }

    public function index() {
        $newproducts = $this->Product_model->newArrival();
        $data['newproducts'] = $newproducts;
        
        $topproducts = $this->Product_model->topProducts();
        $data['topproducts'] = $topproducts;
        $sliders = [];
        $this->db->where('status', "Active");
        $query = $this->db->get('settings_slider');
        $sliders = $query->result_array();
        $data["homepageslider"] = $sliders;

        $this->db->where('parent_id', "0");
        $category = $this->db->get('category');
        $data['category']= $category;

        $this->load->view('home', $data);
    }
    

    public function contactus() {
        if (isset($_POST['sendmessage'])) {
            $web_enquiry = array(
                'last_name' => $this->input->post('last_name'),
                'first_name' => $this->input->post('first_name'),
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'datetime' => date("Y-m-d H:i:s a"),
            );

            $this->db->insert('web_enquiry', $web_enquiry);

            $emailsender = email_sender;
            $sendername = email_sender_name;
            $email_bcc = email_bcc;
            $sendernameeq = $this->input->post('last_name') . " " . $this->input->post('first_name');
            if ($this->input->post('email')) {
                $this->email->set_newline("\r\n");
                $this->email->from($this->input->post('email'), $sendername);
                $this->email->to(email_bcc);
                $this->email->bcc($this->input->post('email'));
                $subjectt = $this->input->post('subject');
                $orderlog = array(
                    'log_type' => 'Enquiry',
                    'log_datetime' => date('Y-m-d H:i:s'),
                    'user_id' => 'ENQ',
                    'log_detail' => "Enquiry from website - " . $this->input->post('subject')
                );
                $this->db->insert('system_log', $orderlog);

                $subject = "Enquiry from website - " . $this->input->post('subject');
                $this->email->subject($subject);

                $web_enquiry['web_enquiry'] = $web_enquiry;



                $htmlsmessage = $this->load->view('Email/web_enquiry', $web_enquiry, true);

                if ($this->input->post('email')) {
                    $this->email->message($htmlsmessage);

                    $this->email->print_debugger();
                    $send = $this->email->send();
                    if ($send) {
                        echo json_encode("send");
                    } else {
                        $error = $this->email->print_debugger(array('headers'));
                        echo json_encode($error);
                    }
                } else {
                    echo $htmlsmessage;
                }
            }

            redirect('Shop/contactus');
        }
        $this->load->view('pages/contactus');
    }

    public function aboutus() {
        $this->load->view('pages/aboutus');
    }
    public function productdetail() {
        $this->load->view('pages/productdetail');
    }

    public function error404() {
        $this->load->view('pages/error404');
    }

    public function faq() {
        $this->load->view('pages/faq');
    }
    
    public function catalogs() {
        $this->load->view('pages/catalogue');
    }

    public function customer_service() {
        $this->load->view('pages/customer_service');
    }

    public function product_support() {
        $this->load->view('pages/product_support');
    }

    public function terms_condition() {
        $this->load->view('pages/T&C');
    }

    public function booknow() {
        if (isset($_POST['booknow'])) {
            $booking_order = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
                'select_date' => $this->input->post('select_date'),
                'select_time' => $this->input->post('select_time'),
                'people' => $this->input->post('people'),
                'datetime' => date("Y-m-d H:i:s a"),
                'order_source' => 'Website',
                'extra_remark' => '',
                'booking_type' => '',
                'select_table' => '',
            );
            $this->db->insert('booking_order', $booking_order);
            $last_id = $this->db->insert_id();
            $oderid = $last_id;
            $ordertype = "Website";
            $orderlog = array(
                'log_type' => "Reservation Received",
                'log_datetime' => date('Y-m-d H:i:s'),
                'user_id' => "",
                'order_id' => $last_id,
                'log_detail' => "Booking No. #$last_id  $ordertype From Website",
            );
            $this->db->insert('system_log', $orderlog);
            //email sending
            $emailsender = email_sender;
            $sendername = email_sender_name;
            $email_bcc = email_bcc;

            if ($this->input->post('email')) {
                $this->email->set_newline("\r\n");
                $this->email->from(email_bcc, $sendername);
                $this->email->to($this->input->post('email'));
                $this->email->bcc(email_bcc);
                $subjectt = "Thank you for your booking.";
                $subject = $subjectt;
                $this->email->subject($subject);
                $appointment['appointment'] = $booking_order;
                $appointment['orderid'] = $oderid;
                $htmlsmessage = $this->load->view('Email/weborder', $appointment, true);
                if (REPORT_MODE == 1) {

                    $this->email->message($htmlsmessage);
                    $this->email->print_debugger();
                    $send = $this->email->send();
                    if ($send) {
                        redirect("book-now");
                    } else {
                        $error = $this->email->print_debugger(array('headers'));
                        redirect("book-now");
                    }
                } else {
                    echo $htmlsmessage;
                }
            }
            redirect("book-now");
        }
        $this->load->view('pages/booknow');
    }

    public function blog($pageno = 0) {
        $query = $this->db->get('style_tips');
        $blogs = $query->result_array();
        $data['blogs']= $blogs;

        $query = $this->db->get('style_category');
        $blog_cate = $query->result_array();
        $data['blog_cate']= $blog_cate;

        $query = $this->db->get('style_tags');
        $blog_tag = $query->result_array();
        $data['blog_tag']= $blog_tag;

        $this->db->limit(5);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get("style_tips");
        $recents = $query->result_array();
        $data['recents'] =$recents;

        
        $query4 = $this->db->get("user_comment");
        $comments = $query4->result_array();
        $data['comments'] = $comments;
        foreach ($comments as $row){
            $total_comment++;
        }
        $data['total_comment'] = $total_comment;
        echo $total_comment;
        $this->load->view('Blog/blog' ,$data);
    }
    
    public function blogdetail($bid){
        $query1 = $this->db->get('style_category');
        $blog_cate = $query1->result_array();
        $data['blog_cate']= $blog_cate;

        $query2 = $this->db->get('style_tags');
        $blog_tag = $query2->result_array();
        $data['blog_tag']= $blog_tag;

                $this->db->where('id', $bid);      
        $query3 = $this->db->get('style_tips');
        $blog_single = $query3->row_array();
        $data['blog_single']= $blog_single;
        
        $this->db->limit(5);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get("style_tips");
        $recents = $query->result_array();
        $data['recents'] =$recents; 

            $this->db->where('post_id', $bid);
        $query4 = $this->db->get("user_comment");
        $comments = $query4->result_array();
        $data['comments'] = $comments;
        foreach ($comments as $row){
            $total_comment++;
        }
        $data['total_comment'] = $total_comment;
        if($this->user_id){
            if (isset($_POST['blog_comment'])) {
    
                $commentdata=  array("post_id" => $bid ,
               "user_id"=>  $this->user_id ,
               "name"=> $this->currentuser['first_name']. " ".$this->currentuser['last_name'] ,
               "email"=> $this->currentuser['username'],
               //"status"=> 'unseen' ,
               "comment"=> $this->input->post('comment') ,
               "website" => $this->input->post('website'),
               "op_date_time"=>date('d M, Y'),
               
            );
             
              
              $this->db->insert('user_comment', $commentdata);
    
              $this->session->set_flashdata('login', 'Thanks for comment!');
    
          }
          else{
            $this->session->set_flashdata('login', 'Login or Register to comment. !');
         }
          
         }
         

        $this->load->view('Blog/blog_detail' ,$data);
    }
    function loyalprogram() {
        $this->load->view('pages/loyalprogram');
    }

    function privacy_policy() {
        $this->load->view('pages/pp');
    }

    function gallery() {
        $this->load->view('pages/gallery');
    }

    function return_exchange() {
        $this->load->view('pages/return_exchange');
    }

    public function feedback() {
        if (isset($_POST['submit_now'])) {
            $feedback = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
                'gender' => $this->input->post('gender'),
                'age_group' => $this->input->post('age_group'),
                'quality_of_food' => $this->input->post('quality_of_food'),
                'quantity_of_food' => $this->input->post('quantity_of_food'),
                'on_time_delivery' => $this->input->post('on_time_delivery'),
                'variety_of_food' => $this->input->post('variety_of_food'),
                'comment' => $this->input->post('comment'),
                'feedback_date' => date("Y-m-d"),
                'feedback_time' => date("H:i:s a"),
            );
            $this->db->insert('feedback_list', $feedback);
            $last_id = $this->db->insert_id();
            $oderid = $last_id;
            $ordertype = "Website";
            $orderlog = array(
                'log_type' => "Feedback Received",
                'log_datetime' => date('Y-m-d H:i:s'),
                'user_id' => "",
                'order_id' => $last_id,
                'log_detail' => "New Feedback from websie",
            );
            $this->db->insert('system_log', $orderlog);
            //email sending
            $emailsender = email_sender;
            $sendername = email_sender_name;
            $email_bcc = email_bcc;

            if ($this->input->post('email')) {
                $this->email->set_newline("\r\n");
                $this->email->from(email_bcc, $sendername);
                $this->email->to($this->input->post('email'));
                $this->email->bcc(email_bcc);
                $subjectt = "Thank you for your Feedback.";
                $subject = $subjectt;
                $this->email->subject($subject);
                $appointment['feedback'] = $feedback;
                $htmlsmessage = $this->load->view('Email/feedback', $appointment, true);
                if (REPORT_MODE == 1) {
                    $this->email->message($htmlsmessage);
                    $this->email->print_debugger();
                    $send = $this->email->send();
                    if ($send) {
                        redirect("feedback");
                    } else {
                        $error = $this->email->print_debugger(array('headers'));
                        redirect("feedback");
                    }
                } else {
                    echo $htmlsmessage;
                }
            }
            redirect("feedback");
        }
        $this->load->view('pages/feedback');
    }

    function testDate() {
        $timeslotarray = ["10:29 AM", "12:30 PM", "02:24 PM", "04:30 PM", "06:30 PM", "07:30 PM", "10:20 PM", date("h:i A")];

        $timeslot = [];
        foreach ($timeslotarray as $key => $value) {
            $check = $this->Utils->checkTime($value);
            echo "--<br>";
            print_r($check);
        }
    }

}
