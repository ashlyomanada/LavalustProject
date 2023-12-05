<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

class UserController extends Controller {
   

    public function __construct() {
    parent::__construct();
       /* if(! isLoggedin() && (segment(1) != 'login')) {
            redirect('login');
        }   */
        $this->call->model('User_model');
        $this->call->library('session');
    }


    public function index(){
        return $this->call->view('useregister');

    }
    public function login(){
        return $this->call->view('userlogin');
    }

    public function addMenu(){
        $this->call->library('upload');
        $data['errors'] = $this->upload->get_errors();
        return $this->call->view('addMenu',$data);
    }

   
    public function website(){
        $data = array(
           'menu' => $this->User_model->showMenu(),
           'product' => $this->User_model->showProduct(),
        );
        return $this->call->view('website',$data);
    }
    
    public function signin(){
        $this->call->library('upload');
        $data['errors'] = $this->upload->get_errors();
                if($this->form_validation->submitted()) {
                    $this->form_validation->name('email')->required()
                                        ->name('password')->required();
                    if($this->form_validation->run()){
                        $email = $this->io->post('email');
                        $password = $this->io->post('password');
                        $result =  $this->User_model->checkuser($email, $password);
                        $result2 =  $this->User_model->checkVerify($email);
                    if($result && $result2){
                        $_SESSION['email'] = $email;
                        $_SESSION['loggedin'] = 1;
                       redirect('/website');
                    }
                    else{
                        $data['error_message']= 'Invalid email or password';
                        $this->call->view('userlogin',$data);
                    }
                    }
                }
                else{
                    $this->call->view('userlogin');
                }
            }
       

    public function signup(){
        $username = $this->io->post('username');
        $email = $this->io->post('email');
        $verificationCode = substr(md5(rand()), 0, 8);
        if($this->form_validation->submitted()) {
            $this->form_validation->name('username')->required()
                                  ->name('email')->required()
                                  ->name('password')->required();
            if($this->form_validation->run()){
                $verifiedEmail = $this->User_model->verifyEmail($email);
                if(!$verifiedEmail){
                    $this->User_model->insert( $username, $email, $this->io->post('password'), $this->io->post('verified'),$verificationCode);
                    $this->call->view('useregister');
                    $this->call->library('email');
                    $this->email->sender('ashlyomanada@gmail.com', 'Ashly Omanada');
                    $this->email->recipient( $email);
                    $this->email->subject('Account Verification');
                    $this->email->email_content('<a href="http://localhost/LavalustProject/verify/' . $verificationCode . '" >verify</a>', 'html');
                    $this->email->send();
                    echo 'Email sent';
                }
                else{
                    $data['error_registered'] = 'Email already exist';
                    return $this->call->view('useregister',$data);
                }
            }
        }
    }
           
    public function edit($verificationCode){
        $result = $this->User_model->isverified( $verificationCode);
        if($result){
            return $this->call->view('userlogin');
        }
        return $this->call->view('userlogin');
    }
    

    public function reserve(){
        $email =   $_SESSION['email'] ;
        if(!empty($email)){
            $data = $this->User_model->showUser($email);
        $this->call->view('reserve', $data);
        }
    }

    public function reserveInsert(){
        $email =   $_SESSION['email'] ;
        if(!empty($email)){
            $data = $this->User_model->showUser($email);
            $id = substr(md5(rand()), 0, 10);
            $username = $this->io->post('username');
            $email = $this->io->post('email');
            $contact = $this->io->post('contact');
            $table = $this->io->post('table');
            $menu = $this->io->post('menu');
            $product = $this->io->post('product');
            $address = $this->io->post('address');
            $date = $this->io->post('date');
            $noPeople = $this->io->post('people');
            if($this->form_validation->submitted()) {
                $this->form_validation->name('username')->required()
                ->name('email')->required()
                ->name('contact')->required()
                ->name('table')->required()
                ->name('address')->required()
                ->name('date')->required()
                ->name('people')->required();
                if($this->form_validation->run()){
                $this->User_model->insertReserve($id, $username, $email,$contact,$table,$menu,$product ,$address,$date,$noPeople);
                redirect('/showHistory');
                } else{
                   
                    return $this->call->view('reserve',$data);
                }
            }
            else{
                return $this->call->view('reserve',$data);
            }
            
        }
        
    }

    public function showHistory(){
        $email =   $_SESSION['email'] ;
        if(!empty($email)){
            $data = $this->User_model->show($email);
            $this->call->view('history', $data);
        }
    }

    public function logout(){
        unset($_SESSION['email']);
        return $this->call->view('userlogin');
    }

    public function updateStatus($id){
        $data = $this->User_model->showHistory();
        if($this->form_validation->submitted()) {
            $this->form_validation->name('status')->required();
            if($this->form_validation->run()){
                $this->User_model->adminUpdate($id,$this->io->post('status'));
                redirect('admin',$data);
            }
            else{
                redirect('admin',$data);
            }
        }
        redirect('admin',$data);
    }

    public function cancelStatus($id){
        if($this->User_model->deleteHistory($id)){
            $email =   $_SESSION['email'] ;
            if(!empty($email)){
                $data = $this->User_model->show($email);
                redirect('/showHistory', $data);
            }
        }
        
    }

    public function upload() {
        if (isset($_FILES["userfile"])) {
            $this->call->library('upload', $_FILES["userfile"]);
            $this->upload
                ->set_dir('public')
                ->is_image()
                ->encrypt_name();
            if ($this->upload->do_upload()) {
                $name = $this->io->post('name');
                $price = $this->io->post('price');
                $data['filename'] = $this->upload->get_filename();
                $this->User_model->insertMenu($name,$price,$data['filename']);
                redirect('/getMenu');
            } else {
                $data['errors'] = $this->upload->get_errors();
                $this->call->view('home', $data);
            }
        } else {
            $data['errors'][] = 'No file selected for upload.';
            $this->call->view('home', $data);
        }
    }

    public function uploadProduct() {
        if (isset($_FILES["userfile"])) {
            $this->call->library('upload', $_FILES["userfile"]);
            $this->upload
                ->set_dir('public')
                ->is_image()
                ->encrypt_name();
            if ($this->upload->do_upload()) {
                $name = $this->io->post('name');
                $price = $this->io->post('price');
                $data['filename'] = $this->upload->get_filename();
                $this->User_model->insertProduct($name,$price,$data['filename']);
                redirect('/getProduct');
            } else {
                $data['errors'] = $this->upload->get_errors();
                $this->call->view('addProduct', $data);
            }
        } else {
            $data['errors'][] = 'No file selected for upload.';
            $this->call->view('addProduct', $data);
        }
    }
  
    public function updateMenu() {
        if(isset($_FILES["userfile"])){
            $this->call->library('upload', $_FILES["userfile"]);
            $this->upload
                ->set_dir('public')
                ->allowed_mimes(array('image/jpeg'))
                ->is_image()
                ->encrypt_name();
            if($this->upload->do_upload()) {
                $id = $this->io->post('id');
                $name = $this->io->post('name');
                $price = $this->io->post('price');
                $data['filename'] = $this->upload->get_filename();
                $this->User_model->editMenu($id,$name,$price,$data['filename']  );
                redirect('/getMenu');
            } else {
                redirect('/getMenu');
            }
        }
        else{
            //redirect('/getMenu');
        }
	}
    
    /*
     $email = $this->io->post('email');
                $this->User_model->isverified($email);
                $this->call->view('userlogin');
   
    public function insert(){
            if($this->form_validation->submitted()) {
                $this->form_validation->name('username')->required()->name('password')->required();
                if($this->form_validation->run()){
                    $this->User_model->insert($this->io->post('username'), $this->io->post('password'));
                    $this->call->view('userview');
                }
            }
        }
    

    public function show(){
        $data = $this->User_model->show();
        $this->call->view('usertable', $data);
    }
       
    public function delete($id) {
        if($this->User_model->delete($id))
       redirect('userstable');
        exit;
    }

    public function update_data(){
        $data = $this->User_model->show();
        if($this->form_validation->submitted()) {
            $this->form_validation->name('username')->required()->name('password')->required();
            if($this->form_validation->run()){
                $this->User_model->edit($this->io->post('userid'),$this->io->post('username'), $this->io->post('password'));
                $this->call->view('usertable', $data);
            }
            else{
                $this->call->view('hello');
            }
        }
        $this->call->view('userview');
    }
    */
}
?>