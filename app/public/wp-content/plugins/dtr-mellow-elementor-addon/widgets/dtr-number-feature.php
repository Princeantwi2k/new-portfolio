<?php
namespace MellowAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Stroke;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Widget
 */
class Mellow_Number_Feature extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name
	 */
	public function get_name() {
		return 'dtr-number-feature';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Number Feature', 'mellow' );
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
			'section_number_feature',
			[
				'label' => __( 'Number Feature', 'mellow' ),
			]
		);
        
        $this->add_control(
			'box_height',
			[
				'label' => esc_html__( 'Box Minimum Height', 'mellow' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1000,
					],
				],
				'default' => [
				'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-number-feature__content' => 'min-height: {{SIZE}}{{UNIT}}',
				],
			]
		);
        
        $this->add_control(
			'border_radius',
			[
				'label' 	=> esc_html__( 'Box Border Radius', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'dtr-radius--rounded',
                'separator' 	=> 'before',
				'options'	=> [
					'dtr-radius--rounded'   => esc_html__( 'Rounded', 'mellow' ),
					'dtr-radius--square'    => esc_html__( 'Square', 'mellow' ),
				],
			]
		);
        
        $this->add_control(
			'number',
			[
				'label' 		=> esc_html__( 'Number', 'mellow' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> esc_html__( '1', 'mellow' ),
				'placeholder' 	=> esc_html__( '1', 'mellow' ),
				'label_block'	=> true,
				'show_label'	=> true,
				'separator' 	=> 'before',
			]
		); 

		$this->add_control(
			'number_top-position',
			[
				'label' => esc_html__( 'Position From Top To Number', 'mellow' ),
				'description' => esc_html__( 'Give minus sign if neet to pull up. Clear field for default. Default is -110px', 'mellow' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1000,
					],
				],
				'default' => [
				'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-number-feature__number' => 'top: {{SIZE}}{{UNIT}}',
				],
			]
		);
                
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
				'default' => 'h4',
			]
		);
		
		$this->add_control(
			'feature_box_content',
			[
				'label' 		=> esc_html__( 'Content', 'mellow' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Content Goes Here', 'mellow' ),
				'separator'		=> 'before',
				'placeholder' 	=> esc_html__( 'Your Content', 'mellow' ),
				'label_block' 	=> true,
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
			'box_bg_color',
			[
				'label' 	=> esc_html__( 'Box Background Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature'	=> 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'box_border_color',
			[
				'label' 	=> esc_html__( 'Box Border Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature'	=> 'border-color: {{VALUE}};',
				],
			]
		);
         		
		// number
		$this->add_control(
			'number_style_control',
			[
				'label' 	=> esc_html__( 'Number', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);

		$this->add_control(
			'number_color',
			[
				'label' 	=> esc_html__( 'Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature__number'	=> 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'number_text_stroke',
				'label' 	=> esc_html__( 'Text Stroke', 'mellow' ),
				'selector' => '{{WRAPPER}} .dtr-number-feature__number',
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'number_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector' 	=> '{{WRAPPER}} .dtr-number-feature__number',
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
					'{{WRAPPER}} .dtr-number-feature__heading'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'heading_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector' 	=> '{{WRAPPER}} .dtr-number-feature__heading',
            ]
        );
			
		// content
		$this->add_control(
			'content_style_control',
			[
				'label' 	=> esc_html__( 'Content', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'content_color',
			[
				'label' 	=> esc_html__( 'Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature__text'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'content_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector' 	=> '{{WRAPPER}} .dtr-number-feature__text',
            ]
        );
		
		$this->add_control(
			'link_color',
			[
				'label' 	=> esc_html__( 'Link Icon Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature__link'	=> 'color: {{VALUE}};',
				],
			]
		);

		// on hover
		$this->add_control(
			'on_box_hover_style_control',
			[
				'label' 	=> esc_html__( 'On Box Hover', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);

		$this->add_control(
			'box_bg_hover_color',
			[
				'label' 	=> esc_html__( 'Box Background Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature:hover'	=> 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'box_border_hover_color',
			[
				'label' 	=> esc_html__( 'Box Border Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature:hover'	=> 'border-color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'number_hover_color',
			[
				'label' 	=> esc_html__( 'Number Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature:hover .dtr-number-feature__number'	=> 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'heading_hover_color',
			[
				'label' 	=> esc_html__( 'Heading Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature:hover .dtr-number-feature__heading'	=> 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_hover_color',
			[
				'label' 	=> esc_html__( 'Text Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature:hover .dtr-number-feature__text'	=> 'color: {{VALUE}};',
				],
			]
		);
	        
        $this->add_control(
			'link_hover_color',
			[
				'label' 	=> esc_html__( 'Link Icon Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'separator' => 'before',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature:hover .dtr-number-feature__link'	=> 'color: {{VALUE}};',
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
        if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'button', $settings['link'] );
		}
		$this->add_render_attribute( 'button', 'role', 'button' );
		?>
        <div class="dtr-number-feature <?php echo $settings['border_radius']; ?>"> 
			<?php if ( ! empty( $settings['link']['url'] ) ) { ?>
			<a class="dtr-wrapping-link" <?php echo $this->get_render_attribute_string( 'button' ); ?>></a>
			<div class="dtr-number-feature__link"></div>   
			<?php } ?>           
            <?php if ( ! empty( $settings['number'] ) ) { ?>
                <div class="dtr-number-feature__number"><?php echo esc_html( $settings['number'] ); ?></div>
            <?php } ?>  
            <div class="dtr-number-feature__content">
                <?php if ( ! empty( $settings['heading'] ) ) { ?>
                    <<?php echo esc_attr( $settings['heading_size'] ) ?> class="dtr-number-feature__heading"><?php echo wp_kses_post( $settings['heading'] ); ?></<?php echo esc_attr( $settings['heading_size'] ) ?>>
                <?php } ?>
                <?php if ( ! empty( $settings['feature_box_content'] ) ) { ?>
                     <div class="dtr-number-feature__text"><?php echo wp_kses_post( $settings['feature_box_content'] ) ?></div>
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
        <div class="dtr-number-feature {{ settings.border_radius }}">
			<# if ( settings.link.url ) { #>
			<a class="dtr-wrapping-link" href="{{ settings.link.url }}"></a>
			<div class="dtr-number-feature__link"></div>
			<# } #>
            <# if ( settings.number != '' ) { #>
                <div class="dtr-number-feature__number">{{{ settings.number }}}</div>
            <# } #>
            <div class="dtr-number-feature__content ">
                <{{ settings.heading_size }} class="dtr-number-feature__heading">{{{ settings.heading }}}</{{ settings.heading_size }}>
                 <# if ( settings.feature_box_content != '' ) { #>
                <div class="dtr-number-feature__text">{{{ settings.feature_box_content }}}</div>
                <# } #>
            </div>
        </div> 
		<?php
	}
}