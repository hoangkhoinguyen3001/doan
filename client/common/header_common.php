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
        $html .= '<ul class="navbar-nav ml-auto ">';
        foreach($menus as $menu){
            if(isset($menu['submenu'])){
                if($menu['page']){
                    $html .= '<li class="nav-item">
                    <a class="nav-link" href="'.$menu['page'].'">'.$menu['cate_name'].' <span class="sr-only">(current)</span></a>
                ';
                }else{
                    $html .= '<li class="nav-item">
                    <a class="nav-link" href="#">'.$menu['cate_name'].' <span class="sr-only">(current)</span></a>
                ';
                }
                if(is_array($menu['submenu'])){
                    $html .= '<ul class="dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  </a>';
                    foreach($menu['submenu'] as $submenu){
                        if($submenu['page']){
                            $html .= '<li class="nav-item">
                            <a class="nav-link" href="'.$menu['page'].'">'.$menu['cate_name'].' <span class="sr-only">(current)</span></a>
                        </li>';
                        }else{
                            $html .= '<li class="nav-item">
                            <a class="nav-link" href="#">'.$menu['cate_name'].' <span class="sr-only">(current)</span></a>
                        </li>';
                        }
                    }
                    $html .= '</ul>';
                }
                $html .= '</li>';
            }else{
                if($menu['page']){
                    $html .= '<li class="nav-item">
                    <a class="nav-link" href="'.$menu['page'].'">'.$menu['cate_name'].' <span class="sr-only">(current)</span></a>
                </li>';
                }else{
                    $html .= '<li class="nav-item">
                    <a class="nav-link" href="#">'.$menu['cate_name'].' <span class="sr-only">(current)</span></a>
                </li>';
                }
            }
        }
        $html .= ' </ul>';
        return $html;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="style.css">
<title>Title</title>
</head>
<body>
<?php display_menu() ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>