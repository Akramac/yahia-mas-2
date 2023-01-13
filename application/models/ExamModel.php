<?php
class ExamModel extends CI_Model
{
	function add_data_choices($userID, $title,$timepick,$CheckUnique,$checkMultiple,$option1,$option2,$option3,$option4,$fileUrl)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['duration']=$timepick;
		if(isset($CheckUnique) & $CheckUnique=='on'){
			$data['is_single_choice']=1;
		}
		if(isset($checkMultiple) & $checkMultiple=='on'){
			$data['is_single_choice']=0;
		}

		$data['option_1']=$option1;
		$data['option_2']=$option2;
		$data['option_3']=$option3;
		$data['option_4']=$option4;
		$data['file_url']=$fileUrl;
		$this->db->insert('question_multi_choice', $data);
		return $this->db->insert_id();
	}

	function add_data_long_text($userID, $title,$timepick,$fileUrl)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['duration']=$timepick;
		$data['file_url']=$fileUrl;
		$this->db->insert('question_long_text', $data);
		return $this->db->insert_id();
	}

	function add_data_tawsil($userID, $title,$timepick,$option1,$linkOption1,$option2,$linkOption2,$option3,$linkOption3,$option4,$linkOption4,$fileUrl)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['duration']=$timepick;

		$data['option_1']=$option1;
		$data['link-option_1']=$linkOption1;
		$data['option_2']=$option2;
		$data['link-option_2']=$linkOption2;
		$data['option_3']=$option3;
		$data['link-option_3']=$linkOption3;
		$data['option_4']=$option4;
		$data['link-option_4']=$linkOption4;
		$data['file_url']=$fileUrl;
		$this->db->insert('question_tawsil', $data);
		return $this->db->insert_id();
	}
}

?>
