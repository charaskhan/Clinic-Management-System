<?php
include "file.php";
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $stat=$db->prepare("select * from newFiles where id=?");
    $stat->bind_param('i',$id);
    $stat->execute();
    $data =$stat->fetch();
    $file='media/'.$data['filename'];

    if(file_exists($file))
    {
        header('Content-Description:'.$data['description']);
        header('Content-Type:'.$data['type']);
        header('Content-Disposition:'.$data['disposition'].': filename="'.basename($file).'"');
        header('Expires:'.$data['expires']);
        header('Cache-Control:'.$data['cache']);
        header('Pragma:'.$data['pragma']);
        header('Content-Length:'.filesize['$file']);
        readfile($file);
        exit;
    }
}
