<?php

// 변수 정리
$inputimg = $_FILES['inputimg']['name'];
$target = 'images/inputimg/'. $inputimg;
$inputimg_type = $_FILES['inputimg']['type'];
$inputimg_size = $_FILES['inputimg']['size'];
$tmp_name = $_FILES['inputimg']['tmp_name'];
$error = $_FILES['inputimg']['error'];

move_uploaded_file($tmp_name, $target);

// 오류 확인
if( $error != UPLOAD_ERR_OK ) {
	switch( $error ) {
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			echo "파일이 너무 큽니다. ($error)";
			break;
		case UPLOAD_ERR_NO_FILE:
			echo "파일이 첨부되지 않았습니다. ($error)";
			break;
		default:
			echo "파일이 제대로 업로드되지 않았습니다. ($error)";
	}
	exit;
}

Header("Location:recommend.html"); 
