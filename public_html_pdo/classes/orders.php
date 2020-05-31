<?php

    require_once 'conn.php';

    /*
     * dit is de class orders
     *
     * in deze class willen we function neerzetten die te maken hebben met orders bijv : GetOrders en SaveOrder
     * */

    class orders
    {


        public function GetOrders(){

            $conn = new conn();



            foreach($conn->GetConn()->query('SELECT name , table_number from orders') as $row) {
                //print_r($row[0]);
                 echo'    <tr>
                            <td> '. $row[0] .'</td>
                            <td> '. $row[1] .' </td>                            
                        </tr>';
            }

        }


        public function SaveOrder($order_name,$table_number){

            $conn = new conn();

            $stmt = $conn->GetConn()->prepare("INSERT INTO orders (name, table_number) VALUES (:name, :table_number)");
            $stmt->bindParam(':name', $order_name);
            $stmt->bindParam(':table_number', $table_number);
            $stmt->execute();

            


        }

    }