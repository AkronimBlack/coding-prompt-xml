<?php

namespace src\sys\Savers;


class Archiver
{
    /**
     * @param $file
     */
    public function save($file): void
    {
        $target = '../uploads/'. $file['name'] . time() . '.xml';
        $tmp = $file['tmp_name'];
        move_uploaded_file($tmp,$target);
    }
}
