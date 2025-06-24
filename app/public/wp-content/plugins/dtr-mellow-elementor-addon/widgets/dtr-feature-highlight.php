<?php
namespace MellowAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;
use Elementor\Control_Media;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Widget
 */
class Mellow_Feature_Highlight extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-feature-highlight';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Feature Highlight', 'mellow' );
	}

	/**
	 * Retrieve widget icon.
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-favorite';
	}

	/**
	 * Retrieve the list of categories widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array('dtr-element');
	}

	/**
	 * Register widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_feature',
			[
				'label' => __( 'Feature Highlight', 'mellow' ),
			]
		);    
		
		$this->add_control(
			'feature_wrap_style',
			[
				'label' => esc_html__( 'Wrap Style', 'mellow' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dtr-feature-highlight--default',
				'label_block' => true,
				'options' => [
					'dtr-feature-highlight--default'	=> esc_html__( 'None', 'mellow' ),
					'dtr-feature-highlight--boxed'		=> esc_html__( 'Boxed', 'mellow' ),
				],
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' 	=> esc_html__( 'Border Radius', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'dtr-radius--round',
                'condition' => [
					'feature_wrap_style'	=> [ 'dtr-feature-highlight--boxed' ],
				],
				'options'	=> [
					'dtr-radius--round'   => esc_html__( 'Round', 'mellow' ),
					'dtr-radius--square'    => esc_html__( 'Square', 'mellow' ),
				],
			]
		);

		$this->add_control(
			'feature_icon_type',
			[
				'label' 	=> esc_html__( 'Icon Type', 'mellow' ),
				'type'		=> Controls_Manager::SELECT,
				'default'	=> 'icon-type-icon',
				'separator'	=> 'before',
				'options' 	=> [
					'icon-type-icon'		=> esc_html__( 'Font Awesome Icon', 'mellow' ),
					'icon-type-img'			=> esc_html__( 'Image', 'mellow' ),
					'icon-type-custom-icon'	=> esc_html__( 'Theme Icon', 'mellow' ),
					'icon-type-html'		=> esc_html__( 'Custom HTML', 'mellow' ),
				],
			]
		);

		$this->add_control(
			'default_icon',
			[
				'label' => esc_html__( 'Font Awesome Library', 'mellow' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'label_block' => true,
				'condition' => [
					'feature_icon_type' => [ 'icon-type-icon' ],
				],
			]
		);

		$this->add_control(
			'custom_icon',
			[
				'label' => esc_html__( 'Theme Custom Library', 'mellow' ),
				'type' => Controls_Manager::SELECT2,
				'default' => 'icon-star',
				'label_block' => true,
				'condition' => [
					'feature_icon_type'	=> [ 'icon-type-custom-icon' ],
				],
				'description' => esc_html__( 'Icon demo file for extra icons is included in help document.', 'mellow' ),
				'options' => mellow_icons(),
			]
		);

		// image
		$this->add_control(
			'feature_image_control',
			[
				'label' 	=> esc_html__( 'Image', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'condition' => [
					'feature_icon_type'	=> [ 'icon-type-img' ],
				],
			]
		);

		$this->add_control(
			'image',
			[
				'label' 	=> esc_html__( 'Choose Image', 'mellow' ),
				'type' 		=> Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default'	=> [
					'url'	=> MELLOW_ELEMENTOR_ADDONS_URL . 'assets/img/img-circle-100x100.png',
				],
				'condition'	=> [
					'feature_icon_type'	=> [ 'icon-type-img' ],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' 		=> 'thumbnail',
				'default' 	=> 'full',
				'separator'	=> 'none',
				'condition' => [
					'feature_icon_type'	=> [ 'icon-type-img' ],
				],
			]
		);

		// custom icon
		$this->add_control(
			'feature_icon_html',
			[
				'label' => __( 'Custom HTML', 'mellow' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '',
				'label_block' => true,
				'condition' => [
					'feature_icon_type'	=> [ 'icon-type-html' ],
				],
			]
		);
		
		// heading
		$this->add_control(
			'heading',
			[
				'label' 		=> esc_html__( 'Heading', 'mellow' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Heading Goes Here', 'mellow' ),
				'placeholder' 	=> esc_html__( 'Heading Goes Here', 'mellow' ),
				'label_block'	=> true,
				'show_label'	=> true,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'heading_size',
			[
				'label' 	=> esc_html__( 'Heading - HTML Tag', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'options'	=> [
					'h1' 	=> 'H1',
					'h2' 	=> 'H2',
					'h3' 	=> 'H3',
					'h4' 	=> 'H4',
					'h5' 	=> 'H5',
					'h6'	=> 'H6',
					'p' 	=> 'p',
				],
				'default' => 'p',
			]
		);

        // content
		$this->add_control(
			'feature_content',
			[
				'label' 		=> esc_html__( 'Content', 'mellow' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Content Goes Here', 'mellow' ),
				'placeholder' 	=> esc_html__( 'Content Goes Here', 'mellow' ),
				'label_block'	=> true,
				'show_label'	=> true,
				'separator' 	=> 'before',
			]
		);

        // link
		$this->add_control(
			'link_control',
			[
				'label' 	=> esc_html__( 'Wrap in Link', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);

		$this->add_control(
			'link',
			[
				'label' 		=> esc_html__( 'Link', 'mellow' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder'	=> 'http://your-link.com',
				'default' 		=> [
					'url'	=> '#',
				],
			]
		);      

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'mellow' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Styles', 'mellow' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_style_control',
			[
				'label' 	=> esc_html__( 'Icon', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'mellow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-feature-highlight__icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' => __( 'Background Color', 'mellow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-feature-highlight__icon' => 'background-color: {{VALUE}};',
				],
			]
		);		
		
		// heading
		$this->add_control(
			'heading_style_control',
			[
				'label' 	=> esc_html__( 'Heading', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label' 	=> esc_html__( 'Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-feature-highlight__heading'	=> 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'heading_span_color',
			[
				'label' 	=> esc_html__( 'Span In Heading - Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-feature-highlight__heading span'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'heading_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector' 	=> '{{WRAPPER}} .dtr-feature-highlight__heading',
            ]
        );
       
		// text
		$this->add_control(
			'text_style_control',
			[
				'label' 	=> esc_html__( 'Text', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' 	=> esc_html__( 'Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-feature-highlight__text'	=> 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'text_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector' 	=> '{{WRAPPER}} .dtr-feature-highlight__text',
            ]
        );

		$this->add_control(
			'feature_border_color',
			[
				'label' => __( 'Border Color', 'mellow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .dtr-feature-highlight--boxed' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'feature_gradient_control',
			[
				'label' => __( 'Background Gradient', 'mellow' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'feature_gradient_info_control',
			[
				'label' => __( 'Sent angle to 90 degree for better result. Button gradient can be changed at once for all buttons via theme options in Theme Base Colors', 'mellow' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'feature_background_gradient',
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .dtr-feature-highlight--boxed',
			]
		);
       
		$this->end_controls_section();
	}

		/**
	 * Render widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();
        // button
		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'button', $settings['link'] );
			$this->add_render_attribute( 'button', 'class', 'dtr-wrapping-link' );
		}
		$this->add_render_attribute( 'button', 'role', 'button' );

		// icon
		if ( ! empty( $settings['custom_icon'] ) ) {
			$this->add_render_attribute( 'custom_icon', 'class', $settings['custom_icon'] );
			$this->add_render_attribute( 'custom_icon', 'aria-hidden', 'true' );
		}
		?>
        <div class="dtr-feature-highlight <?php echo esc_attr( $settings['feature_wrap_style'] ); ?> <?php echo $settings['border_radius']; ?>">
			<?php if ( ! empty( $settings['link']['url'] ) ) { ?>
			<a <?php echo $this->get_render_attribute_string( 'button' ); ?>></a>
			<?php } ?>
            <div class="dtr-icon dtr-feature-highlight__icon">
             <?php if ( $settings['feature_icon_type'] == 'icon-type-icon' && ! empty( $settings['default_icon'] ) ) {
                    Icons_Manager::render_icon( $settings['default_icon'], [ 'aria-hidden' => 'true' ] );
                } elseif ( $settings['feature_icon_type'] == 'icon-type-custom-icon' && ! empty( $settings['custom_icon'] ) ) { ?>
                    <i <?php echo $this->get_render_attribute_string( 'custom_icon' ); ?>></i>
             <?php } elseif ( $settings['feature_icon_type'] == 'icon-type-img' && ! empty( $settings['image']['url'] ) ) {
                    $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
                    $this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
                    $this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
                    $image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
                    echo $image_html;
                } elseif ( $settings['feature_icon_type'] == 'icon-type-html' && ! empty( $settings['feature_icon_html'] ) ) {
                    echo $settings['feature_icon_html'];
              } else {}  ?>
            </div>
			<div class="dtr-feature-highlight__content">
				<?php if ( ! empty( $settings['heading'] ) ) { ?>
				<<?php echo esc_attr( $settings['heading_size'] ) ?> class="dtr-feature-highlight__heading"><?php echo wp_kses_post( $settings['heading'] ); ?></<?php echo esc_attr( $settings['heading_size'] ) ?>>
				<?php } ?>
				<?php if ( ! empty( $settings['feature_content'] ) ) { ?>
				<div class="dtr-feature-highlight__text"><?php echo wp_kses_post( $settings['feature_content'] ); ?></div>
				<?php } ?>  
			</div>          
        </div>
<?php	}

	/**
	 * Render widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 * @access protected
	 */
	protected function content_template() {
		?>
        <# iconHTML = elementor.helpers.renderIcon( view, settings.default_icon, { 'aria-hidden': true }, 'i' , 'object' ); #>
        <div class="dtr-feature-highlight {{ settings.feature_wrap_style }} {{ settings.border_radius }}">
			<# if ( settings.link.url ) { #>
			<a class="dtr-wrapping-link" href="{{ settings.link.url }}"></a>
			<# } #>
            <div class="dtr-icon dtr-feature-highlight__icon {{ settings.border_radius }}">
                <# if ( settings.feature_icon_type == 'icon-type-icon' ) { #>
                    {{{ iconHTML.value }}}
                <# } else if ( settings.feature_icon_type == 'icon-type-custom-icon' ) { #>
                    <i class="{{ settings.custom_icon }}"></i>
                <# } else if ( settings.feature_icon_type == 'icon-type-img' ) { #>
                    <#
                    var image = {
                    id: settings.image.id,
                    url: settings.image.url,
                    size: settings.thumbnail_size,
                    dimension: settings.thumbnail_custom_dimension,
                    model: view.getEditModel()
                    };
                    var image_url = elementor.imagesManager.getImageUrl( image );  #>
                    <img src="{{ image_url }}"/>
                <# } else if ( settings.feature_icon_type == 'icon-type-html' ) { #>
                    {{{ settings.feature_icon_html }}}
                <# } else { } #>
            </div>
			<div class="dtr-feature-highlight__content">
				<# if ( settings.heading != '' ) { #>
				<{{ settings.heading_size }} class="dtr-feature-highlight__heading"> {{{ settings.heading }}}</{{ settings.heading_size }}>
				<# } #>
				<# if ( settings.feature_content != '' ) { #>
				<div class="dtr-feature-highlight__text">{{{ settings.feature_content }}}</div>
				<# } #>
			</div>
        </div>
		<?php
	}
}