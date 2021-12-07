<?php

class log {
    public function RaiseError(string $fmt, string $message) {
        $fp = fopen('errors/errorlogs.txt', 'a+');
        $msg = $fmt.": - ".date("Ymdhsi")." -".$message;
        fwrite($fp, $msg, 4096);
    }
}

class renderer{
	private $lrootx;
	private $XmlNodes;
    public function _construct(){
	}
    /**
     *  call this method after you must have instantiate this call wiith the necessary parameter
     *  @$format is a string can be either of json,xml,odata,bson,yaml,htmltable or htmltsortable
     *  @$data is the array you get from the execution of your mysql query, it will be nice if you use our db class
     *  @$options can be left as null i.e. left assume you have a data array $user and you want to render it to json
     *  just instantiate the class as follows:
     *  $dl = new renderer(); class instantiation
     *  $djson = $dl->render('json',$user); calling the render method without the $options parameter synonymous to leaving it null or pass the null value
     *  i.e.
     *  $djson = $dl->render('json'.$user,null);
     *  when you do it like that $djson is a valid json which can be echo directly to create a json file the
     *  header for your php file should be set like this;
     *  header("Access-Control-Allow-Origin: *"); to certifiy cross-domain restriction if you calling the script from another domain or html 5 app or mobile app
     *  header('Content-Type: text/json'); to enforce the json file structure
     *   ini_set('memory_limit','1024M'); to increase php memory limit to 1GB  should in case you return a very large dataset
     *  if you still have any issue call me.
      */
	public function render($format,$data,$options=null)
	{
		if(is_null($format))
		{
			$lg = new log();
			$lg->RaiseError('format','Please specify a format!');
		}
		else
		{
			$localMethod = "Render".strtoUpper($format);
			if(!is_null($options))
			{
				$this->SetOptions($options);
			}
			if(is_null($data))
			{
				$lg2 = new log();
				$lg2->RaiseError('data','Data must not be null');
			}
			else
			{
				return $this->$localMethod($data);
			}
		}
	}
	private function SetOptions($opt){
		$ch = explode(",",$opt);
		$this->XmlNodes = $ch[0];
		$this->lrootx = $ch[1];
	}
	private function RenderJSON($d)
	{
		return  json_encode($d);
	}

	private function RenderXML($ArrayX,$lroot=null,$xml=null)
	{
		$_xml = $xml;
		if($_xml === null){
			$_xml = new SimpleXMLElement($lroot !== null ? $lroot : '<root></root>');
		}
		foreach($ArrayX as $key=>$value){
			if(is_array($value)){
				if(is_numeric($key)){
						$key = $this->XmlNodes;
					}
				$this->RenderXML($value,$key,$_xml->addChild($key));
			}else{

				$_xml->addChild($key,str_replace(">","&gt;",str_replace("<","&lt;",str_replace("'","&apos;",str_replace("&","&amp;",str_replace("\"","&quot;",$value))))));
			}
		}
		return $_xml->asXML();
	}
	private function RenderBSON($dbs) {}
	private function RenderODATA($dos) {}
	private function RenderYAML($dY){}
	private function RenderHTMLTABLE($dt){}
	private function RenderHTMLTABLESORTABLE($dtl){}
}
