<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lunit {
// ========== its for unit add form page load start ===========
    public function unit_add_form(){
        $CI = & get_instance();
        $CI->load->model('Units');
        $data = array(
            'title' => display('add_unit'),
        );
        $unitForm = $CI->parser->parse('units/add_unit_form', $data, TRUE);
        return $unitForm;
    }
//============ close ================================
//============ its for unit list show start ==================
    public function unit_list(){
        $CI = & get_instance();
        $CI->load->model('Units');
        $unit_list = $CI->Units->unit_list();
        $i = 0;
        $total = 0;
        if(!empty($unit_list)){
            foreach ($unit_list as $keys => $values){
                $i++;
                $unit_list[$keys]['sl'] = $i + $CI->uri->segment(3);
            }
        }
        $data = array(
            'title' => display('manage_unit'),
            'unit_list' => $unit_list
        );
        $unitList = $CI->parser->parse('units/manage_unit', $data, TRUE);
        return $unitList;
    }
//============ its for unit list show close==================
//============ its for  unit_editable_data start==================
    public function unit_editable_data($unit_id){
        $CI = & get_instance();
        $CI->load->model('Units');
        $unit_details = $CI->Units->retrieve_unit_editdata($unit_id);
        $data = array(
          'title' => display('unit_edit'),
            'unit_id' => $unit_details[0]['unit_id'],
            'unit_name' => $unit_details[0]['unit_name'],
            'status' => $unit_details[0]['status'],
        );
//        echo '<pre>';        print_r($unit_details); echo '</pre><br>';
//        echo '<pre>';        print_r($data); echo '<br>'; die();
        $unitEditShow = $CI->parser->parse('units/edit_unit_form', $data, TRUE);
        return $unitEditShow;
        
//         $CI = & get_instance();
//        $CI->load->model('Categories');
//        $category_detail = $CI->Categories->retrieve_category_editdata($category_id);
//
//        $data = array(
//            'title' => display('category_edit'),
//            'category_id' => $category_detail[0]['category_id'],
//            'category_name' => $category_detail[0]['category_name'],
//            'status' => $category_detail[0]['status']
//        );
//        $chapterList = $CI->parser->parse('category/edit_category_form', $data, true);
//        return $chapterList;
    }
//============ its for  unit_editable_data close==================

    
    
    
    
//    //Retrieve  category List	
//    public function category_list() {
//        $CI = & get_instance();
//        $CI->load->model('Categories');
//        $category_list = $CI->Categories->category_list();  //It will get only Credit categorys
//        $i = 0;
//        $total = 0;
//        if (!empty($category_list)) {
//            foreach ($category_list as $k => $v) {
//                $i++;
//                $category_list[$k]['sl'] = $i + $CI->uri->segment(3);
//            }
//        }
//        $data = array(
//            'title' => display('manage_category'),
//            'category_list' => $category_list,
//        );
//        $categoryList = $CI->parser->parse('category/category', $data, true);
//        return $categoryList;
//    }
//
//    //Sub Category Add
//    public function category_add_form() {
//        $CI = & get_instance();
//        $CI->load->model('Categories');
//        $data = array(
//            'title' => display('add_category')
//        );
//        $categoryForm = $CI->parser->parse('category/add_category_form', $data, true);
//        return $categoryForm;
//    }
//
//    //category Edit Data
//    public function category_edit_data($category_id) {
//        $CI = & get_instance();
//        $CI->load->model('Categories');
//        $category_detail = $CI->Categories->retrieve_category_editdata($category_id);
//
//        $data = array(
//            'title' => display('category_edit'),
//            'category_id' => $category_detail[0]['category_id'],
//            'category_name' => $category_detail[0]['category_name'],
//            'status' => $category_detail[0]['status']
//        );
//        $chapterList = $CI->parser->parse('category/edit_category_form', $data, true);
//        return $chapterList;
//    }

}

?>