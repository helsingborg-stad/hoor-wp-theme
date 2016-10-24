<?php echo $before_widget; ?>
<?php foreach ($contacts as $contact) : ?>
<div class="site-footer__contact">

    <?php if (isset($contact['address']) && !empty($contact['address'])) : ?>
        <h2 class="footer-title"><?php _e('Contact details', 'hoor'); ?></h2>
        <div class="contact-details">
           <?php echo $contact['address']; ?>
        </div>
    <?php endif; ?>

    <?php if (isset($contact['phone_numer']) && !empty($contact['phone_numer'])) : ?>
        <h2 class="footer-title"><?php _e('Phone and Email', 'hoor'); ?></h2>

        <div class="site-footer__contact-phone">
            <h3><?php _e('Phone number', 'hoor'); ?></h3>
            <p class="phone"><?php echo $contact['phone_numer']; ?></p>
        </div>
    <?php endif; ?>

    <?php if (isset($contact['email']) && !empty($contact['email'])) : ?>
        <div class="site-footer__contact-email">
        <h3><?php _e('Email address', 'hoor'); ?></h3>
        <a  class="email" href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a>
        </div>
    <?php endif; ?>

</div>
<?php endforeach; ?>
<?php echo $after_widget; ?>
