<?php
/*
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by 
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program. If not, see . 
*/
?>

<?php
if(found_url(set_url_format($_GET['url'])))
{
	init($_GET['url']);
}
else
{
	echo "Error al cargar la fuente";
}


function get_author($author)
{
	if(!isset($author))
	{
		$author = "null";
		return $author;
	}
	return $author;
}

function set_url_format($urldir)
{
	$pattern = "/^(http|https):\/\//i";
	if(!preg_match($pattern, $urldir))
	{
		return "http://$urldir";
	}
	return $urldir;
}

function is_valid_url($urldir)
{
	$pattern = '/^(http|https):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i';
	if(preg_match($pattern, $urldir))
	{
		return get_title_url($urldir);
	}
	return "invalida url $urldir";
}

function found_url($urldir)
{
	$url = fopen($urldir, 'r');
	$valid = false;
	if($url)
		$valid = true;
	fclose($url);
	return $valid;
}

function get_title_url($url) {
	$source = @file_get_contents($url);
	if ($source) {
		preg_match('/<title>([^<]+)</', $source, $title);
		return isset($title[1]) ? $title[1] : false;
	}
	return "Error 404";
}

function get_datetime()
{
	date_default_timezone_set('America/Merida');
	return date("Y-m-d H:i:s");
}

function send_values($url, $title, $author, $date)
{
	include_once "connection.php";
	$article = new Article();
	$aff = $article->insert($url,$title,$author,$date);
	$article->close();
	echo "Insertados $aff regs <br>";
}

function init($url){
	$url = set_url_format($url);
	$title = is_valid_url($url);
	$author = get_author($_GET['author']);
	$date = get_datetime();
	send_values($url,$title,$author,$date);
}
?>