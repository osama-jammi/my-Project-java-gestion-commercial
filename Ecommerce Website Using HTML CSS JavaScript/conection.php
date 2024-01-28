<?php
    class crud{
        public static function conect() {
            try{
                $con = new PDO('mysql:host=localhost; dbname=crud','root','');
                            return $con;
                            
            }catch(PDOException $erro1){
                echo ' Error'.$erro1->getMessage();
            }catch(Exception $erro2){
                echo ' '.$erro2->getMessage();
            }
            
        }
        public static function selectdata(){
            $data=array();
            $p = crud::conect()->prepare('SELECT * FROM crudtable ');
            $p ->execute();
            $data =$p ->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }

?>
