<footer class="main-footer hidden-print">
    <div class="container">

        <div class="grid">
            <div class="grid sidebar-footer-area">
                @if (is_active_sidebar('footer-area'))
                    <?php dynamic_sidebar('footer-area'); ?>
                @endif
            </div>
        </div>
    </div>
</footer>
