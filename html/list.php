<?php
// 注意：以下 PHP 是照片列表資料來源，請勿修改。
$url = "http://f2eclass.com/album/service/?method=getPhotoList";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
$photos = json_decode($data); // $photos 變數儲存了我們所有照片
curl_close($ch);
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>HTML - 照片列表</title>
</head>
<body>
<!-- Step 1 - 請建立一個 HTML 模組 (.hd, .bd, .ft) -->
<?php
      foreach ($photos as $photo):
          $img   = "http://farm{$photo->farm}.staticflickr.com/{$photo->server}/{$photo->id}_{$photo->secret}_m.jpg";
          $title = htmlspecialchars($photo->title);
?>
    <img src="<?php echo $img; ?>">
    <?php echo $title; ?>

<?php endforeach; ?>
</body>
</html>
