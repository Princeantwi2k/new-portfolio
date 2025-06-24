<?php
namespace MellowAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Widget
 */
class Mellow_Button extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-button';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Theme Button', 'mellow' );
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
			'section_button',
			[
				'label' => __( 'Theme Style Button', 'mellow' ),
			]
		);

		$this->add_control(
			'btn_size',
			[
				'label' 	=> esc_html__( 'Size', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '',
				'options'	=> [
					''				=> esc_html__( 'Default', 'mellow' ),
					'dtr-btn--lg'	=> esc_html__( 'Large', 'mellow' ),
				],
			]
		);

		$this->add_control(
			'btn_radius',
			[
				'label' 	=> esc_html__( 'Border Corner Radius', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'dtr-radius--round',
				'options'	=> [
					'dtr-radius--rounded-small'	=> esc_html__( 'Rounded Corners', 'mellow' ),
					'dtr-radius--round'	    => esc_html__( 'Round', 'mellow' ),
					'dtr-radius--square'	=> esc_html__( 'Square', 'mellow' ),
				],
			]
		);

        $this->add_control(
			'btn_border_width',
			[
				'label' => esc_html__( 'Border Width', 'mellow' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [
						'max' => 10,
					],
					'em' => [
						'max' => 2,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-btn' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'link_text',
			[
				'label' => __( 'Text', 'mellow' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Click me', 'mellow' ),
				'separator' => 'before',
				'placeholder' => __( 'Click me', 'mellow' ),
			]
		);

		$this->add_control(
			'icon_position',
			[
				'label' 	=> esc_html__( 'Icon Position', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '',
				'separator' => 'before',
				'options'	=> [
					''								                 => esc_html__( 'No Icon', 'mellow' ),
					'dtr-btn--has-icon dtr-btn--icon-left'	 => esc_html__( 'Left', 'mellow' ),
					'dtr-btn--has-icon dtr-btn--icon-right' => esc_html__( 'Right', 'mellow' ),
				],
			]
		);

		$this->add_control(
			'icon_library',
			[
				'label' => esc_html__( 'Icon Library', 'mellow' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dtr-theme-custom-icons',
				'label_block' => true,
				'options' => [
					'dtr-font-awesome-icons'	=> esc_html__( 'Font Awesome Library', 'mellow' ),
					'dtr-theme-custom-icons' 	=> esc_html__( 'Theme Custom Library', 'mellow' ),
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
					'icon_library' => [ 'dtr-font-awesome-icons' ],
				],
			]
		);

		// custom icons
		$this->add_control(
			'custom_icon',
			[
				'label' => esc_html__( 'Theme Custom Library', 'mellow' ),
				'type' => Controls_Manager::SELECT2,
				'default' => 'icon-arrow-right',
				'label_block' => true,
				'condition' => [
					'icon_library'	=> [ 'dtr-theme-custom-icons' ],
				],
				'description' => esc_html__( 'Icon demo file for extra icons is included in help document.', 'mellow' ),
				'options' => mellow_icons(),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'mellow' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'separator' => 'before',
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->add_control(
			'smooth_scroll',
			[
				'label' 	=> esc_html__( 'Add Smooth Scroll to Button - If Linking to Some section in same page', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'label_block' => true,
				'default' 	=> '',
				'options'	=> [
					'dtr-scroll-btn'	=> esc_html__( 'Yes', 'mellow' ),
					''					=> esc_html__( 'No', 'mellow' ),
				],
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'mellow' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'mellow' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'mellow' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'mellow' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => 'left',
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
			'button_bg_color',
			[
				'label' => __( 'Background Color', 'mellow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'mellow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-btn__text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_icon_color',
			[
				'label' => __( 'Icon Color', 'mellow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-btn__icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_border_color',
			[
				'label' => __( 'Border Color', 'mellow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-btn' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'button_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector'	=> '{{WRAPPER}} .dtr-btn__text',
            ]
        );

        // hover
		$this->add_control(
			'hover_style_control',
			[
				'label' => __( 'On Hover', 'mellow' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'button_hover_bg_color',
			[
				'label' => __( 'Background Color', 'mellow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_text_color',
			[
				'label' => __( 'Text Color', 'mellow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-btn:hover .dtr-btn__text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_icon_color',
			[
				'label' => __( 'Icon Color', 'mellow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-btn:hover .dtr-btn__icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'mellow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-btn:hover' => 'border-color: {{VALUE}};',
				],
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

		// icon
		if ( ! empty( $settings['custom_icon'] ) ) {
			$this->add_render_attribute( 'custom_icon', 'class', $settings['custom_icon'] );
			$this->add_render_attribute( 'custom_icon', 'aria-hidden', 'true' );
		}
		// button
		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'button', $settings['link'] );
		}
		$this->add_render_attribute( 'button', 'role', 'button' );

		// link text
		$this->add_render_attribute( [
			'link_text' => [
				'class' => 'dtr-btn__text',
			],
		] );
		$this->add_inline_editing_attributes( 'link_text', 'none' );
		?>
       	<a class="dtr-btn <?php echo esc_attr( $settings['btn_size'] ); ?> <?php echo esc_attr( $settings['icon_position'] ); ?> <?php echo esc_attr( $settings['btn_radius'] ); ?> <?php echo esc_attr( $settings['smooth_scroll'] ); ?>" <?php echo $this->get_render_attribute_string( 'button' ); ?>>
        <?php if (  $settings['icon_position'] != '' ) { ?>
			<?php if ( $settings['icon_library'] == 'dtr-theme-custom-icons' && ! empty( $settings['default_icon'] ) ) { ?>
                <span class="dtr-icon dtr-btn__icon"><i <?php echo $this->get_render_attribute_string( 'custom_icon' ); ?>></i></span>
            <?php } else { ?>
                <span class="dtr-icon dtr-btn__icon"><?php Icons_Manager::render_icon( $settings['default_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
            <?php } ?>
        <?php } ?>
        <?php if (  $settings['link_text'] != '' ) { ?>
            <span <?php echo $this->get_render_attribute_string( 'link_text' ); ?>><?php echo $settings['link_text']; ?></span>
        <?php } ?>
        </a>
	<?php }

	/**
	 * Render widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 * @access protected
	 */
	protected function content_template() {
	?>
    <# iconHTML = elementor.helpers.renderIcon( view, settings.default_icon, { 'aria-hidden': true }, 'i' , 'object' ); #>
    <a class="dtr-btn {{ settings.btn_size }} {{ settings.icon_position }} {{ settings.btn_radius }} {{ settings.smooth_scroll }}" href="{{ settings.link.url }}" role="button">
        <# if ( settings.icon_position != '' ) { #>
            <# if ( settings.icon_library == 'dtr-theme-custom-icons' ) { #>
                <span class="dtr-icon dtr-btn__icon"><i class="{{ settings.custom_icon }}"></i></span>
            <# } else {  #>
                <span class="dtr-icon dtr-btn__icon">{{{ iconHTML.value }}}</span>
            <#	} #>
        <#	} #>
        <# if ( settings.link_text != '' ) { #>
        	<span class="dtr-btn__text">{{{ settings.link_text }}}</span>
        <# } #>
    </a>
	<?php
	}
}