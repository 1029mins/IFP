<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*************************************************************
 * common_helper
 * 전페이지에서 공통으로 사용하는 Helper
 ************************************************************/

	function alert($msg = '', $url = '')
	{
		if (empty($msg)) {
			$msg = "잘못된 접근입니다.";
		}
		echo '<meta http-equiv="content-type" content="text/html; charset=utf-8">';
		echo '<script type="text/javascript">alert("' . $msg . '");';
		if (empty($url)) {
			echo 'history.go(-1);';
		}
		if ($url) {
			echo 'document.location.href="' . $url . '"';
		}
		echo '</script>';
		exit;
	}
?>