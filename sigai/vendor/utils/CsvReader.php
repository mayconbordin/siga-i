<?php
 
 
class CsvReader
{
    const LINE_LENGTH = 2000;
     
    public function __construct($filename, $header = FALSE, $delimiter = ";", 
                                $enclosure = '"', $escape = "\\")
    {
        if (!file_exists($filename)) {
            throw new Exception('File not found.');
        }
         
        $this->handle = fopen($filename, "r");
         
        if ($this->handle === FALSE) {
            throw new Exception("Failed to open file.");
        }
         
        $this->hasHeader = $header;
        $this->delimiter = $delimiter;
        $this->enclosure = $enclosure;
        $this->escape    = $escape;
         
        if ($this->hasHeader === TRUE) {
            $this->header = $this->readLine();
             
            if ($this->header === NULL) {
                throw new Exception("File is empty.");
            }
        }
    }
     
    private function readLine()
    {
        return fgetcsv($this->handle, self::LINE_LENGTH, $this->delimiter,
                       $this->enclosure, $this->escape);
    }
     
    public function nextRow()
    {
        $data = $this->readLine();
                         
        if ($data === FALSE) return NULL;
        if ($this->hasHeader === FALSE) return $data;
         
        $row = array();
         
        foreach ($this->header as $i => $header) {
            $row[$header] = $data[$i];
        }
         
        return $row;
    }
     
    public function rows()
    {
        $rows = array();
         
        while (($row = $this->nextRow()) !== FALSE) {
            $rows[] = $row;
        }
         
        return $rows;
    }
     
    public function __destruct()
    {
        fclose($this->handle);
    }
}
