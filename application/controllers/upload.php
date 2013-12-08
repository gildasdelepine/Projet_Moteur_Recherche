<?php require_once "application/phpuploader/phpuploader/include_phpuploader.php" ?>   
<html>   
<body>   
<?php   
//Gets the GUID of the file based on uploader name   
$fileguid=@$_POST["myuploader"];   
if($fileguid)   
{   
    //get the uploaded file based on GUID   
    $mvcfile=$uploader->GetUploadedFile($fileguid);   
    if($mvcfile)   
    {   
        //Gets the name of the file.   
        echo($mvcfile->FileName);   
        //Gets the temp file path.   
        echo($mvcfile->FilePath);   
        //Gets the size of the file.   
        echo($mvcfile->FileSize);    
           
        //Copys the uploaded file to a new location.   
        $mvcfile->CopyTo("/uploads");   
        //Moves the uploaded file to a new location.   
        $mvcfile->MoveTo("/uploads");   
        //Deletes this instance.   
        $mvcfile->Delete();   
    }   
}   
?>  