<?php
$top_menu1 = array (
	"" => "Главная",
	"o_nas" => array (
				"" => "О нас",
				"sub_menu" => array (
							"o_nas/uslugi" => "Услуги",
							"o_nas/nash_kollektiv" => array (
										"o_nas/nash_kollektiv" => "Наш коллектив",
										"sub_menu" => array (
											"o_nas/nash_kollektiv/mikisha_jurij_borisovich" => "Микиша Юрий Борисович",
											"o_nas/nash_kollektiv/mikisha_tatjana_leonidovna" => "Микиша Татьяна Леонидовна",
											"o_nas/nash_kollektiv/sevoded_sergej_mihajlovich" => "Севодед Сергей Михайлович",
											"o_nas/nash_kollektiv/gricenko_jurij_vladimirovich" => "Гриценко Юрий Владимирович",
											"o_nas/nash_kollektiv/shevelev_stanislav_grigorevich" => "Шевелев Станислав Григорьевич",
											"o_nas/nash_kollektiv/golik_irina_nikolaevna" => "Голик Ирина Николаевна"	,
											"o_nas/nash_kollektiv/kovaleva_jeleonora_pavlovna" => "Ковалева Элеонора Павловна"	
											)
										),
							"o_nas/partnery" => "Партнеры",
							"o_nas/gramoty_nagrady" => "Грамоты, награды",
							)
				),
	"dressirovka_sobak" => array (
				"dressirovka_sobak" => "Дрессировка собак",
				"sub_menu" => array (
						"dressirovka_sobak/kinolog" => "Профессия Кинолог",
						"dressirovka_sobak/shkola_dressirovki" => "Школа дрессировки",
						"dressirovka_sobak/obshhij_kurs_dressirovki" => "Общий курс дрессировки (ОКД",
						"dressirovka_sobak/dressirovka_sluzhebnyh_sobak" => "Дрессировка служебных собак",
						"dressirovka_sobak/zashhitnaja_sobaka" => "Защитная собака",
						"dressirovka_sobak/amunicija_dlja_dressirovki_sobak" => "Амуниция для дрессировки собак",
						"dressirovka_sobak/poleznye_stati" => "Полезные статьи"
						)
				),
);


function getMenu($menu,$vertical=true, $parent_id='/')
{
if (!is_array($menu))
	{
		return false;		
	}
else 
	{
		
		foreach($menu as $href_menu=>$name_menu)
			{
				
				if (is_array($name_menu))
					{						
						echo"\t<li>";

						foreach($name_menu as $href_menu_1=>$name_menu_1)
							{
								if (!is_array($name_menu_1))
									{		$tmp .= $href_menu."-";				
										echo "<a href='/$href_menu_1'>$name_menu_1</a>\r\n";
										
									}
								else 
									{
										echo "\t\t<ul>\r\n";
										getMenu($name_menu_1,false,$parent_id);
										echo "\t\t</ul>\r\n";
									}
							}						
						echo "\t</li>\r\n";
												
					}
				else
					{
						echo"\t<li><a href='/$href_menu'>$name_menu</a></li>\r\n";
					}
			}
  return true;
	}
}
?>

?>