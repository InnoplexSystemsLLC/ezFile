<?php
##############################################################################
#								                  ezFile v1.0.0								               #
##############################################################################
# ezFile is a php class designed to make it easy to perform basic tasks to
# files within your file system. From error logging to saving page parts
# ezFile contences all your efforts into single line commands.
#
# Features:
# 1. Create($filepath) - Creates new file at set path
# 2. Open($filepath) - Loads a file into the instance
# 3. Write($content) - Appends provided content into current file
# 4. Read() - Reads all data from the currently loaded file
# 5. getName() - Returns the file name of the currently loaded file
# 6. getPath() - Returns the path of the currently loaded file
# 7. getSize() - Returns the size of the currently loaded file
##############################################################################
class ezFile
{
	public $fname = null;
	public $fpath = null;

	function create($filepath)
	{
		$file = fopen($filepath,"a");
		$write = fwrite($file,"");
		fclose($file);
		return true;
	}

	/**
	public open($filepath)
		$filepath: Full filepath to file to be opened
		Return: True if successfull, false otherwise
	**/
	function open($filepath)
	{
		if(is_file($filepath))
		{
			$this->fpath = $filepath;
			$this->fname = basename($filepath);
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	public write($content)
		$content: The contents to be appended to the file
		Return: True if successfull, false otherwise
	**/
	function write($content)
	{
		$file = fopen($this->fpath,"a");
		$write = fwrite($file,$content);
		fclose($file);
		if($write > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	public read()
		Return: The string representation of the file contents
	**/
	function read()
	{
		$file = fopen($fpath,"r");
		$read = fread($file,filesize($this->$fpath));
		fclose($file);

		return $read;
	}

	/**
	public getName()
		Return: The string representation of the file name currently loaded
	**/
	function getName()
	{
		return $this->fname;
	}

	/**
	public getPath()
		Return: A string represetnation of the file path currently loaded
	**/
	function getPath()
	{
		return $this->fpath;
	}

	/**
	public getSize()
		Return: A string representation of the size of the file currently loaded
	**/
	function getSize()
	{
		return filesize($this->fpath);
	}
}

?>
