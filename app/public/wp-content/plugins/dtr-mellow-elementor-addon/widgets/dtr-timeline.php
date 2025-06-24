<?php
namespace MellowAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;
use Elementor\Control_Media;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Widget
 */
class Mellow_Timeline extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name
	 */
	public function get_name() {
		return 'dtr-timeline';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Timeline', 'mellow' );
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
			'section_timeline',
			[
				'label' => __( 'Timeline', 'mellow' ),
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
			'timeline_icon_type',
			[
				'label' 	=> esc_html__( 'Icon Type', 'mellow' ),
				'type'		=> Controls_Manager::SELECT,
				'default'	=> 'icon-type-icon',
				'separator'	=> 'before',
				'options' 	=> [
					'icon-type-no-icon'		=> esc_html__( 'No Icon', 'mellow' ),
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
					'timeline_icon_type' => [ 'icon-type-icon' ],
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
					'timeline_icon_type'	=> [ 'icon-type-custom-icon' ],
				],
				'description' => esc_html__( 'Icon demo file for extra icons is included in help document.', 'mellow' ),
				'options' => mellow_icons(),
			]
		);

		// image
		$this->add_control(
			'timeline_image_control',
			[
				'label' 	=> esc_html__( 'Image', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'condition' => [
					'timeline_icon_type'	=> [ 'icon-type-img' ],
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
					'timeline_icon_type'	=> [ 'icon-type-img' ],
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
					'timeline_icon_type'	=> [ 'icon-type-img' ],
				],
			]
		);

		// custom icon
		$this->add_control(
			'timeline_icon_html',
			[
				'label' => __( 'Custom HTML', 'mellow' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '',
				'label_block' => true,
				'condition' => [
					'timeline_icon_type'	=> [ 'icon-type-html' ],
				],
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'mellow' ),
				'type' => Controls_Manager::SLIDER,
				'separator' => 'before',
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
				'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-timeline__icon' => 'font-size: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'head_m_bottom',
			[
				'label' => esc_html__( 'Margin Bottom to Head Section', 'mellow' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
				'size' => '',
				],
				'separator' 	=> 'before',
				'selectors' => [
					'{{WRAPPER}} .dtr-timeline__head' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'duration',
			[
				'label' 		=> esc_html__( 'Duration', 'mellow' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Jan 2022 - Current', 'mellow' ),
				'placeholder' 	=> esc_html__( 'Duration', 'mellow' ),
				'label_block'	=> true,
				'show_label'	=> true,
				'separator' 	=> 'before',
			]
		); 

		$this->add_control(
			'designation',
			[
				'label' 		=> esc_html__( 'Designation', 'mellow' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Associate Creative Director', 'mellow' ),
				'placeholder' 	=> esc_html__( 'Designation', 'mellow' ),
				'label_block'	=> true,
				'show_label'	=> true,
				'separator' 	=> 'before',
			]
		); 
		
		$this->add_control(
			'timeline_content',
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
			'content_m_top',
			[
				'label' => esc_html__( 'Margin Top to Content', 'mellow' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
				'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-timeline__content' => 'margin-top: {{SIZE}}{{UNIT}}',
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
			'line_color',
			[
				'label' 	=> esc_html__( 'Line Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-timeline::before, {{WRAPPER}} .dtr-timeline::after'	=> 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'line_hover_color',
			[
				'label' 	=> esc_html__( 'On Hover: Line Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-timeline:hover::before, {{WRAPPER}} .dtr-timeline:hover::after'	=> 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' 	=> esc_html__( 'Icon Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'separator'	=> 'before',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-timeline__icon'	=> 'color: {{VALUE}};',
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
					'{{WRAPPER}} .dtr-timeline__heading'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'heading_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector' 	=> '{{WRAPPER}} .dtr-timeline__heading',
            ]
        );

		// duration
		$this->add_control(
			'duration_style_control',
			[
				'label' 	=> esc_html__( 'Duration', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'duration_color',
			[
				'label' 	=> esc_html__( 'Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-timeline__duration'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'duration_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector' 	=> '{{WRAPPER}} .dtr-timeline__duration',
            ]
        );

		// designation
		$this->add_control(
			'designation_style_control',
			[
				'label' 	=> esc_html__( 'Designation', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'designation_color',
			[
				'label' 	=> esc_html__( 'Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-timeline__designation'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'designation_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector' 	=> '{{WRAPPER}} .dtr-timeline__designation',
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
					'{{WRAPPER}} .dtr-timeline__content'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'content_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector' 	=> '{{WRAPPER}} .dtr-timeline__content',
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
		?>
        <div class="dtr-timeline">   
			<div class="dtr-timeline__head">	
				<?php if ( $settings['timeline_icon_type'] != 'icon-type-no-icon' ) { ?>		
					<div class="dtr-icon dtr-timeline__icon">
						<?php if ( $settings['timeline_icon_type'] == 'icon-type-icon' && ! empty( $settings['default_icon'] ) ) {
								Icons_Manager::render_icon( $settings['default_icon'], [ 'aria-hidden' => 'true' ] );
							} elseif ( $settings['timeline_icon_type'] == 'icon-type-custom-icon' && ! empty( $settings['custom_icon'] ) ) { ?>
								<i <?php echo $this->get_render_attribute_string( 'custom_icon' ); ?>></i>
						<?php } elseif ( $settings['timeline_icon_type'] == 'icon-type-img' && ! empty( $settings['image']['url'] ) ) {
								$this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
								$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
								$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
								$image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
								echo $image_html;
							} elseif ( $settings['timeline_icon_type'] == 'icon-type-html' && ! empty( $settings['timeline_icon_html'] ) ) {
								echo $settings['timeline_icon_html'];
						} else {}  ?>
					</div>	
				<?php } ?>
				<?php if ( ! empty( $settings['heading'] ) ) { ?>
					<<?php echo esc_attr( $settings['heading_size'] ) ?> class="dtr-timeline__heading"><?php echo wp_kses_post( $settings['heading'] ); ?></<?php echo esc_attr( $settings['heading_size'] ) ?>>
				<?php } ?>
			</div>

			<?php if ( ! empty( $settings['duration'] ) ) { ?>
				<p class="dtr-timeline__duration"><?php echo wp_kses_post( $settings['duration'] ); ?></p>
			<?php } ?>

			<?php if ( ! empty( $settings['designation'] ) ) { ?>
				<p class="dtr-timeline__designation"><?php echo wp_kses_post( $settings['designation'] ); ?></p>
			<?php } ?>

			<?php if ( ! empty( $settings['timeline_content'] ) ) { ?>
					<div class="dtr-timeline__content"><?php echo wp_kses_post( $settings['timeline_content'] ) ?></div>
			<?php } ?>           
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
        <div class="dtr-timeline">
			<div class="dtr-timeline__head">
				<# if ( settings.timeline_icon_type != 'icon-type-no-icon' ) { #>
					<div class="dtr-icon dtr-timeline__icon">
						<# if ( settings.timeline_icon_type == 'icon-type-icon' ) { #>
							{{{ iconHTML.value }}}
						<# } else if ( settings.timeline_icon_type == 'icon-type-custom-icon' ) { #>
							<i class="{{ settings.custom_icon }}"></i>
						<# } else if ( settings.timeline_icon_type == 'icon-type-img' ) { #>
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
						<# } else if ( settings.timeline_icon_type == 'icon-type-html' ) { #>
							{{{ settings.timeline_icon_html }}}
						<# } else { } #>
					</div>
				<# } #>
				<# if ( settings.heading != '' ) { #>
					<{{ settings.heading_size }} class="dtr-timeline__heading">{{{ settings.heading }}}</{{ settings.heading_size }}>
				<# } #>  
			</div>
			
			<# if ( settings.duration != '' ) { #>
				<div class="dtr-timeline__duration">{{{ settings.duration }}}</div>
			<# } #>

			<# if ( settings.designation != '' ) { #>
				<div class="dtr-timeline__designation">{{{ settings.designation }}}</div>
			<# } #>
              
			<# if ( settings.timeline_content != '' ) { #>
				<div class="dtr-timeline__content">{{{ settings.timeline_content }}}</div>
			<# } #>           
        </div> 
		<?php
	}
}