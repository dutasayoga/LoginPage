<?php


defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function register()
    {
        //$this->form_validation->set_rules('email', 'Email', 'callback_email_check');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|callback_email_check');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[12]|callback_password_check');
        $this->form_validation->set_rules('firstName', 'FirstName', 'required|trim');
        $this->form_validation->set_rules('lastName', 'LastName', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('auth/register');
        } else {
            $data = [
                'firstName' => $this->input->post('firstName', true),
                'lastName' => $this->input->post('lastName', true),
                'email' => $this->input->post('email', true),
                'password' => $this->input->post('password', true)
            ];

            $client = new Client();

            $response = $client->request('POST', 'https://dummyapi.io/data/v1/user/create/', [

                'headers' => [
                    'app-id' => '638e86cdb3def478450e6399',
                    'User-Agent' => 'testing/1.0',
                    'Accept'     => 'application/json',
                    'X-Foo'      => ['Bar', 'Baz']
                ],
                'form_params' => $data,

            ]);

            $this->load->view('user/index');
            var_dump($response);
        }
    }

    public function email_check($str)
    {

        $email = $this->input->post("email");
        if (strpos($email, "rumahweb.co.id")) {
            return TRUE;
        } else {
            $this->form_validation->set_message('email_check', 'Use only @rumahweb.co.id email');
            return FALSE;
        }
    }

    public function password_check($password = '')

    {
        $password = trim($password);
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';
        if (empty($password)) {
            $this->form_validation->set_message('password_check', 'The {field} field is required.');
            return FALSE;
        }
        if (preg_match_all($regex_lowercase, $password) < 1) {
            $this->form_validation->set_message('password_check', 'The {field} field must be at least one lowercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_uppercase, $password) < 1) {
            $this->form_validation->set_message('password_check', 'The {field} field must be at least one uppercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_number, $password) < 1) {
            $this->form_validation->set_message('password_check', 'The {field} field must have at least one number.');
            return FALSE;
        }
        if (preg_match_all($regex_special, $password) < 2) {
            $this->form_validation->set_message('password_check', 'The {field} field must have at least two special character.');
            return FALSE;
        }
        return TRUE;
    }
}
