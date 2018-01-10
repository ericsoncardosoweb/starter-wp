<?php
add_action( 'widgets_init', function(){
    register_widget( 'Block_Icon' );
});

class Block_Icon extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'block-icon block-icon--h',
            'description' => '',
        );

        parent::__construct( 'block_icon', 'Block Icon', $widget_ops );
    }


    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        // outputs the content of the widget
        extract( $args );
				$title = apply_filters('widget_title', $instance['title'] );
				$icon  = $instance['icon'];
				$is_svg  = $instance['is_svg'];
				$text  = $instance['text'];
				$text  = $instance['text'];
				$link  = $instance['link'];

        echo $args['before_widget']; ?>

        <div class="block-icon__body">
      		<?php if ( ! empty( $instance['link'] ) ) : ?>
      	  <a href="<?= $instance['link']; ?>" class="block-icon__link link-absolute"></a>
      	  <?php endif; ?>

        	<?php if ( ! empty( $instance['icon'] ) ) : ?>
          <div class="block-icon__thumbnail">
            <?php if ($is_svg == 'on'): ?>
            <svg class="icon <?= $instance['icon']; ?>"><use xlink:href="#<?= $instance['icon']; ?>"></use></svg>
            <?php else: ?>
            <i class="<?= $instance['icon']; ?>"></i>
            <?php endif ?>
          </div>
          <?php endif; ?>

          <div class="block-icon__content">
          	<?php if ( ! empty( $instance['title'] ) ) : ?>
            <h3 class="block-icon__title">
            	<?= $instance['title']; ?>
            </h3>
          	<?php endif; ?>
          	<?php if ( ! empty( $instance['text'] ) ) : ?>
            <p><?= $instance['text']; ?></p>
            <?php endif; ?>
          </div>

        </div>



    <?php echo $args['after_widget'];
    }


    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
        //Set up some default widget settings.
        $defaults = array( 'title' => __('Título de Exemplo', 'example'), 'icon' => __('<svg class="icon svg-022-transport"><use xlink:href="#svg-022-transport"></use></svg>', 'example'), 'link' => __('', 'example'), 'text' => __('', 'example'), 'is_svg' => true );
        $instance = wp_parse_args( (array) $instance, $defaults );
        ?>
        <p>
          <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'example'); ?></label>
          <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e('Texto:', 'example'); ?></label>
          <textarea id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" style="width:100%;" ><?php echo $instance['text']; ?></textarea>
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e('Nome/Classe do Ícone:', 'example'); ?></label>
          <input id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" value="<?php echo $instance['icon']; ?>" style="width:100%;" />
          <label for="<?php echo $this->get_field_id( 'is_svg' ); ?>">
          	<input class="checkbox" type="checkbox" <?php if($instance['is_svg'] == 'on') { echo 'checked'; }; ?> id="<?php echo $this->get_field_id( 'is_svg' ); ?>" name="<?php echo $this->get_field_name( 'is_svg' ); ?>" /> É SVG</label>
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e('Link:', 'example'); ?></label>
          <input id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $instance['link']; ?>" style="width:100%;" />
        </p>
    <?php
    }


    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        $instance = $old_instance;

        //Strip tags from title and name to remove HTML
				$instance['title']  = strip_tags( $new_instance['title'] );
				$instance['icon']   = strip_tags( $new_instance['icon'] );
				$instance['is_svg'] = strip_tags( $new_instance['is_svg'] );
				$instance['text']   = strip_tags( $new_instance['text'] );
				$instance['link']   = strip_tags( $new_instance['link'] );

        return $instance;
    }
}