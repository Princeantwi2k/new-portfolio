<?php
namespace MellowAddons\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Testimonial Carousel Widget
 */
class Mellow_Testimonial_Carousel extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-testimonial-carousel';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Testimonial Carousel', 'mellow' );
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
	 * Register the scripts widget depends on.
	 */
	public function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );
	  	wp_register_script( 'swiper', MELLOW_ELEMENTOR_ADDONS_URL . 'assets/js/swiper-bundle.min.js', [ 'elementor-frontend' ], '8.4.5', true );
		wp_register_script( 'dtr-widgets', MELLOW_ELEMENTOR_ADDONS_URL . 'assets/js/dtr-widgets.js', [ 'elementor-frontend' ], '1.0.0', true );
		wp_register_style( 'swiper', MELLOW_ELEMENTOR_ADDONS_URL . 'assets/css/swiper.min.css' );
    }

	/**
	 * Retrieve the list of scripts the widget depends on.
	 * Used to set scripts dependencies required to run the widget.
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
        return [
			'swiper',
			'dtr-widgets'
        ];
    }

	/**
	 * Retrieve the list of styles the widget depends on.
	 * Used to set styles dependencies required to run the widget.
	 * @return array Widget styles dependencies.
	 */
	public function get_style_depends() {
        return [
			'swiper'
        ];
    }

	/**
	 * Register widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @access protected
	 */
	protected function register_controls() {

		// content control starts
		$this->start_controls_section(
			'section_testimonial_content',
			[
				'label' => esc_html__( 'Testimonial Carousel', 'mellow' ),
			]
		);

		$this->add_control(
			'centered_slides',
			[
				'label'        => esc_html__('Centered Slides', 'plugin-name'),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Yes', 'plugin-name'),
				'label_off'    => esc_html__('No', 'plugin-name'),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		
		$this->add_control(
			'post_limit',
			[
				'label' 		=> esc_html__( 'Number of posts to show', 'mellow' ),
				'description'	=> esc_html__( '-1 to show all posts', 'mellow' ),
				'type' 			=> Controls_Manager::NUMBER,
				'default'		=> '4',
				'min' 			=> -1,
				'step' 			=> 1,
				'separator'	=> 'before',
			]
		);

		$this->add_control(
			'post_orderby',
			[
				'label' 		=> esc_html__( 'Sort Testimonials By', 'mellow' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'date',
				'label_block'	=> true,
				'options'	=> [
					'date' 	=> esc_html__( 'Date', 'mellow' ),
					'rand' 	=> esc_html__( 'Random', 'mellow' ),
					'title'	=> esc_html__( 'Title', 'mellow' ),
				],
			]
		);

		$this->add_control(
			'post_order',
			[
				'label' 		=> esc_html__( 'Arrange Sorted Testimonials', 'mellow' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'DESC',
				'label_block'	=> true,
				'options'	=> [
					'DESC'	=> esc_html__( 'Descending', 'mellow' ),
					'ASC'  	=> esc_html__( 'Ascending', 'mellow' ),
				],
			]
		);

		$this->add_control(
			'image',
			[
				'label' 	=> esc_html__( 'Client Image', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'show',
				'separator'	=> 'before',
				'options' 	=> [
					'show'	=> esc_html__( 'Show', 'mellow' ),
					'hide'	=> esc_html__( 'Hide', 'mellow' ),
				],
			]
		);

		// nav_type
		$this->add_control(
			'nav_type',
			[
				'label' => esc_html__( 'Navigation Type', 'mellow' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dots',
				'separator' => 'before',
				'options' => [
					'arrows'	=> esc_html__( 'Arrow', 'mellow' ),
					'dots' 		=> esc_html__( 'Dots', 'mellow' ),
					'none' 		=> esc_html__( 'None', 'mellow' ),
				],
			]
		);

		// carousel
		$this->add_control(
			'carousel_settings',
			[
				'label' => esc_html__( 'Carousel Settings', 'mellow' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'autoplay_delay',
			[
				'label' => esc_html__( 'Autoplay Delay (ms)', 'mellow' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 7000,
				'min' => 1000, // Minimum delay (1 second)
				'step' => 100,
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'mellow' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'on',
				'options' => [
					'on'  => esc_html__( 'On', 'mellow' ),
					'off' => esc_html__( 'Off', 'mellow' ),
				],
			]
		);

		$this->add_control(
			'loop',
			[
				'label' => esc_html__( 'Loop Carousel', 'mellow' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'true' => esc_html__( 'Yes', 'mellow' ),
					'false'  => esc_html__( 'No', 'mellow' ),
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' 	=> esc_html__( 'View', 'mellow' ),
				'type' 		=> Controls_Manager::HIDDEN,
				'default'	=> 'traditional',
			]
		);

		$this->end_controls_section();
		// content control ends

		// style control starts
		$this->start_controls_section(
			'section_style_content',
			[
				'label'	=> esc_html__( 'Styles', 'mellow' ),
				'tab'	=> Controls_Manager::TAB_STYLE,
			]
		);

		// testimonial_content_typo_styles
		$this->add_control(
			'testimonial_content_typo_styles',
			[
				'label'	=> esc_html__( 'Content', 'mellow' ),
				'type'	=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'testimonial_text_color',
			[
				'label' 	=> esc_html__( 'Color', 'mellow' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-testimonial__text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'testimonial_text_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector' 	=> '{{WRAPPER}} .dtr-testimonial__text',
            ]
        );

		// testimonial_client_typo_styles
		$this->add_control(
			'testimonial_client_typo_styles',
			[
				'label' 	=> esc_html__( 'Client Name', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);

		$this->add_control(
			'testimonial_client_name_color',
			[
				'label' 	=> esc_html__( 'Color', 'mellow' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-testimonial__client-name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'testimonial_client_name_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector' 	=> '{{WRAPPER}} .dtr-testimonial__client-name',
            ]
        );

		// testimonial_designation_typo_styles
		$this->add_control(
			'testimonial_designation_typo_styles',
			[
				'label' 	=> esc_html__( 'Designation', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);

		$this->add_control(
			'testimonial_client_job_color',
			[
				'label' 	=> esc_html__( 'Color', 'mellow' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-testimonial__client-job' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'testimonial_client_job_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector' 	=> '{{WRAPPER}} .dtr-testimonial__client-job',
            ]
        );

		// nav_styles
		$this->add_control(
			'nav_styles',
			[
				'label' => esc_html__( 'Prev / Next Arrows', 'mellow' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'nav_type'	=> [ 'arrows' ],
				],
			]
		);

		$this->add_control(
			'arrow_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'mellow' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav_type'	=> [ 'arrows' ],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'arrow_border_color',
			[
				'label' => esc_html__( 'Border Color', 'mellow' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav_type'	=> [ 'arrows' ],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'arrow_color',
			[
				'label' => esc_html__( 'Color', 'mellow' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav_type'	=> [ 'arrows' ],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'arrow_hover_bg_color',
			[
				'label' => esc_html__( 'Hover Background Color', 'mellow' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav_type'	=> [ 'arrows' ],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next:hover, {{WRAPPER}} .swiper-button-prev:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'arrow_hover_border_color',
			[
				'label' => esc_html__( 'Hover Border Color', 'mellow' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav_type'	=> [ 'arrows' ],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next:hover, {{WRAPPER}} .swiper-button-prev:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'arrow_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'mellow' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav_type'	=> [ 'arrows' ],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next:hover, {{WRAPPER}} .swiper-button-prev:hover' => 'color: {{VALUE}};',
				],
			]
		);

		// dots_nav_styles
		$this->add_control(
			'dots_nav_styles',
			[
				'label' => esc_html__( 'Pagination Dots', 'mellow' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'nav_type'	=> [ 'dots' ],
				],
			]
		);

		$this->add_control(
			'dots_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'mellow' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav_type'	=> [ 'dots' ],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'dots_hover_bg_color',
			[
				'label' => esc_html__( 'Active / Hover Background Color', 'mellow' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav_type'	=> [ 'dots' ],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullets .swiper-pagination-bullet.swiper-pagination-bullet-active, {{WRAPPER}}  .swiper-pagination-bullets .swiper-pagination-bullet:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// style control ends

	}

	/**
	 * Render widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
	
		// Get shortcode attributes from Elementor settings
		$limit 		   = isset($settings['post_limit']) ? $settings['post_limit'] : 4;
		$orderby       = isset($settings['post_orderby']) && !empty($settings['post_orderby']) ? $settings['post_orderby'] : 'date';
		$order         = isset($settings['post_order']) && !empty($settings['post_order']) ? $settings['post_order'] : 'DESC'; 

		// Query for Testimonial Posts
		$args = [
			 'post_type' => 'dtr_testimonial',
			 'posts_per_page' => $limit !== -1 ? $limit : -1,
			 'orderby'        => $orderby,
			 'order'          => $order,
			 'post_status'    => 'publish',
			 'ignore_sticky_posts' => 1,
		 ];
		
		$query_testimonials = new \WP_Query($args);

		$output = '';

		if ($query_testimonials->have_posts()) {

		// Add the autoplay delay data attribute here
		$autoplay = isset($settings['autoplay']) ? $settings['autoplay'] : 'on';  // Default 'off' for autoplay
		$autoplay_delay = isset( $settings['autoplay_delay'] ) ? $settings['autoplay_delay'] : 7000;
		$loopSetting = isset($settings['loop']) ? $settings['loop'] : 'true'; // Default to 'true'
		$centered_slides = isset($settings['centered_slides']) ? $settings['centered_slides'] : 'true';
 
		$output .= '<div class="swiper dtr-swiper swiper-container dtr-testimonial-carousel ' . $settings['nav_type'] . '" data-swiper-autoplay-delay="' . esc_attr( $autoplay_delay ) . '" data-swiper-autoplay="' . esc_attr($autoplay) . '" data-swiper-loop="' . esc_attr($loopSetting) . '" data-swiper-centered-slides="' . esc_attr($centered_slides) . '">';
		 $output .= '<div class="swiper-wrapper">';
 
			 while ($query_testimonials->have_posts()) : $query_testimonials->the_post();
				 $client_name = get_post_meta(get_the_ID(), '_mellow_testimonial_client_name', true);
				 $client_designation = get_post_meta(get_the_ID(), '_mellow_testimonial_client_designation', true);

				 
				 // Slide content
				 $output .= '<div class="swiper-slide">';
				 $output .= '<div class="dtr-testimonial">';

				// image
				 $thumb = get_post_thumbnail_id();
				 $img_url = wp_get_attachment_url( $thumb, 'full' );

				 if ( !empty($img_url) && has_post_thumbnail() && $settings['image'] === 'show' ) {
					 $image_src = aq_resize( $img_url, 90, 90, true );

					 if ( $image_src && !is_bool($image_src) ) {
						 $output .= '<div class="dtr-testimonial__client-img-wrapper">';
						 $output .= '<img class="dtr-testimonial__client-img" src="' . esc_url( $image_src ) . '" alt="' . esc_attr( $client_name ) . '"/>';
						 $output .= '</div>';
					 } else {
						 // Fallback to original image or a placeholder if resizing fails
						 $output .= '<div class="dtr-testimonial__client-img-wrapper">';
						 $output .= '<img class="dtr-testimonial__client-img" src="' . esc_url( $img_url ) . '" alt="' . esc_attr( $client_name ) . '"/>';
						 $output .= '</div>';
					 }
				 } else { }
				 
				 // Testimonial Text
				 $output .= '<div class="dtr-testimonial__text">' . get_the_content() . '</div>';
 
				 // Client Info
				 if ( $client_name || $client_designation ) {
					 $output .= '<div class="dtr-testimonial__client-info">';
					 if ($client_name) {
						 $output .= '<p class="dtr-testimonial__client-name">' . esc_html($client_name) . '</p>';
					 }
					 if ($client_designation) {
						 $output .= '<p class="dtr-testimonial__client-job">' . esc_html($client_designation) . '</p>';
					 }
					 $output .= '</div>'; 
				 } // Client info ends
				 
				 $output .= '</div>'; // Testimonial ends
				 $output .= '</div>'; // Slide ends
			 endwhile;
 
			 $output .= '</div>'; // Swiper wrapper ends
 
			 // Navigation (Arrows or Dots)
			 if ($settings['nav_type'] === 'arrows') {
				 $output .= '<div class="dtr-swiper-nav dtr-swiper-arrow-nav">';
				 $output .= '<div class="swiper-button-prev dtr-swiper-button dtr-testimonial__prev"></div>';
				 $output .= '<div class="swiper-button-next dtr-swiper-button dtr-testimonial__next"></div>';
				 $output .= '</div>';
				} elseif ($settings['nav_type'] === 'dots') {
				 $output .= '<div class="dtr-swiper-nav dtr-swiper-dots-nav"><div class="swiper-pagination dtr-testimonial__dots"></div></div>';
			 }
 
			 $output .= '</div>'; // Swiper carousel ends
			}
		 wp_reset_postdata();
		 echo $output;
	}	
}