<?php

class User extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        if ($this->session->userdata('logged_in') && !$this->session->userdata('logged_in')['isAdmin']) //// dar in teorie nu am nevoie decat de username ca sa il afisez pe undeva :) Majoritatea lor sunt doar pentru testare
        {

            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['password'] = $session_data['password'];  // doar pentru testare
            $data['email'] = $session_data['email'];          // doar pentru testare

            $data['isAdmin'] = $session_data['isAdmin'];    // doar pentru testare
            $data['logged_in'] = $session_data['logged_in'];
            //$this->load->view('ListUsers',$data);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

        $this->load->database();

        $this->db->select("id");
        $this->db->where('username=', $data['username']);
        $query = $this->db->get("user");
        $id_employee = $query->result_array()[0]['id'];

        $yearPicked = "2017";


        $this->db->select("*");
        $this->db->where("id_employee=", $id_employee);
        $this->db->like("s_date", $yearPicked);
        $select = $this->db->get("salary");

        //$select = $this->db->query('SELECT * FROM salary WHERE id_employee="' . $id_employee . '"');
        $jsonArray = array();


        if ($select->num_rows() > 0) {
            foreach ($select->result_array() as $row) {
                $jsonArrayItem = array();
                $jsonArrayItem['payment_id'] = $row['payment_id'];
                $jsonArrayItem['s_date'] = $row['s_date'];
                $jsonArrayItem['s_amount'] = $row['s_amount'];
                //append the above created object into the main array.
                array_push($jsonArray, $jsonArrayItem);
            }
        }

        $jsonArray = json_encode($jsonArray);
        $data = array(
            'json' => $jsonArray
        );
        /*header('Content-type: application/json');
        echo '<pre>';
        print_r($jsonArray);
        echo '</pre>';
        echo json_encode($jsonArray);*/
        //$row = $select->fetch_array();
        //echo '<pre>';
        //var_dump($row);
        //print_r($select);
        //echo $row;
        //echo '</pre>';


        /*$user_details = $select->result_array();
        $data['userDetails'] = $user_details;*/

        /*$response = array(
            "success" => true//, // e o cheie de tip string success
        );
        echo json_encode($response);
        */
        //if ($this->input->post($yearPicked) == null) {
        $this->load->view('user', $data);
        //}

    }

    function changeChart()
    {
        try {


            if ($this->session->userdata('logged_in') && !$this->session->userdata('logged_in')['isAdmin']) //// dar in teorie nu am nevoie decat de username ca sa il afisez pe undeva :) Majoritatea lor sunt doar pentru testare
            {

                $session_data = $this->session->userdata('logged_in');
                $data['username'] = $session_data['username'];
                $data['password'] = $session_data['password'];  // doar pentru testare
                $data['email'] = $session_data['email'];          // doar pentru testare

                $data['isAdmin'] = $session_data['isAdmin'];    // doar pentru testare
                $data['logged_in'] = $session_data['logged_in'];
                //$this->load->view('ListUsers',$data);
            } else {
                //If no session, redirect to login page
                redirect('login', 'refresh');
            }

            $this->load->database();

            $this->db->select("id");
            $this->db->where('username=', $data['username']);
            $query = $this->db->get("user");
            $id_employee = $query->result_array()[0]['id'];

            $yearPicked = $this->input->post('yearPicker');


            $this->db->select("*");
            $this->db->where("id_employee=", $id_employee);
            $this->db->like("s_date", $yearPicked);
            $select = $this->db->get("salary");


            //propunere formatare date

            $salaries = array();

            for($i=1; $i<=12; $i++){
                $date = sprintf("%s-%02d", $yearPicked, $i);        // date = 2017-01/02
                $salaries[$date] = array(                           // salaries["2017-01"] = { "s_date" : "2017-01" , "s_amount" : 0 }
                    "s_date"    =>  $date,                          // salaries["2017-02"] = { "s_date" : "2017-02" , "s_amount" : 0 }
                    "s_amount"  =>  0
                );
            }


            if ($select->num_rows() > 0) {
            foreach ($select->result_array() as $row) {                                 //$row["s_date"] == "2017-01", il numim $data , valoare extrasa din db
                    $salaries [$row['s_date']] ["s_amount"] = $row['s_amount'];           //$salaries [$data] ["s_amount"] = $row["amount"]  in salaries,
                }                                                                       //la obiectul retinut la indexul data , schimba ammopunt cu valoarea din db
            }


            if ($select->num_rows() > 0) {
                foreach ($select->result_array() as $row) {
                    $salaries[$row['s_date']] = array(
                        "s_date"    =>  $row['s_date'],
                        "s_amount"  =>  $row['s_amount']
                    );
                }
            }
            $salaries_json = json_encode(array_values($salaries));










            $month = '01';
            $default_json = array();                                      // creez un json cu date default pt lunile anului si salariile = 0
            for ($i = 1; $i < 13; $i++) {
                $dateItem =$yearPicked . "-" . sprintf("%02d", $month);
                $jsonArrayItem = array(
                    "s_date"    =>  $dateItem,
                    "s_amount"  =>  0
                );
                /*$jsonArrayItem['s_date']    = $dateItem;
                $jsonArrayItem['s_amount']  = 10000;*/                        // Am nevoie sa fie caracter ? "0"
                array_push($default_json, $jsonArrayItem);
                $month++;
            }

            $jsonArray = array();


            if ($select->num_rows() > 0) {
                foreach ($select->result_array() as $row) {
                    $jsonArrayItem = array();
                    //$jsonArrayItem['payment_id'] = $row['payment_id'];
                    $jsonArrayItem['s_date']    = $row['s_date'];
                    $jsonArrayItem['s_amount']  = $row['s_amount'];
                    //append the above created object into the main array.
                    array_push($jsonArray, $jsonArrayItem);
                    for ($i = 0; $i < 12; ++$i) {
                        if($default_json[$i]['s_date']==$row['s_date']) {
                            $default_json[$i]['s_amount'] = $row['s_amount'];
                        }
                    }
                }
            }



            function cmp($a, $b)
            {
                return strcmp($a["s_date"], $b["s_date"]);
            }
            usort($jsonArray,"cmp");


           /*
           foreach ($jsonArray as $row) {
                foreach ($default_json as $row2) {
                    if($row["s_date"]==$row2["s_date"]){
                        $row["s_amount"] = $row2["s_amount"];
                    }
                }
            }
            */



            $default_json   = json_encode($default_json);
            $jsonArray      = json_encode($jsonArray);
            //$jsonArray=array_sort($jsonArray, 's_date', SORT_ASC);



           /* for ($i = 0; $i < 13; ++$i) {
                for ($j = 0; $j < $select->num_rows(); ++$j) {
                    if($default_json[i]['s_date']==$jsonArray[j]['s_date']) {
                        $default_json[i]['s_amount'] = $jsonArray[j]['s_amount'];
                    }
                }
            }*/



            $response = array(
                "success" => true, // e o cheie de tip string success
                "data" => $salaries_json
            );


        } catch (Exception $e) {
            $response = array(
                "success" => false//, // e o cheie de tip string success
                //"msg" => $e->getMessage() // preiau mesajul "umpleti campul"
            );
        }
        echo json_encode($response);
    }


    /*public function tralala(){
        $this->load->view('second');
    }*/
}
