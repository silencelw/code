<?php
//遍历文件夹下的所有文件和文件夹
function my_scandir($dir)
{
    $files=array();
    if(is_dir($dir))
    {
        if($handle=opendir($dir))
        {
            while(($file=readdir($handle))!==false)
            {
                if($file!="." && $file!="..")
                {
                    if(is_dir($dir."/".$file))
                    {
                        $files[$file]=my_scandir($dir."/".$file);
                    }
                    else
                    {
                        $files[]=$dir."/".$file;
                    }
                }
            }
            closedir($handle);
            return $files;
        }
    }
}

// 两个文件的相对路径
function getRelativePath($a, $b) {  
    $returnPath = array(dirname($b));
    $arrA = explode('/', $a);  
    $arrB = explode('/', $returnPath[0]); 
    for ($n = 1, $len = count($arrB); $n < $len; $n++){  
       if ($arrA[$n] != $arrB[$n]) { 
           break; 
       }    
    }  
    if ($len - $n > 0) {  
       $returnPath =array_merge($returnPath, array_fill(1, $len - $n, '..'));  
    }  
    $returnPath = array_merge($returnPath,array_slice($arrA, $n));  
    return implode('/', $returnPath);  
  }  

