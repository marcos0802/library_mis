<?php
  class Student{

    private $_db;
    private $_data;

    public function __construct($student = null){
      $this->_db = DB::getInstance();
    }

    public function update($fields = array(),$id = null){

      if (!$this->_db->update('library_students', $id, $fields)) {
        throw new Exception("There was a problem updating");

      }
    }

    public function create($fields = array()){
      if (!$this->_db->insert('library_students',$fields)) {
        throw new Exception("There was a problem creating an account");

      }
    }

    public function find($student = null){
      if ($student) {
        $field = (is_numeric($student)) ? 'id' : 'email';
        $data = $this->_db->get('library_students', array($field,'=',$student));
        if ($data->count()) {
          $this->_data = $data->first();
          return true;
        }
      }
      return false;
    }


   public function exists(){
     return (!empty($this->_data))? true : false;
   }


    public function data(){
      return $this->_data;
    }

  }


 ?>
