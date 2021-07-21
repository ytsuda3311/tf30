<?php if (paginate_links() ) : //ページが1ページ以上あれば以下を表示 ?>
<!-- pagenation -->
<div class="pagenation">
    <?php
    echo
    paginate_links(
        array(
        'end_size' => 0,
        'mid_size' => 1, // もし２に変更した場合、両方のファイルを修正する必要がある。
        'prev_next' => true,
        'prev_text' => '<i class="fas fa-angle-left"></i>',
        'next_text' => '<i class="fas fa-angle-right"></i>',
        )
    );
    ?>
</div><!-- /pagenation -->
<?php endif; ?>