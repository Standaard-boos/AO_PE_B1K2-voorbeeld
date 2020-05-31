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

            $sql = "SELECT name , table_number from orders";


            if ($result = $conn->GetConn() -> query($sql)) {
                while ($row = $result -> fetch_row()) {
                    echo '<tr><td>'. $row[0].' </td><td>'. $row[1].'</td></tr>';
                }
                //$result -> free_result();
            }


        }


        public function SaveOrder($order_name,$table_number){

            $conn = new conn();

            $con = $conn->GetConn();


            $sql = "INSERT INTO  `orders` (`name`, `table_number`) VALUES (?,?)";
            //$stmt = $conn->GetConn()->prepare($sql);
            $stmt = $con->prepare($sql);
            $stmt->bind_param("si", $order_name, $table_number);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }

            


        }

    }