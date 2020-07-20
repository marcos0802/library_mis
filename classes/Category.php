<?php
  class Category{

    private $_db;
    private $_data;

    public function __construct($book = null){
      $this->_db = DB::getInstance();
    }

    public function update($fields = array(),$id = null){

      if (!$this->_db->update('book_category', $id, $fields)) {
        throw new Exception("There was a problem updating");

      }
    }

    public function create($fields = array()){
      if (!$this->_db->insert('book_category',$fields)) {
        throw new Exception("There was a problem creating Category");

      }
    }

    public function find($book = null){
      if ($book) {
        $field = (is_numeric($book))? 'id' : 'name';
        $data = $this->_db->get('book_category', array($field,'=',$book));
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
