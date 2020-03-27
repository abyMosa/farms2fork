<span class="eltdf-stars">
    <?php foreach($post_ratings as $rating) { ?>
        <span class="eltdf-stars-wrapper-inner">
            <span class="eltdf-stars-items">
                <?php
                $review_rating = frappe_core_post_average_rating($rating);
                for ($i = 1; $i <= $review_rating; $i++) { ?>
                    <i class="fa fa-star" aria-hidden="true"></i>
                <?php } ?>
            </span>
            <span class="eltdf-stars-label">
                <?php echo esc_html($rating['label']); ?>
            </span>
        </span>
    <?php } ?>
</span>
<a itemprop="url" class="eltdf-post-info-comments" href="<?php comments_link(); ?>">
    <span class="eltdf-reviews-number">
        <?php echo esc_html($rating_number); ?>
    </span>
    <span class="eltdf-reviews-label">
        <?php echo esc_html($rating_label); ?>
    </span>
</a>