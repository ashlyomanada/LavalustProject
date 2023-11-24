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

	public function insertReserve($id, $username, $email,$contact,$table ,$address,$date) {
		
		$data = array(
			'id' => $id,
			'fullname' => $username,
			'email' => $email,
			'contact' => $contact,
			'continenteaTbl' => $table,
			'address' => $address,
			'date' => $date,
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
		return $this->db->raw('SELECT * FROM usershistory');
	}

	public function adminUpdate($id,$status){
        $data = array(
			'status' => $status,
		);
		$result = $this->db->table('usershistory')->where(array('userid' => $id))->update($data);
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