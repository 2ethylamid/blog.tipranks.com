<?php defined('ABSPATH') or die()?>

<?php
	
	$admin_page_url = admin_url()."admin.php?page={$this->prefix}_settings";
	
	if( !isset($_GET['sub_page']) || empty($_GET['sub_page']) ) $_GET['sub_page'] = 'files';
	// Escaping data
	$_GET['sub_page'] = preg_replace( "/[<>#$%]/", "", $_GET['sub_page']);
	// Sanitizing data
	$_GET['sub_page'] = filter_var($_GET['sub_page'], FILTER_SANITIZE_STRING);
	
	/**
	 * 
	 * array(
	 * 	'page_slug' => array('page_slug', 'page_path', 'name')
	 * )
	 * 
	 * */
	
	$admin_menu_pages = array(
		'files' => array( 'files', ABSPATH . 'wp-content/plugins/file-manager/views/admin/files.php', 'Files'),
	);
	
	$admin_menu_pages = apply_filters('fm_admin_menu_sub_pages', $admin_menu_pages);
	
	// Enqueing admin assets
	$this->admin_assets();
?>
<div class="bootstart-admin-container">

	<div class='bootstart-admin-header'>
		<h2><img style="min-heigth:1.3em;" src='<?php echo $this->url('img/icon-24x24.png'); ?>' /> <?php echo $this->name; ?></h2>
	</div>
	
	<?php if( count($admin_menu_pages) > 1): ?>
	<div class="bootstart-admin-navigation" >
		
		
		
		<ul>
			
			<?php foreach($admin_menu_pages as $page): ?>
			
				<li class="<?php if($_GET['sub_page']==$page[0]) echo 'bootstart-admin-active-page';?>"><a href="<?php echo $admin_page_url."&&sub_page={$page[0]}"?>"><?php echo $page[2]; ?></a></li>
				
			<?php endforeach; ?>
			
		</ul>
		
	</div>
	<?php endif; ?>
	
	<div class='bootstart-admin-content'>

		<?php include $admin_menu_pages[$_GET['sub_page']][1];?>
		
	</div>
	
	<div class='bootstart-admin-sidebar'>
		<?php require_once('sidebar.php'); ?>
	</div>

	<?php require_once('footer.php'); ?>

</div>