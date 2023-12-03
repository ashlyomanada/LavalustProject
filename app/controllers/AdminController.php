<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AdminController extends Controller {
   

    public function __construct() {
    parent::__construct();
        $this->call->model('User_model');
        $this->call->library('session');
        $this->call->library('upload');
    }

    public function index(){
        return $this->call->view('useregister');

    }

    public function admin(){
        $data = $this->User_model->showHistory();
        return $this->call->view('admin', $data);
    }

    public function getMenu(){
        $data = $this->User_model->showMenu();
        return $this->call->view('adminMenu', $data);
    }

    public function getProduct(){
        $data = $this->User_model->showProduct();
        return $this->call->view('adminProducts', $data);
    }

    public function getDashboard(){
       $data = array(
        'users' => $this->User_model->totalusers(),
        'reserves'=> $this->User_model->reserves(),
        'pending'=> $this->User_model->totalPending(),
        'allreserves'=> $this->User_model->totalReserves(),
       );
        return $this->call->view('adminDashboard', $data);
    }

    public function getUsers(){
        $data = $this->User_model->showUsers();
        return $this->call->view('adminUsers', $data);
    }

    public function deleteMenu($id){
        if($this->User_model->deleteMenu($id))
       redirect('/getMenu');
        exit;
    }

    public function deleteProduct($id){
        if($this->User_model->deleteProduct($id))
       redirect('/getProduct');
        exit;
    }

    public function addProduct(){
            $this->call->library('upload');
            $data['errors'] = $this->upload->get_errors();
            return $this->call->view('addProduct',$data);
    }
    
    public function updateUsers(){
        if($this->form_validation->submitted()) {
            $this->form_validation->name('userid')->required()
                                    ->name('username')->required()
                                    ->name('email')->required()
                                    ->name('password')->required();
            if($this->form_validation->run()){
                $userid = $this->io->post('userid');
                $username = $this->io->post('username');
                $email = $this->io->post('email');
                $password = $this->io->post('password');
                $this->User_model->userUpdate($userid,$username,$email,$password);
                redirect('/getUsers');
            }
            else{
                redirect('/getUsers');
            }
        }
    }

    
  
         
    /*
    public function deleteUser($id){
        if($this->User_model->deleteUser($id))
       redirect('/getUsers');
        exit;
    }

    <div class="cardHeader">
                                <a href="<?= site_url('/deleteUser/'.$datas['userid']) ?>" type="button"
class="btn btn-primary">
<i class="fa-solid fa-trash fa-xl"></i>
</a>
</div>
public function upload() {
// Check if the file is selected
if (isset($_FILES["userfile"])) {
// Load the upload library
$this->call->library('upload', $_FILES["userfile"]);

// Configure upload settings
$this->upload
->set_dir('public')
->allowed_extensions(array('jpg'))
->allowed_mimes(array('image/jpeg'))
->is_image()
->encrypt_name();

// Attempt to upload the file
if ($this->upload->do_upload()) {
// File uploaded successfully
$email = $this->io->post('email');
$data['filename'] = $this->upload->get_filename();
$this->User_model->insertEmail($email,$data['filename']);
// Send email with the uploaded file link
$this->call->library('email');
$this->email->sender('ashlyomanada@gmail.com', 'Ashly Omanada');
$this->email->recipient($email);
$this->email->subject('Inbox');
$this->email->email_content('<a href="' . site_url('public/' . $data['filename']) . '"><img
        src="' . site_url('public/' . $data['filename']) . '" alt="Image Description"></a>', 'html');
$this->email->send();

// Load the home view with data
$this->call->view('welcome_page',$data);
} else {
// File upload failed, get errors and load the home view
$data['errors'] = $this->upload->get_errors();
$this->call->view('home', $data);
}
} else {
// No file selected, handle accordingly
$data['errors'][] = 'No file selected for upload.';
$this->call->view('home', $data);
}
}


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