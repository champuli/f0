<?php
class CalendarController extends BaseController{
    public function indexAction()
    {
        $c_d_m = 60;
        $d = array();
        for ($n=0;$n<=$c_d_m;$n++)//считаем текущую дату таймстампом, в цикле выводим даты для 20ти($c_d_m) дней 
        {
            $day = time() + 60*60*24*$n;
            $d[] = date("j F l", $day);
        }
        //echo "<pre>";
        //print_r($d); 
        //$this->data = $d;
        $this->view= 'index';
        
        error_reporting(7);
        $free_time = 30;

        $tasks = db("homework")->getAll("SELECT * FROM `todo` ORDER BY periodic ASC");//с помощью функции получаем список дел(tasks) из нашей бд
        echo "<pre>";
        print_r($tasks);
        
        $all_task = array();
        $total = array();
        $k = 0;
        $i = 0;
        $counters = array();// счетчик для сверки(сравнения) периодичности таски
        define('MAX_TOTAL',45);
        $ispol = array(
            0 => 'Masik',
            1 => 'Alenka',
        );
        $task_used_time = array();
        
        
        foreach ($d as $v)//проходим по массиву дат, впоследствии даты будем записывать в общий массив $all_task
        {   
            foreach ($tasks as $task)//проходим по массиву заданий
            {
                $ispolnitel = $ispol[$k%2];
                
                if(!isset($all_task[$v][$ispolnitel]['tasks']))
                {
                    $all_task[$v][$ispolnitel]['tasks'] = array();
                }
                
                if(!isset($all_task[$v][$ispolnitel]['total']))//если никакой таски не было добавлено - устанавливаем тотал ноль.
                {
                    $all_task[$v][$ispolnitel]['total'] = 0;
                }
                
                $total =  $all_task[$v][$ispolnitel]['total'] + $task['lenght'];//находим сколько будет тотал, если добавить текущую таску
                //проверяем сколько прошло времени с момента назначения задания. если прошло больше времени, чем время через которое надо повторить таск - добавляем таск в очередь.
                //$counters[$task['task']] - количество дней которое прошло с момента установки таски. (пустое, если таска не назначалась. можно ставить в очередь.)
                //$task['periodic'] - количество дней, через которое нужно повторить таску.
                if ((!isset($counters[$task['task']]) || ($counters[$task['task']] >= $task['periodic'])) && ($total<MAX_TOTAL))
                // если тасок еще не добавляли($counters[$task['task']]), ИЛИ периодичность тасок меньше/не равна установленной периодичности в бд, 
                // И сумарное время тасок < 40, то в тотал записываем текущую таску, ее длительность, добавляем в счетчик периодичности($counters[$task['task']]) +1    
                {
                    $k = $k +1;//при каждом проходе массива добавляем в счетчик $k
                    $all_task[$v][$ispolnitel]['total'] =  $all_task[$v][$ispolnitel]['total'] + $task['lenght'];  
                    $all_task[$v][$ispolnitel]['tasks'][] = $task['task'];
                    $counters[$task['task']] = 1;
                    $all_task[$v][$ispolnitel]['lenght'][] = $task['lenght'];
                    
                    if(!isset($task_used_time[$task['task']]))
                    {
                        $task_used_time[$task['task']]['cnt'] = 0;
                        $task_used_time[$task['task']]['periodic'] = $task['periodic'];
                    }
                    $task_used_time[$task['task']]['cnt']++;
                    
                }
                else
                {
                    $counters[$task['task']] = $counters[$task['task']] + 1;
                }
            }
        }
        //pr($task_used_time,1);
        //echo "<pre>";
        //print_r($all_task);
        $this->data = $all_task;
    }

    public function reindexAction()
    {
        $c_d_m = 75;
        $d = array();
        for ($n=0;$n<=$c_d_m;$n++)//считаем текущую дату таймстампом, в цикле выводим даты для 20ти($c_d_m) дней 
        {
            $day = time() + 60*60*24*$n;
            $d[] = date("j F l", $day);
        }
//        $this->data = $d;
        $this->view= 'calendar';
        error_reporting(7);
        $free_time = 30;
        
        $tasks = db("homework")->getRow("SELECT * FROM `todo` WHERE task like 'Wash dishes'");//с помощью функции получаем список дел(tasks) из нашей бд
        $all_task = array();
        $total = array();
        $k = 0;
        $i = 0;
        $counters = array();// счетчик для сверки(сравнения) периодичности таски
        define('MAX_TOTAL',45);
        $ispol = array(
            0 => 'Masik',
            1 => 'Alenka',
        );
        
        $task_used_time = array();
        foreach ($d as $v)//проходим по массиву дат, впоследствии даты будем записывать в общий массив $all_task
        {   
            $ispolnitel = $ispol[$k%2];
  
            if(!isset($all_task[$v][$ispolnitel]['tasks']))
                {
                    $all_task[$v][$ispolnitel]['tasks'] = array();
                }                
                if(!isset($all_task[$v][$ispolnitel]['total']))//если никакой таски не было добавлено - устанавливаем тотал ноль.
                {
                    $all_task[$v][$ispolnitel]['total'] = 0;
                }    
                
            $k = $k +1;//при каждом проходе массива добавляем в счетчик $k
            $all_task[$v][$ispolnitel]['total'] =  $all_task[$v][$ispolnitel]['total'] + $tasks['lenght'];  
            $all_task[$v][$ispolnitel]['tasks'][] = $tasks['task'];
            //$counters[$task['task']] = 1;
            $all_task[$v][$ispolnitel]['lenght'][] = $tasks['lenght'];   
            
            $not_ispolnitel = $ispol[1 - $k%2];
            if(!isset($all_task[$v][$not_ispolnitel]['tasks']))
                {
                    $all_task[$v][$not_ispolnitel]['tasks'] = array();
                }                
                if(!isset($all_task[$v][$not_ispolnitel]['total']))//если никакой таски не было добавлено - устанавливаем тотал ноль.
                {
                    $all_task[$v][$not_ispolnitel]['total'] = 0;
                }    
        }

        //pr($all_task,1);
        $sql = "SELECT * FROM `todo` WHERE task not like 'Wash dishes'";
        $other_tasks = db("homework")->getAll($sql);
        
        foreach ($d as $v)//проходим по массиву дат, впоследствии даты будем записывать в общий массив $all_task
        {   
            foreach ($other_tasks as $task)//проходим по массиву заданий
            {
                $ispolnitel = $ispol[$k%2];
                
                if(!isset($all_task[$v][$ispolnitel]['tasks']))
                {
                    $all_task[$v][$ispolnitel]['tasks'] = array();
                }                
                if(!isset($all_task[$v][$ispolnitel]['total']))//если никакой таски не было добавлено - устанавливаем тотал ноль.
                {
                    $all_task[$v][$ispolnitel]['total'] = 0;
                }     
                
                $total =  $all_task[$v][$ispolnitel]['total'] + $task['lenght'];
                
                if ((!isset($counters[$task['task']]) || ($counters[$task['task']] >= $task['periodic'])) && ($total<MAX_TOTAL))   
                {
                    $k = $k +1;//при каждом проходе массива добавляем в счетчик $k
                    $all_task[$v][$ispolnitel]['total'] =  $all_task[$v][$ispolnitel]['total'] + $task['lenght'];  
                    $all_task[$v][$ispolnitel]['tasks'][] = $task['task'];
                    $counters[$task['task']] = 1;
                    $all_task[$v][$ispolnitel]['lenght'][] = $task['lenght'];
                    
                    if(!isset($task_used_time[$task['task']]))
                    {
                        $task_used_time[$task['task']]['cnt'] = 0;
                        $task_used_time[$task['task']]['periodic'] = $task['periodic'];
                    }
                    $task_used_time[$task['task']]['cnt']++;    
                }
                else
                {
                    $counters[$task['task']] = $counters[$task['task']] + 1;
                }
            }
        }    
        //pr($all_task,1);
        $this->data = $all_task;
      
    }
}
?>