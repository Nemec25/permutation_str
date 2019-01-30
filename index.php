<?php
$mas=file('dictionary.txt'); //Словарь из 1846 слов
$h = 1;

class search_str
	{
		public function search($str,$strr,$mas)
		{
			global $h;
			global $str1;
			$i = 0;
			echo "<br>";
			foreach ($mas as $key=>$val) 
			{
			    if($this->match($val,$str)==3 && $this->match($val,$str1)>=$h) 
			    {
			    	if ($this->match($val,$str1)-1>=$h) $h++;	
		    		if ($val != $strr)
		    		{
			    		echo $str.' => '.$val.'<br>';
			    		$i++;
			    		if ( trim($val) == trim($str1)) exit('Win');
			    		array_splice($mas, $key, 1);
			    		$this->search($val,$str,$mas);
		    		}
	    		}
			}
			if ($i==0) return;
		}
		public function match($val1,$val2)
		{
		    return (mb_substr($val1, 0,1)==mb_substr($val2, 0,1))+(mb_substr($val1, 1,1)==mb_substr($val2, 1,1))+(mb_substr($val1, 2,1)==mb_substr($val2, 2,1))+(mb_substr($val1, 3,1)==mb_substr($val2, 3,1)); //Определяем сколько совпадений по символам между двумя словами
		}

	}

$str1 = 'море';
$str2 = 'лужа';
$res = new search_str();
$res->search($str2,'',$mas);
?>