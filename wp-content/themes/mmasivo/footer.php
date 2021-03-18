<?php
      global $project_options;
      $logo = $project_options['general_settings_logo'];
      $logo = file_get_contents(wp_get_attachment_url($logo['id'])); ?>

      </main>

    </div>

    <?php wp_footer(); ?>
  </body>
</html>
