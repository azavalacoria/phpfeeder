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
include 'connection.php';
$articles = new Article();
$res = $articles->get_data("SELECT url,title,author,aggregate from articles order by aggregate DESC LIMIT 0,15");
?>
<?xml version="1.0" encoding="utf-8" ?>
<rss version="2.0">
<channel>
	<?php while($row = $res->fetch_object()) { ?>
	<item>
		<title>		<?php echo $row->title;?>	</title>
		<link>		<?php echo $row->url;?>	</link>
		<author>	<?php echo $row->author;?></author>
		<pubDate>	<?php echo $row->aggregate;?></pubDate>
	</item>
<?php }	?>
	<?php $articles->close();?>
</channel>
</rss>