        <?php if (count($errors)>0):?>
            <div class="error">                                  
                <?php foreach ($errors as $value): ?>
                    <p><?php echo $value; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif ?>
        <?php if (isset($mess)) {
        ?>
        	<div class="error">
        		<p><?php echo $mess; ?></p>
        	</div>
        <?php
        } ?>