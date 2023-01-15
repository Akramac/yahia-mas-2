<?php
class ExamModel extends CI_Model
{

	function add_exam($teacherID, $categoryId)
	{

		$data['teacher_id']=$teacherID;
		$data['categorie_id']=$categoryId;
		$this->db->insert('exams', $data);
		return $this->db->insert_id();
	}

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

	function add_mutli_choice_junction($questId, $examId)
	{

		$data['quest_multi_id']=$questId;
		$data['exam_id']=$examId;
		$this->db->insert('exam_quest_multi_junction', $data);
		return 'ok';
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

	function add_long_text_junction($questId, $examId)
	{

		$data['quest_long_text_id']=$questId;
		$data['exam_id']=$examId;
		$this->db->insert('exam_quest_long_text_junction', $data);
		return 'ok';
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

	function add_tawsil_junction($questId, $examId)
	{

		$data['quest_tawsil_id']=$questId;
		$data['exam_id']=$examId;
		$this->db->insert('exam_quest_tawsil_junction', $data);
		return 'ok';
	}
	function add_data_tartib($userID, $title,$timepick,$option1,$option2,$option3,$option4,$fileUrl)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['duration']=$timepick;

		$data['option_to_order_1']=$option1;
		$data['option_to_order_2']=$option2;
		$data['option_to_order_3']=$option3;
		$data['option_to_order_4']=$option4;
		$data['file_url']=$fileUrl;
		$this->db->insert('question_tartib', $data);
		return $this->db->insert_id();
	}
	function add_tartib_junction($questId, $examId)
	{

		$data['quest_tartib_id']=$questId;
		$data['exam_id']=$examId;
		$this->db->insert('exam_quest_tartib_junction', $data);
		return 'ok';
	}
}

?>
