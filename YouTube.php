<?php 

# كاتب الملف : @XXCBB
#  من تخمط وتنشر اذكر المصدر : @ALSH_3K

header('Content-Type: application/json; charset=utf-8');
$url = $_GET['url'];
function YouTube($url){
    $curl = curl_init("https://onlinevideoconverter.pro/api/convert?url=$url");
    $data =
    array("url"=>$url,"extension"=>"mp3"); 
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $YouTube = curl_exec($curl);
    curl_close($curl);
   $BG = json_decode($YouTube)->meta->title;
   if($BG != null){
       $z = $YouTube;
   }
   
    return $z;
}


$GetInfoVideo = json_decode(YouTube($url));
$count = $GetInfoVideo->url;
for ($i = 0; $i<=count($count)-1; $i++){
$title = $GetInfoVideo->meta->title;
$duration = $GetInfoVideo->meta->duration;
$img = $GetInfoVideo->thumb;
$urls = $GetInfoVideo->url[$i]->url;
$type = $GetInfoVideo->url[$i]->type;
$quality = $GetInfoVideo->url[$i]->quality;
$array['ok'] = true;
$array['info'][] = [

	'title' => $title, 
	'duration' => $duration,
	'type' => $type,
	'quality' => $quality,
	'img' => $img,
	'url' => $urls,
];
}

# كاتب الملف : @XXCBB
#  من تخمط وتنشر اذكر المصدر : @ALSH_3K

echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
