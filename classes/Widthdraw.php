<?php
  class Widthdraw{

    private $_db;
    private $_data;

    public function __construct($widthdraw= null){
      $this->_db = DB::getInstance();
    }

    public function update($fields = array(),$id = null){

      if (!$this->_db->update('library_widthdraw', $id, $fields)) {
        throw new Exception("There was a problem updating");

      }
    }

    public function create($fields = array()){
      if (!$this->_db->insert('library_widthdraw',$fields)) {
        throw new Exception("There was a problem creating book");

      }
    }

    public function find($widthdraw = null){
      if ($widthdraw) {
        $field = (is_numeric($widthdraw));
        $data = $this->_db->get('library_widthdraw', array($field,'=',$widthdraw));
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
