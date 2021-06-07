<?php
class Controller{
    // public function class($class=''){
    //     if(!empty($class)){
    //         $absolute_path = '';
    //         $absolute_path = BASE_CATALOG.'controller/'.$class.'.php';
    //         include($absolute_path);
    //         $string_class = ucfirst(strtolower($class))."Controller";
    //         $class = new $string_class();
    //         return $class;
    //     }
    // }
    public function print($path='',$data=array(),$language=''){
        $absolute_path = '';
        $absolute_path = BASE_CATALOG.'view/'.THEME.'/'.$path.'.php';
        if(file_exists($absolute_path)){
            $data['lang'] = $this->language($language);
            extract($data);
            $common_path = BASE_CATALOG.'controller/common.php';
            require_once($common_path);
             $arr_bypass = array('common/header','common/footer');
            if(!in_array($path,$arr_bypass)){
                $common = new CommonController();
                // $data_header = array(
                //     'title' => (isset($title)?$title:WEB_NAME),
                //     'class_body' => (isset($class_body)?$class_body:'')
                // );
                $common->header($data);
                require_once($absolute_path);
                $common->footer($data);
                echo '<script>window.print();</script>';
            }
        }else{
            echo 'File view/'.$absolute_path.' Not found!';
            exit();
        }
    }
    public function language($var=''){
        $return = array();
        $absolute_path = '';
        $language_name = (isset($_SESSION['language_name'])?$_SESSION['language_name']:'en');
        $absolute_path = BASE_CATALOG.'language/'.$language_name.'.php';
        if(file_exists($absolute_path)){
            // $lang_extra = array();
            require_once($absolute_path);
            if(!empty($var)){
                $route = $var;
            }else{
                $route = get('route');
            }
            // $route = str_replace("Print","",$route);
            $prefixRoute = explode(',',$route);
            $route = (isset($prefixRoute[0])?$prefixRoute[0]:'');

            $return = (isset($lang[$route])?$lang[$route]:array());
            // var_dump($var_extra);exit();
            $return['extra'] = (isset($var_extra)?$var_extra:array());

            return $return;
        }
    }
    public function view($path='',$data=array()){
        $absolute_path = '';
        $absolute_path = BASE_CATALOG.'view/'.THEME.'/'.$path.'.php';
        if(file_exists($absolute_path)){
            $data['lang'] = $this->language();
            extract($data);
            $common_path = BASE_CATALOG.'controller/common.php';
            require_once($common_path);
             $arr_bypass = array('common/header','common/footer');
            if(!in_array($path,$arr_bypass)){
                $common = new CommonController();
                // $data_header = array(
                //     'title' => (isset($title)?$title:WEB_NAME),
                //     'class_body' => (isset($class_body)?$class_body:'')
                // );
                $common->header($data);
                require_once($absolute_path);
                $common->footer($data);
            }
        }else{
            echo 'File view/'.$absolute_path.' Not found!';
            exit();
        }
    }
    public function render($path='',$data=array()){
        // $absolute_path = '';
        // if(!check_admin_path()){
        //     $absolute_path = BASE_CATALOG.'view/'.THEME.'/'.$path.'.php';
        // }else{
        //     $absolute_path = BASE_CATALOG_ADMIN.'view/'.THEME.'/'.$path.'.php';
        // }
        // if(file_exists($absolute_path)){
            $absolute_path = '';
            $absolute_path = BASE_CATALOG.'view/'.THEME.'/'.$path.'.php';
            if(file_exists($absolute_path)){
                extract($data);
                require_once($absolute_path);
            }
            // if($path!="common/header" or $path!="common/footer"){
           
            //     if(!check_admin_path()){
            //         $common_path = BASE_CATALOG.'controller/common.php';
            //     }else{
            //         $common_path = BASE_CATALOG_ADMIN.'controller/common.php';
            //     }
            //     require_once($common_path);
            //  $arr_bypass = array('common/header','common/footer');
            // if(in_array($path,$arr_bypass)){
            //     $common = new CommonController();
            //     $common->header();
            //     require_once($absolute_path);
            //     $common->footer();
            // }
        // }else{
        //     echo 'File view/'.$absolute_path.' Not found!';
        //     exit();
        // }
    }
    public function model($path){
        $base_path = str_replace('admin', '', BASE.'system/db/'.DB.".php");
        require_once($base_path);
        $absolute_path = BASE_CATALOG.'model/'.$path.'.php';
        require_once($absolute_path);
        $string_model = ucfirst(strtolower($path))."Model";
        $model = new $string_model();
        return $model;
    }
    public function json($data,$type=0){
        if($type==0){
            header("Content-type:application/json");
            echo json_encode($data);
            exit();
        }else{
            return $data;
        }
    }
    public function redirect($route){
        header('location: index.php?route='.$route);
    }
    public function setTitle(){
        
    }
    public function destroySession(){
        session_destroy();
    }
    public function setSession($key='',$val=''){
        if(!empty($key)){
            $_SESSION[$key] = $val;
        }
    }
    public function hasSession($key='') {
        if (isset($_SESSION[$key])) {
            return true;
        } else {
            return false;
        }
    }
    public function getSession($key=''){
        $result = '';
        if(isset($_SESSION[$key])){
            $result = $_SESSION[$key];
        }else{
            // error('Not fonud session key : '.$key);
        }
        return $result;
    }
    public function rmSession($key=''){
        $result = '';
        if(isset($_SESSION[$key])){
            $_SESSION[$key] = '';
            unset($_SESSION[$key]);
        }
        return $result;
    }
}