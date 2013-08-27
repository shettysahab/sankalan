<?php
//include 'compiler-gcc-mingw.php';

$docompile = intval($_REQUEST['docompile']);
if($docompile){
    //compile
    setUpDirectory();
    compile();
    if(IsError()){
        //
        cleanUp();
    }
    else {
        getExecutable();
        cleanUp();
        downloadExecutable();
        exit();
    }
} 

$defaultSource = "
#include <iostream>

using namespace std;
int main(){
    cout<<\"Hello Word!\"<<endl;
    getchar();
    return 0;
}
";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online C++ Compiler v1.0</title>
<link href="style.css" rel="stylesheet" type="text/css" />       
</head>
<body>
<h1>Online Compiler v1.0</h1>
<p>Online Windows C++ compiler using Mingw compiler </p>

<?php
if(IsError()){
    $error = getError();
    echo '<p><b>Compilation Error! Check your source code</b></p>';
    echo '<p>'.$error.'</p>';
}
?>
<form name="compile" method="post">
<input type="hidden" name="docompile" value="1" />
<p><b>Source Code:</b></p>
<textarea name="source" rows="20" cols="80"><?php 
if($docompile) echo stripslashes($_REQUEST['source']);
else echo $defaultSource;
?>
</textarea>   <br />
<input type="submit" name="Submit" value="Compile">
</form>

</body>
</html>