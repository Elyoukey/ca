<label>Nom:</label><?php echo $this->name?><br/>
Image: <img src="<?php echo BASE_PATH;?>/images/animals/<?php echo $this->hash;?>/image_full.jpg<?php echo '?'.rand(0,1000);?>" width="400px"/>
<?php if($currentUser->isadmin):?>
<br/>Status:
<?php echo ($this->status)?'Actif':'Désactivé';?>
<br/>
    <a href="edit.php?id=<?php echo $this->id;?>">
     Modifier
    </a>
<?php endif;?>