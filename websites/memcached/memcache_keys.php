<?php
$memcache = getenv('MEMCACHED_IP');
$mem = new Memcached();
$mem->addServer($memcache, 11211);


echo "memcached keys<br/>";
$keys = $mem->getAllKeys();

if ($keys){
        echo "has keys";
        echo  "<table border=1><tr><th> key  </th><th> value  </th></tr> ";
        $size = count($keys);
        echo $size;
        for ($i=0;$i < $size ;$i++){
                $a = $mem->get($keys[$i]);
                if (is_array($a)){
                        echo " <tr><td> {$keys[$i]} </td><td> ";
                        for ($j=0;$j < count($a) ;$j++){
                                echo "  ".$a[$j]." ";
                        }
                        echo " </td></tr> ";
                }else{
                        echo " <tr><td> {$keys[$i]} </td><td>  {$mem->get($keys[$i])} </td></tr> ";
                }


        }
        echo "</table>";

}else{
        echo "does not have keys";
}


?>
