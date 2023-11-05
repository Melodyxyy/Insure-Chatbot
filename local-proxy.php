<?php
// 获取前端请求的数据
$data = json_decode(file_get_contents("php://input"), true);

// 构建 API Gateway URL
$apiUrl = "https://vreuhc8e39.execute-api.ap-southeast-2.amazonaws.com/Production"; // 

// 发起请求到 API Gateway
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $_SERVER["REQUEST_METHOD"]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// 执行请求并获取响应
$response = curl_exec($ch);

// 关闭请求
curl_close($ch);

// 将 API Gateway 响应返回给前端
echo $response;
?>
