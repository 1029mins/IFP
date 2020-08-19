<?
    $filename = $filename; //서버의 파일명
    $reail_filename = urldecode($filename);
    $file_dir = "./images/notice/".$filename;

    if (is_file($file_dir)) {
        // 접근경로 확인 (외부 링크를 막고 싶다면 포함해주세요)
        if (!preg_match("#{$_SERVER['HTTP_HOST']}#", $_SERVER['HTTP_REFERER']))
        {
        echo "<script>alert('외부 다운로드는 불가능합니다.');</script>";
        return;
        }

        //파일 전송용 HTTP 헤더 설정
        header('Content-Type: application/x-octetstream');
        header('Content-Length: '.filesize($file_dir));
        header('Content-Disposition: attachment; filename='.$reail_filename);
        header('Content-Transfer-Encoding: binary');
        header('Pragma: no-cache');
        header('Expires: 0');

        //파일 열어서 전송하기
        $fp = fopen($file_dir, "r");
        fpassthru($fp);
        fclose($fp);
    }
    else {
        echo "해당 파일이 없습니다.";
    }

?>
