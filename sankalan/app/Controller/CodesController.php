<?php

class CodesController extends AppController{
    var $name='Codes';
    var $components = array('Session');
    public $helpers=array('Html');

function Hello(){

}

function Index(){
    $this->set('codes',$this->Code->find('all'));
}

function Runcode(){
    $dir='/var/www/sankalan/';
    while (1) {
        if(is_file($dir.'test.txt'))
                {
                if(0 == filesize($dir.'test.txt') )
                    {
                        $this->Code->saveField('log',"Compiled successfully");
                        $this->Session->setFlash("Successful");

                        exec("/bin/runtest.sh");
                        while (1) {
                            if(is_file($dir.'output.txt'))
                            {
                                $output=file_get_contents($dir.'output.txt');
                                $this->Code->saveField('output',$output);
                                unlink($dir.'output.txt');
                                $this->redirect(array('action'=>'output',$output));
                                break;
                            }
                        }
                        unlink($dir.'test.o');
                    }
                    else{
                        $this->Session->setFlash("Error");
                        $error=file_get_contents($dir.'test.txt');
                        $this->Code->saveField('log',$error);
                        //$this->Session->setFlash("Error");
                        }
                    unlink($dir.'test.txt');
                    break;
                }

            }
        }
}

function Output($output=NULL)
{
    $this->set('output',$output);
}
function Compilecode(){
    $dir='/var/www/sankalan/';
    if(! empty($this->data)){
        if($this->Code->save($this->data)){
            file_put_contents( $dir.'test.c', $this->data['Code']['code']);
            exec("/bin/test.sh");

        else
        {
            $this->Session->setFlash("Not Successful");
        }

    }
}

function WriteCode(){

}
function Test(){
    $dir = '';
    $exeData;
    $errorFlag;
    $errorDetail = array();

    function makeDir(){
        //
        global $dir;
        $count = 0;
        do{
            $count++;
            $dir = 'source/data'.$count;
        }while(!@mkdir($dir));
    }

    function setUpDirectory(){
        //make source dir : source001, source 002 etc
        //make source file
        global $dir;
        makeDir();
        $source = stripslashes($_REQUEST['source']);
        file_put_contents($dir.'/source.cpp', $source);
    }

    function compile(){
        // compile, get error message, assuming the compiler is in the system PATH
        // cd to compile dir
        global $dir;
        $compileString = 'g++ '.$dir.'/source.cpp -o '.$dir.'/a.exe ';
        global $errorFlag;
        global $errorDetail;
        $output = exec($compileString, $errorDetail, $errorFlag);

    }

    function isError(){
        // if error return true
        global $errorFlag;
        return $errorFlag;
    }

    function getError(){
        // get error detail
        global $errorDetail;
        $data = '';
        foreach($errorDetail as $key=>$value){
            $data .= $value.'<br />';
        }
        return $data;
    }

    function getExecutable(){
        // retrieve exe data to memory
        global $exeData;
        global $dir;
        $exeData = @file_get_contents($dir.'/a.exe');
    }

    function cleanUp(){
        // delete all temporary files
        global $dir;
        $alist = scandir($dir); 
        foreach($alist as $key => $value){
            if(is_file($dir.'/'.$value)) {  
                unlink($dir.'/'.$value);
            }
        }

        rmdir($dir);
    }

    function downloadExecutable(){
        // download to browser
        global $exeData;
        outputFile('program.exe', $exeData);
    }

    /**
    * download content
    * return value: false=cannot output the header, true=success
    */
    function outputFile($filename, $data){
        //Download file
        if(ob_get_contents())
            return false;
        if(isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'],'MSIE'))
            header('Content-Type: application/force-download');
        else
            header('Content-Type: application/octet-stream');
        if(headers_sent())
            return false;
        header('Content-Length: '.strlen($data));
        header('Content-disposition: attachment; filename="'.$filename.'"');
        echo $data;
    }
}

}
?>