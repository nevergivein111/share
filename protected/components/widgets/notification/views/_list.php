<div class="notificationBox">
    <div class="noteHead">
        Notification
    </div>
    <div class="notifyRows" id="scroll_2">
        <?php if (count($data) < 1) : ?>
        <center>No new notifications</center>
        <?php endif;?>
        <?php
        foreach ($data as $item) {
                        $this->render('_view', array('item' => $item));
        } ?>
    </div>
</div>