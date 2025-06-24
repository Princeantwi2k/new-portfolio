<?php
namespace MellowAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Widget
 */
class Mellow_Subheading extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-subheading';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Sub Heading', 'mellow' );
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

		// content control starts
		$this->start_controls_section(
			'section_main_content',
			[
				'label'	=> esc_html__( 'Sub Heading', 'mellow' ),
			]
		);

		$this->add_control(
			'subheading',
			[
				'label' 		=> esc_html__( 'Sub Heading', 'mellow' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Sub Heading Goes Here', 'mellow' ),
				'placeholder' 	=> esc_html__( 'Sub Heading Goes Here', 'mellow' ),
				'label_block'	=> true,
				'show_label'	=> true,
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'subheading_size',
			[
				'label' 	=> esc_html__( 'Sub Heading - HTML Tag', 'elementor' ),
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

		// text align
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
				'label' 	=> esc_html__( 'View', 'mellow' ),
				'type' 		=> Controls_Manager::HIDDEN,
				'default'	=> 'traditional',
			]
		);

		$this->end_controls_section();
		// content control ends

		// style control starts
		$this->start_controls_section(
			'section_main_style',
			[
				'label'	=> esc_html__( 'Styles', 'mellow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subheading_color',
			[
				'label' 	=> esc_html__( 'Color', 'mellow' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-subheading'	=> 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'subheading_typo',
				'label' 	=> esc_html__( 'Typography', 'mellow' ),
                'selector'	=> '{{WRAPPER}} .dtr-subheading',
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
	$settings = $this->get_settings(); ?>
	    <div class="dtr-subheading-wrapper">
         <?php if ( ! empty( $settings['subheading'] ) ) { ?>
        	<<?php echo esc_attr( $settings['subheading_size'] ) ?> class="dtr-subheading"><?php echo wp_kses_post( $settings['subheading'] ) ?></<?php echo esc_attr( $settings['subheading_size'] ) ?>>
        <?php } ?>
		</div>
<?php }

	/**
	 * Render widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 * @access protected
	 */
	protected function content_template() {
		?>
		<div class="dtr-subheading-wrapper">
		<# if ( settings.subheading != '' ) { #>
			<{{ settings.subheading_size }} class="dtr-subheading"> {{{ settings.subheading }}}</{{ settings.subheading_size }}>
		<# } #>
		</div>
		<?php
	}
}