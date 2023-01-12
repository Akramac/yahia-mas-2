<?php
class FormModel extends CI_Model
{

	function change_pass($session_id,$new_pass,$verificationKey,$encryptedPass)
	{
		$curren_time=new DateTime("now", new DateTimeZone("Asia/Riyadh"));
		$curren_time=$curren_time->format("Y-m-d");



		$update_pass=$this->db->query("UPDATE users set password='$encryptedPass' , verification_key ='$verificationKey' , date_updated ='$curren_time'  where id='$session_id'");

	}
}

?>
