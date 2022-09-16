<?php


class UploadImage
{
    private $imgName;
    private $imgType;
    private $imgTemp;

    public function __construct($name, $tmp, $type)
    {
        $this->imgName = $name;
        $this->imgType = $type;
        $this->imgTemp = $tmp;
    }

    /**
     * Move uploaded image to the folder
     * @return bool
     */
    public function Upload()
    {
        if (empty($this->imgName)) return 0;
        $isuploaded =  move_uploaded_file($this->imgTemp, "../uploads/" . $this->imgName);
        if ($isuploaded) return 1;
        return 0;
    }
}