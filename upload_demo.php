<?php
if ((($_FILES["groupQrcode"]["type"] == "image/gif")
        || ($_FILES["groupQrcode"]["type"] == "image/jpeg")
        || ($_FILES["groupQrcode"]["type"] == "image/png")
        || ($_FILES["groupQrcode"]["type"] == "image/pjpeg"))
    && ($_FILES["groupQrcode"]["size"] < 2000000))//小于两兆
{

    if ($_FILES["groupQrcode"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["groupQrcode"]["error"] . "<br />";
    }
    else
    {
        echo "Upload: " . $_FILES["groupQrcode"]["name"] . "<br />";
        echo "Type: " . $_FILES["groupQrcode"]["type"] . "<br />";
        echo "Size: " . ($_FILES["groupQrcode"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["groupQrcode"]["tmp_name"] . "<br />";

        if (file_exists("upload/" . $_FILES["groupQrcode"]["name"]))
        {
            echo $_FILES["groupQrcode"]["name"] . " already exists. ";
        }
        else
        {
            move_uploaded_file($_FILES["groupQrcode"]["tmp_name"],
                "upload/" . $_FILES["groupQrcode"]["name"]);
            echo "Stored in: " . "upload/" . $_FILES["groupQrcode"]["name"];
        }
    }
}
else
{
    echo "Invalid file";
}
?>