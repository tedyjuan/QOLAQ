<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public $controller       = null;
    public $modeldata        = null;
    public $othermodel       = null;
    public $view             = null;
    public $page             = 1;
    public $start            = 0;
    public $limit            = 10;
    public $title            = null;
    public $data             = array();
    public $prefix_id        = null;
    public $prefix_id_detail = null;
    public $iddata           = 0;
    public $curdatetime      = null;
    public $pathimages       = null;
    public $ref_detail       = null;

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->curdatetime = date('Y-m-d H:i:s');
        //$this->is_logged();
    }

    function is_logged()
    {
        //print_r($this->session->userdata('ses_statusadminlogin'));
        //exit;
        if ($this->session->userdata('ses_statusadminlogin') != TRUE) {
            redirect('Login', 'refresh');
        }
    }

    public function index()
    {
        $this->data['title']            = $this->title;
        $this->data['url_index']        = base_url($this->controller);
        $this->data['url_index_detail'] = base_url($this->controller . '/index_detail');
        $this->data['url_grid']         = base_url($this->controller . '/grid');
        $this->data['url_add']          = base_url($this->controller . '/add');
        $this->data['url_edit']         = base_url($this->controller . '/edit');
        $this->data['url_delete']       = base_url($this->controller . '/postdata');
        $this->data['url_post']         = base_url($this->controller . '/postdata');
        $this->data['prefix_id']        = $this->prefix_id;
        $this->load->view($this->view . '/home', $this->data);
    }

    public function index_detail($idheader)
    {
        $this->data['titledetail']       = 'Detail Data ';
        $this->data['id_header']         = $idheader;
        $this->data['url_index']         = base_url($this->controller);
        $this->data['prefix_id_detail']  = $this->prefix_id_detail;
        $this->data['url_grid_detail']   = base_url($this->controller . '/grid_detail/' . $idheader);
        $this->data['url_add_detail']    = base_url($this->controller . '/add_detail/' . $idheader);
        $this->data['url_edit_detail']   = base_url($this->controller . '/edit_detail');
        $this->data['url_delete_detail'] = base_url($this->controller . '/postdata_detail');
        $this->load->view($this->view . '/home_detail', $this->data);
    }


    public function access_index()
    {
        $this->load->view($this->view . '/home', $this->data);
    }

    public function grid()
    {
        echo json_encode(array(
            "data" => $this->modeldata->getGridData()->result()
        ));
    }
    public function grid_detail($idheader)
    {
        echo json_encode(array(
            "data" => $this->modeldata->getGridDatadetail($idheader)->result()
        ));
    }

    public function access_grid()
    {
        echo json_encode(array(
            "data" => $this->modeldata->getGridData()->result()
        ));
    }

    // public function buildcombobox($key_id = '', $display = '', $result = '', $flag = '', $fieldedit = '')
    // {
    //     $i = 0;
    //     foreach ($result as $rowdropdown) {
    //         $this->data['default']["$key_id"][-1]['value'] = NULL;
    //         $this->data['default']["$key_id"][-1]['display'] = '- Please Select -';
    //         $this->data['default']["$key_id"][$i]['value'] = $rowdropdown["$key_id"];
    //         $this->data['default']["$key_id"][$i]['display'] = $rowdropdown["$display"];
    //         if ($flag == 'edit') {
    //             if ($fieldedit == $rowdropdown["$key_id"]) {
    //                 $this->data['default']["$key_id"][$i]['selected'] = "SELECTED";
    //             }
    //         }
    //         $i++;
    //     }
    // }

    public function add()
    {
        $this->data['title'] = 'Create - ' . $this->title;
        $this->data['id'] = $this->iddata;
        $this->data['prefix_id'] = $this->prefix_id;
        $this->data['url_post'] = base_url($this->controller . '/postdata');
        $this->data['url_index'] = base_url($this->controller . '/index');
        $this->load->view($this->view . '/form', $this->data);
    }

    public function access_add()
    {
        $this->data['title'] = 'Create - ' . $this->title;
        $this->data['id'] = $this->iddata;
        $this->data['prefix_id'] = $this->prefix_id;
        $this->data['url_post'] = base_url($this->controller . '/postdata');
        $this->data['url_index'] = base_url($this->controller . '/index');
        $this->load->view($this->view . '/form', $this->data);
    }

    public function editdata()
    {
        $this->data['title'] = 'Update - ' . $this->title;
        $this->data['id'] = $this->iddata;
        $this->data['prefix_id'] = $this->prefix_id;
        $this->data['url_post'] = base_url($this->controller . '/postdata');
        $this->data['url_index'] = base_url($this->controller . '/index');
        $this->load->view($this->view . '/form', $this->data);
    }

    public function access_edit()
    {
        $this->data['title'] = 'Update - ' . $this->title;
        $this->data['id'] = $this->iddata;
        $this->data['prefix_id'] = $this->prefix_id;
        $this->data['url_post'] = base_url($this->controller . '/postdata');
        $this->data['url_index'] = base_url($this->controller . '/index');
        $this->load->view($this->view . '/form', $this->data);
    }

    public function access_postdata()
    {
        $post = $this->input->post();
        $id = $post[$this->prefix_id];
        $actiondata = $post['actiondata'];
        unset($post['actiondata']);
        unset($post[$this->prefix_id]);

        switch ($actiondata) {
            case 'create':
                $this->modeldata->insert($post);
                $valid = true;
                $message = "Insert data, success";
                break;
            case 'update':
                $this->modeldata->update($id, $post);
                $valid = true;
                $message = "Update data, success";
                break;
            case 'delete':
                $record = array(
                    'status' => "nonaktif",
                );
                $this->modeldata->delete($id);
                $valid = true;
                $message = "Delete data, success";
                break;
            default:
                $valid = false;
                $message = "Something error";
                break;
        }

        $jsonmsg = array(
            "msg" => $message,
            "valid" => true,
            "postdata" => $post,
        );

        echo json_encode($jsonmsg);
    }
    public function access_postdatabyparam($post)
    {
        $id = $post[$this->prefix_id];
        $actiondata = $post['actiondata'];
        unset($post['actiondata']);
        unset($post[$this->prefix_id]);

        switch ($actiondata) {
            case 'create':
                $this->modeldata->insert($post);
                $valid = true;
                $message = "Insert data, success";
                break;
            case 'update':
                $this->modeldata->update($id, $post);
                $valid = true;
                $message = "Update data, success";
                break;
            case 'delete':
                $record = array(
                    'status' => "nonaktif",
                );
                $this->modeldata->delete($id);
                $valid = true;
                $message = "Delete data, success";
                break;
            default:
                $valid = false;
                $message = "Something error";
                break;
        }

        $jsonmsg = array(
            "msg" => $message,
            "valid" => $valid,
            "postdata" => $post,
        );

        echo json_encode($jsonmsg);
        return $valid;
    }

    public function access_postdetaildatabyparam($post)
    {
        $id = $post[$this->prefix_id_detail];
        $actiondata = $post['actiondatadetail'];
        unset($post['actiondatadetail']);
        unset($post[$this->prefix_id_detail]);

        switch ($actiondata) {
            case 'create':
                $this->modeldata->insert_detail($post);
                $valid = true;
                $message = "Insert data, success";
                break;
            case 'update':
                $this->modeldata->update_detail($id, $post);
                $valid = true;
                $message = "Update data, success";
                break;
            case 'delete':
                $record = array(
                    'status' => "nonaktif",
                );
                $this->modeldata->delete_detail($id);
                $valid = true;
                $message = "Delete data, success";
                break;
            default:
                $valid = false;
                $message = "Something error";
                break;
        }

        $jsonmsg = array(
            "msg" => $message,
            "valid" => true,
            "postdata" => $post,
        );

        echo json_encode($jsonmsg);
    }

    public function postdata_byparam_with_check($param, $checkfield)
    {
        $post = $param;

        if ($post['actiondata'] == 'create') {
            $checkata = $this->modeldata->checkData($checkfield, $post["$checkfield"]);
            if ($checkata == 0) {
                $return = $this->access_postdatabyparam($post);
                return $return;
            } else {
                $jsonmsg = array(
                    "msg" => 'Data already exist',
                    "valid" => false,
                    "postdata" => '',
                );

                echo json_encode($jsonmsg);
                return 0;
            }
        } else if ($post['actiondata'] == 'update') {
            $return = $this->access_postdatabyparam($post);
            return $return;
        } else if ($post['actiondata'] == 'delete') {
            $return = $this->access_postdatabyparam($post);
            return $return;
        }
    }

    public function postdatadetail_byparam_with_check($param, $checkfield1, $checkfield2)
    {
        $post = $param;

        if ($post['actiondatadetail'] == 'create') {
            $checkata = $this->modeldata->checkDatadetail($checkfield1, $post["$checkfield1"], $checkfield2, $post["$checkfield2"]);
            if ($checkata == 0) {
                $this->access_postdetaildatabyparam($post);
            } else {
                $jsonmsg = array(
                    "msg" => 'Data already exist',
                    "valid" => false,
                    "postdata" => '',
                );

                echo json_encode($jsonmsg);
            }
        } else if ($post['actiondatadetail'] == 'update') {
            $this->access_postdetaildatabyparam($post);
        } else if ($post['actiondatadetail'] == 'delete') {
            $this->access_postdetaildatabyparam($post);
        }
    }

    public function postdata_byparam_with_images($param, $checkfield)
    {
        $post = $param;
        $path = "public/images/" . strtolower($this->controller);
        $config['upload_path'] = "./" . $path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);


        if ($post['actiondata'] == 'create') {
            $checkata = $this->modeldata->checkData($checkfield, $post["$checkfield"]);
            if ($checkata == 0) {
                if ($this->upload->do_upload("file")) {
                    $data = array('upload_data' => $this->upload->data());
                    $namagambar = $data['upload_data']['file_name'];
                    $post['lokasi_gambar'] = $path . "/" . $namagambar;
                    $post['nama_gambar'] = $namagambar;

                    $this->access_postdatabyparam($post);
                } else {
                    $error = $this->upload->display_errors();
                    $jsonmsg = array(
                        "msg" => $error,
                        "valid" => false,
                        "postdata" => '',
                    );

                    echo json_encode($jsonmsg);
                }
            } else {
                $jsonmsg = array(
                    "msg" => 'Data already exist',
                    "valid" => false,
                    "postdata" => '',
                );

                echo json_encode($jsonmsg);
            }
        } else if ($post['actiondata'] == 'update') {

            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $namagambar = $data['upload_data']['file_name'];
                $post['lokasi_gambar'] = $path . "/" . $namagambar;
                $post['nama_gambar'] = $namagambar;

                $this->access_postdatabyparam($post);
            } else {
                $error = $this->upload->display_errors();
                $jsonmsg = array(
                    "msg" => $error,
                    "valid" => false,
                    "postdata" => '',
                );

                echo json_encode($jsonmsg);
            }
        } else if ($post['actiondata'] == 'delete') {
            $this->access_postdatabyparam($post);
        }
    }
}
