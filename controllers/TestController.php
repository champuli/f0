<?php
class AdminController extends BaseController{
    public function sumAction()
    {
        $houses = array(
            1 => '',
            2 => '',
            3 => '',
            4 => '',
            5 => '',
        );
        
        $nation = array('english','ukrainian','spain','japan','norvegian');
        $cigarettes = array('Old Gold','Kools','Chesterfield','Lucky Strike','Parlament');
        $drink = array('cofee', 'milk','tea','water','juice');
        $color = array('red','blue','green','yellow','white');
        $pet = array('dog','snail','fox','horse','zebra');
        //2
        $all['english'] = 'red';
        
        $b = array(
            'english' => 'red',            
        );
        $c = array(
            'spain' => 'dog',
        );
        
    }
}
?>

На улице стоят пять домов.
Англичанин живёт в красном доме.
У испанца есть собака.
В зелёном доме пьют кофе.
Украинец пьёт чай.
Зелёный дом стоит сразу справа от белого дома.
Тот, кто курит Old Gold, разводит улиток.
В жёлтом доме курят Kools.
В центральном доме пьют молоко.
Норвежец живёт в первом доме.
Сосед того, кто курит Chesterfield, держит лису.
В доме по соседству с тем, в котором держат лошадь, курят Kools.
Тот, кто курит Lucky Strike, пьёт апельсиновый сок.
Японец курит Parliament.
Норвежец живёт рядом с синим домом.
Кто пьёт воду? Кто держит зебру?