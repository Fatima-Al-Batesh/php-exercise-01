<?php
function check_palindrome($string) 
{
  if (strtolower($string) == strrev(strtolower($string)))
      return "palindrome";
  else
	  return "not a palindrome";
}
$str = array('madam','a', 'fatima','moM','raDar','level','hello','RaceCar','Noon','Great');
foreach ($str as $value){
    echo $value.": ".check_palindrome($value)."<br>";
}
?>