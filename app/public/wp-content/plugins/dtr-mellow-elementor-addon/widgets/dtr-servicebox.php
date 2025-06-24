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
class Mellow_Servicebox extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name
	 */
	public function get_name() {
		return 'dtr-servicebox';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Service Box', 'mellow' );
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
			'section_servicebox',
			[
				'label' => __( 'Servicebox', 'mellow' ),
			]
		);
               
        $this->add_control(
			'border_radius',
			[
				'label' 	=> esc_html__( 'Box Border Radius', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'dtr-radius--rounded',
				'options'	=> [
					'dtr-radius--rounded'   => esc_html__( 'Rounded', 'mellow' ),
					'dtr-radius--square'    => esc_html__( 'Square', 'mellow' ),
				],
			]
		);

		$this->add_control(
			'servicebox_icon_type',
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
					'servicebox_icon_type' => [ 'icon-type-icon' ],
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
					'servicebox_icon_type'	=> [ 'icon-type-custom-icon' ],
				],
				'description' => esc_html__( 'Icon demo file for extra icons is included in help document.', 'mellow' ),
				'options' => mellow_icons(),
			]
		);

		// image
		$this->add_control(
			'servicebox_image_control',
			[
				'label' 	=> esc_html__( 'Image', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'condition' => [
					'servicebox_icon_type'	=> [ 'icon-type-img' ],
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
					'servicebox_icon_type'	=> [ 'icon-type-img' ],
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
					'servicebox_icon_type'	=> [ 'icon-type-img' ],
				],
			]
		);

		// custom icon
		$this->add_control(
			'servicebox_icon_html',
			[
				'label' => __( 'Custom HTML', 'mellow' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '',
				'label_block' => true,
				'condition' => [
					'servicebox_icon_type'	=> [ 'icon-type-html' ],
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
					'{{WRAPPER}} .dtr-servicebox__icon' => 'font-size: {{SIZE}}{{UNIT}}',
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
			'link',
			[
				'label' 		=> esc_html__( 'Link', 'mellow' ),
				'type' 			=> Controls_Manager::URL,
				'separator'		=> 'before',
				'placeholder'	=> 'http://your-link.com',
				'default' 		=> [
					'url'	=> '#',
				],
			]
		);
		
		$this->add_control(
			'servicebox_content',
			[
				'label' 		=> esc_html__( 'Content', 'mellow' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Content Goes Here', 'mellow' ),
				'separator'		=> 'before',
				'placeholder' 	=> esc_html__( 'Your Content', 'mellow' ),
				'label_block' 	=> true,
			]
		);

		$this->add_responsive_control(
			'servicebox_content_m_top',
			[
				'label' => esc_html__( 'Content - Margin Top', 'mellow' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'default' => [
				'size' => '',
				],
				'separator'		=> 'after',
				'selectors' => [
					'{{WRAPPER}} .dtr-servicebox__content' => 'margin-top: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'keywords',
			[
				'label' => __( 'Keywords', 'mellow' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'keyword',
						'label' => __( 'Keyword', 'mellow' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( 'Keyword 1', 'mellow' ),
						'placeholder' => __( 'Enter a keyword', 'mellow' ),
					],
					[
						'name' => 'highlighted',
						'label' => __( 'Highlighted', 'mellow' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __( 'Yes', 'mellow' ),
						'label_off' => __( 'No', 'mellow' ),
						'return_value' => 'yes',
						'default' => 'no',
					],
				],
				'title_field' => '{{{ keyword }}}', // Show the keyword as the title in the repeater
				'default' => [
					[
						'keyword' => __( 'Keyword 1', 'mellow' ),
						'highlighted' => 'no',
					],
					[
						'keyword' => __( 'Keyword 2', 'mellow' ),
						'highlighted' => 'yes',
					],
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
					'{{WRAPPER}} .dtr-servicebox'	=> 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .dtr-servicebox'	=> 'border-color: {{VALUE}};',
				],
			]
		);
        
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon', 'mellow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-servicebox__icon' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .dtr-servicebox__heading'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'heading_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector' 	=> '{{WRAPPER}} .dtr-servicebox__heading',
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
					'{{WRAPPER}} .dtr-servicebox__content'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'content_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector' 	=> '{{WRAPPER}} .dtr-servicebox__content',
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
					'{{WRAPPER}} .dtr-servicebox:hover'	=> 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .dtr-servicebox:hover'	=> 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon_hover_color',
			[
				'label' => __( 'Icon', 'mellow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-servicebox:hover .dtr-servicebox__icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'heading_hover_color',
			[
				'label' 	=> esc_html__( 'Heading', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-servicebox:hover .dtr-servicebox__heading'	=> 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_hover_color',
			[
				'label' 	=> esc_html__( 'Content', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-servicebox:hover .dtr-servicebox__content'	=> 'color: {{VALUE}};',
				],
			]
		);

		// Link
		$this->add_control(
			'link_style_control',
			[
				'label' 	=> esc_html__( 'Link', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'link_bg_color',
			[
				'label' 	=> esc_html__( 'Background Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-servicebox__link'	=> 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'link_border_color',
			[
				'label' 	=> esc_html__( 'Border Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-servicebox__link'	=> 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'link_color',
			[
				'label' 	=> esc_html__( 'Icon Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-servicebox__link'	=> 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'link_hover_bg_color',
			[
				'label' 	=> esc_html__( 'On Box Hover: Background Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-servicebox:hover .dtr-servicebox__link'	=> 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'link_hover_border_color',
			[
				'label' 	=> esc_html__( 'On Box Hover: Border Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-servicebox:hover .dtr-servicebox__link'	=> 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'link_hover_color',
			[
				'label' 	=> esc_html__( 'On Box Hover: Icon Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-servicebox:hover .dtr-servicebox__link'	=> 'color: {{VALUE}};',
				],
			]
		);

		// keyword
		$this->add_control(
			'keyword_style_control',
			[
				'label' 	=> esc_html__( 'Keyword', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);

		$this->add_control(
			'keyword_color',
			[
				'label' 	=> esc_html__( 'Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-servicebox__keyword'	=> 'color: {{VALUE}};',
				],
			]
		);
	
		$this->add_control(
			'keyword_bg_color',
			[
				'label' 	=> esc_html__( 'Background Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-servicebox__keyword'	=> 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'keyword_border_color',
			[
				'label' 	=> esc_html__( 'Border Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-servicebox__keyword'	=> 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'highlighted_keyword_color',
			[
				'label' 	=> esc_html__( 'Highlighted: Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .highlighted-keyword'	=> 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'highlighted_keyword_bg_color',
			[
				'label' 	=> esc_html__( 'Highlighted: Background Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .highlighted-keyword'	=> 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'highlighted_keyword_border_color',
			[
				'label' 	=> esc_html__( 'Highlighted: Border Color', 'mellow' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .highlighted-keyword'	=> 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'keyword_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector' 	=> '{{WRAPPER}} .dtr-servicebox__keyword',
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

		// icon
		if ( ! empty( $settings['custom_icon'] ) ) {
			$this->add_render_attribute( 'custom_icon', 'class', $settings['custom_icon'] );
			$this->add_render_attribute( 'custom_icon', 'aria-hidden', 'true' );
		}
		?>
        <div class="dtr-servicebox <?php echo $settings['border_radius']; ?>">
			<div class="dtr-servicebox__head">			
				<div class="dtr-icon dtr-servicebox__icon">
					<?php if ( $settings['servicebox_icon_type'] == 'icon-type-icon' && ! empty( $settings['default_icon'] ) ) {
							Icons_Manager::render_icon( $settings['default_icon'], [ 'aria-hidden' => 'true' ] );
						} elseif ( $settings['servicebox_icon_type'] == 'icon-type-custom-icon' && ! empty( $settings['custom_icon'] ) ) { ?>
							<i <?php echo $this->get_render_attribute_string( 'custom_icon' ); ?>></i>
					<?php } elseif ( $settings['servicebox_icon_type'] == 'icon-type-img' && ! empty( $settings['image']['url'] ) ) {
							$this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
							$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
							$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
							$image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
							echo $image_html;
						} elseif ( $settings['servicebox_icon_type'] == 'icon-type-html' && ! empty( $settings['servicebox_icon_html'] ) ) {
							echo $settings['servicebox_icon_html'];
					} else {}  ?>
				</div>
				<?php if ( ! empty( $settings['heading'] ) ) { ?>
					<<?php echo esc_attr( $settings['heading_size'] ) ?> class="dtr-servicebox__heading"><?php echo wp_kses_post( $settings['heading'] ); ?></<?php echo esc_attr( $settings['heading_size'] ) ?>>
				<?php } ?>
				<?php if ( ! empty( $settings['link']['url'] ) ) { ?>
				<a class="dtr-servicebox__link" <?php echo $this->get_render_attribute_string( 'button' ); ?>></a>
				<?php } ?> 
			</div>
            <div class="dtr-servicebox__content">               
                <?php if ( ! empty( $settings['servicebox_content'] ) ) { ?>
                     <?php echo wp_kses_post( $settings['servicebox_content'] ) ?>
                <?php } ?>
            </div>		              
			<?php if ( ! empty( $settings['keywords'] ) ) { ?>
			<div class="dtr-servicebox__keywords"> 
				<?php 
				if ( ! empty( $settings['keywords'] ) ) {
					foreach ( $settings['keywords'] as $keyword ) {
						// Check if the keyword is highlighted
						$class = ! empty( $keyword['highlighted'] ) && $keyword['highlighted'] === 'yes' ? 'highlighted-keyword' : '';
						echo '<span class="dtr-servicebox__keyword ' . esc_attr( $class ) . '">' . esc_html( $keyword['keyword'] ) . '</span>';
					}
				}
				?>
			</div>
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
        <div class="dtr-servicebox {{ settings.border_radius }}">
			<div class="dtr-servicebox__head">
				<div class="dtr-icon dtr-servicebox__icon">
					<# if ( settings.servicebox_icon_type == 'icon-type-icon' ) { #>
						{{{ iconHTML.value }}}
					<# } else if ( settings.servicebox_icon_type == 'icon-type-custom-icon' ) { #>
						<i class="{{ settings.custom_icon }}"></i>
					<# } else if ( settings.servicebox_icon_type == 'icon-type-img' ) { #>
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
					<# } else if ( settings.servicebox_icon_type == 'icon-type-html' ) { #>
						{{{ settings.servicebox_icon_html }}}
					<# } else { } #>
				</div>
				<{{ settings.heading_size }} class="dtr-servicebox__heading">{{{ settings.heading }}}</{{ settings.heading_size }}>
				<# if ( settings.link.url ) { #>
				<a class="dtr-servicebox__link" href="{{ settings.link.url }}"></a>
				<# } #>
			</div>
            <div class="dtr-servicebox__content">              
                <# if ( settings.servicebox_content != '' ) { #>
                {{{ settings.servicebox_content }}}
                <# } #>
            </div>
			<# if ( settings.keywords && settings.keywords.length ) { #>
				<div class="dtr-servicebox__keywords">
					<# _.each( settings.keywords, function( keyword ) { #>
						<# var className = keyword.highlighted === 'yes' ? 'highlighted-keyword' : ''; #>
						<span class="dtr-servicebox__keyword {{ className }}">{{{ keyword.keyword }}}</span>
					<# }); #>
				</div> 
			<# } #>
        </div> 
		<?php
	}
}