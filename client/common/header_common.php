<?php
    function connect(){
        $conn = mysqli_connect('localhost','root','','wint_zoo');
        if(!$conn){
            die('failed');
        }
        return $conn;
    }
    function debug($arg){
        echo '<pre>';
        print_r($arg);
        echo '</pre>';
        exit;
    }
    function get_menus(){
        $conn = connect();
        $sql = "SELECT * FROM `category`";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)){
           $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
           $menus = [];
           //debug($rows);
           foreach($rows as $index=>$row){
               if($row['parent_id']){
                    $id = $row['parent_id'];

                    $menus['menu_'.$id]['submenu'][] = [
                        'id' => $row['id'],
                        'cate_name' => $row['cate_name'],
                        'page' => $row['page'],
                    ];
               }else{
                    $id = $row['id'];
                    $menus['menu_'.$id] = [
                        'id' => $row['id'],
                        'cate_name' => $row['cate_name'],
                        'page' => $row['page'],
                    ];
               }
           }
        }
        return $menus;
        //debug($menus);
    }
    function display_menu(){
        $menus = get_menus();
        if(!$menus){
            return 'No menu exist';
        }
        //debug($menus);
        $html = '';
        $html .= '<ul class="menu">';
        foreach($menus as $menu){
            if(isset($menu['submenu'])){
                if($menu['page']){
                    $html .= '<li><a href="'.$menu['page'].'">'.$menu['cate_name'].' </a>
                    ';
                }else{
                    $html .= '<li><a href="#">'.$menu['cate_name'].' </a>
                    ';
                }
                if(is_array( $menu['submenu'])){
                    $html .= '<ul class="dropdown">';
                    foreach($menu['submenu'] as $submenu){
                        if($submenu['page']){
                            $html .= '<li><a href="'.$submenu['page'].'">'.$submenu['cate_name'].' </a></li>';
                        }else{
                            $html .= '<li><a href="#">'.$submenu['cate_name'].' </a>
                            </li>';
                        }
                    }
                    $html .= '</ul>';
                }
                $html .= '</li>';
            }else{
                if($menu['page']){
                    $html .= '<li><a href="'.$menu['page'].'">'.$menu['cate_name'].' </a>
                </li>';
                }else{
                    $html .= '<li><a href="#">'.$menu['cate_name'].' </a>
                </li>';
                }
            }
        }
        $html .= ' </ul>';
        return $html;
    }
?>