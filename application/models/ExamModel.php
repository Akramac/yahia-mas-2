<?php
class ExamModel extends CI_Model
{

	function add_exam($titleExam,$durationExam,$teacherID, $categoryId)
	{

		$data['title_exam']=$titleExam;
		$data['duration_exam']=$durationExam;
		$data['teacher_id']=$teacherID;
		$data['categorie_id']=$categoryId;
		$this->db->insert('exams', $data);
		$idExam=$this->db->insert_id();

		$dataJunction['teacher_id']=$teacherID;
		$dataJunction['exam_id']=$this->db->insert_id();
		$this->db->insert('exams_teachers_junction', $dataJunction);

		return $idExam;
	}

	function add_data_choices($userID, $title,$timepick,$CheckUnique,$option1,$correctOption1,$option2,$correctOption2,$option3,$correctOption3,$option4,$correctOption4,$option5,$option6,$fileUrl,$points)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['duration']=$timepick;
		if(isset($CheckUnique) & $CheckUnique=='single'){
			$data['is_single_choice']=1;
		}else{
			$data['is_single_choice']=0;
		}

		$data['option_1']=$option1;
		$data['correct_option_1']=$correctOption1;
		$data['option_2']=$option2;
		$data['correct_option_2']=$correctOption2;
		$data['option_3']=$option3;
		$data['correct_option_3']=$correctOption3;
		$data['option_4']=$option4;
		$data['correct_option_4']=$correctOption4;
		$data['option_5']=$option5;
		$data['option_6']=$option6;
		$data['file_url']=$fileUrl;
		$data['points']=$points;
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

	function add_data_long_text($userID, $title,$correct,$timepick,$fileUrl,$points)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['correct_long_text']=$correct;
		$data['duration']=$timepick;
		$data['file_url']=$fileUrl;
		$data['points']=$points;
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
	function add_data_tawsil($userID, $title,$timepick,$option1,$linkOption1,$option2,$linkOption2,$option3,$linkOption3,$option4,$linkOption4,$option5,$linkOption5,$option6,$linkOption6,$fileUrl,$points)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['duration']=$timepick;

		$data['option_1']=$option1;
		$data['link_option_1']=$linkOption1;
		$data['option_2']=$option2;
		$data['link_option_2']=$linkOption2;
		$data['option_3']=$option3;
		$data['link_option_3']=$linkOption3;
		$data['option_4']=$option4;
		$data['link_option_4']=$linkOption4;
		$data['option_5']=$option5;
		$data['link_option_5']=$linkOption5;
		$data['option_6']=$option6;
		$data['link_option_6']=$linkOption6;
		$data['file_url']=$fileUrl;
		$data['points']=$points;
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
	function add_data_tartib($userID, $title,$timepick,$option1,$option2,$option3,$option4,$option5,$option6,$fileUrl,$points)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['duration']=$timepick;

		$data['option_to_order_1']=$option1;
		$data['option_to_order_2']=$option2;
		$data['option_to_order_3']=$option3;
		$data['option_to_order_4']=$option4;
		$data['option_to_order_5']=$option5;
		$data['option_to_order_6']=$option6;
		$data['file_url']=$fileUrl;
		$data['points']=$points;
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

	public function isDuplicateExamTeacherJunction($data)
	{
		$sql = "SELECT teacher_id, exam_id
    FROM exams_teachers_junction
    WHERE teacher_id = ? AND exam_id = ? 
    ";
		$query = $this->db->query($sql, array($data['teacher_id'], $data['exam_id']));
		//$query->result();

		//If there are rows, means this review is duplicated
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function add_category($categoryName)
	{

		$data['name']=$categoryName;
		$this->db->insert('categories', $data);
		$idCategory=$this->db->insert_id();
		return $idCategory;
	}

	function add_affectation_student_exam($idStudent,$idExam)
	{


		$dataJunction['student_id']=$idStudent;
		$dataJunction['exam_id']=$idExam;
		$this->db->insert('student_exam_junction', $dataJunction);


		return $idExam;
	}

	function add_affectation_student_teacher($idStudent,$idTeacher)
	{

		$dataJunction2['student_id']=$idStudent;
		$dataJunction2['teacher_id']=$idTeacher;
		$this->db->insert('student_teacher_junction', $dataJunction2);
		return $idTeacher;
	}

	public function isDuplicateAffectationStudentExam($data)
	{
		$sql = "SELECT student_id, exam_id
    FROM student_exam_junction
    WHERE student_id = ? AND exam_id = ? 
    ";
		$query = $this->db->query($sql, array($data['student_id'], $data['exam_id']));
		//$query->result();

		//If there are rows, means this review is duplicated
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function isDuplicateAffectationStudentTeacher($data)
	{
		$sql = "SELECT student_id, teacher_id
    FROM student_teacher_junction
    WHERE student_id = ? AND teacher_id = ? 
    ";
		$query = $this->db->query($sql, array($data['student_id'], $data['id_teacher']));
		//$query->result();

		//If there are rows, means this review is duplicated
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}

?>
