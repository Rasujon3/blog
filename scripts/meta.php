<?php 
	if(isset($_GET['pageid'])){
		$pagetitleid = $_GET['pageid'];
		$query = "select * from tbl_page where id='$pagetitleid'";
		$pages = $db->select($query);
		if($pages){
			while($result = $pages->fetch_assoc()){	?>
			<title><?php echo $result['name']; ?> - <?php echo TITLE; ?></title>
			
	<?php } } } elseif(isset($_GET['id'])){
		$postid = $_GET['id'];
		$query = "select * from tbl_post where id='$postid'";
		$posts = $db->select($query);
		if($posts){
			while($result = $posts->fetch_assoc()){	?>
			<title><?php echo $result['title']; ?> - <?php echo TITLE; ?></title>
	<?php } } } else{ ?>
		<title><?php echo $fm->title(); ?>-<?php echo TITLE; ?></title>
	<?php } ?>

	
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
<?php
	if(isset($_GET['id'])){
		$keywordid = $_GET['id'];
		$query = "select * from tbl_post where id='$keywordid'";
		$keywords = $db->select($query);
		if($keywords){
			while($result = $keywords->fetch_assoc()){ ?>
			<meta name="keywords" content="<?php echo $result['tags'];?>">	
	<?php } } } else { ?>
		<meta name="keywords" content="<?php echo KEYWORDS; ?>">	
	<?php } ?>		
	
	<meta name="author" content="Delowar">