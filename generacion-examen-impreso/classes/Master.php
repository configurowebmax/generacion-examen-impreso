<?php
require_once('../config.php');
class Master extends DBConnection
{
	private $settings;
	public function __construct()
	{
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct()
	{
		parent::__destruct();
	}
	function capture_err()
	{
		if (!$this->conn->error)
			return false;
		else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			return json_encode($resp);
			exit;
		}
	}
	function delete_img()
	{
		extract($_POST);
		if (is_file($path)) {
			if (unlink($path)) {
				$resp['status'] = 'success';
			} else {
				$resp['status'] = 'failed';
				$resp['error'] = 'fallo al eliminar ' . $path;
			}
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = 'Ruta desconocida ' . $path;
		}
		return json_encode($resp);
	}
	function save_content()
	{
		extract($_POST);
		if (isset($content)) {
			foreach ($content as $k => $v) {
				$save_file = file_put_contents(base_app . $k . ".html", $v);
				if (!$save_file) {
					break;
				}
			}
			if ($save_file) {
				$resp['status'] = "success";
				$resp['msg'] = "El contenido se ha actualizado correctamente";
			} else {
				$resp['status'] = "failed";
				$resp['msg'] = "El contenido no se pudo actualizar.";
			}
		} else {
			$resp['status'] = "failed";
			$resp['msg'] = "El contenido no se pudo actualizar.";
		}
		if ($resp['status'] == 'success') {
			$this->settings->set_flashdata('success', $resp['msg']);
		}
		return json_encode($resp);
	}
	function save_contact()
	{
		extract($_POST);
		$allowed_fields = array_keys($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!empty($data)) $data .= ", ";
			$data .= "('{$this->conn->real_escape_string($k)}','{$this->conn->real_escape_string($v)}')";
		}
		if (!empty($data)) {
			$delete_query = "DELETE FROM `system_info` WHERE meta_field IN ('" . implode("','", $allowed_fields) . "')";
			$delete_result = $this->conn->query($delete_query);
			if (!$delete_result) {
				$resp['status'] = 'failed';
				$resp['msg'] = "Error al eliminar registros antiguos: " . $this->conn->error;
				return json_encode($resp);
			}

			$sql = "INSERT INTO `system_info` (`meta_field`, `meta_value`) VALUES {$data}";
			$save = $this->conn->query($sql);
			if ($save) {
				$resp['status'] = 'success';
				$resp['msg'] = "La información de contacto se guardó correctamente.";
				foreach ($_POST as $k => $v) {
					$this->settings->set_info($k, $v);
				}
			} else {
				$resp['status'] = 'failed';
				$resp['msg'] = "La información de contacto no se pudo actualizar.";
				$resp['error'] = $this->conn->error;
				$resp['sql'] = $sql;
			}
		} else {
			$resp['status'] = 'failed';
			$resp['msg'] = "No hay datos para guardar.";
		}
		if ($resp['status'] == 'success') {
			$this->settings->set_flashdata('success', $resp['msg']);
		}
		return json_encode($resp);
	}
	function save_system_info()
	{
		$data = '';
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('img', 'cover'))) {
				if (!empty($data)) $data .= ",";
				$v = $this->conn->real_escape_string($v);
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if (!empty($data)) {
			$sql = "UPDATE `system_info` set {$data} ";
			$save = $this->conn->query($sql);
			if ($save) {
				$resp['status'] = 'success';
				$resp['msg'] = 'La información del sistema se actualizó correctamente.';
				if (isset($_FILES['img']) && $_FILES['img']['tmp_name'] != '') {
					$fname = 'uploads/' . strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];
					$move = move_uploaded_file($_FILES['img']['tmp_name'], '../' . $fname);
					if ($move) {
						$this->conn->query("UPDATE `system_info` set meta_value = '{$fname}' where meta_field = 'logo' ");
					}
				}
				if (isset($_FILES['cover']) && $_FILES['cover']['tmp_name'] != '') {
					$fname = 'uploads/' . strtotime(date('y-m-d H:i')) . '_' . $_FILES['cover']['name'];
					$move = move_uploaded_file($_FILES['cover']['tmp_name'], '../' . $fname);
					if ($move) {
						$this->conn->query("UPDATE `system_info` set meta_value = '{$fname}' where meta_field = 'cover' ");
					}
				}
				$this->settings->set_flashdata('success', $resp['msg']);
			} else {
				$resp['status'] = 'failed';
				$resp['msg'] = 'Ocurrió un error al actualizar la información del sistema.';
				$resp['err'] = $this->conn->error . "[{$sql}]";
			}
		} else {
			$resp['status'] = 'failed';
			$resp['msg'] = 'No hay datos para guardar.';
		}
		return json_encode($resp);
	}
	function save_course()
	{
		if (empty($_POST['id'])) {
			$_POST['user_id'] = $this->settings->userdata('id');
		}
		$uid = $this->settings->userdata('id');
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id'))) {
				if (!empty($data)) $data .= ",";
				$v = $this->conn->real_escape_string(trim($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `course_list` where `name` = '{$name}' and user_id = '{$uid}' and delete_flag = 0 " . (!empty($id) ? " and id != {$id} " : "") . " ")->num_rows;
		if ($this->capture_err())
			return $this->capture_err();
		if ($check > 0) {
			$resp['status'] = 'failed';
			$resp['msg'] = "El nombre del curso ya existe.";
			return json_encode($resp);
			exit;
		}
		if (empty($id)) {
			$sql = "INSERT INTO `course_list` set {$data} ";
		} else {
			$sql = "UPDATE `course_list` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if ($save) {
			$bid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			if (empty($id))
				$resp['msg'] = "Nuevo curso guardado correctamente.";
			else
				$resp['msg'] = "Curso actualizado correctamente.";
		} else {
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error . "[{$sql}]";
		}
		if ($resp['status'] == 'success')
			$this->settings->set_flashdata('success', $resp['msg']);
		return json_encode($resp);
	}
	function delete_course()
	{
		extract($_POST);
		$del = $this->conn->query("UPDATE `course_list` set `delete_flag` = 1 where id = '{$id}'");
		if ($del) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', "Curso eliminado correctamente.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function save_class()
	{
		if (empty($_POST['id'])) {
			$_POST['user_id'] = $this->settings->userdata('id');
		}
		$uid = $this->settings->userdata('id');

		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id'))) {
				if (!empty($data)) $data .= ",";
				$v = $this->conn->real_escape_string(trim($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `class_list` where `name` = '{$name}' and user_id = '{$uid}' and `course_id` = '{$course_id}' and user_id = '{$this->settings->userdata('id')}' and delete_flag = 0 " . (!empty($id) ? " and id != {$id} " : "") . " ")->num_rows;
		if ($this->capture_err())
			return $this->capture_err();
		if ($check > 0) {
			$resp['status'] = 'failed';
			$resp['msg'] = "La clase ya existe en el curso seleccionado.";
			return json_encode($resp);
			exit;
		}
		if (empty($id)) {
			$sql = "INSERT INTO `class_list` set {$data} ";
		} else {
			$sql = "UPDATE `class_list` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if ($save) {
			$bid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			if (empty($id))
				$resp['msg'] = "Nueva clase guardada correctamente.";
			else
				$resp['msg'] = "Clase actualizada correctamente.";
		} else {
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error . "[{$sql}]";
		}
		if ($resp['status'] == 'success')
			$this->settings->set_flashdata('success', $resp['msg']);
		return json_encode($resp);
	}
	function delete_class()
	{
		extract($_POST);
		$del = $this->conn->query("UPDATE `class_list` set `delete_flag` = 1 where id = '{$id}'");
		if ($del) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', "Clase eliminada correctamente.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function save_question_paper()
	{
		if (empty($_POST['id'])) {
			$_POST['user_id'] = $this->settings->userdata('id');
		}
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id'))) {
				if (!empty($data)) $data .= ",";
				$v = $this->conn->real_escape_string(trim($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `question_paper_list` where `title` = '{$title}' and `class_id` = '{$class_id}' and user_id = '{$this->settings->userdata('id')}' and delete_flag = 0 " . (!empty($id) ? " and id != {$id} " : "") . " ")->num_rows;
		if ($this->capture_err())
			return $this->capture_err();
		if ($check > 0) {
			$resp['status'] = 'failed';
			$resp['msg'] = "El cuestionario ya existe en la clase seleccionada.";
			return json_encode($resp);
			exit;
		}
		if (empty($id)) {
			$sql = "INSERT INTO `question_paper_list` set {$data} ";
		} else {
			$sql = "UPDATE `question_paper_list` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if ($save) {
			$qid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['qid'] = $qid;
			$resp['status'] = 'success';
			if (empty($id))
				$resp['msg'] = "Nuevo cuestionario guardado correctamente.";
			else
				$resp['msg'] = "Cuestionario actualizado correctamente.";
		} else {
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error . "[{$sql}]";
		}
		if ($resp['status'] == 'success')
			$this->settings->set_flashdata('success', $resp['msg']);
		return json_encode($resp);
	}
	function delete_question_paper()
	{
		extract($_POST);
		$del = $this->conn->query("UPDATE `question_paper_list` set `delete_flag` = 1 where id = '{$id}'");
		if ($del) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', "Cuestionario eliminado correctamente.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function save_question()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id')) && !is_array($_POST[$k])) {
				if (!empty($data)) $data .= ",";
				$v = $this->conn->real_escape_string(trim($v));
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if (empty($id)) {
			$sql = "INSERT INTO `question_list` set {$data} ";
		} else {
			$sql = "UPDATE `question_list` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if ($save) {
			$qid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['qid'] = $qid;
			$resp['status'] = 'success';
			if (empty($id))
				$resp['msg'] = "Nuevo cuestionario guardado correctamente.";
			else
				$resp['msg'] = "Cuestionario actualizado correctamente.";
			if (isset($choice)) {
				$data = "";
				foreach ($choice as $v) {
					if (!empty($v)) {
						if (!empty($data))  $data .= ", ";
						$v = $this->conn->real_escape_string($v);
						$data .= "('{$qid}','{$v}')";
					}
				}
				if (!empty($data)) {
					$this->conn->query("DELETE FROM `choice_list` where question_id = '{$qid}'");
					$sql2 = "INSERT INTO `choice_list` (`question_id`, `choice`) VALUES {$data}";
					$save2 = $this->conn->query($sql2);
					if (!$save2) {
						$resp['status'] = 'failed';
						$resp['msg'] = "Ocurrió un error al guardar los datos";
						$resp['erro'] = $this->conn->error;
						$resp['sql'] = $sql;
						if (empty($id)) {
							$this->conn->query("DELETE FROM `question_list` where id = '{$qid}'");
						}
					}
				}
			}
		} else {
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error . "[{$sql}]";
		}
		if ($resp['status'] == 'success')
			$this->settings->set_flashdata('success', $resp['msg']);
		return json_encode($resp);
	}
	function delete_question()
	{
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `question_list` where id = '{$id}'");
		if ($del) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', "Pregunta eliminada correctamente.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'delete_img':
		echo $Master->delete_img();
		break;
	case 'save_content':
		echo $Master->save_content();
		break;
	case 'save_contact':
		echo $Master->save_contact();
		break;
	case 'save_course':
		echo $Master->save_course();
		break;
	case 'delete_course':
		echo $Master->delete_course();
		break;
	case 'save_class':
		echo $Master->save_class();
		break;
	case 'delete_class':
		echo $Master->delete_class();
		break;
	case 'save_question_paper':
		echo $Master->save_question_paper();
		break;
	case 'delete_question_paper':
		echo $Master->delete_question_paper();
		break;
	case 'save_question':
		echo $Master->save_question();
		break;
	case 'delete_question':
		echo $Master->delete_question();
		break;
	case 'save_system_info':
		echo $Master->save_system_info();
		break;
	default:
		// echo $sysset->index();
		break;
}
