<?php
namespace MellowAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Portfolio Widget
 */
class Mellow_Portfolio extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-grid-portfolio';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Portfolio', 'mellow' );
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
		wp_register_script( 'isotope', MELLOW_ELEMENTOR_ADDONS_URL . 'assets/js/isotope.pkgd.min.js', [ 'elementor-frontend' ], '1.0.0', true );
		wp_register_script( 'dtr-widgets', MELLOW_ELEMENTOR_ADDONS_URL . 'assets/js/dtr-widgets.js', [ 'elementor-frontend' ], '1.0.0', true );
    } 
	
	/**
	 * Retrieve the list of scripts the widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
        return [
		  'imagesloaded',
		  'masonry',
		  'isotope',
		  'dtr-widgets'
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
			'section_portfolio_content',
			[
				'label'	=> esc_html__( 'Portfolio', 'mellow' ),
			]
		);
		
		$this->add_control(
			'portfolio_style',
			[
				'label' 	=> esc_html__( 'Style', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'portfolio-style1',
				'label_block' => true,
				'options' 	=> [
					'portfolio-style1'	=> esc_html__( 'Content On Image Hover', 'mellow' ),
					''					=> esc_html__( 'Content Below Image', 'mellow' ),
				],
			]
		);

		$this->add_control(
			'limit',
			[
				'label' 		=> esc_html__( 'Number of posts to show', 'mellow' ),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> 6,
				'min' 			=> -1,
				'step' 			=> 1,
				'separator' 	=> 'before',
				'description'	=> esc_html__( '-1 to show all posts', 'mellow' ),
			]
		);
		
		$this->add_control(
			'layout',
			[
				'label' 		=> esc_html__( 'Layout', 'mellow' ),
				'type' 			=> Controls_Manager::SELECT,
				'default'		=> 'dtr-portfolio-fitrows',
				'separator' 	=> 'before',
				'description'	=> esc_html__( 'Save and check it - Frontend', 'mellow' ),
				'options'		=> [
					'dtr-portfolio-fitrows'	=> esc_html__( 'Fit Rows', 'mellow' ),
					'dtr-portfolio-masonry'	=> esc_html__( 'Masonry', 'mellow' ),
				],
			]
		);
		
		$this->add_control(
			'columns',
			[
				'label' 	=> esc_html__( 'Number of columns', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'dtr-portfolio-grid-3col',
				'options'	=> [
					'dtr-portfolio-grid-2col'	=> esc_html__( '2', 'mellow' ),
					'dtr-portfolio-grid-3col' 	=> esc_html__( '3', 'mellow' ),
					'dtr-portfolio-grid-4col' 	=> esc_html__( '4', 'mellow' ),
				],
			]
		);
		
        $this->add_control(
			'border_radius',
			[
				'label' 	=> esc_html__( 'Border Radius', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'dtr-radius--rounded',
				'options'	=> [
					'dtr-radius--rounded'   => esc_html__( 'Rounded', 'mellow' ),
					'dtr-radius--square'    => esc_html__( 'Square', 'mellow' ),
				],
			]
		);
		
		$this->add_control(
			'post_orderby',
			[
				'label' 	=> esc_html__( 'Sort Posts By', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'date',
				'separator' 	=> 'before',
				'options' 	=> [
					'date'	=> esc_html__( 'Date', 'mellow' ),
					'rand' 	=> esc_html__( 'Random', 'mellow' ),
					'title'	=> esc_html__( 'Title', 'mellow' ),
				],
			]
		);
		
		$this->add_control(
			'post_order',
			[
				'label' 	=> esc_html__( 'Arrange Sorted Posts', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'DESC',
				'options' 	=> [
					'DESC'	=> esc_html__( 'Descending', 'mellow' ),
					'ASC'  	=> esc_html__( 'Ascending', 'mellow' ),
				],
			]
		);
		
		// tax
		$this->add_control(
			'tax',
			[
				'label' 		=> esc_html__( 'Show only Selected Categories', 'mellow' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> '',
				'label_block'	=> true,
				'show_label' 	=> true,
				'separator' 	=> 'before',
				'description'	=> esc_html__( 'Add slugs of categories to be displayed, separated by comma', 'mellow' ),
			]
		);
		
		// filter
		$this->add_control(
			'filter',
			[
				'label' 	=> esc_html__( 'Filter', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'show',
				'separator'	=> 'before',
				'options' 	=> [
					'show'	=> esc_html__( 'Show', 'mellow' ),
					'hide'	=> esc_html__( 'Hide', 'mellow' ),
				],
			]
		);

		$this->add_control(
			'filter_align',
			[
				'label' 	=> esc_html__( 'Text Align', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'dtr-filter-nav__center',
				'options'	=> [
					'dtr-filter-nav__center'	=> esc_html__( 'Center', 'mellow' ),
					'dtr-filter-nav__left' 		=> esc_html__( 'Left', 'mellow' ),
					'dtr-filter-nav__right' 	=> esc_html__( 'Right', 'mellow' ),
				],
			]
		);
        
        		
		// all link
		$this->add_control(
			'all_text',
			[
				'label' 		=> esc_html__( 'All Link Text', 'mellow' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> esc_html__( 'All', 'mellow' ),
				'label_block'	=> true,
				'show_label'	=> true,
			]
		);
	
		// image
		$this->add_control(
			'image_settings',
			[
				'label' 	=> esc_html__( 'Image Settings', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'image_size',
			[
				'label' 	=> esc_html__( 'Image Size', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'img_default',
				'options' 	=> [
					'img_default'	=> esc_html__( 'Default', 'mellow' ),
					'img_custom'	=> esc_html__( 'Custom - Hard Crop', 'mellow' ),
				],
			]
		);
	
		$this->add_control(
			'image_size_default',
			[
				'label' 	=> esc_html__( 'Choose Image Size', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'full',
				'condition'	=> [
					'image_size'	=> [ 'img_default' ],
				],
				'options'	=> [
					'full'		=> esc_html__( 'Full', 'mellow' ),
					'medium'	=> esc_html__( 'Medium', 'mellow' ),
					'thumbnail'	=> esc_html__( 'Thumbnail', 'mellow' ),
				],
			]
		);

		$this->add_control(
			'img_crop_info',
			[
				'label' 	=> esc_html__( 'While using cropping - size of main image must be greater than specified for cropping.', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'condition'	=> [
					'image_size'	=> [ 'img_custom' ],
				],
			]
		);
		
		$this->add_control(
			'img_width',
			[
				'label' 	=> esc_html__( 'Hard Crop - Width ', 'mellow' ),
				'type' 		=> Controls_Manager::NUMBER,
				'default' 	=> 600,
				'condition'	=> [
					'image_size'	=> [ 'img_custom' ],
				],
				'min'		=> 100,
				'step' 		=> 10,
				'separator' => 'none',
			]
		);
		
		$this->add_control(
			'img_height',
			[
				'label' 	=> esc_html__( 'Hard Crop - Height ', 'mellow' ),
				'type' 		=> Controls_Manager::NUMBER,
				'default' 	=> 400,
				'condition'	=> [
					'image_size'	=> [ 'img_custom' ],
				],
				'min' 		=> 100,
				'step' 		=> 10,
				'separator' => 'none',
			]
		);	

		$this->add_control(
			'categories',
			[
				'label' 	=> esc_html__( 'Categories on Image', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'show',
				'separator'	=> 'before',
				'options' 	=> [
					'show'	=> esc_html__( 'Show', 'mellow' ),
					'hide'	=> esc_html__( 'Hide', 'mellow' ),
				],
			]
		);
		
		// heading
		$this->add_control(
			'heading_settings',
			[
				'label' 	=> esc_html__( 'Heading Settings', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'heading',
			[
				'label' 	=> esc_html__( 'Heading', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'show',
				'options' 	=> [
					'show'	=> esc_html__( 'Show', 'mellow' ),
					'hide'	=> esc_html__( 'Hide', 'mellow' ),
				],
			]
		);
		
		$this->add_control(
			'heading_size',
			[
				'label' 		=> esc_html__( 'Heading HTML Tag', 'mellow' ),
				'type' 			=> Controls_Manager::SELECT,
				'options'		=> [
					'h1'	=> 'H1',
					'h2' 	=> 'H2',
					'h3' 	=> 'H3',
					'h4' 	=> 'H4',
					'h5' 	=> 'H5',
					'h6' 	=> 'H6',
					'p' 	=> 'p',
				],
				'label_block'	=> true,
				'default' 		=> 'h4',
			]
		);
		
		// excerpt
		$this->add_control(
			'excerpt',
			[
				'label' 	=> esc_html__( 'Excerpt', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'show',
				'separator'	=> 'before',
				'options' 	=> [
					'show'	=> esc_html__( 'Show', 'mellow' ),
					'hide'	=> esc_html__( 'Hide', 'mellow' ),
				],
			]
		);
		
		// link
		$this->add_control(
			'link_settings',
			[
				'label' 	=> esc_html__( 'Link Settings', 'mellow' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
        $this->add_control(
			'link_icon',
			[
				'label' 	=> esc_html__( 'Show Text Link', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'yes',
				'separator'	=> 'before',
				'options' 	=> [
					'yes'	=> esc_html__( 'Yes', 'mellow' ),
					'no'	=> esc_html__( 'No', 'mellow' ),
				],
			]
		);

		$this->add_control(
			'link_text',
			[
				'label' 		=> esc_html__( 'Link Text', 'mellow' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> esc_html__( 'View Case Study', 'mellow' ),
				'label_block'	=> true,
				'show_label'	=> true,
			]
		);
        
		$this->add_control(
			'link_wrap',
			[
				'label' 	=> esc_html__( 'Wrap in Link', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'yes',
				'separator'	=> 'before',
				'options' 	=> [
					'yes'	=> esc_html__( 'Yes', 'mellow' ),
					'no'	=> esc_html__( 'No', 'mellow' ),
				],
			]
		);
		
		$this->add_control(
			'target',
			[
				'label' 	=> esc_html__( 'Open Link In', 'mellow' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '_blank',
				'separator'	=> 'before',
				'options' 	=> [
					'_blank'	=> esc_html__( 'New Window', 'mellow' ),
					'_self'	=> esc_html__( 'Same Window', 'mellow' ),
				],
			]
		);
		
		
		$this->end_controls_section();
		// content control ends

		// style control starts
		$this->start_controls_section(
			'section_style_content',
			[
				'label'	=> esc_html__( 'Styles', 'mellow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        
		$this->add_control(
			'overlay_style',
			[
				'label' => esc_html__( 'Overlay', 'mellow' ),
				'type' 	=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'overlay_color',
			[
				'label' => esc_html__( 'Color', 'mellow' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-overlay' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'overlay_hover_color',
			[
				'label' => esc_html__( 'On Hover Color', 'mellow' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-portfolio-item:hover .dtr-overlay' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'filter_content_style',
			[
				'label' => esc_html__( 'Filter', 'mellow' ),
				'type' 	=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
				
		$this->add_control(
			'filter_color',
			[
				'label' => esc_html__( 'Color', 'mellow' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-filter-nav a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'filter_hover_color',
			[
				'label' => esc_html__( 'On hover: Color', 'mellow' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-filter-nav a:hover, {{WRAPPER}} .dtr-filter-nav a.active' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'filter_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector'	=> '{{WRAPPER}} .dtr-filter-nav a',
            ]
        );

		// heading
		$this->add_control(
			'item_heading_style',
			[
				'label' => esc_html__( 'Heading', 'mellow' ),
				'type' 	=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'heading_color',
			[
				'label' 	=> esc_html__( 'Color', 'mellow' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-portfolio-item__heading a'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'main_heading_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector'	=> '{{WRAPPER}} .dtr-portfolio-item__heading a',
            ]
        );	

		 // link
		 $this->add_control(
			'category_style',
			[
				'label' => esc_html__( 'Category', 'mellow' ),
				'type' 	=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
		$this->add_control(
			'category_color',
			[
				'label' => __( 'Color', 'mellow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-portfolio-item__category' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'category_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector'	=> '{{WRAPPER}} .dtr-portfolio-item__category',
            ]
        );	

		// Excerpt
		$this->add_control(
			'item_excerpt_style',
			[
				'label' => esc_html__( 'Excerpt', 'mellow' ),
				'type' 	=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'excerpt_color',
			[
				'label' 	=> esc_html__( 'Color', 'mellow' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-portfolio-item__excerpt'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'excerpt_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector'	=> '{{WRAPPER}} .dtr-portfolio-item__excerpt',
            ]
        );	
        
        // link
		$this->add_control(
			'link_style',
			[
				'label' => esc_html__( 'Link', 'mellow' ),
				'type' 	=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
		$this->add_control(
			'link_color',
			[
				'label' => __( 'Color', 'mellow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-portfolio-item__link' => 'color: {{VALUE}};',
				],
			]
		);
        
		$this->add_control(
			'link_hover_color',
			[
				'label' => __( 'Hover: Color', 'mellow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-portfolio-item__link:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'link_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector'	=> '{{WRAPPER}} .dtr-portfolio-item__link',
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
		echo do_shortcode('[dtr_portfolio_grid portfolio_style="' . $settings['portfolio_style'] . '" limit="' . $settings['limit'] . '" orderby="' . $settings['post_orderby'] . '" order="' . $settings['post_order'] . '" tax="' . $settings['tax'] . '" filter="' . $settings['filter'] . '" filter_align="' . $settings['filter_align'] . '" categories="' . $settings['categories'] . '" heading="' . $settings['heading'] . '" heading_size="' . $settings['heading_size'] . '" image_size="' . $settings['image_size'] . '" image_size_default="' . $settings['image_size_default'] . '" img_width="' . $settings['img_width'] . '" img_height="' . $settings['img_height'] . '" layout="' . $settings['layout'] . '" columns="' . $settings['columns'] . '" border_radius="' . $settings['border_radius'] . '" all_text="' . $settings['all_text'] . '" excerpt="' . $settings['excerpt'] . '" link_text="' . $settings['link_text'] . '" link_wrap="' . $settings['link_wrap'] . '" link_icon="' . $settings['link_icon'] . '" target="' . $settings['target'] . '" ]');
	}

	/**
	 * Render widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 * @access protected
	 */
	protected function content_template() { }
}