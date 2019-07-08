<h1> Welcome! </h1>

<?php
if (empty($data)) {
    ?>
    <div class="item container-fluid">
        <p>Sorry, it's empty!</p>
    </div>
    <?php
} else {
    foreach ($data as $item) {
        ?>
        <div class="item container-fluid">
            <div class="item-info row">
                <div class="item-name col-1">
                    <?php echo $item['name']; ?>
                </div>
                <div class="image col-1">
                    <img src="<?php print ('http://localhost/pictures/' . $item['image']); ?>" width="100px"
                         height="100px">
                </div>
            </div>
            <div class="comments container-fluid">
                <?php
                foreach ($data as $item) {
                    ?>
                    <div class="comment row">
                        <div class="comment-user-icon col">
                            <img src="<?php print ('http://localhost/pictures/' . $item['image']); ?>" width="50px"
                                 height="50px">
                        </div>
                        <div class="comment-user-name col">
                            User name
                        </div>
                        <div class="comment-text col-9">
                            <?php echo $item['code']; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }
}