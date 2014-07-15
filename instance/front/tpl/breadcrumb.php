<div class="breadcrumbs">
    <ul>
        <li>
            <a href="<?php print _U ?>home">Home</a><i class="icon-double-angle-right"></i></i>
        </li>
        <?php
        /*
         * Render bread crumb
         */
        ?>
        <?php if (!empty($bc)): ?>
           
            <?php $bc_length = count($bc); ?>
            <?php $i = 0; ?>
            <?php foreach ($bc as $eb): ?>
                <?php $i++; ?>
                <li>
                    <?php if ($eb['link']): ?>
                        <a href="<?php print $eb['link'] ?>"><?php print $eb['text'] ?></a>
                    <?php else: ?>
                        <?php print $eb['text'] ?>
                    <?php endif; ?>

                    <?php if ($i < $bc_length): ?>
                        <i class="icon-double-angle-right"></i>
                    <?php endif; ?>

                </li>
            <?php endforeach; ?>

        <?php endif; ?>



    </ul>
<!--    <div class="close-bread">
        <a href="#"><i class="icon-remove"></i></a>
    </div>-->
</div>
