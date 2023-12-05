<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
	public function insert($username,$email,$password,$verified,$verificationCode) {
		
		$data = array(
			'username' => $username,
			'email' => $email,
			'password' => $password,
			'verified' => $verified,
			'verificationCode' => $verificationCode,
		);

		$result = $this->db->table('userstable')->insert($data);
	}

	public function insertReserve($id, $username, $email,$contact,$table,$menu,$product ,$address,$date,$noPeople) {
		
		$data = array(
			'id' => $id,
			'fullname' => $username,
			'email' => $email,
			'contact' => $contact,
			'continenteaTbl' => $table,
			'menu' => $menu,
			'product' => $product,
			'address' => $address,
			'date' => $date,
			'noPeople' => $noPeople,
			'status' => 'Pending',
		);

		$result = $this->db->table('usershistory')->insert($data);
	}

	public function checkuser($email,$password){
		$where = [
			'email' => $email,
			'password' => $password
		];
		$result = $this->db->table('userstable')->where($where)->get();
		if($result)
			return true;
	}

	public function isverified($verificationCode){
		$data = array(
			'verified' => 'YES',
		);
		$result = $this->db->table('userstable')->where(array('verificationCode' => $verificationCode))->update($data);
		if($result)
		return true;
	}

	
	public function get($id){
		return $this->db->table('userstable')->where('userid',$id)->get();
	}
	
	public function checkVerify($email){
		$where = [
			'email' => $email,
			'verified' => 'YES'
		];
		$result =$this->db->table('userstable')->where($where)->get();
		if($result)
			return true;
	}

	public function showReserve($email){
		$where = [
			'email' => $email
		];
		$result =$this->db->table('usershistory')->where($where)->get();

		if($result)
			return true;
	}
	public function show($email){
		return $this->db->table('usershistory')->where('email', $email)->get_all();
	}

	public function showHistory(){
		
		return $this->db->table('usershistory')->order_by('date', 'ASC')->get_all();
	}

	public function showUser($email){
		return $this->db->table('userstable')->where('email', $email)->get_all();
	}

	public function adminUpdate($id,$status){
        $data = array(
			'status' => $status,
		);
		$result = $this->db->table('usershistory')->where(array('id' => $id))->update($data);
		if($result)
		return true;
    }

	public function deleteHistory($id){
		$result = $this->db->table('usershistory')->where(array('id' => $id))->delete();
	   if($result)
		return true;
	}
	
	public function insertMenu($name,$price,$image) {
		$data = array(
			'name' => $name,
			'price' => $price,
			'image' => $image,
		);

		$result = $this->db->table('menu')->insert($data);
	}

	public function insertProduct($name,$price,$image) {
		$data = array(
			'name' => $name,
			'price' => $price,
			'image' => $image,
		);

		$result = $this->db->table('product')->insert($data);
	}
	
	public function showUsers(){
		return $this->db->raw('SELECT * FROM usersTable');
	}

	public function showMenu(){
		return $this->db->raw('SELECT * FROM menu');
	}

	public function showProduct(){
		return $this->db->raw('SELECT * FROM product');
	}

	public function editMenu($id,$name,$price,$image){
        $data = array(
			'name' => $name,
			'price' => $price,
			'image' => $image,
		);
		$result = $this->db->table('menu')->where(array('id' => $id))->update($data);
    }

	public function deleteMenu($id) {
		$result = $this->db->table('menu')->where(array('id' => $id))->delete();
		if($result)
		 return true;
		
	 }

	 public function deleteProduct($id) {
		$result = $this->db->table('product')->where(array('id' => $id))->delete();
		if($result)
		 return true;
		
	 }

	 public function totalusers(){
		return $this->db->table('usersTable')->select_count('userid', 'total_row')->get();
	 }

	 public function reserves(){
		return $this->db->table('usershistory')->where("status", 'Reserved')->select_count('id', 'total_reserves')->get();
	 }

	 public function totalPending(){
		return $this->db->table('usershistory')->where("status", 'Pending')->select_count('id', 'total_reserves')->get();
	 }
	 
	 public function totalReserves(){
		return $this->db->table('usershistory')->select_count('id', 'total_reserves')->get();
	 }

	 public function userUpdate($userid,$username,$email,$password){
        $data = array(
			'username' => $username,
			'email' => $email,
			'password' => $password,
		);
		$result = $this->db->table('userstable')->where(array('userid' => $userid))->update($data);
		if($result)
		return true;
    }

	public function deleteUser($id) {
		$result = $this->db->table('userstable')->where(array('userid' => $id))->delete();
		if($result)
		 return true;
		
	 }

	 public function verifyEmail($email){
		$result = $this->db->table('userstable')->like('email', "%$email%")->get_all();
		if($result)
		 return true;
	 }

	 
	 
	/*
	public function show(){
		return $this->db->raw('SELECT * FROM userstable');
	}

	
	public function delete($id) {
       $result = $this->db->table('userstable')->where(array('userid' => $id))->delete();
	   if($result)
		return true;
	   
    }
		public function edit($id,$username,$password){
        $data = array(
			'username' => $username,
			'password' => $password,
		);
		$result = $this->db->table('userstable')->where(array('userid' => $id))->update($data);
    }

	public function get($id){
		return $this->db->table('userstable')->where('userid',$id)->get();
	}
*/
}
?>