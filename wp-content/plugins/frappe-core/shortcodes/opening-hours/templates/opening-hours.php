<div class="eltdf-opening-hours-holder">
    <div class="eltdf-opening-hours-holder-inner">
        <div class="eltdf-opening-hours-day-holder" <?php frappe_elated_inline_style($day_styles)?>>
            <?php if($day !== '') : ?>
                <div class="eltdf-opening-hours-day"><?php echo esc_attr( $day ); ?></div>
            <?php endif; ?>
        </div>
        <div class="eltdf-opening-hours-line"></div>
        <?php if($hours !== '') : ?>
            <div class="eltdf-opening-hours-time" <?php frappe_elated_inline_style($hours_styles)?>><?php echo esc_attr( $hours ); ?></div>
        <?php endif; ?>
    </div>
</div>