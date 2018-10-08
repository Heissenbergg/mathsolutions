<?php 
//Ukupan broj slika (niz)
$count = count($_FILES['file']['name']);

for ($i = 0; $i < $count; $i++) {
    $ext = pathinfo($_FILES['file']['name'][$i],PATHINFO_EXTENSION);
    $name = md5($_FILES['file']['name'][$i].time()).'.'.$ext;
    //$photo->insert($article_id, $name);
    move_uploaded_file($_FILES['file']['tmp_name'][$i], '../lessonIcons/'. $name);
    echo $name;
}