<?php
/**
* Comment class

**/

class Comment
{
    public static function find($sql, $bindVal = null)
    {
        global $dbc;
        $comments = $dbc->fetchArray($sql, $bindVal);
        if (!$comments) {
            return [];
        }

        foreach ($comments as $comment) {
            $commentObjArray[] = new self($comment['id'],
                $comment['blog_id'], $comment['date'],
                $comment['name'], $comment['comment']);
        }
        return $commentObjArray;
    }


public function create()
{
    global $dbc;
    $sql = "INSERT INTO `comments` " .
        "(blog_id,date,name,comment) " .
        "VALUES(:blog_id, NOW(), :name, :comment);";
    $bindVal = ['blog_id' => $this->blogId,
        'name' => $this->name,
        'comment' => $this->comment];
    return $dbc->sqlQuery($sql, $bindVal);
}

public function getId()
{
    return $this->id;
}


public function setId($id) {
    $this->id =$id;
    return $this;

}
}



//End of Comment Class
