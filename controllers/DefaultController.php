<?php
define('SHOW_ERRORS',true);

class DefaultController extends BaseController{
    public function indexAction(){
         echo __FUNCTION__."<br />";
        echo "Hello";
    }
    
    public function queryAction()
    {
         echo __FUNCTION__."<br />";
        $html = file_get_contents('http://m.avito.ru/items?category_id=24&location_id=637640');
        echo "<pre>";
        var_dump($html);
    }
    
    public function resolveAction()
    {
         echo __FUNCTION__."<br />";
        require_once('phpQuery-onefile.php');
        
        $url = 'http://m.avito.ru/items?category_id=24&location_id=637640';
        $html = file_get_contents($url);
        
        $doc = phpQuery::newDocument($html);
        
        $selectors = 'li a[href*="/item/"]';
        
        $res = $doc->find($selectors);
        $res_link = array();
        
        $r = array();
        echo "<pre>";
        foreach($res as $result)
        {
            $r[]= pq($result)->attr('href');
            //echo $r."\n";
        }
        echo "<pre>";
        print_r($r);
        
        $pass = mysql_connect("localhost", 'root', "zapadlo222")
        or die("Could not connect: " . mysql_error());
        mysql_select_db('avito', $pass) or die('Can\'t use bb : ' . mysql_error());
                
        foreach ($r as $k => $val)
        {
            $qu = "INSERT INTO `post`(`ssul`) VALUES ('$val')";

            $push = mysql_query($qu);
            echo $k."  id insert"."\n";
        }
    }
    
    public function pullAction()
    {
        //echo __FUNCTION__."<br />";
        error_reporting(7);
        $pass = mysql_connect("localhost", 'root', "zapadlo222")
        or die("Could not connect: " . mysql_error());
        mysql_select_db('avito', $pass) or die('Can\'t use bb : ' . mysql_error());

        $show_all = array();
        $items = array();
        $qu = mysql_q("SELECT * FROM post");
        
        while ($all_res = mysql_fetch_assoc($qu))
        {
            $show_all[] = $all_res;   
        }
        
        //echo "<pre>";
        //print_r($show_all);
        
        require_once('phpQuery-onefile.php');
        $part = 'http://m.avito.ru';
        foreach ($show_all as $ssul)
        {
            //echo $ssul['ssul']."\n";   
            $r = array();
            $get = file_get_contents($part.$ssul['ssul']);
            $html_get = phpQuery::newDocument($get);

            $select = '.m_item_title';
            $res = $html_get->find($select);

            $select2 = '.item img';
            $res2 = $html_get->find($select2);

            $r['opis'] = pq($res)->html();
            $r['id'] = $ssul['id'];

            foreach($res2 as $result)
            {  
                $r['img'][] = pq($result)->attr('src');              
            }

            //создаем селектор для поиска li на транице
            $select3 = 'li';
            //массив, в котором будет храниться текст из <li>
            $params = array();
            //ищем в хтмл коде обьявления($html_get) все что подходит под селектор и записываем результата запроса в $res3
            //в результате у нас должен быть массив из всех li
            $res3 = $html_get->find($select3);
            //записываем в массив params содержимое из li 
            // в $result у нас обьект - результат поиска
            // чтоб извлеч из результата поиска содержимое тега надо воспользовать таким методом phpquery:
            // pq($result)->text()
            // и записать это в массив $params.
            
            foreach ($res3 as $result)
            {
                $params[] = pq($result)->text(); // эта строка запишет в переменную парамс массив результатов поиска содержимого из li                                                
            }
            echo "<pre>";
            //print_r($params);
            
//            foreach ($params as $part)
//            {
//                echo "<pre>";
//                print_r($part);
//            }
                
            $prod = find_array_part('Цена', $params);
            $ex_prod = explode(' ', $prod);
            //print_r($prod);
            
            if (!empty($prod))
            {
                $r['cost'] = $prod; 
            }
            else {$r['cost'] = "not found";}
            
            
            $city = find_array_part('Город', $params);
            $r['city'] = $city;

            $adress = find_array_part('Адрес', $params);
            $r['adress'] = $adress;

            
            

            echo "<pre>";
            //print_r($r);
            //foreach ($r as )
            $que = "UPDATE `post` SET 
                            `title_all`='{$r['opis']}',
                            `cost`='{$r['cost']}',
                            `city`='{$r['city']}',
                            `adress`='{$r['adress']}'
                        WHERE `post`.`id` = '{$r['id']}'";
                        
                        
            $avito_que = mysql_query("UPDATE `post` SET 
                            `title_all`='{$r['opis']}',
                            `cost`='{$r['cost']}',
                            `city`='{$r['city']}',
                            `adress`='{$r['adress']}'
                        WHERE post.id = '{$r['id']}'");             
            //echo $que;
            echo mysql_error();
            }
    }

} 

//передаем ей в параметры массив, в котором ищем и слово, которое ищем в элементах массива
//на выходе - значение элемента массива, в котором мы нашли заданное в параметре слово
function find_array_part($word,$array)
{
 foreach ($array as $each_param)
            {
                $str_pos = strpos($each_param, $word);
                //echo $str_pos."\n";
                if ($str_pos !== false)
                {
                    //return $each_param;   
                    $return_val = str_replace($word,'',$each_param); 
                    $return_val = str_replace("\n", "", $return_val);
                    $return_val = trim($return_val);
// тут мы удаляем из значения найденного элемента слово Цена или любое другое, по которому мы ищем               
                    return $return_val;
                }
            }
}

function selectors($selector, $f_g_c)
{
    $html_get = phpQuery::newDocument($f_g_c);
    $res = $html_get->find($selector);
}

function mysql_q($q)
{
    $res = mysql_query($q);
    
    if(!$res && SHOW_ERRORS) {
        echo mysql_error();
        die();
    }
    return $res;
}

?>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">