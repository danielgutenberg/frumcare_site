<?php if ($main_content != 'frontend/home') {
 echo $this->load->view('frontend/includes/header.php', array('header' => true));
 } else {
 echo $this->load->view('frontend/includes/header.php', array('header' => false));
 }?>

<?php echo $this->load->view($main_content);?>
<?php echo $this->load->view('frontend/includes/footer.php');?>
