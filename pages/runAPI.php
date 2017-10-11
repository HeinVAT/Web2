<?php


include_once '../Curl/CaseInsensitiveArray.php';
include_once '../Curl/Curl.php';
include_once '../Curl/MultiCurl.php';


use Curl\Curl;

$url='http://unicor.me/api/web';

function getDataFromAPI($url){
    $curl = new Curl();

    $curl->setOpt(CURLOPT_CONNECTTIMEOUT, 120);
    $curl->setOpt(CURLOPT_REFERER, 'https://www.google.com.vn/');
    $curl->setOpt(CURLOPT_ENCODING, 'gzip,deflate');
    $curl->setOpt(CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.79 Safari/537.36');

    $curl->setTimeout(360);
    $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);

    $curl->get($url);

    // không lỗi
    if(!$curl->error){
        return $curl->response;

    }
    $curl->close();
    return !$curl->error;
}

function postDataToAPI($url,$jsonData){
    $curl=new Curl($url);

    $curl->setOpt(CURLOPT_CONNECTTIMEOUT, 120);
    $curl->setOpt(CURLOPT_CUSTOMREQUEST, "POST");
    $curl->setOpt(CURLOPT_POSTFIELDS, $jsonData);
    $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
    $curl->setOpt(CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)));





    $result =  $curl->exec();

    return $result;
}




function getData($url_web){
    $res = getDataFromAPI($url_web);
    if($res)
        if($res->status)
            return $res->data;
    return null;
}
function getDataById($url_web,$id){
    $url_web.='/'.$id;
    $res = getDataFromAPI($url_web);
   // var_dump($res);
    if($res)
        if($res->status)
            return $res->data;
    return null;
}



function getCategory($url_web){
    $res = getData($url_web);
    if($res->status)
        return $res->data;
    else
        return null;
}

$jsonData= '{"data": 
                    {  "webName":"Thanh nien" ,
                        "webUrl":"http://thanhnien.vn/rss.html",                                         
                        "pattern":[
                            {
                             "content": "#main_detail",
                             "cate": ".di_list ul li"
                            }
                            ]
                    }
                                            
                    }';
$url = 'http://unicor.me/api/insert';
$data=postDataToAPI($url,$jsonData);

var_dump($data);

?>