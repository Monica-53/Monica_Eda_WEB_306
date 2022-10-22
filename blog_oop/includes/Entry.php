<?php
/**
* Entry class

**/

class Entry
{
    private $id;
    private $catId;
    private $date;
    private $subject;
    private $body;

    public  static function find($sql, $bindVal = null)
    {
        global $dbc;
        $entries = $dbc->fetchArray($sql, $bindVal);
        if (!$entries) {
            return [];
        }

        foreach ($entries as $entry) {
            $entryObjArray[] = new self($entry['id'],
                $entry['cat_id'], $entry['date'],
                $entry['subject'], $entry['body']);
        }
        return $entryObjArray;
    }

    public function __construct($id, $catId, $date, $subject, $body)
    {
        $this->id = $id;
        $this->catId = $catId;
        $this->date = $date;
        $this->subject = $subject;
        $this->body = $body;
    }

    public function create()
    {
        global $dbc;
        $sql = "INSERT INTO `entries`(cat_id,date,subject,body) VALUES(:catId, NOW(), :subject, :body);";
        $bindVal = ['catId' => $this->catId,
            'subject' => $this->subject,
            'body' => $this->body];
        $result = $dbc->sqlQuery($sql, $bindVal);
        return $result;
    }

    /**
     * @return bool*Update the entry record.
     * *@return bool|PDOStatement
     */

    public function update()
    {
        global $dbc;
        $sql = "UPDATE entries SET cat_id =:catId, subject = :subject, body = :body WHERE id = :id";

        $bindVal = ['catId' => $this->catId,
            'subject' => $this->subject,
            'body' => $this->body,
            'id' => $this->id];
        $result = $dbc->sqlQuery($sql, $bindVal);
        return $result;
    }


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
        return $this;
    }

    public function getCatId(){
        return $this->catId;

    }
    public function setCatId($catId){
        $this->catId=$catId;
        return $this;
    }

    public function getDate(){
        return $this->date;
    }
    public function setDate($date){
        $this->date=$date;
        return $this;
    }


    public function getSubject(){
        return $this->subject;
    }

    public function setSubject($subject){
        $this->subject=$subject;
        return $this;
    }

    public function getBody(){
        return $this->body;

    }

    public function setBody($body){
        $this->body=$body;
        return $this;
    }

}


//End of Entry Class
 ?>